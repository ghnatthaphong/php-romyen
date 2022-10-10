<?php $page_name = 'แก้ไขข้อมูลสมาชิก' ?>
<?php include dirname(__FILE__) . '/layout/get_model.php' ?>
<?php include dirname(__FILE__) . '/env.php' ?>
<?php include dirname(__FILE__) . '/layout/check_user.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $site_name ?> | <?= $page_name ?></title>
    <?php include dirname(__FILE__) . '/layout/link_style.php' ?>
</head>

<body class="<?= $GLOBALS['class_body'] ?>">
    <div class="wrapper">

        <?php include dirname(__FILE__) . '/layout/preloader.php' ?>
        <?php include dirname(__FILE__) . '/layout/navbar.php' ?>
        <?php include dirname(__FILE__) . '/layout/sidebar.php' ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php include dirname(__FILE__) . '/layout/header.php' ?>
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= $page_name ?></h3>
                        </div>
                        <div class="card-body">
                            <form id="form-add" method="post">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="prefix">คำนำหน้า <span class="text-danger">*</span></label>
                                        <select name="prefix" class="custom-select">
                                            <?php $i = 0;  foreach($prefix_arr as $value) { ?>
                                                <?php if($i < 2) {$i++; continue;} ?>
                                                <option value="<?= $value['name'] ?>"><?= $value['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="firstname">ชื่อ <span class="text-danger">*</span></label>
                                        <input required type="text" name="firstname" class="form-control" placeholder="ชื่อ">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="lastname">นามสกุล <span class="text-danger">*</span></label>
                                        <input required type="text" name="lastname" class="form-control" placeholder="นามสกุล">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="phone">เบอร์ติดต่อ</label>
                                        <input type="text" name="phone" oninput="validate_phone()" id="phone" class="form-control" placeholder="เบอร์ติดต่อ">
                                    </div>
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="username">ชื่อผู้ใช้ <span class="text-danger">*</span></label>
                                        <input type="text" disabled name="username" class="form-control" placeholder="ชื่อผู้ใช้">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="password">รหัสผ่าน <span class="text-danger">*</span></label>
                                        <input type="password" name="password" class="form-control" placeholder="รหัสผ่าน">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="role">ตำแหน่ง <span class="text-danger">*</span></label>
                                        <select name="role" class="custom-select">
                                            <?php foreach($role_arr as $value) { ?>
                                                <option value="<?= $value['name'] ?>"><?= $value['name'] == 'admin'? 'ผู้ดูแลระบบ': $value['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-3 d-flex justify-content-between">
                                        <p> </p>
                                        <div class="">
                                            <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
                                            <input type="submit" value="บันทึกข้อมูล" class="btn btn-primary">
                                            <a href="user_view.html" class="btn btn-default">ย้อนกลับ</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./wrapper -->

    <?php include dirname(__FILE__) . '/layout/footer.php' ?>
    <!-- REQUIRED SCRIPTS -->
    <?php include dirname(__FILE__) . '/layout/link_script.php' ?>
    <script>
       function validate_phone() {
        let phone = $('#phone').val();
         if(phone.length == 0 ) {
            $('#phone').removeClass('is-invalid')
            $('#phone').removeClass('is-valid')
            $('#submit-form-add').attr('disabled', false)
         }else if(phone.length == 10){
            $('#phone').addClass('is-valid')
            $('#phone').removeClass('is-invalid')
            $('#submit-form-add').attr('disabled', false)
         }else {
            $('#phone').addClass('is-invalid')
            $('#submit-form-add').attr('disabled', true)
         }
       } 
        $('#form-add').submit(function(e) {
            e.preventDefault()
            $.ajax({
                url: '../api/users/update.php',
                type: 'POST',
                data: $('#form-add').serialize() ,
                success: function(res) {
                    toastr.success(res)
                    setTimeout(() => {
                        validate_phone()
                        window.location.href = 'user_view.php'
                    }, 1000);
                },
                error: function(err) {
                    toastr.error(err.responseText)
                }
            })
        })

        $.ajax({
            url: '../api/users/getbyid.php',
            dataType: 'JSON',
            type: 'POST',
            data: {
                id: <?= $_POST['id'] ?>
            },
            success: function(res) {
                $('select[name="prefix"]').val(res[0].prefix) 
                $('input[name="firstname"]').val(res[0].firstname) 
                $('input[name="lastname"]').val(res[0].lastname) 
                $('input[name="phone"]').val(res[0].phone) 
                $('input[name="username"]').val(res[0].username) 
                $('select[name="role"]').val(res[0].role) 
            }
        })
    </script>
</body>

</html>