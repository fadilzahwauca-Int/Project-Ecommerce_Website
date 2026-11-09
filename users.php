<?php
require_once __DIR__ . '/localdata.php';
session_start();

$pageTitle  = 'AdminLTE 4 | Users';
$activePage = 'users';
$flash      = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
$errors     = [];
$openModal  = null;

/* ---------- POST handlers ---------- */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'create' || $action === 'update') {
        $id          = (int)($_POST['id_user'] ?? 0);
        $nm_user     = trim($_POST['nm_user'] ?? '');
        $email       = trim($_POST['email'] ?? '');
        $no_telp     = trim($_POST['no_telp'] ?? '');
        $alamat      = trim($_POST['alamat'] ?? '');
        $username    = trim($_POST['username'] ?? '');
        $password    = $_POST['password'] ?? '';
        $jns_kelamin = $_POST['jns_kelamin'] ?? 'Laki-laki';
        $role        = $_POST['role'] ?? 'user';

        if ($nm_user === '')                                    $errors[] = 'Nama lengkap wajib diisi.';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))          $errors[] = 'Email tidak valid.';
        if ($username === '')                                    $errors[] = 'Username wajib diisi.';
        if ($action === 'create' && $password === '')            $errors[] = 'Password wajib diisi.';
        if (!in_array($jns_kelamin, ['Laki-laki','Perempuan'], true)) $errors[] = 'Jenis kelamin tidak valid.';
        if (!in_array($role, ['user','admin'], true))            $errors[] = 'Role tidak valid.';

        if (!$errors) {
            // unique username
            $chk = mysqli_prepare($conn, "SELECT id_user FROM `user` WHERE username = ? AND id_user <> ? LIMIT 1");
            mysqli_stmt_bind_param($chk, 'si', $username, $id);
            mysqli_stmt_execute($chk);
            mysqli_stmt_store_result($chk);
            if (mysqli_stmt_num_rows($chk) > 0) $errors[] = 'Username sudah dipakai.';
            mysqli_stmt_close($chk);
        }

        if (!$errors) {
            if ($action === 'create') {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $s = mysqli_prepare($conn, "INSERT INTO `user` (nm_user, jns_kelamin, no_telp, email, alamat, username, password, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                mysqli_stmt_bind_param($s, 'ssssssss', $nm_user, $jns_kelamin, $no_telp, $email, $alamat, $username, $hash, $role);
                mysqli_stmt_execute($s);
                mysqli_stmt_close($s);
                $_SESSION['flash'] = ['success', 'User "' . $nm_user . '" berhasil dibuat.'];
            } else {
                if ($password !== '') {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $s = mysqli_prepare($conn, "UPDATE `user` SET nm_user=?, jns_kelamin=?, no_telp=?, email=?, alamat=?, username=?, password=?, role=? WHERE id_user=?");
                    mysqli_stmt_bind_param($s, 'ssssssssi', $nm_user, $jns_kelamin, $no_telp, $email, $alamat, $username, $hash, $role, $id);
                } else {
                    $s = mysqli_prepare($conn, "UPDATE `user` SET nm_user=?, jns_kelamin=?, no_telp=?, email=?, alamat=?, username=?, role=? WHERE id_user=?");
                    mysqli_stmt_bind_param($s, 'sssssssi', $nm_user, $jns_kelamin, $no_telp, $email, $alamat, $username, $role, $id);
                }
                mysqli_stmt_execute($s);
                mysqli_stmt_close($s);
                $_SESSION['flash'] = ['success', 'User "' . $nm_user . '" berhasil diperbarui.'];
            }
            header('Location: users.php');
            exit;
        }

        $openModal = $action === 'create' ? 'modal-add-user' : 'modal-edit-user';
    }

    if ($action === 'delete') {
        $id = (int)($_POST['id_user'] ?? 0);
        if ($id > 0) {
            $s = mysqli_prepare($conn, "DELETE FROM `user` WHERE id_user = ?");
            mysqli_stmt_bind_param($s, 'i', $id);
            mysqli_stmt_execute($s);
            mysqli_stmt_close($s);
            $_SESSION['flash'] = ['success', 'User dihapus.'];
        }
        header('Location: users.php');
        exit;
    }
}

/* ---------- Filters + pagination ---------- */
$q       = trim($_GET['q'] ?? '');
$role    = $_GET['role'] ?? 'all';
$allowed = ['user','admin'];

