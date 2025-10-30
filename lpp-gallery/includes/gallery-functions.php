<?php
/**
 * Gallery Functions for Lollipops Party Packages
 * Handles image retrieval, categorization, and display
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Retrieve gallery images from specific categories
 * 
 * @return array List of gallery images with metadata
 */
function lpp_get_gallery_images() {
    $gallery_base_path = get_stylesheet_directory() . '/qrtny-gallery/';
    $gallery_base_url = get_stylesheet_directory_uri() . '/qrtny-gallery/';
    $categories = ['baptism', 'birthday', 'corporate events', 'debut', 'wedding', 'photobooth'];
    
    $gallery_images = [];

    foreach ($categories as $category) {
        $category_path = $gallery_base_path . $category . '/';
        
        // Check if category directory exists
        if (is_dir($category_path)) {
            $images = glob($category_path . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
            
            foreach ($images as $image_path) {
                $gallery_images[] = [
                    'url' => str_replace(get_stylesheet_directory(), get_stylesheet_directory_uri(), $image_path),
                    'alt' => ucwords($category) . ' Event Image',
                    'category' => $category,
                    'timestamp' => filemtime($image_path)
                ];
            }
        }
    }

    // Sort images by most recent by default
    usort($gallery_images, function($a, $b) {
        return $b['timestamp'] - $a['timestamp'];
    });

    return $gallery_images;
}

/**
 * Enqueue gallery styles and scripts
 */
function lpp_enqueue_gallery_assets() {
    // Only load on gallery page
    if (is_page_template('page-lpp-gallery.php')) {
        // Gallery CSS
        wp_enqueue_style(
            'lpp-gallery-styles', 
            get_stylesheet_directory_uri() . '/lpp-gallery/css/gallery.css', 
            [], 
            '1.0.0'
        );

        // Gallery JavaScript
        wp_enqueue_script(
            'lpp-gallery-script', 
            get_stylesheet_directory_uri() . '/lpp-gallery/js/gallery.js', 
            ['jquery'], 
            '1.0.0', 
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'lpp_enqueue_gallery_assets');

/**
 * Add gallery page template to template selection
 */
function lpp_add_gallery_template($templates) {
    $templates['page-lpp-gallery.php'] = 'LPP Gallery';
    return $templates;
}
add_filter('theme_page_templates', 'lpp_add_gallery_template');
