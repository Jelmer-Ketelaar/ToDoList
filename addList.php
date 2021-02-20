<?php
    //Connect Database
    require 'db_connect.php';

    //Select Database
    $db_select = mysqli_select_db($conn, 'To-Do-List');

//Check whether the database is connected
    if ($db_select == true) {
        echo '<script>console.log("Database Selected");</script>';
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDoList</title>
</head>
<body>

<h1>ToDoList</h1>

<a href="index.php">Home</a>
<a href="manageList.php">Manage lists</a>

<h3>Add List Page</h3>

<!-- Form To Add List Starts Here -->

<form method="POST" action="">
    <table>
        <tr>
            <td>List Name:</td>
            <td>
                <label>
                    <input type="text" name="list_name" placeholder="Type list name here">
                </label>
            </td>
        </tr>

        <tr>
            <td>List Description:</td>
            <td><label>
                    <textarea name="list_description" placeholder="Type list Description here"></textarea>
                </label>
            </td>
        </tr>

        <tr>
            <td>
                <table>
                    <input type="submit" name="submit" value="Save">
                </table>
            </td>
        </tr>

    </table>
</form>

<!-- Form To Add List Ends Here -->

</body>
</html>

<?php
//Checks whether the form is submitted or not
if (isset($_POST['submit'])) {
//        echo "Form Submitted";

    //Get the values from form and save it in variables
    echo $list_name = $_POST['list_name'];
    echo $list_description = $_POST['list_description'];
}