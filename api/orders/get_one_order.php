<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Headers: *");

include_once '../../config/Database.php';
include_once '../../models/Orders.php';

$database = new Database();
$db = $database->connect();

$orders = new Orders($db);

//set order_id
$orders->order_id = isset($_GET['order_id']) ? $_GET['order_id'] : die();

//employee post query
$result = $orders->get_one();

//Get row count
$num = $result->rowCount();

if ($num > 0) {
    //Post array
    $orders_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $order_item = array(
            'client_image' => $client_image,
            'client_name' => $client_name,
            'employee_ID' => $employee_ID,
            'status' => $status,
            'finish_date' => $finish_date,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'product_name' => $product_name,
            'product_image' => $product_image,
            'product_price' => $product_price,
            'address' => $address,
        );

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
