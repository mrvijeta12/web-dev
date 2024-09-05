<?php
include_once "./session.php";
check_login();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if delete-id is set
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete-id'])) {
    $id = intval($_POST['delete-id']);

    // Prepare and execute delete query
    $stmt = $conn->prepare("DELETE FROM content_table WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect back to viewContent.php with a success message
        header('Location: dashboard.php?deleted=success');
    } else {
        // Redirect back to viewContent.php with an error message
        header('Location: dashboard.php?deleted=error');
    }

    $stmt->close();
} else {
    // Redirect back to viewContent.php if accessed without proper parameters
    header('Location: dashboard.php?deleted=error');
}

$conn->close();
exit();
