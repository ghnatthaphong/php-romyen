<?php include dirname(__FILE__) . '/env.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include dirname(__FILE__) . '/layout/link_style.php'; ?>
  <title><?= $site_name ?> | Login</title>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <p>
        <img src="<?php echo $GLOBALS['path_logo'] ?>" alt="<?= $site_name ?>" class="brand-image img-circle elevation-3" width="80" height="80" style="opacity: .8">
        <b>Administrator </b>
      </p>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
          <div class="input-group mb-3">
            <input type="text" name="username" require class="form-control" placeholder="Username" id="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" require id="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-6">
              <button onclick="login()" value="Sign In" class="btn btn-primary btn-block">Sign In</button> 
            </div>
            <!-- /.col -->
          </div>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->


  <?php include dirname(__FILE__) . '/layout/link_script.php'; ?>
  <script>
    /* function login */
    function login() {
      $.ajax({
        type: 'POST',
        data: { username: $('#username').val(), password: $('#password').val() },
        url: '../api/auth/login.php',
        dataType: 'JSON',
        success: function(res) {
          console.log(res)
          Toast.fire({
            icon: 'success',
            title: res.msg
          })
          setInterval(function(){
            window.location.href = 'index.html'
          }, 1000)
        },
        error: function(err) {
          Toast.fire({
            icon: 'error',
            title: err.responseJSON.msg
          })
        }
      })
    }
    /* function login */
  </script>
</body>

</html>