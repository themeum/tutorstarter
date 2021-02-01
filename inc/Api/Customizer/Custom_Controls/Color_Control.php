<?php
/**
 * Color control with alpha
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Api\Customizer\Custom_Controls;

use WP_Customize_Control;

defined( 'ABSPATH' ) || exit;

/**
 * Color custom control
 */
class Color_Control extends WP_Customize_Control {

	/**
	 * Public $type
	 *
	 * @var string control type
	 */
	public $type = 'tutorstarter_color_alpha';

	/**
	 * Public $deafult
	 *
	 * @var array
	 */
    public $default = '';

	/**
	 * Send PHP data to JS
	 */
	public function to_json() {
		parent::to_json();
        $this->json['default'] = $this->default;
	}

	/**
	 * Render content to override the default
	 * and create one using react
	 */
	public function render_content() {
	}
}

