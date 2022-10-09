<?php 
    include '../db.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // required username 
        $username = $_POST['username'];

        $sql = 'SELECT * FROM users WHERE username = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
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