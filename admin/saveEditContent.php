<?php
include_once "session.php";
check_login();
include_once 'database.php';

// Get the form data
$meta_title = isset($_POST['meta_title']) ? $_POST['meta_title'] : '';
$summary = isset($_POST['summary']) ? $_POST['summary'] : '';
$content = isset($_POST['editorContent']) ? $_POST['editorContent'] : '';
$slug = isset($_POST['slug']) ? $_POST['slug'] : '';
$page_type = isset($_POST['page_type']) ? $_POST['page_type'] : '';

// Generate a new slug from the updated meta_title
$new_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $meta_title)));

// Remove leading dashes if present
$new_slug = ltrim($new_slug, '-');

// Handle feature image upload if a new one is provided
$social_sharing_image = '';
if (isset($_FILES['social_sharing_image']) && $_FILES['social_sharing_image']['error'] == UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/'; // Directory where images will be uploaded
    $uploadFile = $uploadDir . basename($_FILES['social_sharing_image']['name']);

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES['social_sharing_image']['tmp_name'], $uploadFile)) {
        $social_sharing_image = $uploadFile; // Set the feature image to the new upload
    } else {
        echo "Error uploading image.";
        exit;
    }
}

// Prepare the SQL update statement
if ($social_sharing_image) {
    $stmt = $conn->prepare("UPDATE webdev_blogs SET meta_title=?, summary=?, content=?, page_type=?, social_sharing_image=?, slug=?  WHERE slug=?");
    $stmt->bind_param("sssssss", $meta_title, $summary, $content, $page_type, $social_sharing_image, $new_slug, $slug);
} else {
    $stmt = $conn->prepare("UPDATE webdev_blogs SET meta_title=?, summary=?, content=?, page_type=?, slug=? WHERE slug=?");
    $stmt->bind_param("ssssss", $meta_title, $summary, $content, $page_type, $new_slug, $slug);
}

// Execute the statement
if ($stmt->execute()) {
    // Optional: set a success message
    $_SESSION['success_message'] = "Blog post updated successfully.";
    header("Location: dashboard.php"); // Redirect to the dashboard after updating
    exit;
} else {
    echo "Error updating record: " . htmlspecialchars($stmt->error);
}

$stmt->close();
$conn->close();
