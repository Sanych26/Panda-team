<?php
include_once '../config.php';
include_once '../functions.php';

$email = trim($_POST['email']);
$pass = trim($_POST['password']);

global $connection;
$usersTable = $connection->query("SELECT * FROM `users`");
$usersArr = [];
while ($user = $usersTable->fetch_assoc()) {
    if ($email === $user['email'] && password_verify($pass, $user['password'])) {
        $_SESSION['user_email'] = $email;
        $_SESSION['user_pass'] = $pass;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['authorize'] = true;
        redirect("pages/profile.php");
    } else {
        echo password_verify($pass, $user['password']);
//        redirect("pages/login.php");
    }
}
?>