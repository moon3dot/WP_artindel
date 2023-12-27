<?php
 /**
 * Show cart contents / loop Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_loop_fragment' );
function woocommerce_header_add_to_cart_loop_fragment( $fragments ) {
  global $woocommerce;
	ob_start();
	?>
<ul class="tot-aj-cc">
<?php
  if ( WC()->cart->get_cart_contents_count() == 0 ) {
    ?>
    <div class="align-items-center">
    <img class="mx-auto w-50 d-block text-center position-relative mn-r" src="<?php echo get_template_directory_uri() . '/assets/images/emptybag.png'; ?>" alt="">
    <h6 class="text-center position-relative mn-r">هیچ محصولی در سبد نیست</h6>
    </div>
    <?php
  }
  ?>
<?php
foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
  $product = $cart_item['data'];
  $product_id = $cart_item['product_id'];
  $variation_id = $cart_item['variation_id'];
  $quantity = $cart_item['quantity'];
  $price = WC()->cart->get_product_price( $product );
  $subtotal = WC()->cart->get_product_subtotal( $product, $cart_item['quantity'] );
  $link = $product->get_permalink( $cart_item );
  // Anything related to $product, check $product tutorial
  $attributes = $product->get_attributes();
  $meta = wc_get_formatted_cart_item_data( $cart_item );
  $sale_price = $product->get_sale_price();
  $normal_price = $product->get_regular_price();
?>

<li class="position-relative">
<a href="<?php echo wc_get_cart_remove_url( $cart_item_key ); ?>" type="button" class="delete position-absolute text-center rounded-pill fw-light remove" aria-label="حذف این آیتم" data-cart-item-key="<?php echo esc_attr( $cart_item_key ); ?>" data-product_id="<?php if($variation_id == 0): echo $product_id; else: echo $variation_id; endif; ?>"> حذف </a>
    <img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'thumbnail' ); echo $image[0]; ?>" alt="product" />
      <div class="detail">
          <h2>
            <a href="#"> <?php echo $product->name; ?> </a>
          </h2>
          <?php if ( !$product->is_type( 'variable' ) ) { ?>
           <?php if(!empty($sale_price) ) { ?>
            <div class="offer">
            <?php echo number_format($normal_price, 0, '.', ',');; ?>
            </div>
            <div class="price">
            <?php echo number_format($sale_price, 0, '.', ','); ?>
              <span> <?php echo get_woocommerce_currency_symbol(); ?> </span>
            </div> 
            <?php }else{
              ?>
              <div class="price">
            <?php echo number_format($normal_price, 0, '.', ',');; ?>
              <span> <?php echo get_woocommerce_currency_symbol(); ?> </span>
            </div> 
              <?php
            }
            ?>
            <?php }else{ 
              $price_v = $product->get_price_html(); 
              echo str_replace("&ndash;","<span class=\"dashvar\"> – </span>", $price_v);
             } ?>
      </div>
</li>
<?php 
}
?>
</ul>
<script>
  jQuery(document).ready(function($){
    jQuery('.remove').click(function(e){
        e.preventDefault();
        var product_id = jQuery(this).data('cart-item-key');
        jQuery.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',  
            data: {
                action: 'wc_remove_cart_item_dropdwon',
                product_id: product_id,
            },
            beforeSend: function(response){
              jQuery('.tot-aj-cc').html('<br><div id="loading"></div><br>');
            },
            success: function(response) {
              if ( response.result === 'success' ) {
              jQuery('.tot-aj-cc').html(response.cart_contents);
              jQuery('.price.tot-aj').html(response.cart_total);
              jQuery('.cart-aj-span').html(response.cart_count);
              }
            }, 
        });
    });
});
</script>
<?php	$fragments['.tot-aj-cc'] = ob_get_clean();
ob_start();
?>
<span class="cart-aj-span"> <?php echo WC()->cart->get_cart_contents_count(); ?> </span>	<?php
$fragments['.cart-aj-span'] = ob_get_clean();
ob_start();
?>
  <div class="price tot-aj">
  <?php echo WC()->cart->total; ?>
    <span> <?php echo get_woocommerce_currency_symbol(); ?> </span>
  </div>

<?php	$fragments['.tot-aj'] = ob_get_clean();
	return $fragments;
}


 /**
 * Show cart contents / loop Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_footer_mobile_cart_num' );
function woocommerce_footer_mobile_cart_num( $fragments ) {
  global $woocommerce;
    ob_start();
    ?>
    <span class="tot-mob"> <?php echo WC()->cart->get_cart_contents_count(); ?> </span><?php
    $fragments['.tot-mob'] = ob_get_clean();
    return $fragments;
  }
 


 /**
 * Show cart contents / loop Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_footer_mobile_cart_content' );
function woocommerce_footer_mobile_cart_content( $fragments ) {
  global $woocommerce;
    ob_start();
    ?>        <div class="cart-sliding-content bg-white position-absolute top-0 start-0 w-100 h-100 myslicart">
              <!-- Start Heading -->
                <div class="cart-sliding-content-heading d-flex align-items-center justify-content-between">
                    <div class="right">
                        <div class="count-products rounded-pill text-center">
                        <b> <?php echo WC()->cart->get_cart_contents_count(); ?> </b>
                        محصول
                        </div>
                        <a href="<?php echo wc_get_cart_url(); ?>">
                        مشاهده‌ی سبد خرید
                        <i class="icon-angle-left"></i>
                        </a>
                    </div>
                    <button type="button" class="btn btn-danger rounded-circle p-0">
                        <i class="icon-close"></i>
                    </button>
                </div>
                <!-- End Heading -->
               <?php
                if ( WC()->cart->get_cart_contents_count() == 0 ) {
                ?>
                <div class="align-items-center">
                    <img class="mx-auto w-50 d-block text-center position-relative mn-r" src="<?php echo get_template_directory_uri() . '/assets/images/emptybag.png'; ?>" alt="">
                    <h6 class="text-center position-relative mn-r">هیچ محصولی در سبد نیست</h6>
                    </div>
                <?php
                }
                else{
                    ?>
                    
                    <!-- Start Products -->
                    <div class="nav-header-cart-dropdown-two-products">
                    <?php
                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $product = $cart_item['data'];
                    $product_id = $cart_item['product_id'];
                    $variation_id = $cart_item['variation_id'];
                    $quantity = $cart_item['quantity'];
                    $price = WC()->cart->get_product_price( $product );
                    $subtotal = WC()->cart->get_product_subtotal( $product, $cart_item['quantity'] );
                    $link = $product->get_permalink( $cart_item );
                    // Anything related to $product, check $product tutorial
                    $attributes = $product->get_attributes();
                    $meta = wc_get_formatted_cart_item_data( $cart_item );
                    $sale_price= $product->get_sale_price();
                    $normal_price= $product->get_regular_price();
                    $product_variation = wc_get_product( $variation_id );
                    if(!empty($product_variation)):
                    $v_pname = $product_variation->get_attribute_summary();
                    endif;
                    ?>   
                    <div class="nav-header-cart-dropdown-two-products-item position-relative">
                           <?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
                    '<a href="%s" class="delete position-absolute top-0 start-0 fw-light" aria-label="%s" data-product_id="%s" data-product_sku="%s" data-cart-item-key="%s" > حذف </a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'woocommerce' ),
										esc_attr( $product_id ),
										esc_attr( $product->get_sku() ),
										esc_attr( $cart_item_key )
									),
									$cart_item_key
								);
							?>
                        <div class="info d-flex align-items-center">
                        <img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'thumbnail' ); echo $image[0]; ?>" alt="product" />
                        <div class="detail">
                            <h2 class="overflow-hidden">
                            <a href="<?php echo $link; ?>"> <?php echo $product->get_name(); ?> </a>
                            </h2>
                            <div class="counter d-flex align-items-center">
                           <button class="changeinp" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"> - </button>
                            <?php
                            if ( $product->is_sold_individually() ) {
                            $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                            } else {
                            $product_quantity = woocommerce_quantity_input(
                                array(
                                'input_name'   => "cart[{$cart_item_key}][qty]",
                                'input_value'  => $cart_item['quantity'],
                                'max_value'    => $product->get_max_purchase_quantity(),
                                'min_value'    => '0',
                                'product_name' => $product->get_name(),
                                ),
                                $product,
                                false
                            );
                            }

                            echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                            ?>
                        <button class="changeinp" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> + </button>
                            </div>
                        </div>
                        </div>
                        <div class="color-price d-flex align-items-center">
                        <div class="color d-flex align-items-center rounded-pill fw-light">
                            <?php  if(!empty($product_variation)): ?>
                            <?php echo $v_pname; ?>
                            <?php endif ?>

                        </div>
                        <div class="price d-flex align-items-center fw-light">
                          <?php if ( !$product->is_type( 'variable' ) ) { ?>
                            <?php if(!empty($sale_price) ) { ?>
                            <del> <?php echo number_format($normal_price, 0, '.', ',');; ?> </del>
                            <span> <?php echo number_format($sale_price, 0, '.', ','); ?> </span>
                            <?php echo get_woocommerce_currency_symbol(); ?>
                            <?php } ?>
                          <?php }else{
                            $price_v = $product->get_price_html(); 
                            echo str_replace("&ndash;","<span class=\"dashvar\"> – </span>", $price_v);
                          } ?>
                            
                        </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                  
                    </div>
                    <!-- End Products -->
                    <div class="total-price d-flex align-items-center justify-content-between position-relative">
                    <span> جمع کل سبد خرید </span>
                    <div>
                        <?php echo WC()->cart->total; ?>
                        <span class="fw-light"> <?php echo get_woocommerce_currency_symbol(); ?> </span>
                    </div>
                    </div>
                    <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn btn-success-2 w-100 d-block fw-bold position-relative"> <?php esc_html_e( 'Proceed to checkout', 'woocommerce' ); ?> </a>
                    </div>

                    <?php
                }
            ?>
    <?php
    $fragments['.myslicart'] = ob_get_clean();
    return $fragments;
  }
 

