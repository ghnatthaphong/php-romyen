<?php

function active_menu($arr_page = array())
{
  foreach ($arr_page as $value) {
    if ($_SERVER['PHP_SELF'] == '/' . $GLOBALS['project_name'] . '/pages/' . $value) {
      return 'menu-open';
    }
  }
  return 'menu-close';
}

function active_page($active_page = array())
{
  foreach ($active_page as $value) {
    if ($_SERVER['PHP_SELF'] == '/' . $GLOBALS['project_name'] . '/pages/' . $value) {
      return 'active';
    }
  }
  return '';
}
?>
<aside class="main-sidebar sidebar-light-success elevation-4">
  <!-- Brand Logo -->
  <a href="index.html" class="brand-link">
    <img src="<?= $GLOBALS['path_logo'] ?>" alt="<?= $project_name ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><?= $site_name ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="my-2"></div>
    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="index.html" class="nav-link <?php echo active_page(['index.php']) ?> ">
            <i class="nav-icon bi bi-graph-up-arrow"></i>
            <p>
              รายงาน
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
        <li class="nav-item <?php echo active_menu(['student_view.php', 'student_add.php', 'student_edit.php']) ?>">
          <a href="#" class="nav-link <?php echo active_page(['student_view.php', 'student_add.php', 'student_edit.php']) ?>">
            <i class="bi bi-person-rolodex nav-icon"></i>
            <p>
              จัดการข้อมูลนักเรียน
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="student_view.html" class="nav-link <?php echo active_page(['student_view.php', 'student_edit.php']) ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>รายชื่อนักเรียน</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="student_add.html" class="nav-link <?php echo active_page(['student_add.php']) ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>ฟอร์มสมัครเรียน</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- permission admin -->
        <?php if ($_SESSION['user_role']  === 'admin') { ?>
          <?php $all_page_product = array('product_view.php', 'product_add.php', 'product_edit.php', 'finance_view.php', 'finance_add.php', 'finance_edit.php'); ?>
          <li class="nav-item <?php echo active_menu($all_page_product) ?>">
            <a href="#" class="nav-link <?php echo active_page($all_page_product) ?>">
              <i class="bi bi-bar-chart nav-icon"></i>
              <p>
                จัดการค่าใช้จ่าย
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="finance_view.html" class="nav-link <?php echo active_page(['finance_view.php', 'finance_edit.php']) ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>รายการค่าใช้จ่าย</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="product_view.html" class="nav-link <?php echo active_page(['prduct_view.php', 'product_add.php']) ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>รายการข้อมูลสินค้า</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php echo active_menu(['user_view.php', 'user_add.php', 'user_edit.php']) ?>">
            <a href="#" class="nav-link <?php echo active_page(['user_view.php', 'user_add.php', 'user_edit.php']) ?>">
              <i class="bi bi-people nav-icon"></i>
              <p>
                จัดการข้อมูลสมาชิก
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user_view.html" class="nav-link <?php echo active_page(['user_view.php', 'user_edit.php']) ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>รายชื่อสมาชิก</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="user_add.html" class="nav-link <?php echo active_page(['user_add.php']) ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เพิ่มสามาชิก</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>
        <!-- permission admin -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>