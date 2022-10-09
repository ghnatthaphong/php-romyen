<?php 
        // require year and class
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


?>