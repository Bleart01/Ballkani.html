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
    <link rel="stylesheet" href="Renditja1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <title>AlbiMall Superliga</title>
</head>
<body>
    <div class="headeri">
        <div class="ballkani">
            
            <nav class="menu">
                <a class="fotob"href="Projekti.php"><img src="./fotot dhe logot/fc-ballkani.png
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
    <div class="tabela">
        <h2>AlbiMall Superliga</h2>
    <table>
        
        <thead>
            <tr>
                <th>#</th>
                <th class="club">Club</th>
                <th>F</th>
                <th>M</th>
                <th>W</th>
                <th>D</th>
                <th>L</th>
                <th>GF</th>
                <th>GA</th>
                <th>GD</th>
                <th>Pt</th>
            </tr>  
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><img src="./fotot dhe logot/fc-ballkani.png" alt="Ballkani logo" class="logo">Ballkani</td>
                <td class="forma" style="color: green;">W W W W W </td>
                <td>13</td>
                <td>11</td>
                <td>2</td>
                <td>0</td>
                <td>27</td>
                <td>8</td>
                <td>19</td>
                <td>35</td>
                
            </tr>
            <tr>
                <td>2</td>
                <td><img src="./fotot dhe logot/llapi.jpg" alt="Llapi logo" class="logo">Llapi</td>
                <td><span style="color: darkgoldenrod;">D</span>
                    <span style="color: darkgoldenrod;">D</span>
                    <span style="color: darkgoldenrod;">D</span>
                    <span style="color: green;">W</span>
                    <span style="color: green;">W</span></td>
                <td>15</td>
                <td>8</td>
                <td>4</td>
                <td>3</td>
                <td>22</td>
                <td>12</td>
                <td>10</td>
                <td>28</td>
            </tr>
            <tr>
                <td>3</td>
                <td><img src="./fotot dhe logot/drita-logo.png" alt="Drita logo" class="logo">Drita</td>
                <td><span style="color: darkgoldenrod;">D</span>
                    <span style="color: red;">L</span>
                    <span style="color: red;">L</span>
                    <span style="color: green;">W</span>
                    <span style="color: red;">L</span></td>
                <td>14</td>
                <td>7</td>
                <td>4</td>
                <td>3</td>
                <td>18</td>
                <td>8</td>
                <td>10</td>
                <td>25</td>
            </tr>
            <tr>
                <td>4</td>
                <td><img src="./fotot dhe logot/prishtina.jpg" alt="Pr logo" class="logo">Prishtina</td>
                <td><span style="color: green;">W</span>
                    <span style="color: red;">L</span>
                    <span style="color: darkgoldenrod;">D</span>
                    <span style="color: darkgoldenrod;">D</span>
                    <span style="color: green;">W</span></td>
                <td>15</td>
                <td>4</td>
                <td>9</td>
                <td>2</td>
                <td>19</td>
                <td>17</td>
                <td>2</td>
                <td>21</td>
            </tr>
            <tr>
                <td>5</td>
                <td><img src="./fotot dhe logot/malisheva-logo.png" alt="M logo" class="logo">Malisheva</td>
                <td><span style="color: darkgoldenrod;">D</span>
                    <span style="color: green;">W</span>
                    <span style="color: darkgoldenrod;">D</span>
                    <span style="color: green;">W</span>
                    <span style="color: red;">L</span></td>
                <td>15</td>
                <td>6</td>
                <td>2</td>
                <td>7</td>
                <td>23</td>
                <td>21</td>
                <td>2</td>
                <td>20</td>
            </tr>
            <tr>
                <td>6</td>
                <td><img src="./fotot dhe logot/dukagjini.png" alt="D logo" class="logo">Dukagjini</td>
                <td><span style="color: darkgoldenrod;">D</span>
                    <span style="color: darkgoldenrod;">D</span>
                    <span style="color: green;">W</span>
                    <span style="color: red;">L</span>
                    <span style="color: green;">W</span></td>
                <td>15</td>
                <td>4</td>
                <td>8</td>
                <td>3</td>
                <td>19</td>
                <td>19</td>
                <td>0</td>
                <td>20</td>
            </tr>
            <tr>
                <td>7</td>
                <td><img src="./fotot dhe logot/feronikelilogo1.png" alt="F logo" class="logo">Feronikeli</td>
                <td><span style="color: red;">L</span>
                    <span style="color: red;">L</span>
                    <span style="color: darkgoldenrod;">D</span>
                    <span style="color: red;">L</span> 
                    <span style="color: green;">W</span></td>
                <td>15</td>
                <td>4</td>
                <td>3</td>
                <td>8</td>
                <td>15</td>
                <td>25</td>
                <td>-10</td>
                <td>15</td>
            </tr>
            <tr>
                <td>8</td>
                <td><img src="./fotot dhe logot/kf-gjilanilogo.png" alt="Gj logo" class="logo">Gjilani</td>
                <td><span style="color: green;">W</span>
                    <span style="color: red;">L</span>
                    <span style="color: green;">W</span>
                    <span style="color: red;">L</span>
                    <span style="color: red;">L</span></td>
                <td>14</td>
                <td>4</td>
                <td>2</td>
                <td>8</td>
                <td>9</td>
                <td>16</td>
                <td>-7</td>
                <td>14</td>
            </tr>
            <tr>
                <td>9</td>
            <td><img src="./fotot dhe logot/fushkosova.jpg" alt="FK logo" class="logo">Fushe Kosova</td>
            <td><span style="color: darkgoldenrod;">D</span>
                <span style="color: darkgoldenrod;">D</span>
                <span style="color: green;">W</span>
                <span style="color: red;">L</span>
                <span style="color: red;">L</span></td>
            <td>15</td>
            <td>2</td>
            <td>4</td>
            <td>9</td>
            <td>11</td>
            <td>25</td>
            <td>-14</td>
            <td>10</td>
        </tr>
        <tr>
            <td>10</td>
            <td><img src="./fotot dhe logot/liria-logo.png" alt="L logo" class="logo">Liria</td>
            <td><span style="color: darkgoldenrod;">D</span>
                <span style="color: darkgoldenrod;">D</span>
                <span style="color: red;">L</span>
                <span style="color: darkgoldenrod;">D</span>
                <span style="color: darkgoldenrod;">D</span></td>
            <td>15</td>
            <td>1</td>
            <td>6</td>
            <td>8</td>
            <td>13</td>
            <td>25</td>
            <td>-12</td>
            <td>9</td>
         </tr>
        </tbody>
    </table>
</div>
</body>
</html>