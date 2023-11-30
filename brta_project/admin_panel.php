<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    
<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin-bottom: 10px;
}

a {
    text-decoration: none;
    color: #3498db;
    display: block;
    padding: 10px;
    border: 1px solid #3498db;
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s;
}

a:hover {
    background-color: #3498db;
    color: #fff;
}


</style>

</head>
<body>

<div class="container">
    <h2>Admin Panel</h2>

    <ul>
        <li><a href="add_admin.php">Add Admin</a></li>
        
    </ul>
</div>

</body>
</html>
