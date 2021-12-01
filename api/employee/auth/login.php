<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers:  Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");

include_once '../../../config/Database.php';
include_once '../../../models/Employee.php';

$database = new Database();
$db = $database->connect();

//Initial blog post obj

$employee = new Employee($db);

// get ID from URL
$data = json_decode(file_get_contents("php://input"));

$employee->username = $data->username;

$employee->login();

$user_arr = array(
    'username' => $employee->username,
    'password' => $employee->password,
);


function returnFailMessage()
{
    echo json_encode(
        array('success' => false, 'message' => 'Username or password is incorrect')
    );
}

function returnSuccessMessage($username, $password)
{
    $data = array(
        'username' => $username,
        'password' => $password
    );

    echo json_encode(
        array('success' => true, 'message' => $data)
    );
}


if ($employee->username == null || $employee->password == null) {
    returnFailMessage();
} else {
    $inputUserName = $data->username;
    $inputPassword = $data->password;

    password_verify($data->password, $employee->password);

    if (password_verify($data->password, $employee->password)) {
        returnSuccessMessage($employee->username, $employee->password);
    } else {
        returnFailMessage();
    }
}
