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

// Fetch all content with ID
$sql = "SELECT id, content FROM content_table ORDER BY id DESC";
$result = $conn->query($sql);

$contents = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $contents[] = $row;
    }
} else {
    $contents[] = ["id" => 0, "content" => "No content found."];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Content Layout</title>
    <link rel="stylesheet" href="./assets/css/dashboard.css">
    <script>
        function handleContainerClick(event, id) {
            if (!event.target.classList.contains('edit-button')) {
                window.location.href = 'viewContent.php?id=' + id;
            }
        }
    </script>
    <style>
        /* Add your CSS styles here */
    </style>
</head>

<body>
    <?php include "navbar.php"; ?>

    <?php foreach ($contents as $row): ?>
        <?php
        $content = $row['content'];
        $id = $row['id'];

        // Load HTML content and remove images
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');
        @$doc->loadHTML($content);
        libxml_clear_errors();

        $xpath = new DOMXPath($doc);
        $images = $xpath->query('//img');

        // Extract and display images separately
        $imageHtml = '';
        foreach ($images as $img) {
            $src = htmlspecialchars($img->getAttribute('src'));
            $alt = htmlspecialchars($img->getAttribute('alt'));
            $imageHtml .= "<img src='{$src}' alt='{$alt}'>";
        }

        // Remove images from content
        foreach ($images as $img) {
            $img->parentNode->removeChild($img);
        }

        // Get the cleaned content
        $textContent = $doc->saveHTML();
        ?>

        <div class='content-container' onclick='handleContainerClick(event, <?= $id ?>)'>

            <!-- Image Container -->
            <div class='image-container'>
                <?php echo $imageHtml; ?>
            </div>

            <!-- Text Content -->
            <div class='text-content'>
                <?php echo $textContent; ?>
            </div>

            <!-- Edit Button -->
            <?php if ($id > 0): ?>
                <form method='GET' action='editblog.php' class='edit-form'>
                    <input type='hidden' name='id' value='<?= $id ?>'>
                    <button type='submit' class='edit-button'>Edit</button>
                </form>
            <?php endif; ?>

        </div>

    <?php endforeach; ?>
</body>

</html>