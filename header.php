<?php
/*
 * @package WordPress
 * @subpackage lmc

 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?>LMC Construction</title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<div class="wrapper-for-content-outside-of-footer">
<body <?php body_class(); ?>>
  <div class="background-bar"></div>
  <section id="trans-bars">

    <!--#########################################################################################################-->

    <div class="logo-cta">
      <a href="javascript:void(0)" class="logo">
        <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_1.png" alt="">
      </a>

      <div class="tag">
        <a href="#">Bid Room</a>
        <a href="#">Contact Us</a>
      </div>

      <div class="tag">
        We’re Involved at LMC Construction.
      </div>
    </div>

    <!--#########################################################################################################-->

    <header class="navigation ">
      <div class="navigation-wrapper ">
        <a href="" class="navigation-menu-button" id="js-mobile-menu">MENU</a>
        <div class="nav">
          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
        </div>
      </div>
    </header>

    <!--#########################################################################################################-->

    <div class="mission">
      
      <span>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa nisi. Nam cursus urna quis nunc congue malesuada. Nullam nec eros ex. Morbi egestas velit a dapibus molestie. Vivamus ac aliquam nunc, vel luctus mi. Fusce eget faucibus libero. Nulla eu ex eu nisi mollis tempor. Suspendisse consectetur nisl eu vulputate pulvinar. Vestibulum viverra, eros vel gravida semper, est diam ultricies diam, et malesuada arcu odio eget lectus. Nam varius erat dui, dictum accumsan eros sodales quis.
      </span>

    </div>

    <div id="holder">
      <div id="main_slider" class="cycle-slideshow">
        <img src="<?php echo bloginfo('url'); ?>/wp-content/themes/lmc_new/images/tmp_img/riverplace_gallery28.jpg" />
        <img src="<?php echo bloginfo('url'); ?>/wp-content/themes/lmc_new/images/tmp_img/riverplace_gallery29.jpg" />
        <img src="<?php echo bloginfo('url'); ?>/wp-content/themes/lmc_new/images/tmp_img/riverplace_gallery36.jpg" />
      </div> 
    </div>

    <!--#########################################################################################################-->

  </section>



<div id="main" class="site-main">
<h1>This is the home</h1>