<?php
/**
 * The header for the theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;

$page_meta           = get_post_meta( get_the_ID(), '_tutorstarter_page_metadata', true );
$disable_header      = ( ! empty( $page_meta['header_toggle'] ) ? $page_meta['header_toggle'] : false );
$trans_header_toggle = ( ! empty( $page_meta['header_trans_toggle'] ) ? $page_meta['header_trans_toggle'] : false );

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">
		<?php _e( 'Skip to content', 'tutorstarter' ); ?>
	</a>

<?php if ( false === $disable_header ) {
	if ( true === $trans_header_toggle ) {
		get_template_part( 'views/partials/header/header_transparent' );
	} else {
		$header_style = get_theme_mod( 'header_type_select', 'header_default' );
		'header_transparent' === $header_style ? get_template_part( 'views/partials/header/header_transparent' ) : get_template_part( 'views/partials/header/header_default' );
	}
}
?>
<div id="content" class="site-content">
