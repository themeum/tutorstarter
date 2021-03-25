<?php
/**
 * Handles typography customization
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Api\Customizer\General;

use Tutor_Starter\Api\Customizer\Custom_Controls\Typography_Control;
use Tutor_Starter\Api\Customizer\Custom_Controls\Font_Family_Control;

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
		// Body Font
		$wp_customize->add_setting(
			'body_font',
			array(
				'title'             => esc_html__( 'Body Font', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 'Inter',
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
					'label'   => esc_html__( 'Body Font', 'tutorstarter' ),
					'section' => 'tutorstarter_typography_section',
				)
			)
		);
		// Body Typography
		$wp_customize->add_setting(
			'main_typography',
			array(
				'title'     => esc_html__( 'Body Typography', 'tutorstarter' ),
				'transport' => 'postMessage',
				'default' => array(
					'textTransform' => 'none',
					'fontWeight'    => 400,
					'fontSize'      => array(
						'mobile'  => 13,
						'tablet'  => 13,
						'desktop' => 16,
					),
					'lineHeight' => array(
						'mobile'  => 1.5,
						'tablet'  => 1.5,
						'desktop' => 1.7,
					),
				),
				'sanitize_callback' => 'sanitize_select_range_value',
			)
		);
		$wp_customize->add_control(
			new Typography_Control(
				$wp_customize,
				'main_typography',
				array(
					'label'       => esc_html__( 'Body Typography', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
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
								'mobile'  => 1.5,
								'tablet'  => 1.5,
								'desktop' => 1.7,
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
				'default'           => 'Sora',
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
			'h1_typography',
			array(
				'title'             => esc_html__( 'H1 Typography', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default' => array(
					'textTransform' => 'none',
					'fontWeight'    => 700,
					'fontSize'      => array(
						'mobile'  => 48,
						'tablet'  => 48,
						'desktop' => 68,
					),
					'lineHeight' => array(
						'mobile'  => 2.5,
						'tablet'  => 2.5,
						'desktop' => 2.5,
					),
				),
				'sanitize_callback' => 'sanitize_select_range_value',
			)
		);
		$wp_customize->add_control(
			new Typography_Control(
				$wp_customize,
				'h1_typography',
				array(
					'label'       => esc_html__( 'H1 Typography', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
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
								'mobile'  => 48,
								'tablet'  => 48,
								'desktop' => 68,
							),
							'line_heights' => array(
								'mobile'  => 2.5,
								'tablet'  => 2.5,
								'desktop' => 2.5,
							)
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h2_typography',
			array(
				'title'             => esc_html__( 'H2 Typography', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default' => array(
					'textTransform' => 'none',
					'fontWeight'    => 700,
					'fontSize'      => array(
						'mobile'  => 32,
						'tablet'  => 32,
						'desktop' => 48,
					),
					'lineHeight' => array(
						'mobile'  => 2,
						'tablet'  => 2,
						'desktop' => 2,
					),
				),
				'sanitize_callback' => 'sanitize_select_range_value',
			)
		);
		$wp_customize->add_control(
			new Typography_Control(
				$wp_customize,
				'h2_typography',
				array(
					'label'       => esc_html__( 'H2 Typography', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
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
								'mobile'  => 32,
								'tablet'  => 32,
								'desktop' => 48,
							),
							'line_heights' => array(
								'mobile'  => 2,
								'tablet'  => 2,
								'desktop' => 2,
							)
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h3_typography',
			array(
				'title'             => esc_html__( 'H3 Typography', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default' => array(
					'textTransform' => 'none',
					'fontWeight'    => 700,
					'fontSize'      => array(
						'mobile'  => 28,
						'tablet'  => 28,
						'desktop' => 36,
					),
					'lineHeight' => array(
						'mobile'  => 1.8,
						'tablet'  => 1.8,
						'desktop' => 1.8,
					),
				),
				'sanitize_callback' => 'sanitize_select_range_value',
			)
		);
		$wp_customize->add_control(
			new Typography_Control(
				$wp_customize,
				'h3_typography',
				array(
					'label'       => esc_html__( 'H3 Typography', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
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
								'mobile'  => 28,
								'tablet'  => 28,
								'desktop' => 36,
							),
							'line_heights' => array(
								'mobile'  => 1.8,
								'tablet'  => 1.8,
								'desktop' => 1.8,
							)
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h4_typography',
			array(
				'title'             => esc_html__( 'H4 Typography', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default' => array(
					'textTransform' => 'none',
					'fontWeight'    => 700,
					'fontSize'      => array(
						'mobile'  => 24,
						'tablet'  => 24,
						'desktop' => 26,
					),
					'lineHeight' => array(
						'mobile'  => 1.7,
						'tablet'  => 1.7,
						'desktop' => 1.7,
					),
				),
				'sanitize_callback' => 'sanitize_select_range_value',
			)
		);
		$wp_customize->add_control(
			new Typography_Control(
				$wp_customize,
				'h4_typography',
				array(
					'label'       => esc_html__( 'H4 Typography', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
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
								'mobile'  => 24,
								'tablet'  => 24,
								'desktop' => 26,
							),
							'line_heights' => array(
								'mobile'  => 1.7,
								'tablet'  => 1.7,
								'desktop' => 1.7,
							)
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h5_typography',
			array(
				'title'             => esc_html__( 'H5 Typography', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default' => array(
					'textTransform' => 'none',
					'fontWeight'    => 700,
					'fontSize'      => array(
						'mobile'  => 18,
						'tablet'  => 18,
						'desktop' => 20,
					),
					'lineHeight' => array(
						'mobile'  => 1.6,
						'tablet'  => 1.6,
						'desktop' => 1.6,
					),
				),
				'sanitize_callback' => 'sanitize_select_range_value',
			)
		);
		$wp_customize->add_control(
			new Typography_Control(
				$wp_customize,
				'h5_typography',
				array(
					'label'       => esc_html__( 'H5 Typography', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
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
								'mobile'  => 18,
								'tablet'  => 18,
								'desktop' => 20,
							),
							'line_heights' => array(
								'mobile'  => 1.6,
								'tablet'  => 1.6,
								'desktop' => 1.6,
							)
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h6_typography',
			array(
				'title'             => esc_html__( 'H6 Typography', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default' => array(
					'textTransform' => 'none',
					'fontWeight'    => 700,
					'fontSize'      => array(
						'mobile'  => 17,
						'tablet'  => 17,
						'desktop' => 18,
					),
					'lineHeight' => array(
						'mobile'  => 1.5,
						'tablet'  => 1.5,
						'desktop' => 1.5,
					),
				),
				'sanitize_callback' => 'sanitize_select_range_value',
			)
		);
		$wp_customize->add_control(
			new Typography_Control(
				$wp_customize,
				'h6_typography',
				array(
					'label'       => esc_html__( 'H6 Typography', 'tutorstarter' ),
					'section'     => 'tutorstarter_typography_section',
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
								'mobile'  => 17,
								'tablet'  => 17,
								'desktop' => 18,
							),
							'line_heights' => array(
								'mobile'  => 1.5,
								'tablet'  => 1.5,
								'desktop' => 1.5,
							)
						),
					),
				)
			)
		);
	}
}
