<?php
// check if the session is already running or not
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Initialize variables
// $is_logged_in = false;
// $user_email = '';

// if (isset($_SESSION['email'])) {
//     $is_logged_in = true;
//     $user_email = htmlspecialchars($_SESSION['email']);
// }

// Function to check if a user is logged in
function check_login()
{
    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
        exit();
    }
}


// ##################### check session store variable #####################
// if (isset($_SESSION['email'])) {
//     echo "Logged in as: " . htmlspecialchars($_SESSION['email']);
// } else {
//     echo "No user is currently logged in.";
// }
