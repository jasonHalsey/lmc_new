<?php
/*
Template Name: Contact Page
*/

get_header('interior'); ?>
<div id="primary">
    <!-- <div id="content" role="main" class="contact-container"> -->
    <section class="dark-stripe contact-stripe">
        <div id='map-one' class='map'>Loading... </div>
        <div class="address-block">
            <h2>Contact LMC</h2>
            <div class="addy-block-container">
                <div class="addy-block">
                    <span>Address</span>
                    <h3>19200 SW Teton Ave, </h3>
                    <h3>Tualatin, OR 97062</h3>
                    <span class="number">Phone</span>
                    <h3>503-646-0521</h3>
                    <span class="number">Fax</span>
                    <h3>503-646-6823</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- </div> -->
    <section class="dark-stripe contact-stripe">
        <h2>GET IN TOUCH</h2>
        <div id="contact-container">
            <?php echo do_shortcode("[contact-form-7 id='82' title='lmc_contact']"); ?>
        </div>
    </section>
</div><!-- End #Primary -->
<?php get_footer(); ?>