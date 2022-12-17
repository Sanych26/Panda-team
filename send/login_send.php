<?php

include_once '../config.php';
include_once '../functions.php';

$email = trim($_POST['email']);
$pass = trim($_POST['password']);
$_SESSION['email'] = $email;
$_SESSION['password'] = $pass;

global $connection;
$usersTable = $connection->query("SELECT * FROM `users` WHERE `email` = '$email'");
$user = $usersTable->fetch_assoc();

//controller -> login()
    if (empty($email) || empty($user)) {
        $_SESSION['login_error'] = "Email or password is invalid!";
        redirect("pages/login.php");
    } elseif (empty($pass) || password_verify($pass, $user['password']) === false) {
        $_SESSION['login_error'] = "Email or password is invalid!";
        redirect("pages/login.php");
    } else {
        $_SESSION['login_error'] = '';
        $_SESSION['user_email'] = $email;
        $_SESSION['user_pass'] = $pass;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['authorize'] = true;
        redirect("pages/profile.php");
    }

?>