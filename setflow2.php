<?php
$servername = "34.30.45.205";
$username = "flowguard";
$password = "cpe12345";
$dbname = "flowguard";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the data from the HTTP request
$daloy2 = $_POST['flowrate2'];


// Prepare and bind
$stmt = $conn->prepare("INSERT INTO flow2 (fr2, DateTime) VALUES (?, NOW())");
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

// Bind parameters
$stmt->bind_param("d", $daloy2);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "New records created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>