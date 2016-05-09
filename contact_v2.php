<?php
/*
Template Name: Contact Page v2
*/

get_header('interior'); ?>
<div id="primary">
    <section class="dark-stripe contact-stripe">
        <div class="add_map_block">
            <h2>Contact LMC</h2>
            <span>Address</span>
            <h3>19200 SW Teton Ave, </h3>
            <h3>Tualatin, OR 97062</h3>
            <span class="number">Phone</span>
            <h3>503-646-0521</h3>
            <span class="number">Fax</span>
            <h3 class="last_h3">503-646-6823</h3>
            <div id='map-one' class='map'>Loading... </div>
        </div>
        <div class="form_block">
            <h2>GET IN TOUCH</h2>
            <div id="contact-container">
                <?php echo do_shortcode("[contact-form-7 id='82' title='lmc_contact']"); ?>
            </div>
        </div>

    </section>
</div><!-- End #Primary -->
<?php get_footer(); ?>