<?php
/**
 * Handles page specific settings
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Custom\Page;

defined( 'ABSPATH' ) || exit;

/**
 * Page settings class
 */
class Page_Settings {

	/**
	 * Register
	 */
	public function register() {
		add_action( 'init', array( $this, 'register_page_settings_meta' ) );
	}

	/**
	 * Register page settings meta
	 */
	public function register_page_settings_meta() {
		register_post_meta(
			'page',
			'_tutorstarter_page_metadata',
			array(
				'type'          => 'object',
				'single'        => true,
				'auth_callback' => '__return_true',
				'show_in_rest'  => array(
					'schema' => array(
						'type'       => 'object',
						'properties' => array(
							'sidebar_select'    => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'footer_select'    => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'page_title_toggle' => array(
								'type'              => 'boolean',
								'default'           => true,
								'sanitize_callback' => isset( $input ) ? true : false,
							),
							'header_toggle'     => array(
								'type'              => 'boolean',
								'sanitize_callback' => isset( $input ) ? true : false,
							),
							'header_trans_toggle'     => array(
								'type'              => 'boolean',
								'sanitize_callback' => isset( $input ) ? true : false,
							),
							'footer_toggle'     => array(
								'type'              => 'boolean',
								'sanitize_callback' => isset( $input ) ? true : false,
							),
						),
					),
				),
			)
		);
	}
}
