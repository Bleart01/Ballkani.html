<?php
// include 'database.php';

class usermanagement {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function registerUser($userData) {
        // Për siguri, mund të bëni validimin e të dhënave këtu
        $name = $userData['name'];
        $surname = $userData['surname'];
        $username = $userData['username'];
        $email = $userData['email'];
        $password = $userData['password'];
        $role = 'role';

        $selectQuery = "SELECT email FROM users WHERE email = ?";
        $stmt = $this->db->executeQuery($selectQuery, [$email]);

        mysqli_stmt_store_result($stmt);
        $rnum = mysqli_stmt_num_rows($stmt);

        if ($rnum == 0) {
            mysqli_stmt_close($stmt);

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $insertQuery = "INSERT INTO users (name, surname, username, email, password, role) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->executeQuery($insertQuery, [$name, $surname, $username, $email, $hashedPassword, $role]);

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
    public function loginUser($username, $password) {
            $selectQuery = "SELECT password, role FROM users WHERE username = ?";
            $stmt = $this->db->executeQuery($selectQuery, [$username]);

        mysqli_stmt_bind_result($stmt, $hashed_password, $role);

        if (mysqli_stmt_fetch($stmt)) {
            if (!empty($hashed_password) && password_verify(trim($password), $hashed_password)) {
                // Kyç përdoruesin dhe bëj diçka me të (p.sh., ruaje në sesion)
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;

                $this->redirectUser($role);
            } else {
                $error = 'Invalid username or password';
                echo 'Password verification failed. Passwords do not match.';
            }
        } else {
            $error = 'User not found';
            echo 'User not found.';
        }

        mysqli_stmt_close($stmt);
    }

    private function redirectUser($role) {
        $destination = ($role == 'admin') ? 'Projekti.php' : 'Projekti.php';
        header("Location: $destination");
        exit();
    }

}
?>

