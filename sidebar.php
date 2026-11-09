<?php
$activePage = $activePage ?? 'dashboard';
$isA = fn ($p) => $activePage === $p ? 'active' : '';

$sbProducts  = (int) db_scalar($conn, "SELECT COUNT(*) FROM barang");
$sbOrders    = (int) db_scalar($conn, "SELECT COUNT(*) FROM transaksi");
$sbCustomers = (int) db_scalar($conn, "SELECT COUNT(*) FROM `user` WHERE role = 'user'");

$navBase   = 'text-text-secondary hover:bg-surface-hover hover:text-text-primary rounded-lg font-body-md px-space-md py-space-sm flex items-center justify-between transition-colors duration-150';
$navActive = 'bg-primary-container text-white rounded-lg font-title-sm px-space-md py-space-sm flex items-center justify-between shadow-sm';
?>

<aside class="flex flex-col justify-between w-64 h-screen p-space-md border-r border-border-default bg-surface-container-lowest sticky top-0 shrink-0 z-50">

  <div class="flex flex-col gap-space-md">

    <div class="flex items-center gap-space-sm pb-space-sm border-b border-border-default">
      <div class="w-9 h-9 rounded-lg bg-primary-container text-white flex items-center justify-center font-bold text-headline-sm shadow-sm">
        <span class="material-symbols-outlined">storefront</span>
      </div>
      <div class="flex flex-col">
        <span class="text-title-md font-title-md font-bold text-text-primary">AdminLTE 4</span>
        <span class="text-label-sm font-label-sm text-text-muted">E-Commerce Store Suite</span>
      </div>
    </div>

    <div class="flex items-center gap-space-sm py-space-xs px-space-xs bg-surface-container-low rounded-lg border border-border-default">
      <img class="w-10 h-10 rounded-full object-cover border border-border-subtle"
           src="./assets/img/user2-160x160.jpg" alt="Admin" />
      <div class="flex flex-col min-w-0">
        <span class="text-title-sm font-title-sm truncate text-text-primary font-semibold">Administrator</span>
        <span class="text-label-sm font-label-sm text-tertiary font-semibold flex items-center gap-1">
          <span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span> Super Admin
        </span>
      </div>
    </div>

    <nav class="flex flex-col gap-1 mt-space-xs">

      <a class="<?= $activePage === 'dashboard' ? $navActive : $navBase ?>" href="./index.php">
        <div class="flex items-center gap-space-sm">
          <span class="material-symbols-outlined">dashboard</span>
          <span class="font-semibold">Dashboard</span>
        </div>
        <span class="text-label-sm font-label-sm bg-white/20 px-1.5 py-0.5 rounded font-bold">Core</span>
      </a>

      <a class="<?= $activePage === 'products' ? $navActive : $navBase ?>" href="./products.php">
        <div class="flex items-center gap-space-sm">
          <span class="material-symbols-outlined text-outline">inventory_2</span>
          <span>Inventory &amp; Products</span>
        </div>
        <span class="text-label-sm font-label-sm bg-surface-container-high text-on-surface-variant px-2 py-0.5 rounded-full font-semibold"><?= number_format($sbProducts) ?></span>
      </a>

      <a class="<?= $activePage === 'orders' ? $navActive : $navBase ?>" href="./orders.php">
        <div class="flex items-center gap-space-sm">
          <span class="material-symbols-outlined text-outline">local_shipping</span>
          <span>Orders &amp; Shipments</span>
        </div>
        <span class="text-label-sm font-label-sm bg-tertiary/20 text-tertiary px-2 py-0.5 rounded-full font-semibold border border-tertiary/30"><?= number_format($sbOrders) ?> Total</span>
      </a>

      <a class="<?= $activePage === 'customers' ? $navActive : $navBase ?>" href="./customers.php">
        <div class="flex items-center gap-space-sm">
          <span class="material-symbols-outlined text-outline">group</span>
          <span>Customers</span>
        </div>
        <span class="text-label-sm font-label-sm bg-surface-container-high text-text-muted px-2 py-0.5 rounded-full font-semibold"><?= number_format($sbCustomers) ?></span>
      </a>

      <a class="<?= $activePage === 'categories' ? $navActive : $navBase ?>" href="./categories.php">
        <div class="flex items-center gap-space-sm">
          <span class="material-symbols-outlined text-outline">category</span>
          <span>Categories</span>
        </div>
      </a>

      <a class="<?= $activePage === 'users' ? $navActive : $navBase ?>" href="./users.php">
        <div class="flex items-center gap-space-sm">
          <span class="material-symbols-outlined text-outline">database</span>
          <span>Users</span>
        </div>
        <span class="w-2 h-2 rounded-full bg-tertiary ring-2 ring-tertiary/20" title="MySQL Connected"></span>
      </a>

    </nav>
  </div>

  <div class="flex flex-col gap-space-sm pt-space-md border-t border-border-default">
    <a href="./mainpage.php" class="flex items-center justify-center gap-space-xs w-full py-space-sm px-space-md bg-surface-card hover:bg-surface-hover text-text-primary border border-border-default rounded-lg font-title-sm transition-colors shadow-sm">
      <span class="material-symbols-outlined">open_in_new</span>
      <span>Storefront Live View</span>
    </a>
    <div class="flex flex-col gap-0.5">
      <a href="#" class="flex items-center gap-space-sm text-text-muted hover:text-text-primary text-body-sm font-body-sm px-space-sm py-1.5 rounded transition-colors">
        <span class="material-symbols-outlined text-body-lg">settings</span>
        <span>System Settings</span>
      </a>
      <a href="#" class="flex items-center gap-space-sm text-text-muted hover:text-text-primary text-body-sm font-body-sm px-space-sm py-1.5 rounded transition-colors">
        <span class="material-symbols-outlined text-body-lg">receipt_long</span>
        <span>Audit Logs</span>
      </a>
    </div>
  </div>
</aside>