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

// Fetch all content
$sql = "SELECT content FROM content_table ORDER BY id DESC";
$result = $conn->query($sql);

$contents = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $contents[] = $row['content'];
    }
} else {
    $contents[] = "No content found.";
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
    // foreach ($contents as $content) {
    //     $doc = new DOMDocument();
    //     libxml_use_internal_errors(true);

    //     $content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');
    //     @$doc->loadHTML($content);
    //     libxml_clear_errors();

    //     echo "<div class='content-container'>";
    //     echo "<div class='text-content'>";

    //     // Traverse the nodes in the order they appear in the document
    //     $body = $doc->getElementsByTagName('body')->item(0);
    //     if ($body) {
    //         foreach ($body->childNodes as $node) {
    //             if ($node->nodeName === 'p') {
    //                 // Check if the paragraph contains an image
    //                 $imgElement = $node->getElementsByTagName('img')->item(0);
    //                 if ($imgElement) {
    //                     $src = htmlspecialchars($imgElement->getAttribute('src'));
    //                     $alt = htmlspecialchars($imgElement->getAttribute('alt'));
    //                     echo "<img src='{$src}' alt='{$alt}'>";
    //                 } else {
    //                     // Check if the paragraph contains an anchor tag
    //                     $anchorElement = $node->getElementsByTagName('a')->item(0);
    //                     if ($anchorElement) {
    //                         $href = htmlspecialchars($anchorElement->getAttribute('href'));
    //                         $title = htmlspecialchars($anchorElement->getAttribute('title'));
    //                         $target = htmlspecialchars($anchorElement->getAttribute('target'));
    //                         $rel = htmlspecialchars($anchorElement->getAttribute('rel'));
    //                         $anchorText = htmlspecialchars($anchorElement->nodeValue);
    //                         echo "<a href='{$href}' title='{$title}' target='{$target}' rel='{$rel}'>{$anchorText}</a>";
    //                     } else {
    //                         echo "<p>" . htmlspecialchars($node->nodeValue) . "</p>";
    //                     }
    //                 }
    //             } else if (in_array($node->nodeName, ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'])) {
    //                 echo "<{$node->nodeName}>" . htmlspecialchars($node->nodeValue) . "</{$node->nodeName}>";
    //             } else if ($node->nodeName === 'ul') {
    //                 echo "<ul>";
    //                 foreach ($node->childNodes as $li) {
    //                     if ($li->nodeName === 'li') {
    //                         echo "<li>" . htmlspecialchars($li->nodeValue) . "</li>";
    //                     }
    //                 }
    //                 echo "</ul>";
    //             } else if ($node->nodeName === 'ol') {
    //                 echo "<ol>";
    //                 foreach ($node->childNodes as $li) {
    //                     if ($li->nodeName === 'li') {
    //                         echo "<li>" . htmlspecialchars($li->nodeValue) . "</li>";
    //                     }
    //                 }
    //                 echo "</ol>";
    //             }
    //         }
    //     }

    //     echo "</div>";
    //     echo "</div>";
    // }
    foreach ($contents as $content) {
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
        echo "</div>"; // End of content-container
    }


    ?>



</body>

</html>

<style>
    /* .content-container {
display: flex;
align-items: flex-start;
margin: 20px 0;
border: 1px solid #ccc;
border-radius: 8px;
padding: 15px;
box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.content-container img {
max-width: 200px;
max-height: 200px;
margin-right: 20px;
border-radius: 8px;
object-fit: cover;
}

.content-container .text-content {
flex: 1;
}

.content-container h1,
.content-container h2,
.content-container h3,
.content-container h4,
.content-container h5,
.content-container h6 {
margin: 0 0 10px 0;
color: #2c3e50;
}

.content-container p {
color: #7f8c8d;
line-height: 1.6;
margin: 0 0 10px 0;
}

.content-container ul,
.content-container ol {
margin: 0 0 10px 20px;
color: #34495e;
}

.content-container li {
margin: 0 0 5px 0;
}

.content-container a {
color: #2980b9;
text-decoration: none;
}

.content-container a:hover {
text-decoration: underline;
} */
</style>






























<?php
// include_once "./session.php";
// check_login();
?>

<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "blog";

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }


// $sql = "SELECT content FROM content_table ORDER BY id DESC";
// $result = $conn->query($sql);

