<?php

include_once '../functions.php';
include_once '../config.php';

$userId = $_SESSION['user_id'];
$title = trim($_POST['title']);
$answerArr = $_POST['answer'];
$votesNumArr = $_POST['votesNumber'];
$status = trim($_POST['statusSelect']);
$answerData = array_combine($answerArr, $votesNumArr);
global $connection;
$connection->query("INSERT INTO `polls` (`id`, `title`, `status`, `author_id`) VALUES (NULL, '$title', '$status', '$userId')");
$pollIdData = $connection->query("SELECT `id` FROM `polls` WHERE `title`='$title'");
$pollIdArr = $pollIdData->fetch_assoc();
$pollId = $pollIdArr['id'];
foreach ($answerData as $key => $value) {
    $connection->query("INSERT INTO `answers` (`id`, `answer`, `votes`, `poll_id`) VALUES (NULL, '$key', '$value', '$pollId')");
}
redirect('pages/profile.php');
?>