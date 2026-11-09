<?php
/* ===
  Admin Dashboard: E-Commerce Overview
  File: home.php  

$totalRevenue = (float) db_scalar(
    $conn,
    "SELECT COALESCE(SUM(harga_jual * qty), 0) FROM detail_transaksi"
);

/* --- KPI: Active orders --- */ 
$totalOrders   = (int) db_scalar($conn, "SELECT COUNT(*) FROM transaksi");
$pendingOrders = (int) db_scalar(
    $conn,
    "SELECT COUNT(*) FROM transaksi
     WHERE LOWER(status_pengiriman) NOT IN ('selesai','terkirim','delivered','completed','done')"
);

/* --- KPI: Total customers --- */
$totalCustomers = (int) db_scalar($conn, "SELECT COUNT(*) FROM `user` WHERE role = 'user'");

/* --- KPI: Low-stock items (< 5 units net after sales) --- */
$lowStockCount = (int) db_scalar(
    $conn,
    "SELECT COUNT(*) FROM (
        SELECT b.id_barang,
               COALESCE(SUM(s.jml_stok), 0) -
               COALESCE((SELECT SUM(qty) FROM detail_transaksi WHERE id_barang = b.id_barang), 0) AS net_stock
        FROM barang b
        LEFT JOIN stok s ON b.id_barang = s.id_barang
        GROUP BY b.id_barang
        HAVING net_stock < 5
     ) AS low"
);

/* --- Month-over-month revenue (for the +% indicator) --- */
$thisMonth = (float) db_scalar($conn,
    "SELECT COALESCE(SUM(dt.harga_jual * dt.qty), 0)
       FROM detail_transaksi dt
       JOIN transaksi t ON dt.id_transaksi = t.id_transaksi
      WHERE YEAR(t.tgl_transaksi) = YEAR(CURDATE())
        AND MONTH(t.tgl_transaksi) = MONTH(CURDATE())"
);
$lastMonth = (float) db_scalar($conn,
    "SELECT COALESCE(SUM(dt.harga_jual * dt.qty), 0)
       FROM detail_transaksi dt
       JOIN transaksi t ON dt.id_transaksi = t.id_transaksi
      WHERE YEAR(t.tgl_transaksi) = YEAR(CURDATE() - INTERVAL 1 MONTH)
        AND MONTH(t.tgl_transaksi) = MONTH(CURDATE() - INTERVAL 1 MONTH)"
);
$momPct  = $lastMonth > 0 ? (($thisMonth - $lastMonth) / $lastMonth * 100) : 0;
$momSign = $momPct >= 0 ? '+' : '';

/* --- Weekly sales series (bar chart) --- */
$weekDays = [];
for ($i = 6; $i >= 0; $i--) {
    $d = date('Y-m-d', strtotime("-$i days"));
    $weekDays[$d] = ['date' => $d, 'label' => date('D', strtotime($d)), 'total' => 0];
}
$wq = mysqli_query($conn,
    "SELECT DATE(t.tgl_transaksi) AS day, SUM(dt.harga_jual * dt.qty) AS total
       FROM transaksi t
       JOIN detail_transaksi dt ON dt.id_transaksi = t.id_transaksi
      WHERE t.tgl_transaksi >= '" . date('Y-m-d', strtotime('-6 days')) . "'
      GROUP BY DATE(t.tgl_transaksi)"
);
if ($wq) while ($r = mysqli_fetch_assoc($wq)) {
    if (isset($weekDays[$r['day']])) $weekDays[$r['day']]['total'] = (float) $r['total'];
}
$maxWeek = max(array_column($weekDays, 'total')) ?: 1;
$weeklyTotal = array_sum(array_column($weekDays, 'total'));

