<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown show">
      <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
        <i class="bi bi-person-circle"><?= $_SESSION['user_firstname'] ?></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center" >
        <div class="dropdown-divider"></div>
        <a href="logout.html" class="dropdown-item">
          <i class="nav-icon bi bi-box-arrow-left"></i>
          ออกจากระบบ
        </a>
        <div class="dropdown-divider"></div>
      </div>
    </li>
  </ul>
</nav>