<?php $page_name = 'ฟอร์มแก้ไขข้อมูลนักเรียน' ?>
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
                        <div class="card-body">
                            <form id="form-add" method="post">
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
                                                        <select class="custom-select " id="std_prefix">
                                                            <?php foreach ($prefix_arr as $value) { ?>
                                                                <option value="<?= $value['name'] ?>"><?= $value['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="std_firstname">ชื่อ</label>
                                                        <input required type="text" class="form-control " id="std_firstname" placeholder="ชื่อ">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="std_lastname">นามสกุล</label>
                                                        <input required type="text" class="form-control " id="std_lastname" placeholder="นามสกุล">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="std_nickname">ชื่อเล่น</label>
                                                        <input required type="text" class="form-control " id="std_nickname" placeholder="ชื่อเล่น">
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
                                                        <select class="custom-select " id="p_prefix">
                                                            <?php $num = 0;
                                                            foreach ($prefix_arr as $value) { ?>
                                                                <?php if ($num < 2) {
                                                                    $num++;
                                                                    continue;
                                                                } ?>
                                                                <option value="<?= $value['name'] ?>"><?= $value['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label for="p_firstname">ชื่อ</label>
                                                        <input required type="text" class="form-control " id="p_firstname" placeholder="ชื่อ">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="p_lastname">นามสกุล</label>
                                                        <input required type="text" class="form-control " id="p_lastname" placeholder="นามสกุล">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="phone">เบอร์ติดต่อ</label>
                                                        <input required type="text" pattern="[0-9]{10}" oninput="validate_phone()" class="form-control " id="phone" placeholder="เบอร์ติดต่อ">
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
                                                        <select class="custom-select " id="std_class">
                                                            <?php foreach ($class_arr as $value) { ?>
                                                                <option value="<?= $value['name'] ?>"><?= $value['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="std_room">ห้องเรียน</label>
                                                        <input required pattern="[0-9]{1}" type="text" class="form-control " id="std_room" placeholder="ห้องเรียน">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="year">ปีที่</label>
                                                        <select class="custom-select " id="std_year">
                                                            <?php foreach ($year_arr as $value) { ?>
                                                                <option value="<?= $value ?>"><?= $value ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <label for="term">เทอม</label>
                                                        <select class="custom-select " id="std_term">
                                                            <?php foreach ($term_arr as $value) { ?>
                                                                <option value="<?= $value['name'] ?>"><?= $value['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <label for="status">สถานะการศึกษา</label>
                                                        <select class="custom-select " id="std_status">
                                                            <?php foreach ($status_arr as $value) { ?>
                                                                <option value="<?= $value['name'] ?>"><?= $value['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <p> </p>
                                        <div class="">
                                            <input type="submit" id="submit-form-add" value="บันทึกข้อมูล" class="btn btn-primary">
                                            <a href="student_view.php" class="btn btn-default">ย้อนกลับ</a>
                                        </div>
                                    </input>
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

       
       function render() {
            $.ajax({
                url: '../api/students/getbyid.php',
                type: 'POST',
                data: {
                    id: <?= $_POST['id'] ?>
                },
                dataType: 'JSON',
                success: function(res) {
                    $('#std_prefix').val(res[0].prefix) 
                    $('#std_firstname').val(res[0].firstname) 
                    $('#std_lastname').val(res[0].lastname)
                    $('#std_nickname').val(res[0].nickname)
                    $('#std_room').val(res[0].room)
                    $('#std_year').val(res[0].year)
                    $('#std_term').val(res[0].term) 
                    $('#std_class').val(res[0].class) 
                    $('#p_prefix').val(res[0].p_prefix) 
                    $('#p_firstname').val(res[0].p_firstname)
                    $('#p_lastname').val(res[0].p_lastname) 
                    $('#phone').val(res[0].phone) 
                    $('#std_status').val(res[0].status) 
                    $('#address').val(res[0].address) 
                },
                error: function(err) {
                    toastr.error(err.responseText)
                }
            })
       }
       render()

       $('#form-add').submit(function(e) {
            
            e.preventDefault()
            $.ajax({
                url: '../api/students/update.php',
                type: 'POST',
                data: {
                    id: <?= $_POST['id'] ?>,
                    prefix: $('#std_prefix').val(), 
                    firstname: $('#std_firstname').val(), 
                    lastname: $('#std_lastname').val(), 
                    nickname: $('#std_nickname').val(), 
                    room: $('#std_room').val(), 
                    year: $('#std_year').val(), 
                    term: $('#std_term').val(), 
                    class: $('#std_class').val(), 
                    p_prefix: $('#p_prefix').val(), 
                    p_firstname: $('#p_firstname').val(), 
                    p_lastname: $('#p_lastname').val(), 
                    phone: $('#phone').val(), 
                    address: $('#address').val(), 
                    status: $('#std_status').val() 
                },
                success: function(res) {
                    toastr.success(res)
                    setTimeout(() => {
                        window.location.href = 'student_view.html'
                    }, 1000);

                },
                error: function(err) {
                    toastr.error(err.responseText)
                }
            })
       })
    </script>
</body>

</html>