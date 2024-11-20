<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cdf9a174a4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/sidebar.css">
    <title>Document</title>
</head>

<body>
    <?php

    $current_page = basename($_SERVER['PHP_SELF']);
    ?>

    <!-- <div class="overlay" id="overlay"></div> -->

    <nav class="navbar">

        <div class="menu-icon" id="menu-icon">
            <span class="menu-open"><i class="fa-solid fa-bars"></i></span>
            <span class="menu-close"><i class="fa-solid fa-x"></i></span>
        </div>
        <ul class="nav-links" id="nav-links">
            <li><a href="dashboard" class="<?php echo ($current_page == 'dashboard.php') ? 'current' : ''; ?>"><i class="fa-solid fa-house"></i>Dashboard</a></li>

            <li><a href="addblog" class="<?php echo ($current_page == 'addblog.php') ? 'current' : ''; ?>"><i class="fa-solid fa-square-plus"></i>Add blog</a></li>
            <li><a href="deleteblog" class="<?php echo ($current_page == 'deleteblog.php') ? 'current' : ''; ?>"><i class="fa-solid fa-trash"></i>Delete</a></li>
            <li><a href="logout" class="logout <?php echo ($current_page == 'logout.php') ? 'current' : ''; ?>"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
        </ul>
    </nav>



    <script>
        const menuIcon = document.getElementById("menu-icon");
        const navLinks = document.getElementById("nav-links");
        const overlay = document.getElementById("overlay");
        menuIcon.addEventListener("click", () => {
            navLinks.classList.toggle("active");
            menuIcon.classList.toggle("open");
            overlay.classList.toggle("active");
        })

        // close overlay 
        overlay.addEventListener("click", () => {
            navLinks.classList.remove("active");
            menuIcon.classList.remove("open");
            overlay.classList.remove("active");
        })
    </script>

</body>

</html>