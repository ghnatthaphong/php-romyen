<?php 
    include '../db.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // required student id
        $std_id = $_POST['student_id'];
        $sql = 'SELECT SUM( finances.price * orders.quantity) as expense FROM `orders` INNER JOIN finances ON orders.finance_id = finances.id WHERE student_id = ?;';
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