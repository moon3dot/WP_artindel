<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>

<!-- Start Total Price -->
<div class="cart_totals cart-two-total-price d-flex align-items-center flex-wrap flex-column flex-md-row">
	<div class="total-price d-flex align-items-center justify-content-between w-100">
	<span> جمع کل سبد خرید </span>
	<div>
	<div class="kaveh-inner-cart-tot d-inline"><?php echo WC()->cart->total; ?></div>
	<span class="fw-light"> <?php echo get_woocommerce_currency_symbol(); ?> </span>
	</div>
	</div>
	<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
	<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
	<?php do_action( 'woocommerce_after_cart_totals' ); ?>
</div>
<!-- End Total Price -->
