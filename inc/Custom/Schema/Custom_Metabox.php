<?php
/**
 * Handles Creating and rendering custom meta boxes
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Custom\Schema;

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
	 * Add custom metaboxes
	 */
	public function add_custom_meta_boxes() {
		add_meta_box( 'tutorstarter-schema' , __( 'Tutor Starter Schema', 'tutorstarter' ), array( $this, 'display_callback' ), '', 'side', 'default' );
	}

	/**
	 * Display callback
	 */
	public function display_callback( $post ) { 
		echo '<div id="tutorstarter-schema-data"></div>';
	}

	/**
	 * Save schema metadata
	 */
	public function save_schema_meta_data( $post_id ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! current_user_can( 'edit_posts' ) ) {
			return;
		}

		if ( $parent_id = wp_is_post_revision( $post_id ) ) {
			$post_id = $parent_id;
		}

		$fields = array(
			'main_schema_select' => isset( $_POST['main_schema_select'] ) ? sanitize_text_field( $_POST['main_schema_select'] ) : '',
			'sub_schema_select'  => isset( $_POST['sub_schema_select'] ) ? sanitize_text_field( $_POST['sub_schema_select'] ) : '',
			'name'               => isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '',
			'logo_url'           => isset( $_POST['logo_url'] ) ? sanitize_text_field( $_POST['logo_url'] ) : '',
			'description'        => isset( $_POST['description'] ) ? sanitize_text_field( $_POST['description'] ) : '',
			'address'            => isset( $_POST['address'] ) ? sanitize_text_field( $_POST['address'] ) : '',
			'phone'              => isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '',
			'city'               => isset( $_POST['city'] ) ? sanitize_text_field( $_POST['city'] ) : '',
			'email'              => isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '',
			'state_region'       => isset( $_POST['state_region'] ) ? sanitize_text_field( $_POST['state_region'] ) : '',
			'zip_code'           => isset( $_POST['zip_code'] ) ? sanitize_text_field( $_POST['zip_code'] ) : '',
			'country'            => isset( $_POST['country'] ) ? sanitize_text_field( $_POST['country'] ) : '',
			'po_box'             => isset( $_POST['po_box'] ) ? sanitize_text_field( $_POST['po_box'] ) : '',
			'job_title'          => isset( $_POST['job_title'] ) ? sanitize_text_field( $_POST['job_title'] ) : '',
			'height'             => isset( $_POST['height'] ) ? sanitize_text_field( $_POST['height'] ) : '',
			'birth_date'         => isset( $_POST['birth_date'] ) ? sanitize_text_field( $_POST['birth_date'] ) : '',
			'birth_place'        => isset( $_POST['birth_place'] ) ? sanitize_text_field( $_POST['birth_place'] ) : '',
			'nationality'        => isset( $_POST['nationality'] ) ? sanitize_text_field( $_POST['nationality'] ) : '',
			'duration'           => isset( $_POST['duration'] ) ? sanitize_text_field( $_POST['duration'] ) : '',
			'upload_date'        => isset( $_POST['upload_date'] ) ? sanitize_text_field( $_POST['upload_date'] ) : '',
			'content_url'        => isset( $_POST['content_url'] ) ? sanitize_text_field( $_POST['content_url'] ) : '',
			'embed_url'          => isset( $_POST['embed_url'] ) ? sanitize_text_field( $_POST['embed_url'] ) : '',
			'interaction_count'  => isset( $_POST['interaction_count'] ) ? sanitize_text_field( $_POST['interaction_count'] ) : '',
			'rating_value'       => isset( $_POST['rating_value'] ) ? sanitize_text_field( $_POST['rating_value'] ) : '',
			'reviewed_product'   => isset( $_POST['reviewed_product'] ) ? sanitize_text_field( $_POST['reviewed_product'] ) : '',
			'reviewed_by'        => isset( $_POST['reviewed_by'] ) ? sanitize_text_field( $_POST['reviewed_by'] ) : '',
			'date_published'     => isset( $_POST['date_published'] ) ? sanitize_text_field( $_POST['date_published'] ) : '',
			'publisher_type'     => isset( $_POST['publisher_type'] ) ? sanitize_text_field( $_POST['publisher_type'] ) : '',
			'publisher_name'     => isset( $_POST['publisher_name'] ) ? sanitize_text_field( $_POST['publisher_name'] ) : '',
			'keywords'           => isset( $_POST['post_keywords'] ) ? sanitize_text_field( $_POST['post_keywords'] ) : '',
			'article_body'       => isset( $_POST['article_body'] ) ? sanitize_text_field( $_POST['article_body'] ) : '',
			'provider_name'      => isset( $_POST['provider_name'] ) ? sanitize_text_field( $_POST['provider_name'] ) : '',
		);

		update_post_meta( $post_id, '_tutorstarter_schema', $fields );
	}
}
