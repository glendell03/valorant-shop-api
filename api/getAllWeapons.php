<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../class/user_weapons.php';

$database = new Database();
$db = $database->getConnection();

$items = new UserWeapons($db);

$stmt = $items->getAllWeapons();
$itemCount = $stmt->rowCount();

echo json_encode($itemCount);

if ($itemCount > 0) {
    $userWeaponArr = array();
    $userWeaponArr['data'] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "id" => $id,
            "uuid" => $uuid,
            "displayName" => $displayName,
            "displayIcon" => $displayIcon,
            "chromas" => $chromas,
            "levels" => $levels,
        );

        array_push($userWeaponArr['data'], $e);
    }
    echo json_encode($userWeaponArr);
} else {
    http_response_code(404);
    echo json_encode(array('message' => "No record found."));
}
