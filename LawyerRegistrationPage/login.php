<?php
// ... (your login processing logic)

// After successful login
session_start();
$_SESSION['user_email'] = $email; // Use the actual identifier you want to store
header("Location: profile.html");
exit();
?>
