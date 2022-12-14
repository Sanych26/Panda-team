<?php
    include_once '../config.php';
    global $connection;
    $userId = $_GET['id'];
    $query = "SELECT * FROM `users` WHERE id='$userId'";
    $userData = $connection -> query($query);
    $profile = $userData->fetch_assoc();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container emp-profile">
        <div class="row">
            <div class="col-md-6">
                <div class="profile-head">
                    <h3><?=$profile['email']?></h3>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="polls-tab" data-toggle="tab" href="#" role="tab" aria-selected="true">Polls</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="create-poll-tab" data-toggle="tab" href="../pages/create_poll.php" role="tab" aria-selected="false">Create poll</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <a href="/send/exit.php" class="btn-sm profile-edit-btn btn-danger">Exit</a>
            </div>
        </div>
        <div class="row d-block">
            <div class="d-flex flex-column">
                <div class="list-group-item-info d-flex justify-content-between align-items-center px-5 py-3">
                    <div>
                        <h6 class="text-secondary font-weight-bolder">Title: <span class="font-weight-light"></span></h6>
                        <h6 class="text-secondary font-weight-bolder">Answers:</h6>
                        <ul>
                            <li>d <span>8</span></li>
                            <li>d <span>8</span></li>
                            <li>d <span>8</span></li>
                        </ul>
                        <h6 class="text-secondary font-weight-bolder">Status: <span class="text-success font-weight-light">Posted</span></h6>
                    </div>
                    <div class="crud">
                        <a href=""><img src="../images/edit.png" alt=""></a>
                        <a href=""><img src="../images/delete.png" alt=""></a>
                    </div>
                </div>
                <div class="list-group-item-light d-flex justify-content-between align-items-center px-5 py-3">
                    <div>
                        <h6 class="text-secondary font-weight-bolder">Title: <span class="font-weight-light"></span></h6>
                        <h6 class="text-secondary font-weight-bolder">Answers:</h6>
                        <ul>
                            <li>d <span>8</span></li>
                            <li>d <span>8</span></li>
                            <li>d <span>8</span></li>
                        </ul>
                        <h6 class="text-secondary font-weight-bolder">Status: <span class="text-success font-weight-light">Posted</span></h6>
                    </div>
                    <div class="crud">
                        <a href=""><img src="../images/edit.png" alt=""></a>
                        <a href=""><img src="../images/delete.png" alt=""></a>
                    </div>
                </div>
                <div class="list-group-item-info d-flex justify-content-between align-items-center px-5 py-3">
                    <div>
                        <h6 class="text-secondary font-weight-bolder">Title: <span class="font-weight-light"></span></h6>
                        <h6 class="text-secondary font-weight-bolder">Answers:</h6>
                        <ul>
                            <li>d <span>8</span></li>
                            <li>d <span>8</span></li>
                            <li>d <span>8</span></li>
                        </ul>
                        <h6 class="text-secondary font-weight-bolder">Status: <span class="text-success font-weight-light">Posted</span></h6>
                    </div>
                    <div class="crud">
                        <a href=""><img src="../images/edit.png" alt=""></a>
                        <a href=""><img src="../images/delete.png" alt=""></a>
                    </div>
                </div>
                <div class="list-group-item-light d-flex justify-content-between align-items-center px-5 py-3">
                    <div>
                        <h6 class="text-secondary font-weight-bolder">Title: <span class="font-weight-light"></span></h6>
                        <h6 class="text-secondary font-weight-bolder">Answers:</h6>
                        <ul>
                            <li>d <span>8</span></li>
                            <li>d <span>8</span></li>
                            <li>d <span>8</span></li>
                        </ul>
                        <h6 class="text-secondary font-weight-bolder">Status: <span class="text-success font-weight-light">Posted</span></h6>
                    </div>
                    <div class="crud">
                        <a href=""><img src="../images/edit.png" alt=""></a>
                        <a href=""><img src="../images/delete.png" alt=""></a>
                    </div>
                </div>
                <div class="list-group-item-info d-flex justify-content-between align-items-center px-5 py-3">
                    <div>
                        <h6 class="text-secondary font-weight-bolder">Title: <span class="font-weight-light"></span></h6>
                        <h6 class="text-secondary font-weight-bolder">Answers:</h6>
                        <ul>
                            <li>d <span>8</span></li>
                            <li>d <span>8</span></li>
                            <li>d <span>8</span></li>
                        </ul>
                        <h6 class="text-secondary font-weight-bolder">Status: <span class="text-success font-weight-light">Posted</span></h6>
                    </div>
                    <div class="crud">
                        <a href=""><img src="../images/edit.png" alt=""></a>
                        <a href=""><img src="../images/delete.png" alt=""></a>
                    </div>
                </div>
                <div class="list-group-item-light d-flex justify-content-between align-items-center px-5 py-3">
                    <div>
                        <h6 class="text-secondary font-weight-bolder">Title: <span class="font-weight-light"></span></h6>
                        <h6 class="text-secondary font-weight-bolder">Answers:</h6>
                        <ul>
                            <li>d <span>8</span></li>
                            <li>d <span>8</span></li>
                            <li>d <span>8</span></li>
                        </ul>
                        <h6 class="text-secondary font-weight-bolder">Status: <span class="text-success font-weight-light">Posted</span></h6>
                    </div>
                    <div class="crud">
                        <a href=""><img src="../images/edit.png" alt=""></a>
                        <a href=""><img src="../images/delete.png" alt=""></a>
                    </div>
                </div>
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