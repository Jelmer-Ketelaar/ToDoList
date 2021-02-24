<?php
session_start();
//Select all from list
//Check whether the Update button is Clicked or not
if (isset($_GET['task_id'])) {

    //Get the updated values from our form
    $task_id = $_GET['task_id'];

    //Database connection
    $conn = mysqli_connect('localhost', 'root', 'mysql');

//Select Database
    $db_select = mysqli_select_db($conn, 'ToDoList');

//Select all from list
    $sql = "SELECT * FROM todolist.task WHERE task_id = $task_id";
//Execute the query
    $result = mysqli_query($conn, $sql);

    //Check if the query is executed successfully or not
    if ($result == true) {
        //Get the value from database
        $row = mysqli_fetch_assoc($result);
        //Get individual value
        $list_id = $row['list_id'];
        $task_name = $row['task_name'];
        $task_description = $row['task_description'];
        $priority = $row['priority'];
        $begin_date = $row['begin_date'];
        $deadline = $row['deadline'];

        //If update is successful
        //Displays a messages
        $_SESSION['update'] = "List Updated Successfully";


    } //Else: If it has failed to update
    else {
        //Displays a messages
        $_SESSION['update'] = "List Not added";
        header('location' . 'http://localhost/Jaar-2/Blok-1/ToDoList/index.php');
    }
}


/* Here starts the code for updating when clicking the button */
//Check whether the Update button is Clicked or not
if (isset($_POST['submit'])) {

//Get the updated values from our form
    $list_id = $_POST['task_id'];
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];
    $priority = $_POST['priority'];
    $begin_date = $_POST['begin_date'];
    $deadline = $_POST['deadline'];

    //Database connection
    $conn3 = mysqli_connect('localhost', 'root', 'mysql');

    //Select Database
    $db_select3 = mysqli_select_db($conn3, 'ToDoList');

    //Select all from list
    $sql3 = "UPDATE ToDoList.task SET
task_name = '$task_name',
task_description = '$task_description',
task_id = '$task_id',
priority = '$priority',
begin_date = '$begin_date',
deadline = '$deadline'
WHERE
task_id = $task_id";

    //Execute the query
    $result3 = mysqli_query($conn3, $sql3);

    if ($result3 == true) {
        //If update is successful
        //Set the message
        $_SESSION['update'] = "List Updated Successfully";

        //Redirect to Same Page
        header('location:' . 'http://localhost/Jaar-2/Blok-1/ToDoList/index.php');
    } //Else: If it has failed to update
    else {
        //Set the message
        $_SESSION['update_fail'] = "Failed to Update the List";

        //Redirect to Same Page
        header('location:' . 'http://localhost/Jaar-2/Blok-1/ToDoList/CRUD_task/updateTask.php?task_id=' . $task_id);
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
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">

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
    <a class="navbar-brand" href="#" style="cursor: auto">Update Task Page</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
        </ul>

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
    </div>
</nav>
<h1 class="title">ToDoList</h1>

<p>

    <?php
    //Check whether the session is set or not
    if (isset($_SESSION['update_fail'])) {

        echo $_SESSION['update_fail'];
        unset ($_SESSION['update_fail']);
    }
    ?>

</p>
<!-- Form To Update List Starts Here -->
<form method="POST" action="">
    <div class="form-group">
        <p style="margin-left: 0.5vw">List Name:</p>
        <label style="width: 15vw">
            <input type="text" name="task_name" class="form-control" value="<?php echo $task_name ?>"
                   placeholder="Enter task name">
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
            <select class="form-control" id="exampleFormControlSelect1" name="list_id">
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
                        $list_id_db = $row3['list_id'];
                        $list_name = $row3['list_name'];

                        ?>
                        <option <?php if ($list_id_db == $list_id) {
                            echo "selected = 'selected'";
                        } ?> value="<?php echo $list_id_db; ?>"><?php echo $list_name; ?></option>
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
            <input type="date" name="begin_date" value="<?php echo $begin_date; ?>">
        </label>
    </div>
    <div class="form-group">
        <p>Deadline:</p>
        <label>
            <input type="date" name="deadline" value="<?php echo $deadline; ?>">
        </label>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<?php } ?>
<!-- Form To Update List Ends Here -->

</body>
</html>
