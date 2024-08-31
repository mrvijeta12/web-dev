<?php
include_once "./session.php";
check_login();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the content and content ID from the form
$editorContent = isset($_POST['editorContent']) ? $_POST['editorContent'] : '';
$content_id = isset($_POST['content_id']) ? intval($_POST['content_id']) : 0;

if ($content_id > 0) {
    // Update existing content
    $stmt = $conn->prepare("UPDATE content_table SET content = ? WHERE id = ?");
    $stmt->bind_param("si", $editorContent, $content_id);
    $stmt->execute();
    $stmt->close();
} else {
    // Insert new content
    $stmt = $conn->prepare("INSERT INTO content_table (content) VALUES (?)");
    $stmt->bind_param("s", $editorContent);
    $stmt->execute();
    $stmt->close();
}

$conn->close();

header("Location: dashboard.php"); // Redirect after saving
exit;
