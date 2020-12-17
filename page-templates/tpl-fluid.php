<?php
/**
 * Template Name: Full Width Template
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;

get_header();
while ( have_posts() ) :
	the_post();
	the_content();
endwhile;

get_footer();
