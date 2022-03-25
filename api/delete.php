<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../class/user_weapons.php';

$database = new Database();
$db = $database->getConnection();

$items = new UserWeapons($db);

$data = json_decode(file_get_contents("php://input"));

$items->id = $data->id;

if ($items->deleteUserWeapons()) {
    echo json_encode("Weapon deleted.");
} else {
    echo json_encode("Weapon could not be deleted");
}
