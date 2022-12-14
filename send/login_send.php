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
        redirect("pages/profile.php?id=$user[id]");
    } else {
        redirect("pages/login.php");
    }
}
?>