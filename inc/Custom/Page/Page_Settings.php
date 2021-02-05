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
		add_action( 'add_meta_boxes', array( $this, 'add_page_settings_meta' ) );
		add_action( 'save_post', array( $this, 'save_page_settings_meta' ) );
	}

	/**
	 * Register page settings meta
	 */
	public function add_page_settings_meta() {
		add_meta_box( 'tutorstarter-page-setting' , __( 'Tutor Starter Page Settings', 'tutorstarter' ), array( $this, 'page_display_callback' ), 'page', 'side' );
	}

	/**
	 * Display callback
	 */
	public function page_display_callback( $post ) { 
		echo '<div id="tutorstarter-page-settings"></div>';
	}

	/**
	 * Sanitize toggle value
	 * 
	 * @param bool $input
	 * 
	 * @return bool
	 */
	public function sanitize_toggle_value( $input ) {
		$toggle_state = 0;
		if ( true === $input ) {
			$toggle_state = 1;
		} else {
			$toggle_state = 0;
		}
		return $toggle_state;
	}

	/**
	 * Save page settings meta
	 */
	public function save_page_settings_meta( $post_id ) {

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
			'sidebar_select'    => isset( $_POST['sidebar_select'] ) ? sanitize_text_field( $_POST['sidebar_select'] ) : '',
			'header_select'     => isset( $_POST['header_select'] ) ? sanitize_text_field( $_POST['header_select'] ) : '',
			'footer_select'     => isset( $_POST['footer_select'] ) ? sanitize_text_field( $_POST['footer_select'] ) : '',
			'page_title_toggle' => $this->sanitize_toggle_value( $_POST['page_title_toggle'] ),
			'header_toggle'     => isset( $_POST['header_toggle'] ) ? true : false,
			'footer_toggle'     => isset( $_POST['footer_toggle'] ) ? true : false,
		);

		update_post_meta( $post_id, '_tutorstarter_page_metadata', $fields );
	}
}
