<?php
require_once('db.php');

$viesti = "";

if (isset($_POST['asiakasid'])) {

    $asiakasid = $_POST['asiakasid'];
    $autoid = $_POST['autoid'];
    $aloituspvm = $_POST['aloituspvm'];
    $lopetuspvm = $_POST['lopetuspvm'];

    $sql = "INSERT INTO sopimus (asiakasid, autoid, aloituspvm, lopetuspvm)
            VALUES ($asiakasid, $autoid, '$aloituspvm', '$lopetuspvm')";

    mysqli_query($yhteys, $sql);

    $sql = "UPDATE auto SET onkovapaa = 0 WHERE id = $autoid";

    mysqli_query($yhteys, $sql);

    $viesti = "Vuokraus lisättiin.";
}

$asiakkaat = mysqli_query($yhteys, "SELECT id, etunimi, sukunimi FROM asiakas");

$autot = mysqli_query($yhteys, "SELECT id, valmistaja, malli FROM auto WHERE onkovapaa = 1");
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Lisää vuokraus</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Lisää vuokraus</h1>

<p><?= $viesti ?></p>

<form method="post">

    <p>
        <label>Asiakas:</label>
        <select name="asiakasid" required>
            <option value="">- valitse -</option>
            <?php while ($rivi = mysqli_fetch_assoc($asiakkaat)) { ?>
                <option value="<?= $rivi['id'] ?>">
                    <?= $rivi['etunimi'] ?> <?= $rivi['sukunimi'] ?>
                </option>
            <?php } ?>
        </select>
    </p>

    <p>
        <label>Auto:</label>
        <select name="autoid" required>
            <option value="">- valitse -</option>
            <?php while ($rivi = mysqli_fetch_assoc($autot)) { ?>
                <option value="<?= $rivi['id'] ?>">
                    <?= $rivi['valmistaja'] ?> <?= $rivi['malli'] ?>
                </option>
            <?php } ?>
        </select>
    </p>

    <p>
        <label>Alku:</label>
        <input type="date" name="aloituspvm" required>
    </p>

    <p>
        <label>Loppu:</label>
        <input type="date" name="lopetuspvm" required>
    </p>

    <input type="submit" value="Lisää vuokraus">

</form>

</body>
</html>
