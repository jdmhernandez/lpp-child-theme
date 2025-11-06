<?php
/* Template Name: Event Decorations */
get_header();
?>

<main>
  <div class="container">
    <nav class="breadcrumb">
      <a href="<?php echo esc_url(home_url('/services')); ?>">Services</a> ›
      <span>Event Decorations</span>
    </nav>
    <p>We help decorate your event from start to finish. That includes stage backdrops, entrance decor, cake table setups, lighting, and other details to bring your space to life.</p>
    <p>You can book decoration services by themselves, or include them in one of our full party packages for a complete look.</p>
    <div class="featured-image">
       <img src="<?php echo get_stylesheet_directory_uri(); ?>/eventdecoration/img/event-decor.png" alt="Balloon Designs">
    </div>
    <div class="section">
      <h4>Cake Table Decoration Package:</h4>
      <ul>
        <li><span>Balloon Arch (1-2 colours)</span><span>$180</span></li>
      </ul>
      <ul class="indented">
        <li>Table Cover</li>
        <li>Tulle</li>
        <li>Lighting (Spotlight or Christmas Lights)</li>
      </ul>
      <p class="note">
        **This is a package; any additional items will incur extra costs.<br>
        *Rentals are available as individual items but will have separate pricing.<br>
        *Please consult with the organizer for more details and accommodation.
      </p>
    </div>
    <div class="section">
      <h4>Photobooth Background:</h4>
      <p><span class="">Customized Price:</span> <span>**Price will vary.</span></p>
    </div>
    <div class="section">
      <h4>Marquee Lettering:</h4>
      <ul>
        <li><span>Base Package (1-2 letters/numbers)</span><span>$75</span></li>
        <li><span>Standard Package (2-6 letters/numbers)</span><span>$90</span></li>
        <li><span>Premium Package (6-12 letters/numbers)</span><span>$130</span></li>
      </ul>
      <p class="note">**Prices may vary.</p>
    </div>
    <small class="tax"><strong>**We do not tax prices, therefore all listed prices are fixed unless stated otherwise.</strong></small>
    <div class="button-container">
      <a href="<?php echo esc_url(home_url('/contact')); ?>" class="book-btn">Book now</a>
    </div>

  </div>
</main>

<?php get_footer(); ?>

