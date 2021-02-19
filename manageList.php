<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>ToDoList</h1>

<a href="index.php">Home</a>

<h3>Manage List Page</h3>
<!--Table to display lists starts here-->

<div class="all-lists">

    <a href="addList.php">Add List</a>

    <table>
        <tr>
            <th>ID</th>
            <th>List Name</th>
            <th>Actions</th>
        </tr>

        <tr>
            <td>1.</td>
            <td>To-Do</td>
            <td>
                <a href="#">Update</a>
                <a href="#">Delete</a>
            </td>
        </tr>

        <tr>
            <td>2.</td>
            <td>Doing</td>
            <td>
                <a href="#">Update</a>
                <a href="#">Delete</a>
            </td>
        </tr>
    </table>
</div>
</body>
</html>