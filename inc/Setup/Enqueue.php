<?php
/**
 * Handles enqueueing all scripts and styles
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Setup;

use Tutor_Starter\Traits\Inline_Css_Js;

defined( 'ABSPATH' ) || exit;

/**
 * Enqueue class
 */
class Enqueue {

	/**
	 * Register default hooks and actions for WordPress
	 */
	public function register() {
		if ( class_exists( 'QUBELY' ) ) {
			add_action( 'wp_head', array( $this, 'preload_fontawesome' ) );
		}
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
		add_filter( 'style_loader_tag', array( $this, 'load_styles_deferred' ), 10, 4 );
		if ( ! is_admin() && ! is_customize_preview() ) {
			add_filter( 'script_loader_tag', array( $this, 'load_scripts_deferred' ), 10, 1 );
		}
		add_action( 'customize_preview_init', array( $this, 'enqueue_customize_preview' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_assets' ) );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_customizer_controls_scripts' ) );
	}

	/**
	 * Enqueue general scripts
	 */
	public function enqueue_scripts() {
		// CSS.
		$body_font        = get_theme_mod( 'body_font', 'Inter' );
		$heading_font     = get_theme_mod( 'heading_font', 'Sora' );
		$body_font_url    = '';
		$heading_font_url = '';

		if ( ! empty( $body_font ) && in_array( $body_font, Inline_Css_Js::get_google_fonts(), true ) ) {
			$body_font_url = 'family=' . $body_font . ':wght@100;300;400;500;700;900';
			wp_enqueue_style( 'gfonts', 'https://fonts.googleapis.com/css2?' . $body_font_url . '&display=swap', array(), TUTOR_STARTER_VERSION, 'all' );
		}

		if ( ! empty( $heading_font ) && in_array( $heading_font, Inline_Css_Js::get_google_fonts(), true ) && $body_font !== $heading_font ) {
			$heading_font_url = 'family=' . $heading_font . ':wght@100;300;400;500;700;900';
			wp_enqueue_style( 'gfonts-heading', 'https://fonts.googleapis.com/css2?' . $heading_font_url . '&display=swap', array(), TUTOR_STARTER_VERSION, 'all' );
		}

		wp_enqueue_style( 'main', mix( 'css/style.css' ), array(), TUTOR_STARTER_VERSION, 'all' );

		// JS.
		wp_enqueue_script( 'main', mix( 'js/app.js' ), array(), TUTOR_STARTER_VERSION, true );

		// Just in time preloading pages on hover.
		wp_enqueue_script( 'instant-page', '//instant.page/5.1.0', array(), TUTOR_STARTER_VERSION, true );

		// Extra.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Localizable data.
		wp_localize_script( 'main', 'tutorstarter_vars', Inline_Css_Js::localized_js() );

		// Add all inline css that uses customizer settings.
		wp_add_inline_style( 'main', Inline_Css_Js::output_css() );

	}

	/**
	 * Load styles deferred
	 *
	 * @param string $html html.
	 * @param array  $handle handle.
	 * @param string $href href.
	 * @param string $media media.
	 *
	 * @return string $html html
	 */
	public function load_styles_deferred( $html, $handle, $href, $media ) {

		$handles = array( 
			'gfonts',
			'gfonts-heading',
			'qubely-font-awesome',
			'tutor-icon',
			'tutor-plyr',
			'wp-block-library',
			'wp-block-library-theme',
			'wc-block-style',
			'woocommerce-layout',
			'wc-block-vendors-style',
			'woocommerce-general',
		 );

		if ( ! in_array( $handle, $handles, true ) ) {
			return $html;
		}
		$onload      = 'onload="this.media=\'all\'"';
		$print_media = 'media="print"';
		$html        = str_replace( "media='all'", "$print_media $onload", $html );

		return $html;
	}

	/**
	 * Load scripts deferred
	 * 
	 * @param $tag handle of the scripts
	 * 
	 * @return $scripts deferred handles
	 */
	public function load_scripts_deferred( $tag ) {
		$scripts = str_replace( ' src', ' defer="defer" src', $tag );
		return $scripts;
	}

