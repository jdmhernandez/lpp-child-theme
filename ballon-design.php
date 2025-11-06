<?php
/* Template Name: Ballon Designs */
get_header();
?>

<main>
  <div class="container">
    <nav class="breadcrumb">
      <a href="<?php echo esc_url(home_url('/services')); ?>">Services</a> ›
      <span>Balloon Designs</span>
    </nav>
      <p>Balloons are a fun and easy way to bring your party to life. We create balloon arches, pillars, semi-arches, and even custom balloon shapes based on your theme.</p>
      <p>Our balloons are great for birthdays, showers, and other celebrations and they really stand out in photos. You can book balloon decorations on their own, or add them to one of our party packages to keep everything matching and tied together.</p>
    <div class="featured-image">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/ballondesign/img/balloon-designs.png" alt="Balloon Designs">
    </div>
    <div class="section">
      <h4>Balloon Arches:</h4>
      <ul>
        <li><span>Base Package (1-2 colours)</span><span>$250</span></li>
        <li><span>Standard Package (1-4 colours)</span><span>$300</span></li>
        <li><span>Premium Package (1-4 colours, with choice of accent piece)</span><span>$350</span></li>
      </ul>
      <p class="note">****Any added accent piece on base/standard package is a separate price on its own/extra payment.</p>
    </div>
    <div class="section">
      <h4>Balloon Pillars:</h4>
      <p class="package-title">Base Package</p>
      <ul class="indented">
        <li>2 Pillars (1-2 colours)</li>
        <li>3ft: $50</li>
        <li>4ft: $60</li>
        <li>5ft: $70</li>
      </ul>

      <p class="package-title">Standard Package</p>
      <ul class="indented">
        <li>4 Pillars (1-4 colours)</li>
        <li>3ft: $65</li>
        <li>4ft: $75</li>
        <li>5ft: $85</li>
      </ul>

      <p class="package-title">Premium Package</p>
      <ul class="indented">
        <li>6 Pillars (1-4 colours)</li>
        <li>3 different sizes, 2 of each from 3ft, 4ft, and 5ft</li>
        <li>Accent piece on top of each pillar</li>
        <li><strong>Price: $150</strong></li>
      </ul>
    </div>
    <div class="section">
      <h4>Balloon Semi-Arch:</h4>
      <ul>
        <li><span>Base Package (1-2 colours)</span><span>$200</span></li>
        <li><span>Standard Package (1-4 colours)</span><span>$250</span></li>
        <li><span>Premium Package (1-4 colours, with choice of accent piece)</span><span>$300</span></li>
      </ul>
      <p class="note">**All packages include a semi-pillar. Prices may change if semi-pillar is removed.</p>
    </div>
    <div class="section">
      <h4>Balloon Custom Shape:</h4>
      <p class="note">**Prices will vary.</p>
    </div>
    <small class="tax"><strong>**We do not tax prices, therefore all listed prices are fixed unless stated otherwise.</strong></small>
    <div class="button-container">
      <a href="<?php echo esc_url(home_url('/contact')); ?>" class="book-btn">Book now</a>
    </div>

  </div>
</main>

<?php get_footer(); ?>