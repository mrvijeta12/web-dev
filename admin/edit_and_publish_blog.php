<?php
include_once "session.php";
check_login();
include_once "database.php";

// Fetch the slug from the URL and fetch the content by slug
$slug = isset($_GET['slug']) ? $_GET['slug'] : '';
$meta_title = $summary = $social_sharing_image = $content = "";

// Fetch blog data if slug is provided
if ($slug) {
    // Prepare the SQL statement to get blog details by slug
    $stmt = $conn->prepare("SELECT meta_title, summary, social_sharing_image, content FROM webdev_blogs WHERE slug = ?");

    if ($stmt === false) {
        die('MySQL prepare error: ' . htmlspecialchars($conn->error));
    }

    // Bind parameters
    $stmt->bind_param("s", $slug);

    // Execute the statement
    if (!$stmt->execute()) {
        die('MySQL execute error: ' . htmlspecialchars($stmt->error));
    }

    // Bind the result variables
    $stmt->bind_result($meta_title, $summary, $social_sharing_image, $content);

    // Fetch the data
    if (!$stmt->fetch()) {
        echo "No content found for this slug.";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Slug not provided.";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit and Publish Blog</title>
    <link rel="stylesheet" href="./assets/css/addblog.css">
    <link rel="stylesheet" href="./assets/css/editblog.css">

    <script src="./tinymce/tinymce.min.js"></script>
    <script>
        const image_upload_handler_callback = (blobInfo, progress) => new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'upload.php');

            xhr.upload.onprogress = (e) => {
                progress(e.loaded / e.total * 100);
            };

            xhr.onload = () => {
                if (xhr.status === 403) {
                    reject({
                        message: 'HTTP Error: ' + xhr.status,
                        remove: true
                    });
                    return;
                }

                if (xhr.status < 200 || xhr.status >= 300) {
                    reject('HTTP Error: ' + xhr.status);
                    return;
                }

                const json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    reject('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                resolve(json.location);
            };

            xhr.onerror = () => {
                reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
            };

            const formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        });

        tinymce.init({
            selector: '#editor',
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
                'table', 'emoticons', 'template', 'codesample'
            ],
            toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' +
                'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                'forecolor backcolor emoticons',
            menubar: 'favs file edit view insert format tools table',
            content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}',
            images_upload_url: 'upload.php',
            images_upload_handler: image_upload_handler_callback
        });
    </script>
</head>

<body>
    <?php include "./navbar.php"; ?>
    <div class="wrapper">
        <div class="child child1">
            <?php include "sidebar.php"; ?>
        </div>

        <div class="child child2">
            <section class="form-section">
                <form method="POST" action="update_or_publish_blog.php" enctype="multipart/form-data" class="form">
                    <h1>Edit and Publish Blog</h1>

                    <!-- Meta Title Field (Required) -->
                    <div class="form-group">
                        <label for="meta_title">Meta Title *</label>
                        <input type="text" id="meta_title" name="meta_title" value="<?php echo htmlspecialchars($meta_title, ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <!-- Summary Field (Required) -->
                    <div class="form-group">
                        <label for="summary">Summary *</label>
                        <textarea id="summary" name="summary" rows="5" required><?php echo htmlspecialchars($summary, ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </div>

                    <!-- Feature Image Field (Optional) -->
                    <div class="form-group">
                        <label for="featureImage">Feature Image (Current: <?php echo htmlspecialchars($social_sharing_image, ENT_QUOTES, 'UTF-8'); ?>)</label>
                        <input type="file" id="featureImage" name="social_sharing_image" accept="image/*">
                    </div>

                    <!-- Blog Category Selection -->
                    <div class="form-group">
                        <label for="category">Choose Category:</label>
                        <select id="category" name="category" class="page-type">
                            <optgroup label="Main Page">
                                <option value="home">Home</option>
                                <option value="services">Services</option>
                                <option value="blog">Blog</option>
                                <option value="contact-us">Contact Us</option>
                            </optgroup>
                            <!-- Additional categories omitted for brevity -->
                        </select>
                    </div>

                    <!-- Blog Content (TinyMCE Editor) -->
                    <div class="form-group">
                        <label for="editor">Blog Content *</label>
                        <textarea id="editor" name="editorContent"><?php echo htmlspecialchars($content, ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </div>

                    <!-- Hidden input to carry slug -->
                    <input type="hidden" name="slug" value="<?php echo htmlspecialchars($slug, ENT_QUOTES, 'UTF-8'); ?>">

                    <!-- Buttons -->
                    <input type="submit" name="action" value="Update Draft" class="update-button">
                    <input type="submit" name="action" value="Publish" class="publish-button">
                </form>
            </section>
        </div>
    </div>
</body>

</html>