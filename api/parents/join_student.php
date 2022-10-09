<?php 
    include '../db.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //require id_student
        $std_id = $_POST['student_id'];

        $sql = 'SELECT  parents.* 
                        ,students.* 
                        , parents.fullname as p_fullname
                        , parents.id as p_id
                        , parents.firstname as p_firstname
                        , parents.lastname as p_lastname
                        , parents.prefix as p_prefix  
                FROM parents INNER JOIN students ON parents.student_id = students.id WHERE students.id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$std_id]);
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