<?php $page_name = 'เพิ่มข้อมูลค่าใช้จ่าย' ?>
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
                                <p class="text-left"><?= $page_name ?></p>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="code">รหัส <span class="text-danger">*</span></label>
                                        <input required type="text" title="กรอกตัวเลข" id="code" class="form-control" placeholder="รหัส" pattern="[0-9]{1,}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name">ชื่อรายการ <span class="text-danger">*</span></label>
                                        <input required type="text" id="name" class="form-control" placeholder="ชื่อรายการ">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="price">ราคา <span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <input  required type="text" id="price" placeholder="ราคา" pattern="[0-9]{1,}" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">฿</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-12"><hr class="my-2 ">(กรณีเป็นสินค้า) <a class="text-danger">*</a></div>
                                    <div class="col-md-2">
                                        <label for="size">ขนาด</label>
                                        <input type="text" id="size" class="form-control" placeholder="ขนาด" pattern="[A-Za-z0-9]{1,}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="quantity">จำนวน </label>
                                        <input type="text" id="quantity" class="form-control" pattern="[0-9]{1,}"  placeholder="จำนวน">
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <p> </p>
                                        <input type="submit" value="บันทึกข้อมูล" id="name" class="btn btn-primary">
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
        $('#form-add').submit(function(e) {

            e.preventDefault()
            $.ajax({
                url: '../api/finances/save.php',
                type: 'POST',
                data: {
                    quantity: $('#quantity').val() == '' ? null : $('#quantity').val(),
                    name: $('#name').val(),
                    price: $('#price').val(),
                    code: $('#code').val(),
                    size: $('#size').val() == ''? 'none': $('#size').val(),
                },
                success: function(res) {
                    toastr.success(res)
                    setTimeout(() => {
                        $('#form-add')[0].reset();
                        window.location.href = 'producet_view.php';
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