<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Headers: *");

include_once '../../config/Database.php';
include_once '../../models/Products.php';

$database = new Database();
$db = $database->connect();

$products = new Products($db);

//employee post query
$result = $products->top_seller();

//Get row count
$num = $result->rowCount();

if ($num > 0) {
    //Post array
    $products_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $products_item = array(
            'product_name' => $product_name,
            'total' => $total,
            'product_image' => $product_image
        );

        //push to "data"
        array_push($products_arr, $products_item);
    }

    //Convert to JSON
    echo json_encode(
        array('success' => true, 'message' => $products_arr)
    );
} else {
    echo json_encode(
        array('success' => false, 'message' => "Internal server error")
    );
}
