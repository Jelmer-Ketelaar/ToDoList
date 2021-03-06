<?php
session_start();
require_once '../connect.php';
//Check whether the list_id is assigned or not
if (isset($_GET['task_id'])) {
    //Delete the list from the database

    //Get the last ID Value From URL or Get Method
    $task_id = $_GET['task_id'];

    //Select all from list
    $sql = "DELETE FROM todolist.task WHERE todolist.task.task_id = $task_id";

    //Execute the query
    $result = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if ($result == true) {
        //Query Executed Successfully, which means that the list is deleted successfully
        $_SESSION['delete'] = 'Task deleted Successfully';

        //Redirect to manage list page
        header('location:' . 'http://localhost/Jaar-2/Blok-1/ToDoList/index.php');
    } else {
        //Failed to delete the list
        //Query Executed Successfully, which means that the list is deleted successfully
        $_SESSION['delete_fail'] = 'Failed to delete the task';

        //Redirect to manage list page
        header('location:' . 'http://localhost/Jaar-2/Blok-1/ToDoList/index.php');
    }
}
