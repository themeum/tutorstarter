<?php
/**
 * Handles loading all the necessary files
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;

// Theme GLOBALS.
define( 'TUTOR_STARTER_VERSION', '1.0.0' );

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) :
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
endif;

if ( file_exists( dirname( __FILE__ ) . '/inc/Custom/TGM_Plugin_Activation.php' ) ) :
	require_once dirname( __FILE__ ) . '/inc/Custom/TGM_Plugin_Activation.php';
endif;

if ( class_exists( 'Tutor_Starter\\Init' ) ) :
	Tutor_Starter\Init::register_services();
endif;
