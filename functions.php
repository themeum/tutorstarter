<?php
/**
 * Handles loading all the necessary files
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;

// Content width.
if ( ! isset( $content_width ) ) 
	$content_width = apply_filters( 'tutorstarter_content_width', get_theme_mod( 'content_width_value', 1140 ) );

// Theme GLOBALS.
$theme = wp_get_theme();
define( 'TUTOR_STARTER_VERSION', $theme->get( 'Version' ) );

// Load autoloader.
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) :
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
endif;

// Include TGMPA class.
if ( file_exists( dirname( __FILE__ ) . '/inc/Custom/class-tgm-plugin-activation.php' ) ) :
	require_once dirname( __FILE__ ) . '/inc/Custom/class-tgm-plugin-activation.php';
endif;

// Register services.
if ( class_exists( 'Tutor_Starter\\Init' ) ) :
	Tutor_Starter\Init::register_services();
endif;



