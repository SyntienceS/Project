<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <title>Register</title>
<link rel="icon" type="image/png" href="logo.png" />
<link rel="stylesheet" href="style2.css">
</head>
<body>
<div class="container">
  <nav>
    <ul class="bar">
    <li><a href="home.php">Home</a></li>
    <li><a href="auctions.php">Our Products</a></li>
    <li><a href="contact_information.php">Contact Information</a></li>
    <li><a href="survey.php">Survey</a></li>
    <li><a href="about_us.php">About Us</a></li>
    <li><a href="login.php">Login</a></li>
    <li><a href="register.php">Register</a></li>
  </ul>
  </nav>
    <form action="register.php" method="post">
        <div>
            <span class="question">Username:</span>
            <div class="radio-group">
        <input type="text" name="username" required>
        </div>
        <br>
        <div>
            <span class="question">Password:</span>
            <div class="radio-group">
        <input type="password" name="password" required>
        </div>
        </br>
        <!-- please send help-->
      <div>
        <button class="submit_btn">Register</button>
      </div>
</form>
</body>
</html>
<?php
// register.php
$servername = "localhost";
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$dbname = "login_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();