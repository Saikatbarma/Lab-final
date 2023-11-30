<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>License Application Form</title>
    
<style>

body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #007bff;
}

form {
    text-align: left;
}

label {
    display: block;
    margin: 10px 0;
    color: #333;
}

input[type="text"],
input[type="email"],
textarea,
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    box-sizing: border-box;
}

button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}


@media (max-width: 768px) {
    .container {
        max-width: 90%;
    }
}


</style>

</head>
<body>

<a href="index.php">Home Page</a>

<center>
<div class="container">
    <h2>License Application Form</h2>

    <form id="licenseForm" action="index.php" method="post"  onsubmit="return validateForm()">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="photo">Passport Size Photo:</label>
        <input type="file" id="photo" name="photo" accept="image/*" required><br><br>

        <label for="nidCopy">NID Soft Copy:</label>
        <input type="file" id="nidCopy" name="nidCopy" accept=".pdf" required><br><br>

        <label for="presentAddress">Present Address:</label>
        <textarea id="presentAddress" name="presentAddress" required></textarea><br><br>

        <label for="permanentAddress">Permanent Address:</label>
        <textarea id="permanentAddress" name="permanentAddress" required></textarea><br><br><br>

        <button type="submit">Submit Application</button>
    </form>
</div>
</center>
<script>

function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;


    if (name === "" || email === "" ) {
        alert("All fields must be filled out");
        return false;
    }

    
    return true;
}


</script>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $name = $_POST["name"];
    $email = $_POST["email"];
    

    
    $sql = "INSERT INTO license_applications (name, email, ) VALUES (?, ?, )";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss" , $name, $email );

    if ($stmt->execute()) {
        echo "Application submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>



</body>
</html>
