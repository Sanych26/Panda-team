<?php
    include_once '../config.php';
    include_once '../functions.php';

    unset($_SESSION['authorize']);
    unset($_SESSION['user_id']);

    redirect('../index.php');
?>
