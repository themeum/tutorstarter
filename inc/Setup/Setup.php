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
		add_action( 'after_setup_theme', array( $this, 'content_width' ), 0 );
	}

	/**
	 * Theme supports and setup
	 *
	 * @return void
	 */
	public function setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add editor color palette.
		add_theme_support(
			'editor-color-palette',
			apply_filters(
				'tutorstarter_editor_color_palette',
				array(
					array(
						'name'  => __( 'Strong Blue', 'tutorstarter' ),
						'slug'  => 'strong-blue',
						'color' => '#1539E9',
					),
					array(
						'name'  => __( 'Black', 'tutorstarter' ),
						'slug'  => 'pure-black',
						'color' => '#000000',
					),
					array(
						'name'  => __( 'White', 'tutorstarter' ),
						'slug'  => 'pure-white',
						'color' => '#ffffff',
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
						'name' => __( 'Tiny Fella', 'tutorstarter' ),
						'slug' => 'tiny-fella',
						'size' => 14,
					),
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
						'size' => 24,
					),
					array(
						'name' => __( 'Medium+', 'tutorstarter' ),
						'slug' => 'medium-plus',
						'size' => 36,
					),
					array(
						'name' => __( 'Big', 'tutorstarter' ),
						'slug' => 'big',
						'size' => 48,
					),
					array(
						'name' => __( 'Huge', 'tutorstarter' ),
						'slug' => 'huge',
						'size' => 84,
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

	}

	/**
	 * Define a max content width
	 */
	public function content_width() {
		$GLOBALS['content_width'] = apply_filters( 'tutorstarter_content_width', get_theme_mod( 'content_width', 1140 ) );
	}
}
