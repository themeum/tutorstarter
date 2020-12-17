<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'qubelystarters-sidebar' ) ) :
	return;
endif;
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'qubelystarters-sidebar' ); ?>
</aside><!-- #secondary -->
