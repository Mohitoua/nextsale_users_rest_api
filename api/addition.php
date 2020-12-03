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

echo json_encode( array('result' => (($users->addition()) ? 'Yeni istifadəçi uğurla daxil edildi!' : 'Yeni istifadəçinin daxil edilməsində xəta oldu!')));
