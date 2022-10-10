<?php
    include '../db.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //require id
        $id = $_POST['id'];

        $sql = 'SELECT * FROM students WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
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