<?php
require_once('config.php');

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitize_user($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Attempt WordPress login
    $user = wp_signon([
        'user_login' => $username,
        'user_password' => $password,
        'remember' => true
    ], false);

    if (is_wp_error($user)) {
        $login_error = $user->get_error_message();
    } else {
        wp_redirect(home_url('/gallery.php'));
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery Login</title>
    <link rel="stylesheet" href="<?php echo GALLERY_CSS_URL; ?>">
</head>
<body>
    <div class="login-container">
        <form method="post" action="">
            <h2>Gallery Login</h2>
            <?php if (isset($login_error)): ?>
                <p class="error"><?php echo esc_html($login_error); ?></p>
            <?php endif; ?>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>