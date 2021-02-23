<?php
include "include/config.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

    <title>ToDoList</title>
</head>
<body>
<!-- Navbar starts here -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Home Page</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">To-Do <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Doing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Done</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manageList.php">Manage Lists</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Navbar ends here -->
<h1>ToDoList</h1>

<!-- Tasks starts here -->
<div class="task">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th scope="row">ID</th>
                <th>Task Name</th>
                <th>Priority</th>
                <th>Begin Date</th>
                <th>Deadline</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1.</th>
                <td>Design a website</td>
                <td>Medium</td>
                <td>19-02-2021</td>
                <td>25-02-2021</td>
                <td>
                    <a href="#"> Update </a>
                    <a href="#"> Delete </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<a class="btn btn-primary" href="CRUD_task/addTask.php">Add Task</a>
<!-- Tasks starts here -->
</body>
</html>
