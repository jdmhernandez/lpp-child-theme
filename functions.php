<?php
/**
 * Blocksy Child Theme Functions
 * 
 * Custom functionality for the Lollipops Party Packages child theme,
 * including gallery features, custom footer, and theme enhancements.
 */

// Prevent direct access to this file
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Handle RTL stylesheet loading for the child theme
 * Ensures proper CSS loading for right-to-left languages
 */
if (!function_exists('lpp_load_rtl_css')):
    function lpp_load_rtl_css($uri) {
        if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css')) {
            $uri = get_template_directory_uri() . '/rtl.css';
        }
        return $uri;
    }
endif;
add_filter('locale_stylesheet_uri', 'lpp_load_rtl_css');

/**
 * Enqueue child theme styles
 * Loads after parent theme styles to ensure proper CSS inheritance
 */
if (!function_exists('lpp_enqueue_child_styles')):
    function lpp_enqueue_child_styles() {
        wp_enqueue_style(
            'lpp-child-theme',
            trailingslashit(get_stylesheet_directory_uri()) . 'style.css',
            array('ct-main-styles', 'ct-admin-frontend-styles')
        );
    }
endif;
add_action('wp_enqueue_scripts', 'lpp_enqueue_child_styles', 10);

/**
 * Custom Footer Implementation
 * Replaces the default Blocksy footer with our custom design
 */

// Disable Blocksy's default footer functionality
add_filter('blocksy:footer:offcanvas-drawer:enabled', '__return_false');
add_filter('blocksy_output_footer', '__return_false');

/**
 * Initialize our custom footer
 * Priority 5 ensures it runs before other footer hooks
 */
add_action('wp_footer', 'lpp_inject_custom_footer', 5);

function lpp_inject_custom_footer() {
    // Clean up any existing footer actions
    remove_all_actions('blocksy:footer:before');
    remove_all_actions('blocksy:footer');
    remove_all_actions('blocksy:footer:after');
    
    // Ensure footer is hidden via CSS
    echo '<style>#footer[data-id="type-1"] { display: none !important; }</style>';
    
    // Render our custom footer
    lpp_render_custom_footer();
}

/**
 * Render the custom footer HTML
 * Includes logo, navigation links, social icons, and copyright
 */
function lpp_render_custom_footer() {
    ?>
    <footer id="lpp-footer">
        <div class="footer-container">
            <!-- Logo -->
            <div class="footer-logo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lpp-logo-white.png" alt="Lollipops Party Packages logo insert here">
            </div>

            <!-- Footer Columns -->
            <div class="footer-columns">
                <!-- Site Links -->
                <div class="footer-column">
                    <h3>Site Links</h3>
                    <ul>
                        <li><a href="<?php echo home_url('/about'); ?>">About</a></li>
                        <li><a href="<?php echo home_url('/contact'); ?>">Contact</a></li>
                        <li><a href="<?php echo site_url('/gallery-page/'); ?>">Gallery</a></li>
                        <li><a href="<?php echo home_url('/book-a-booth'); ?>">Book a Booth</a></li>
                        
                        <!-- Login/Logout and Gallery Links -->
                        <?php if (is_user_logged_in()) : ?>
                            <li><a href="<?php echo home_url('/staff-gallery/'); ?>">Staff Gallery</a></li>
                            <li><a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a></li>
                        <?php else : ?>
                            <li><a href="<?php echo wp_login_url(home_url()); ?>">Staff Login</a></li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Services -->
                <div class="footer-column">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="<?php echo home_url('/party-rentals'); ?>">Party Rentals</a></li>
                        <li><a href="<?php echo home_url('/balloon-designs'); ?>">Balloon Designs</a></li>
                        <li><a href="<?php echo home_url('/event-decorations'); ?>">Event Decorations</a></li>
                        <li><a href="<?php echo home_url('/party-packages'); ?>">Party Packages</a></li>
                        <li><a href="<?php echo home_url('/photobooth'); ?>">Photobooth</a></li>
                    </ul>
                </div>

                <!-- Follow Us -->
                <div class="footer-column">
                    <h3>Follow Us!</h3>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/lollipopspartypackages/" target="_blank" aria-label="Facebook">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="#CCB693">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/lollipopspackages/" target="_blank" aria-label="Instagram">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="#CCB693">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="[YOUR_HONEYBOOK_URL]" target="_blank" aria-label="HoneyBook">
                            <!-- HONEYBOOK SVG ICON HERE -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="#CCB693">
                                <!-- Placeholder path, replace with actual HoneyBook SVG path -->
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Lollipops Party Packages</p>
            </div>
        </div>
    </footer>
    <?php
}

