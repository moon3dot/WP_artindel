<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.4.0
 */

defined( 'ABSPATH' ) || exit;
?>
	<section class="cart-two">
  <?php if(function_exists('get_breadcrumb')){get_breadcrumb();}?>
  <?php do_action( 'woocommerce_before_cart' ); ?>
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
                <div class="value text-white"> <div class="kaveh-cart-countt d-inline"><?php echo WC()->cart->get_cart_contents_count(); ?></div> محصول </div>
              </div>
            </div>
            <!-- End Count Products -->
           
			<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
      <?php do_action( 'woocommerce_before_cart_table' ); ?>
      <?php do_action( 'woocommerce_before_cart_contents' ); ?>
      <div class="kaveh-cart-inner">
      <?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) { 
      $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
        $sale_price= $_product->get_sale_price();
        $normal_price = $_product->get_regular_price();
				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
            
            <!-- Start Products -->
            <div class="cart-two-products cart_item">
              <!-- Start Product -->
              <div class="cart-two-products-item d-flex align-items-center position-relative bg-white flex-column flex-lg-row">
              <?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
                    '<a href="%s" class="delete position-absolute text-center rounded-pill fw-light remove-cart-item" aria-label="%s" data-product_id="%s" data-product_sku="%s" data-cart-item-key="%s" > حذف </a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'woocommerce' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() ),
										esc_attr( $cart_item_key )
									),
									$cart_item_key
								);
							?>
                
                  <?php
                  if(!empty($sale_price) ) { ?>
                  <div class="offer position-relative position-absolute text-center text-white fw-bold">
                  <?php
                  $percentage = round( ( ( $_product->get_regular_price() - $_product->get_sale_price() ) / $_product->get_regular_price() ) * 100 );
                  echo $percentage;
                  ?>٪
                   </div>
                  <?php } ?> 
               
                <img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'thumbnail' ); echo $image[0]; ?>" alt="product" class="w-100">
                <div class="detail d-flex align-items-center justify-content-between w-100 flex-column flex-sm-row">
                  <div class="info">
                    <h2 class="text-center text-sm-start">
                      <a href="<?php echo $product_permalink; ?>"> <?php echo $_product->get_name(); ?> </a>
                    </h2>
                    <div class="price fw-light text-center text-sm-start mb-3 mb-sm-0">
                    <?php if ( !$_product->is_type( 'variable' ) ) { ?>
                     <?php if(!empty($sale_price) ) { ?>
                      <del> <?php echo number_format($normal_price, 0, '.', ',');; ?> </del>
                      <span>  <?php echo number_format($sale_price, 0, '.', ','); ?> </span>
                      <?php echo get_woocommerce_currency_symbol(); ?>
                      <?php }else{  ?>
                      <span>  <?php echo number_format($normal_price, 0, '.', ',');; ?> </span>
                      <?php echo get_woocommerce_currency_symbol(); ?>
                    <?php } ?>
                    <?php }else{ 
                      $price_v = $_product->get_price_html(); 
                      echo str_replace("&ndash;","<span class=\"dashvar\"> – </span>", $price_v);
                    } ?>
                    </div>
                    
                  </div>
                  <div class="count d-flex align-items-center">
                  <button class="changeinp" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"> - </button>
                    <?php
                    if ( $_product->is_sold_individually() ) {
                      $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                    } else {
                      $product_quantity = woocommerce_quantity_input(
                        array(
                          'input_name'   => "cart[{$cart_item_key}][qty]",
                          'input_value'  => $cart_item['quantity'],
                          'max_value'    => $_product->get_max_purchase_quantity(),
                          'min_value'    => '0',
                          'product_name' => $_product->get_name(),
                        ),
                        $_product,
                        false
                      );
                    }

                    echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                    ?>
                  <button class="changeinp" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> + </button>

                  </div>
                </div>
              </div>
              <!-- End Product -->
            
            </div>
            <!-- End Products -->
            <?php
				}
			}
			?>    
      </div>

			<!-- Start Offer Code -->
			<div class="cart-two-offer-code d-flex align-items-center">
			<?php if ( wc_coupons_enabled() ) { ?>
              <input type="text" name="coupon_code" value="" class="form-control fw-light rounded-pill" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>">
              <button type="submit" class="btn btn-danger rounded-pill fw-light rounded-pill text-nowrap" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"> <?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?> </button>
			  <?php do_action( 'woocommerce_cart_coupon' ); ?>
			<?php } ?>
			<button type="submit" class="btn btn-success-2 rounded-pill rounded-pill text-nowrap flex-fill msfil" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
			<?php do_action( 'woocommerce_cart_actions' ); ?>
			<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
			</div>
      <!-- End Offer Code -->
			</form>
            <div class="cart-collaterals">
			<?php
				/**
				 * Cart collaterals hook.
				 *
				 * @hooked woocommerce_cross_sell_display
				 * @hooked woocommerce_cart_totals - 10
				 */
				do_action( 'woocommerce_cart_collaterals' );
			?>
		</div>

		<?php do_action( 'woocommerce_after_cart' ); ?>
          </div>
        </div>
      </div>
    </section>

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>


