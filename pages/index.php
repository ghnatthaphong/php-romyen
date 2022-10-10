<?php $page_name = 'รายงาน' ?>
<?php include dirname(__FILE__).'/env.php' ?>
<?php include dirname(__FILE__).'/layout/check_user.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $site_name ?> | <?= $page_name ?></title>
  <?php include dirname(__FILE__).'/layout/link_style.php' ?>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="<?= $GLOBALS['class_body'] ?>">
<div class="wrapper">

  <?php include dirname(__FILE__).'/layout/preloader.php' ?>
  <?php include dirname(__FILE__).'/layout/navbar.php' ?>
  <?php include dirname(__FILE__).'/layout/sidebar.php' ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?php include dirname(__FILE__).'/layout/header.php' ?>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Online Store Visitors</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">820</span>
                    <span>Visitors Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include dirname(__FILE__).'/layout/footer.php' ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
  <?php include dirname(__FILE__).'/layout/link_script.php' ?>
  <!-- chart -->
  <script src="../plugins/chart.js/Chart.min.js"></script>
  <script src="../dist/js/pages/dashboard3.js"></script>
</body>
</html>
