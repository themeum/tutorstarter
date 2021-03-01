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
						'mobile'  => 30,
						'tablet'  => 30,
						'desktop' => 30,
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
								'mobile'  => 30,
								'tablet'  => 30,
								'desktop' => 30,
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
				'default'           => 'Libre Baskerville',
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
						'mobile'  => 36,
						'tablet'  => 36,
						'desktop' => 48,
					),
					'lineHeight' => array(
						'mobile'  => 36,
						'tablet'  => 36,
						'desktop' => 64,
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
								'mobile'  => 36,
								'tablet'  => 36,
								'desktop' => 48,
							),
							'line_heights' => array(
								'mobile'  => 36,
								'tablet'  => 36,
								'desktop' => 64,
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
						'mobile'  => 26,
						'tablet'  => 26,
						'desktop' => 32,
					),
					'lineHeight' => array(
						'mobile'  => 30,
						'tablet'  => 30,
						'desktop' => 48,
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
								'mobile'  => 26,
								'tablet'  => 26,
								'desktop' => 32,
							),
							'line_heights' => array(
								'mobile'  => 30,
								'tablet'  => 30,
								'desktop' => 48,
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
						'mobile'  => 24,
						'tablet'  => 24,
						'desktop' => 26,
					),
					'lineHeight' => array(
						'mobile'  => 24,
						'tablet'  => 24,
						'desktop' => 48,
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
								'mobile'  => 24,
								'tablet'  => 24,
								'desktop' => 26,
							),
							'line_heights' => array(
								'mobile'  => 24,
								'tablet'  => 24,
								'desktop' => 48,
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
						'mobile'  => 18,
						'tablet'  => 18,
						'desktop' => 18,
					),
					'lineHeight' => array(
						'mobile'  => 22,
						'tablet'  => 22,
						'desktop' => 23,
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
								'mobile'  => 18,
								'tablet'  => 18,
								'desktop' => 18,
							),
							'line_heights' => array(
								'mobile'  => 22,
								'tablet'  => 22,
								'desktop' => 23,
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
						'mobile'  => 16,
						'tablet'  => 16,
						'desktop' => 16,
					),
					'lineHeight' => array(
						'mobile'  => 26,
						'tablet'  => 26,
						'desktop' => 26,
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
								'mobile'  => 16,
								'tablet'  => 16,
								'desktop' => 16,
							),
							'line_heights' => array(
								'mobile'  => 26,
								'tablet'  => 26,
								'desktop' => 26,
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
						'mobile'  => 15,
						'tablet'  => 15,
						'desktop' => 15,
					),
					'lineHeight' => array(
						'mobile'  => 24,
						'tablet'  => 24,
						'desktop' => 24,
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
								'mobile'  => 15,
								'tablet'  => 15,
								'desktop' => 15,
							),
							'line_heights' => array(
								'mobile'  => 24,
								'tablet'  => 24,
								'desktop' => 24,
							)
						),
					),
				)
			)
		);
	}
}
