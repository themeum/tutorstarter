<?php
/**
 * Handles header customization
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Api\Customizer\Header;

use WP_Customize_Control;
use WP_Customize_Color_Control;
use WP_Customize_Image_Control;
use Tutor_Starter\Api\Customizer\Custom_Controls\Color_Control;
use Tutor_Starter\Api\Customizer\Custom_Controls\Typography_Control;
use Tutor_Starter\Api\Customizer\Custom_Controls\Radio_Image_Control;
use Tutor_Starter\Api\Customizer\Custom_Controls\Toggle_Switch_Control;

defined( 'ABSPATH' ) || exit;

/**
 * Header class
 */
class Header {

	/**
	 * Register
	 *
	 * @param WP_Customize_Manager $wp_customize theme customizer object.
	 */
	public function register( $wp_customize ) {

		$wp_customize->add_section(
			'tutorstarter_header_section',
			array(
				'panel'       => 'tutorstarter_customizer_panel',
				'title'       => esc_html__( 'Header', 'tutorstarter' ),
				'description' => esc_html__( 'Customize the header', 'tutorstarter' ),
				'priority'    => 5,
			)
		);

		// Overriding default controls.
		$wp_customize->get_control( 'custom_logo' )->section   = 'tutorstarter_header_section';
		$wp_customize->get_control( 'custom_logo' )->transport = 'postMessage';

		// Selective refresh for custom_logo.
		$wp_customize->selective_refresh->add_partial(
			'custom_logo',
			array(
				'selector'            => '.navbar-brand',
				'container_inclusive' => true,
				'render_callback'     => function() {
					return the_custom_logo();
				},
			)
		);
		$wp_customize->add_setting(
			'transparent_logo',
			array(
				'title'             => esc_html__( 'Transparent Logo', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'transparent_logo',
			array(
				'selector'            => '.navbar-brand',
				'container_inclusive' => true,
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'transparent_logo',
				array(
					'label'           => esc_html__( 'Transparent Logo', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback_transparent',
				)
			)
		);
		$wp_customize->add_setting(
			'retina_logo',
			array(
				'title'             => esc_html__( 'Retina Logo', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'retina_logo',
			array(
				'selector'            => '.navbar-brand',
				'container_inclusive' => true,
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'retina_logo',
				array(
					'label'           => esc_html__( 'Retina Logo', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback_std_menu',
				)
			)
		);
		$wp_customize->add_setting(
			'retina_trans_logo',
			array(
				'title'             => esc_html__( 'Transparent Retina Logo', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'retina_trans_logo',
			array(
				'selector'            => '.navbar-brand',
				'container_inclusive' => true,
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'retina_trans_logo',
				array(
					'label'           => esc_html__( 'Transparent Retina Logo', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback_transparent',
				)
			)
		);
		$wp_customize->add_setting(
			'header_type_select',
			array(
				'title'             => esc_html__( 'Select Header Type', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 'header_default',
				'sanitize_callback' => 'sanitize_select_radio',
			)
		);
		$wp_customize->add_control(
			new Radio_Image_Control(
				$wp_customize,
				'header_type_select',
				array(
					'label'   => esc_html__( 'Select Header Type', 'tutorstarter' ),
					'section' => 'tutorstarter_header_section',
					'choices' => array(
						'header_default'   => array(
							'name'  => esc_html__( 'Header Default', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/header-default.svg',
						),
						'header_transparent'   => array(
							'name'  => esc_html__( 'Header Transparent', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/header-transparent.svg',
						),
						'header_right'   => array(
							'name'  => esc_html__( 'Header with Search Bar', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/header-right.svg',
						),
						'header_fullwidth'   => array(
							'name'  => esc_html__( 'Header Fullwidth', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/header-full-width.svg',
						),
						'header_fullwidth_center'   => array(
							'name'  => esc_html__( 'Header Fullwidth Center', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/header-fullwidth-center.svg',
						),
					),
				)
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'header_type_select',
			array(
				'selector'            => 'header',
				'container_inclusive' => true,
			)
		);
		$wp_customize->add_setting(
			'menu_bg_color',
			array(
				'title'             => esc_html__( 'Header BG Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'menu_bg_color',
				array(
					'label'   => esc_html__( 'Header BG Color', 'tutorstarter' ),
					'section' => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback_std_menu',
				)
			)
		);
		$wp_customize->add_setting(
			'menu_link_color',
			array(
				'title'             => esc_html__( 'Menu Link Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#57586E',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'menu_link_color',
				array(
					'label'           => esc_html__( 'Menu Link Color', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback_std_menu',
				)
			)
		);
		$wp_customize->add_setting(
			'menu_link_color_trans',
			array(
				'title'             => esc_html__( 'Transparent Menu Link Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'menu_link_color_trans',
				array(
					'label'           => esc_html__( 'Transparent Menu Link Color', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback_transparent',
				)
			)
		);
		$wp_customize->add_setting(
			'menu_link_active_color',
			array(
				'title'             => esc_html__( 'Menu Link Active and Hover Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#175cff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'menu_link_active_color',
			array(
				'selector'            => '.navbar-nav .menu-item a',
				'container_inclusive' => true,
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'menu_link_active_color',
				array(
					'label'           => esc_html__( 'Menu Link Active and Hover Color', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback_std_menu',
				)
			)
		);
		$wp_customize->add_setting(
			'menu_link_active_color_trans',
			array(
				'title'             => esc_html__( 'Transparent Link Active and Hover Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'menu_link_active_color_trans',
			array(
				'selector'            => '.header-transparent .navbar-nav .menu-item a',
				'container_inclusive' => true,
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'menu_link_active_color_trans',
				array(
					'label'           => esc_html__( 'Transparent Link Active and Hover Color', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback_transparent',
				)
			)
		);
		$wp_customize->add_setting(
			'header_link_typography',
			array(
				'title'             => esc_html__( 'Menu Typography', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => array(
					'textTransform' => 'none',
					'fontWeight'    => 400,
					'fontSize'      => array(
						'mobile'  => 13,
						'tablet'  => 13,
						'desktop' => 16,
					),
					'lineHeight' => array(
						'mobile'  => 1.2,
						'tablet'  => 1.2,
						'desktop' => 1.2,
					),
				),
				'sanitize_callback' => 'sanitize_select_range_value',
			)
		);
		$wp_customize->add_control(
			new Typography_Control(
				$wp_customize,
				'header_link_typography',
				array(
					'label'       => esc_html__( 'Menu Typography', 'tutorstarter' ),
					'section'     => 'tutorstarter_header_section',
					'input_attrs' => array(
						'font_sizes' => array(
							'min'        => 8,
							'max'        => 200,
							'units'      => array( 'px' )
						),
						'line_heights' => array(
							'min'        => 0,
							'max'        => 50,
							'units'      => array( 'em' )
						),
						'defaultParams' => array(
							'weight_default'  => 400,
							'text_transform'  => 'none',
							'font_sizes' => array(
								'mobile'  => 13,
								'tablet'  => 13,
								'desktop' => 16,
							),
							'line_heights' => array(
								'mobile'  => 1.2,
								'tablet'  => 1.2,
								'desktop' => 1.2,
							)
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'header_search_toggle',
			array(
				'title'             => esc_html__( 'Show Search Icon?', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => true,
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);
		$wp_customize->add_control(
			new Toggle_Switch_Control(
				$wp_customize,
				'header_search_toggle',
				array(
					'label'           => esc_html__( 'Show Search Icon?', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback_transparent',
				)
			)
		);
		$wp_customize->add_setting(
			'header_sticky_toggle',
			array(
				'title'             => esc_html__( 'Make Header Sticky?', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => false,
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'header_sticky_toggle',
			array(
				'selector'            => 'header.header-sticky',
				'container_inclusive' => true,
			)
		);
		$wp_customize->add_control(
			new Toggle_Switch_Control(
				$wp_customize,
				'header_sticky_toggle',
				array(
					'label'           => esc_html__( 'Make Header Sticky?', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback_transparent',
				)
			)
		);
		$wp_customize->add_setting(
			'header_sticky_bg_color',
			array(
				'title'             => esc_html__( 'Sticky Header BG Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => array(
					'rgb' => array(
						'r' => 4,
						'g' => 42,
						'b' => 132,
						'a' => 0.7,
					),
				),
				'sanitize_callback' => 'tutorstarter_sanitize_color',
			)
		);
		$wp_customize->add_control(
			new Color_Control(
				$wp_customize,
				'header_sticky_bg_color',
				array(
					'label'           => esc_html__( 'Sticky Header BG Color', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback_sticky_header',
				)
			)
		);
		$wp_customize->add_setting(
			'cart_color',
			array(
				'title'             => esc_html__( 'Cart Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#1950D1',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'cart_color',
				array(
					'label'           => esc_html__( 'Cart Color', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_cart_callback',
				)
			)
		);
		$wp_customize->add_setting(
			'cart_color_trans',
			array(
				'title'             => esc_html__( 'Transparent Cart Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'cart_color_trans',
				array(
					'label'           => esc_html__( 'Transparent Cart Color', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_cart_trans_callback',
				)
			)
		);
		$wp_customize->add_setting(
			'cart_btn_toggle',
			array(
				'title'             => esc_html__( 'Display cart button when product added?', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => false,
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);
		$wp_customize->add_control(
			new Toggle_Switch_Control(
				$wp_customize,
				'cart_btn_toggle',
				array(
					'label'           => esc_html__( 'Display cart button when product added?', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback',
				)
			)
		);
		$wp_customize->add_setting(
			'cta_text_toggle',
			array(
				'title'             => esc_html__( 'Show Starter Button?', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => true,
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);
		$wp_customize->add_control(
			new Toggle_Switch_Control(
				$wp_customize,
				'cta_text_toggle',
				array(
					'label'           => esc_html__( 'Show Starter Button?', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback',
				)
			)
		);
		$wp_customize->add_setting(
			'cta_background',
			array(
				'title'             => esc_html__( 'Button BG Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'cta_background',
				array(
					'label'           => esc_html__( 'Button BG Color', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback_non_trans',
				)
			)
		);
		$wp_customize->add_setting(
			'background_trans_cta',
			array(
				'title'             => esc_html__( 'Transparent Btn BG Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => array(
					'rgb' => array(
						'r' => 25,
						'g' => 80,
						'b' => 209,
						'a' => 1,
					),
				),
				'sanitize_callback' => 'tutorstarter_sanitize_color',
			)
		);
		$wp_customize->add_control(
			new Color_Control(
				$wp_customize,
				'background_trans_cta',
				array(
					'label'           => esc_html__( 'Transparent Btn BG Color', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback_transparent',
				)
			)
		);
		$wp_customize->add_setting(
			'cta_border_color',
			array(
				'title'             => esc_html__( 'Border Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#1539e9',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'cta_border_color',
				array(
					'label'           => esc_html__( 'Border Color', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback_non_trans',
				)
			)
		);
		$wp_customize->add_setting(
			'cta_border_color_trans',
			array(
				'title'             => esc_html__( 'Transparent Border Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#1950D1',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'cta_border_color_trans',
				array(
					'label'           => esc_html__( 'Transparent Border Color', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback_transparent',
				)
			)
		);
		$wp_customize->add_setting(
			'cta_border_width',
			array(
				'title'             => esc_html__( 'Border Width', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 1,
				'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'cta_border_width',
				array(
					'label'           => esc_html__( 'Border Width', 'tutorstarter' ),
					'type'            => 'number',
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback',
				)
			)
		);
		$wp_customize->add_setting(
			'cta_border_radius',
			array(
				'title'             => esc_html__( 'Border Radius', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 50,
				'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'cta_border_radius',
				array(
					'label'           => esc_html__( 'Border Radius', 'tutorstarter' ),
					'type'            => 'number',
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback',
				)
			)
		);
		$wp_customize->add_setting(
			'cta_color',
			array(
				'title'             => esc_html__( 'Button Text Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#1539e9',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'cta_color',
				array(
					'label'           => esc_html__( 'Button Text Color', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback_non_trans',
				)
			)
		);
		$wp_customize->add_setting(
			'cta_color_trans',
			array(
				'title'             => esc_html__( 'Transparent Button Text Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'cta_color_trans',
				array(
					'label'           => esc_html__( 'Transparent Button Text Color', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback_transparent',
				)
			)
		);
		$wp_customize->add_setting(
			'cta_text',
			array(
				'title'             => esc_html__( 'Button Text', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 'Getting Started',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'cta_text',
				array(
					'label'           => esc_html__( 'Button Text', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'type'            => 'text',
					'active_callback' => 'control_active_callback',
				)
			)
		);
		$wp_customize->add_setting(
			'cta_text_link',
			array(
				'title'             => esc_html__( 'Button Link', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'cta_text_link',
				array(
					'label'           => esc_html__( 'Button Link', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'type'            => 'text',
					'active_callback' => 'control_active_callback',
				)
			)
		);
		$wp_customize->add_setting(
			'cta_font_typography',
			array(
				'title'             => esc_html__( 'Button Typography', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => array(
					'textTransform' => 'none',
					'fontWeight'    => 400,
					'fontSize'      => array(
						'mobile'  => 13,
						'tablet'  => 13,
						'desktop' => 16,
					),
					'lineHeight' => array(
						'mobile'  => 1.2,
						'tablet'  => 1.2,
						'desktop' => 1.2,
					),
				),
				'sanitize_callback' => 'sanitize_select_range_value',
			)
		);
		$wp_customize->add_control(
			new Typography_Control(
				$wp_customize,
				'cta_font_typography',
				array(
					'label'           => esc_html__( 'Button Typography', 'tutorstarter' ),
					'section'         => 'tutorstarter_header_section',
					'active_callback' => 'control_active_callback',
					'input_attrs' => array(
						'font_sizes' => array(
							'min'        => 8,
							'max'        => 200,
							'units'      => array( 'px' )
						),
						'line_heights' => array(
							'min'        => 0,
							'max'        => 50,
							'units'      => array( 'em' )
						),
						'defaultParams' => array(
							'weight_default'  => 400,
							'text_transform'  => 'none',
							'font_sizes' => array(
								'mobile'  => 13,
								'tablet'  => 13,
								'desktop' => 16,
							),
							'line_heights' => array(
								'mobile'  => 1.2,
								'tablet'  => 1.2,
								'desktop' => 1.2,
							)
						),
					),
				)
			)
		);
	}
}
