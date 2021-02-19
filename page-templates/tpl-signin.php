<?php
/**
 * Template Name: Sign In
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Tutor_Starter
 */
if ( is_user_logged_in() ) {
    wp_redirect( home_url()) ;
    die();
}
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

        <section class="tutor-theme-signin">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tutor-theme-signin-form-area">
                            <div class="tutor-theme-signin-form-area-row">
                                <div class="tutor-theme-signin-form-area-heading">
                                    <?php esc_html_e( 'Sign in', 'tutorstarter' ); ?>
                                </div>
                                <div class="tutor-theme-signin-form">
                                    <form action="" method="post" class="tutor-signin-form">
                                        <p class="signup-status"></p>
                                        <?php wp_nonce_field( 'tutor-starter-signin-nonce', 'signin-nonce' ); ?>
                                        <div class="form-grp signin-form-email">
                                            <label for="login_email"><?php esc_html_e( 'Email', 'tutorstarter' ); ?></label>
                                            <input name="login_email" type="login_email" id="login_email" placeholder="<?php esc_attr_e( 'name@example.com', 'tutorstarter' ); ?>">
                                        </div>
                                        <div class="form-grp signin-form-password">
                                            <label for="login_password">
                                                <?php esc_html_e( 'Password', 'tutorstarter' ); ?>
                                                <?php $lostpasurl = wp_lostpassword_url( home_url() ); ?>
                                                <a href="<?php echo esc_url( $lostpasurl ); ?>">
                                                    <?php esc_html_e( 'Forgot password?', 'tutorstarter' ); ?>
                                                </a>
                                            </label>
                                            <input name="login_password" id="login_password" type="password" placeholder="<?php esc_attr_e( 'Type your password', 'tutorstarter' ); ?>">
                                        </div>
                                        <?php do_action( 'tutorstarter_auth_recaptcha' ); ?>
                                        <button type="submit" class="btn btn-primary tutor-starter-btn"><?php esc_html_e( 'Log in', 'tutorstarter' ); ?></button>
                                    </form><!-- form -->
                                </div><!-- tutor-theme-signup-form -->
                            </div><!-- tutor-theme-signup-form-area-row -->
                            <!-- tutor-theme-signin-form-area-row tutor-theme-social-signin -->
                            <div class="already-have-account-link text-center mt-3">
                                <?php esc_html_e( 'Don\'t have an account?', 'tutorstarter' ); ?> <a href="<?php echo esc_url( home_url() . '/sign-up/' ); ?>"><?php esc_html_e( 'Sign up', 'tutorstarter' ); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

		<?php wp_footer(); ?>
	</body>
</html>
