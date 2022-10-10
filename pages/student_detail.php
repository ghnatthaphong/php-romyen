<div class="modal fade" id="modal-xl" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ข้อมูลนักเรียน</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <label for="code">รหัสนักเรียน</label>
                        <input disabled type="text" class="form-control " id="detail_code" placeholder="ชื่อ">
                    </div>
                    <div class="col-md-6">
                        <label for="fullname">ชื่อ-นามสกุล</label>
                        <input disabled type="text" class="form-control " id="detail_fullname" placeholder="ชื่อ">
                    </div>
                    <div class="col-md-3">
                        <label for="nickname">ชื่อเล่น</label>
                        <input disabled type="text" class="form-control " id="detail_nickname" placeholder="ชื่อ">
                    </div>

                    <div class="col-md-4">
                        <label for="class">ชั้นเรียน</label>
                        <input disabled type="text" class="form-control " id="detail_class" placeholder="ชื่อ">
                    </div>
                    <div class="col-md-4">
                        <label for="term">เทอม</label>
                        <input disabled type="text" class="form-control " id="detail_term" placeholder="ชื่อ">
                    </div>

                    <div class="col-md-2">
                        <label for="room">ห้อง</label>
                        <input disabled type="text" class="form-control " id="detail_room" placeholder="ชื่อ">
                    </div>
                    <div class="col-md-2">
                        <label for="year">ปีการศึกษา</label>
                        <input disabled type="text" class="form-control " id="detail_year" placeholder="ชื่อ">
                    </div>
                    <div class="col-md-5">
                        <label for="status">สถานะนักเรียน</label>
                        <input disabled type="text" class="form-control " id="detail_status" placeholder="ชื่อ">
                    </div>

                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <label for="p_fullname">ชื่อ-นามสกุล(ผู้ปกครอง)</label>
                        <input disabled type="text" class="form-control " id="detail_p_fullname" placeholder="ชื่อ">
                    </div>
                    <div class="col-md-4">
                        <label for="phone">เบอร์ติดต่อ</label>
                        <input disabled type="text" class="form-control " id="detail_phone" placeholder="ชื่อ">
                    </div>

                    <div class="col-md-12">
                        <label for="status">ที่อยู่</label>
                        <textarea disabled class="form-control" rows="5" style="resize:none ;" id="detail_address" placeholder="Enter ..."></textarea>
                    </div>
                </hr>
            </div>
            <div class="modal-footer justify-content-between">
                <p> </p>
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
            </div>
        </div>

    </div>

</div>
<script>
        function showdetail(data_id) {
            let id = data_id.dataset.id
            $.ajax({
                url: '../api/students/getbyid.php',
                dataType: 'JSON',
                data: { id : id },
                type: 'POST',
                success: function(res) {
                    $('#detail_prefix').val(res[0].prefix)
                    $('#detail_fullname').val(res[0].fullname)
                    $('#detail_nickname').val(res[0].nickname)
                    $('#detail_code').val(res[0].code)
                    $('#detail_class').val(res[0].class)
                    $('#detail_term').val(res[0].term)
                    $('#detail_room').val(res[0].room)
                    $('#detail_year').val(res[0].year)
                    $('#detail_status').val(res[0].status)
                    $('#detail_p_fullname').val(res[0].p_fullname)
                    $('#detail_phone').val(res[0].phone)
                    $('#detail_address').text(res[0].address)
                }
            })
        }
</script>