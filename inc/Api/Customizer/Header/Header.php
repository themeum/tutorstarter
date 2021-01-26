<?php
/**
 * Handles header customization
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Api\Customizer\Header;

use WP_Customize_Control;
use WP_Customize_Color_Control;
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
				'selector'            => '.site-branding',
				'container_inclusive' => true,
				'render_callback'     => function() {
					return the_custom_logo();
				},
			)
		);
		$wp_customize->add_setting(
			'header_type_select',
			array(
				'title'             => esc_html__( 'Select Header Type', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 'header_one',
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
						'header_one'   => array(
							'name'  => esc_html__( 'Header Fullwidth', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/header-fullwidth.svg',
						),
						'header_one_trans'   => array(
							'name'  => esc_html__( 'Header Fullwidth Transparent', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/header-fullwidth.svg',
						),
						'header_two'   => array(
							'name'  => esc_html__( 'Header Standard', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/header-standard.svg',
						),
						'header_three' => array(
							'name'  => esc_html__( 'Header Transparent', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/header-transparent.svg',
						),
						'header_four'  => array(
							'name'  => esc_html__( 'Header Centered Logo', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/logo-center.svg',
						),
					),
				)
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'header_type_select',
			array(
				'selector'            => '#masthead',
				'container_inclusive' => true,
				'render_callback'     => function() {
					return get_template_part( 'views/partials/header/header_type_select' );
				},
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
					'label'   => esc_html__( 'Menu Link Color', 'tutorstarter' ),
					'section' => 'tutorstarter_header_section',
				)
			)
		);
		$wp_customize->add_setting(
			'menu_link_active_color',
			array(
				'title'             => esc_html__( 'Menu Link Active and Hover Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#175CFF',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'menu_link_active_color',
				array(
					'label'   => esc_html__( 'Menu Link Active and Hover Color', 'tutorstarter' ),
					'section' => 'tutorstarter_header_section',
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
						'mobile'  => 0,
						'tablet'  => 0,
						'desktop' => 0,
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
							'max'        => 100,
							'units'      => array( 'px' )
						),
						'line_heights' => array(
							'min'        => 0,
							'max'        => 100,
							'units'      => array( 'px' )
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
								'mobile'  => 0,
								'tablet'  => 0,
								'desktop' => 0,
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
					'active_callback' => 'control_active_callback_search',
				)
			)
		);
		$wp_customize->add_setting(
			'cart_color',
			array(
				'title'             => esc_html__( 'Cart Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#57586E',
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
			'cta_text_toggle',
			array(
				'title'             => esc_html__( 'Show Button?', 'tutorstarter' ),
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
					'label'           => esc_html__( 'Show Button?', 'tutorstarter' ),
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
					'active_callback' => 'control_active_callback',
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
				'default'           => '#ffffff',
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
					'active_callback' => 'control_active_callback',
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
						'mobile'  => 0,
						'tablet'  => 0,
						'desktop' => 0,
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
							'max'        => 100,
							'units'      => array( 'px' )
						),
						'line_heights' => array(
							'min'        => 0,
							'max'        => 100,
							'units'      => array( 'px' )
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
								'mobile'  => 0,
								'tablet'  => 0,
								'desktop' => 0,
							)
						),
					),
				)
			)
		);
	}
}
