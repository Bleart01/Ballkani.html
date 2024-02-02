<?php
include_once 'database.php';
include_once 'UserManagement.php';
include 'logout.php';

if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    session_destroy();
    header("Location: Projekti.php");
    exit();
}

$host = "localhost";
$dbname = "ballkani";
$username = "root";
$password = "";

$database = new Databaza($host, $dbname, $username, $password);

// Kryeni veprimet tuaja me databazën

// Shfaqeni një mesazh suksesi
 echo '<p style="color: green;">Veprimi u krye me sukses!</p>';

$database->closeConnection();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Renditja2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <title>UEFA Conference Liga</title>
</head>
<body>
    <div class="headeri">
        <div class="ballkani">
            
            <nav class="menu">
                <a class="fotob" href="./Projekti.php"><img src="./fotot dhe logot/fc-ballkani.png
                    " alt="https://fcballkani.com/" width="60px" height="60px"></a>
                <ul>
                    <li> 
                        <a href="#">Kompeticioni</a>
                        <ul class="underlist">
                            <li><a href="./superliga.php">Superliga</a></li>
                            <li><a href="./kupaekosoves.php">Kupa e Kosoves</a></li>
                            <li><a href="./uefa.php">UEFA Conference Liga</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Skuadra</a>
                        <ul class="underlist" >
                            <li><a href="./Lojtaret.php">Lojtaret</a></li>
                            <li><a href="./Trajneret.php">Trajneret</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Renditja</a>
                        <ul class="underlist" >
                            <li><a href="./Rendtija1.php">Superliga</a></li>
                            <li><a href="./Renditja2.php">UEFA Conference Liga</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a href="./login.php">
                <?php
        if (!isset($_SESSION['username'])) {
          echo '<button class="regjistrohu">Login</button>';
        }
        ?>
      </a>
      <?php
      if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin')) {
        echo '<button onclick="window.location.href=\'AdminDashboard.php\'">Dashboard</button>';
        echo '<li><a href="#" class="logoutBtn">Logout</a></li>';
         echo '<style>.logoutBtn {
           height: 67px;
           padding: 10px 15px;
           background-color: #333;
          color: #fff;
          border-radius: 0 30px 30px 0;
          cursor: pointer;
          text-decoration: none;
           transform: translateX(-50);
       .logoutBtn :hover 
           background-color: black;
       }</style>';
      } elseif (isset($_SESSION['role']) && ($_SESSION['role'] == 'user')) {
        echo '<li><a href="#" class="logoutBtn">Logout</a></li>';
         echo '<style>.logoutBtn {
           height: 67px;
           width: 30px;
           padding: 10px 15px;
           background-color: #333;
           color: #fff;
           border-radius: 0 30px 30px 0;
           cursor: pointer;
           text-decoration: none;
           transform: translateX(-50);
       }
      .logoutBtn :hover {
           background-color: black;
      } </style>';
      }
      ?>
       <script>
        document.addEventListener('DOMContentLoaded', function () {
            var logoutBtn = document.querySelector('.logoutBtn');

            if (logoutBtn) {
                logoutBtn.addEventListener('click', function () {
                    var konfirmimi = confirm("Dëshironi të dilni?");

                    if (konfirmimi) {
                        window.location.href = 'Projekti.php?logout=1';
                    }
                });
            }
        });
    </script>
                
            </nav>
        </div>
    </div>
    <div class="uefa1">
        <h3>UEFA Conference Liga</h3>
    <table>
        <tr>
            <th>#</th>
            <th class="team">Club</th>
            <th>M</th>
            <th>W</th>
            <th>D</th>
            <th>L</th>
            <th>GF</th>
            <th>GA</th>
            <th>GD</th>
            <th>Pt</th>
        </tr>
        <tr>
            <td>1</td>
            <td><img src="./fotot dhe logot/vplzen.foto.png" alt="V plzen logo" class="logos">Viktoria Plzen</td>
            <td>4</td>
            <td>4</td>
            <td>0</td>
            <td>0</td>
            <td>5</td>
            <td>1</td>
            <td>4</td>
            <td>12</td>
        </tr>
        <tr>
            <td>2</td>
            <td><img src="./fotot dhe logot/astanalogo.png" alt="A logo" class="logos">FC Astana</td>
            <td>4</td>
            <td>1</td>
            <td>1</td>
            <td>2</td>
            <td>4</td>
            <td>8</td>
            <td>-4</td>
            <td>4</td>
        </tr>
        <tr>
            <td>3</td>
            <td><img src="./fotot dhe logot/fc-ballkani.png" alt="B logo" class="logos">Ballkani</td>
            <td>4</td>
            <td>1</td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>3</td>
            <td>0</td>
            <td>4</td>
        </tr>
        <tr>
            <td>4</td>
            <td><img src="./fotot dhe logot/Dinamo_Zagreb_logo.png" alt="DZ logo" class="logos">Dinamo Zagreb</td>
            <td>4</td>
            <td>1</td>
            <td>0</td>
            <td>3</td>
            <td>5</td>
            <td>5</td>
            <td>0</td>
            <td>3</td>
        </tr>
    </table>
</div>
    
</body>
</html>