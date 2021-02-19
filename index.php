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

<!-- Menu starts here -->
<div class="menu">

    <a href="index.php">Home</a>

    <a href="#">To-Do</a>
    <a href="#">Doing</a>
    <a href="#">Done</a>

    <a href="manageList.php">Manage Lists</a>
</div>
<!-- Menu ends here -->

<!-- Tasks starts here -->
<div class="task">

    <a href="#">Add Task</a>
    <table>
        <tr>
            <th>id</th>
            <th>Task Name</th>
            <th>Priority</th>
            <th>Deadline</th>
            <th>Actions</th>
        </tr>

        <tr>
            <td>1.</td>
            <td>Design a website</td>
            <td>Medium</td>
            <td>19-02-2021</td>
            <td>
                <a href="#"> Update </a>
                <a href="#"> Delete </a>
            </td>
        </tr>
    </table>
</div>
<!-- Tasks starts here -->
</body>
</html>
