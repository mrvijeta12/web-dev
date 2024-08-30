<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assests/css/navbar.css">
    <title>Document</title>
</head>

<body>
    <?php

    $current_page = basename($_SERVER['PHP_SELF']);
    ?>

    <nav class="navbar">
        <div class="nav_logo"><a href="index.php">TekAlgo</a></div>
        <div class="menu-toggle" id="mobile-menu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <ul class="nav-links">
            <li><a href="index.php" class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Home</a></li>
            <li><a href="about.php" class="nav-link <?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">About</a></li>
            <li><a href="services.php" class="nav-link <?php echo ($current_page == 'services.php') ? 'active' : ''; ?>">Services</a></li>
            <li><a href="contact.php" class="nav-link <?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">Contact</a></li>
            <li><a href="blog.php" class="nav-link <?php echo ($current_page == 'blog.php') ? 'active' : ''; ?>">Blog</a></li>
            <li><a href="success.php" class="nav-link <?php echo ($current_page == 'success.php') ? 'active' : ''; ?>">Success</a></li>
        </ul>
    </nav>

    <script src="./scripts.js"></script>
</body>

</html>