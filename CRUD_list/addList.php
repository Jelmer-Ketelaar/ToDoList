<?php
session_start();
require_once '../connect.php';

//Select Database
$db_select = mysqli_select_db($conn, 'ToDoList');
//Checks whether the form is submitted or not
if (isset($_POST['submit'])) {

    //Get the values from form and save it in variables
    echo $list_name = $_POST['list_name'];

    //SQL Query to Insert data into database
    $sql = "INSERT INTO list SET list_name = '$list_name'";

    $execute = mysqli_query($conn, $sql);

    if ($execute == true) {
        //Creates a SESSION Variable to Display the message
        $_SESSION['add'] = "List Added Successfully";

        //Redirect to Manage List Page
        header('location:' . 'http://localhost/Jaar-2/Blok-1/ToDoList/manageList.php');
    } else {
        //Creates a SESSION Variable to Save the message
        $_SESSION['add_fail'] = "Failed to Add List";

        //Redirect to Same Page
        header('location:' . 'http://localhost/Jaar-2/Blok-1/ToDoList/addList.php');
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/style.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <title>ToDoList</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#" style="cursor: auto">Add List Page</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Manage Tasks</a>
                </li>
            </ul>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../manageList.php">Manage Lists</a>
                    </li>

                    <?php
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
                                <a class="nav-link" href="../listTask.php?list_id=<?php echo $list_id; ?>"><?php echo $list_name ?></a>
                            </li>

                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
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
        <div class="form-box">
            <!-- Form To Add List Starts Here -->
            <form method="POST" action="">
                <div class="form-group">
                    <p style="margin-left: 0.5vw">List Name:</p>
                    <label style="width: 15vw">
                        <input type="text" name="list_name" class="form-control" placeholder="Enter list name" required>
                    </label>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <!-- Form To Add List Ends Here -->

</body>

</html>