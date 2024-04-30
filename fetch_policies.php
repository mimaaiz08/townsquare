<?php
// Connect to your database (replace placeholders with actual credentials)
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'login';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL query based on filter parameters
$sql = "SELECT * FROM Policies WHERE 1";

if (!empty($_GET['education_level'])) {
    $educationLevel = $conn->real_escape_string($_GET['education_level']);
    $sql .= " AND education_level = '$educationLevel'";
}

if (!empty($_GET['employment_status'])) {
    $employmentStatus = $conn->real_escape_string($_GET['employment_status']);
    $sql .= " AND employment_status = '$employmentStatus'";
}

$result = $conn->query($sql);

$policies = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $policies[] = $row;
    }
}

// Close database connection
$conn->close();

// Return policies data as JSON response
header('Content-Type: application/json');
echo json_encode($policies);
?>
