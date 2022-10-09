<?php $page_name = 'ฟอร์มสมัครเรียน' ?>
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
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
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
                        <div class="card-body">
                            <form method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- new card -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">ข้อมูลนักเรียน</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label for="std_prefix">คำนำหน้า</label>
                                                        <select class="custom-select form-control-border border-width-2" id="std_prefix">
                                                            <?php foreach ($prefix_arr as $value) { ?>
                                                                <option value=""><?= $value['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="std_firstname">ชื่อ</label>
                                                        <input required type="text" class="form-control form-control-border border-width-2" id="std_firstname" placeholder="ชื่อ">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="std_lastname">นามสกุล</label>
                                                        <input required type="text" class="form-control form-control-border border-width-2" id="std_lastname" placeholder="นามสกุล">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="std_nickname">ชื่อเล่น</label>
                                                        <input required type="text" class="form-control form-control-border border-width-2" id="std_nickname" placeholder="ชื่อเล่น">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">ข้อมูลผู้ปกครอง</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="p_prefix">คำนำหน้า</label>
                                                        <select class="custom-select form-control-border border-width-2" id="p_prefix">
                                                            <?php $num = 0;
                                                            foreach ($prefix_arr as $value) { ?>
                                                                <?php if ($num < 2) {
                                                                    $num++;
                                                                    continue;
                                                                } ?>
                                                                <option value=""><?= $value['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label for="p_firstname">ชื่อ</label>
                                                        <input required type="text" class="form-control form-control-border border-width-2" id="p_firstname" placeholder="ชื่อ">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="p_lastname">นามสกุล</label>
                                                        <input required type="text" class="form-control form-control-border border-width-2" id="p_lastname" placeholder="นามสกุล">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="phone">เบอร์ติดต่อ</label>
                                                        <input required type="text" pattern="[0-9]{10}" oninput="validate_phone()" class="form-control form-control-border border-width-2" id="phone" placeholder="เบอร์ติดต่อ">
                                                    </div>
                                                    <div class="col-md-12">
                                                            <label for="address">ที่อยู่</label>
                                                            <textarea required class="form-control" rows="3" style="resize:none ;" id="address" placeholder="Enter ..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">ข้อมูลระดับชั้น</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="std_class">ระดับชั้น</label>
                                                        <select class="custom-select form-control-border border-width-2" id="std_prefix">
                                                            <?php foreach ($class_arr as $value) { ?>
                                                                <option value=""><?= $value['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="std_room">ห้องเรียน</label>
                                                        <input required pattern="[0-9]{1}" type="text" class="form-control form-control-border border-width-2" id="std_room" placeholder="ห้องเรียน">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="year">ปีที่</label>
                                                        <select class="custom-select form-control-border border-width-2" id="year">
                                                            <?php foreach ($year_arr as $value) { ?>
                                                                <option value=""><?= $value ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <label for="term">เทอม</label>
                                                        <select class="custom-select form-control-border border-width-2" id="term">
                                                            <?php foreach ($term_arr as $value) { ?>
                                                                <option value=""><?= $value['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <p> </p>
                                        <input type="submit" id="submit-form-add" value="บันทึกข้อมูล" class="btn btn-primary">
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

    <!-- REQUIRED SCRIPTS -->
    <?php include dirname(__FILE__) . '/layout/link_script.php' ?>
    <script>
       function validate_phone() {
        let phone = $('#phone').val();
         if(phone.length == 0 ) {
            $('#phone').css("border-bottom", '')
            $('#submit-form-add').attr('disabled', false)
         }else if(phone.length == 10){
            $('#phone').css("border-bottom", '10px green')
            $('#submit-form-add').attr('disabled', false)
         }else {
            $('#phone').css("border-bottom", '10px red')
            $('#submit-form-add').attr('disabled', true)
         }
       } 
    </script>
</body>

</html>