<?php
/**
 * Handles all footer customization
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Api\Customizer\Footer;

use WP_Customize_Control;
use WP_Customize_Color_Control;
use WP_Customize_Image_Control;
use Tutor_Starter\Api\Customizer\Custom_Controls\Typography_Control;
use Tutor_Starter\Api\Customizer\Custom_Controls\Radio_Image_Control;
use Tutor_Starter\Api\Customizer\Custom_Controls\Toggle_Switch_Control;

defined( 'ABSPATH' ) || exit;

/**
 * Footer customization class
 */
class Footer {

	/**
	 * Register
	 *
	 * @param WP_Customize_Manager $wp_customize theme customizer object.
	 */
	public function register( $wp_customize ) {

		$wp_customize->add_section(
			'tutorstarter_footer_section',
			array(
				'panel'       => 'tutorstarter_customizer_panel',
				'title'       => esc_html__( 'Footer', 'tutorstarter' ),
				'description' => esc_html__( 'Customize the footer', 'tutorstarter' ),
				'priority'    => 10,
			)
		);
		$wp_customize->add_setting(
			'footer_socialmedia_toggle',
			array(
				'title'             => esc_html__( 'Show Social Media Icons?', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => true,
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);
		$wp_customize->add_control(
			new Toggle_Switch_Control(
				$wp_customize,
				'footer_socialmedia_toggle',
				array(
					'label'           => esc_html__( 'Show Social Media Icons?', 'tutorstarter' ),
					'section'         => 'tutorstarter_footer_section',
					'active_callback' => 'control_active_callback_footer_layout',
				)
			)
		);
		$wp_customize->add_setting(
			'footer_logo',
			array(
				'title'             => esc_html__( 'Footer Bottom Logo', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'footer_logo',
			array(
				'selector'            => '.site-info',
				'container_inclusive' => true,
				'render_callback'     => function() {
					return true;
				},
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'footer_logo',
				array(
					'label'           => esc_html__( 'Footer Bottom Logo', 'tutorstarter' ),
					'section'         => 'tutorstarter_footer_section',
					'active_callback' => 'control_active_callback_footer_layout',
				)
			)
		);
		$wp_customize->add_setting(
			'footer_retina_logo',
			array(
				'title'             => esc_html__( 'Footer Retina Logo', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'footer_retina_logo',
			array(
				'selector'            => '.site-info',
				'container_inclusive' => true,
				'render_callback'     => function() {
					return true;
				},
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'footer_retina_logo',
				array(
					'label'           => esc_html__( 'Footer Retina Logo', 'tutorstarter' ),
					'section'         => 'tutorstarter_footer_section',
					'active_callback' => 'control_active_callback_footer_layout',
				)
			)
		);
		$wp_customize->add_setting(
			'footer_logo_trans',
			array(
				'title'             => esc_html__( 'Footer Transparent Logo', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'footer_logo_trans',
			array(
				'selector'            => '.site-info',
				'container_inclusive' => true,
				'render_callback'     => function() {
					return true;
				},
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'footer_logo_trans',
				array(
					'label'           => esc_html__( 'Footer Transparent Logo', 'tutorstarter' ),
					'section'         => 'tutorstarter_footer_section',
					'active_callback' => 'control_active_callback_footer_logo_trans',
				)
			)
		);
		$wp_customize->add_setting(
			'footer_retina_trans_logo',
			array(
				'title'             => esc_html__( 'Footer Transparent Retina Logo', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'footer_retina_trans_logo',
			array(
				'selector'            => '.site-info',
				'container_inclusive' => true,
				'render_callback'     => function() {
					return true;
				},
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'footer_retina_trans_logo',
				array(
					'label'           => esc_html__( 'Footer Transparent Retina Logo', 'tutorstarter' ),
					'section'         => 'tutorstarter_footer_section',
					'active_callback' => 'control_active_callback_footer_logo_trans',
				)
			)
		);
		$wp_customize->add_setting(
			'footer_type_select',
			array(
				'title'             => esc_html__( 'Select Footer Type', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 'footer_three',
				'sanitize_callback' => 'sanitize_select_radio',
			)
		);
		$wp_customize->add_control(
			new Radio_Image_Control(
				$wp_customize,
				'footer_type_select',
				array(
					'label'   => esc_html__( 'Select Footer Type', 'tutorstarter' ),
					'section' => 'tutorstarter_footer_section',
					'choices' => array(
						'footer_one'   => array(
							'name'  => esc_html__( 'Type 1', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/three-columns.svg',
						),
						'footer_two'   => array(
							'name'  => esc_html__( 'Type 2', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/four-columns.svg',
						),
						'footer_three' => array(
							'name'  => esc_html__( 'Type 3', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/four-columns-extended.svg',
						),
						'footer_four' => array(
							'name'  => esc_html__( 'Type 4', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/four-columns-extended-left.svg',
						),
						'footer_five' => array(
							'name'  => esc_html__( 'Type 5', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/four-columns-extended-left.svg',
						),
						'footer_six'   => array(
							'name'  => esc_html__( 'Type 6', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/single-column.svg',
						),
					),
				)
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'footer_type_select',
			array(
				'selector'            => '.footer-widgets',
				'container_inclusive' => true,
				'render_callback'     => function() {
					return get_template_part( 'views/partials/footer/footer_type_select' );
				},
			)
		);
		$wp_customize->add_setting(
			'footer_widgets_bg_color',
			array(
				'title'             => esc_html__( 'Widgets Background Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#1E1E2C',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'footer_widgets_bg_color',
				array(
					'label'           => esc_html__( 'Widgets Background Color', 'tutorstarter' ),
					'section'         => 'tutorstarter_footer_section',
					'active_callback' => 'control_active_callback_footer_layout',
				)
			)
		);
		$wp_customize->add_setting(
			'footer_bottom_bg_color',
			array(
				'title'             => esc_html__( 'Footer Bottom BG Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#1E1E2C',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'footer_bottom_bg_color',
				array(
					'label'   => esc_html__( 'Footer Bottom BG Color', 'tutorstarter' ),
					'section' => 'tutorstarter_footer_section',
					'active_callback' => 'control_active_callback_footer_layout',
				)
			)
		);
		$wp_customize->add_setting(
			'footer_widgets_text_color',
			array(
				'title'             => esc_html__( 'Widgets Text Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'footer_widgets_text_color',
				array(
					'label'   => esc_html__( 'Widgets Text Color', 'tutorstarter' ),
					'section' => 'tutorstarter_footer_section',
					'active_callback' => 'control_active_callback_footer_layout',
				)
			)
		);
		$wp_customize->add_setting(
			'footer_widget_title_typography',
			array(
				'title'             => esc_html__( 'Widget Title Typography', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default' => array(
					'textTransform' => 'none',
					'fontWeight'    => 700,
					'fontSize'      => array(
						'mobile'  => 16,
						'tablet'  => 16,
						'desktop' => 18,
					),
					'lineHeight' => array(
						'mobile'  => 1.78,
						'tablet'  => 1.78,
						'desktop' => 1.78,
					),
				),
				'sanitize_callback' => 'sanitize_select_range_value',
			)
		);
		$wp_customize->add_control(
			new Typography_Control(
				$wp_customize,
				'footer_widget_title_typography',
				array(
					'label'       => esc_html__( 'Widget Title Typography', 'tutorstarter' ),
					'section'     => 'tutorstarter_footer_section',
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
							'weight_default'  => 700,
							'text_transform'  => 'none',
							'font_sizes' => array(
								'mobile'  => 16,
								'tablet'  => 16,
								'desktop' => 18,
							),
							'line_heights' => array(
								'mobile'  => 1.78,
								'tablet'  => 1.78,
								'desktop' => 1.78,
							)
						),
					),
					'active_callback' => 'control_active_callback_footer_layout',
				)
			)
		);
		$wp_customize->add_setting(
			'footer_widget_text_typography',
			array(
				'title'             => esc_html__( 'Widget Text Typography', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default' => array(
					'textTransform' => 'none',
					'fontWeight'    => 400,
					'fontSize'      => array(
						'mobile'  => 16,
						'tablet'  => 16,
						'desktop' => 16,
					),
					'lineHeight' => array(
						'mobile'  => 1.78,
						'tablet'  => 1.78,
						'desktop' => 1.78,
					),
				),
				'sanitize_callback' => 'sanitize_select_range_value',
			)
		);
		$wp_customize->add_control(
			new Typography_Control(
				$wp_customize,
				'footer_widget_text_typography',
				array(
					'label'       => esc_html__( 'Widget Text Typography', 'tutorstarter' ),
					'section'     => 'tutorstarter_footer_section',
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
								'mobile'  => 16,
								'tablet'  => 16,
								'desktop' => 16,
							),
							'line_heights' => array(
								'mobile'  => 1.78,
								'tablet'  => 1.78,
								'desktop' => 1.78,
							)
						),
					),
					'active_callback' => 'control_active_callback_footer_layout',
				)
			)
		);
		$wp_customize->add_setting(
			'footer_bottom_text_color',
			array(
				'title'             => esc_html__( 'Footer Bottom Text Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'footer_bottom_text_color',
				array(
					'label'   => esc_html__( 'Footer Bottom Text Color', 'tutorstarter' ),
					'section' => 'tutorstarter_footer_section',
					'active_callback' => 'control_active_callback_footer_layout',
				)
			)
		);
		$wp_customize->add_setting(
			'footer_bottom_text',
			array(
				'title'             => esc_html__( 'Footer Bottom Text', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 'All rights reserved.',
				'sanitize_callback' => 'wp_kses_post',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_bottom_text',
				array(
					'label'   => esc_html__( 'Footer Bottom Text', 'tutorstarter' ),
					'section' => 'tutorstarter_footer_section',
				)
			)
		);
	}
}
