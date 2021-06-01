<?php
/**
 * Handles theme update features
 * 
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Api\Updater;

defined( 'ABSPATH' ) || exit;

/**
 * Theme updater class
 */
class Updater {

	/**
	 * Meta
	 * 
	 * @var array $meta
	 */
	private $meta;

	/**
	 * Product slug
	 * 
	 * @var string $product_slug
	 */
	private $product_slug;

	/**
	 * Api endpoint
	 * 
	 * @var string $api_end_point
	 */
	private $api_end_point = 'https://www.themeum.com/wp-json/themeum-license/v2/';

	/**
	 * Construct
	 * 
	 * @param array $meta
	 */
	public function __construct( $meta ) {
		$this->meta         = $meta;
		$this->product_slug = strtolower( $this->meta['product_slug'] );
		
		$force_check        = isset( $this->meta['force_update_check'] ) && $this->meta['force_update_check'] === true;
		$update_hook_prefix = $force_check ? '' : 'pre_set_';

		add_filter( $update_hook_prefix . 'site_transient_update_themes', array( $this, 'check_for_update' ) );
	}

	/**
	 * Get update information
	 * 
	 * @return array|bool|mixed|object
	 */
	public function check_for_update_api() {
		// Set product args.
		$params = array(
			'body' => array(
				'action'       => 'check_update_by_license',
				'product_slug' => $this->product_slug,
			),
		);

		// Make the POST request.
		$request      = wp_remote_post( $this->api_end_point . 'check-update-free', $params );
		$request_body = false;
		
		// Check if response is valid.
		if ( ! is_wp_error( $request ) || 200 === wp_remote_retrieve_response_code( $request ) ) {
			$request_body = json_decode( $request['body'] );
		}

		return $request_body;
	}

	/**
	 * Check for update
	 * 
	 * @param $transient
	 *
	 * @return mixed $transient
	 */
	public function check_for_update( $transient ) {
		$base_name    = $this->meta['product_basename'];
		$request_body = $this->check_for_update_api();

		if ( ! empty( $request_body->success ) && $request_body->success ) {
			if ( version_compare( $this->meta['current_version'], $request_body->data->version, '<' ) ) {
				
				$update_info = array(
					'new_version' => $request_body->data->version,
					'package'     => $request_body->data->download_url,
					'tested'      => $request_body->data->tested_wp_version,
					'slug'        => $base_name,
					'url'         => $request_body->data->url,
				);

				$transient->response[ $base_name ] = $update_info;
			}
		}

		return $transient;
	}
}