/* --- Recent orders (last 4) --- */
$recentOrders = [];
$roq = mysqli_query($conn,
    "SELECT t.id_transaksi, t.no_invoice, t.tgl_transaksi, t.status_bayar, t.status_pengiriman,
            u.nm_user, u.email,
            GROUP_CONCAT(CONCAT(b.nm_barang,
                IF(b.warna IS NOT NULL AND b.warna <> '', CONCAT(' (', b.warna, ')'), '')
            ) SEPARATOR ', ') AS items,
            COALESCE(SUM(dt.harga_jual * dt.qty), 0) AS total
       FROM transaksi t
       LEFT JOIN `user` u ON t.id_user = u.id_user
       LEFT JOIN detail_transaksi dt ON dt.id_transaksi = t.id_transaksi
       LEFT JOIN barang b ON dt.id_barang = b.id_barang
      GROUP BY t.id_transaksi
      ORDER BY t.tgl_transaksi DESC, t.id_transaksi DESC
      LIMIT 4"
);
if ($roq) while ($r = mysqli_fetch_assoc($roq)) $recentOrders[] = $r;

/* --- Top-selling garments --- */
$topSelling = [];
$tsq = mysqli_query($conn,
    "SELECT b.nm_barang, SUM(dt.qty) AS units, SUM(dt.harga_jual * dt.qty) AS revenue
       FROM detail_transaksi dt
       JOIN barang b ON dt.id_barang = b.id_barang
      GROUP BY b.id_barang, b.nm_barang
      ORDER BY units DESC
      LIMIT 3"
);
if ($tsq) while ($r = mysqli_fetch_assoc($tsq)) $topSelling[] = $r;

/* --- Low-stock items (detail) --- */
$lowStockItems = [];
$lsq = mysqli_query($conn,
    "SELECT b.nm_barang, b.warna,
            COALESCE(SUM(s.jml_stok), 0) AS stock_in,
            COALESCE((SELECT SUM(qty) FROM detail_transaksi WHERE id_barang = b.id_barang), 0) AS sold
       FROM barang b
       LEFT JOIN stok s ON b.id_barang = s.id_barang
      GROUP BY b.id_barang, b.nm_barang, b.warna
      ORDER BY stock_in ASC
      LIMIT 3"
);
if ($lsq) while ($r = mysqli_fetch_assoc($lsq)) $lowStockItems[] = $r;
?>

<!-- CONTENT WRAPPER -->
<main class="flex-1 p-space-md md:p-space-lg flex flex-col gap-space-lg">

  <!-- CONTENT HEADER: Breadcrumb & Title Bar -->
  <div
    class="flex flex-col md:flex-row md:items-center md:justify-between gap-space-sm pb-space-sm border-b border-border-default"
  >
    <div>
      <!-- Breadcrumbs -->
      <nav class="flex items-center gap-1.5 text-body-sm font-body-sm text-text-muted mb-1">
        <a class="hover:text-primary flex items-center gap-1" href="./index.php">
          <span class="material-symbols-outlined text-body-sm" data-icon="home">home</span> Home
        </a>
        <span>/</span>
        <a class="hover:text-primary" href="#">Admin</a>
        <span>/</span>
        <span class="text-text-primary font-semibold">E-Commerce Overview</span>
      </nav>
      <h1
        class="text-headline-md font-headline-md text-text-primary font-bold tracking-tight"
      >
        E-Commerce Overview &amp; Sales Metrics
      </h1>
    </div>

    <!-- Actions: Date Range & Export Button -->
    <div class="flex items-center flex-wrap gap-space-sm">
      <div
        class="flex items-center bg-surface-container-low border border-border-default rounded-lg px-space-sm py-1.5 shadow-sm text-body-sm"
      >
        <span
          class="material-symbols-outlined text-text-muted mr-1.5 text-body-md"
          data-icon="calendar_today"
          >calendar_today</span
        >
        <span class="font-medium text-text-primary">Oct 1, 2024 - Oct 28, 2024</span>
        <span
          class="material-symbols-outlined text-text-muted ml-2 text-body-sm"
          data-icon="expand_more"
          >expand_more</span
        >
      </div>
      <button
        class="flex items-center gap-1.5 bg-primary-container hover:bg-blue-600 text-white px-space-md py-1.5 rounded-lg text-title-sm font-title-sm shadow-sm transition active:scale-[0.98]"
      >
        <span class="material-symbols-outlined text-body-md" data-icon="download">download</span>
        <span>Export Report</span>
      </button>
    </div>
  </div>

  <!-- TOP 4 ADMINLTE SMALL-BOX / STAT WIDGETS -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-md">
    <!-- Box 1: Total Apparel Revenue -->
