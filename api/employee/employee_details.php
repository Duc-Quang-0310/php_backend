<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Headers: *");

include_once '../../config/Database.php';
include_once '../../models/Employee.php';

$database = new Database();
$db = $database->connect();

//Initial blog post obj
$employee = new Employee($db);

// get ID from URL
$employee->employee_id = isset($_GET['employee_id']) ? $_GET['employee_id'] : die();

//get details
$employee->employee_details();

//convert to JSON

if ($employee->employee_details()) {

    $employee_arr = array(
        'employee_id' => $employee->employee_id,
        'employee_image' => $employee->employee_image,
        'name' => $employee->name,
        'email' => $employee->email,
        'phonenumber' => $employee->phonenumber,
    );

    echo json_encode(
        array('success' => true, 'message' => $employee_arr)
    );
} else {
    echo json_encode(
        array('success' => false, 'message' => "Internal server error")
    );
}
