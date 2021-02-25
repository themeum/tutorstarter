<?php
/**
 * Handles layout customization
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Api\Customizer\General;

use WP_Customize_Control;

defined( 'ABSPATH' ) || exit;

/**
 * Layout class
 */
class Layout {

	/**
	 * Register
	 *
	 * @param WP_Customize_Manager $wp_customize theme customizer object.
	 */
	public function register( $wp_customize ) {

		$wp_customize->add_section(
			'tutorstarter_layout_section',
			array(
				'panel'       => 'tutorstarter_customizer_panel',
				'title'       => esc_html__( 'Layout', 'tutorstarter' ),
				'description' => esc_html__( 'Layout Settings', 'tutorstarter' ),
				'priority'    => 3,
			)
		);
		$wp_customize->add_setting(
			'content_width_value',
			array(
				'title'             => esc_html__( 'Content Width (px)', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 1140,
				'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'content_width_value',
				array(
					'label'   => esc_html__( 'Content Width (px)', 'tutorstarter' ),
					'type'    => 'number',
					'section' => 'tutorstarter_layout_section',
				)
			)
		);
	}
}
