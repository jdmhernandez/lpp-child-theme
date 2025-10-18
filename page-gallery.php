<?php
/*
Template Name: Staff Gallery
*/

get_header();
?>

<div class="staff-gallery-container">
    <div class="ct-container">
        <article class="staff-gallery-content">
            <h1 class="entry-title">Gallery</h1>
            <p class="gallery-description">Explore our collection of stunning event designs decorations and more.</p>

            <?php if (is_user_logged_in()): ?>
            <!-- Image Upload Form -->
            <form method="post" enctype="multipart/form-data" class="upload-form">
                <h2>Upload Image</h2>
                <?php if (isset($upload_error)): ?>
                    <p class="error"><?php echo esc_html($upload_error); ?></p>
                <?php endif; ?>
                <input type="file" name="gallery_image" accept=".jpg,.png,.gif" required>
                <button type="submit">Upload Image</button>
            </form>
            <?php endif; ?>

            <!-- Gallery Grid -->
            <div class="gallery-grid">
                <?php
                $args = array(
                    'post_type' => 'attachment',
                    'post_mime_type' => array('image/jpeg', 'image/png', 'image/gif'),
                    'post_status' => 'inherit',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );

                $gallery_query = new WP_Query($args);

                if ($gallery_query->have_posts()) {
                    while ($gallery_query->have_posts()) {
                        $gallery_query->the_post();
                        $image_id = get_the_ID();
                        $image_url = wp_get_attachment_image_src($image_id, 'large');
                        $full_image_url = wp_get_attachment_image_src($image_id, 'full');
                        
                        if ($image_url && $full_image_url) {
                            echo "<div class='gallery-item'>";
                            echo "<a href='" . esc_url($full_image_url[0]) . "' target='_blank'>";
                            echo "<img src='" . esc_url($image_url[0]) . "' alt='" . esc_attr(get_the_title()) . "'>";
                            echo "</a>";
                            echo "</div>";
                        }
                    }
                    wp_reset_postdata();
                } else {
                    echo "<p>No images found.</p>";
                }
                ?>
            </div>
        </article>
    </div>
</div>

<?php get_footer(); ?>
