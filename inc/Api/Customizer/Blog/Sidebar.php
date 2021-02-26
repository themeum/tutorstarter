<?php
/**
 * Handles sidebar customization
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Api\Customizer\Blog;

use Tutor_Starter\Api\Customizer\Custom_Controls\Radio_Image_Control;

defined( 'ABSPATH' ) || exit;

/**
 * Sidebar class
 */
class Sidebar {

	/**
	 * Register
	 *
	 * @param WP_Customize_Manager $wp_customize theme customizer object.
	 */
	public function register( $wp_customize ) {

		$wp_customize->add_section(
			'tutorstarter_blog_section',
			array(
				'panel'       => 'tutorstarter_customizer_panel',
				'title'       => esc_html__( 'Blog', 'tutorstarter' ),
				'description' => esc_html__( 'Customize blog', 'tutorstarter' ),
				'priority'    => 6,
			)
		);
		$wp_customize->add_setting(
			'sidebar_type_select',
			array(
				'title'             => esc_html__( 'Blog Sidebar Type', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 'sidebar_none',
				'sanitize_callback' => 'sanitize_select_radio',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'sidebar_type_select',
			array(
				'selector'            => '#sidebar',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);
		$wp_customize->add_control(
			new Radio_Image_Control(
				$wp_customize,
				'sidebar_type_select',
				array(
					'label'   => esc_html__( 'Blog Sidebar Type', 'tutorstarter' ),
					'section' => 'tutorstarter_blog_section',
					'choices' => array(
						'sidebar_none'  => array(
							'name'  => esc_html__( 'No Sidebar', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/no-sidebar.svg',
						),
						'sidebar_left'  => array(
							'name'  => esc_html__( 'Left Sidebar', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/sidebar-left.svg',
						),
						'sidebar_right' => array(
							'name'  => esc_html__( 'Right Sidebar', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/sidebar-right.svg',
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'sidebar_type_single',
			array(
				'title'             => esc_html__( 'Single Sidebar Type', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 'sidebar_none',
				'sanitize_callback' => 'sanitize_select_radio',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'sidebar_type_single',
			array(
				'selector'            => '#sidebar',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);
		$wp_customize->add_control(
			new Radio_Image_Control(
				$wp_customize,
				'sidebar_type_single',
				array(
					'label'   => esc_html__( 'Single Sidebar Type', 'tutorstarter' ),
					'section' => 'tutorstarter_blog_section',
					'choices' => array(
						'sidebar_none'  => array(
							'name'  => esc_html__( 'No Sidebar', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/no-sidebar.svg',
						),
						'sidebar_left'  => array(
							'name'  => esc_html__( 'Left Sidebar', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/sidebar-left.svg',
						),
						'sidebar_right' => array(
							'name'  => esc_html__( 'Right Sidebar', 'tutorstarter' ),
							'image' => get_template_directory_uri() . '/assets/dist/images/sidebar-right.svg',
						),
					),
				)
			)
		);
	}
}