/**
 * Staff Gallery Implementation
 * Handles the custom gallery feature including image uploads,
 * categorization, and display functionality.
 */

// Load gallery styles for authenticated users
function lpp_enqueue_gallery_styles() {
    if (is_user_logged_in()) {
        wp_enqueue_style(
            'gallery-styles', 
            get_stylesheet_directory_uri() . '/dev-gallery/css/gallery.css', 
            [], 
            '1.0.0'
        );
    }
}
add_action('wp_enqueue_scripts', 'lpp_enqueue_gallery_styles');

/**
 * Initialize gallery functionality
 * Sets up page templates, metadata handling, and image upload processing
 */
function lpp_gallery_setup() {
    // Register gallery page template
    add_filter('theme_page_templates', function($templates) {
        $templates['templates/page-gallery.php'] = 'Staff Gallery';
        return $templates;
    });

    // Add category selection to Media Library items
    add_filter('attachment_fields_to_edit', function($form_fields, $post) {
        $field_value = get_post_meta($post->ID, 'gallery_category', true);
        $categories = ['Baptism', 'Birthday', 'Corporate Events', 'Debut', 'Wedding', 'Photobooth'];
        
        $form_fields['gallery_category'] = array(
            'label' => 'Gallery Category',
            'input' => 'select',
            'value' => $field_value,
            'choices' => array_combine($categories, $categories)
        );
        return $form_fields;
    }, 10, 2);

    // Store category selection in image metadata
    add_filter('attachment_fields_to_save', function($post, $attachment) {
        if (isset($attachment['gallery_category'])) {
            update_post_meta($post['ID'], 'gallery_category', $attachment['gallery_category']);
        }
        return $post;
    }, 10, 2);

    // Process image uploads and add to Media Library
    add_action('template_redirect', function() {
        if (is_page_template('templates/page-gallery.php') && is_user_logged_in()) {
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
                        require_once(ABSPATH . 'wp-admin/includes/image.php');
                        $attach_data = wp_generate_attachment_metadata($attach_id, $upload['file']);
                        wp_update_attachment_metadata($attach_id, $attach_data);
                        
                        // Mark as gallery image
                        update_post_meta($attach_id, '_gallery_upload', '1');
                        
                        // Prevent form resubmission
                        wp_redirect(get_permalink());
                        exit;
                    }
                }
            }
        }
    });

    // Load gallery styles and scripts when needed
    add_action('wp_enqueue_scripts', function() {
        if (is_page_template('templates/page-gallery.php')) {
            wp_enqueue_style('gallery-styles', get_stylesheet_directory_uri() . '/dev-gallery/css/gallery.css', [], '1.0.0');
            wp_enqueue_script('gallery-scripts', get_stylesheet_directory_uri() . '/dev-gallery/js/gallery.js', ['jquery'], '1.0.0', true);
            
            // Pass AJAX URL and nonce to JavaScript
            wp_localize_script('gallery-scripts', 'galleryAjax', array(
                'url' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('delete_gallery_images_nonce')
            ));
        }
    });

    // Handle bulk delete AJAX request
    add_action('wp_ajax_delete_gallery_images', function() {
        // Verify nonce
        if (!check_ajax_referer('delete_gallery_images_nonce', 'nonce', false)) {
            wp_send_json_error('Invalid security token');
            return;
        }

        // Verify user can delete files
        if (!current_user_can('upload_files')) {
            wp_send_json_error('Permission denied');
            return;
        }

        // Get image IDs to delete
        $image_ids = isset($_POST['image_ids']) ? $_POST['image_ids'] : [];
        if (empty($image_ids) || !is_array($image_ids)) {
            wp_send_json_error('No images selected');
            return;
        }

        $deleted = [];
        $failed = [];

        // Process each image
        foreach ($image_ids as $image_id) {
            $image_id = intval($image_id);
            
            // Verify this is a gallery image
            if (!get_post_meta($image_id, '_gallery_upload', true)) {
                $failed[] = $image_id;
                continue;
            }

            // Delete the attachment
            $result = wp_delete_attachment($image_id, true);
            
            if ($result) {
                $deleted[] = $image_id;
            } else {
                $failed[] = $image_id;
            }
        }

        // Return results
        wp_send_json_success([
            'deleted' => $deleted,
            'failed' => $failed,
            'message' => sprintf(
                'Deleted %d images. %s',
                count($deleted),
                count($failed) ? sprintf('Failed to delete %d images.', count($failed)) : ''
            )
        ]);
    });
}
add_action('init', 'lpp_gallery_setup');

