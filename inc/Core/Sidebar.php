<?php
/**
 * Handles sidebar
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Core;

defined( 'ABSPATH' ) || exit;

/**
 * Sidebar class
 */
class Sidebar {

	/**
	 * Register default hooks and actions for WordPress
	 */
	public function register() {
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );
	}

	/**
	 * Define the sidebar
	 */
	public function widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', 'tutorstarter' ),
				'id'            => 'tutorstarter-sidebar',
				'description'   => esc_html__( 'Default sidebar to add all your widgets.', 'tutorstarter' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s p-2">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Page Sidebar', 'tutorstarter' ),
				'id'            => 'tutorstarter-page-sidebar',
				'description'   => esc_html__( 'Page sidebar to add page specific widgets.', 'tutorstarter' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s p-2">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Widget 1', 'tutorstarter' ),
				'id'            => 'tutorstarter-footer-widget1',
				'description'   => esc_html__( 'Footer One Widget Area', 'tutorstarter' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s p-2">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Widget 2', 'tutorstarter' ),
				'id'            => 'tutorstarter-footer-widget2',
				'description'   => esc_html__( 'Footer Two Widget Area', 'tutorstarter' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s p-2">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Widget 3', 'tutorstarter' ),
				'id'            => 'tutorstarter-footer-widget3',
				'description'   => esc_html__( 'Footer Three Widget Area', 'tutorstarter' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s p-2">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Widget 4', 'tutorstarter' ),
				'id'            => 'tutorstarter-footer-widget4',
				'description'   => esc_html__( 'Footer Four Widget Area', 'tutorstarter' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s p-2">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Social Media', 'tutorstarter' ),
				'id'            => 'tutorstarter-footer-socialmedia',
				'description'   => esc_html__( 'Footer Social Media Area', 'tutorstarter' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s p-2">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}
