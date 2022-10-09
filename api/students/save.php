<?php
    include '../db.php';
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // required *
        $prefix = $_POST['prefix'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $nickname = $_POST['nickname'];
        $class = $_POST['class'];
        $room = $_POST['room'];
        $term = $_POST['term'];
        $year = $_POST['year'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $p_prefix = $_POST['p_prefix'];
        $p_firstname = $_POST['p_firstname'];
        $p_lastname = $_POST['p_lastname'];
        $user_id = $_SESSION['user_id'];

        $status = 'กำลังศึกษาอยู่';
        // count exists
        $sql = 'SELECT COUNT(*) FROM students WHERE firstname = ? AND lastname = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$firstname, $lastname]);
        $count = $stmt->fetchColumn();
        if($count > 0) {
            echo 'มีรายชื่อนักเรียนคนนี้แล้ว';
            http_response_code(400);
            return;
        }

        // generate code
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

        // insert
        $sql = 'INSERT INTO students(code, prefix, firstname, lastname, nickname, fullname, class, room, term, year_at, status, user_id) VALUE(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$code, $prefix, $firstname, $lastname, $nickname, $prefix.$firstname." ".$lastname, $class, $room, $term, $year - 543, $status, $user_id]); 

        // get student by code
        $sql = 'SELECT * FROM students WHERE code = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$code]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        // insert 
        $sql = 'INSERT INTO parents(prefix, firstname, lastname, fullname, phone, address, student_id) VALUE(?, ?, ?, ?, ?, ?, ?)';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$p_prefix, $p_firstname, $p_lastname, $p_prefix.$p_firstname." ".$p_lastname, $phone, $address, $result['id']]); 
        http_response_code(200);
        echo 'เพิ่มข้อมูลสำเร็จ';
    } else {
        http_response_code(500);
        echo 'Server Error';
    }


?>