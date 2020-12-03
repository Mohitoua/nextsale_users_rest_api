<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods');

include_once '../db/Connection.php';
include_once '../Users.php';

$connection = new Connection();
$db = $connection->connect();
$users = new Users($db);

$users->uUpdated = strtotime(date("Y-m-d H:i:s"));
$users->ID = $_GET['id'];
if ($users->ID == '')   // Cadvəlin məlumatlarının bütünlükdə dəyişdirilməsinin qarşısını almaq üçün!
{
    echo json_encode(array('message' => 'Silinməli olan istifadəçinin unikal indeksi daxil edilməmişdir!'));
    die();
}

echo json_encode( array('result' => (($users->deletion()) ? 'Cari istifadəçi uğurla silindi!' : 'Cari istifadəçinin silinməsində xəta oldu!')));