<?php
$servername = "localhost"; // Change to your server (e.g., 127.0.0.1 or cloud server IP)
$username = "root"; // Your DB username
$password = "Darkbluegolf441257@"; // Your DB password
$dbname = "best_cluster_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
