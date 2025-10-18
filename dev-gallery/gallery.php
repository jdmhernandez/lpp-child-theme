<?php
// Load WordPress environment and check authentication
require_once('config.php');

// Ensure only logged-in users can access this page
gallery_login_check();

// Handle image upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['gallery_image'])) {
    // Check file type and size
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $max_file_size = 5 * 1024 * 1024; // 5MB

    $file = $_FILES['gallery_image'];
    
    if (in_array($file['type'], $allowed_types) && $file['size'] <= $max_file_size) {
        // Upload file to WordPress Media Library
        $upload = wp_handle_upload($file, ['test_form' => false]);
        
        if (!isset($upload['error'])) {
            // Create attachment for the uploaded image
            $attachment = [
                'guid' => $upload['url'],
                'post_mime_type' => $upload['type'],
                'post_title' => sanitize_file_name($file['name']),
                'post_content' => '',
                'post_status' => 'inherit'
            ];
            
            $attach_id = wp_insert_attachment($attachment, $upload['file']);
            wp_generate_attachment_metadata($attach_id, $upload['file']);
            update_post_meta($attach_id, '_gallery_upload', true);
        } else {
            $upload_error = $upload['error'];
        }
    } else {
        $upload_error = 'Invalid file type or size. Please upload JPG, PNG, or GIF files under 5MB.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Gallery</title>
    <link rel="stylesheet" href="<?php echo GALLERY_CSS_URL; ?>">
</head>
<body>
    <div class="gallery-container">
        <h1>Staff Gallery</h1>
        
        <!-- Image Upload Form -->
        <form method="post" enctype="multipart/form-data" class="upload-form">
            <h2>Upload Image</h2>
            <?php if (isset($upload_error)): ?>
                <p class="error"><?php echo esc_html($upload_error); ?></p>
            <?php endif; ?>
            <input type="file" name="gallery_image" accept=".jpg,.png,.gif" required>
            <button type="submit">Upload Image</button>
        </form>

        <!-- Gallery Grid -->
        <div class="gallery-grid">
            <?php
            // Query for gallery images
            $gallery_images = get_posts([
                'post_type' => 'attachment',
                'post_mime_type' => ['image/jpeg', 'image/png', 'image/gif'],
                'posts_per_page' => 20,
                'meta_key' => '_gallery_upload',
                'meta_value' => true
            ]);

            if ($gallery_images) {
                foreach ($gallery_images as $image) {
                    $image_url = wp_get_attachment_image_src($image->ID, 'medium')[0];
                    $full_image_url = wp_get_attachment_image_src($image->ID, 'full')[0];
                    echo "<div class='gallery-item'>";
                    echo "<a href='{$full_image_url}' target='_blank'>";
                    echo "<img src='{$image_url}' alt='" . esc_attr($image->post_title) . "'>";
                    echo "</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No images uploaded yet.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>