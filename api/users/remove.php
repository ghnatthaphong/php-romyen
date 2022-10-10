<?php 
    include '../db.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // required id 
        $id = $_POST['id'];

        $sql = 'DELETE FROM users WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        http_response_code(200);
        echo 'ลบข้อมูลเรียบร้อยแล้ว';
    } else {
        http_response_code(500);
        echo 'Server Error';
    }
?>