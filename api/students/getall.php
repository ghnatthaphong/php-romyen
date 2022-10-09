<?php 
    include '../db.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        $sql = 'SELECT * FROM students ORDER BY code ASC';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data['result'] = array();
        $count = $stmt->rowCount();
        array_push($data['result'], ["count" => $count]);
        foreach($stmt->fetchAll() as $value) {
            $value['year_at'] + 543;
            array_push($data['result'], $value);
        }
        http_response_code(200);
        echo json_encode($data['result']);
    } else {
        http_response_code(500);
        echo 'Server Error';
    }
?>