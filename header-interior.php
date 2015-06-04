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

<div class="wrapper-for-content-outside-of-footer">
<body <?php body_class(); ?>>


<!--#########################################################################################################-->

<header class="navigation ">
  <div class="navigation-wrapper ">
    <a href="javascript:void(0)" class="logo">
      <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_1.png" alt="">
    </a>
    <a href="" class="navigation-menu-button" id="js-mobile-menu">MENU</a>
    <div class="nav">
      <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
    </div>
  </div>
</header>

<!--#########################################################################################################-->

<div id="main" class="site-main">
<h1>This is the interior</h1>