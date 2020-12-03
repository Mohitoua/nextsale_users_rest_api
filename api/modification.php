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

$users->uFullName = $_GET['fullname'];
$users->uAge = $_GET['age'];
$users->uEmail = $_GET['email'];
$users->uSalary = $_GET['salary'];
$users->uUpdated = strtotime(date("Y-m-d H:i:s"));

$users->ID = $_GET['id'];
if ($users->ID == '')   // Cadvəlin məlumatlarının bütünlükdə dəyişdirilməsinin qarşısını almaq üçün!
{
    echo json_encode(array('message' => 'Dəyişdirilməli olan istifadəçinin unikal indeksi daxil edilməmişdir!'));
    die();
}
echo json_encode( array('result' => (($users->modification()) ? 'Cari istifadəçinin məlumatları uğurla dəyişdirildi!' : 'Cari istifadəçinin məlumatlarının dəyişdirilməsində xəta oldu!')));
