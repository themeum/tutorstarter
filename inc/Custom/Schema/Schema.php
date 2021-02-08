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
			} elseif( 'Course' === $type ) {
				$schema = Schema_Template::course( $type );
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
