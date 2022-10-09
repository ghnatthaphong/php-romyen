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
  <a href="index3.html" class="brand-link">
    <img src="../dist/img/logo.png" alt="<?= $project_name ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
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
            <i class="nav-icon  fas fa-tachometer-alt"></i>
            <p>
              รายงาน
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
        <li class="nav-item <?php echo active_menu(['student_view.php', 'student_add.php', 'student_edit.php']) ?>">
          <a href="#" class="nav-link <?php echo active_page(['student_view.php', 'student_add.php']) ?>">
            <i class="bi bi-person-rolodex nav-icon"></i>
            <p>
              จัดการข้อมูลนักเรียน
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="student_view.html" class="nav-link <?php echo active_page(['student_view.php']) ?>">
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
        <li class="nav-item">
          <a href="logout.html" class="nav-link <?php echo active_page('logout.php') ?> ">
            <i class="nav-icon bi bi-box-arrow-left"></i>
            <p>
              ออกจากระบบ
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>