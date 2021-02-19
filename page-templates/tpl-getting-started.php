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
                            <?php esc_html_e( 'Getting Started', 'tutorstarter' ); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tutor-theme-signing-type">
                            <a href="<?php echo esc_url( home_url() . '/instructor-registration/' ); ?>">
                                <div class="sign-type sign-as-instructor">
                                    <div class="signing-type-icon">
                                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/dist/images/path-icon.png' ); ?>" alt="<?php esc_attr_e( 'Instructor Registration', 'tutorstarter' ) ?>">
                                    </div>
                                    <div class="signing-title">
                                        <?php esc_html_e( 'Sign up as an instructor', 'tutorstarter' ); ?>
                                    </div>
                                </div><!-- sign-in-as-instructor-->
                            </a>
                            <a href="<?php echo esc_url( home_url() . '/student-registration/' ); ?>">
                                <div class="sign-type sign-as-student">
                                    <div class="signing-type-icon">
                                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/dist/images/path-icon.png' ); ?>" alt="<?php esc_attr_e( 'Student Registration', 'tutorstarter' ) ?>">
                                    </div>
                                    <div class="signing-title">
                                        <?php esc_html_e( 'I’m a student', 'tutorstarter' ); ?>
                                    </div>
                                </div><!-- sign-in-as-student-->
                            </a>
                        </div><!-- tutor-theme-signing-type -->
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="getting-started-footer">
                            <?php esc_html_e( 'tutor ™ 2021', 'tutorstarter' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php wp_footer(); ?>
	</body>
</html>
