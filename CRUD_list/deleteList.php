<?php
session_start();
require_once '../connect.php';
//Check whether the list_id is assigned or not
if (isset($_GET['list_id'])) {
    //Delete the list from the database

    //Get the last ID Value From URL or Get Method
    $list_id = $_GET['list_id'];
    $task_id = $_GET['task_id'];

    $sql = "DELETE FROM ToDoList.list WHERE list_id = $list_id ";

    //Execute the query
    $result = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if ($result == true) {
        //Query Executed Successfully, wich means that the list is deleted successfully
        $_SESSION['delete'] = 'List deleted Successfully';

        //Redirect to manage list page
        header('location:' . 'http://localhost/Jaar-2/Blok-1/ToDoList/manageList.php');
    } else {
        //Failed to delete the list
        //Query Executed Successfully, wich means that the list is deleted successfully
        $_SESSION['delete_fail'] = 'Failed to delete the list';

        //Redirect to manage list page
        header('location:' . 'http://localhost/Jaar-2/Blok-1/ToDoList/manageList.php');
    }
}
