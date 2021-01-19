<?php
/**
 * Trait for inline css and js
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Traits;

use Tutor_Starter\Traits\Fonts;

defined( 'ABSPATH' ) || exit;

/**
 * Inline CSS and JS
 */
trait Inline_Css_Js {

	/**
	 * Get theme mods value for custom css that
	 * are configured through customizer
	 */
	public static function output_css() {
		// Theme mods.
		$body_font                 = get_theme_mod( 'body_font', 'Inter' );
		$heading_font              = get_theme_mod( 'heading_font', 'Libre Baskerville' );
		$h1_font_size              = get_theme_mod( 'h1_font_size', '{ "mobile": 36, "tablet": 36, "desktop": 48 }' );
		$h2_font_size              = get_theme_mod( 'h2_font_size', '{ "mobile": 26, "tablet": 26, "desktop": 32 }' );
		$h3_font_size              = get_theme_mod( 'h3_font_size', '{ "mobile": 24, "tablet": 24, "desktop": 26 }' );
		$h4_font_size              = get_theme_mod( 'h4_font_size', '{ "mobile": 18, "tablet": 18, "desktop": 18 }' );
		$h5_font_size              = get_theme_mod( 'h5_font_size', '{ "mobile": 16, "tablet": 16, "desktop": 16 }' );
		$h6_font_size              = get_theme_mod( 'h6_font_size', '{ "mobile": 15, "tablet": 15, "desktop": 15 }' );
		$cta_font_size             = get_theme_mod( 'cta_font_size', '{ "mobile": 13, "tablet": 13, "desktop": 16 }' );
		$body_font_size            = get_theme_mod( 'body_font_size', '{ "mobile": 18, "tablet": 18, "desktop": 18 }' );
		$header_font_size          = get_theme_mod( 'menu_link_font_size', '{ "mobile": 13, "tablet": 13, "desktop": 16 }' );
		$cta_text_color            = get_theme_mod( 'cta_color', '#ffffff' );
		$body_font_lineheight      = get_theme_mod( 'body_font_lineheight', '{ "mobile": 22, "tablet": 22, "desktop": 22 }' );
		$h1_font_lineheight        = get_theme_mod( 'h1_font_lineheight', '{ "mobile": 36, "tablet": 36, "desktop": 65 }' );
		$h2_font_lineheight        = get_theme_mod( 'h2_font_lineheight', '{ "mobile": 30, "tablet": 30, "desktop": 48 }' );
		$h3_font_lineheight        = get_theme_mod( 'h3_font_lineheight', '{ "mobile": 24, "tablet": 24, "desktop": 48 }' );
		$h4_font_lineheight        = get_theme_mod( 'h4_font_lineheight', '{ "mobile": 22, "tablet": 22, "desktop": 23 }' );
		$h5_font_lineheight        = get_theme_mod( 'h5_font_lineheight', '{ "mobile": 22, "tablet": 22, "desktop": 23 }' );
		$h6_font_lineheight        = get_theme_mod( 'h6_font_lineheight', '{ "mobile": 22, "tablet": 22, "desktop": 23 }' );
		$h1_font_weight            = get_theme_mod( 'h1_font_weight', 700 );
		$h2_font_weight            = get_theme_mod( 'h2_font_weight', 700 );
		$h3_font_weight            = get_theme_mod( 'h3_font_weight', 700 );
		$h4_font_weight            = get_theme_mod( 'h4_font_weight', 700 );
		$h5_font_weight            = get_theme_mod( 'h5_font_weight', 700 );
		$h6_font_weight            = get_theme_mod( 'h6_font_weight', 700 );
		$h1_font_transform         = get_theme_mod( 'h1_font_transform', 'none' );
		$h2_font_transform         = get_theme_mod( 'h2_font_transform', 'none' );
		$h3_font_transform         = get_theme_mod( 'h3_font_transform', 'none' );
		$h4_font_transform         = get_theme_mod( 'h4_font_transform', 'none' );
		$h5_font_transform         = get_theme_mod( 'h5_font_transform', 'none' );
		$h6_font_transform         = get_theme_mod( 'h6_font_transform', 'none' );
		$body_font_weight          = get_theme_mod( 'body_font_weight', 400 );
		$link_color                = get_theme_mod( 'link_color', '#175cff' );
		$widget_title_font_size    = get_theme_mod( 'footer_widget_font_size', '{ "mobile": 16, "tablet": 16, "desktop": 18 }' );
		$menu_bg_color             = get_theme_mod( 'menu_bg_color', '#ffffff' );
		$body_bg_color             = get_theme_mod( 'body_bg_color', '#ffffff' );
		$cta_background            = get_theme_mod( 'cta_background', '#1539e9' );
		$cta_font_weight           = get_theme_mod( 'cta_text_font_weight', 700 );
		$body_text_color           = get_theme_mod( 'body_text_color', '#57586E' );
		$menu_link_color           = get_theme_mod( 'menu_link_color', '#57586E' );
		$header_font_weight        = get_theme_mod( 'menu_link_font_weight', 700 );
		$body_font_transform       = get_theme_mod( 'body_font_transform', 'none' );
		$widget_title_font_weight  = get_theme_mod( 'footer_widget_font_weight', 700 );
		$footer_bottom_bg_color    = get_theme_mod( 'footer_bottom_bg_color', '#000000' );
		$menu_link_active_color    = get_theme_mod( 'menu_link_active_color', '#0A083B' );
		$footer_widgets_bg_color   = get_theme_mod( 'footer_widgets_bg_color', '#000000' );
		$footer_bottom_text_color  = get_theme_mod( 'footer_bottom_text_color', '#ffffff' );
		$footer_widgets_text_color = get_theme_mod( 'footer_widgets_text_color', '#ffffff' );

		// Responsive range slider control objects.
		$h1_font_size_decoded           = $h1_font_size ? json_decode( $h1_font_size ) : null;
		$h2_font_size_decoded           = $h2_font_size ? json_decode( $h2_font_size ) : null;
		$h3_font_size_decoded           = $h3_font_size ? json_decode( $h3_font_size ) : null;
		$h4_font_size_decoded           = $h4_font_size ? json_decode( $h4_font_size ) : null;
		$h5_font_size_decoded           = $h5_font_size ? json_decode( $h5_font_size ) : null;
		$h6_font_size_decoded           = $h6_font_size ? json_decode( $h6_font_size ) : null;
		$cta_font_size_decoded          = $cta_font_size ? json_decode( $cta_font_size ) : null;
		$body_font_size_decoded         = $body_font_size ? json_decode( $body_font_size ) : null;
		$header_font_size_decoded       = $header_font_size ? json_decode( $header_font_size ) : null;
		$body_font_lineheight_decoded   = $body_font_lineheight ? json_decode( $body_font_lineheight ) : null;
		$h1_font_lineheight_decoded     = $h1_font_lineheight ? json_decode( $h1_font_lineheight ) : null;
		$h2_font_lineheight_decoded     = $h2_font_lineheight ? json_decode( $h2_font_lineheight ) : null;
		$h3_font_lineheight_decoded     = $h3_font_lineheight ? json_decode( $h3_font_lineheight ) : null;
		$h4_font_lineheight_decoded     = $h4_font_lineheight ? json_decode( $h4_font_lineheight ) : null;
		$h5_font_lineheight_decoded     = $h5_font_lineheight ? json_decode( $h5_font_lineheight ) : null;
		$h6_font_lineheight_decoded     = $h6_font_lineheight ? json_decode( $h6_font_lineheight ) : null;
		$widget_title_font_size_decoded = $widget_title_font_size ? json_decode( $widget_title_font_size ) : null;

		// Check if the theme mod is object and assign sensible device defaults.
		$h1_font_size_mobile            = is_object( $h1_font_size_decoded ) ? $h1_font_size_decoded->mobile : $h1_font_size;
		$h1_font_size_tablet            = is_object( $h1_font_size_decoded ) ? $h1_font_size_decoded->tablet : $h1_font_size;
		$h1_font_size_desktop           = is_object( $h1_font_size_decoded ) ? $h1_font_size_decoded->desktop : $h1_font_size;
		$h2_font_size_mobile            = is_object( $h2_font_size_decoded ) ? $h2_font_size_decoded->mobile : $h2_font_size;
		$h2_font_size_tablet            = is_object( $h2_font_size_decoded ) ? $h2_font_size_decoded->tablet : $h2_font_size;
		$h2_font_size_desktop           = is_object( $h2_font_size_decoded ) ? $h2_font_size_decoded->desktop : $h2_font_size;
		$h3_font_size_mobile            = is_object( $h3_font_size_decoded ) ? $h3_font_size_decoded->mobile : $h3_font_size;
		$h3_font_size_tablet            = is_object( $h3_font_size_decoded ) ? $h3_font_size_decoded->tablet : $h3_font_size;
		$h3_font_size_desktop           = is_object( $h3_font_size_decoded ) ? $h3_font_size_decoded->desktop : $h3_font_size;
		$h4_font_size_mobile            = is_object( $h4_font_size_decoded ) ? $h4_font_size_decoded->mobile : $h4_font_size;
		$h4_font_size_tablet            = is_object( $h4_font_size_decoded ) ? $h4_font_size_decoded->tablet : $h4_font_size;
		$h4_font_size_desktop           = is_object( $h4_font_size_decoded ) ? $h4_font_size_decoded->desktop : $h4_font_size;
		$h5_font_size_mobile            = is_object( $h5_font_size_decoded ) ? $h5_font_size_decoded->mobile : $h5_font_size;
		$h5_font_size_tablet            = is_object( $h5_font_size_decoded ) ? $h5_font_size_decoded->tablet : $h5_font_size;
		$h5_font_size_desktop           = is_object( $h5_font_size_decoded ) ? $h5_font_size_decoded->desktop : $h5_font_size;
		$h6_font_size_mobile            = is_object( $h6_font_size_decoded ) ? $h6_font_size_decoded->mobile : $h6_font_size;
		$h6_font_size_tablet            = is_object( $h6_font_size_decoded ) ? $h6_font_size_decoded->tablet : $h6_font_size;
		$h6_font_size_desktop           = is_object( $h6_font_size_decoded ) ? $h6_font_size_decoded->desktop : $h6_font_size;
		$cta_font_size_tablet           = is_object( $cta_font_size_decoded ) ? $cta_font_size_decoded->tablet : $cta_font_size;
		$cta_font_size_mobile           = is_object( $cta_font_size_decoded ) ? $cta_font_size_decoded->mobile : $cta_font_size;
		$cta_font_size_desktop          = is_object( $cta_font_size_decoded ) ? $cta_font_size_decoded->desktop : $cta_font_size;
		$body_font_size_mobile          = is_object( $body_font_size_decoded ) ? $body_font_size_decoded->mobile : $body_font_size;
		$body_font_size_tablet          = is_object( $body_font_size_decoded ) ? $body_font_size_decoded->tablet : $body_font_size;
		$body_font_size_desktop         = is_object( $body_font_size_decoded ) ? $body_font_size_decoded->desktop : $body_font_size;
		$header_font_size_tablet        = is_object( $header_font_size_decoded ) ? $header_font_size_decoded->tablet : $header_font_size;
		$header_font_size_mobile        = is_object( $header_font_size_decoded ) ? $header_font_size_decoded->mobile : $header_font_size;
		$header_font_size_desktop       = is_object( $header_font_size_decoded ) ? $header_font_size_decoded->desktop : $header_font_size;
		$h1_font_lineheight_mobile      = is_object( $h1_font_lineheight_decoded ) ? $h1_font_lineheight_decoded->mobile : $h1_font_lineheight;
		$h1_font_lineheight_tablet      = is_object( $h1_font_lineheight_decoded ) ? $h1_font_lineheight_decoded->tablet : $h1_font_lineheight;
		$h1_font_lineheight_desktop     = is_object( $h1_font_lineheight_decoded ) ? $h1_font_lineheight_decoded->desktop : $h1_font_lineheight;
		$h2_font_lineheight_mobile      = is_object( $h2_font_lineheight_decoded ) ? $h2_font_lineheight_decoded->mobile : $h2_font_lineheight;
		$h2_font_lineheight_tablet      = is_object( $h2_font_lineheight_decoded ) ? $h2_font_lineheight_decoded->tablet : $h2_font_lineheight;
		$h2_font_lineheight_desktop     = is_object( $h2_font_lineheight_decoded ) ? $h2_font_lineheight_decoded->desktop : $h2_font_lineheight;
		$h3_font_lineheight_mobile      = is_object( $h3_font_lineheight_decoded ) ? $h3_font_lineheight_decoded->mobile : $h3_font_lineheight;
		$h3_font_lineheight_tablet      = is_object( $h3_font_lineheight_decoded ) ? $h3_font_lineheight_decoded->tablet : $h3_font_lineheight;
		$h3_font_lineheight_desktop     = is_object( $h3_font_lineheight_decoded ) ? $h3_font_lineheight_decoded->desktop : $h3_font_lineheight;
		$h4_font_lineheight_mobile      = is_object( $h4_font_lineheight_decoded ) ? $h4_font_lineheight_decoded->mobile : $h4_font_lineheight;
		$h4_font_lineheight_tablet      = is_object( $h4_font_lineheight_decoded ) ? $h4_font_lineheight_decoded->tablet : $h4_font_lineheight;
		$h4_font_lineheight_desktop     = is_object( $h4_font_lineheight_decoded ) ? $h4_font_lineheight_decoded->desktop : $h4_font_lineheight;
		$h5_font_lineheight_mobile      = is_object( $h5_font_lineheight_decoded ) ? $h5_font_lineheight_decoded->mobile : $h5_font_lineheight;
		$h5_font_lineheight_tablet      = is_object( $h5_font_lineheight_decoded ) ? $h5_font_lineheight_decoded->tablet : $h5_font_lineheight;
		$h5_font_lineheight_desktop     = is_object( $h5_font_lineheight_decoded ) ? $h5_font_lineheight_decoded->desktop : $h5_font_lineheight;
		$h6_font_lineheight_mobile      = is_object( $h6_font_lineheight_decoded ) ? $h6_font_lineheight_decoded->mobile : $h6_font_lineheight;
		$h6_font_lineheight_tablet      = is_object( $h6_font_lineheight_decoded ) ? $h6_font_lineheight_decoded->tablet : $h6_font_lineheight;
		$h6_font_lineheight_desktop     = is_object( $h6_font_lineheight_decoded ) ? $h6_font_lineheight_decoded->desktop : $h6_font_lineheight;
		$body_font_lineheight_tablet    = is_object( $body_font_lineheight_decoded ) ? $body_font_lineheight_decoded->tablet : $body_font_lineheight;
		$body_font_lineheight_mobile    = is_object( $body_font_lineheight_decoded ) ? $body_font_lineheight_decoded->mobile : $body_font_lineheight;
		$body_font_lineheight_desktop   = is_object( $body_font_lineheight_decoded ) ? $body_font_lineheight_decoded->desktop : $body_font_lineheight;
		$widget_title_font_size_tablet  = is_object( $widget_title_font_size_decoded ) ? $widget_title_font_size_decoded->tablet : $widget_title_font_size;
		$widget_title_font_size_mobile  = is_object( $widget_title_font_size_decoded ) ? $widget_title_font_size_decoded->mobile : $widget_title_font_size;
		$widget_title_font_size_desktop = is_object( $widget_title_font_size_decoded ) ? $widget_title_font_size_decoded->desktop : $widget_title_font_size;
		
		// Inline CSS holder.
		$custom_css = "
			:root {
				--default-color: #ffffff;
				--body-font: {$body_font};
				--heading-font: {$heading_font};
				--link-color: {$link_color};
				--body-bg-color: {$body_bg_color};
				--cta-text-color: {$cta_text_color};
				--body-text-color: {$body_text_color};
				--cta-font-weight: {$cta_font_weight};
				--menu-link-color: {$menu_link_color};
				--body-font-weight: {$body_font_weight};
				--h1-font-weight: {$h1_font_weight};
				--h2-font-weight: {$h2_font_weight};
				--h3-font-weight: {$h3_font_weight};
				--h4-font-weight: {$h4_font_weight};
				--h5-font-weight: {$h5_font_weight};
				--h6-font-weight: {$h6_font_weight};
				--h1-text-transform: {$h1_font_transform};
				--h2-text-transform: {$h2_font_transform};
				--h3-text-transform: {$h3_font_transform};
				--h4-text-transform: {$h4_font_transform};
				--h5-text-transform: {$h5_font_transform};
				--h6-text-transform: {$h6_font_transform};
				--primary-menu-bg-color: {$menu_bg_color};
				--cta-background-color: {$cta_background};
				--cta-font-size: {$cta_font_size_desktop}px;
				--header-font-weight: {$header_font_weight};
				--body-text-transform: {$body_font_transform};
				--body-font-size: {$body_font_size_desktop}px;
				--h1-font-size: {$h1_font_size_desktop}px;
				--h1-font-size-tablet: {$h1_font_size_tablet}px;
				--h1-font-size-mobile: {$h1_font_size_mobile}px;
				--h2-font-size: {$h2_font_size_desktop}px;
				--h2-font-size-tablet: {$h2_font_size_tablet}px;
				--h2-font-size-mobile: {$h2_font_size_mobile}px;
				--h3-font-size: {$h3_font_size_desktop}px;
				--h3-font-size-tablet: {$h3_font_size_tablet}px;
				--h3-font-size-mobile: {$h3_font_size_mobile}px;
				--h4-font-size: {$h4_font_size_desktop}px;
				--h4-font-size-tablet: {$h4_font_size_tablet}px;
				--h4-font-size-mobile: {$h4_font_size_mobile}px;
				--h5-font-size: {$h5_font_size_desktop}px;
				--h5-font-size-tablet: {$h5_font_size_tablet}px;
				--h5-font-size-mobile: {$h5_font_size_mobile}px;
				--h6-font-size: {$h6_font_size_desktop}px;
				--h6-font-size-tablet: {$h6_font_size_tablet}px;
				--h6-font-size-mobile: {$h6_font_size_mobile}px;
				--active-menu-color: {$menu_link_active_color};
				--cta-font-size-tablet: {$cta_font_size_tablet}px;
				--cta-font-size-mobile: {$cta_font_size_mobile}px;
				--header-font-size: {$header_font_size_desktop}px;
				--body-font-size-mobile: {$body_font_size_mobile}px;
				--body-font-size-tablet: {$body_font_size_tablet}px;
				--footer-bottom-bg-color: {$footer_bottom_bg_color};
				--footer-widget-bg-color: {$footer_widgets_bg_color};
				--header-font-size-tablet: {$header_font_size_tablet}px;
				--header-font-size-mobile: {$header_font_size_mobile}px;
				--footer-bottom-text-color: {$footer_bottom_text_color};
				--widget-title-font-weight: {$widget_title_font_weight};
				--footer-widget-text-color: {$footer_widgets_text_color};
				--body-font-lineheight: {$body_font_lineheight_desktop}px;
				--h1-font-lineheight: {$h1_font_lineheight_desktop}px;
				--h1-font-lineheight-tablet: {$h1_font_lineheight_tablet}px;
				--h1-font-lineheight-mobile: {$h1_font_lineheight_mobile}px;
				--h2-font-lineheight: {$h2_font_lineheight_desktop}px;
				--h2-font-lineheight-tablet: {$h2_font_lineheight_tablet}px;
				--h2-font-lineheight-mobile: {$h2_font_lineheight_mobile}px;
				--h3-font-lineheight: {$h3_font_lineheight_desktop}px;
				--h3-font-lineheight-tablet: {$h3_font_lineheight_tablet}px;
				--h3-font-lineheight-mobile: {$h3_font_lineheight_mobile}px;
				--h4-font-lineheight: {$h4_font_lineheight_desktop}px;
				--h4-font-lineheight-tablet: {$h4_font_lineheight_tablet}px;
				--h4-font-lineheight-mobile: {$h4_font_lineheight_mobile}px;
				--h5-font-lineheight: {$h5_font_lineheight_desktop}px;
				--h5-font-lineheight-tablet: {$h5_font_lineheight_tablet}px;
				--h5-font-lineheight-mobile: {$h5_font_lineheight_mobile}px;
				--h6-font-lineheight: {$h6_font_lineheight_desktop}px;
				--h6-font-lineheight-tablet: {$h6_font_lineheight_tablet}px;
				--h6-font-lineheight-mobile: {$h6_font_lineheight_mobile}px;
				--widget-title-font-size: {$widget_title_font_size_desktop}px;
				--body-font-lineheight-tablet: {$body_font_lineheight_tablet}px;
				--body-font-lineheight-mobile: {$body_font_lineheight_mobile}px;
				--widget-title-font-size-tablet: {$widget_title_font_size_tablet}px;
				--widget-title-font-size-mobile: {$widget_title_font_size_mobile}px;
			}
        ";

		return $custom_css;
	}

