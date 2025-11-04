<?php
/*
Template Name: Party Packages Page
*/

get_header();
?>

<div class="party-packages-container">   
     
    <div class="party-packages-flex-container">
        <div class="party-packages-flex-inner-container">
            <div class="party-packages-breadcrumbs">
            <a href="page-services.php">Services ></a>
            <h3>Party Packages</h3>
            </div>
            <p>Planning a party can be a lot — so we’ve made it easier with our lollipops party packages. These are all-in-one packages that include decorations, balloons, table and chair covers, and more. We have different package levels depending on how many guests you have and how detailed you want your setup to be. All packages are designed to match your theme. You can also add extras like photobooths if you want something more personalized.</p>
            <a href="#" class="book-now">Book now</a>
        </div>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/party-packages/images/party-packages.jpg" alt="Party Packages">
    </div>

    <div class="party-packages-grid">
        <div class="party-packages-card">
            <h4>Party Package 1</h4>
            <p class="party-packages-price-badge">Cad $1000</p>
            <p>Includes:</p>
                <ul>
                    <li>Backdrop (1 panel for the stage with lights, 2 colours)</li>
                    <li>Balloon Arch (1 for the stage)</li>
                    <li>Table Decor:</li>
                        <p>Table Cover (6 tables)</p>
                        <p>Table Runner (6 tables)</p>
                        <p>Table Centerpieces (6 tables)</p>
                    <li>Chair Decor:</li>
                        <p>Chair Covers (50 guests, 8 per table + 2 extra)</p>
                        <p>Chair Sashes (50 guests, 8 per table + 2 extra)</p>
                </ul>
            <p>**Custom pieces will incur an extra charge.</p>
            <p>**Any added piece/decoration on the package is a separate price on its own/extra payment.</p>
        </div>

        <div class="party-packages-card">
            <h4>Party Package 2</h4>
            <p class="party-packages-price-badge">Cad $1500</p>
            <p>Includes:</p>
                <ul>
                    <li>Backdrop (2 panels for the stage with lights, 2-3 colours)</li>
                    <li>Balloon Arches (1-2 for the stage)</li>
                    <li>Accent Piece (in the theme, 1 for the stage)</li>
                    <li>Table Decor:</li>
                        <p>Table Cover (10 tables)</p>
                        <p>Table Runner (10 tables)</p>
                        <p>Table Centerpieces (10 tables)</p>
                    <li>Chair Decor:</li>
                        <p>Chair Covers (80 guests, 8 per table)</p>
                        <p>Chair Sashes (80 guests, 8 per table)</p>
                </ul>
            <p>**Custom pieces will incur an extra charge.</p>
            <p>**Any added piece/decoration on the package is a separate price on its own/extra payment.</p>
        </div>

        <div class="party-packages-card">
            <h4>Party Package 3</h4>
            <p class="party-packages-price-badge">Cad $2000</p>
            <p>Includes:</p>
                <ul>
                    <li>Backdrop (2-4 panels for the stage with lights)</li>
                    <li>Balloon Arch (2 for the stage)</li>
                    <li>Accent Pieces (in the theme, 2 for the stage)</li>
                    <li>Table Decor:</li>
                        <p>Table Cover (10-15 tables)</p>
                        <p>Table Runner (10-15 tables)</p>
                        <p>Table Centerpieces (Custom, 10-15 tables)</p>
                    <li>Chair Decor:</li>
                        <p>Chair Covers (80-120 guests, 8 per table)</p>
                        <p>Chair Sashes (80-120 guests, 8 per table)</p>
                    <li>Entrance Decoration (In theme)</li>
                    <li>Cake Table Decoration</li>
                </ul>
            <p>**Any added piece/decoration on the package is a separate price on its own/extra payment.</p>
        </div>
    </div>

    <p class="party-packages-pricing-note">**We do not tax prices, therefore all listed prices are fixed unless stated otherwise.</p>

</div>

<?php
get_footer();
?>
