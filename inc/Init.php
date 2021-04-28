<?php
/**
 * Handles all the classes initilization
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter;

defined( 'ABSPATH' ) || exit;

/**
 * Init class
 *
 * @package Tutor_Starter
 */
final class Init {

	/**
	 * Store all the classes inside an array
	 *
	 * @return array Full list of classes
	 */
	public static function get_services() {
		return array(
			Core\Tags::class,
			Setup\Setup::class,
			Setup\Menus::class,
			Core\Sidebar::class,
			Custom\Extras::class,
			Setup\Enqueue::class,
			Setup\Dashboard::class,
			Custom\Schema\Schema::class,
			Custom\Component_Handler::class,
			Custom\Page\Page_Settings::class,
			Api\Customizer\Customizer::class,
			Custom\Schema\Custom_Metabox::class,
		);
	}

	/**
	 * Loop through the classes, initialize them, and call the register() method if it exists
	 *
	 * @return void
	 */
	public static function register_services() {
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	/**
	 * Initialize the class
	 *
	 * @param  class $class   class from the services array.
	 * @return class instance   new instance of the class
	 */
	private static function instantiate( $class ) {
		return new $class();
	}
}
