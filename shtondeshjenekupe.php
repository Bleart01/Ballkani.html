<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Merrni vlerat nga forma
    $skuadra1 = $_POST["skuadra1"];
    $skuadra2 = $_POST["skuadra2"];
    $data_kompeticionit = $_POST["data_kompeticionit"];

    // Krijo një instancë të Databazës dhe shto ndeshjen
    $db = new Databaza($host, $dbname, $username, $password);
    $db->shtoNdeshje($skuadra1, $skuadra2, $data_kompeticionit);
    $db->closeConnection();

    echo '<p style="color: green;">Ndeshja u shtua me sukses!</p>';
}
?>
