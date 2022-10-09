<?php 


    include '../api/db.php';
   
    // clss
    $sql = 'SELECT * FROM class';
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $class_arr = array();
    foreach($stmt->fetchAll() as $value) {
        array_push($class_arr, $value);
    }

    // prefix
    $sql = 'SELECT * FROM prefixes';
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $prefix_arr = array();
    foreach($stmt->fetchAll() as $value) {
        array_push($prefix_arr, $value);
    }

    // role
    $sql = 'SELECT * FROM role';
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $role_arr = array();
    foreach($stmt->fetchAll() as $value) {
        array_push($role_arr, $value);
    }

    // term
    $sql = 'SELECT * FROM term';
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $term_arr = array();
    foreach($stmt->fetchAll() as $value) {
        array_push($term_arr, $value);
    }

    // status
    $sql = 'SELECT * FROM status';
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $status_arr = array();
    foreach($stmt->fetchAll() as $value) {
        array_push($status_arr, $value);
    }

    $year_arr = array();
    $year = date('Y') + 543;
    for($i = 0; $i < 25; $i++) {
        array_push($year_arr, $year++);
    }

?>