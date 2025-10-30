<?php
/*
Template Name: Services Page
*/
get_header();
?>

<div class="services-container">
    <div class="services-grid">
        <div class="service-card">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/services/images/party-rentals.jpg" alt="Party Rentals">
            <h3>Party Rentals</h3>
            <p>Provide Rental Equipment Like Tables, Chairs, Linens, And More, To Ensure Your Event...</p>
            <a href="#" class="view-more">View more</a>
        </div>

        <div class="service-card">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/services/images/balloon-designs.jpg" alt="Balloon Designs">
            <h3>Balloon Designs</h3>
            <p>Custom Balloon Arrangements And Installations For Events, Including...</p>
            <a href="#" class="view-more">View more</a>
        </div>

        <div class="service-card">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/services/images/event-decorations.jpg" alt="Event Decorations">
            <h3>Event Decorations</h3>
            <p>Design And Set Up Themed Or General Decorations For All Types Of...</p>
            <a href="#" class="view-more">View more</a>
        </div>

        <div class="service-card">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/services/images/party-packages.jpg" alt="Party Packages">
            <h3>Party Packages</h3>
            <p>Bundled Services That Include Multiple Elements Like Decor...</p>
            <a href="#" class="view-more">View more</a>
        </div>

        <div class="service-card">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/services/images/photobooth.jpg" alt="Photobooth">
            <h3>Photobooth</h3>
            <p>A Fun And Interactive Service Where Guests Can Take Photos...</p>
            <a href="#" class="view-more">View more</a>
        </div>
    </div>
</div>

<?php get_footer(); ?>
