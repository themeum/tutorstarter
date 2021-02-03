<?php
/**
 * Handles Creating and rendering custom meta boxes
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Custom\Schema;

use Tutor_Starter\Traits\Schema_Fields;
use Tutor_Starter\Traits\Schema_Template;

defined( 'ABSPATH' ) || exit;

/**
 * Custom metabox class
 */
class Custom_Metabox {

	/**
	 * Register
	 */
	public function register() {
		add_action( 'add_meta_boxes', array( $this, 'add_custom_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_schema_meta_data' ) );
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
							'provider_name'         => array(
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
	 * Add custom metaboxes
	 */
	public function add_custom_meta_boxes() {
		add_meta_box( 'tutorstarter-schema' , __( 'Tutor Starter Schema', 'tutorstarter' ), array( $this, 'display_callback' ), '', 'side', 'default' );
	}

	/**
	 * Display callback
	 */
	public function display_callback( $post ) { 
		get_template_part( 'views/admin/schema-fields' );
	}

	/**
	 * Save schema metadata
	 */
	public function save_schema_meta_data( $post_id ) {

		if ( ! isset( $_POST['tutorstarter_metabox_nonce'] ) ) {
            return $post_id;
        }
 
        $nonce = $_POST['tutorstarter_metabox_nonce'];
 
        if ( ! wp_verify_nonce( $nonce, 'tutorstarter_metabox_inputs' ) ) {
            return $post_id;
        }

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( $parent_id = wp_is_post_revision( $post_id ) ) {
			$post_id = $parent_id;
		}

		$fields = [
			'hcf_author' => sanitize_text_field( $_POST['hcf_author'] ),
			'hcf_published_date' => sanitize_text_field( $_POST['hcf_published_date'] ),
			'hcf_price' => sanitize_text_field( $_POST['hcf_price'] ),
		];

		update_post_meta( $post_id, '_tutorstarter_schema', $fields );
	}
}
