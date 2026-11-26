<?php

require_once('db.php');

$sql = "SELECT * FROM auto";

$tulos = mysqli_query($yhteys, $sql);

?>

<!DOCTYPE html>
<html lang="fi">

<head>
    <title>Katsele autoja</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <h1>Autonvuokraus – autot</h1>

    <table>

        <tr>
            <th>Kuva</th>
            <th>Rekisterinumero</th>
            <th>Valmistaja</th>
            <th>Malli</th>
            <th>Hinta</th>
            <th>Vapaana</th>
        </tr>

        <?php while ($rivi = mysqli_fetch_assoc($tulos)) { ?>

            <tr>
                <td><img src="../images/<?= $rivi['malli'] ?>.png" width="100"></td>
                <td><?= $rivi['rekno'] ?></td>
                <td><?= $rivi['valmistaja'] ?></td>
                <td><?= $rivi['malli'] ?></td>
                <td><?= $rivi['hinta'] ?> €</td>
                <td><?= $rivi['onkovapaa'] ? 'Kyllä' : 'Ei' ?></td>
            </tr>

        <?php } ?>

    </table>

</body>
</html>