<?php
// analysis_turb.php
header("Access-Control-Allow-Origin: *"); // Allow all domains
header("Content-Type: application/json"); // Ensure the response is JSON

// Database connection
$servername = "34.30.45.205";
$username = "flowguard";
$password = "cpe12345";
$dbname = "flowguard";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Get the ID from the request
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch data from the database based on the ID
$sql = "SELECT * FROM tubidity_null WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data as JSON
    $row = $result->fetch_assoc();
    echo json_encode(["turbidity_outcome" => $row['turbidity_outcome']]); // Replace 'some_field' with the actual field name
} else {
    echo json_encode(["error" => "No data found for ID: $id"]);
}

$conn->close();
?>