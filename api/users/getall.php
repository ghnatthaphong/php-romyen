<?php 
    include '../db.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        $sql = 'SELECT * FROM users';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $data['result'] = array();
        $count = $stmt->rowCount();
        array_push($data['result'], ["count" => $count]);
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