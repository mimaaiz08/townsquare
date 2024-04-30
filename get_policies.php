<?php
// Include your database connection configuration here
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'login';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$criteria = $_GET['criteria'] ?? ''; // Get the criteria parameter from the AJAX request

// Build SQL query based on criteria (filtering)
$sql = "SELECT * FROM Policies";
if (!empty($criteria)) {
  $sql .= " WHERE $criteria IS NOT NULL";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output policies as HTML list items
  while ($row = $result->fetch_assoc()) {
    echo '<div class="card mb-3">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $row['title'] . '</h5>';
    echo '<p class="card-text">' . $row['description'] . '</p>';
    echo '<p><strong>Minimum Age:</strong> ' . $row['min_age'] . '</p>';
    echo '<p><strong>Maximum Age:</strong> ' . ($row['max_age'] ? $row['max_age'] : 'None') . '</p>';
    echo '<p><strong>Minimum Income:</strong> $' . number_format($row['min_income'], 2) . '</p>';
    echo '<p><strong>Maximum Income:</strong> $' . ($row['max_income'] ? number_format($row['max_income'], 2) : 'None') . '</p>';
    echo '</div>';
    echo '</div>';
  }
} else {
  echo '<p>No policies found.</p>';
}

$conn->close();
?>
