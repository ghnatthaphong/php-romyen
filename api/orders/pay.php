<?php 
    include '../db.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // required student id
        $pay = $_POST['pay'];
        $order_id = $_POST['order_id'];

        $sql = 'SELECT finances.price * orders.quantity as spend, orders.pay FROM finances INNER JOIN orders ON finances.id = orders.finance_id WHERE orders.id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$order_id]);

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // update pay
        $data = array();
        foreach($stmt->fetchAll() as $key => $value) {
            array_push($data, $value);
            // check overpay
            if($pay > $value['spend']) {
                http_response_code(400);
                echo json_encode(['msg' => 'Overpay.']);
                return;
            }

            // update pay
            if($pay == $value['spend']) {
                $sql = 'UPDATE orders SET pay = ?, is_finish = ?, finished_at = ? WHERE id = ? ';
                $stmt = $conn->prepare($sql);
                $stmt->execute([$pay, 'true', date('Y-m-d/h:i:s'), $order_id]);
            }else {
                $sql = 'UPDATE orders SET pay = ? WHERE id = ? ';
                $stmt = $conn->prepare($sql);
                $stmt->execute([$pay, $order_id]);
            }
        }
        http_response_code(200);
        echo json_encode(['msg' => 'updated successfully', 'data' => $data]);
    } else {
        http_response_code(500);
        echo 'Server Error';
    }
?>