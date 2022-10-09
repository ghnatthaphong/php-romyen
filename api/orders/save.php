<?php
    include '../db.php';
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // required all
        // finances and quantity is array
        $finances = $_POST['finances'];
        $student_id = $_POST['student_id'];
        // ส่งมาค่า default ทุกตัวคือ 1
        $quantity = $_POST['quantity'];
        $user_id = $_SESSION['user_id'];

        // check ค่าเดิม
        $count = count($finances);
        for($i = 0; $i < $count; $i++) {
            $sql = 'SELECT COUNT(*) as count, quantity FROM orders WHERE student_id = ? AND finance_id = ?';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$student_id, $finances[$i]]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            // check same orders
            if($result['count'] > 0) {
                // update of orders table
                $sql = 'UPDATE orders SET quantity = ?, is_finish = ?, finished_at = ? WHERE id = ?';
                $stmt = $conn->prepare($sql);
                $stmt->execute([$quantity[$i], 'false', null, $finances[$i]]); 
            }else {
                // insert in order  
                $sql = 'INSERT INTO orders(finance_id, student_id, quantity, user_id) VALUE(?, ?, ?, ?)';
                $stmt = $conn->prepare($sql);
                $stmt->execute([$finances[$i], $student_id, $quantity[$i], $user_id]); 

                // logic reduce quantity in finances 
                // get quantity in finances
                $sql = 'SELECT quantity FROM finances WHERE id = ?';
                $stmt = $conn->prepare($sql);
                $stmt->execute([$finances[$i]]); 
                $qty = $stmt->fetch(PDO::FETCH_ASSOC);
                if($qty['quantity'] == null) {
                    continue;
                }

                // reduce finances
                $reduce = $qty['quantity'] - $quantity[$i];
                $sql = 'UPDATE finances SET quantity = ? WHERE id = ?';
                $stmt = $conn->prepare($sql);
                $stmt->execute([$reduce, $finances[$i]]); 
            }
        }
        http_response_code(200);
        echo 'Preorders successfully';
    } else {
        http_response_code(500);
        echo 'Server Error';
    }
?>