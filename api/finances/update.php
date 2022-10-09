<?php
    include '../db.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // required
        $id = $_POST['id'];
        $code = $_POST['code'];
        $name = $_POST['name'];
        $size = $_POST['size'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];

        // count not found
        $sql = 'SELECT COUNT(*) FROM finances WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $count = $stmt->fetchColumn();
        if($count == 0) {
            echo 'Bad request';
            http_response_code(400);
            return;
        }
        $sql = 'UPDATE finances SET code = ?, name = ?, size = ?, quantity = ?, price = ? WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$code, $name, $size, $quantity, $price, $id]);
        http_response_code(200);
        echo 'Updated successfully';
    } else {
        http_response_code(500);
        echo 'Server Error';
    }
?>