// $contents = [];
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $contents[] = $row['content'];
//     }
// } else {
//     $contents[] = "No content found.";
// }

// $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flexbox Layout</title>
    <!-- <style>
        .content-container {
            display: flex;
            align-items: flex-start;
            margin: 20px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border: 2px solid red;
        }

        .content-container img {
            max-width: 200px;
            max-height: 200px;
            margin-right: 20px;
            border-radius: 8px;
            object-fit: cover;
        }

        .content-container .text-content {
            flex: 1;
        }

        .content-container h1,
        .content-container h2,
        .content-container h3,
        .content-container h4,
        .content-container h5,
        .content-container h6 {
            margin: 0 0 10px 0;
            color: #2c3e50;
        }

        .content-container p {
            color: #7f8c8d;
            line-height: 1.6;
            margin: 0 0 10px 0;
        }

        .content-container ul,
        .content-container ol {
            margin: 0 0 10px 20px;
            color: #34495e;
        }

        .content-container li {
            margin: 0 0 5px 0;
        }

        .content-container a {
            color: #2980b9;
            text-decoration: none;
        }

        .content-container a:hover {
            text-decoration: underline;
        }
    </style> -->
</head>

<body>

    <?php
    //  include "navbar.php"
    ?>

    <?php
    // foreach ($contents as $content) {
    //     $doc = new DOMDocument();
    //     libxml_use_internal_errors(true);

    //     $content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');
    //     @$doc->loadHTML($content);
    //     libxml_clear_errors();

    //     $imgElement = $doc->getElementsByTagName('img')->item(0);
    //     $image = $imgElement ? $imgElement->getAttribute('src') : '';

    //     $headerHtml = '';
    //     $headers = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
    //     foreach ($headers as $header) {
    //         $headerElements = $doc->getElementsByTagName($header);
    //         foreach ($headerElements as $headerElement) {
    //             $headerHtml .= "<{$header}>" . htmlspecialchars($headerElement->nodeValue) . "</{$header}>";
    //         }
    //     }

    //     $paragraphsHtml = '';
    //     $paragraphs = $doc->getElementsByTagName('p');
    //     foreach ($paragraphs as $paragraph) {
    //         // Check if the paragraph contains a link; if so, skip it.
    //         $aElementsInP = $paragraph->getElementsByTagName('a');
    //         if ($aElementsInP->length > 0) {
    //             continue;
    //         }
    //         $paragraphsHtml .= "<p>" . htmlspecialchars($paragraph->nodeValue) . "</p>";
    //     }

    //     $listHtmlUl = '';
    //     $ulElements = $doc->getElementsByTagName('ul');
    //     foreach ($ulElements as $ulElement) {
    //         $listHtmlUl .= "<ul>";
    //         $liElements = $ulElement->getElementsByTagName('li');
    //         foreach ($liElements as $liElement) {
    //             $listHtmlUl .= "<li>" . htmlspecialchars($liElement->nodeValue) . "</li>";
    //         }
    //         $listHtmlUl .= "</ul>";
    //     }
    //     $listHtmlOl = '';
    //     $olElements = $doc->getElementsByTagName('ol');
    //     foreach ($olElements as $olElement) {
    //         $listHtmlOl .= "<ol>";
    //         $liElements = $olElement->getElementsByTagName('li');
    //         foreach ($liElements as $liElement) {
    //             $listHtmlOl .= "<li>" . htmlspecialchars($liElement->nodeValue) . "</li>";
    //         }
    //         $listHtmlOl .= "</ol>";
    //     }

    //     $linksHtml = '';
    //     $aElements = $doc->getElementsByTagName('a');
    //     foreach ($aElements as $aElement) {
    //         $href = $aElement->getAttribute('href');
    //         $title = $aElement->getAttribute('title');
    //         $linkText = htmlspecialchars($aElement->nodeValue);
    //         $linksHtml .= "<p><a href='{$href}' title='{$title}'>{$linkText}</a></p>";
    //     }

    //     echo "<div class='content-container'>";
    //     if (!empty($image)) {
    //         echo "<img src='{$image}' alt='Image'>";
    //     }
    //     echo "<div class='text-content'>";
    //     echo $headerHtml;
    //     echo $paragraphsHtml;
    //     echo $listHtmlUl;
    //     echo $listHtmlOl;


    //     echo $linksHtml;
    //     echo "</div>";
    //     echo "</div>";
    // }
    ?>

</body>

</html>