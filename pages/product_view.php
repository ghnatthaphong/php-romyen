<?php $page_name = 'จัดการรายการสินค้า' ?>
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
                            <a href="product_add.html" class="float-right btn btn-primary">เพิ่มรายการสินค้า</a>
                        </div>

                        <div class="card-body">

                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    <?php include dirname(__FILE__) . '/layout/footer.php' ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php include dirname(__FILE__) . '/layout/link_script.php' ?>
    <script>
        var html = '';

        function clear_tbody() {
            $('#result').html('');
        }

        function render() {
            $.ajax({
                url: '../api/students/getall.php',
                dataType: 'JSON',
                type: 'GET',
                success: function(res) {
                    let number = 1;
                    for (let i = 0; i < res.length; i++) {
                        html += `
                        <tr>
                            <td>${number++}</td>
                            <td>${res[i].code}</td>
                            <td>${res[i].fullname}</td>
                            <td>${res[i].nickname}</td>
                            <td>${res[i].class}</td>
                            <td class="text-center">
                                <form action = "student_edit.php" method = "post">
                                <input type="hidden" name="id" value="${res[i].id}" >
                                <button type="button" data-id='${res[i].id}' class="btn btn-primary" onclick="showdetail(this)" data-toggle="modal" data-target="#modal-xl">ดูรายละเอียด</button>
                                <button type="submit" data-id='${res[i].id}' class="btn btn-default">แก้ไขข้อมูล</button>
                                </form>
                            </td>
                        </tr>
                        `
                    }
                    setTimeout(() => {
                        clear_tbody()
                        $('#result').append(html);
                        $("#example1").DataTable({
                            "responsive": true,
                            "lengthChange": true,
                            "autoWidth": false,
                            "buttons": ["copy", "csv", "excel", "pdf", "print"],
                            "language": {
                                "lengthMenu": "รายละเอียด _MENU_ แถว",
                                "info": "หน้าที่ _PAGE_ ของ _PAGES_ รวมทั้งหมด _TOTAL_ รายการ",
                                "search": "ค้นหา",
                                "paginate": {
                                    "next": "ถัดไป",
                                    "previous": "ก่อนหน้า",
                                },
                            }

                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                    }, 500);
                }
            })
        }
        render();

    </script>
    <?php include dirname(__FILE__).'/student_detail.php' ?>
</body>

</html>