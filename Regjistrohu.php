<?php
// $sessionkoha = 3600;
// $path = "/";
// $domain = "";
// $secure = false;
// $httponly = true;

// session_set_cookie_params($sessionkoha, $path, $domain, $secure, $httponly);
include_once 'database.php';
include_once 'UserManagement.php';

// Krijo një instancë të Database
$db = new Databaza("localhost", "ballkani", "root", "");
$UserManagement = new UserManagement($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $surname = isset($_POST['surname']) ? $_POST['surname'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $role = isset($_POST['role']) ? $_POST['role'] : 'user';

    if (!empty($name) && !empty($surname) && !empty($username) && !empty($email) && !empty($password)) {
        // Move the database connection logic to a separate file or function if desired
        $host = "localhost";
        $dbname = "ballkani";
        $user = "root";
        $pass = "";

        $connection = mysqli_connect('localhost', 'root', '', 'ballkani');
        if (!$connection) {
            die("Mysql failed" . mysqli_connect_error());
        } else {
            $select = "SELECT email FROM users WHERE email = ?";

            $stmt = mysqli_prepare($connection, $select);
            if (!$stmt) {
                die('mysqli_prepare error: ' . mysqli_error($connection));
            }

            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rnum = mysqli_stmt_num_rows($stmt);

            if ($rnum == 0) {
                mysqli_stmt_close($stmt);

                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                $insert = "INSERT INTO users (name, surname, username, email, password, role) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($connection, $insert);
                if (!$stmt) {
                    die('mysqli_prepare error: ' . mysqli_error($connection));
                }

                mysqli_stmt_bind_param($stmt, 'ssssss', $name, $surname, $username, $email, $hashedPassword, $role);
                mysqli_stmt_execute($stmt);

                if (mysqli_stmt_errno($stmt) == 0) {
                    echo "New row inserted successfully";
                    header("Location: Login.php");
                } else {
                    echo "Error: " . mysqli_stmt_error($stmt);
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "Someone already registered using this email";
            }
        }

        mysqli_close($connection);
    } else {
        echo "All fields are required";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Regjistrohu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Regjistrohu</title>
</head>
<body>

    <div class="menu">

        <h1 class="regja">Regjistrimi <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1"/>
          </svg></h1>
        <hr>
        
        
    <form id="myform" method="POST" action = "Regjistrohu.php">
                <label >  <input name ="name"id="name" type="text" placeholder="Emri" autocomplete="given-name" required></input></label>
                <div id="nameError"> </div>
                <label >  <input name ="surname" id="surname" type="text" placeholder="Mbiemri" autocomplete="family-name" required></input></label>
                <div id="surnameError"> </div>
                <label >  <input name="username"id="username"type="text" placeholder="username" autocomplete="username" required></input></label>
                <div id="usernameError"> </div>
                <label > <input name="email"id="email" type="text" placeholder="Email@gmail.com" autocomplete="email" required></input></label>
                <div id="emailError"> </div>
                <label >  <input name="password"id="password" type="password" placeholder="******" autocomplete="new-password" required></input></label>
                <div id="passwordError"> </div>
                <label for="role">Roli:</label>
            <select id="role" name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
                
                <input type="submit" value="Register" style=" background-color: #ff6302;
                margin-top: 30px;
                width: 100px;
                height: 30px;
                border-radius: 15px; :hover {
  background-color: #ff6302;
}">
               
                </div>                 
                <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('myform').addEventListener('submit', function (event) {
            let nameRegex = /^[A-Z][a-z]{3,8}$/;
            let surnameRegex = /^[A-Z][a-z]{3,8}$/;
            let usernameRegex = /^[A-Za-z][a-zA-Z0-9]{3,8}$/;
            let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z]).{6,}$/;

            let emriInput = document.getElementById('name');
            let mbiemriInput = document.getElementById('surname');
            let usernameInput = document.getElementById('username');
            let emailInput = document.getElementById('email');
            let pasInput = document.getElementById('password');
            let emriError = document.getElementById('nameError');
            let mbiemriError = document.getElementById('surnameError');
            let usernameError = document.getElementById('usernameError');
            let emailError = document.getElementById('emailError');
            let passwordError = document.getElementById('passwordError');

            emriError.innerText = '';
            mbiemriError.innerText = '';
            usernameError.innerText = '';
            emailError.innerText = '';
            passwordError.innerText = '';

            if (!nameRegex.test(emriInput.value.trim())) {
                emriError.innerText = 'Emri duhet te filloje me shkronje te madhe dhe duhet te permbaje se paku 3 elemente';
                console.log('Emri validation failed');
                event.preventDefault();
            }

            if (!surnameRegex.test(mbiemriInput.value.trim())) {
                mbiemriError.innerText = 'Mbiemri duhet te filloje me shkronje te madhe dhe duhet te permbaje se paku 3 elemente';
                console.log('Mbiemri validation failed');
                event.preventDefault();
            }

            if (!usernameRegex.test(usernameInput.value.trim())) {
                usernameError.innerText = 'Username duhet te filloje me shkronje te madhe dhe duhet te permbaje se paku 3 elemente';
                console.log('Username validation failed');
                event.preventDefault(); 
            }

            if (!emailRegex.test(emailInput.value.trim())) {
                emailError.innerText = 'Emaili juaj eshte invalid';
                console.log('Email validation failed');
                event.preventDefault(); 
            }

            if (!passwordRegex.test(pasInput.value.trim())) {
                passwordError.innerText = 'Passwordi duhet te filloje me shkronje te madhe dhe te perfundoj me 3 numra';
                console.log('Password validation failed');
                event.preventDefault(); 
            }

            if (emriError.innerText || mbiemriError.innerText || usernameError.innerText || emailError.innerText || passwordError.innerText) {
                event.preventDefault();
            } else {
                alert('Ju u regjistruat me sukses');
                console.log('Validation successful');
                window.location.href = "Login.html";
            }
        });
    });
</script>



                </div>
            
</body>
</html>