<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");

include_once '../../config/Database.php';
include_once '../../models/Orders.php';

//Initial and connect
$database = new Database();
$db = $database->connect();

//Initial blog post obj
$orders = new Orders($db);

$data = json_decode(file_get_contents("php://input"));

$orders->client_name = $data->client_name;
$orders->employee_ID = $data->employee_ID;
$orders->status = $data->status;
$orders->address = $data->address;

if ($orders->create($data->order_product_id, $data->product_id, $data->quantity)) {
    echo json_encode(
        array('success' => true, 'data' =>  'Create new orders success')
    );
} else {
    echo json_encode(
        array('success' => false, 'message' => 'Internal Server Error')
    );
}
