<?php
    include_once '../config.php';
    include_once '../functions.php';

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $hashPass = password_hash($password, PASSWORD_DEFAULT);

    global $connection;
    $connection->query("INSERT INTO `users`(id, email, password) VALUES (NULL, '$email', '$hashPass')");
    redirect('index.php');
?>
