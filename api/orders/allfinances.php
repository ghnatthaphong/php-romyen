<?php 
    include '../db.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // required student id
        $std_id = $_POST['student_id'];

        $sql = 'SELECT finances.code, finances.name, finances.size, finances.price, orders.quantity, finances.price * orders.quantity as spend FROM finances INNER JOIN orders ON finances.id = orders.finance_id WHERE orders.student_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$std_id]);

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = array();
        foreach($stmt->fetchAll() as $key => $value) {
            array_push($data, $value);
        }
        http_response_code(200);
        echo json_encode($data);
    } else {
        http_response_code(500);
        echo 'Server Error';
    }
?>