	/**
	 * Frontend localized data
	 */
	public static function localized_js() {

		$localized_data = array(
			'site_url'          =>  site_url(),
			'ajaxurl'           =>  admin_url() . 'admin-ajax.php',
			'authRedirectUrl'   =>  home_url(),
			'google_client_ID'  =>  '140541384047-gf7004n9f58kh18gns7692armduvmm62.apps.googleusercontent.com',
		);

		return $localized_data;
	}

	/**
	 * Customizer localized data
	 */
	public static function customizer_localized_js() {

		$localized_data = array(
			'fonts' => array(
				'System' => self::get_standard_fonts(),
				'Google' => self::get_google_fonts(),
			),
		);

		return $localized_data;
	}

	/**
	 * Admin localized data
	 */
	public static function admin_localized_js() {
		$is_post        = false;
		$is_page        = false;
		$post_title     = '';
		$post_excerpt   = '';
		$post_content   = '';
		$post_thumbnail = '';

		if ( 'post' === get_post_type() ) {
			$is_post        = true;
			$post_title     = get_the_title( get_the_ID() );
			$post_excerpt   = get_the_excerpt( get_the_ID() );
			$post_content   = wp_strip_all_tags( get_the_content( get_the_ID() ) );
			$post_thumbnail = ( false !== get_the_post_thumbnail_url( get_the_ID() ) ? get_the_post_thumbnail_url( get_the_ID() ) : '' );
		}

		if ( 'page' === get_post_type() ) {
			$is_page = true;
		}

		$localized_data = array(
			'is_post'        => $is_post,
			'is_page'        => $is_page,
			'post_title'     => $post_title,
			'post_excerpt'   => $post_excerpt,
			'post_content'   => $post_content,
			'post_thumbnail' => $post_thumbnail,
		);

		return $localized_data;
	}

	/**
	 * Get standard fonts
	 *
	 * @return array
	 */
	public static function get_standard_fonts() {
		return apply_filters(
			'tutorstarter_standard_fonts_array',
			Fonts::system_fonts_list()
		);
	}

	/**
	 * Get all google fonts.
	 *
	 * @return array
	 */
	public static function get_google_fonts() {
		return apply_filters(
			'tutorstarter_google_fonts_array',
			Fonts::google_fonts_list()
		);
	}
}
