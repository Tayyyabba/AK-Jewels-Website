<?php
// student_login.php

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // For demonstration, use hardcoded credentials
    $correct_email = "student@example.com";
    $correct_password = "student123";

    // Check credentials
    if ($email === $correct_email && $password === $correct_password) {
        // Set a session or cookie if 'remember me' is checked
        if (isset($_POST['remember'])) {
            setcookie('email', $email, time() + (86400 * 30), "/"); // 30 days
        } else {
            session_start();
            $_SESSION['email'] = $email;
        }

        // Redirect to a dashboard or welcome page
        header('Location: dashboard.php');
        exit();
    } else {
        // Redirect back with an error message
        header('Location: login_form.php?error=Invalid credentials');
        exit();
    }
} else {
    // Redirect to the login form if the request method is not POST
    header('Location: login_form.php');
    exit();
}
?>
