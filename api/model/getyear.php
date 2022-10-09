<?php 
    include '../db.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        
        $arr_year = array();
        $year = date('Y') + 543;
        for($i = 0; $i < 25; $i++) {
            array_push($arr_year, $year++);
        }
        http_response_code(200);
        echo json_encode($arr_year);
    } else {
        http_response_code(500);
        echo 'Server Error';
    }
?>