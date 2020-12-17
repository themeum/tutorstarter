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

<?php
$page_meta      = get_post_meta( get_the_ID(), '_tutorstarter_page_metadata', true );
$disable_header = ( ! empty( $page_meta ) ? $page_meta['header_toggle'] : false );

if ( false === $disable_header ) {
	$header_style = get_theme_mod( 'header_type_select', 'header_one' );
	get_template_part( 'views/partials/header/' . $header_style );
}
?>

<div id="content" class="site-content">
