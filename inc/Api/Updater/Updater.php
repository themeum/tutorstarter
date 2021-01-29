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
     * Private $api_endpoint
     * 
     * @var string
     */
    private $api_endpoint;

    /**
     * Private $theme_name
     * 
     * @var string
     */
    private $theme_name;

    /**
     * Private $theme_version
     * 
     * @var string
     */
    private $theme_version;

    /**
     * Register
     */
    public function register() {
        $theme               = wp_get_theme();
		$this->theme_name    = $theme->get( 'TextDomain' );
		$this->theme_version = $theme->get( 'Version' );
        $this->api_endpoint  = 'https://www.themeum.com/wp-json/themeum-license/v1/';
        
		add_filter( 'pre_set_site_transient_update_themes', array( $this, 'check_for_update' ) );
    }

    /**
     * Check update api
     * 
     * @param string
     * 
	 * @return array|bool|mixed|object
	 */
	public function check_for_update_api( $request_from = '' ) {

		$params = array(
			'body' => array(
				'action'       => 'check_update_free',
				'product_slug' => $this->theme_name,
				'request_from' => $request_from,
			),
		);

		// Make the POST request.
		$request = wp_remote_post( $this->api_endpoint . 'check-update', $params );

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
	 * @return mixed
	 */
	public function check_for_update( $transient ) {
		if ( empty( $transient->checked[$this->theme_name] ) ) {
			return $transient;
		}

		$request_body = $this->check_for_update_api( 'update_check' );

		if ( $request_body && $request_body->success ) {
			if ( version_compare( $this->theme_version, $request_body->data->version, '<' ) ) {
				$transient->response[$this->theme_name] = array(
					'new_version' => $request_body->data->version,
					'package'     => $request_body->data->download_url,
					'url'         => $request_body->data->url,
				);

			}
        }
		return $transient;
	}
}