<div class="bg-surface-card rounded-lg border border-border-default shadow-sm overflow-hidden flex flex-col justify-between group hover:border-primary-container transition-colors">
  <div class="p-space-md flex justify-between items-start">
    <div>
      <span class="text-label-md font-label-md uppercase tracking-wider text-text-muted">Total Revenue</span>
      <div class="text-headline-lg font-headline-lg text-text-primary font-bold mt-1">
        <?= e(rupiah($totalRevenue)) ?>
      </div>
      <div class="flex items-center gap-1 text-label-sm font-label-sm <?= $momPct >= 0 ? 'text-tertiary' : 'text-error' ?> font-bold mt-1">
        <span class="material-symbols-outlined text-body-sm"><?= $momPct >= 0 ? 'trending_up' : 'trending_down' ?></span>
        <span><?= $momSign . number_format($momPct, 1) ?>% vs last month</span>
      </div>
    </div>
    <div class="w-12 h-12 rounded-lg bg-primary-container/20 text-primary flex items-center justify-center border border-primary/20">
      <span class="material-symbols-outlined text-headline-sm">payments</span>
    </div>
  </div>
  <a href="./orders.php" class="bg-surface-container-low hover:bg-primary-container hover:text-white text-text-muted text-label-md font-label-md py-1.5 px-space-md flex items-center justify-between border-t border-border-default transition-colors">
    <span>View Revenue Details</span>
    <span class="material-symbols-outlined text-body-sm">arrow_forward</span>
  </a>
</div>

<!-- Box 2: Active Orders -->
<div class="bg-surface-card rounded-lg border border-border-default shadow-sm overflow-hidden flex flex-col justify-between group hover:border-tertiary transition-colors">
  <div class="p-space-md flex justify-between items-start">
    <div>
      <span class="text-label-md font-label-md uppercase tracking-wider text-text-muted">Active Orders</span>
      <div class="text-headline-lg font-headline-lg text-text-primary font-bold mt-1">
        <?= number_format($totalOrders) ?> orders
      </div>
      <div class="flex items-center gap-1 text-label-sm font-label-sm text-primary font-bold mt-1">
        <span class="material-symbols-outlined text-body-sm">schedule</span>
        <span><?= number_format($pendingOrders) ?> pending shipment</span>
      </div>
    </div>
    <div class="w-12 h-12 rounded-lg bg-tertiary/15 text-tertiary flex items-center justify-center border border-tertiary/20">
      <span class="material-symbols-outlined text-headline-sm">shopping_cart</span>
    </div>
  </div>
  <a href="./orders.php" class="bg-surface-container-low hover:bg-tertiary hover:text-surface-dim text-text-muted text-label-md font-label-md py-1.5 px-space-md flex items-center justify-between border-t border-border-default transition-colors">
    <span>Manage Fulfillment</span>
    <span class="material-symbols-outlined text-body-sm">arrow_forward</span>
  </a>
</div>

<!-- Box 3: Low Stock -->
<div class="bg-surface-card rounded-lg border border-border-default shadow-sm overflow-hidden flex flex-col justify-between group hover:border-badge-warning transition-colors">
  <div class="p-space-md flex justify-between items-start">
    <div>
      <span class="text-label-md font-label-md uppercase tracking-wider text-text-muted">Low Stock Alert</span>
      <div class="text-headline-lg font-headline-lg text-text-primary font-bold mt-1">
        <?= number_format($lowStockCount) ?> items
      </div>
      <div class="flex items-center gap-1.5 mt-1">
        <span class="bg-badge-warning/20 text-[#fde047] border border-badge-warning/30 text-label-sm font-label-sm px-2 py-0.5 rounded font-bold">
        <?= $lowStockCount > 0 ? 'Needs Action' : 'OK' ?>
      </span>
      </div>
    </div>
    <div class="w-12 h-12 rounded-lg bg-badge-warning/15 text-badge-warning flex items-center justify-center border border-badge-warning/25">
      <span class="material-symbols-outlined text-headline-sm">warning</span>
    </div>
  </div>
  <a href="./products.php" class="bg-surface-container-low hover:bg-badge-warning hover:text-black text-text-muted text-label-md font-label-md py-1.5 px-space-md flex items-center justify-between border-t border-border-default transition-colors">
    <span>Restock Inventory</span>
    <span class="material-symbols-outlined text-body-sm">arrow_forward</span>
  </a>
