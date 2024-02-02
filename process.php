<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emri = $_POST['emri'];
    $mbiemri = $_POST['mbiemri'];
    $datelindja = $_POST['datelindja'];
    $nacionaliteti = $_POST['nacionaliteti'];
    $pozita = $_POST['pozita'];
    
    $db->shtoLojtar($emri, $mbiemri, $datelindja, $nacionaliteti, $pozita);

    // echo '<p style="color: green;">Lojtari u shtua me sukses!</p>';
}
?>