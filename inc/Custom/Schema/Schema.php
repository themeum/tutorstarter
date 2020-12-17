<?php
/**
 * Handles Schema generation with JSON-LD
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Custom\Schema;

use Tutor_Starter\Traits\Schema_Template;

defined( 'ABSPATH' ) || exit;

/**
 * Schema class
 */
class Schema {

	/**
	 * Register
	 */
	public function register() {
		add_action( 'wp_head', array( $this, 'add_schema' ) );
		add_action( 'init', array( $this, 'register_schema_post_meta' ) );
	}

	/**
	 * Register schema meta
	 */
	public function register_schema_post_meta() {
		register_post_meta(
			'',
			'_tutorstarter_schema_metadata',
			array(
				'type'          => 'object',
				'single'        => true,
				'auth_callback' => '__return_true',
				'show_in_rest'  => array(
					'schema' => array(
						'type'       => 'object',
						'properties' => array(
							'main_schema_select' => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'sub_schema_select'  => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'name'               => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'logo_url'           => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'description'        => array(
								'type'              => 'string',
								'sanitize_callback' => 'wp_filter_nohtml_kses',
							),
							'address'            => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'phone'              => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'email'              => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'city'               => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'state_region'       => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'zip_code'           => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'country'            => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'po_box'             => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'job_title'          => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'height'             => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'birth_date'         => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'birth_place'        => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'nationality'        => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'duration'           => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'upload_date'        => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'content_url'        => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'embed_url'          => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'interaction_count'  => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'rating_value'       => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'reviewed_product'   => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'reviewed_by'        => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'date_published'     => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'publisher_type'     => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'publisher_name'     => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'keywords'           => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
							'article_body'       => array(
								'type'              => 'string',
								'sanitize_callback' => 'sanitize_text_field',
							),
						),
					),
				),
			)
		);
	}

	/**
	 * Add Schema
	 */
	public function add_schema() {
		// Get post meta.
		$post_meta = get_post_meta( get_the_ID(), '_tutorstarter_schema_metadata', true );

		$schema = array();

		if ( ! empty( $post_meta ) ) {

			$type = $post_meta['main_schema_select'];

			if ( 'WebPage' === $type ) {
				$schema = Schema_Template::web_page( $type );
			} elseif ( 'Organization' === $type ) {
				$schema = Schema_Template::organization( $type );
			} elseif ( 'LocalBusiness' === $type ) {
				$schema = Schema_Template::local_business( $type );
			} elseif ( 'Person' === $type ) {
				$schema = Schema_Template::person( $type );
			} elseif ( 'Video' === $type ) {
				$schema = Schema_Template::video( $type );
			} elseif ( 'Review' === $type ) {
				$schema = Schema_Template::review( $type );
			} elseif ( 'post' === get_post_type() ) {
				$schema = Schema_Template::blog_post();
			}
		} else {
			if ( 'post' === get_post_type() ) {
				$schema = Schema_Template::blog_post();
			}
		}

		if ( ! empty( $schema ) ) {
			echo '<script type="application/ld+json">' . json_encode( $schema ) . '</script>';
		}
	}
}
