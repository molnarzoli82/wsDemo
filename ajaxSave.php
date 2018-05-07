<?php

$nev = filter_input(INPUT_GET, 'nev');
$email = filter_input(INPUT_GET, 'email');
$telefon = filter_input(INPUT_GET, 'telefon');
$szuletisdatum = filter_input(INPUT_GET, 'szuletesiDatum');
$jogositvany = filter_input(INPUT_GET, 'jogositvany');

$db_link = mysqli_connect("localhost", "root", "", "webshippy");
mysqli_set_charset($db_link, "utf8");

$query = "INSERT INTO `webshippy` (`name`, `phone`, `email`, `email`) VALUES "
        . "('$nev', '$email','$telefon','$szuletesidatum','$jogositvany');";
mysqli_query($this->db_link, $query);
