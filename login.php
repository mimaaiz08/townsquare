<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get input from login form
$user = $_POST['username'];
$pass = $_POST['password'];

// SQL query to check if user exists and password matches
$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User exists and password matches
    echo "Login successful!";
} else {
    // User doesn't exist or password doesn't match
    echo "Login failed. Please check your username and password.";
}

// Close connection
$conn->close();
?>
