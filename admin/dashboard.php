<?php
include_once "session.php";
check_login();
include_once "database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/dashboard.css">
    <title>Dashboard</title>
</head>

<body>

    <?php include_once "navbar.php";

    // Function to count rows in a table based on a condition
    function getCount($conn, $tableName, $condition = "")
    {
        $query = "SELECT COUNT(id) AS total FROM $tableName";

        // Append the condition if provided
        if (!empty($condition)) {
            $query .= " WHERE $condition";
        }

        $stmt = $conn->prepare($query);

        if (!$stmt) {
            die("Query preparation failed: " . $conn->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result) {
            die("Query execution failed: " . $stmt->error);
        }

        $count = $result->fetch_assoc()['total'] ?? 0;
        $stmt->close();
        return $count;
    }

    // Get the counts
    $blogCount = getCount($conn, "webdev_blogs", "blog_status = 'published'"); // Count only published blogs
    $userCount = getCount($conn, "webdev_auth");  // Count users
    $draftCount = getCount($conn, "webdev_blogs", "blog_status = 'draft'"); // Count draft blogs
    ?>

    <!-- Dashboard -->
    <div class="wrapper">
        <div class="child child1">
            <?php include "sidebar.php"; ?>
        </div>

        <div class="child2-wrapper">
            <div class="child2-header">
                <h1>Dashboard</h1>
            </div>
            <div class="child child2">

                <a href="blogs" class="cards card1">
                    <div>
                        <h6>Blogs</h6>
                    </div>
                    <div class="cards-image">
                        <img src="../images/revision.png" alt="blog-image">
                        <span><?php echo $blogCount; ?></span>
                    </div>
                </a>

                <a href="users" class="cards card2">
                    <div>
                        <h6>Users</h6>
                    </div>
                    <div class="cards-image">
                        <img src="../images/revision.png" alt="user-image">
                        <span><?php echo $userCount; ?></span>
                    </div>
                </a>

                <a href="drafts" class="cards card2">
                    <div>
                        <h6>Draft</h6>
                    </div>
                    <div class="cards-image">
                        <img src="../images/revision.png" alt="draft-image">
                        <span><?php echo $draftCount; ?></span>
                    </div>
                </a>

            </div>
        </div>
    </div>
</body>

</html>