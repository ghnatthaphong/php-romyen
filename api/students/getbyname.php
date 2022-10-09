<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //require name
        $firstname = $_POST['firstname'];

        $sql = 'SELECT * FROM students WHERE firstname = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$firstname]);
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