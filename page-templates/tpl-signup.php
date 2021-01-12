<?php
/**
 * Template Name: Sign Up
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

        <section class="tutor-theme-signup">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tutor-theme-signup-form-area">
                            <div class="tutor-theme-signup-form-area-row">
                                <div class="tutor-theme-signup-form-area-heading">
                                    <?php _e('Sign up', 'tutorstarter'); ?>
                                </div>
                                <div class="tutor-theme-signup-form">
                                    <form action="" method="post" class="tutor-signup-form">
                                        <p class="signup-status"></p>
                                        <!-- <?php wp_nonce_field( 'ajax-register-nonce', 'security' ); ?> -->
                                        <div class="form-grp signup-form-fullname">
                                            <label for="fullname"><?php _e('Full Name', 'tutorstarter'); ?></label>
                                            <input name="fullname" id="fullname" type="text" placeholder="John Doe">
                                        </div>
                                        <div class="form-grp signup-form-email">
                                            <label for="email"><?php _e('Email', 'tutorstarter'); ?></label>
                                            <input name="email" id="email" type="email" placeholder="name@example.com">
                                        </div>
                                        <div class="form-grp signup-form-password">
                                            <label for="password"><?php _e('Password', 'tutorstarter'); ?></label>
                                            <input name="password" id="password" type="password" placeholder="Type your password">
                                        </div>
                                        <div class="form-grp signup-form-confirm-password">
                                            <label for="confirm-password"><?php _e('Confirm Password', 'tutorstarter'); ?></label>
                                            <input name="confirm_password" id="confirm-password" type="password" placeholder="Confirm your password">
                                        </div>
                                        <div class="form-grp signup-form-terms-condition">
                                            By signing up you agree to the <a href="">Terms and Conditions</a> and the <br> <a href="">  Privacy Policy</a>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><?php _e('Sign up', 'tutorstarter'); ?></button>
                                    </form><!-- form -->
                                </div><!-- tutor-theme-signup-form -->
                            </div><!-- tutor-theme-signup-form-area-row -->
                            <div class="tutor-theme-signup-form-area-row tutor-theme-social-signup mt-5">
                                <button type="submit" class="btn btn-primary">
                                    <svg width="22" height="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.7285 8.00576C19.6489 6.99252 17.7554 5.78004 14.9485 5.78004C10.9955 5.78004 7.64038 8.38775 6.42779 11.992C6.12882 12.9221 5.94618 13.9186 5.94618 14.9485C5.94618 15.9782 6.12882 16.9748 6.44439 17.905C7.64038 21.5092 10.9955 24.1168 14.9485 24.1168C17.1741 24.1168 18.8683 23.5023 20.1306 22.6219C22.1237 21.2268 23.0206 19.1506 23.1867 17.772H14.9485V12.2245H28.9834C29.1993 13.1547 29.299 14.0516 29.299 15.2806C29.299 19.8316 27.6712 23.6684 24.8477 26.2761C22.3728 28.5681 18.9845 29.8969 14.9485 29.8969C9.10191 29.8969 4.05263 26.5418 1.59447 21.6586C0.581336 19.6323 0 17.3568 0 14.9485C0 12.5401 0.581336 10.2646 1.59447 8.23821C4.05263 3.35508 9.10191 0 14.9485 0C18.9845 0 22.3563 1.47824 24.9473 3.8866L20.7285 8.00576Z" fill="white"/>
                                    </svg>
                                    <?php _e('Continue with Google', 'tutorstarter'); ?>
                                </button>
                            </div><!-- tutor-theme-signup-form-area-row tutor-theme-social-signup -->
                            <div class="already-have-account-link text-center mt-3">
                                Already have an account? <a href="">Log in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

		<?php wp_footer(); ?>
	</body>
</html>
