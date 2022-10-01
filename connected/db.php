<?php
$conn = new mysqli("localhost", "root", "", "psikotes_depresi");

// Check connection
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}
