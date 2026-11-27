<?php
require_once('db.php');

$viesti = "";

if (isset($_POST['etunimi'])) {
    $etunimi = $_POST['etunimi'];
    $sukunimi = $_POST['sukunimi'];
    $katuosoite = $_POST['katuosoite'];
    $postitoimipaikka = $_POST['postitoimipaikka'];
    $puhelin = $_POST['puhelin'];
    $saika = $_POST['saika'];
    $email = $_POST['email'];

    $sql = "INSERT INTO asiakas (etunimi, sukunimi, katuosoite, postitoimipaikka, puhelin, saika, email)
            VALUES ('$etunimi', '$sukunimi', '$katuosoite', '$postitoimipaikka', '$puhelin', '$saika', '$email')";

    if (mysqli_query($yhteys, $sql)) {
        $viesti = "Asiakas lisättiin.";
    } else {
        $viesti = "Tallennus epäonnistui: " . mysqli_error($yhteys);
    }
}
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Lisää asiakas</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<p><?= $viesti ?></p>

<form method="post">
    <p><label>Etunimi:</label> <input type="text" name="etunimi" required></p>
    <p><label>Sukunimi:</label> <input type="text" name="sukunimi" required></p>
    <p><label>Katuosoite:</label> <input type="text" name="katuosoite" required></p>
    <p><label>Postitoimipaikka:</label> <input type="text" name="postitoimipaikka" required></p>
    <p><label>Puhelin:</label> <input type="text" name="puhelin" required></p>
    <p><label>Syntymäaika:</label> <input type="date" name="saika" required></p>
    <p><label>Sähköposti:</label> <input type="email" name="email" required></p>

    <input type="submit" value="Lisää asiakas">
</form>

</body>
</html>