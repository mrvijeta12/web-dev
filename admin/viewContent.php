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

// Get the ID from the query string
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch content based on the ID
$sql = "SELECT id, content FROM content_table WHERE id = $id";
$result = $conn->query($sql);

$blog = null;
if ($result->num_rows > 0) {
    $blog = $result->fetch_assoc();
} else {
    echo "No content found.";
    exit;
}

$conn->close();

// Extract images from content
$content = $blog['content'];
$doc = new DOMDocument();
libxml_use_internal_errors(true);
$content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');
@$doc->loadHTML($content);
libxml_clear_errors();

$xpath = new DOMXPath($doc);
$images = $xpath->query('//img');

// Prepare image HTML
$imageHtml = '';
foreach ($images as $img) {
    $src = htmlspecialchars($img->getAttribute('src'));
    $alt = htmlspecialchars($img->getAttribute('alt'));
    $imageHtml .= "<img src='{$src}' alt='{$alt}' style='width: 100%; max-width: 600px; margin-bottom: 10px;'>";
}

// Remove images from content
foreach ($images as $img) {
    $img->parentNode->removeChild($img);
}

// Get the cleaned content
$textContent = $doc->saveHTML();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Content</title>
    <link rel="stylesheet" href="./assets/css/viewContent.css">

</head>

<body>
    <!-- Navigation Bar -->
    <?php include "./navbar.php"; ?>
    <div class="container">
        <!-- Image Container -->
        <div class="image-container">
            <?php echo $imageHtml; ?>
        </div>

        <!-- Text Content -->
        <div class="text-content">
            <?php echo $textContent; ?>
        </div>

        <!-- Back Button -->
        <a href="dashboard.php" class="back-button">Back to Dashboard</a>
    </div>
</body>

</html>