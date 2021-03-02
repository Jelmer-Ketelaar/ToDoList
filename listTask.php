<?php
$conn = mysqli_connect('localhost', 'root', 'mysql');
//Returns the error code from last connect call
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

//Select Database
$db_select = mysqli_select_db($conn, 'ToDoList');

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

    <link rel="stylesheet" href="css/style.css">

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
    <a class="navbar-brand" href="#" style="cursor: auto">Manage Tasks</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="manageList.php">Manage Lists</a>
            </li>

            <?php
            //get the listID value
            $list_id_url = $_GET['list_id'];

            //Query to get the lists from the database
            $sql2 = "SELECT * FROM ToDoList.list";

            //Execute the query
            $result2 = mysqli_query($conn, $sql2);

            //Check whether the query executed or not
            if ($result2 == true) {
                //Display the list in menu
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $list_id = $row2['list_id'];
                    $list_name = $row2['list_name'];
                    ?>

                    <li class="nav-item ">
                        <a class="nav-link"
                           href="listTask.php?list_id=<?php echo $list_id; ?>"><?php echo $list_name ?></a>
                    </li>

                    <?php
                }
            }
            ?>
        </ul>
    </div>
</nav>
<!-- Navbar ends here -->

<h1>ToDoList</h1>

<!--Table to display lists starts here-->

<div class="all-lists">
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


            <?php
            //Database connection
            $conn = mysqli_connect('localhost', 'root', 'mysql');
            //Returns the error code from last connect call
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

            //Select Database
            $db_select = mysqli_select_db($conn, 'ToDoList');

            //Select all from list
            $sql = "SELECT * FROM ToDoList.task WHERE list_id = $list_id_url";

            //Execute The Query
            $result = mysqli_query($conn, $sql);

            $id = 1;
            //Checks whether the query is executed successfully or not
            if ($result == true) {
            //We have tasks on this list
            while ($row = mysqli_fetch_assoc($result)) {
            $task_id = $row['task_id'];
            $task_name = $row['task_name'];
            $priority = $row['priority'];
            $begin_date = $row['begin_date'];
            $deadline = $row['deadline'];

            ?>

            <tbody>

            <!-- Row -->
            <tr>
                <!-- Used ID++ because else when I delete a task/list, it will not count from the last existing ID -->
                <th scope="row"><?php echo $id++ ?></th>
                <td><?php echo $task_name ?></td>
                <td><?php echo $priority ?></td>
                <td><?php echo $begin_date ?></td>
                <td><?php echo $deadline ?></td>
                <td>
                    <a href="CRUD_task/updateTask.php?task_id=<?php echo $task_id; ?>">Update</a>
                    <a href="CRUD_task/deleteTask.php?task_id=<?php echo $task_id; ?>">Delete</a>
                </td>
            </tr>


            <?php
            }
            } else {
                //No tasks on this list
                ?>
                <tr>
                    <td colspan="5">No tasks added on this list</td>
                </tr>
                <?php

            }


            ?>
            </tbody>
        </table>
    </div>
</div>


</body>
</html>

