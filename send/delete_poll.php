<?php

include_once '../config.php';
include_once '../functions.php';

if ($_SESSION['authorize'] !== true) {
    header('Location: /pages/login.php');
    exit();
}

global $connection;
$pollId = $_GET['poll_id'];
$answersData = $connection->query("SELECT * FROM `answers` WHERE `poll_id` = '$pollId'");
$queryAnswer = "DELETE FROM `answers` WHERE `poll_id` = '$pollId'";
$queryPoll = "DELETE FROM `polls` WHERE `id` = '$pollId'";
while ($answer = $answersData->fetch_assoc()) {
    $connection->query($queryAnswer);
}
if ($connection->query($queryPoll)) {
    redirect('pages/profile.php');
}
?>
