<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bangladeshi BRTA</title>

   <style>

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    
}

.container {
    
    background-color: #f4f4f4;
}

h4 {
    color: #007bff;
}

#slider {
    margin-bottom: 20px;
}

#instructions {
    margin-bottom: 20px;
}

footer {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}

.column {
    width: 30%;
    display: inline-block;
    vertical-align: top;
   
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

form {
    margin-top: 10px;
}

input[type="email"] {
    padding: 5px;
    width: 70%;
}

button {
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

/* Responsive Design */
@media (max-width: 600px) {
    .column {
        width: 100%;
        margin: 0;
    }
}





   </style>
    
</head>
<body>
<center>
<a href="form.php">user form</a>
<a href="login.php">login admin</a>
</center>
<br> 

        
<div class="container">
    <div id="slider" >
    <center><img src="http://localhost/itsme/download.png" width="250" height="200" > </center>
    </div>
  <center>
    <div id="instructions">
       <p> License Instructions: </p>
<h4>Personal Information:</h4>

Applicants must provide accurate personal information, including name, date of birth, address, etc.
<h4>Eligibility Criteria:</h4>

Specify the eligibility criteria for different types of licenses (e.g., age requirements, educational qualifications).
<h4>Documents Required:</h4>

List the documents applicants need to submit (e.g., national ID, passport, proof of address).
<h4>Application Process: </h4>

Explain the step-by-step process for applying for a license.
Include details about the application form, submission locations, and any online application options.
</h4>Written Test:</h4>

If applicable, describe any written test requirements.
<h4>Driving Test:</h4>

Outline the driving test procedure, including the types of vehicles for which the test is mandatory.
<h4>Medical Examination:</h4>

Specify any medical examinations that applicants may need to undergo.
<h4>Fees and Payment: </h4>

Provide a detailed list of fees for different types of licenses and modes of payment accepted.
<h4>Processing Time:</h4>

Mention the expected processing time for license approval.
<h4>Renewal Process: </h4>

Include information about license renewal procedures and any renewal fees.
Fee Structure for Different Vehicles:
<h4>Motorcycle License:</h4>

Application Fee: 1200 taka <br>
Test Fee: 500 taka <br>
License Fee: 6400 taka<br>
Total: 8100 taka <br>
Renewal of Motorcycle License: 7000 taka


<h4>Car License:</h4>

Application Fee: 2000 taka <br>
Test Fee: 1200 taka <br>
License Fee: 44000 taka<br>
Total: 47200 taka <br>

<h4>Heavy Vehicle License:</h4>

Application Fee: 3000 taka <br>
Test Fee: 2100 taka <br>
License Fee: 70000 taka<br>
Total: 82100 taka <br>

       
       </div>
</center>

    <footer>
        <div class="column">
            <h3>Contact</h3>
            16107,09610 990 998  <br>
          SUNDAY - THURSDAY (9.00 AM - 4.00 PM)
        
        </div>
        <div class="column">
            <h3>Important Links</h3>
            <a href="http://www.brta.gov.bd/">Dashboard</a>
        </div>
        <div class="column">
            <h3>Subscribe</h3>
            <form id="subscribeForm">
                <input type="email" name="email" placeholder="Enter your email" required>
                <button type="button" onclick="subscribe()">Subscribe</button>
            </form>
        </div>
    </footer>
</div>

<script>

function subscribe() {
    var email = document.getElementsByName("email")[0].value;

    // Perform frontend validation (you can also add more validation here)

    // Send the email to the server using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "subscribe.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            alert(xhr.responseText); // Display the server response
        }
    };
    xhr.send("email=" + email);
}



</script>

<?php
// Database connection
$servername = "your_database_server";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process and store the subscription email
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Perform server-side validation and sanitation here

    // Insert email into the database
    $sql = "INSERT INTO subscribers (email) VALUES ('$email')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Subscription successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>



</body>
</html>
