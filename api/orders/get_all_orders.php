<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Headers: *");

include_once '../../config/Database.php';
include_once '../../models/Orders.php';

$database = new Database();
$db = $database->connect();

$orders = new Orders($db);

//employee post query
$result = $orders->get_all();

//Get row count
$num = $result->rowCount();

if ($num > 0) {
    //Post array
    $orders_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $order_item = array(
            'order_id' => $order_id,
            'employee_ID' => $employee_ID,
            'quantity' => $quantity,
            'finish_date' => $finish_date,
            'status' => $status,
        );

        //push to "data"
        array_push($orders_arr, $order_item);
    }

    //Convert to JSON
    echo json_encode(
        array('success' => true, 'message' => $orders_arr)
    );
} else {
    echo json_encode(
        array('success' => false, 'message' => "Internal server error")
    );
}
