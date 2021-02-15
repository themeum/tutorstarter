<?php
/**
 * Template Name: Getting Started
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="profile" href="https://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>

        <section class="tutor-theme-getting-starter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="getting-started-page-heading">
                            <?php _e( 'Getting Started', 'tutorstarter' ); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tutor-theme-signing-type">
                            <a href="<?php echo esc_url( site_url() . '/instructor-registration/' ); ?>">
                                <div class="sign-type sign-as-instructor">
                                    <div class="signing-type-icon">
                                        <img src="<?php echo esc_url_raw( get_template_directory_uri() . '/assets/dist/images/path-icon.png' ); ?>" alt="<?php _e( 'Instructor Registration', 'tutorstarter' ) ?>">
                                    </div>
                                    <div class="signing-title">
                                        <?php _e( 'Sign up as an instructor', 'tutorstarter' ); ?>
                                    </div>
                                </div><!-- sign-in-as-instructor-->
                            </a>
                            <a href="<?php echo esc_url( site_url() . '/student-registration/' ); ?>">
                                <div class="sign-type sign-as-student">
                                    <div class="signing-type-icon">
                                        <img src="<?php echo esc_url_raw( get_template_directory_uri() . '/assets/dist/images/path-icon.png' ); ?>" alt="<?php _e( 'Student Registration', 'tutorstarter' ) ?>">
                                    </div>
                                    <div class="signing-title">
                                        <?php _e( 'I’m a student', 'tutorstarter' ); ?>
                                    </div>
                                </div><!-- sign-in-as-student-->
                            </a>
                        </div><!-- tutor-theme-signing-type -->
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="getting-started-footer">
                            <?php _e( 'tutor ™ 2021', 'tutorstarter' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php wp_footer(); ?>
	</body>
</html>
