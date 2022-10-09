<?php
    include '../db.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // required all field
        $code = $_POST['code'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        // ถ้าไม่มี ส่งค่า none
        $size = $_POST['size'];

        // count exists!
        $sql = 'SELECT COUNT(*) FROM finances WHERE name = ? AND size = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $size]);
        $count = $stmt->fetchColumn();
        if($count > 0) {
            echo 'Product name already exists!';
            http_response_code(400);
            return;
        }

        // insert
        $sql = 'INSERT INTO finances(code, name, size, quantity, price) VALUE(?, ?, ?, ?, ?)';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$code, $name, $size, $quantity, $price]); 
        http_response_code(200);
        echo 'Created successfully';
    } else {
        http_response_code(500);
        echo 'Server Error';
    }


?>