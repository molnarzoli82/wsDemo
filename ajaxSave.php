<?php

$nev = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefon = filter_input(INPUT_POST, 'telefon', FILTER_SANITIZE_STRING);
$szuletesidatum = filter_input(INPUT_POST, 'szuletesiDatum', FILTER_SANITIZE_STRING);
$jogositvany = filter_input(INPUT_POST, 'jogositvany', FILTER_SANITIZE_STRING);
$hobbiKerekpar = filter_input(INPUT_POST, 'hobbiKerekpar', FILTER_SANITIZE_STRING);
$hobbiTurazas = filter_input(INPUT_POST, 'hobbiTurazas', FILTER_SANITIZE_STRING);
$hobbiHegymaszas = filter_input(INPUT_POST, 'hobbiHegymaszas', FILTER_SANITIZE_STRING);
$hobbiProgramozas = filter_input(INPUT_POST, 'hobbiProgramozas', FILTER_SANITIZE_STRING);
$hobbiEgyeb = filter_input(INPUT_POST, 'hobbiEgyeb', FILTER_SANITIZE_STRING);

$modosit = filter_input(INPUT_POST, 'modosit', FILTER_SANITIZE_STRING);

($hobbiKerekpar == 'on' ? $hobbiKerekpar = 1 : $hobbiKerekpar = 0);
($hobbiTurazas == 'on' ? $hobbiTurazas = 1 : $hobbiTurazas = 0);
($hobbiHegymaszas == 'on' ? $hobbiHegymaszas = 1 : $hobbiHegymaszas = 0);
($hobbiProgramozas == 'on' ? $hobbiProgramozas = 1 : $hobbiProgramozas = 0);
($hobbiEgyeb == 'on' ? $hobbiEgyeb = 1 : $hobbiEgyeb = 0);

$db = new PDO('mysql:host=localhost;dbname=webshippy;charset=utf8mb4', 'root', '');

if ($modosit == '0'){
    $db->exec("INSERT INTO `urlap` 
    (`name`, `email`, `phone`, `birthday`, `drivingLicence`, 
     `hobbiKerekpar`, `hobbiTurazas`, `hobbiHegymaszas`, `hobbiProgramozas`, `hobbiEgyeb`) 
     VALUES 
    ('$nev', '$email', '$telefon', '$szuletesidatum', '$jogositvany',  
     '$hobbiKerekpar', '$hobbiTurazas', '$hobbiHegymaszas', '$hobbiProgramozas', '$hobbiEgyeb');");
} else {
    $db->exec("UPDATE `urlap` SET name='$nev', email='$email', phone='$telefon', birthday='$szuletesidatum', drivingLicence='$jogositvany', 
     hobbiKerekpar='$hobbiKerekpar', hobbiTurazas='$hobbiTurazas', hobbiHegymaszas='$hobbiHegymaszas', hobbiProgramozas='$hobbiProgramozas', 
     hobbiEgyeb='$hobbiEgyeb' WHERE id = $modosit;");
}

echo json_encode(array("adat" => '$adat', "hiba" => $hiba));