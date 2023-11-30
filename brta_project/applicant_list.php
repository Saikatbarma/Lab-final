<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM applicants ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant List</title>
    
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
    <h2>Applicant List</h2>

    <ul>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<li><a href='applicant_details.php?id={$row['id']}'>{$row['name']}</a></li>";
        }
        ?>
    </ul>
</div>

</body>
</html>
