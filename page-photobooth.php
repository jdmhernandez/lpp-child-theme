<?php
/*
Template Name: Photobooth Page
*/
get_header();
?>

<div class="photobooth-container">

    <div class="photobooth-flex-container">
        <div class="photobooth-flex-inner-container">
            <div class="photobooth-breadcrumbs">
            <a href="page-services.php">Services ></a>
            <h3>Photobooth</h3>
            </div>
            <p>Make your celebration unforgettable with our fun and interactive photo booth party packages! Whether you're hosting a birthday, wedding, graduation, or corporate event, our Lollipop Party Packages offer everything you need to capture memories and entertain your guests. Choose from our Base or Deluxe packages based on your event size and style.</p>
            <a href="#" class="book-now">Book now</a>
        </div>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/photobooth/images/photobooth.jpg" alt="Photobooth">
    </div>
 
    <div class="photobooth-grid">

        <div class="photobooth-card">
            <h4>Base</h4>
            <p class="photobooth-price-badge">Cad $375</p>
            <p>Our base package provides you with all the basic essentials you need for your photobooth experience.</p>
            <p>What you get:</p>
                <ul>
                    <li>Up to 4 Hour Rental</li>
                    <li>Standard Backdrop (or provide your own)</li>
                    <li>Unlimited Digital Photos, GIFS & Boomerangs</li>
                    <li>Instant sharing (text/email)</li>
                    <li>Customized Tap to Start Screen to match the theme/event</li>
                    <li>Pick up & drop off at the event location</li>
                    <li>Set up & Tear down</li>
                    <li>Professional on site attendant</li>
                    <li>All digital captures taken will be sent to you within 24 hours of the event via Dropbox.</li>
                </ul>
        </div>

        <div class="photobooth-card">
            <h4>Deluxe</h4>
            <p class="photobooth-price-badge">Cad $500</p>
            <p>Our Deluxe package has everything you need plus more that will leave your guests in awe. It the package for weddings and events with larger crowds (weddings, debut, sweet 16, quinceañera, graduations, and more.</p>
            <p>What you get:</p>
                <ul>
                    <li>Full day Rental</li>
                    <li>Everything included in the Base Package PLUS</li>
                    <li>Additional LED studio lighting</li>
                    <li>Customized backdrop of choice (Grass wall, balloon wall, sequence wall etc.)</li>
                </ul>
            <p>We recommend larger events of 60 people or more to have a minimum of 4 hours of service, 100 or more 4-5 hours of service as well, 200 or more 5 hours of service. Add additional hours below.</p>
        </div>

        <div class="photobooth-add-ons">
            <p class="photobooth-add-ons-heading">Add ons</p>
    
            <div class="photobooth-card">
                <h4>Studio Led Lights</h4>
                <p>Extra Studio Lights for clearer images, boomerangs, and GIFS</p>
                <p>$150</p>
            </div>
    
            <div class="photobooth-card">
                <h4>Extra Hour(s)</h4>
                <p>If you choose the Base Package but need more time?</p>
                <p>Add an extra hour or more for our Photobooth Rental</p>
                <p>$60 per hour</p>
            </div>
    
            <div class="photobooth-card">
                <h4>Outdoor Setup</h4>
                <p>Will your event take place outdoors? Let us know so we can plan accordingly</p>
            </div>
        </div>
    </div>

     <p class="photobooth-pricing-note">**We do not tax prices, therefore all listed prices are fixed unless stated otherwise.</p>

</div>

<?php
get_footer();
?>
