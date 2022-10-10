<?php
    include '../db.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // not username required
        $id = $_POST['id'];
        $prefix = $_POST['prefix'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $hashpassword = md5($password); 
        $sql = 'SELECT COUNT(*) FROM users WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $count = $stmt->fetchColumn();
        if($count == 0) {
            echo 'Bad request';
            http_response_code(400);
            return;
        }
        $sql = 'UPDATE users SET prefix = ?, firstname = ?, lastname = ?, fullname = ?, phone = ?, password = ?, role = ? WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$prefix, $firstname, $lastname, $prefix.$firstname." ".$lastname, $phone, $hashpassword, $role , $id]);
        http_response_code(200);
        echo 'อัพเดทข้อมูลเรียนร้อยแล้ว';
    } else {
        http_response_code(500);
        echo 'Server Error';
    }
?>