<?php

include_once '../config.php';
include_once '../functions.php';

$email = trim($_POST['email']);
$password = trim($_POST['password']);
$hashPass = password_hash($password, PASSWORD_DEFAULT);

$emailInArray = false;
global $connection;
$allUsersData = ($connection->query("SELECT `email` FROM `users`"))->fetch_all();
foreach ($allUsersData as $elem) {
    if (in_array($email, $elem)) {
        $emailInArray = true;
    }
}

if ($emailInArray === true) {
    $_SESSION['login_error'] = 'This email is already used!';
    redirect('pages/signup.php');
} else {
    $_SESSION['login_error'] = '';
    $connection->query("INSERT INTO `users`(id, email, password) VALUES (NULL, '$email', '$hashPass')");
    $userData = ($connection->query("SELECT `id` FROM `users` WHERE `email` = '$email'"))->fetch_assoc();
    $_SESSION['user_id'] = $userData['id'];
    $_SESSION['authorize'] = true;
    redirect('pages/profile.php');
}
?>
