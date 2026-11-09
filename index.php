<?php
require_once __DIR__ . '/localdata.php';
$pageTitle = 'AdminLTE 4 - E-Commerce Overview';
$activePage = 'dashboard';
?>

<!doctype html>
<html class="dark" data-bs-theme="dark" lang="en">
  <head>
    <?php include __DIR__ . '/head.php'; ?>
  </head>
  <body
    class="bg-surface text-on-surface font-body-md antialiased min-h-screen flex flex-col"
    data-bs-theme="dark"
  >
    <!-- Admin Shell Layout Wrapper -->
    <div class="flex flex-1 min-h-screen overflow-hidden">
      <!--begin::Sidebar-->
      <?php include __DIR__ . '/sidebar.php'; ?>
      <!--end::Sidebar-->

      <!-- MAIN RIGHT VIEWPORT CANVAS -->
      <div class="flex-1 flex flex-col min-w-0 bg-surface overflow-y-auto">
        <!--begin::Header-->
        <?php include __DIR__ . '/header.php'; ?>
        <!--end::Header-->

        <!--begin::App Main-->
        <?php include __DIR__ . '/home.php'; ?>
        <!--end::App Main-->

        <!--begin::Footer-->
        <?php include __DIR__ . '/footer.php'; ?>
        <!--end::Footer-->
      </div>
    </div>
  </body>
</html>