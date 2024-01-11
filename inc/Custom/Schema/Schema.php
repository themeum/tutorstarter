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
	use Schema_Template;
	/**
	 * Register
	 */
	public function register() {
		add_action( 'wp_head', array( $this, 'add_schema' ) );
	}

	/**
	 * Add Schema
	 */
	public function add_schema() {
		// Get post meta.
		$post_meta = get_post_meta( get_the_ID(), '_tutorstarter_schema', true );

		$schema = array();

		if ( ! empty( $post_meta ) ) {

			$type = $post_meta['main_schema_select'];

			if ( 'WebPage' === $type ) {
				$schema = $this->web_page( $type );
			} elseif ( 'Organization' === $type ) {
				$schema = $this->organization( $type );
			} elseif ( 'LocalBusiness' === $type ) {
				$schema = $this->local_business( $type );
			} elseif ( 'Person' === $type ) {
				$schema = $this->person( $type );
			} elseif ( 'Video' === $type ) {
				$schema = $this->video( $type );
			} elseif ( 'Review' === $type ) {
				$schema = $this->review( $type );
			} elseif ( 'Course' === $type ) {
				$schema = $this->course( $type );
			} elseif ( 'post' === get_post_type() ) {
				$schema = $this->blog_post();
			}
		} else {
			if ( 'post' === get_post_type() ) {
				$schema = $this->blog_post();
			}
		}

		if ( ! empty( $schema ) ) {
			echo '<script type="application/ld+json">' . json_encode( $schema ) . '</script>';
		}
	}
}
