<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Headers: *");

include_once '../../config/Database.php';
include_once '../../models/OrderProducts.php';

$database = new Database();
$db = $database->connect();

$orderProducts = new Orders_products($db);

$result = $orderProducts->get_total();

$num = $result->rowCount();

if ($num > 0) {
    //Post array
    $orderProducts_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $orderProduct_item = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'quantity' => $quantity,
        );

        //push to "data"
        array_push($orderProducts_arr, $orderProduct_item);
    }

    //Convert to JSON
    echo json_encode(
        array('success' => true, 'message' => $orderProducts_arr)
    );
} else {
    echo json_encode(
        array('success' => false, 'message' => "Internal server error")
    );
}