</div>

<!-- Box 4: Total Customers -->
<div class="bg-surface-card rounded-lg border border-border-default shadow-sm overflow-hidden flex flex-col justify-between group hover:border-text-secondary transition-colors">
  <div class="p-space-md flex justify-between items-start">
    <div>
      <span class="text-label-md font-label-md uppercase tracking-wider text-text-muted">Total Customers</span>
      <div class="text-headline-lg font-headline-lg text-text-primary font-bold mt-1">
        <?= number_format($totalCustomers) ?>
      </div>
      <div class="flex items-center gap-1 text-label-sm font-label-sm text-tertiary font-bold mt-1">
        <span class="material-symbols-outlined text-body-sm">person_add</span>
        <span>Registered accounts</span>
       </div>
            </div>
            <div class="w-12 h-12 rounded-lg bg-surface-container-high text-secondary flex items-center justify-center border border-border-default">
              <span class="material-symbols-outlined text-headline-sm">group</span>
            </div>
          </div>
          <a href="./users.php" class="bg-surface-container-low hover:bg-surface-hover hover:text-text-primary text-text-muted text-label-md font-label-md py-1.5 px-space-md flex items-center justify-between border-t border-border-default transition-colors">
            <span>View Customer Roster</span>
            <span class="material-symbols-outlined text-body-sm">arrow_forward</span>
            </a>
          </div>
        </div>
      </div>
      <div class="p-space-lg">
  <div class="flex justify-between items-end mb-4">
    <div>
      <span class="text-label-sm font-label-sm text-text-muted uppercase">Weekly Net Revenue</span>
      <div class="flex items-baseline gap-2">
        <div class="text-headline-md font-headline-md font-bold text-text-primary whitespace-nowrap">
        <?= e(rupiah($weeklyTotal)) ?>
        <span class="text-body-sm font-normal text-tertiary whitespace-nowrap">(last 7 days)</span>
      </div>
    </div>
    <div class="flex items-center gap-4 text-label-sm font-label-sm">
      <span class="flex items-center gap-1.5 text-text-secondary">
        <span class="w-3 h-3 rounded-sm bg-primary-container"></span> Revenue
      </span>
    </div>
  </div>

  <div class="h-48 flex items-end justify-between gap-2 pt-6 border-b border-border-default">
    <?php $i = 0; foreach ($weekDays as $d):
      $h = $d['total'] > 0 ? max(8, ($d['total'] / $maxWeek) * 100) : 4;
      $isToday = $d['date'] === date('Y-m-d');
      $i++;
    ?>
      <div class="flex-1 flex flex-col items-center gap-2 group">
        <div class="w-full max-w-[28px] bg-[#222834] rounded-t flex flex-col justify-end overflow-hidden relative border border-border-subtle/50"
             style="height: <?= 40 + ($h / 100) * 140 ?>px">
          <div class="bg-primary-container w-full group-hover:brightness-125 transition-all"
               style="height: <?= $h ?>%"></div>
        </div>
        <span class="text-label-sm font-label-sm <?= $isToday ? 'text-primary font-bold' : 'text-text-muted' ?>">
          <?= e($d['label']) ?>
        </span>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="flex justify-between items-center mt-3 text-body-sm font-body-sm text-text-muted">
    <span>7-day rolling totals — sourced from <code class="text-primary">detail_transaksi</code></span>
    <a href="./orders.php" class="text-primary hover:underline font-semibold flex items-center gap-0.5">
      Full Analytics
      <span class="material-symbols-outlined text-body-sm">chevron_right</span>
    </a>
  </div>
