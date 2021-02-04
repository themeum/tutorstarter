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
            return;
        }
 
        $nonce = $_POST['tutorstarter_metabox_nonce'];
 
        if ( ! wp_verify_nonce( $nonce, 'tutorstarter_metabox_inputs' ) ) {
            return;
        }

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
			'main_schema_select' => sanitize_text_field( $_POST['main_schema_select'] ),
			'sub_schema_select'  => sanitize_text_field( $_POST['sub_schema_select'] ),
			'name'               => sanitize_text_field( $_POST['name'] ),
			'logo_url'           => sanitize_text_field( $_POST['logo_url'] ),
			'description'        => sanitize_text_field( $_POST['description'] ),
			'address'            => sanitize_text_field( $_POST['address'] ),
			'phone'              => sanitize_text_field( $_POST['phone'] ),
			'city'               => sanitize_text_field( $_POST['city'] ),
			'state_region'       => sanitize_text_field( $_POST['state_region'] ),
			'zip_code'           => sanitize_text_field( $_POST['zip_code'] ),
			'country'            => sanitize_text_field( $_POST['country'] ),
			'po_box'             => sanitize_text_field( $_POST['po_box'] ),
			'job_title'          => sanitize_text_field( $_POST['job_title'] ),
			'height'             => sanitize_text_field( $_POST['height'] ),
			'birth_date'         => sanitize_text_field( $_POST['birth_date'] ),
			'birth_place'        => sanitize_text_field( $_POST['birth_place'] ),
			'nationality'        => sanitize_text_field( $_POST['nationality'] ),
			'duration'           => sanitize_text_field( $_POST['duration'] ),
			'upload_date'        => sanitize_text_field( $_POST['upload_date'] ),
			'content_url'        => sanitize_text_field( $_POST['content_url'] ),
			'embed_url'          => sanitize_text_field( $_POST['embed_url'] ),
			'interaction_count'  => sanitize_text_field( $_POST['interaction_count'] ),
			'rating_value'       => sanitize_text_field( $_POST['rating_value'] ),
			'reviewed_product'   => sanitize_text_field( $_POST['reviewed_product'] ),
			'reviewed_by'        => sanitize_text_field( $_POST['reviewed_by'] ),
			'date_published'     => sanitize_text_field( $_POST['date_published'] ),
			'publisher_type'     => sanitize_text_field( $_POST['publisher_type'] ),
			'publisher_name'     => sanitize_text_field( $_POST['publisher_name'] ),
			'keywords'           => sanitize_text_field( $_POST['keywords'] ),
			'article_body'       => sanitize_text_field( $_POST['article_body'] ),
			'provider_name'      => sanitize_text_field( $_POST['provider_name'] ),
		);

		update_post_meta( $post_id, '_tutorstarter_schema', $fields );
	}
}
