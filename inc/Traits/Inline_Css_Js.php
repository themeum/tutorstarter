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
		$heading_font              = get_theme_mod( 'heading_font', 'Sora' );
		$cta_text_color            = get_theme_mod( 'cta_color', '#1539e9' );
		$cta_text_color_trans      = get_theme_mod( 'cta_color_trans', '#ffffff' );
		$link_color                = get_theme_mod( 'link_color', '#1950D1' );
		$menu_bg_color             = get_theme_mod( 'menu_bg_color', '#ffffff' );
		$body_bg_color             = get_theme_mod( 'body_bg_color', '#ffffff' );
		$cart_color                = get_theme_mod( 'cart_color', '#1950D1' );
		$cart_color_trans          = get_theme_mod( 'cart_color_trans', '#ffffff' );
		$cta_background            = get_theme_mod( 'cta_background', '#ffffff' );
		$cta_border_color          = get_theme_mod( 'cta_border_color', '#1539e9' );
		$cta_border_color_trans    = get_theme_mod( 'cta_border_color_trans', '#1950D1' );
		$cta_border_width          = get_theme_mod( 'cta_border_width', 1 );
		$cta_border_radius         = get_theme_mod( 'cta_border_radius', 50 );
		$body_text_color           = get_theme_mod( 'body_text_color', '#57586E' );
		$menu_link_color           = get_theme_mod( 'menu_link_color', '#57586E' );
		$menu_link_color_trans     = get_theme_mod( 'menu_link_color_trans', '#ffffff' );
		$footer_bottom_bg_color    = get_theme_mod( 'footer_bottom_bg_color', '#1E1E2C' );
		$menu_link_active_color    = get_theme_mod( 'menu_link_active_color', '#175cff' );
		$link_active_color_trans   = get_theme_mod( 'menu_link_active_color_trans', '#ffffff' );
		$footer_widgets_bg_color   = get_theme_mod( 'footer_widgets_bg_color', '#1E1E2C' );
		$footer_bottom_text_color  = get_theme_mod( 'footer_bottom_text_color', '#ffffff' );
		$footer_widgets_text_color = get_theme_mod( 'footer_widgets_text_color', '#ffffff' );

		$cta_trans_bg = get_theme_mod( 'background_trans_cta' );
		$cta_background_trans =  ! empty( $cta_trans_bg['rgb'] ) ? 'rgba(' . $cta_trans_bg['rgb']['r'] . ',' . $cta_trans_bg['rgb']['g'] . ',' . $cta_trans_bg['rgb']['b'] . ',' . $cta_trans_bg['rgb']['a'] . ')' : 'rgba(25, 80, 209, 1)';
		
		// Sticky header BG.
		$sticky_header_bg = get_theme_mod( 'header_sticky_bg_color' );
		$sticky_header_bg_trans =  ! empty( $sticky_header_bg['rgb'] ) ? 'rgba(' . $sticky_header_bg['rgb']['r'] . ',' . $sticky_header_bg['rgb']['g'] . ',' . $sticky_header_bg['rgb']['b'] . ',' . $sticky_header_bg['rgb']['a'] . ')' : 'rgba(4, 42, 132, 0.7)';

		// Body Typography.
		$body_typography                   = get_theme_mod( 'main_typography' );
		$body_typography_fontsize         = ! empty( $body_typography['fontSize'] ) ? $body_typography['fontSize']['desktop'] : 16;
		$body_typography_fontsize_tablet  = ! empty( $body_typography['fontSize'] ) ? $body_typography['fontSize']['tablet'] : 13;
		$body_typography_fontsize_mobile  = ! empty( $body_typography['fontSize'] ) ? $body_typography['fontSize']['mobile'] : 13;
		
		$body_typography_lineheight        = ! empty( $body_typography['lineHeight'] ) ? $body_typography['lineHeight']['desktop'] : 1.7;
		$body_typography_lineheight_tablet = ! empty( $body_typography['lineHeight'] ) ? $body_typography['lineHeight']['tablet'] : 1.5;
		$body_typography_lineheight_mobile = ! empty( $body_typography['lineHeight'] ) ? $body_typography['lineHeight']['mobile'] : 1.5;
		
		$body_typography_fontweight        = ! empty( $body_typography['fontWeight'] ) ? $body_typography['fontWeight'] : 400;
		$body_typography_texttransform     = ! empty( $body_typography['textTransform'] ) ? $body_typography['textTransform'] : 'none';

		// Header Menu Typography.
		$menu_link_typography = get_theme_mod( 'header_link_typography' );
		$menu_link_typography_fontsize = ! empty( $menu_link_typography['fontSize'] ) ? $menu_link_typography['fontSize']['desktop'] : 16;
		$menu_link_typography_fontsize_tablet = ! empty( $menu_link_typography['fontSize'] ) ? $menu_link_typography['fontSize']['tablet'] : 13;
		$menu_link_typography_fontsize_mobile = ! empty( $menu_link_typography['fontSize'] ) ? $menu_link_typography['fontSize']['mobile'] : 13;
		
		$menu_link_typography_lineheight = ! empty( $menu_link_typography['lineHeight'] ) ? $menu_link_typography['lineHeight']['desktop'] : 1.2;
		$menu_link_typography_lineheight_tablet = ! empty( $menu_link_typography['lineHeight'] ) ? $menu_link_typography['lineHeight']['tablet'] : 1.2;
		$menu_link_typography_lineheight_mobile = ! empty( $menu_link_typography['lineHeight'] ) ? $menu_link_typography['lineHeight']['mobile'] : 1.2;

		$menu_link_typography_fontweight = ! empty( $menu_link_typography['fontWeight'] ) ? $menu_link_typography['fontWeight'] : 400;
		$menu_link_typography_texttransform = ! empty( $menu_link_typography['textTransform'] ) ? $menu_link_typography['textTransform'] : 'none';

		// Header Button Typography.
		$header_btn_typography = get_theme_mod( 'cta_font_typography' );
		$header_btn_typography_fontsize = ! empty( $header_btn_typography['fontSize'] ) ? $header_btn_typography['fontSize']['desktop'] : 16;
		$header_btn_typography_fontsize_tablet = ! empty( $header_btn_typography['fontSize'] ) ? $header_btn_typography['fontSize']['tablet'] : 13;
		$header_btn_typography_fontsize_mobile = ! empty( $header_btn_typography['fontSize'] ) ? $header_btn_typography['fontSize']['mobile'] : 13;

		$header_btn_typography_lineheight = ! empty( $header_btn_typography['lineHeight'] ) ? $header_btn_typography['lineHeight']['desktop'] : 1.2;
		$header_btn_typography_lineheight_tablet = ! empty( $header_btn_typography['lineHeight'] ) ? $header_btn_typography['lineHeight']['tablet'] : 1.2;
		$header_btn_typography_lineheight_mobile = ! empty( $header_btn_typography['lineHeight'] ) ? $header_btn_typography['lineHeight']['mobile'] : 1.2;

		$header_btn_typography_fontweight = ! empty( $header_btn_typography['fontWeight'] ) ? $header_btn_typography['fontWeight'] : 400;
		$header_btn_typography_texttransform = ! empty( $header_btn_typography['textTransform'] ) ? $header_btn_typography['textTransform'] : 'none';

		// H1 Typography.
		$h1_typography = get_theme_mod( 'h1_typography' );
		$h1_typography_fontsize = ! empty( $h1_typography['fontSize'] ) ? $h1_typography['fontSize']['desktop'] : 68;
		$h1_typography_fontsize_tablet = ! empty( $h1_typography['fontSize'] ) ? $h1_typography['fontSize']['tablet'] : 48;
		$h1_typography_fontsize_mobile = ! empty( $h1_typography['fontSize'] ) ? $h1_typography['fontSize']['mobile'] : 48;

		$h1_typography_lineheight = ! empty( $h1_typography['lineHeight'] ) ? $h1_typography['lineHeight']['desktop'] : 2.5;
		$h1_typography_lineheight_tablet = ! empty( $h1_typography['lineHeight'] ) ? $h1_typography['lineHeight']['tablet'] : 2.5;
		$h1_typography_lineheight_mobile = ! empty( $h1_typography['lineHeight'] ) ? $h1_typography['lineHeight']['mobile'] : 2.5;
		
		$h1_typography_fontweight = ! empty( $h1_typography['fontWeight'] ) ? $h1_typography['fontWeight'] : 700;
		$h1_typography_texttransform = ! empty( $h1_typography['textTransform'] ) ? $h1_typography['textTransform'] : 'none';

		// H2 Typography.
		$h2_typography = get_theme_mod( 'h2_typography' );
		$h2_typography_fontsize = ! empty( $h2_typography['fontSize'] ) ? $h2_typography['fontSize']['desktop'] : 48;
		$h2_typography_fontsize_tablet = ! empty( $h2_typography['fontSize'] ) ? $h2_typography['fontSize']['tablet'] : 32;
		$h2_typography_fontsize_mobile = ! empty( $h2_typography['fontSize'] ) ? $h2_typography['fontSize']['mobile'] : 32;
		
		$h2_typography_lineheight = ! empty( $h2_typography['lineHeight'] ) ? $h2_typography['lineHeight']['desktop'] : 2;
		$h2_typography_lineheight_tablet = ! empty( $h2_typography['lineHeight'] ) ? $h2_typography['lineHeight']['tablet'] : 2;
		$h2_typography_lineheight_mobile = ! empty( $h2_typography['lineHeight'] ) ? $h2_typography['lineHeight']['mobile'] : 2;
		
		$h2_typography_fontweight = ! empty( $h2_typography['fontWeight'] ) ? $h2_typography['fontWeight'] : 700;
		$h2_typography_texttransform = ! empty( $h2_typography['textTransform'] ) ? $h2_typography['textTransform'] : 'none';

		// H3 Typography.
		$h3_typography = get_theme_mod( 'h3_typography' );
		$h3_typography_fontsize = ! empty( $h3_typography['fontSize'] ) ? $h3_typography['fontSize']['desktop'] : 36;
		$h3_typography_fontsize_tablet = ! empty( $h3_typography['fontSize'] ) ? $h3_typography['fontSize']['tablet'] : 28;
		$h3_typography_fontsize_mobile = ! empty( $h3_typography['fontSize'] ) ? $h3_typography['fontSize']['mobile'] : 28;
		
		$h3_typography_lineheight = ! empty( $h3_typography['lineHeight'] ) ? $h3_typography['lineHeight']['desktop'] : 1.8;
		$h3_typography_lineheight_tablet = ! empty( $h3_typography['lineHeight'] ) ? $h3_typography['lineHeight']['tablet'] : 1.8;
		$h3_typography_lineheight_mobile = ! empty( $h3_typography['lineHeight'] ) ? $h3_typography['lineHeight']['mobile'] : 1.8;
		
		$h3_typography_fontweight = ! empty( $h3_typography['fontWeight'] ) ? $h3_typography['fontWeight'] : 700;
		$h3_typography_texttransform = ! empty( $h3_typography['textTransform'] ) ? $h3_typography['textTransform'] : 'none';

		// H4 Typography.
		$h4_typography = get_theme_mod( 'h4_typography' );
		$h4_typography_fontsize = ! empty( $h4_typography['fontSize'] ) ? $h4_typography['fontSize']['desktop'] : 26;
		$h4_typography_fontsize_tablet = ! empty( $h4_typography['fontSize'] ) ? $h4_typography['fontSize']['tablet'] : 24;
		$h4_typography_fontsize_mobile = ! empty( $h4_typography['fontSize'] ) ? $h4_typography['fontSize']['mobile'] : 24;
		
		$h4_typography_lineheight = ! empty( $h4_typography['lineHeight'] ) ? $h4_typography['lineHeight']['desktop'] : 1.7;
		$h4_typography_lineheight_tablet = ! empty( $h4_typography['lineHeight'] ) ? $h4_typography['lineHeight']['tablet'] : 1.7;
		$h4_typography_lineheight_mobile = ! empty( $h4_typography['lineHeight'] ) ? $h4_typography['lineHeight']['mobile'] : 1.7;
		
		$h4_typography_fontweight = ! empty( $h4_typography['fontWeight'] ) ? $h4_typography['fontWeight'] : 700;
		$h4_typography_texttransform = ! empty( $h4_typography['textTransform'] ) ? $h4_typography['textTransform'] : 'none';

		// H5 Typography.
		$h5_typography = get_theme_mod( 'h5_typography' );
		$h5_typography_fontsize = ! empty( $h5_typography['fontSize'] ) ? $h5_typography['fontSize']['desktop'] : 20;
		$h5_typography_fontsize_tablet = ! empty( $h5_typography['fontSize'] ) ? $h5_typography['fontSize']['tablet'] : 18;
		$h5_typography_fontsize_mobile = ! empty( $h5_typography['fontSize'] ) ? $h5_typography['fontSize']['mobile'] : 18;
		
		$h5_typography_lineheight = ! empty( $h5_typography['lineHeight'] ) ? $h5_typography['lineHeight']['desktop'] : 1.6;
		$h5_typography_lineheight_tablet = ! empty( $h5_typography['lineHeight'] ) ? $h5_typography['lineHeight']['tablet'] : 1.6;
		$h5_typography_lineheight_mobile = ! empty( $h5_typography['lineHeight'] ) ? $h5_typography['lineHeight']['mobile'] : 1.6;
		
		$h5_typography_fontweight = ! empty( $h5_typography['fontWeight'] ) ? $h5_typography['fontWeight'] : 700;
		$h5_typography_texttransform = ! empty( $h5_typography['textTransform'] ) ? $h5_typography['textTransform'] : 'none';

		// H6 Typography.
		$h6_typography = get_theme_mod( 'h6_typography' );
		$h6_typography_fontsize = ! empty( $h6_typography['fontSize'] ) ? $h6_typography['fontSize']['desktop'] : 18;
		$h6_typography_fontsize_tablet = ! empty( $h6_typography['fontSize'] ) ? $h6_typography['fontSize']['tablet'] : 17;
		$h6_typography_fontsize_mobile = ! empty( $h6_typography['fontSize'] ) ? $h6_typography['fontSize']['mobile'] : 17;
		
		$h6_typography_lineheight = ! empty( $h6_typography['lineHeight'] ) ? $h6_typography['lineHeight']['desktop'] : 1.5;
		$h6_typography_lineheight_tablet = ! empty( $h6_typography['lineHeight'] ) ? $h6_typography['lineHeight']['tablet'] : 1.5;
		$h6_typography_lineheight_mobile = ! empty( $h6_typography['lineHeight'] ) ? $h6_typography['lineHeight']['mobile'] : 1.5;
		
		$h6_typography_fontweight = ! empty( $h6_typography['fontWeight'] ) ? $h6_typography['fontWeight'] : 700;
		$h6_typography_texttransform = ! empty( $h6_typography['textTransform'] ) ? $h6_typography['textTransform'] : 'none';

		// Widget Title Typography.
		$widget_title_typography = get_theme_mod( 'footer_widget_title_typography' );
		$widget_title_typography_fontsize = ! empty( $widget_title_typography['fontSize'] ) ? $widget_title_typography['fontSize']['desktop'] : 18;
		$widget_title_typography_fontsize_tablet = ! empty( $widget_title_typography['fontSize'] ) ? $widget_title_typography['fontSize']['tablet'] : 16;
		$widget_title_typography_fontsize_mobile = ! empty( $widget_title_typography['fontSize'] ) ? $widget_title_typography['fontSize']['mobile'] : 16;

		$widget_title_typography_lineheight = ! empty( $widget_title_typography['lineHeight'] ) ? $widget_title_typography['lineHeight']['desktop'] : 1.78;
		$widget_title_typography_lineheight_tablet = ! empty( $widget_title_typography['lineHeight'] ) ? $widget_title_typography['lineHeight']['tablet'] : 1.78;
		$widget_title_typography_lineheight_mobile = ! empty( $widget_title_typography['lineHeight'] ) ? $widget_title_typography['lineHeight']['mobile'] : 1.78;
		
		$widget_title_typography_fontweight = ! empty( $widget_title_typography['fontWeight'] ) ? $widget_title_typography['fontWeight'] : 700;
		$widget_title_typography_texttransform = ! empty( $widget_title_typography['textTransform'] ) ? $widget_title_typography['textTransform'] : 'none';
		
		// Widget Text Typography.
		$widget_text_typography = get_theme_mod( 'footer_widget_text_typography' );
		$widget_text_typography_fontsize = ! empty( $widget_text_typography['fontSize'] ) ? $widget_text_typography['fontSize']['desktop'] : 16;
		$widget_text_typography_fontsize_tablet = ! empty( $widget_text_typography['fontSize'] ) ? $widget_text_typography['fontSize']['tablet'] : 16;
		$widget_text_typography_fontsize_mobile = ! empty( $widget_text_typography['fontSize'] ) ? $widget_text_typography['fontSize']['mobile'] : 16;

		$widget_text_typography_lineheight = ! empty( $widget_text_typography['lineHeight'] ) ? $widget_text_typography['lineHeight']['desktop'] : 1.78;
		$widget_text_typography_lineheight_tablet = ! empty( $widget_text_typography['lineHeight'] ) ? $widget_text_typography['lineHeight']['tablet'] : 1.78;
		$widget_text_typography_lineheight_mobile = ! empty( $widget_text_typography['lineHeight'] ) ? $widget_text_typography['lineHeight']['mobile'] : 1.78;
		
		$widget_text_typography_fontweight = ! empty( $widget_text_typography['fontWeight'] ) ? $widget_text_typography['fontWeight'] : 400;
		$widget_text_typography_texttransform = ! empty( $widget_text_typography['textTransform'] ) ? $widget_text_typography['textTransform'] : 'none';
		
		
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
				--cta-font-weight: {$header_btn_typography_fontweight};
				--cta-font-transform: {$header_btn_typography_texttransform};
				--cta-font-lineheight: {$header_btn_typography_lineheight}em;
				--cta-font-lineheight-tablet: {$header_btn_typography_lineheight_tablet}em;
				--cta-font-lineheight-mobile: {$header_btn_typography_lineheight_mobile}em;
				--menu-link-color: {$menu_link_color};
				--menu-link-color-trans: {$menu_link_color_trans};
				--body-font-weight: {$body_typography_fontweight};
				--h1-font-weight: {$h1_typography_fontweight};
				--h2-font-weight: {$h2_typography_fontweight};
				--h3-font-weight: {$h3_typography_fontweight};
				--h4-font-weight: {$h4_typography_fontweight};
				--h5-font-weight: {$h5_typography_fontweight};
				--h6-font-weight: {$h6_typography_fontweight};
				--h1-text-transform: {$h1_typography_texttransform};
				--h2-text-transform: {$h2_typography_texttransform};
				--h3-text-transform: {$h3_typography_texttransform};
				--h4-text-transform: {$h4_typography_texttransform};
				--h5-text-transform: {$h5_typography_texttransform};
				--h6-text-transform: {$h6_typography_texttransform};
				--primary-menu-bg-color: {$menu_bg_color};
				--sticky-menu-bg-color: {$sticky_header_bg_trans};
				--cta-background-color: {$cta_background};
				--cta-background-color-trans: {$cta_background_trans};
				--cta-border-color: {$cta_border_color};
				--cta-border-color-trans: {$cta_border_color_trans};
				--cta-border-width: {$cta_border_width}px;
				--cta-border-radius: {$cta_border_radius}px;
				--cta-font-size: {$header_btn_typography_fontsize}px;
				--header-font-weight: {$menu_link_typography_fontweight};
				--header-font-transform: {$menu_link_typography_texttransform};
				--header-font-lineheight: {$menu_link_typography_lineheight}em;
				--header-font-lineheight-tablet: {$menu_link_typography_lineheight_tablet}em;
				--header-font-lineheight-mobile: {$menu_link_typography_lineheight_mobile}em;
				--body-text-transform: {$body_typography_texttransform};
				--body-font-size: {$body_typography_fontsize}px;
				--h1-font-size: {$h1_typography_fontsize}px;
				--h1-font-size-tablet: {$h1_typography_fontsize_tablet}px;
				--h1-font-size-mobile: {$h1_typography_fontsize_mobile}px;
				--h2-font-size: {$h2_typography_fontsize}px;
				--h2-font-size-tablet: {$h2_typography_fontsize_tablet}px;
				--h2-font-size-mobile: {$h2_typography_fontsize_mobile}px;
				--h3-font-size: {$h3_typography_fontsize}px;
				--h3-font-size-tablet: {$h3_typography_fontsize_tablet}px;
				--h3-font-size-mobile: {$h3_typography_fontsize_mobile}px;
				--h4-font-size: {$h4_typography_fontsize}px;
				--h4-font-size-tablet: {$h4_typography_fontsize_tablet}px;
				--h4-font-size-mobile: {$h4_typography_fontsize_mobile}px;
				--h5-font-size: {$h5_typography_fontsize}px;
				--h5-font-size-tablet: {$h5_typography_fontsize_tablet}px;
				--h5-font-size-mobile: {$h5_typography_fontsize_mobile}px;
				--h6-font-size: {$h6_typography_fontsize}px;
				--h6-font-size-tablet: {$h6_typography_fontsize_tablet}px;
				--h6-font-size-mobile: {$h6_typography_fontsize_mobile}px;
				--active-menu-color: {$menu_link_active_color};
				--active-menu-color-trans: {$link_active_color_trans};
				--cta-font-size-tablet: {$header_btn_typography_fontsize_tablet}px;
				--cta-font-size-mobile: {$header_btn_typography_fontsize_mobile}px;
				--header-font-size: {$menu_link_typography_fontsize}px;
				--body-font-size-mobile: {$body_typography_fontsize_mobile}px;
				--body-font-size-tablet: {$body_typography_fontsize_tablet}px;
				--footer-bottom-bg-color: {$footer_bottom_bg_color};
				--footer-widget-bg-color: {$footer_widgets_bg_color};
				--header-font-size-tablet: {$menu_link_typography_fontsize_tablet}px;
				--header-font-size-mobile: {$menu_link_typography_fontsize_mobile}px;
				--footer-bottom-text-color: {$footer_bottom_text_color};
				--widget-title-font-weight: {$widget_title_typography_fontweight};
				--widget-title-text-transform: {$widget_title_typography_texttransform};
				--footer-widget-text-color: {$footer_widgets_text_color};
				--body-font-lineheight: {$body_typography_lineheight}em;
				--h1-font-lineheight: {$h1_typography_lineheight}em;
				--h1-font-lineheight-tablet: {$h1_typography_lineheight_tablet}em;
				--h1-font-lineheight-mobile: {$h1_typography_lineheight_mobile}em;
				--h2-font-lineheight: {$h2_typography_lineheight}em;
				--h2-font-lineheight-tablet: {$h2_typography_lineheight_tablet}em;
				--h2-font-lineheight-mobile: {$h2_typography_lineheight_mobile}em;
				--h3-font-lineheight: {$h3_typography_lineheight}em;
				--h3-font-lineheight-tablet: {$h3_typography_lineheight_tablet}em;
				--h3-font-lineheight-mobile: {$h3_typography_lineheight_mobile}em;
				--h4-font-lineheight: {$h4_typography_lineheight}em;
				--h4-font-lineheight-tablet: {$h4_typography_lineheight_tablet}em;
				--h4-font-lineheight-mobile: {$h4_typography_lineheight_mobile}em;
				--h5-font-lineheight: {$h5_typography_lineheight}em;
				--h5-font-lineheight-tablet: {$h5_typography_lineheight_tablet}em;
				--h5-font-lineheight-mobile: {$h5_typography_lineheight_mobile}em;
				--h6-font-lineheight: {$h6_typography_lineheight}em;
				--h6-font-lineheight-tablet: {$h6_typography_lineheight_tablet}em;
				--h6-font-lineheight-mobile: {$h6_typography_lineheight_mobile}em;
				--body-font-lineheight-tablet: {$body_typography_lineheight_tablet}em;
				--body-font-lineheight-mobile: {$body_typography_lineheight_mobile}em;
				--widget-title-font-size: {$widget_title_typography_fontsize}px;
				--widget-title-font-size-tablet: {$widget_title_typography_fontsize_tablet}px;
				--widget-title-font-size-mobile: {$widget_title_typography_fontsize_mobile}px;
				--widget-title-line-height: {$widget_title_typography_lineheight}em;
				--widget-title-line-height-tablet: {$widget_title_typography_lineheight_tablet}em;
				--widget-title-line-height-mobile: {$widget_title_typography_lineheight_mobile}em;
				--widget-text-font-weight: {$widget_text_typography_fontweight};
				--widget-text-transform: {$widget_text_typography_texttransform};
				--widget-text-font-size: {$widget_text_typography_fontsize}px;
				--widget-text-font-size-tablet: {$widget_text_typography_fontsize_tablet}px;
				--widget-text-font-size-mobile: {$widget_text_typography_fontsize_mobile}px;
				--widget-text-line-height: {$widget_text_typography_lineheight}em;
				--widget-text-line-height-tablet: {$widget_text_typography_lineheight_tablet}em;
				--widget-text-line-height-mobile: {$widget_text_typography_lineheight_mobile}em;
			}
        ";

		return $custom_css;
	}

	/**
	 * Frontend localized data
	 */
	public static function localized_js() {

		$localized_data = array(
			'site_url'         =>  home_url(),
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

		if ( 'page' === get_post_type() ) {
			$is_page = true;
		}
		
		$post_meta = get_post_meta( get_the_ID(), '_tutorstarter_schema', true );

		$localized_data = array(
			'is_post'        => $is_post,
			'is_page'        => $is_page,
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
