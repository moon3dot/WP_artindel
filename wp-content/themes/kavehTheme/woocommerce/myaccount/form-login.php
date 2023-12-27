<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
  <?php do_action( 'woocommerce_before_customer_login_form' ); ?> 
  <!-- Start Login -->
  <section class="auth mt-4">
      <div class="container">
      <?php if(function_exists('get_breadcrumb')){get_breadcrumb();}?>
        <div class="auth-wrapper bg-white position-relative">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/login.png" alt="login" class="d-block mx-auto" />
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
              <h4> <?php esc_html_e( 'Login', 'woocommerce' ); ?> </h4>
              <p> با ورود و یا ثبت نام در سایت شما شرایط و قوانین استفاده از سرویس های ما را می‌پذیرید </p>
           
			  <form method="post" class="woocommerce-form woocommerce-form-login">
			  <?php do_action( 'woocommerce_login_form_start' ); ?>
                <div class="form-group position-relative">
                  <label for="username"> <?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span> </label>
				  <input type="text" class="form-control rounded-pill" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</div>
                <div class="form-group position-relative mb-4">
                  <label for="password"> <?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span> </label>
                  <input type="password" name="password" id="password" autocomplete="current-password" class="form-control rounded-pill" />
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="rememmber" id="rememmber" />
                  <label for="rememmber" class="form-check-label">
				  <?php esc_html_e( 'Remember me', 'woocommerce' ); ?>
                  </label>
                </div>
                <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<button type="submit" class="btn btn-success w-100 d-block rounded-pill p-0" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
                <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="forget fw-light d-block"> <?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?> </a>
				<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
                <div class="text-user fw-light">
                  کاربر جدید هستید؟
                  <a href="/register" class="fw-bold"> ثبت نام کنید </a>
                </div>
				<?php endif; ?>
				<?php do_action( 'woocommerce_login_form_end' ); ?>
              </form>
		
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Login -->
    <?php do_action( 'woocommerce_after_customer_login_form' ); ?>