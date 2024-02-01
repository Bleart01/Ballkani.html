<?php
session_start();
 include 'UserManagement.php';
 include 'database.php';
// Krijo një instancë të Database
$db = new Databaza("localhost", "ballkani", "root", "");

// Krijo një instancë të UserManagement
$UserManagement = new UserManagement($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Thirrni metoden loginUser duke përdorur vlerat nga forma
    $UserManagement->loginUser($username, $password);
}

// Mbylle lidhjen me bazën e të dhënave
$db->closeConnection();

// $sessionkoha = 3600;
// $path = "/";
// $domain = "";
// $secure = false;
// $httponly = true;

// session_set_cookie_params($sessionkoha, $path, $domain, $secure, $httponly);
// session_start();

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
//     $username = isset($_POST['username']) ? $_POST['username'] : '';
//     $password = isset($_POST['password']) ? $_POST['password'] : '';

//     $conn = mysqli_connect('localhost', 'root', '', 'ballkani');

//     if (!$conn) {
//         die('Connection failed: ' . mysqli_connect_error());
//     }

//     $query = "SELECT password, role FROM users WHERE username = ?";
    
//     $stmt = mysqli_prepare($conn, $query);

//     if ($stmt === false) {
//         die('Error preparing statement: ' . mysqli_error($conn));
//     }

//     mysqli_stmt_bind_param($stmt, 's', $username);

//     $executeResult = mysqli_stmt_execute($stmt);

//     if ($executeResult === false) {
//         die('Error executing statement: ' . mysqli_stmt_error($stmt));
//     }

//     mysqli_stmt_bind_result($stmt, $hashed_password, $role); // Retrieve the 'role' from the database

//     if (mysqli_stmt_fetch($stmt)) {
    
//         if (!empty($hashed_password) && password_verify(trim($password), $hashed_password)) {
//             $_SESSION['username'] = $username;
//             $_SESSION['role'] = $role;

//             if ($role == 'admin') {
//                 header('Location: Projekti.php');
//             } else {
//                 header('Location: Projekti.php');
//             }
//             exit();
//         } else {
//             $error = 'Invalid username or password';
//             echo 'Password verification failed. Passwords do not match.';
//         }
//     } else {
//         $error = 'User not found';
//         echo 'User not found.';
//     }

    
//     if (mysqli_stmt_close($stmt) === false) {
//         die('Error closing statement: ' . mysqli_stmt_error($stmt));
//     }

//     mysqli_close($conn);
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Shtoni stilizimet e tjera nëse ka nevojë */
        .register {
            color: #ff6302;
            text-decoration: none;
        }

        .register:hover {
            text-decoration: underline;
        }
    </style>
    <title>Login</title>
</head>
<body>
    <div class="login">
        <h1 class="log">Login<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1"/>
          </svg></h1>
          <hr>
        <form id="forma" method="POST" action="login.php">
            <label>
                <input name="username" id="username" type="text" placeholder="username" autocomplete="username">
            </label>
            <div id="usernameError"> </div>
            <label>
                <input name="password" id="password" type="password" placeholder="******" autocomplete="new-password">
            </label>
            <div id="passwordError"> </div>

            <input type="submit" value="Login" style="
                background-color: #ff6302;
                margin-top: 30px;
                width: 100px;
                height: 30px;
                border-radius: 15px;"
             >
             <h4>Nuk keni account? <a href="Regjistrohu.php" class='register'>Regjistrohu</a></h4>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const forma = document.getElementById('forma');

            forma.addEventListener('submit', function (e) {
                let usernameRegex = /^[A-Za-z0-9]+$/;
                let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z]).{6,}$/;

                let usernameInput = document.getElementById('username');
                let passwordInput = document.getElementById('password');
                let usernameError = document.getElementById('usernameError');
                let passwordError = document.getElementById('passwordError');

                usernameError.innerText = '';
                passwordError.innerText = '';

                if (!usernameRegex.test(usernameInput.value.trim())) {
                    usernameError.innerText = 'Username should start with a letter and contain at least 3 characters.';
                    e.preventDefault();
                }

                if (!passwordRegex.test(passwordInput.value.trim())) {
                    passwordError.innerText = 'Password should start with a letter and end with 3 numbers.';
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
