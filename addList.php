<?php
//Checks whether the form is submitted or not
if (isset($_POST['submit'])) {
    //Get the values from form and save it in variables
    echo $list_name = $_POST['list_name'];
    echo $list_description = $_POST['list_description'];
    //SQL Query to Insert data into database
    Query("INSERT INTO tbl_lists SET list_name = '$list_name', list_description = '$list_description'");
}

function Query($sql)
{
    global $conn;
    if (!$conn) // will only connect if connection does not exist yet
    {
        $dbServername = 'localhost';
        $dbUsername = 'root';
        $dbPassword = 'mysql';
        $dbName = 'to-do-list';
        $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    }
    return mysqli_query($conn, $sql);
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
                <input type="submit" name="submit" value="Save">
            </td>
        </tr>

    </table>
</form>

<!-- Form To Add List Ends Here -->

</body>
</html>