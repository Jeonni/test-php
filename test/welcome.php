<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}

echo "Welcome, " . $_SESSION["user_id"] . "!";
?>

<p><a href="logout.php">Logout</a></p>