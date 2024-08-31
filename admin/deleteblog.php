<?php
include_once "./session.php";
check_login();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle deletion if a POST request is received
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);
    $delete_sql = "DELETE FROM content_table WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the same page to refresh the content
    exit();
}

// Fetch all content
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
</head>

<body>

    <?php include "navbar.php"; ?>

    <?php foreach ($contents as $content): ?>
        <div class="content-container">
            <div class="image-container">
                <?php
                $doc = new DOMDocument();
                libxml_use_internal_errors(true);
                $contentHtml = mb_convert_encoding($content['content'], 'HTML-ENTITIES', 'UTF-8');
                @$doc->loadHTML($contentHtml);
                libxml_clear_errors();
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
                ?>
            </div>

            <div class="text-content">
                <?php
                if ($body) {
                    foreach ($body->childNodes as $node) {
                        if ($node->nodeName === 'p') {
                            $imgElement = $node->getElementsByTagName('img')->item(0);
                            if (!$imgElement) {
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
                ?>

            </div>
            <!-- Delete Button -->
            <div class="btn">
                <?php if ($content['id'] != 0): ?>
                    <form method="POST" class="delete-form">
                        <input type="hidden" name="delete_id" value="<?= htmlspecialchars($content['id']) ?>">
                        <button type="submit">Delete</button>
                    </form>
                <?php endif; ?>

            </div>
        </div>
    <?php endforeach; ?>

</body>

</html>