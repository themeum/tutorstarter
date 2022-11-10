<?php
/**
 * Handles color customization
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Api\Customizer\General;

use WP_Customize_Color_Control;

defined( 'ABSPATH' ) || exit;

/**
 * Colors class
 */
class Colors {

	/**
	 * Register
	 *
	 * @param WP_Customize_Manager $wp_customize theme customizer object.
	 */
	public function register( $wp_customize ) {

		$wp_customize->add_section(
			'tutorstarter_colors_section',
			array(
				'panel'       => 'tutorstarter_customizer_panel',
				'title'       => esc_html__( 'Colors', 'tutorstarter' ),
				'description' => esc_html__( 'Colors Settings', 'tutorstarter' ),
				'priority'    => 3,
			)
		);
		$wp_customize->add_setting(
			'body_bg_color',
			array(
				'title'             => esc_html__( 'Body Background Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'body_bg_color',
				array(
					'label'   => esc_html__( 'Body Background Color', 'tutorstarter' ),
					'section' => 'tutorstarter_colors_section',
				)
			)
		);
		$wp_customize->add_setting(
			'body_text_color',
			array(
				'title'             => esc_html__( 'Body Text Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#57586E',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'body_text_color',
				array(
					'label'   => esc_html__( 'Body Text Color', 'tutorstarter' ),
					'section' => 'tutorstarter_colors_section',
				)
			)
		);
		$wp_customize->add_setting(
			'link_color',
			array(
				'title'             => esc_html__( 'Primary Color', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => '#1950D1',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'link_color',
				array(
					'label'   => esc_html__( 'Primary Color', 'tutorstarter' ),
					'section' => 'tutorstarter_colors_section',
				)
			)
		);
	}
}
