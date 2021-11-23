<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Headers: *");

include_once '../../config/Database.php';
include_once '../../models/Employee.php';

$database = new Database();
$db = $database->connect();

$employee = new Employee($db);

//employee post query
$result = $employee->best_seller();

//Get row count
$num = $result->rowCount();

if ($num > 0) {
    //Post array
    $employees_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $employee_item = array(
            'employee_id' => $employee_id,
            'employee_image' => $employee_image,
            'name' => $name,
            'email' => $email,
        );

        //push to "data"
        array_push($employees_arr, $employee_item);
    }

    //Convert to JSON
    echo json_encode(
        array('success' => true, 'data' => $employees_arr)
    );
} else {
    echo json_encode(
        array('success' => false, 'message' => "Internal server error")
    );
}
