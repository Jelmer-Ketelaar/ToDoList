<?php

$conn = mysqli_connect('localhost', 'root', 'mysql') or die(mysqli_error());

//Check whether the database is connected or not
if ($conn == true) {
    echo '<script>console.log("Database Connected");</script>';
}



