<?php
    include '../db.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $prefix = $_POST['prefix'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $hashpassword = md5($password); 
        $sql = 'SELECT COUNT(*) FROM users WHERE username = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $count = $stmt->fetchColumn();
        if($count > 0) {
            echo 'Username already exists!';
            http_response_code(400);
            return;
        }
        $sql = 'INSERT INTO users(prefix, firstname, lastname, fullname, phone, username, password, role) VALUE(?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$prefix, $firstname, $lastname, $prefix.$firstname." ".$lastname, $phone? $phone: null, $username, $hashpassword, $role]); 
        http_response_code(200);
        echo 'Created successfully';
    } else {
        http_response_code(500);
        echo 'Server Error';
    }


?>