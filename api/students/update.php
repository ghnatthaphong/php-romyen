<?php
    include '../db.php';
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // all required of student
        $id = $_POST['id'];
        $prefix = $_POST['prefix'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $nickname = $_POST['nickname'];
        $class = $_POST['class'];
        $room = $_POST['room'];
        $term = $_POST['term'];
        $year = $_POST['year'];
        $status = $_POST['status'];

        // all request of parent
        $p_id = $_POST['p_id'];
        $p_prefix = $_POST['p_prefix'];
        $p_firstname = $_POST['p_firstname'];
        $p_lastname = $_POST['p_lastname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        // session user_id
        $user_id = $_SESSION['user_id'];

        // check students already exists!
        // $sql = 'SELECT COUNT(*) FROM students WHERE firstname = ? AND lastname = ?';
        // $stmt = $conn->prepare($sql);
        // $stmt->execute([$firstname, $lastname]);
        // $count = $stmt->fetchColumn();
        // if($count > 0) {
        //     echo 'Student already exists!';
        //     http_response_code(400);
        //     return;
        // }
        
        // generate student code
        // check student code this year
        $sql = 'SELECT code, year_at FROM students WHERE year_at = ? AND class = ? ORDER BY code DESC LIMIT 1';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$year - 543, $class]);
        $std = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt->rowCount() > 0) {
            $code = $std['code'] + 1;
        }else {
            $newstudent = 1;
            $sql = 'SELECT id FROM class WHERE name = ?';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$class]);
            $numclass = $stmt->fetch(PDO::FETCH_ASSOC);
            // generate
            $code = substr($year, 2, 2).'0'.$numclass['id'].'0'.$room.'00'.$newstudent;
        }

        // update
        $sql = 'UPDATE students SET code = ?, prefix = ?, firstname = ?, lastname = ?, fullname = ?, nickname = ?, class = ?, room = ?, term = ?, year_at = ?, status = ? WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$code, $prefix, $firstname, $lastname, $prefix.$firstname." ".$lastname, $nickname, $class, $room, $term, $year - 543, $status, $id]);

        // update parent
        $sql = 'UPDATE parents SET prefix = ?, firstname = ?, lastname = ?, fullname = ?, phone = ?, address = ? WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$p_prefix, $p_firstname, $p_lastname, $p_prefix.$p_firstname." ".$p_lastname, $phone, $address, $p_id]);
        http_response_code(200);
        echo 'Updated successfully';
    } else {
        http_response_code(500);
        echo 'Server Error';
    }
?>