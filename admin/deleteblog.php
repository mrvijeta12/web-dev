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
    <link rel="stylesheet" href="./assets/css/deleteblog.css">
    <script>
        function deleteContent(id) {
            // Directly submit the form to delete the content
            document.getElementById('delete-form-' + id).submit();
        }
    </script>
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

        <div class='content-container'>

            <!-- Image Container -->
            <div class='image-container'>
                <?php echo $imageHtml; ?>
            </div>

            <!-- Text Content -->
            <div class='text-content'>
                <?php echo $textContent; ?>
            </div>

            <!-- Delete Button -->
            <?php if ($id > 0): ?>
                <form id='delete-form-<?= $id ?>' method='POST' action='deletebloglogic.php' style='display: none;'>
                    <input type='hidden' name='delete-id' value='<?= $id ?>'>
                </form>
                <button type='button' onclick='deleteContent(<?= $id ?>)' class='delete-button'>Delete</button>
            <?php endif; ?>

        </div>

    <?php endforeach; ?>
</body>

</html>