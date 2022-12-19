<?php

include_once '../config.php';
if ($_SESSION['authorize'] !== true) {
    header('Location: /pages/login.php');
    exit();
}
global $connection;
$userId = $_SESSION['user_id'] ?? '';
$userQuery = "SELECT * FROM `users` WHERE id='$userId'";
$userData = $connection->query($userQuery);
$profile = $userData->fetch_assoc();

$filterStatus = $_GET['status']??'';
$filterDate = $_GET['filterDate']??'';
$filterTitle = $_GET['title']??'';

$pollsQuery = "SELECT * FROM `polls` WHERE author_id='$userId'";
if (!empty($filterStatus) && $filterStatus!=='All') {
    $pollsQuery = $pollsQuery . " AND `status` = '$filterStatus'";
    echo $pollsQuery;

} elseif (!empty($filterTitle)) {
    $pollsQuery = $pollsQuery . " AND `title` LIKE '$filterTitle'";
    echo $pollsQuery;
}
$pollsData = $connection->query($pollsQuery);
$allPollsData = ($connection->query($pollsQuery))->fetch_all();
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
<div class="container emp-profile">
    <div class="row">
        <div class="col-md-6">
            <div class="profile-head">
                <h3><?= $profile['email'] ?></h3>
                <div class="d-block my-5">
                    <a href="../pages/create_poll.php" class="btn-sm btn-primary">Add new poll</a>
                </div>
                <ul class="nav nav-tabs py-0" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="polls-tab" data-toggle="tab" href="#" role="tab"
                           aria-selected="true">Polls</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <a href="/send/exit.php" class="btn-sm profile-edit-btn btn-danger">Exit</a>
        </div>
    </div>
    <div class="row d-block">
            <form class="d-flex" action="" method="get">
                <div>
                    <h6>Choose status: </h6>
                    <select class="px-2 py-1" name="status" id="filter-status" onchange="this.form.submit()">
                        <option value='All'>All</option>;
                        <option value='Posted'>Posted</option>;
                        <option value='Draft'>Draft</option>;
                    </select>
                </div>
                <div class="mx-5">
                    <h6>Choose title: </h6>
                    <input type="search" name="title" id="filter-title">
                </div>
                <div>
                    <h6>Choose date: </h6>
                    <input type="date" name="filterDate">
                </div>
            </form>
        <h5 class="text-right">All polls: <b class="text-danger"><?= $pollsData->num_rows ?></b></h5>
    </div>
    <div class="row d-block">
        <div class="d-flex flex-column profile-poll-items">
            <?php
            if (empty($allPollsData)) {
                echo '<h5>There are no polls yet!</h5>';
            }
            while ($poll = $pollsData->fetch_assoc()) { ?>
                <div class="list-group-item d-flex justify-content-between align-items-center px-5 py-3">
                    <div>
                        <h6 class="text-secondary font-weight-bolder">Title:
                            <span class="font-weight-light"><?= $poll['title'] ?></span>
                        </h6>
                        <h6 class="text-secondary font-weight-bolder">Answers:</h6>
                        <ul>
                            <?php
                            $pollId = $poll['id'];
                            $answerQuery = "SELECT * FROM `answers` WHERE poll_id='$pollId'";
                            $answerData = $connection->query($answerQuery);
                            while ($answer = $answerData->fetch_assoc()) { ?>
                                <li><?= $answer['answer'] ?> (<span><?= $answer['votes'] ?> votes)</span></li>
                                <?php
                            } ?>
                        </ul>
                        <h6 class="text-secondary font-weight-bolder">Status: <span
                            <?php
                            if ($poll['status'] === 'Posted') {
                                echo "<span class='text-success font-weight-light'>" . $poll['status'] . "</span>";
                            } elseif ($poll['status'] === 'Draft') {
                                echo "<span class='text-danger font-weight-light'>" . $poll['status'] . "</span>";
                            }
                            ?>
                        </h6>
                    </div>
                    <div class="crud">
                        <a href="../pages/update_poll.php?poll_id=<?= $pollId ?>"><img src="../images/edit.png" alt=""></a>
                        <a href="../send/delete_poll.php?poll_id=<?= $pollId ?>"><img src="../images/delete.png" alt=""></a>
                    </div>
                </div>
                <?php
            } ?>
        </div>
    </div>
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