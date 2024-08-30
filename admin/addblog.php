<?php

include_once "./session.php";
check_login();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TinyMCE Image Upload Example</title>
    <link rel="stylesheet" href="./assets/css/addblog.css">
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
            menu: {
                favs: {
                    title: 'menu',
                    items: 'code visualaid | searchreplace | emoticons'
                }
            },
            menubar: 'favs file edit view insert format tools table',
            content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}',
            images_upload_url: 'upload.php', // Your server-side upload script
            images_upload_handler: image_upload_handler_callback
        });
    </script>
</head>

<body>
    <?php include "./navbar.php" ?>
    <section class="from-section">
        <form method="POST" action="saveContent.php" enctype="multipart/form-data" class="form">
            <h1>Add Blog</h1>
            <textarea id="editor" name="editorContent"></textarea>
            <input type="submit" name="create" value="Create">
        </form>
    </section>





    <!-- new added  -->
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

</body>

</html>


































<!-- <textarea name="editor1" style="border: 2px solid red;"></textarea>
            <script>
                CKEDITOR.replace('editor1');
            </script> -->