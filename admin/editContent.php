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
</head>

<body>
    <?php include "navbar.php"; ?>

    <?php
    foreach ($contents as $row) {
        $content = $row['content'];
        $id = $row['id'];

        $doc = new DOMDocument();
        libxml_use_internal_errors(true);

        $content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');
        @$doc->loadHTML($content);
        libxml_clear_errors();

        echo "<div class='content-container'>";

        // Separate div for the image
        echo "<div class='image-container'>";

        $body = $doc->getElementsByTagName('body')->item(0);
        if ($body) {
            foreach ($body->childNodes as $node) {
                if ($node->nodeName === 'p') {
                    $imgElement = $node->getElementsByTagName('img')->item(0);
                    if ($imgElement) {
                        $src = htmlspecialchars($imgElement->getAttribute('src'));
                        $alt = htmlspecialchars($imgElement->getAttribute('alt'));
                        echo "<img src='{$src}' alt='{$alt}'>";
                    }
                }
            }
        }

        echo "</div>"; // End of image-container

        // Separate div for the text content
        echo "<div class='text-content'>";

        if ($body) {
            foreach ($body->childNodes as $node) {
                if ($node->nodeName === 'p') {
                    $imgElement = $node->getElementsByTagName('img')->item(0);
                    if (!$imgElement) { // Only output non-image paragraphs here
                        $anchorElement = $node->getElementsByTagName('a')->item(0);
                        if ($anchorElement) {
                            $href = htmlspecialchars($anchorElement->getAttribute('href'));
                            $title = htmlspecialchars($anchorElement->getAttribute('title'));
                            $target = htmlspecialchars($anchorElement->getAttribute('target'));
                            $rel = htmlspecialchars($anchorElement->getAttribute('rel'));
                            $anchorText = htmlspecialchars($anchorElement->nodeValue);
                            echo "<a href='{$href}' title='{$title}' target='{$target}' rel='{$rel}'>{$anchorText}</a>";
                        } else {
                            echo "<p>" . htmlspecialchars($node->nodeValue) . "</p>";
                        }
                    }
                } else if (in_array($node->nodeName, ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'])) {
                    echo "<{$node->nodeName}>" . htmlspecialchars($node->nodeValue) . "</{$node->nodeName}>";
                } else if ($node->nodeName === 'ul') {
                    echo "<ul>";
                    foreach ($node->childNodes as $li) {
                        if ($li->nodeName === 'li') {
                            echo "<li>" . htmlspecialchars($li->nodeValue) . "</li>";
                        }
                    }
                    echo "</ul>";
                } else if ($node->nodeName === 'ol') {
                    echo "<ol>";
                    foreach ($node->childNodes as $li) {
                        if ($li->nodeName === 'li') {
                            echo "<li>" . htmlspecialchars($li->nodeValue) . "</li>";
                        }
                    }
                    echo "</ol>";
                }
            }
        }

        echo "</div>"; // End of text-content

        // Add Edit button
        if ($id > 0) {
            echo "<form method='GET' action='editContent.php'>";
            echo "<input type='hidden' name='id' value='{$id}'>";
            echo "<button type='submit'>Edit</button>";
            echo "</form>";
        }

        echo "</div>"; // End of content-container
    }
    ?>
</body>

</html>