$where  = [];
$params = [];
$types  = '';
if ($q !== '') {
    $where[]  = '(nm_user LIKE ? OR email LIKE ? OR username LIKE ?)';
    $like = "%$q%";
    $params[] = $like; $params[] = $like; $params[] = $like;
    $types .= 'sss';
}
if (in_array($role, $allowed, true)) {
    $where[]  = 'role = ?';
    $params[] = $role;
    $types .= 's';
}
$whereSql = $where ? ' WHERE ' . implode(' AND ', $where) : '';

$perPage = 9;
$page    = max(1, (int)($_GET['page'] ?? 1));

$count = mysqli_prepare($conn, "SELECT COUNT(*) AS c FROM `user`" . $whereSql);
if ($params) mysqli_stmt_bind_param($count, $types, ...$params);
mysqli_stmt_execute($count);
$total = (int)(mysqli_fetch_assoc(mysqli_stmt_get_result($count))['c'] ?? 0);
mysqli_stmt_close($count);

$totalPages = max(1, (int)ceil($total / $perPage));
$page       = min($page, $totalPages);
$offset     = ($page - 1) * $perPage;

$lst = mysqli_prepare($conn, "SELECT * FROM `user`" . $whereSql . " ORDER BY id_user DESC LIMIT ? OFFSET ?");
$listParams = $params;
$listParams[] = $perPage;
$listParams[] = $offset;
mysqli_stmt_bind_param($lst, $types . 'ii', ...$listParams);
mysqli_stmt_execute($lst);
$users = mysqli_fetch_all(mysqli_stmt_get_result($lst), MYSQLI_ASSOC);
mysqli_stmt_close($lst);

$qBase = array_filter(['q' => $q, 'role' => $role === 'all' ? null : $role]);
$pageUrl = fn ($p) => 'users.php?' . http_build_query(array_merge($qBase, ['page' => $p]));
$from = $total === 0 ? 0 : $offset + 1;
$to   = $offset + count($users);

// Re-open modal with old values
$old = $openModal === 'modal-add-user' ? $_POST : ($openModal === 'modal-edit-user' ? $_POST : []);
?>

<!doctype html>
<html class="dark" data-bs-theme="dark" lang="en">
<head>
  <?php include __DIR__ . '/head.php'; ?>
