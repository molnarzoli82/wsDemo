<?php

$db_link = mysqli_connect("localhost", "root", "", "webshippy");
mysqli_set_charset($db_link, "utf8");

$query = "CREATE TABLE `urlap` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `drivingLicence` tinyint(1) DEFAULT NULL,
  `hobbiKerekpar` tinyint(1) DEFAULT NULL,
  `hobbiTurazas` tinyint(1) DEFAULT NULL,
  `hobbiHegymaszas` tinyint(1) DEFAULT NULL,
  `hobbiProgramozas` tinyint(1) DEFAULT NULL,
  `hobbiEgyeb` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;";
mysqli_query($db_link, $query);

$query = "ALTER TABLE `urlap`   ADD PRIMARY KEY (`id`);";
mysqli_query($db_link, $query);

$query = "ALTER TABLE `urlap` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
mysqli_query($db_link, $query);