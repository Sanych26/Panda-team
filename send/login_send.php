<?php

include_once '../config.php';
include_once '../functions.php';

$email = trim($_POST['email']);
$pass = trim($_POST['password']);
$_SESSION['email'] = $email;
$_SESSION['password'] = $pass;

global $connection;
$usersTable = $connection->query("SELECT * FROM `users`");
$usersArr = [];
while ($user = $usersTable->fetch_assoc()) {
//    if ($email === $user['email'] && password_verify($pass, $user['password'])) {
//        $_SESSION['user_email'] = $email;
//        $_SESSION['user_pass'] = $pass;
//        $_SESSION['user_id'] = $user['id'];
//        $_SESSION['authorize'] = true;
//        $_SESSION['email_error'] = '';
//        $_SESSION['password_error'] = '';
//        redirect("pages/profile.php");
//    } elseif ($email !== $user['email']) {
////        echo $email . '<br>';
////        echo $user['email'] . '<br>';
//        $_SESSION['email_error'] = 'Incorrect login!';
//        redirect("pages/login.php");
//    } elseif ($pass !== $user['password']) {
//        $_SESSION['password_error'] = 'Incorrect password!';
//        redirect("pages/login.php");
//    }


    if ($email === '' || $email !== $user['email']) {
        $_SESSION['login_error'] = "Email or password is invalid!";
        redirect("pages/login.php");
    } elseif ($pass === '' || password_verify($pass, $user['password']) === false) {
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
}
?>