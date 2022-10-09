<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //require code
        $code = $_POST['code'];

        $sql = 'SELECT * FROM students WHERE code = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$code]);
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