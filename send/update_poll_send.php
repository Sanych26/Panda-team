<?php

include_once '../config.php';
include_once '../functions.php';

global $connection;
$userId = $_SESSION['user_id'];
$pollId = $_GET['poll_id'];
$title = $_POST['title']??'';
$answerArr = $_POST['answer']??'';
$voteArr = $_POST['votesNumber']??'';
$status = $_POST['statusSelect']??'';
$answerData = array_combine($answerArr, $voteArr);

$answersData = $connection->query("SELECT * FROM `answers` WHERE `poll_id` = '$pollId'");
$queryAnswer = "DELETE FROM `answers` WHERE `poll_id` = '$pollId'";
$queryPoll = "DELETE FROM `polls` WHERE `id` = '$pollId'";

while ($answer = $answersData->fetch_assoc()) {
    $connection->query($queryAnswer);
}
if ($connection->query($queryPoll)) {
    $connection->query("INSERT INTO `polls` (`id`, `title`, `status`, `author_id`) VALUES (NULL, '$title', '$status', '$userId')");
    $pollIdData = $connection->query("SELECT `id` FROM `polls` WHERE `title`='$title'");
    $pollIdArr = $pollIdData->fetch_assoc();
    $newPollId = $pollIdArr['id'];
    foreach ($answerData as $key => $value) {
        $connection->query("INSERT INTO `answers` (`id`, `answer`, `votes`, `poll_id`) VALUES (NULL, '$key', '$value', '$newPollId')");
    }
    redirect('pages/profile.php');
}
?>