</head>
<body class="bg-surface text-on-surface font-body-md antialiased min-h-screen flex flex-col" data-bs-theme="dark">
<div class="flex flex-1 min-h-screen overflow-hidden">

  <?php include __DIR__ . '/sidebar.php'; ?>

  <div class="flex-1 flex flex-col min-w-0 bg-surface overflow-y-auto">

    <?php include __DIR__ . '/header.php'; ?>

    <main class="flex-1 p-space-md md:p-space-lg flex flex-col gap-space-lg">

      <!-- Breadcrumb + title -->
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-space-sm pb-space-sm border-b border-border-default">
        <div>
          <nav class="flex items-center gap-1.5 text-body-sm font-body-sm text-text-muted mb-1">
            <a class="hover:text-primary flex items-center gap-1" href="./index.php">
              <span class="material-symbols-outlined text-body-sm">home</span> Home
            </a>
            <span>/</span>
            <a class="hover:text-primary" href="#">Admin</a>
            <span>/</span>
            <span class="text-text-primary font-semibold">Users</span>
          </nav>
          <h1 class="text-headline-md font-headline-md text-text-primary font-bold tracking-tight">
            User Directory
          </h1>
        </div>
        <div class="flex items-center gap-2">
          <a href="./index.php" class="text-body-sm font-body-sm text-text-muted hover:text-primary flex items-center gap-1">
            <span class="material-symbols-outlined text-body-md">arrow_back</span> Back to Dashboard
          </a>
          <button type="button" class="flex items-center gap-1.5 bg-primary-container hover:bg-blue-600 text-white px-space-md py-1.5 rounded-lg text-title-sm font-title-sm shadow-sm"
                  data-bs-toggle="modal" data-bs-target="#modal-add-user">
            <span class="material-symbols-outlined text-body-md">person_add</span>
            New User
          </button>
        </div>
      </div>

      <?php if ($flash): ?>
        <div class="alert-<?= e($flash[0]) ?> flex items-center gap-2 px-space-md py-space-sm rounded-lg border
          <?= $flash[0] === 'success' ? 'bg-[#10b981]/15 border-[#10b981]/40 text-[#6ee7b7]' : 'bg-badge-danger/15 border-badge-danger/40 text-[#fca5a5]' ?>">
          <span class="material-symbols-outlined text-body-md"><?= $flash[0] === 'success' ? 'check_circle' : 'error' ?></span>
          <?= e($flash[1]) ?>
        </div>
      <?php endif; ?>

      <!-- Card -->
      <div class="bg-surface-card rounded-lg border border-border-default shadow-sm overflow-hidden">

        <!-- Filters -->
        <form method="get" class="p-space-md border-b border-border-default flex flex-col md:flex-row md:items-center gap-2 md:justify-between">
          <div class="flex items-center gap-2 w-full md:w-auto">
            <div class="relative flex-1 md:flex-initial">
              <span class="material-symbols-outlined absolute left-2.5 top-1/2 -translate-y-1/2 text-outline text-body-md">search</span>
              <input type="search" name="q" value="<?= e($q) ?>" placeholder="Search users…"
                     class="w-full md:w-64 bg-surface-container-low border border-border-default rounded-lg pl-9 pr-3 py-1.5 text-body-md text-text-primary placeholder:text-text-muted focus:bg-surface-container focus:border-primary-container outline-none" />
            </div>
            <select name="role" class="bg-surface-container-low border border-border-default rounded-lg px-2 py-1.5 text-body-md text-text-primary">
              <option value="all"  <?= $role === 'all' ? 'selected' : '' ?>>All roles</option>
              <option value="admin" <?= $role === 'admin' ? 'selected' : '' ?>>Admin</option>
              <option value="user"  <?= $role === 'user' ? 'selected' : '' ?>>User</option>
            </select>
            <button type="submit" class="px-3 py-1.5 bg-surface-container border border-border-default rounded-lg text-body-md hover:bg-surface-hover">
              Filter
            </button>
          </div>
          <div class="text-body-sm text-text-muted">
            Showing <strong class="text-text-primary"><?= $from ?></strong>–<strong class="text-text-primary"><?= $to ?></strong>
            of <strong class="text-text-primary"><?= number_format($total) ?></strong> users
          </div>
        </form>

        <!-- Table -->
        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse">
            <thead>
              <tr class="bg-surface-container-low text-text-muted text-label-sm font-label-sm uppercase tracking-wider border-b border-border-default">
                <th class="py-2.5 px-space-md">User</th>
                <th class="py-2.5 px-space-md">Email</th>
                <th class="py-2.5 px-space-md">Phone</th>
                <th class="py-2.5 px-space-md">Username</th>
                <th class="py-2.5 px-space-md">Role</th>
                <th class="py-2.5 px-space-md text-right">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-border-subtle text-body-sm font-body-sm">
              <?php if (!$users): ?>
                <tr><td colspan="6" class="py-8 text-center text-text-muted">Tidak ada user yang cocok.</td></tr>
              <?php else: foreach ($users as $u): ?>
                <tr class="hover:bg-surface-hover/60 transition-colors">
                  <td class="py-3 px-space-md">
                    <div class="flex items-center gap-2">
                      <div class="w-8 h-8 rounded-full bg-primary-container/20 text-primary border border-primary-container/40 flex items-center justify-center font-bold text-label-md">
                        <?= e(strtoupper(substr($u['nm_user'], 0, 1))) ?>
                      </div>
                      <div class="flex flex-col">
                        <span class="font-medium text-text-primary"><?= e($u['nm_user']) ?></span>
                        <span class="text-label-sm text-text-muted"><?= e($u['jns_kelamin']) ?></span>
                      </div>
                    </div>
                  </td>
                  <td class="py-3 px-space-md text-text-primary"><?= e($u['email']) ?></td>
                  <td class="py-3 px-space-md text-text-secondary"><?= e($u['no_telp'] ?: '—') ?></td>
                  <td class="py-3 px-space-md font-mono text-text-primary"><?= e($u['username']) ?></td>
                  <td class="py-3 px-space-md">
                    <span class="border text-label-sm font-label-sm px-2.5 py-0.5 rounded-full font-bold uppercase inline-block
                      <?= $u['role'] === 'admin' ? 'bg-badge-danger/20 text-[#fca5a5] border-badge-danger/30' : 'bg-primary-container/20 text-primary border-primary-container/30' ?>">
                      <?= e($u['role']) ?>
                    </span>
                  </td>
                  <td class="py-3 px-space-md text-right">
                    <div class="inline-flex gap-1">
                      <button type="button"
                              class="p-1.5 text-text-muted hover:text-primary rounded hover:bg-surface-hover btn-edit-user"
                              data-id="<?= (int)$u['id_user'] ?>"
                              data-nm="<?= e($u['nm_user']) ?>"
                              data-jk="<?= e($u['jns_kelamin']) ?>"
                              data-telp="<?= e($u['no_telp']) ?>"
                              data-email="<?= e($u['email']) ?>"
                              data-alamat="<?= e($u['alamat']) ?>"
                              data-user="<?= e($u['username']) ?>"
                              data-role="<?= e($u['role']) ?>"
                              data-bs-toggle="modal" data-bs-target="#modal-edit-user"
                              title="Edit">
                        <span class="material-symbols-outlined text-body-md">edit</span>
                      </button>
                      <button type="button"
                              class="p-1.5 text-text-muted hover:text-error rounded hover:bg-surface-hover btn-delete-user"
                              data-id="<?= (int)$u['id_user'] ?>"
                              data-name="<?= e($u['nm_user']) ?>"
                              data-bs-toggle="modal" data-bs-target="#modal-delete-user"
                              title="Delete">
                        <span class="material-symbols-outlined text-body-md">delete</span>
                      </button>
                    </div>
                  </td>
                </tr>
              <?php endforeach; endif; ?>
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
          <div class="flex items-center justify-between px-space-md py-space-sm bg-surface-container-low border-t border-border-default">
            <div class="text-body-sm text-text-muted">Page <?= $page ?> of <?= $totalPages ?></div>
            <div class="flex items-center gap-1">
              <a href="<?= e($pageUrl(max(1, $page-1))) ?>"
                 class="px-2 py-1 rounded bg-surface-card border border-border-default <?= $page<=1?'opacity-40 pointer-events-none':'' ?> text-text-muted">Previous</a>
              <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                <a href="<?= e($pageUrl($p)) ?>"
                   class="px-2.5 py-1 rounded text-body-sm <?= $p===$page?'bg-primary-container text-white font-bold':'bg-surface-card border border-border-default hover:bg-surface-hover text-text-primary' ?>">
                  <?= $p ?>
                </a>
              <?php endfor; ?>
              <a href="<?= e($pageUrl(min($totalPages, $page+1))) ?>"
                 class="px-2 py-1 rounded bg-surface-card border border-border-default <?= $page>=$totalPages?'opacity-40 pointer-events-none':'' ?> text-text-muted">Next</a>
            </div>
          </div>
        <?php endif; ?>

      </div>

      <!-- Add User Modal -->
      <div class="modal fade" id="modal-add-user" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <form method="post" action="users.php" class="modal-content bg-surface-card border border-border-default">
            <input type="hidden" name="action" value="create" />
            <div class="modal-header border-b border-border-default">
              <h5 class="modal-title text-headline-sm font-headline-sm text-text-primary">Add New User</h5>
              <button type="button" class="text-text-muted hover:text-error p-1" data-bs-dismiss="modal" aria-label="Close">
                <span class="material-symbols-outlined">close</span>
              </button>
            </div>
            <div class="modal-body space-y-3">
              <?php if ($openModal === 'modal-add-user' && $errors): ?>
                <div class="bg-badge-danger/15 border border-badge-danger/40 text-[#fca5a5] text-body-sm rounded-lg px-space-sm py-2">
                  <?php foreach ($errors as $er): ?><div><?= e($er) ?></div><?php endforeach; ?>
                </div>
              <?php endif; ?>

              <div>
                <label class="block text-label-md text-text-muted uppercase mb-1">Nama Lengkap</label>
                <input name="nm_user" required value="<?= e($old['nm_user'] ?? '') ?>"
                       class="w-full bg-surface-container-low border border-border-default rounded-lg px-3 py-1.5 text-text-primary" />
              </div>
              <div class="grid grid-cols-2 gap-2">
                <div>
                  <label class="block text-label-md text-text-muted uppercase mb-1">Jenis Kelamin</label>
                  <select name="jns_kelamin" class="w-full bg-surface-container-low border border-border-default rounded-lg px-3 py-1.5 text-text-primary">
                    <option <?= ($old['jns_kelamin'] ?? '') === 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                    <option <?= ($old['jns_kelamin'] ?? '') === 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                  </select>
                </div>
                <div>
                  <label class="block text-label-md text-text-muted uppercase mb-1">Role</label>
                  <select name="role" class="w-full bg-surface-container-low border border-border-default rounded-lg px-3 py-1.5 text-text-primary">
                    <option value="user"  <?= ($old['role'] ?? 'user') === 'user' ? 'selected' : '' ?>>User</option>
                    <option value="admin" <?= ($old['role'] ?? '') === 'admin' ? 'selected' : '' ?>>Admin</option>
                  </select>
                </div>
              </div>
              <div>
                <label class="block text-label-md text-text-muted uppercase mb-1">No. Telepon</label>
                <input name="no_telp" value="<?= e($old['no_telp'] ?? '') ?>"
                       class="w-full bg-surface-container-low border border-border-default rounded-lg px-3 py-1.5 text-text-primary" />
              </div>
              <div>
                <label class="block text-label-md text-text-muted uppercase mb-1">Email</label>
                <input type="email" name="email" required value="<?= e($old['email'] ?? '') ?>"
                       class="w-full bg-surface-container-low border border-border-default rounded-lg px-3 py-1.5 text-text-primary" />
              </div>
              <div>
                <label class="block text-label-md text-text-muted uppercase mb-1">Alamat</label>
                <textarea name="alamat" rows="2"
                          class="w-full bg-surface-container-low border border-border-default rounded-lg px-3 py-1.5 text-text-primary"><?= e($old['alamat'] ?? '') ?></textarea>
              </div>
              <div class="grid grid-cols-2 gap-2">
                <div>
                  <label class="block text-label-md text-text-muted uppercase mb-1">Username</label>
                  <input name="username" required value="<?= e($old['username'] ?? '') ?>"
                         class="w-full bg-surface-container-low border border-border-default rounded-lg px-3 py-1.5 text-text-primary" />
                </div>
                <div>
                  <label class="block text-label-md text-text-muted uppercase mb-1">Password</label>
                  <input type="password" name="password" required
                         class="w-full bg-surface-container-low border border-border-default rounded-lg px-3 py-1.5 text-text-primary" />
                </div>
              </div>
            </div>
            <div class="modal-footer border-t border-border-default">
              <button type="button" data-bs-dismiss="modal"
                      class="px-3 py-1.5 rounded-lg bg-surface-container border border-border-default text-text-secondary hover:bg-surface-hover">Cancel</button>
              <button type="submit"
                      class="px-3 py-1.5 rounded-lg bg-primary-container hover:bg-blue-600 text-white font-bold">Create User</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Edit User Modal -->
      <div class="modal fade" id="modal-edit-user" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <form method="post" action="users.php" class="modal-content bg-surface-card border border-border-default">
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="id_user" id="edit-id" value="<?= (int)($old['id_user'] ?? 0) ?>" />
            <div class="modal-header border-b border-border-default">
              <h5 class="modal-title text-headline-sm font-headline-sm text-text-primary">Edit User</h5>
              <button type="button" class="text-text-muted hover:text-error p-1" data-bs-dismiss="modal" aria-label="Close">
                <span class="material-symbols-outlined">close</span>
              </button>
            </div>
            <div class="modal-body space-y-3">
              <div>
                <label class="block text-label-md text-text-muted uppercase mb-1">Nama Lengkap</label>
                <input name="nm_user" id="edit-nm" required value="<?= e($old['nm_user'] ?? '') ?>"
                       class="w-full bg-surface-container-low border border-border-default rounded-lg px-3 py-1.5 text-text-primary" />
              </div>
              <div class="grid grid-cols-2 gap-2">
                <div>
                  <label class="block text-label-md text-text-muted uppercase mb-1">Jenis Kelamin</label>
                  <select name="jns_kelamin" id="edit-jk" class="w-full bg-surface-container-low border border-border-default rounded-lg px-3 py-1.5 text-text-primary">
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                  </select>
                </div>
                <div>
                  <label class="block text-label-md text-text-muted uppercase mb-1">Role</label>
                  <select name="role" id="edit-role" class="w-full bg-surface-container-low border border-border-default rounded-lg px-3 py-1.5 text-text-primary">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                  </select>
                </div>
              </div>
              <div>
                <label class="block text-label-md text-text-muted uppercase mb-1">No. Telepon</label>
                <input name="no_telp" id="edit-telp" value="<?= e($old['no_telp'] ?? '') ?>"
                       class="w-full bg-surface-container-low border border-border-default rounded-lg px-3 py-1.5 text-text-primary" />
              </div>
              <div>
                <label class="block text-label-md text-text-muted uppercase mb-1">Email</label>
                <input type="email" name="email" id="edit-email" required value="<?= e($old['email'] ?? '') ?>"
                       class="w-full bg-surface-container-low border border-border-default rounded-lg px-3 py-1.5 text-text-primary" />
              </div>
              <div>
                <label class="block text-label-md text-text-muted uppercase mb-1">Alamat</label>
                <textarea name="alamat" id="edit-alamat" rows="2"
                          class="w-full bg-surface-container-low border border-border-default rounded-lg px-3 py-1.5 text-text-primary"><?= e($old['alamat'] ?? '') ?></textarea>
              </div>
              <div class="grid grid-cols-2 gap-2">
                <div>
                  <label class="block text-label-md text-text-muted uppercase mb-1">Username</label>
                  <input name="username" id="edit-user" required value="<?= e($old['username'] ?? '') ?>"
                         class="w-full bg-surface-container-low border border-border-default rounded-lg px-3 py-1.5 text-text-primary" />
                </div>
                <div>
                  <label class="block text-label-md text-text-muted uppercase mb-1">Password (blank = keep)</label>
                  <input type="password" name="password"
                         class="w-full bg-surface-container-low border border-border-default rounded-lg px-3 py-1.5 text-text-primary" />
                </div>
              </div>
            </div>
            <div class="modal-footer border-t border-border-default">
              <button type="button" data-bs-dismiss="modal"
                      class="px-3 py-1.5 rounded-lg bg-surface-container border border-border-default text-text-secondary hover:bg-surface-hover">Cancel</button>
              <button type="submit"
                      class="px-3 py-1.5 rounded-lg bg-primary-container hover:bg-blue-600 text-white font-bold">Save Changes</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Delete Modal -->
      <div class="modal fade" id="modal-delete-user" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <form method="post" action="users.php" class="modal-content bg-surface-card border border-border-default">
            <input type="hidden" name="action" value="delete" />
            <input type="hidden" name="id_user" id="delete-id" value="0" />
            <div class="modal-header border-b border-border-default">
              <h5 class="modal-title text-headline-sm font-headline-sm text-text-primary">Delete User</h5>
              <button type="button" class="text-text-muted hover:text-error p-1" data-bs-dismiss="modal" aria-label="Close">
                <span class="material-symbols-outlined">close</span>
              </button>
            </div>
            <div class="modal-body text-text-primary">
              <p>Yakin ingin menghapus <strong id="delete-name" class="text-error">user ini</strong>?</p>
              <p class="text-body-sm text-text-muted mt-2">Tindakan ini tidak bisa dibatalkan.</p>
            </div>
            <div class="modal-footer border-t border-border-default">
              <button type="button" data-bs-dismiss="modal"
                      class="px-3 py-1.5 rounded-lg bg-surface-container border border-border-default text-text-secondary hover:bg-surface-hover">Cancel</button>
              <button type="submit"
                      class="px-3 py-1.5 rounded-lg bg-badge-danger hover:bg-red-500 text-white font-bold">Delete</button>
            </div>
          </form>
        </div>
      </div>

    </main>

    <?php include __DIR__ . '/footer.php'; ?>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.btn-edit-user').forEach((b) => {
      b.addEventListener('click', () => {
        const d = b.dataset;
        document.getElementById('edit-id').value     = d.id;
        document.getElementById('edit-nm').value     = d.nm;
        document.getElementById('edit-jk').value     = d.jk;
        document.getElementById('edit-telp').value   = d.telp;
        document.getElementById('edit-email').value  = d.email;
        document.getElementById('edit-alamat').value = d.alamat;
        document.getElementById('edit-user').value   = d.user;
        document.getElementById('edit-role').value   = d.role;
      });
    });
    document.querySelectorAll('.btn-delete-user').forEach((b) => {
      b.addEventListener('click', () => {
        document.getElementById('delete-id').value = b.dataset.id;
        document.getElementById('delete-name').textContent = b.dataset.name;
      });
    });
    <?php if ($openModal): ?>
    new bootstrap.Modal(document.getElementById('<?= e($openModal) ?>')).show();
    <?php endif; ?>
  });
</script>
</body>
</html>
