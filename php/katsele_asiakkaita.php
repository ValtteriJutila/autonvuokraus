<?php

require_once('db.php');

$sql = "SELECT * FROM asiakas ORDER BY sukunimi";

$tulos = mysqli_query($yhteys, $sql);

?>

<!DOCTYPE html>
<html lang="fi">

<head>
    <title>Katsele asiakkaita</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <h1>Autonvuokraus – asiakkaat</h1>

    <table>

        <tr>
            <th>Nimi</th>
            <th>Osoite</th>
            <th>Puhelin</th>
            <th>Syntymäaika</th>
            <th>Sähköposti</th>
        </tr>

        <?php while ($rivi = mysqli_fetch_assoc($tulos)) { ?>

            <tr>
                <td><?= $rivi['etunimi'] ?> <?= $rivi['sukunimi'] ?></td>
                <td><?= $rivi['katuosoite'] ?>, <?= $rivi['postitoimipaikka'] ?></td>
                <td><?= $rivi['puhelin'] ?></td>
                <td><?= $rivi['saika'] ?></td>
                <td><?= $rivi['email'] ?></td>
            </tr>

        <?php } ?>

    </table>

</body>
</html>