<?php 
    include '../db.php';
    session_start(); 
    $_SESSION['user_role']? $_SESSION['user_role'] : $_SESSION['user_role'] = '' ;
    if($_SERVER['REQUEST_METHOD'] == 'GET' && $_SESSION['user_role'] === 'admin') {
        $sql = 'SELECT * FROM users';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $data['result'] = array();
        foreach($stmt->fetchAll() as $value) {
            array_push($data['result'], $value);
        }
        http_response_code(200);
        echo json_encode($data['result']);
    } else {
        http_response_code(500);
        echo 'Server Error';
    }
?>