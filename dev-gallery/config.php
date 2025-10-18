<?php
// Prevent direct access to this file
if (!defined('ABSPATH')) {
    // Attempt to load WordPress environment if not already defined
    $wp_load_path = dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/wp-load.php';
    
    if (file_exists($wp_load_path)) {
        require_once($wp_load_path);
    } else {
        die('Unable to load WordPress environment');
    }
}

// Start session for login/logout functionality
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Define gallery-specific constants
define('GALLERY_DIR', plugin_dir_path(__FILE__));
define('GALLERY_URL', plugin_dir_url(__FILE__));
define('GALLERY_CSS_URL', GALLERY_URL . 'css/gallery.css');

// Ensure only logged-in users can access gallery pages
function gallery_login_check() {
    if (!is_user_logged_in()) {
        wp_redirect(wp_login_url(get_permalink()));
        exit;
    }
}
?>