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
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class('Site'); ?> >
  <section id="interior-trans-bars">

    <!--#########################################################################################################-->

    <div class="interior-logo-cta">
        <a href="<?php bloginfo('url');?>" class="logo">
          <img src="<?php echo bloginfo('url'); ?>/wp-content/themes/lmc_new/images/LMC_logo.svg" />
        </a>
    </div>

    <!--#########################################################################################################-->

<header class="navigation" role="banner">
  <div class="navigation-wrapper">
    <a href="javascript:void(0)" class="navigation-menu-button" id="js-mobile-menu"><img src="<?php echo bloginfo('url'); ?>/wp-content/themes/lmc_new/images/menu-open-large.png" /></a>
    <nav role="navigation">
      <?php wp_nav_menu( array( 'menu_id' => 'js-navigation-menu', 'theme_location' => 'primary', 'menu_class' => 'navigation-menu show' ) ); ?>
    </nav>    
  </div>
</header>


    <!--#########################################################################################################-->
  </section>
