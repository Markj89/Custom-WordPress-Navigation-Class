<?php
/**
 * Defining constants
 *
 * @since 1.0.0
 *
 **/ 

$custom_theme_data = wp_get_theme();
define( 'CUSTOM_THEME_URL', get_template_directory_uri() );
define( 'CUSTOM_THEME_TEMPLATE', get_template_directory() );
define( 'CUSTOM_THEME_VERSION', trim( $custom_theme_data->Version ) );
define( 'CUSTOM_THEME_NAME', $custom_theme_data->Name );
define( 'CUSTOM_THEME_FILE', get_option( 'template' ) );


require_once( CUSTOM_THEME_TEMPLATE . '/library/custom-functions.php'); // Custom Functions
