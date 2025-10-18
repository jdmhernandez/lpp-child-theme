<?php
require_once('config.php');

// Logout the current user
wp_logout();

// Redirect to home page or login page
wp_redirect(home_url('/login.php'));
exit;
?>