<?php
session_start();

$conn = mysqli_connect('localhost', 'root', 'mysql');
//Returns the error code from last connect call
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

//Select Database
$db_select = mysqli_select_db($conn, 'ToDoList');
