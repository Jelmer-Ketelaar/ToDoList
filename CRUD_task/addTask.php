<?php
session_start();
//Checks whether the form is submitted or not
if (isset($_POST['submit'])) {
    //Get the values from form and save it in variables
    $list_id = $_POST['list_id'];
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];
    $priority = $_POST['priority'];
    $begin_date = $_POST['begin_date'];
    $deadline = $_POST['deadline'];

//Connects to database
    $conn = mysqli_connect('localhost', 'root', 'mysql');

    $select_db = mysqli_select_db($conn, 'ToDoList');

    //SQL Query to Insert data into database
    echo $sql = "INSERT INTO ToDoList.task SET 
task_name = '$task_name',
task_description = '$task_description',
list_id = '$list_id',
priority = '$priority',
begin_date = '$begin_date',
deadline = '$deadline'";


    $execute = mysqli_query($conn, $sql);


    if ($execute == true) {
        //Creates a SESSION Variable to Display the message
        $_SESSION['add'] = "List Added Successfully";

        //Redirect to Manage List Page
        header('location:' . 'http://localhost/Jaar-2/Blok-1/ToDoList/index.php');
    } else {
        //Set the message
        $_SESSION['add_fail'] = "Failed to Update the List";

        //Redirect to Same Page
        header('location:' . 'http://localhost/Jaar-2/Blok-1/ToDoList/CRUD_task/addTask.php');
    }

}
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

    <link rel="stylesheet" href="../css/style.css">

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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#" style="cursor: auto">Add Task Page</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../manageList.php">Manage Lists</a>
            </li>
            <?php
            //Connect to database
            $conn2 = mysqli_connect('localhost', 'root', 'mysql');

            //Query to get the lists from the database
            $sql2 = "SELECT * FROM ToDoList.list";

            //Execute the query
            $result2 = mysqli_query($conn2, $sql2);

            //Check whether the query executed or not
            if ($result2 == true) {
                //Display the list in menu
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $list_id = $row2['list_id'];
                    $list_name = $row2['list_name'];
                    ?>

                    <li class="nav-item ">
                        <a class="nav-link" href="../listTask.php?list_id=<?php echo $list_id;?>"><?php echo $list_name ?></a>
                    </li>

                    <?php
                }
            }
            ?>
        </ul>
    </div>
</nav>
<h1>ToDoList</h1>

<p>
    <?php

    //Checks whether the session is created or not
    if (isset($_SESSION['add_fail'])) {

        //Displays session message
        echo $_SESSION['add_fail'];

        //Removes the message after displaying once
        unset($_SESSION['add_fail']);
    }

    ?>
</p>
<div class="form">
<form method="POST" action="">
    <div class="form-group">
        <p>List Name:</p>
        <label style="width: 15vw">
            <input type="text" name="task_name" class="form-control" value="<?php echo $task_name ?>"
                   placeholder="Enter task name" required>
        </label>
    </div>
    <div class="form-group">
        <p>List Description:</p>
        <label style="width: 15vw">
            <input type="text" name="task_description" class="form-control" value="<?php echo $task_description ?>"
                   placeholder="Enter task name">
        </label>
    </div>
    <div class="form-group">
        <p>Select List:</p>
        <label>
            <select class="form-control" id="Select" name="list_id">
            <?php
            //Database connection
            $conn2 = mysqli_connect('localhost', 'root', 'mysql');

            //Select Database
            $db_select2 = mysqli_select_db($conn2, 'ToDoList');

            //Select all from list
            $sql2 = "SELECT * FROM todolist.list";

            //Execute The Query
            $result2 = mysqli_query($conn2, $sql2);

            //Check whether the query is executed or not
            if ($result2 == true) {
                //Create a variable to count rows
                $count_rows2 = mysqli_num_rows($result2);
                //If there is data in the database then display all in dropdowns. Else display none as option
                if ($count_rows2 > 0) {
                    //Display all the tasks on dropdown from database
                    while ($row3 = mysqli_fetch_assoc($result2)) {
                        $list_id = $row3['list_id'];
                        $list_name = $row3['list_name'];

                        ?>
                        <option value="<?php echo $list_id; ?>"><?php echo $list_name; ?></option>
                        <?php
                    }
                } else {
                    //Display none as option
                    ?>
                    <option <?php if ($list_id = 0) {
                        echo "selected = 'selected'";
                    } ?> value="0">None
                    </option>
                    <?php
                }
            }

            ?>
            </select>
        </label>
    </div>
    <div class="form-group">
        <p>Priority:</p>
        <label>
            <select class="form-select" aria-label="Default select example" name="priority">
                <option <?php if ($priority == "High") {
                    echo "selected = 'selected'";
                } ?> value="High">High
                </option>
                <option <?php if ($priority == "Medium") {
                    echo "selected = 'selected'";
                } ?> value="Medium">Medium
                </option>
                <option <?php if ($priority == "Low") {
                    echo "selected = 'selected'";
                } ?> value="Low">Low
                </option> <?php ?>
            </select>
        </label>
    </div>
    <div class="form-group">
        <p>Begin Date:</p>
        <label>
            <input type="date" name="begin_date">
        </label>
    </div>
    <div class="form-group">
        <p>Deadline:</p>
        <label>
            <input type="date" name="deadline">
        </label>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

</form>
</div>
<!-- Form To Add List Ends Here -->
</body>
</html>