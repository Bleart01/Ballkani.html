<?php
// logout.php
session_start();

if (isset($_POST['logout'])) {
    // Shkatërro sesionin
    session_destroy();

    // Ktheje një përgjigje të suksesshme
    echo 'success';
}
?>



