<?php

$db_link = mysqli_connect("localhost", "root", "", "webshippy");
mysqli_set_charset($db_link, "utf8");

echo json_encode(array("nev" => $nev, 
    "email" => $email,
    "telefon" => $telefon, 
    "szuletesiDatum" => $szuletesiDatum, 
    "jogositvany" => $jogositvany));