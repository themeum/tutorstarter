<?php
/**
 * Handles stuff on Customizer
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Api\Customizer;

use Tutor_Starter\Api\Customizer\Blog\Meta;
use Tutor_Starter\Api\Customizer\Blog\Sidebar;
use Tutor_Starter\Api\Customizer\Header\Header;
use Tutor_Starter\Api\Customizer\Footer\Footer;
use Tutor_Starter\Api\Customizer\General\Colors;
use Tutor_Starter\Api\Customizer\General\Layout;
use Tutor_Starter\Api\Customizer\Blog\Blog_Layout;
use Tutor_Starter\Api\Customizer\General\Typography;

defined( 'ABSPATH' ) || exit;

/**
 * Customizer class
 */
class Customizer {

	/**
	 * Register default hooks and actions for WordPress
	 */
	public function register() {
		add_action( 'customize_register', array( $this, 'initialize' ) );
	}

	/**
	 * Store all the classes inside an array
	 *
	 * @return array Full list of classes
	 */
	public function get_classes() {
		return array(
			Meta::class,
			Header::class,
			Footer::class,
			Colors::class,
			Layout::class,
			Blog_Layout::class,
			Sidebar::class,
			Typography::class,
		);
	}

	/**
	 * Initialize services
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function initialize( $wp_customize ) {
		foreach ( $this->get_classes() as $class ) {
			$service = new $class();
			if ( method_exists( $class, 'register' ) ) {
				$service->register( $wp_customize );
			}
		}

		$this->add_customizer_panel( $wp_customize );
	}

	/**
	 * Add customizer panel for Tutor_Starter
	 *
	 * @param WP_Customize_Manager $wp_customize theme customizer object.
	 */
	public function add_customizer_panel( $wp_customize ) {
		$wp_customize->remove_section( 'colors' );
		$wp_customize->add_panel(
			'tutorstarter_customizer_panel',
			array(
				'title'      => __( 'Tutor Starter Options Panel', 'tutorstarter' ),
				'capability' => 'edit_theme_options',
				'priority'   => 5,
			)
		);
	}
}
