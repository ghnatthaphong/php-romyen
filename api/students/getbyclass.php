<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //require code
        $class = $_POST['class'];

        $sql = 'SELECT * FROM students WHERE class = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$class]);
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

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