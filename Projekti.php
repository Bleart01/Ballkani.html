<?php
include_once 'database.php';
include_once 'UserManagement.php';
include 'logout.php';

 if (isset($_GET['logout']) && $_GET['logout'] == 1) {
  session_destroy();
  header("Location: Projekti.php");
   exit();
 }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./Projekti.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />

    <title>Projekti</title>
  </head>
  <body>
    <div
      id="carouselExampleAutoplaying"
      class="carousel slide"
      data-bs-ride="carousel"
    >
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img
            src="fotoja1.jpg"
            class="d-block w-100 carousel-images"
            alt="..."
          />
        </div>
        <div class="carousel-item">
          <img
            src="stervitje.jpg"
            class="d-block w-100 carousel-images"
            alt="..."
          />
        </div>
        <div class="carousel-item">
          <img
            src="stervitje2.jpg"
            class="d-block w-100 carousel-images"
            alt="..."
          />
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

      <header>
        <div class="headeri">
          <div class="ballkani">
            <nav class="menu">
              <a class="fotob" href="Projekti.php"
                ><img
                  src="./fotot dhe logot/fc-ballkani.png
                            "
                  alt="https://fcballkani.com/"
                  width="60px"
                  height="60px"
              /></a>
              <ul>
                <li>
                  <a href="#">Kompeticioni</a>
                  <ul class="underlist">
                    <li>
                      <a href="./superliga.php">Superliga</a>
                    </li>
                    <li>
                      <a href="./kupaekosoves.php"
                        >Kupa e Kosoves</a
                      >
                    </li>
                    <li>
                      <a href="./uefa.php"
                        >UEFA Conference Liga</a
                      >
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="#">Skuadra</a>
                  <ul class="underlist">
                    <li><a href="./Lojtaret.php">Lojtaret</a></li>
                    <li><a href="./Trajneret.php">Trajneret</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#">Renditja</a>
                  <ul class="underlist">
                    <li><a href="./Rendtija1.php">Superliga</a></li>
                    <li><a href="./Renditja2.php">UEFA Conference Liga</a></li>
                  </ul>
                </li>
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

              </ul>
            </nav>
          </div>
        </div>
      </header>
    </div>
    <main>
      <div class="ndresat">
        <div class="g1"><h2>Fanellat e klubit</h2></div>

        <div class="fanellat">
          <div class="ndresa1">
            <img
              src="./fotot dhe logot/ndresavendas.PNG"
              alt=""
              style="display: flex; height: 330px; width: 350px"
            />
            <div class="text-end">
              <a href="./Regjistrohu.html"> </a>
            </div>
          </div>

          <div class="ndresa2">
            <img
              src="./fotot dhe logot/musafir.PNG"
              alt=""
              style="display: flex; height: 330px; width: 350px"
            />
            <div class="text-end">
              <a href="./Regjistrohu.html"> </a>
            </div>
          </div>

          <div class="ndresa3">
            <img
              src="./fotot dhe logot/nresa3.PNG"
              alt=""
              style="display: flex; height: 330px; width: 350px"
            />
            <div class="text-end">
              <a href="./Regjistrohu.html"> </a>
            </div>
          </div>
        </div>
      </div>

      <div class="g2"><h2>Galeria</h2></div>

      <div class="fotot">
        <div class="foto1">
          <img
            src="./fotot dhe logot/foto1.PNG"
            alt=""
            style="display: flex; height: 280px; width: 350px"
          />
        </div>
        <div class="foto2">
          <img
            src="./fotot dhe logot/foto2.PNG"
            alt=""
            style="display: flex; height: 280px; width: 350px"
          />
        </div>
        <div class="foto3">
          <img
            src="./fotot dhe logot/foto3.PNG"
            alt=""
            style="display: flex; height: 280px; width: 350px"
          />
        </div>
        <div class="foto4">
          <img
            src="./fotot dhe logot/foto4.PNG"
            alt=""
            style="display: flex; height: 280px; width: 350px"
          />
        </div>
        <div class="foto5">
          <img
            src="./fotot dhe logot/foto5.PNG"
            alt=""
            style="display: flex; height: 280px; width: 350px"
          />
        </div>
        <div class="foto6">
          <img
            src="./fotot dhe logot/foto6.PNG"
            alt=""
            style="display: flex; height: 280px; width: 350px"
          />
        </div>
        <div class="foto7">
          <img
            src="./fotot dhe logot/foto7.PNG"
            alt=""
            style="display: flex; height: 280px; width: 350px"
          />
        </div>
        <div class="foto8">
          <img
            src="./fotot dhe logot/foto8.PNG"
            alt=""
            style="display: flex; height: 280px; width: 350px"
          />
        </div>
        <div class="foto9">
          <img
            src="./fotot dhe logot/foto9.PNG"
            alt=""
            style="display: flex; height: 280px; width: 350px"
          />
        </div>
        <div class="foto10">
          <img
            src="./fotot dhe logot/foto10.PNG"
            alt=""
            style="display: flex; height: 280px; width: 350px"
          />
        </div>
        <div class="foto11">
          <img
            src="./fotot dhe logot/foto11.PNG"
            alt=""
            style="display: flex; height: 280px; width: 350px"
          />
        </div>
        <div class="foto12">
          <img
            src="./fotot dhe logot/foto12.PNG"
            alt=""
            style="display: flex; height: 280px; width: 350px"
          />
        </div>
      </div>
    </main>
    <footer>
      <div class="footeri">
        <a class="ball" href="Projekti.html"
          ><img
            src="./fotot dhe logot/fc-ballkani.png"
            alt=""
            style="height: 200px; width: 300px; object-fit: contain"
        /></a>
        <div class="iconat">
          <a href="https://www.facebook.com/fcballkani"
            ><img
              src="./fotot dhe logot/facebook.png"
              alt=""
              style="height: 60px; width: 60px"
          /></a>
          <a href="https://www.instagram.com/fcballkaniofficial/"
            ><img
              src="./fotot dhe logot/insta.png"
              alt=""
              style="height: 60px; width: 60px"
          /></a>
        </div>
        <div class="info">
          <h3><i>Qyeti: Suharek</i></h3>
          <h3><i>Adresa: 9R3F+822, Therandë</i></h3>
        </div>
      </div>
    </footer>
    <script>
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous";
      </script>
  </body>
</html>
