<?php
/*
Template Name: LPP Gallery
*/
get_header();

// Include gallery functions
require_once get_stylesheet_directory() . '/lpp-gallery/includes/gallery-functions.php';
?>

<div class="lpp-gallery-container">
    <h1>Gallery</h1>
    <p>Explore our collection of stunning event designs decorations and more.</p>

    <div class="gallery-filters">
        <div class="filter-category">
            <label>filter by Category</label>
            <div class="category-options">
                <?php 
                $categories = ['Baptism', 'Birthday', 'Corporate Events', 'Debut', 'Wedding', 'Photobooth'];
                foreach ($categories as $category): 
                ?>
                    <div class="category-item">
                        <input type="checkbox" id="<?php echo strtolower($category); ?>" name="category" value="<?php echo strtolower($category); ?>">
                        <label for="<?php echo strtolower($category); ?>"><?php echo $category; ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="sort-options">
            <label>sort by</label>
            <select id="sort-select">
                <option value="newest">Date: Most Recent</option>
                <option value="oldest">Date: Oldest</option>
            </select>
        </div>
    </div>

    <div class="gallery-results">
        <?php 
        // Get gallery images
        $gallery_images = lpp_get_gallery_images();
        
        if (!empty($gallery_images)):
            $total_images = count($gallery_images);
        ?>
            <p class="results-count">Showing 1-<?php echo min(3, $total_images); ?> of <?php echo $total_images; ?> results</p>

            <?php foreach ($gallery_images as $index => $image): ?>
                <div class="gallery-item" 
                     data-category="<?php echo $image['category']; ?>" 
                     data-date="<?php echo $image['timestamp']; ?>"
                     data-index="<?php echo $index; ?>"
                     style="<?php echo $index >= 3 ? 'display: none;' : ''; ?>">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </div>
            <?php endforeach; ?>
        <?php 
        else:
            echo '<p>No images found in the gallery.</p>';
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