	/**
	 * Preload font-awesome
	 */
	public function preload_fontawesome() {
		$link_to_preload = '<link rel="preload" href="' . get_home_url( null, '/wp-content/plugins/qubely/assets/fonts/fa-solid-900.woff2' ) . '" as="font" crossorigin="anonymous">';

		echo $link_to_preload;
	}

	/**
	 * Enqueue Admin assets
	 */
	public function enqueue_admin_scripts( $hook ) {
		wp_enqueue_style( 'tutorstarter-dashboard', mix( 'css/dashboard.css' ), array( 'wp-components' ), TUTOR_STARTER_VERSION, 'all' );

		if ( 'post.php' === $hook || 'post-new.php' === $hook ) {
			wp_enqueue_script( 'tutorstarter-schema-data', mix( 'js/tutor-schema.js' ), array( 'wp-i18n', 'wp-components', 'wp-element' ), TUTOR_STARTER_VERSION, true );
			wp_localize_script( 'tutorstarter-schema-data', 'tutorstarter_admin_schema', Inline_Css_Js::admin_localized_js() );
		}
		
		if ( ! isset( $_GET['page'] ) || 'tutorstarter' !== $_GET['page'] ) {
			return;
		}

		wp_enqueue_script( 'tutorstarter-dashboard', mix( 'js/tutorstarter-dashboard.js' ), array( 'wp-api', 'wp-i18n', 'wp-components', 'wp-element' ), TUTOR_STARTER_VERSION, true );
		wp_localize_script(
			'tutorstarter-dashboard',
			'tutorstarter_dashboard',
			array(
				'admin_url'     => get_admin_url(),
				'theme_version' => TUTOR_STARTER_VERSION,
			)
		);
	}

	/**
	 * Enqueue customizer controls
	 */
	public function enqueue_customizer_controls_scripts() {
		wp_enqueue_style( 'tutorstarter-controls', mix( 'css/all-controls.css' ), array( 'wp-components' ), TUTOR_STARTER_VERSION, 'all' );

		$saved_fonts = get_transient( 'google_fonts' );
		if ( false === $saved_fonts ) {
			set_transient( 'google_fonts', Inline_Css_Js::get_google_fonts(), DAY_IN_SECONDS );
		}

		if ( ! empty( $saved_fonts ) && is_array( $saved_fonts ) ) {
			wp_enqueue_style( 'tutorstarter-control-gfonts', 'https://fonts.googleapis.com/css?family=' . join( '|', $saved_fonts ) . '&text=Abc&display=swap"', array(), TUTOR_STARTER_VERSION );
		}
		wp_enqueue_script( 'tutorstarter-customizer', mix( 'js/customizer-controls.js' ), array( 'jquery', 'customize-controls', 'wp-i18n', 'wp-components', 'wp-compose', 'wp-edit-post', 'wp-element' ), TUTOR_STARTER_VERSION, true );
		wp_localize_script( 'tutorstarter-customizer', 'tutorstarter_customizer', Inline_Css_Js::customizer_localized_js() );
	}

	/**
	 * Enqueue customizer preview
	 */
	public function enqueue_customize_preview() {
		wp_enqueue_script( 'tutorstarter-preview', mix( 'js/customizer-preview.js' ), array( 'customize-preview' ), TUTOR_STARTER_VERSION, true );
	}

	/**
	 * Enqueue Editor scripts and assets
	 */
	public function enqueue_editor_assets() {
		wp_enqueue_style( 'tutorstarter-admin', mix( 'css/admin.css' ), array(), TUTOR_STARTER_VERSION, 'all' );
		wp_enqueue_script( 'tutorstarter-settings', mix( 'js/tutorstarter-page-settings.js' ), array( 'wp-i18n', 'wp-compose', 'wp-data', 'wp-components', 'wp-edit-post', 'wp-element', 'wp-plugins' ), TUTOR_STARTER_VERSION, true );
		wp_localize_script( 'tutorstarter-settings', 'tutorstarter_admin_page', Inline_Css_Js::admin_localized_js() );
	}
}
