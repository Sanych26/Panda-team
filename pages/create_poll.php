<?php

include_once '../config.php';
if ($_SESSION['authorize'] !== true) {
    header('Location: /pages/login.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panda Team Task</title>
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container my-5 py-5">
    <h3 class="font-weight-bolder text-center">Create your new poll</h3>
    <form class="py-3 d-inline" method="post" action="../send/new_poll.php">
        <div class="form-group">
            <label for="titleField" class="d-block">Title</label>
            <input type="text" class="form-control" id="titleField" required name="title"
                   placeholder="Write some question">
        </div>
        <div class="answers-cont ">
            <div class="form-group d-flex justify-content-between add-answer-cont align-items-end">
                <div class="w-50">
                    <label for="answerField" class="d-block">Answer</label>
                    <input type="text" class="form-control text-align-left" id="answerField" required name="answer[]"
                           placeholder="Write answer">
                </div>
                <div class="d-block">
                    <label for="numberField" class="d-block">Number of votes</label>
                    <input type="text" class="form-control text-align-left" id="numberField" required
                           name="votesNumber[]" placeholder="Votes">
                </div>
                <div class="profile-head h-100">
                    <img class="remove-answer my-2" src="/images/remove.png" alt="">
                </div>
            </div>
        </div>
        <img id="addNewAnswer" src="../images/add.png" alt="">
        <div class="form-group my-4">
            <label for="statusSelect" class="d-block">Set poll status</label>
            <select class="form-control" id="statusSelect" required name="statusSelect">
                <option value="Posted">Posted</option>
                <option value="Draft">Draft</option>
            </select>
        </div>
        <input type="submit" class="btn btn-primary mx-0" value="Add poll">
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="/js/main.js"></script>
</body>
</html>