/**
 * Enqueue HoneyBook Widget Script
 * Adds the HoneyBook widget script to the footer of the website
 */
function lpp_enqueue_honeybook_script() {
    // Enqueue the HoneyBook widget script with a version to prevent caching
    wp_enqueue_script(
        'honeybook-widget', 
        'https://widget.honeybook.com/assets_users_production/websiteplacements/placement-controller.min.js', 
        [], 
        '1.0.'.time(), // Add timestamp to prevent caching
        true // Load in footer
    );
    
    // Inline script to initialize HoneyBook widget with error logging
    wp_add_inline_script('honeybook-widget', '
        console.log("HoneyBook script loading...");
        try {
            (function(h,b,s,n,i,p,e,t) { 
                h._HB_ = h._HB_ || {};
                h._HB_.pid = "63a0cdb173e0be0008510c04";
                console.log("HoneyBook PID set:", h._HB_.pid);
                
                t = b.createElement(s);
                t.type = "text/javascript";
                t.async = true;
                t.src = n;
                t.onerror = function() {
                    console.error("HoneyBook script failed to load");
                };
                t.onload = function() {
                    console.log("HoneyBook script loaded successfully");
                };
                
                e = b.getElementsByTagName(s)[0];
                e.parentNode.insertBefore(t, e);
            })(window, document, "script", "https://widget.honeybook.com/assets_users_production/websiteplacements/placement-controller.min.js", "63a0cdb173e0be0008510c04");
        } catch (error) {
            console.error("Error loading HoneyBook script:", error);
        }
    ', 'before');
}
add_action('wp_enqueue_scripts', 'lpp_enqueue_honeybook_script');

function lpp_inject_honeybook_script() {
    ?>
    <script type="text/javascript">
    console.log("Attempting to load HoneyBook script");
    (function(h,b,s,n,i,p,e,t) { 
        h._HB_ = h._HB_ || {};
        h._HB_.pid = "63a0cdb173e0be0008510c04";
        t=b.createElement(s);
        t.type="text/javascript";
        t.async=!0;
        t.src=n; 
        t.onerror = function() {
            console.error("HoneyBook script failed to load");
        };
        t.onload = function() {
            console.log("HoneyBook script loaded successfully");
        };
        e=b.getElementsByTagName(s)[0];
        e.parentNode.insertBefore(t,e); 
    })(window,document,"script","https://widget.honeybook.com/assets_users_production/websiteplacements/placement-controller.min.js","63a0cdb173e0be0008510c04");
    </script>
    <?php
}
add_action('wp_footer', 'lpp_inject_honeybook_script', 999);

function lpp_enqueue_services_styles() {
    if (is_page_template('page-services.php')) {
        wp_enqueue_style(
            'services-styles', 
            get_stylesheet_directory_uri() . '/services/services.css', 
            [], 
            '1.0.0'
        );
    }
}
add_action('wp_enqueue_scripts', 'lpp_enqueue_services_styles');

/**
 * LPP Gallery Implementation
 * Handles gallery styles, scripts, and functionality
 */
function lpp_enqueue_lpp_gallery_styles() {
    // Enqueue gallery styles on the LPP Gallery page
    if (is_page_template('page-lpp-gallery.php')) {
        wp_enqueue_style(
            'lpp-gallery-styles', 
            get_stylesheet_directory_uri() . '/lpp-gallery/css/gallery.css', 
            [], 
            '1.0.0'
        );

        // Enqueue gallery JavaScript with jQuery dependency
        wp_enqueue_script(
            'lpp-gallery-script', 
            get_stylesheet_directory_uri() . '/lpp-gallery/js/gallery.js', 
            ['jquery'], 
            '1.0.0', 
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'lpp_enqueue_lpp_gallery_styles');

/**
 * Include gallery functions
 */
function lpp_include_gallery_functions() {
    $gallery_functions_path = get_stylesheet_directory() . '/lpp-gallery/includes/gallery-functions.php';
    if (file_exists($gallery_functions_path)) {
        require_once $gallery_functions_path;
    }
}
add_action('init', 'lpp_include_gallery_functions');