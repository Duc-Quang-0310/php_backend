<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers:  Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");

include_once '../../config/Database.php';
include_once '../../models/Orders.php';

//Initial and connect
$database = new Database();
$db = $database->connect();

//Initial blog post obj
$orders = new Orders($db);

// Get raw posted data 
$data = json_decode(file_get_contents("php://input"));

//set id to update
$orders->order_id = $data->id;

if ($orders->delete()) {
    echo json_encode(
        array('success' => true, 'message' => "Order delete successfully")
    );
} else {
    echo json_encode(
        array('success' => true, 'message' => "Order delete unsuccessfully")
    );
}
