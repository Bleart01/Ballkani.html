<?php
include 'database.php';
include 'UserManagement.php';
include 'logout.php';

// Krijoni një objekt të klases Databaza
$db = new Databaza("localhost", "ballkani", "root", "");
$connection = $db->connect();

// Përpunoni formën për shtimin e lojtarit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emri = $_POST['emri'];
    $mbiemri = $_POST['mbiemri'];
    $data_lindjes = $_POST['data_lindjes'];
    $nacionaliteti = $_POST['nacionaliteti'];
    $pozita = $_POST['pozita'];

    // Thirr metoden për të shtuar lojtarin
    $db->shtoLojtar($emri, $mbiemri, $data_lindjes, $nacionaliteti, $pozita);

    // Shfaqeni një mesazh suksesi
    echo '<p style="color: green;">Lojtari u shtua me sukses!</p>';
}

// Mbyll lidhjen me bazën e të dhënave
$db->closeConnection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
</head>
<body>
<h2>Shto lojtar</h2>
    <form method="post" action="">
        <!-- Shtoni input fields për të dhënat e lojtarit -->
        <input type="text" name="emri" placeholder="Emri" required>
        <input type="text" name="mbiemri" placeholder="Mbiemri" required>
        <input type="date" name="data_lindjes" placeholder="Datëlindja" required>
        <input type="text" name="nacionaliteti" placeholder="Nacionaliteti" required>
        <input type="text" name="pozita" placeholder="Pozita" required>

        <button type="submit">Shto Lojtarin</button>
    </form>

    <h2>Shto Ndeshje ne Superlige</h2>
    <form action="shtondeshje.php" method="post">
        <label for="skuadra1">Skuadra 1:</label>
        <input type="text" id="skuadra1" name="skuadra1" required>

        <label for="skuadra2">Skuadra 2:</label>
        <input type="text" id="skuadra2" name="skuadra2" required>

        <label for="data_kompeticionit">Data e ndeshjes:</label>
        <input type="date" id="data_kompeticionit" name="data_kompeticionit" required>

        <button type="submit">Shto Ndeshje</button>
    </form>

    <h2>Shto Ndeshje ne Kupe</h2>
    <form action="shtondeshjenekupe.php" method="post">
        <label for="skuadra1">Skuadra 1:</label>
        <input type="text" id="skuadra1" name="skuadra1" required>

        <label for="skuadra2">Skuadra 2:</label>
        <input type="text" id="skuadra2" name="skuadra2" required>

        <label for="data_kompeticionit">Data e ndeshjes:</label>
        <input type="date" id="data_kompeticionit" name="data_kompeticionit" required>

        <button type="submit">Shto Ndeshje</button>
    </form>


    <h2>Shto Ndeshje ne UEFA</h2>
    <form action="shtondeshjeneuefa.php" method="post">
        <label for="skuadra1">Skuadra 1:</label>
        <input type="text" id="skuadra1" name="skuadra1" required>

        <label for="skuadra2">Skuadra 2:</label>
        <input type="text" id="skuadra2" name="skuadra2" required>

        <label for="data_kompeticionit">Data e ndeshjes:</label>
        <input type="date" id="data_kompeticionit" name="data_kompeticionit" required>

        <button type="submit">Shto Ndeshje</button>
    </form>


</body>
</html>




