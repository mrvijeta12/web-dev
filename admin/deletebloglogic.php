<?php
include_once "session.php";
check_login();
include_once 'database.php';



// Check if delete ID is provided
if (isset($_POST['delete-id'])) {
    $id = (int)$_POST['delete-id'];

    // Prepare and execute delete statement
    $stmt = $conn->prepare("DELETE FROM webdev_blogs  WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Successful deletion
        header("Location: deleteblog?success=1");
        exit;
    } else {
        // Error handling
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No ID provided for deletion.";
}

$conn->close();
