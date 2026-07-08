<?php
/**
 * Handles custom block styles and block patterns
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Custom;

defined( 'ABSPATH' ) || exit;

/**
 * Block_Extras class
 */
class Block_Extras {

	/**
	 * Register default hooks and actions for WordPress
	 */
	public function register() {
		add_action( 'init', array( $this, 'register_block_styles' ) );
		add_action( 'init', array( $this, 'register_block_patterns' ) );
	}

	/**
	 * Register custom block styles
	 *
	 * @return void
	 */
	public function register_block_styles() {
		if ( ! function_exists( 'register_block_style' ) ) {
			return;
		}

		register_block_style(
			'core/button',
			array(
				'name'         => 'tutorstarter-rounded',
				'label'        => __( 'TutorStarter Rounded', 'tutorstarter' ),
				'inline_style' => '.wp-block-button.is-style-tutorstarter-rounded .wp-block-button__link { border-radius: 50px; }',
			)
		);

		register_block_style(
			'core/quote',
			array(
				'name'         => 'tutorstarter-boxed',
				'label'        => __( 'TutorStarter Boxed', 'tutorstarter' ),
				'inline_style' => '.wp-block-quote.is-style-tutorstarter-boxed { background-color: #f7f9fa; border-left: 4px solid #175cff; padding: 24px 32px; border-radius: 4px; }',
			)
		);

		register_block_style(
			'core/group',
			array(
				'name'         => 'tutorstarter-card',
				'label'        => __( 'TutorStarter Card', 'tutorstarter' ),
				'inline_style' => '.wp-block-group.is-style-tutorstarter-card { background-color: #ffffff; box-shadow: 0 4px 24px rgba(10, 8, 59, 0.08); border-radius: 8px; padding: 32px; }',
			)
		);
	}

	/**
	 * Register custom block patterns
	 *
	 * @return void
	 */
	public function register_block_patterns() {
		if ( ! function_exists( 'register_block_pattern' ) || ! function_exists( 'register_block_pattern_category' ) ) {
			return;
		}

		register_block_pattern_category(
			'tutorstarter',
			array( 'label' => __( 'TutorStarter', 'tutorstarter' ) )
		);

		register_block_pattern(
			'tutorstarter/call-to-action',
			array(
				'title'       => __( 'Call to Action', 'tutorstarter' ),
				'description' => __( 'A centered call to action section with a heading, supporting text, and a button.', 'tutorstarter' ),
				'categories'  => array( 'tutorstarter' ),
				'content'     => '<!-- wp:group {"align":"wide","style":{"color":{"background":"#f7f9fa"},"spacing":{"padding":{"top":"64px","bottom":"64px","left":"32px","right":"32px"}}}} -->
<div class="wp-block-group alignwide has-background" style="background-color:#f7f9fa;padding-top:64px;padding-right:32px;padding-bottom:64px;padding-left:32px"><!-- wp:heading {"textAlign":"center","style":{"color":{"text":"#0a083b"}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#0a083b">' . esc_html__( 'Start Learning Today', 'tutorstarter' ) . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#57586e"}}} -->
<p class="has-text-align-center has-text-color" style="color:#57586e">' . esc_html__( 'Join thousands of learners and take your skills to the next level with our expert-led courses.', 'tutorstarter' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"background":"#175cff","text":"#ffffff"},"border":{"radius":"50px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background wp-element-button" style="border-radius:50px;background-color:#175cff;color:#ffffff">' . esc_html__( 'Browse Courses', 'tutorstarter' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
			)
		);

		register_block_pattern(
			'tutorstarter/feature-columns',
			array(
				'title'       => __( 'Feature Columns', 'tutorstarter' ),
				'description' => __( 'Three columns highlighting theme or course features.', 'tutorstarter' ),
				'categories'  => array( 'tutorstarter' ),
				'content'     => '<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"style":{"color":{"text":"#0a083b"}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#0a083b">' . esc_html__( 'Expert Instructors', 'tutorstarter' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>' . esc_html__( 'Learn from industry professionals with years of real-world experience.', 'tutorstarter' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"style":{"color":{"text":"#0a083b"}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#0a083b">' . esc_html__( 'Flexible Learning', 'tutorstarter' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>' . esc_html__( 'Study at your own pace, anytime and anywhere, on any device.', 'tutorstarter' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"style":{"color":{"text":"#0a083b"}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#0a083b">' . esc_html__( 'Certification', 'tutorstarter' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>' . esc_html__( 'Earn certificates that showcase your achievements and skills.', 'tutorstarter' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			)
		);
	}
}
