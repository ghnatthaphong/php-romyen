<?php $page_name = 'รายชื่อสมาชิก' ?>
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
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                            <thead>
                                                <tr>
                                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1">ลำดับ</th>
                                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1">ชื่อ-นามสกุล</th>
                                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1">ชื่อผู้ใช้</th>
                                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1">เบอร์ติดต่อ</th>
                                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1">ตำแหน่ง</th>
                                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1">Action</th>
                                                </tr>
                                            </thead>
                                            <!-- ------------------ result ---------------------- -->
                                            <tbody id="result">
                                            </tbody>
                                            <!-- ------------------ result ---------------------- -->
                                        </table>
                                    </div>
                                </div>
                            </div>
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
                url: '../api/users/getall.php',
                dataType: 'JSON',
                type: 'GET',
                success: function(res) {
                    let number = 1;
                    for (let i = 0; i < res.length; i++) {
                        html += `
                        <tr>
                            <td>${number++}</td>
                            <td>${res[i].fullname}</td>
                            <td>${res[i].username}</td>
                            <td>${res[i].phone == null ? 'ไม่มีข้อมูล' : res[i].phone}</td>
                            ${res[i].role == 'admin'? '<td class="text-success">ผู้ดูแลระบบ</td>' : '<td>' + res[i].role + '</td>'}
                            <td class="text-center">
                                <form action='user_edit.html' method='post'>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <input type='hidden' name='id' value='${res[i].id}'> 
                                        <button type="submit" ${res[i].role == 'admin'? 'disabled' : ''} class="btn btn-primary my-2" onclick="showdetail(this)" data-toggle="modal" data-target="#modal-xl">แก้ไขข้อมูล</button>
                                        <button type="button" ${res[i].role == 'admin'? 'disabled' : ''} class="btn btn-danger my-2" data-username=${res[i].username} data-id=${res[i].id} onclick="delete_data(this)" data-toggle="modal" data-target="#modal-xl">ลบข้อมูล</button>
                                    </div>
                                </div>
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
                            },
                            "lengthMenu": [
                                [5, 10, 20, -1],
                                [5, 10, 20, 'ทั้งหมด']
                            ],

                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                    }, 500);
                }
            })
        }
        render();

        function delete_data(e) {
            let id = e.dataset.id
            let username = e.dataset.username
            Swal.fire({
                title: 'คุณต้องการลบ ' + username + ' ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'ยกเลิก',
                confirmButtonText: 'ยืนยัน',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '../api/users/remove.php',
                        data: {
                            id: id
                        },
                        type: 'POST',
                        success: function(res) {
                            Swal.fire({
                                icon: 'success',
                                text: res
                            })
                            setTimeout(() => {
                                //
                            }, 1000);
                        }
                    })
                }
            })
        }
    </script>
</body>

</html>