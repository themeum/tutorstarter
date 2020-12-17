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
use Tutor_Starter\Api\Customizer\Custom_Controls\Radio_Image_Control;
use Tutor_Starter\Api\Customizer\Custom_Controls\Toggle_Switch_Control;
use Tutor_Starter\Api\Customizer\Custom_Controls\Responsive_Range_Slider_Control;

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
			'qubelystarters_footer_section',
			array(
				'panel'       => 'qubelystarters_customizer_panel',
				'title'       => esc_html__( 'Footer', 'tutorstarter' ),
				'description' => esc_html__( 'Customize the footer', 'tutorstarter' ),
				'priority'    => 10,
			)
		);
		$wp_customize->add_setting(
			'footer_logo_toggle',
			array(
				'title'             => esc_html__( 'Show Footer Logo?', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => true,
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);
		$wp_customize->add_control(
			new Toggle_Switch_Control(
				$wp_customize,
				'footer_logo_toggle',
				array(
					'label'   => esc_html__( 'Show Footer Logo?', 'tutorstarter' ),
					'section' => 'qubelystarters_footer_section',
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
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'footer_logo',
				array(
					'label'           => esc_html__( 'Footer Bottom Logo', 'tutorstarter' ),
					'section'         => 'qubelystarters_footer_section',
					'active_callback' => 'control_active_callback_footer_logo',
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
					'section' => 'qubelystarters_footer_section',
					'choices' => array(
						'footer_one'   => array(
							'name'  => esc_html__( '3 Cols', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/three-columns.svg',
						),
						'footer_two'   => array(
							'name'  => esc_html__( '4 Cols', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/four-columns.svg',
						),
						'footer_three' => array(
							'name'  => esc_html__( '4 Cols Ext', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/four-columns-extended.svg',
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
				'default'           => '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'footer_widgets_bg_color',
				array(
					'label'   => esc_html__( 'Widgets Background Color', 'tutorstarter' ),
					'section' => 'qubelystarters_footer_section',
				)
			)
		);
		$wp_customize->add_setting(
			'footer_bottom_bg_color',
			array(
				'title'             => esc_html__( 'Footer Bottom BG Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'footer_bottom_bg_color',
				array(
					'label'   => esc_html__( 'Footer Bottom BG Color', 'tutorstarter' ),
					'section' => 'qubelystarters_footer_section',
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
					'section' => 'qubelystarters_footer_section',
				)
			)
		);
		$wp_customize->add_setting(
			'footer_widget_font_size',
			array(
				'title'             => esc_html__( 'Widget Title Font Size', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '{ "mobile": 16, "tablet": 16, "desktop": 18 }',
				'sanitize_callback' => 'sanitize_range_value',
			)
		);
		$wp_customize->add_control(
			new Responsive_Range_Slider_Control(
				$wp_customize,
				'footer_widget_font_size',
				array(
					'label'       => esc_html__( 'Widget Title Font Size', 'tutorstarter' ),
					'section'     => 'qubelystarters_footer_section',
					'input_attrs' => array(
						'min'        => 8,
						'max'        => 100,
						'units'      => array( 'px' ),
						'defaultVal' => array(
							'mobile'  => 16,
							'tablet'  => 16,
							'desktop' => 18,
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'footer_widget_font_weight',
			array(
				'title'             => esc_html__( 'Widget Title Font Weight', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 700,
				'sanitize_callback' => 'sanitize_select_radio',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_widget_font_weight',
				array(
					'label'   => esc_html__( 'Widget Title Font Weight', 'tutorstarter' ),
					'section' => 'qubelystarters_footer_section',
					'type'    => 'select',
					'choices' => array(
						100 => 100,
						300 => 300,
						400 => 400,
						500 => 500,
						700 => 700,
						900 => 900,
					),
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
					'section' => 'qubelystarters_footer_section',
				)
			)
		);
		$wp_customize->add_setting(
			'footer_bottom_text',
			array(
				'title'             => esc_html__( 'Footer Bottom Text', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '&copy; All rights reserved.',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_bottom_text',
				array(
					'label'   => esc_html__( 'Footer Bottom Text', 'tutorstarter' ),
					'section' => 'qubelystarters_footer_section',
				)
			)
		);
	}
}
