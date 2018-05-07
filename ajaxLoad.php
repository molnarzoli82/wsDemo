<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
if ($_GET['szures']){
    $szures = filter_input(INPUT_GET, 'szures', FILTER_SANITIZE_STRING);
    $szuresQuery = "WHERE name LIKE '%" .$szures."%'";
} 

$db = new PDO('mysql:host=localhost;dbname=webshippy;charset=utf8mb4', 'root', '');

$sth = $db->prepare("SELECT id, name, phone, email, birthday, drivingLicence, hobbiKerekpar, hobbiTurazas, 
        hobbiHegymaszas, hobbiProgramozas, hobbiEgyeb FROM urlap $szuresQuery");
$sth->execute();

$result = $sth->fetchAll(PDO::FETCH_ASSOC);

$rows = '';
foreach($result as $row) {
    $rows .= '<tr><td>'.$row['name'] . '</td><td>' . $row['phone'] . '</td><td>' . $row['email'] . '</td><td>'.$row['birthday'].'</td><td><span onclick="szerkeszt(' . $row['id'] . ');">szerkeszt</span></td></tr>';
}

echo '
Szűrés névre: <input type="text" id="szures" value="'.$szures.'"><br><br>
<table>
    <thead>
        <tr><td>Név</td><td>Telefon</td><td>Email</td><td>Születési idő</td><td></td></tr>
    </thead>
    <tbody>
    '.$rows.'
    </tbody>
</table>';