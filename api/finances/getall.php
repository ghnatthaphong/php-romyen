<?php 
    include '../db.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        $sql = 'SELECT * FROM finances';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data['result'] = array();
        $count = $stmt->rowCount();
        array_push($data['result'], ["count" => $count]);
        foreach($stmt->fetchAll() as $value) {
            array_push($data['result'], $value);
        }
        http_response_code(200);
        echo json_encode(['msg' => 'if quantity is equal to zero. don\'t select this in pre-orders'], $data['result']);
    } else {
        http_response_code(500);
        echo 'Server Error';
    }
?>