<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../db/Connection.php';
include_once '../Users.php';

$connection = new Connection();
$db = $connection->connect();
$users = new Users($db);
$query_result = $users->selection();

if($query_result->rowCount() > 0)
{
    $users_array = array();
    while($row = $query_result->fetch(PDO::FETCH_ASSOC))
    {
        extract($row);
        $user = array('ID' => $ID, 'uFullName' => $uFullName, 'uAge' => $uAge, 'uEmail' => $uEmail, 'uSalary' => $uSalary, 'uUpdated' => $uUpdated);
        array_push($users_array, $user);
    }
    // JSON:
    echo json_encode($users_array);
}
else { echo json_encode( array('result' => 'Heç bir istifadəçi tapılmadı!') ); }

