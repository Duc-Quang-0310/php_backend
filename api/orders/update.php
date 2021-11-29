<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");

include_once '../../config/Database.php';
include_once '../../models/Orders.php';

//Initial and connect
$database = new Database();
$db = $database->connect();

//Initial orders post obj
$orders = new Orders($db);

$data = json_decode(file_get_contents("php://input"));

//binding
$orders->order_id = $data->order_id;
$orders->client_image = $data->client_image;
$orders->client_name = $data->client_name;
$orders->employee_ID = $data->employee_ID;
$orders->status = $data->status;
$orders->address = $data->address;

if ($orders->update($data->product_id, $data->quantity)) {
    echo json_encode(
        array('success' => true, 'data' =>  'Update order successfully')
    );
} else {
    echo json_encode(
        array('success' => false, 'message' => 'Internal Server Error')
    );
}
