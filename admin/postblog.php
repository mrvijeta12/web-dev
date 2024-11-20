<?php
include_once "session.php";
check_login();

include_once 'database.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize input fields
    $meta_title = isset($_POST['meta_title']) ? $conn->real_escape_string($_POST['meta_title']) : '';
    $summary = isset($_POST['summary']) ? $conn->real_escape_string($_POST['summary']) : '';
    $content = isset($_POST['editorContent']) ? $conn->real_escape_string($_POST['editorContent']) : '';
    $category = isset($_POST['category']) ? $conn->real_escape_string($_POST['category']) : '';

    // Handle feature image upload
    $featureImagePath = '';
    if (isset($_FILES['social_sharing_image']) && $_FILES['social_sharing_image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpName = $_FILES['social_sharing_image']['tmp_name'];
        $imageName = $_FILES['social_sharing_image']['name'];

        // Get the image file extension
        $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        // Define allowed file types
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageExt, $allowed)) {
            // Define a new unique name for the image file
            $imageNewName = uniqid('', true) . '.' . $imageExt;
            $imageDestination = 'uploads/' . $imageNewName;

            // Move the uploaded file to the desired folder
            if (move_uploaded_file($imageTmpName, $imageDestination)) {
                // File successfully uploaded, set the path
                $featureImagePath = $imageDestination;
            } else {
                echo "Error uploading the file.";
                exit;
            }
        } else {
            echo "Invalid file type.";
            exit;
        }
    } else {
        echo "Image upload error: " . $_FILES['social_sharing_image']['error'];
        exit;
    }

    // Generate slug from meta_title
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $meta_title)));
    $slug = ltrim($slug, '-'); // Remove leading dashes if present

    // Get current date, time, and datetime
    date_default_timezone_set('Asia/Kolkata');
    $currentDate = date('Y-m-d'); // Current date in YYYY-MM-DD format
    $currentTime = date('H:i:s'); // Current time in HH:MM:SS format
    $currentDatetime = date('Y-m-d H:i:s'); // Current datetime in YYYY-MM-DD HH:MM:SS format

    // Determine the blog status based on the button clicked
    $blog_status = isset($_POST['addToDraft']) ? 'draft' : 'published';

    // Prepare the SQL query using prepared statements
    $stmt = $conn->prepare("INSERT INTO webdev_blogs (
        meta_title, 
        summary, 
        content, 
        category, 
        social_sharing_image, 
        slug, 
        blog_status, 
        blog_date, 
        blog_time, 
        created_at
    ) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("ssssssssss", $meta_title, $summary, $content, $category, $featureImagePath, $slug, $blog_status, $currentDate, $currentTime, $currentDatetime);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect to dashboard after successful operation
        header("Location: dashboard.php");
        exit; // Ensure no further code is executed after redirection
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
