<?php
/**
 * Handles initial setup
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Setup;

defined( 'ABSPATH' ) || exit;

/**
 * Setup class
 */
class Setup {

	/**
	 * Register default hooks and actions for WordPress
	 */
	public function register() {
		add_action( 'after_setup_theme', array( $this, 'setup' ) );
		add_filter( 'excerpt_more', array( $this, 'remove_excerpt_extra_char' ) );
		add_filter( 'excerpt_length', array( $this, 'custom_excerpt_length' ), 999 );
	}

	/**
	 * Theme supports and setup
	 *
	 * @return void
	 */
	public function setup() {

		// Load theme textdomain.
		load_theme_textdomain( 'tutorstarter', get_template_directory() . '/languages' );
		
		add_theme_support( 'title-tag' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add editor color palette.
		add_theme_support(
			'editor-color-palette',
			apply_filters(
				'tutorstarter_editor_color_palette',
				array(
					array(
						'name'  => __( 'Medium Blue', 'tutorstarter' ),
						'slug'  => 'medium-blue',
						'color' => '#175CFF',
					),
					array(
						'name'  => __( 'Deep Navyblue', 'tutorstarter' ),
						'slug'  => 'deep-navyblue',
						'color' => '#0A083B',
					),
					array(
						'name'  => __( 'Off White', 'tutorstarter' ),
						'slug'  => 'off-white',
						'color' => '#F7F9FA',
					),
					array(
						'name'  => __( 'Bluish Dark grey', 'tutorstarter' ),
						'slug'  => 'bluish-dark-grey',
						'color' => '#57586E',
					),
					array(
						'name'  => __( 'Light grey', 'tutorstarter' ),
						'slug'  => 'light-grey',
						'color' => '#EAF1F8',
					),
				)
			)
		);

		// Add editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			apply_filters(
				'tutorstarter_editor_font_sizes',
				array(
					array(
						'name' => __( 'Normal', 'tutorstarter' ),
						'slug' => 'normal',
						'size' => 16,
					),
					array(
						'name' => __( 'Normal+', 'tutorstarter' ),
						'slug' => 'normal-plus',
						'size' => 18,
					),
					array(
						'name' => __( 'Medium', 'tutorstarter' ),
						'slug' => 'medium',
						'size' => 20,
					),
					array(
						'name' => __( 'Medium+', 'tutorstarter' ),
						'slug' => 'medium-plus',
						'size' => 26,
					),
					array(
						'name' => __( 'Big', 'tutorstarter' ),
						'slug' => 'big',
						'size' => 32,
					),
					array(
						'name' => __( 'Huge', 'tutorstarter' ),
						'slug' => 'huge',
						'size' => 48,
					),
				)
			)
		);

		// Add block style support.
		add_theme_support( 'wp-block-styles' );

		// Add custom line-height support.
		add_theme_support( 'custom-line-height' );

		// Add html5 support.
		add_theme_support(
			'html5',
			array(
				'caption',
				'gallery',
				'search-form',
				'comment-form',
				'comment-list',
			)
		);

		// Custom background support.
		add_theme_support(
			'custom-background',
			apply_filters(
				'tutorstarter_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Activate Post formats.
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'gallery',
				'link',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		// Custom image size for cart items
		add_image_size( 'cart-image-thumb', 160, 90, true );

	}

	/**
	 * Custom excerpt length
	 * 
	 * @param int $excerpt_length
	 * 
	 * @return int modified excerpt_length
	 */
	public function custom_excerpt_length( $length ) {
		$custom_length = get_theme_mod( 'custom_excerpt_length', 18 );
		$length = $custom_length;
		
		return $length;
	}

	/**
	 * Remove excerpt extra char
	 * 
	 * @param string $excerpt extra charset
	 * 
	 * @return string modified excerpt extra char
	 */
	public function remove_excerpt_extra_char( $more ) {
		return '';
	}
}
