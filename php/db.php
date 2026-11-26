<?php

// php/db.php

mysqli_report(MYSQLI_REPORT_OFF);

$palvelin = "localhost";

$kayttaja = "root";

$salasana = "";

$tietokanta = "autonvuokraus";

$yhteys = mysqli_connect($palvelin, $kayttaja, $salasana, $tietokanta);

// TEE: jos yhteys epäonnistui, lopeta ja näytä virhe (mysqli_connect_error)
if (!$yhteys) {
    die(mysqli_connect_error());
}

// TEE: aseta merkistö: mysqli_set_charset($yhteys, "utf8mb4");
mysqli_set_charset($yhteys, "utf8mb4");

?>