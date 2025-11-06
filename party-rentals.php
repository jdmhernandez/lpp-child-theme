<?php
/* Template Name: Party Rentals */
get_header();
?>

<main>
  <div class="container">
    <nav class="breadcrumb">
      <a href="<?php echo esc_url(home_url('/services')); ?>">Services</a> ›
      <span>Party Rentals</span>
    </nav>
    <p>Need some extra items to decorate your party? We've got you covered. Our party rentals include table and chair covers, runners, sashes, and some small but stylish decor pieces like mirrors, candle holders, and vases.</p>
    <p>Whether you're planning something small or big, you can rent just what you need without spending too much. If you're not sure what works best for your setup, we're happy to help you choose. You can rent items one by one or include them in one of our lollipops party packages for a complete setup.</p>
    <div class="featured-image">
       <img src="<?php echo get_stylesheet_directory_uri(); ?>/partyrentals/img/party-rentals.png" alt="Balloon Designs">
    </div>
    <div class="section">
      <h4>Table Linens:</h4>
      <ul>
        <li>Table Cover <span class="price">$10.00 each</span></li>
        <li>Table Runner <span class="price">$1.50 each</span></li>
        <li>Chair Cover <span class="price">$1.00 each</span></li>
        <li>Chair Sash <span class="price">$0.50 each</span></li>
      </ul>
    </div>
    <div class="section">
      <h4>Backdrop Packages:</h4>
      <ul>
        <li>Base Package (2 colours, 1-2 panels) <span class="price">$550</span></li>
        <li>Standard Package (1-4 colours, 1-3 panels) <span class="price">$650</span></li>
        <li>Premium Package (1-4 colours, with accent pieces, 1-4 panels) <span class="price">$750</span></li>
      </ul>
     <p class="note">**Prices may vary.</p>
    </div>

    <div class="section">
      <h4>Center Pieces:</h4>
      <ul>
        <li>Glass Mirror <span class="price">$1.00 each</span></li>
        <li>Black Lantern Candle Holder <span class="price">$1.50 each</span></li>
        <li>Vase <span class="price">$1.50 each</span></li>
        <li>Mini Candle Holder <span class="price">$1.00/3pcs</span></li>
        <li>Custom Decor <span class="price">**Prices may vary</span></li>
      </ul>
      <small>Please consult with the organizer for more details.</small>
    </div>
    <small class="tax"><strong>**We do not tax prices, therefore all listed prices are fixed unless stated otherwise.</strong></small>
    <div class="button-container">
      <a href="<?php echo esc_url(home_url('/contact')); ?>" class="book-btn">Book now</a>
    </div>

  </div>
</main>

<?php get_footer(); ?>

