<?php
/**
 * Handles typography customization
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Api\Customizer\General;

use WP_Customize_Control;
use Tutor_Starter\Api\Customizer\Custom_Controls\Typography_Control;
use Tutor_Starter\Api\Customizer\Custom_Controls\Font_Family_Control;
use Tutor_Starter\Api\Customizer\Custom_Controls\Responsive_Range_Slider_Control;

defined( 'ABSPATH' ) || exit;

/**
 * Typography class
 */
class Typography {

	/**
	 * Register
	 */
	public function register( $wp_customize ) {
		$wp_customize->add_section(
			'tutorstarter_typography_section',
			array(
				'panel'       => 'tutorstarter_customizer_panel',
				'title'       => esc_html__( 'Typography', 'tutorstarter' ),
				'description' => esc_html__( 'Typography Settings', 'tutorstarter' ),
				'priority'    => 3,
			)
		);
		$wp_customize->add_setting(
			'body_font',
			array(
				'title'             => esc_html__( 'Body Typography', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 'Karla',
				'sanitize_callback' => 'sanitize_fonts',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'body_font',
			array(
				'selector'            => 'body',
				'container_inclusive' => false,
				'render_callback'     => '__return_true',
			)
		);
		$wp_customize->add_control(
			new Font_Family_Control(
				$wp_customize,
				'body_font',
				array(
					'label'   => esc_html__( 'Body Typography', 'tutorstarter' ),
					'section' => 'tutorstarter_typography_section',
				)
			)
		);

		// Body Typography
		$wp_customize->add_setting(
			'body_typography',
			array(
				'title'     => esc_html__( 'Body Typography', 'tutorstarter' ),
				'transport' => 'postMessage',
				'default' => array(
					'fontWeight'        => 700,
					'textTransform'     => 'none',
				),
			)
		);
		$wp_customize->add_control(
			new Typography_Control(
				$wp_customize,
				'body_typography',
				array(
					'label'       => esc_html__( 'Body Typography', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
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
							'weight_default'  => 700,
							'text_transform'  => 'none',
							'font_sizes' => array(
								'mobile'  => 13,
								'tablet'  => 13,
								'desktop' => 16,
							),
							'line_heights' => array(
								'mobile'  => 22,
								'tablet'  => 22,
								'desktop' => 25,
							)
						),
					),
				)
			)
		);

		// Heading typography.
		$wp_customize->add_setting(
			'heading_font',
			array(
				'title'             => esc_html__( 'H1 - H6 Font Family', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 'Karla',
				'sanitize_callback' => 'sanitize_fonts',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'heading_font',
			array(
				'selector'            => 'h1, h2, h3, h4, h5, h6',
				'container_inclusive' => false,
				'render_callback'     => '__return_true',
			)
		);
		$wp_customize->add_control(
			new Font_Family_Control(
				$wp_customize,
				'heading_font',
				array(
					'label'   => esc_html__( 'H1 - H6 Font Family', 'tutorstarter' ),
					'section' => 'tutorstarter_typography_section',
				)
			)
		);
		$wp_customize->add_setting(
			'h1_font_size',
			array(
				'title'             => esc_html__( 'H1 Font Size', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '{ "mobile": 42, "tablet": 42, "desktop": 84 }',
				'sanitize_callback' => 'sanitize_range_value',
			)
		);
		$wp_customize->add_control(
			new Responsive_Range_Slider_Control(
				$wp_customize,
				'h1_font_size',
				array(
					'label'       => esc_html__( 'H1 Font Size', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
					'input_attrs' => array(
						'min'        => 8,
						'max'        => 100,
						'units'      => array( 'px' ),
						'defaultVal' => array(
							'mobile'  => 42,
							'tablet'  => 42,
							'desktop' => 84,
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h1_font_weight',
			array(
				'title'             => esc_html__( 'H1 Font Weight', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 700,
				'sanitize_callback' => 'sanitize_select_radio',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'h1_font_weight',
				array(
					'label'   => esc_html__( 'H1 Font Weight', 'tutorstarter' ),
					'section' => 'tutorstarter_typography_section',
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
			'h1_font_transform',
			array(
				'title'             => esc_html__( 'H1 Text Transform', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 'none',
				'sanitize_callback' => 'sanitize_select_radio',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'h1_font_transform',
				array(
					'label'   => esc_html__( 'H1 Text Transform', 'tutorstarter' ),
					'section' => 'tutorstarter_typography_section',
					'type'    => 'select',
					'choices' => array(
						'none'       => esc_html__( 'None', 'tutorstarter' ),
						'capitalize' => esc_html__( 'Capitalize', 'tutorstarter' ),
						'lowercase'  => esc_html__( 'Lowercase', 'tutorstarter' ),
						'uppercase'  => esc_html__( 'Uppercase', 'tutorstarter' ),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h1_font_lineheight',
			array(
				'title'             => esc_html__( 'H1 Line Height', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '{ "mobile": 42, "tablet": 42, "desktop": 84 }',
				'sanitize_callback' => 'sanitize_range_value',
			)
		);
		$wp_customize->add_control(
			new Responsive_Range_Slider_Control(
				$wp_customize,
				'h1_font_lineheight',
				array(
					'label'       => esc_html__( 'H1 Line Height', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
					'input_attrs' => array(
						'min'        => 0,
						'max'        => 100,
						'units'      => array( 'px' ),
						'defaultVal' => array(
							'mobile'  => 42,
							'tablet'  => 42,
							'desktop' => 84,
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h2_font_size',
			array(
				'title'             => esc_html__( 'H2 Font Size', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '{ "mobile": 30, "tablet": 30, "desktop": 48 }',
				'sanitize_callback' => 'sanitize_range_value',
			)
		);
		$wp_customize->add_control(
			new Responsive_Range_Slider_Control(
				$wp_customize,
				'h2_font_size',
				array(
					'label'       => esc_html__( 'H2 Font Size', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
					'input_attrs' => array(
						'min'        => 8,
						'max'        => 100,
						'units'      => array( 'px' ),
						'defaultVal' => array(
							'mobile'  => 30,
							'tablet'  => 30,
							'desktop' => 48,
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h2_font_weight',
			array(
				'title'             => esc_html__( 'H2 Font Weight', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 700,
				'sanitize_callback' => 'sanitize_select_radio',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'h2_font_weight',
				array(
					'label'   => esc_html__( 'H2 Font Weight', 'tutorstarter' ),
					'section' => 'tutorstarter_typography_section',
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
			'h2_font_transform',
			array(
				'title'             => esc_html__( 'H2 Text Transform', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 'none',
				'sanitize_callback' => 'sanitize_select_radio',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'h2_font_transform',
				array(
					'label'   => esc_html__( 'H2 Text Transform', 'tutorstarter' ),
					'section' => 'tutorstarter_typography_section',
					'type'    => 'select',
					'choices' => array(
						'none'       => esc_html__( 'None', 'tutorstarter' ),
						'capitalize' => esc_html__( 'Capitalize', 'tutorstarter' ),
						'lowercase'  => esc_html__( 'Lowercase', 'tutorstarter' ),
						'uppercase'  => esc_html__( 'Uppercase', 'tutorstarter' ),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h2_font_lineheight',
			array(
				'title'             => esc_html__( 'H2 Line Height', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '{ "mobile": 30, "tablet": 30, "desktop": 60 }',
				'sanitize_callback' => 'sanitize_range_value',
			)
		);
		$wp_customize->add_control(
			new Responsive_Range_Slider_Control(
				$wp_customize,
				'h2_font_lineheight',
				array(
					'label'       => esc_html__( 'H2 Line Height', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
					'input_attrs' => array(
						'min'        => 0,
						'max'        => 100,
						'units'      => array( 'px' ),
						'defaultVal' => array(
							'mobile'  => 30,
							'tablet'  => 30,
							'desktop' => 60,
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h3_font_size',
			array(
				'title'             => esc_html__( 'H3 Font Size', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '{ "mobile": 24, "tablet": 24, "desktop": 36 }',
				'sanitize_callback' => 'sanitize_range_value',
			)
		);
		$wp_customize->add_control(
			new Responsive_Range_Slider_Control(
				$wp_customize,
				'h3_font_size',
				array(
					'label'       => esc_html__( 'H3 Font Size', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
					'input_attrs' => array(
						'min'        => 8,
						'max'        => 100,
						'units'      => array( 'px' ),
						'defaultVal' => array(
							'mobile'  => 24,
							'tablet'  => 24,
							'desktop' => 36,
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h3_font_weight',
			array(
				'title'             => esc_html__( 'H3 Font Weight', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 700,
				'sanitize_callback' => 'sanitize_select_radio',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'h3_font_weight',
				array(
					'label'   => esc_html__( 'H3 Font Weight', 'tutorstarter' ),
					'section' => 'tutorstarter_typography_section',
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
			'h3_font_transform',
			array(
				'title'             => esc_html__( 'H3 Text Transform', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 'none',
				'sanitize_callback' => 'sanitize_select_radio',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'h3_font_transform',
				array(
					'label'   => esc_html__( 'H3 Text Transform', 'tutorstarter' ),
					'section' => 'tutorstarter_typography_section',
					'type'    => 'select',
					'choices' => array(
						'none'       => esc_html__( 'None', 'tutorstarter' ),
						'capitalize' => esc_html__( 'Capitalize', 'tutorstarter' ),
						'lowercase'  => esc_html__( 'Lowercase', 'tutorstarter' ),
						'uppercase'  => esc_html__( 'Uppercase', 'tutorstarter' ),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h3_font_lineheight',
			array(
				'title'             => esc_html__( 'H3 Line Height', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '{ "mobile": 24, "tablet": 24, "desktop": 48 }',
				'sanitize_callback' => 'sanitize_range_value',
			)
		);
		$wp_customize->add_control(
			new Responsive_Range_Slider_Control(
				$wp_customize,
				'h3_font_lineheight',
				array(
					'label'       => esc_html__( 'H3 Line Height', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
					'input_attrs' => array(
						'min'        => 0,
						'max'        => 100,
						'units'      => array( 'px' ),
						'defaultVal' => array(
							'mobile'  => 24,
							'tablet'  => 24,
							'desktop' => 48,
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h4_font_size',
			array(
				'title'             => esc_html__( 'H4 Font Size', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '{ "mobile": 20, "tablet": 20, "desktop": 24 }',
				'sanitize_callback' => 'sanitize_range_value',
			)
		);
		$wp_customize->add_control(
			new Responsive_Range_Slider_Control(
				$wp_customize,
				'h4_font_size',
				array(
					'label'       => esc_html__( 'H4 Font Size', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
					'input_attrs' => array(
						'min'        => 8,
						'max'        => 100,
						'units'      => array( 'px' ),
						'defaultVal' => array(
							'mobile'  => 20,
							'tablet'  => 20,
							'desktop' => 24,
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h4_font_weight',
			array(
				'title'             => esc_html__( 'H4 Font Weight', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 700,
				'sanitize_callback' => 'sanitize_select_radio',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'h4_font_weight',
				array(
					'label'   => esc_html__( 'H4 Font Weight', 'tutorstarter' ),
					'section' => 'tutorstarter_typography_section',
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
			'h4_font_transform',
			array(
				'title'             => esc_html__( 'H4 Text Transform', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 'none',
				'sanitize_callback' => 'sanitize_select_radio',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'h4_font_transform',
				array(
					'label'   => esc_html__( 'H4 Text Transform', 'tutorstarter' ),
					'section' => 'tutorstarter_typography_section',
					'type'    => 'select',
					'choices' => array(
						'none'       => esc_html__( 'None', 'tutorstarter' ),
						'capitalize' => esc_html__( 'Capitalize', 'tutorstarter' ),
						'lowercase'  => esc_html__( 'Lowercase', 'tutorstarter' ),
						'uppercase'  => esc_html__( 'Uppercase', 'tutorstarter' ),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h4_font_lineheight',
			array(
				'title'             => esc_html__( 'H4 Line Height', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '{ "mobile": 22, "tablet": 22, "desktop": 36 }',
				'sanitize_callback' => 'sanitize_range_value',
			)
		);
		$wp_customize->add_control(
			new Responsive_Range_Slider_Control(
				$wp_customize,
				'h4_font_lineheight',
				array(
					'label'       => esc_html__( 'H4 Line Height', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
					'input_attrs' => array(
						'min'        => 0,
						'max'        => 100,
						'units'      => array( 'px' ),
						'defaultVal' => array(
							'mobile'  => 22,
							'tablet'  => 22,
							'desktop' => 36,
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h5_font_size',
			array(
				'title'             => esc_html__( 'H5 Font Size', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '{ "mobile": 16, "tablet": 16, "desktop": 18 }',
				'sanitize_callback' => 'sanitize_range_value',
			)
		);
		$wp_customize->add_control(
			new Responsive_Range_Slider_Control(
				$wp_customize,
				'h5_font_size',
				array(
					'label'       => esc_html__( 'H5 Font Size', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
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
			'h5_font_weight',
			array(
				'title'             => esc_html__( 'H5 Font Weight', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 700,
				'sanitize_callback' => 'sanitize_select_radio',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'h5_font_weight',
				array(
					'label'   => esc_html__( 'H5 Font Weight', 'tutorstarter' ),
					'section' => 'tutorstarter_typography_section',
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
			'h5_font_transform',
			array(
				'title'             => esc_html__( 'H5 Text Transform', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 'none',
				'sanitize_callback' => 'sanitize_select_radio',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'h5_font_transform',
				array(
					'label'   => esc_html__( 'H5 Text Transform', 'tutorstarter' ),
					'section' => 'tutorstarter_typography_section',
					'type'    => 'select',
					'choices' => array(
						'none'       => esc_html__( 'None', 'tutorstarter' ),
						'capitalize' => esc_html__( 'Capitalize', 'tutorstarter' ),
						'lowercase'  => esc_html__( 'Lowercase', 'tutorstarter' ),
						'uppercase'  => esc_html__( 'Uppercase', 'tutorstarter' ),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h5_font_lineheight',
			array(
				'title'             => esc_html__( 'H5 Line Height', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '{ "mobile": 20, "tablet": 20, "desktop": 24 }',
				'sanitize_callback' => 'sanitize_range_value',
			)
		);
		$wp_customize->add_control(
			new Responsive_Range_Slider_Control(
				$wp_customize,
				'h5_font_lineheight',
				array(
					'label'       => esc_html__( 'H5 Line Height', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
					'input_attrs' => array(
						'min'        => 0,
						'max'        => 100,
						'units'      => array( 'px' ),
						'defaultVal' => array(
							'mobile'  => 20,
							'tablet'  => 20,
							'desktop' => 24,
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h6_font_size',
			array(
				'title'             => esc_html__( 'H6 Font Size', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '{ "mobile": 15, "tablet": 15, "desktop": 16 }',
				'sanitize_callback' => 'sanitize_range_value',
			)
		);
		$wp_customize->add_control(
			new Responsive_Range_Slider_Control(
				$wp_customize,
				'h6_font_size',
				array(
					'label'       => esc_html__( 'H6 Font Size', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
					'input_attrs' => array(
						'min'        => 8,
						'max'        => 100,
						'units'      => array( 'px' ),
						'defaultVal' => array(
							'mobile'  => 15,
							'tablet'  => 15,
							'desktop' => 16,
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h6_font_weight',
			array(
				'title'             => esc_html__( 'H6 Font Weight', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 700,
				'sanitize_callback' => 'sanitize_select_radio',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'h6_font_weight',
				array(
					'label'   => esc_html__( 'H6 Font Weight', 'tutorstarter' ),
					'section' => 'tutorstarter_typography_section',
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
			'h6_font_transform',
			array(
				'title'             => esc_html__( 'H6 Text Transform', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 'none',
				'sanitize_callback' => 'sanitize_select_radio',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'h6_font_transform',
				array(
					'label'   => esc_html__( 'H6 Text Transform', 'tutorstarter' ),
					'section' => 'tutorstarter_typography_section',
					'type'    => 'select',
					'choices' => array(
						'none'       => esc_html__( 'None', 'tutorstarter' ),
						'capitalize' => esc_html__( 'Capitalize', 'tutorstarter' ),
						'lowercase'  => esc_html__( 'Lowercase', 'tutorstarter' ),
						'uppercase'  => esc_html__( 'Uppercase', 'tutorstarter' ),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h6_font_lineheight',
			array(
				'title'             => esc_html__( 'H6 Line Height', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '{ "mobile": 20, "tablet": 20, "desktop": 22 }',
				'sanitize_callback' => 'sanitize_range_value',
			)
		);
		$wp_customize->add_control(
			new Responsive_Range_Slider_Control(
				$wp_customize,
				'h6_font_lineheight',
				array(
					'label'       => esc_html__( 'H6 Line Height', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
					'input_attrs' => array(
						'min'        => 0,
						'max'        => 100,
						'units'      => array( 'px' ),
						'defaultVal' => array(
							'mobile'  => 20,
							'tablet'  => 20,
							'desktop' => 22,
						),
					),
				)
			)
		);
	}
}