</div>

      <!-- Bento Card 2: Recent Orders Table -->
      <div
        class="bg-surface-card rounded-lg border border-border-default shadow-sm overflow-hidden"
      >
        <div class="flex items-center justify-between p-space-md border-b border-border-default">
          <div class="flex items-center gap-space-sm">
            <span class="material-symbols-outlined text-primary" data-icon="receipt">receipt</span>
            <h2 class="text-title-md font-title-md font-bold text-text-primary">
              Recent Apparel Orders &amp; Fulfillment
            </h2>
          </div>
          <div class="flex items-center gap-2">
            <span class="text-label-sm font-label-sm text-text-muted">Live updates every 30s</span>
            <button
              class="p-1 text-text-muted hover:text-text-primary rounded hover:bg-surface-hover transition-colors"
            >
              <span class="material-symbols-outlined text-body-md" data-icon="refresh">refresh</span>
            </button>
          </div>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse">
            <thead>
              <tr
                class="bg-surface-container-low text-text-muted text-label-sm font-label-sm uppercase tracking-wider border-b border-border-default"
              >
                <th class="py-2.5 px-space-md">Order ID</th>
                <th class="py-2.5 px-space-md">Customer</th>
                <th class="py-2.5 px-space-md">Garment &amp; Size</th>
                <th class="py-2.5 px-space-md">Total</th>
                <th class="py-2.5 px-space-md">Payment</th>
                <th class="py-2.5 px-space-md">Status</th>
                <th class="py-2.5 px-space-md text-right">Actions</th>
              </tr>
            </thead>
            
      <tbody class="divide-y divide-border-subtle text-body-sm font-body-sm">
       <?php if (!$recentOrders): ?>
          <tr>
            <td colspan="7" class="py-8 text-center text-text-muted">No orders yet. Create a transaction to see it here.</td>
          </tr>
        <?php else: foreach ($recentOrders as $o): ?>
          <tr class="hover:bg-surface-hover/60 transition-colors">
            <td class="py-3 px-space-md font-semibold text-primary">
              <?= e($o['no_invoice'] ?: ('#TRX-' . $o['id_transaksi'])) ?>
            </td>
            <td class="py-3 px-space-md">
              <div class="flex items-center gap-2">
                <div class="w-7 h-7 rounded-full bg-surface-container-high border border-border-default flex items-center justify-center text-label-md font-bold text-text-primary">
                  <?= e(strtoupper(substr($o['nm_user'] ?: '?', 0, 1))) ?>
                </div>
                <span class="font-medium text-text-primary"><?= e($o['nm_user'] ?: '—') ?></span>
              </div>
            </td>
            <td class="py-3 px-space-md text-text-primary">
              <?= e($o['items'] ?: '—') ?>
            </td>
            <td class="py-3 px-space-md font-bold text-text-primary"><?= e(rupiah($o['total'])) ?></td>
            <td class="py-3 px-space-md">
              <span class="inline-flex items-center gap-1 text-text-secondary">
                <span class="material-symbols-outlined text-body-md text-text-muted">credit_card</span>
                <?= e($o['status_bayar'] ?: '—') ?>
              </span>
            </td>
            <td class="py-3 px-space-md">
              <span class="border <?= status_class($o['status_pengiriman']) ?> text-label-sm font-label-sm px-2.5 py-0.5 rounded-full font-bold uppercase inline-block">
                <?= e($o['status_pengiriman'] ?: '—') ?>
              </span>
            </td>
            <td class="py-3 px-space-md text-right">
              <a href="./orders.php?id=<?= (int)$o['id_transaksi'] ?>" class="p-1 text-text-muted hover:text-text-primary rounded hover:bg-surface-hover inline-flex">
                <span class="material-symbols-outlined text-body-md">more_vert</span>
                </a>
              </td>
            </tr>
          <?php endforeach; endif; ?>
        </tbody>
          </table>
        </div>

        <!-- Table Footer & Pagination -->
        <div
          class="flex flex-col sm:flex-row sm:items-center justify-between p-space-md bg-surface-container-low border-t border-border-default text-body-sm text-text-muted"
        >
          <span>Showing <?= count($recentOrders) ?> of <?= number_format($totalOrders) ?> total orders</span> 
          <div class="flex items-center gap-1 mt-2 sm:mt-0">
            <button
              class="px-2 py-1 rounded bg-surface-card border border-border-default text-text-muted hover:text-text-primary disabled:opacity-40 transition-colors"
              disabled=""
            >
              Previous
            </button>
            <button class="px-2.5 py-1 rounded bg-primary-container text-white font-bold">1</button>
            <button
              class="px-2.5 py-1 rounded bg-surface-card border border-border-default hover:bg-surface-hover text-text-primary transition-colors"
            >
              2
            </button>
            <button
              class="px-2.5 py-1 rounded bg-surface-card border border-border-default hover:bg-surface-hover text-text-primary transition-colors"
            >
              3
            </button>
            <button
              class="px-2 py-1 rounded bg-surface-card border border-border-default text-text-muted hover:text-text-primary transition-colors"
            >
              Next
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT COLUMN (col-lg-4): Inventory, Top Garments, Server Status -->
    <div class="lg:col-span-4 flex flex-col gap-space-lg">

      <!-- Bento Widget 1: Quick Product Inventory Alert -->
      <div class="bg-surface-card rounded-lg border border-border-default shadow-sm p-space-md">
        <div class="flex items-center justify-between pb-space-sm border-b border-border-default">
          <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-badge-warning" data-icon="inventory"
              >inventory</span
            >
            <h3 class="text-title-md font-title-md font-bold text-text-primary">
              Inventory Capacity Alert
            </h3>
          </div>
          <span
            class="bg-badge-warning/20 text-[#fde047] border border-badge-warning/30 text-label-sm font-label-sm px-2 py-0.5 rounded font-bold"
            >Needs Action</span
          >
        </div>

      <div class="mt-space-md flex flex-col gap-space-md">
      <?php if (!$lowStockItems): ?>
      <p class="text-center text-text-muted text-body-sm py-4">Inventory looks healthy.</p>
      <?php else: foreach ($lowStockItems as $item):
      $net = (int)$item['stock_in'] - (int)$item['sold'];
      $pct = max(0, min(100, ($item['stock_in'] > 0 ? ($net / max(1,$item['stock_in'])) * 100 : 0)));
      $colour = $net < 5 ? 'bg-badge-danger' : ($net < 20 ? 'bg-badge-warning' : 'bg-tertiary');
      $textColour = $net < 5 ? 'text-error' : ($net < 20 ? 'text-badge-warning' : 'text-tertiary');
      ?>
    <div>
      <div class="flex justify-between text-body-sm font-body-sm mb-1">
        <span class="font-medium text-text-primary">
          <?= e($item['nm_barang']) ?><?= $item['warna'] ? ' - ' . e($item['warna']) : '' ?>
        </span>
        <span class="<?= $textColour ?> font-bold"><?= $net ?> units left</span>
        </div>
          <div class="w-full h-2 rounded-full bg-surface-container-high overflow-hidden">
          <div class="h-full <?= $colour ?> rounded-full" style="width: <?= $pct ?>%"></div>
          </div>
        </div>
      <?php endforeach; endif; ?>
    </div>

        <div class="mt-space-md pt-space-sm border-t border-border-default">
          <button
            class="w-full py-1.5 text-center text-title-sm font-title-sm text-primary hover:bg-primary-container hover:text-white border border-primary-container/60 rounded-lg transition-colors"
          >
            Create Stock Replenishment PO
          </button>
        </div>
      </div>

      <!-- Bento Widget 2: Top Selling Garments Ranking -->
      <div class="bg-surface-card rounded-lg border border-border-default shadow-sm p-space-md">
        <div class="flex items-center justify-between pb-space-sm border-b border-border-default">
          <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-primary" data-icon="leaderboard"
              >leaderboard</span
            >
            <h3 class="text-title-md font-title-md font-bold text-text-primary">
              Top-Selling Garments
            </h3>
          </div>
          <span class="text-label-sm font-label-sm text-text-muted">30-Day Window</span>
        </div>

        <div class="mt-space-md flex flex-col divide-y divide-border-subtle"> 
          <?php if (!$topSelling): ?>
            <p class="py-4 text-center text-text-muted text-body-sm">No sales yet.</p>
          <?php else: $rank = 0; foreach ($topSelling as $t): $rank++; ?>
            <div class="py-2.5 flex items-center justify-between">
              <div class="flex items-center gap-space-sm">
                <div class="w-7 h-7 rounded <?= $rank === 1 ? 'bg-primary-container/20 text-primary border-primary-container/40' : 'bg-surface-container-high text-secondary border-border-subtle' ?> border font-bold text-label-md flex items-center justify-center">
                  #<?= $rank ?>
                </div>
                <div>
                  <div class="text-title-sm font-title-sm text-text-primary font-medium"><?= e($t['nm_barang']) ?></div>
                  <div class="text-label-sm font-label-sm text-text-muted"><?= number_format((int)$t['units']) ?> Units Sold</div>
                </div>
              </div>
              <div class="text-right">
                <div class="font-bold text-text-primary text-body-sm"><?= e(rupiah($t['revenue'])) ?></div>
              </div>
            </div>
          <?php endforeach; endif; ?>
        </div>

        <div class="mt-space-md pt-space-sm border-t border-border-default">
          <a
            href="./products.php"
            class="w-full py-1.5 text-center text-title-sm font-title-sm text-primary hover:bg-primary-container hover:text-white border border-primary-container/60 rounded-lg transition-colors"
          >
            View Full Product Analytics
          </a>
        </div>

      <!-- Bento Widget 3: MySQL Database & XAMPP Server Status -->
      <div class="bg-surface-card rounded-lg border border-border-default shadow-sm p-space-md">
        <div class="flex items-center justify-between pb-space-sm border-b border-border-default">
          <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-tertiary" data-icon="dns">dns</span>
            <h3 class="text-title-md font-title-md font-bold text-text-primary">
              MySQL &amp; XAMPP Status
            </h3>
          </div>
          <span
            class="w-2.5 h-2.5 rounded-full bg-tertiary shadow-[0_0_8px_rgba(78,222,163,0.8)] animate-pulse"
            title="System Operational"
          ></span>
        </div>

        <div class="mt-space-md flex flex-col gap-2.5 text-body-sm font-body-sm">
          <div
            class="flex items-center justify-between p-2 rounded bg-surface-container-low border border-border-subtle"
          >
            <div class="flex items-center gap-2">
              <span class="material-symbols-outlined text-tertiary text-body-md" data-icon="check_circle"
                >check_circle</span
              >
              <span class="font-semibold text-text-primary">Apache Web Server</span>
            </div>
            <div
              class="text-label-sm font-label-sm bg-[#10b981]/20 text-[#6ee7b7] border border-[#10b981]/30 px-2 py-0.5 rounded font-bold"
            >
              Running :80
            </div>
          </div>
          <div
            class="flex items-center justify-between p-2 rounded bg-surface-container-low border border-border-subtle"
          >
            <div class="flex items-center gap-2">
              <span class="material-symbols-outlined text-tertiary text-body-md" data-icon="check_circle"
                >check_circle</span
              >
              <span class="font-semibold text-text-primary">MySQL Database</span>
            </div>
            <div
              class="text-label-sm font-label-sm bg-[#10b981]/20 text-[#6ee7b7] border border-[#10b981]/30 px-2 py-0.5 rounded font-bold"
            >
              Connected :3306
            </div>
          </div>
          <div
            class="p-2.5 rounded bg-surface-container-low border border-border-default text-label-sm font-label-sm flex flex-col gap-1 font-mono text-text-muted"
          >
            <div class="flex justify-between">
              <span>Database:</span>
              <span class="text-text-primary font-semibold"><?= e($db) ?></span>
            </div>
            <div class="flex justify-between">
              <span>Storage Engine:</span>
              <span class="text-text-primary"><?= e((int)db_scalar($conn, "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = '$db'")) ?></span>
            </div>
            <div class="flex justify-between">
              <span>Users:</span>
              <span class="text-tertiary font-bold"><?= number_format($totalCustomers) ?> customer(s)</span>
            </div>
            <div class="flex justify-between">
              <span>Latency:</span>
              <span class="text-tertiary font-bold">1.2ms (Localhost)</span>
            </div>
          </div>
        </div>

        <div class="mt-space-md pt-space-xs flex items-center justify-between">
          <a
            class="text-body-sm font-body-sm text-primary hover:underline flex items-center gap-1 font-semibold"
            href="#"
          >
            <span class="material-symbols-outlined text-body-md" data-icon="build">build</span>
            phpMyAdmin Console
          </a>
          <span class="text-label-sm font-label-sm text-text-muted">v4.0.0-rc</span>
        </div>
      </div>
    </div>
  </div>
</main>