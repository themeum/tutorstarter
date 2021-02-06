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
		$cta_text_color            = get_theme_mod( 'cta_color', '#ffffff' );
		$cta_text_color_trans      = get_theme_mod( 'cta_color_trans', '#175cff' );
		$link_color                = get_theme_mod( 'link_color', '#175CFF' );
		$menu_bg_color             = get_theme_mod( 'menu_bg_color', '#ffffff' );
		$body_bg_color             = get_theme_mod( 'body_bg_color', '#ffffff' );
		$cart_color                = get_theme_mod( 'cart_color', '#57586E' );
		$cart_color_trans          = get_theme_mod( 'cart_color_trans', '#175cff' );
		$cta_background            = get_theme_mod( 'cta_background', '#ffffff' );
		$cta_border_color          = get_theme_mod( 'cta_border_color', '#1539e9' );
		$cta_border_color_trans    = get_theme_mod( 'cta_border_color_trans', '#ffffff' );
		$cta_border_width          = get_theme_mod( 'cta_border_width', 1 );
		$cta_border_radius         = get_theme_mod( 'cta_border_radius', 50 );
		$body_text_color           = get_theme_mod( 'body_text_color', '#57586E' );
		$menu_link_color           = get_theme_mod( 'menu_link_color', '#57586E' );
		$menu_link_color_trans     = get_theme_mod( 'menu_link_color_trans', '#ffffff' );
		$footer_bottom_bg_color    = get_theme_mod( 'footer_bottom_bg_color', '#0A083B' );
		$menu_link_active_color    = get_theme_mod( 'menu_link_active_color', '#175CFF' );
		$link_active_color_trans   = get_theme_mod( 'menu_link_active_color_trans', '#ffffff' );
		$footer_widgets_bg_color   = get_theme_mod( 'footer_widgets_bg_color', '#0A083B' );
		$footer_bottom_text_color  = get_theme_mod( 'footer_bottom_text_color', '#ffffff' );
		$footer_widgets_text_color = get_theme_mod( 'footer_widgets_text_color', '#ffffff' );

		$cta_background_trans =  get_theme_mod( 'background_trans_cta', 'rgba(0, 0, 0, 0.5)' );

		// Body Typography.
		$body_typography = get_theme_mod( 'main_typography' );

		// Header Menu Typography.
		$menu_link_typography = get_theme_mod( 'header_link_typography' );

		// Header Button Typography.
		$header_btn_typography = get_theme_mod( 'cta_font_typography' );

		// H1 Typography.
		$h1_typography = get_theme_mod( 'h1_typography' );

		// H2 Typography.
		$h2_typography = get_theme_mod( 'h2_typography' );

		// H3 Typography.
		$h3_typography = get_theme_mod( 'h3_typography' );

		// H4 Typography.
		$h4_typography = get_theme_mod( 'h4_typography' );

		// H5 Typography.
		$h5_typography = get_theme_mod( 'h5_typography' );

		// H6 Typography.
		$h6_typography = get_theme_mod( 'h6_typography' );

		// Widget Title Typography.
		$widget_title_typography = get_theme_mod( 'footer_widget_title_typography' );

		// Widget Text Typography.
		$widget_text_typography = get_theme_mod( 'footer_widget_text_typography' );
		
		// Inline CSS declarations.
		$custom_css = "
			:root {
				--default-color: #ffffff;
				--body-font: {$body_font};
				--heading-font: {$heading_font};
				--link-color: {$link_color};
				--body-bg-color: {$body_bg_color};
				--cart-color: {$cart_color};
				--cart-color-trans: {$cart_color_trans};
				--cta-text-color: {$cta_text_color};
				--cta-text-color-trans: {$cta_text_color_trans};
				--body-text-color: {$body_text_color};
				--cta-font-weight: {$header_btn_typography['fontWeight']};
				--cta-font-transform: {$header_btn_typography['textTransform']};
				--cta-font-lineheight: {$header_btn_typography['lineHeight']['desktop']}px;
				--cta-font-lineheight-tablet: {$header_btn_typography['lineHeight']['tablet']}px;
				--cta-font-lineheight-mobile: {$header_btn_typography['lineHeight']['mobile']}px;
				--menu-link-color: {$menu_link_color};
				--menu-link-color-trans: {$menu_link_color_trans};
				--body-font-weight: {$body_typography['fontWeight']};
				--h1-font-weight: {$h1_typography['fontWeight']};
				--h2-font-weight: {$h2_typography['fontWeight']};
				--h3-font-weight: {$h3_typography['fontWeight']};
				--h4-font-weight: {$h4_typography['fontWeight']};
				--h5-font-weight: {$h5_typography['fontWeight']};
				--h6-font-weight: {$h6_typography['fontWeight']};
				--h1-text-transform: {$h1_typography['textTransform']};
				--h2-text-transform: {$h2_typography['textTransform']};
				--h3-text-transform: {$h3_typography['textTransform']};
				--h4-text-transform: {$h4_typography['textTransform']};
				--h5-text-transform: {$h5_typography['textTransform']};
				--h6-text-transform: {$h6_typography['textTransform']};
				--primary-menu-bg-color: {$menu_bg_color};
				--cta-background-color: {$cta_background};
				--cta-background-color-trans: rgba({$cta_background_trans['rgb']['r']}, {$cta_background_trans['rgb']['g']}, {$cta_background_trans['rgb']['b']}, {$cta_background_trans['rgb']['a']});
				--cta-border-color: {$cta_border_color};
				--cta-border-color-trans: {$cta_border_color_trans};
				--cta-border-width: {$cta_border_width}px;
				--cta-border-radius: {$cta_border_radius}px;
				--cta-font-size: {$header_btn_typography['fontSize']['desktop']}px;
				--header-font-weight: {$menu_link_typography['fontWeight']};
				--header-font-transform: {$menu_link_typography['textTransform']};
				--header-font-lineheight: {$menu_link_typography['lineHeight']['desktop']}px;
				--header-font-lineheight-tablet: {$menu_link_typography['lineHeight']['tablet']}px;
				--header-font-lineheight-mobile: {$menu_link_typography['lineHeight']['mobile']}px;
				--body-text-transform: {$body_typography['textTransform']};
				--body-font-size: {$body_typography['fontSize']['desktop']}px;
				--h1-font-size: {$h1_typography['fontSize']['desktop']}px;
				--h1-font-size-tablet: {$h1_typography['fontSize']['tablet']}px;
				--h1-font-size-mobile: {$h1_typography['fontSize']['mobile']}px;
				--h2-font-size: {$h2_typography['fontSize']['desktop']}px;
				--h2-font-size-tablet: {$h2_typography['fontSize']['tablet']}px;
				--h2-font-size-mobile: {$h2_typography['fontSize']['mobile']}px;
				--h3-font-size: {$h3_typography['fontSize']['desktop']}px;
				--h3-font-size-tablet: {$h3_typography['fontSize']['tablet']}px;
				--h3-font-size-mobile: {$h3_typography['fontSize']['mobile']}px;
				--h4-font-size: {$h4_typography['fontSize']['desktop']}px;
				--h4-font-size-tablet: {$h4_typography['fontSize']['tablet']}px;
				--h4-font-size-mobile: {$h4_typography['fontSize']['mobile']}px;
				--h5-font-size: {$h5_typography['fontSize']['desktop']}px;
				--h5-font-size-tablet: {$h5_typography['fontSize']['tablet']}px;
				--h5-font-size-mobile: {$h5_typography['fontSize']['mobile']}px;
				--h6-font-size: {$h6_typography['fontSize']['desktop']}px;
				--h6-font-size-tablet: {$h6_typography['fontSize']['tablet']}px;
				--h6-font-size-mobile: {$h6_typography['fontSize']['mobile']}px;
				--active-menu-color: {$menu_link_active_color};
				--active-menu-color-trans: {$link_active_color_trans};
				--cta-font-size-tablet: {$header_btn_typography['fontSize']['tablet']}px;
				--cta-font-size-mobile: {$header_btn_typography['fontSize']['mobile']}px;
				--header-font-size: {$menu_link_typography['fontSize']['desktop']}px;
				--body-font-size-mobile: {$body_typography['fontSize']['mobile']}px;
				--body-font-size-tablet: {$body_typography['fontSize']['tablet']}px;
				--footer-bottom-bg-color: {$footer_bottom_bg_color};
				--footer-widget-bg-color: {$footer_widgets_bg_color};
				--header-font-size-tablet: {$menu_link_typography['fontSize']['tablet']}px;
				--header-font-size-mobile: {$menu_link_typography['fontSize']['mobile']}px;
				--footer-bottom-text-color: {$footer_bottom_text_color};
				--widget-title-font-weight: {$widget_title_typography['fontWeight']};
				--widget-title-text-transform: {$widget_title_typography['textTransform']};
				--footer-widget-text-color: {$footer_widgets_text_color};
				--body-font-lineheight: {$body_typography['lineHeight']['desktop']}px;
				--h1-font-lineheight: {$h1_typography['lineHeight']['desktop']}px;
				--h1-font-lineheight-tablet: {$h1_typography['lineHeight']['tablet']}px;
				--h1-font-lineheight-mobile: {$h1_typography['lineHeight']['mobile']}px;
				--h2-font-lineheight: {$h2_typography['lineHeight']['desktop']}px;
				--h2-font-lineheight-tablet: {$h2_typography['lineHeight']['tablet']}px;
				--h2-font-lineheight-mobile: {$h2_typography['lineHeight']['mobile']}px;
				--h3-font-lineheight: {$h3_typography['lineHeight']['desktop']}px;
				--h3-font-lineheight-tablet: {$h3_typography['lineHeight']['tablet']}px;
				--h3-font-lineheight-mobile: {$h3_typography['lineHeight']['mobile']}px;
				--h4-font-lineheight: {$h4_typography['lineHeight']['desktop']}px;
				--h4-font-lineheight-tablet: {$h4_typography['lineHeight']['tablet']}px;
				--h4-font-lineheight-mobile: {$h4_typography['lineHeight']['mobile']}px;
				--h5-font-lineheight: {$h5_typography['lineHeight']['desktop']}px;
				--h5-font-lineheight-tablet: {$h5_typography['lineHeight']['tablet']}px;
				--h5-font-lineheight-mobile: {$h5_typography['lineHeight']['mobile']}px;
				--h6-font-lineheight: {$h6_typography['lineHeight']['desktop']}px;
				--h6-font-lineheight-tablet: {$h6_typography['lineHeight']['tablet']}px;
				--h6-font-lineheight-mobile: {$h6_typography['lineHeight']['mobile']}px;
				--body-font-lineheight-tablet: {$body_typography['lineHeight']['tablet']}px;
				--body-font-lineheight-mobile: {$body_typography['lineHeight']['mobile']}px;
				--widget-title-font-size: {$widget_title_typography['fontSize']['desktop']}px;
				--widget-title-font-size-tablet: {$widget_title_typography['fontSize']['tablet']}px;
				--widget-title-font-size-mobile: {$widget_title_typography['fontSize']['mobile']}px;
				--widget-title-line-height: {$widget_title_typography['lineHeight']['desktop']}px;
				--widget-title-line-height-tablet: {$widget_title_typography['lineHeight']['tablet']}px;
				--widget-title-line-height-mobile: {$widget_title_typography['lineHeight']['mobile']}px;
				--widget-text-font-weight: {$widget_text_typography['fontWeight']};
				--widget-text-transform: {$widget_text_typography['textTransform']};
				--widget-text-font-size: {$widget_text_typography['fontSize']['desktop']}px;
				--widget-text-font-size-tablet: {$widget_text_typography['fontSize']['tablet']}px;
				--widget-text-font-size-mobile: {$widget_text_typography['fontSize']['mobile']}px;
				--widget-text-line-height: {$widget_text_typography['lineHeight']['desktop']}px;
				--widget-text-line-height-tablet: {$widget_text_typography['lineHeight']['tablet']}px;
				--widget-text-line-height-mobile: {$widget_text_typography['lineHeight']['mobile']}px;
			}
        ";

		return $custom_css;
	}

	/**
	 * Frontend localized data
	 */
	public static function localized_js() {

		$localized_data = array(
			'site_url'         =>  site_url(),
			'ajaxurl'          =>  admin_url( 'admin-ajax.php' ),
			'authRedirectUrl'  =>  home_url(),
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
		
		$post_meta = get_post_meta( get_the_ID(), '_tutorstarter_schema', true );

		$localized_data = array(
			'is_post'        => $is_post,
			'post_meta'      => json_encode( $post_meta ),
			'post_title'     => $post_title,
			'post_excerpt'   => $post_excerpt,
			'post_content'   => $post_content,
			'post_thumbnail' => $post_thumbnail,
			'ajax_url'       => admin_url( 'admin-ajax.php' ),
		);

		return $localized_data;
	}

	/**
	 * Page settings localized data
	 */
	public static function page_settings_localized_data() {
		if ( 'page' === get_post_type() ) {
			$is_page = true;
		}

		$localized_data = array(
			'is_page' => $is_page,
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
