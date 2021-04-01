<?php
/**
 * Handles registering header components
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Traits;

defined( 'ABSPATH' ) || exit;

/**
 * Header components trait
 */
trait Header_Components {

	/**
	 * Navbar toggler
	 */
	public static function navbar_toggler() {

		$toggler_html = '<li class="nav-close"><button class="btn-nav-close"><span class="close-btn">+</span></button></li>';

		return $toggler_html;
	}
}
