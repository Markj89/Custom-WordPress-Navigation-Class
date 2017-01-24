<?php
/**
 * The header for our theme.
 * @package CUSTOM
 * Displays all of the <head> section and everything up till <main>
 * and the left sidebar conditional
 *
 * @since 1.0.0
**/

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title(); ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta http-equiv="X-UA-Compatible" content="IE-edge,chrome=1">
	<meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
<?php custom_post_class(); ?>