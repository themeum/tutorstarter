<?php
/**
 * Handles sidebar customization
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Api\Customizer\Blog;

use WP_Customize_Control;
use Tutor_Starter\Api\Customizer\Custom_Controls\Toggle_Switch_Control;

defined( 'ABSPATH' ) || exit;

/**
 * Sidebar class
 */
class Meta {

	/**
	 * Register
	 *
	 * @param WP_Customize_Manager $wp_customize theme customizer object.
	 */
	public function register( $wp_customize ) {
		$wp_customize->add_setting(
			'blog_meta_toggle',
			array(
				'title'             => esc_html__( 'Show Post Meta?', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => true,
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blog_meta_toggle',
			array(
				'selector'            => '.entry-meta',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);
		$wp_customize->add_control(
			new Toggle_Switch_Control(
				$wp_customize,
				'blog_meta_toggle',
				array(
					'label'   => esc_html__( 'Show Post Meta?', 'tutorstarter' ),
					'section' => 'tutorstarter_blog_section',
				)
			)
		);
		$wp_customize->add_setting(
			'category_meta_toggle',
			array(
				'title'             => esc_html__( 'Show Post Categories?', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => true,
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);
		$wp_customize->add_control(
			new Toggle_Switch_Control(
				$wp_customize,
				'category_meta_toggle',
				array(
					'label'           => esc_html__( 'Show Post Categories?', 'tutorstarter' ),
					'section'         => 'tutorstarter_blog_section',
					'active_callback' => 'control_active_callback_meta',
				)
			)
		);
		$wp_customize->add_setting(
			'author_meta_toggle',
			array(
				'title'             => esc_html__( 'Show Author?', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => true,
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);
		$wp_customize->add_control(
			new Toggle_Switch_Control(
				$wp_customize,
				'author_meta_toggle',
				array(
					'label'           => esc_html__( 'Show Author?', 'tutorstarter' ),
					'section'         => 'tutorstarter_blog_section',
					'active_callback' => 'control_active_callback_meta',
				)
			)
		);
		$wp_customize->add_setting(
			'featured_image_toggle',
			array(
				'title'             => esc_html__( 'Show Featured Image?', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => true,
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);
		$wp_customize->add_control(
			new Toggle_Switch_Control(
				$wp_customize,
				'featured_image_toggle',
				array(
					'label'   => esc_html__( 'Show Featured Image?', 'tutorstarter' ),
					'section' => 'tutorstarter_blog_section',
				)
			)
		);
		$wp_customize->add_setting(
			'post_title_toggle',
			array(
				'title'             => esc_html__( 'Show Post Title?', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => true,
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);
		$wp_customize->add_control(
			new Toggle_Switch_Control(
				$wp_customize,
				'post_title_toggle',
				array(
					'label'   => esc_html__( 'Show Post Title?', 'tutorstarter' ),
					'section' => 'tutorstarter_blog_section',
				)
			)
		);
		$wp_customize->add_setting(
			'post_excerpt_toggle',
			array(
				'title'             => esc_html__( 'Show Post Excerpt in Blog Listing?', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => true,
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);
		$wp_customize->add_control(
			new Toggle_Switch_Control(
				$wp_customize,
				'post_excerpt_toggle',
				array(
					'label'   => esc_html__( 'Show Post Excerpt in Blog Listing?', 'tutorstarter' ),
					'section' => 'tutorstarter_blog_section',
				)
			)
		);
		$wp_customize->add_setting(
			'post_readmore_toggle',
			array(
				'title'             => esc_html__( 'Show Read More Button in Blog Listing?', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => true,
				'sanitize_callback' => isset( $input ) ? true : false,
			)
		);
		$wp_customize->add_control(
			new Toggle_Switch_Control(
				$wp_customize,
				'post_readmore_toggle',
				array(
					'label'   => esc_html__( 'Show Read More Button in Blog Listing?', 'tutorstarter' ),
					'section' => 'tutorstarter_blog_section',
				)
			)
		);
		$wp_customize->add_setting(
			'custom_excerpt_length',
			array(
				'title'             => esc_html__( 'Custom Excerpt Length', 'tutorstarter' ),
				'transport'         => 'postMessage',
				'default'           => 18,
				'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'custom_excerpt_length',
			array(
				'selector'            => '.excerpt',
				'container_inclusive' => true,
				'render_callback'     => '__return_true',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'custom_excerpt_length',
				array(
					'label'   => esc_html__( 'Custom Excerpt Length', 'tutorstarter' ),
					'section' => 'tutorstarter_blog_section',
					'type'    => 'number'
				)
			)
		);
	}
}
