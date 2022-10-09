<?php 
    include '../db.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // required id 
        $id = $_POST['id'];

        $sql = 'DELETE FROM finances WHERE id = ?';
        $stmt = $conn->prepare($sql);
        if($stmt->execute([$id])){
            http_response_code(200);
            echo json_encode('remove recorded successfully');
        }
        http_response_code(400);
        echo json_encode('Bad request');
    } else {
        http_response_code(500);
        echo 'Server Error';
    }
?>