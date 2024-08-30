<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and prepare content for saving
$editorContent = $conn->real_escape_string($_POST['editorContent']);

// Insert into the database
$sql = "INSERT INTO content_table (content) VALUES ('$editorContent')";

if ($conn->query($sql) === TRUE) {
    header("location: dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
