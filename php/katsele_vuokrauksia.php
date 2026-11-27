
<?php
require_once('db.php');

$sql = "SELECT s.id, s.aloituspvm, s.lopetuspvm, s.palautettu,
               a.etunimi, a.sukunimi,
               au.rekno, au.valmistaja, au.malli
        FROM sopimus s
        JOIN asiakas a ON s.asiakasid = a.id
        JOIN auto au ON s.autoid = au.id
        ORDER BY s.aloituspvm DESC";

$tulos = mysqli_query($yhteys, $sql);
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Vuokraukset</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Vuokraukset</h1>

<table>
    <tr>
        <th>Asiakas</th>
        <th>Auto</th>
        <th>Rekisterinumero</th>
        <th>Aloituspäivä</th>
        <th>Lopetuspäivä</th>
        <th>Tilanne</th>
    </tr>

    <?php while ($rivi = mysqli_fetch_assoc($tulos)) { ?>
    <tr>
        <td><?= $rivi['etunimi'] ?> <?= $rivi['sukunimi'] ?></td>
        <td><?= $rivi['valmistaja'] ?> <?= $rivi['malli'] ?></td>
        <td><?= $rivi['rekno'] ?></td>
        <td><?= $rivi['aloituspvm'] ?></td>
        <td><?= $rivi['lopetuspvm'] ?></td>
        <td>
            <?php if ($rivi['palautettu'] == null) { ?>
                Vuokrattu
            <?php } else { ?>
                Palautettu <?= $rivi['palautettu'] ?>
            <?php } ?>
        </td>
    </tr>
    <?php } ?>

</table>

</body>
</html>
