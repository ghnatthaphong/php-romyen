<?php 
    include '../db.php';
    session_start(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // required username 
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = 'SELECT * FROM users WHERE username = ? AND password = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $password]);
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        if ($count == 0) {
            http_response_code(400);
            echo json_encode(['msg' => 'Invalid '.$username]);
            return;
        }

        foreach($stmt->fetchAll() as $value) {
            $_SESSION['user_id'] = $value['id'];
            $_SESSION['user_firstname'] = $value['firstname'];
            $_SESSION['user_role'] = $value['role'];
        }
        http_response_code(200);
        echo json_encode(['msg' => 'logined succesfully.']);
    } else {
        http_response_code(500);
        echo 'Server Error';
    }
?>