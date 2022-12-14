<?php
    include_once '../functions.php';
    include_once '../config.php';

    $title = $_POST['title'];
    $answer = $_POST['answer'];
    $votesNum = $_POST['votesNumber'];
    $status = $_POST['statusSelect'];
    print_r($_POST);
?>