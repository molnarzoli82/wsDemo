<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
if ($_GET['id']){
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $szuresQuery = "WHERE id = $id";
} 

$db = new PDO('mysql:host=localhost;dbname=webshippy;charset=utf8mb4', 'root', '');

$sth = $db->prepare("SELECT id, name, phone, email, birthday, drivingLicence, hobbiKerekpar, hobbiTurazas, 
        hobbiHegymaszas, hobbiProgramozas, hobbiEgyeb FROM urlap $szuresQuery");
$sth->execute();

$result = $sth->fetch(PDO::FETCH_ASSOC);

echo json_encode(array("id" => $result['id'], 
    "name" => $result['name'], 
    "phone" => $result['phone'], 
    "email" => $result['email'], 
    "drivingLicence" => $result['drivingLicence'], 
    "hobbiKerekpar" => $result['hobbiKerekpar'], 
    "hobbiTurazas" => $result['hobbiTurazas'], 
    "hobbiHegymaszas" => $result['hobbiHegymaszas'], 
    "hobbiProgramozas" => $result['hobbiProgramozas'], 
    "hobbiEgyeb" => $result['hobbiEgyeb'], 
    "birthday" => $result['birthday']));