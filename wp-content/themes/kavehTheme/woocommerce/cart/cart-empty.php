<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
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

defined( 'ABSPATH' ) || exit;



if ( wc_get_page_id( 'shop' ) > 0 ) : ?>

<section class="cart-two">
      <div class="container">
        <div class="cart-two-wrapper bg-white">
          <!-- Start Title -->
          <div class="cart-two-title d-flex align-items-center justify-content-between">
            <h2 class="text-white mb-0 text-nowrap me-md-3 me-lg-0"> سبد خرید </h2>
            <p class="text-white mb-0 fw-light d-none d-md-block">نمایش این مرحله به منظور اتمام سفارش نیست حتما مرحله تسویه حساب را تکمیل کنید</p>
          </div>
          <!-- End Title -->
          <div class="cart-two-content mx-auto w-100">
            <!-- Start Count Products -->
            <div class="cart-two-count-products d-flex align-items-center">
              <i class="icon-cart-2 bg-white rounded-circle d-flex align-items-center justify-content-center"></i>
              <div class="detail">
                <div class="title text-white fw-light"> تعداد محصولات سبد خرید </div>
                <div class="value text-white"> 0 محصول </div>
              </div>
            </div>
            <!-- End Count Products -->

            <img class="text-center mx-auto w-25 d-block" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/emptybag.png" alt="">
            <h5 class="text-center">هیچ محصولی در سبد خرید شما نیست</h5>
            <a href="<?php $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) ); echo $shop_page_url; ?>" type="button" class="btn btn-success-2 fw-bold shadow-none text-nowrap mbmt mx-auto text-center d-block w-25"> بازگشت به فروشگاه</a>	
                
         
          </div>
        </div>
      </div>
    </section>


<?php endif; ?>
