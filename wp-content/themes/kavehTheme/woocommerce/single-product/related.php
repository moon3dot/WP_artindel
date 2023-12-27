<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$options = get_option( 'kaveh_frame' );
$mkshopcart = $options['kaveh_sh_cart_select'];
if ( $related_products ) : ?>

	<section class="related products">

		 <!-- Start Products Proposal -->
 <div class="top-seller-home">
          <div class="container position-relative">
            <!-- Start Heading -->
            <div
              class="section-heading position-relative d-flex align-items-sm-center justify-content-sm-between flex-column flex-sm-row">
              <div class="detail">
                <h3 class="section-heading-title"> محصولات </h3>
                <h6 class="section-heading-sub-title"> مرتبط</h6>
              </div>
              <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="section-heading-link btn btn-outline-dark"> مشاهده همه </a>
            </div>
            
		<?php woocommerce_product_loop_start(); ?>
<!-- End Heading -->
            <!-- Start Products -->
            <div class="swiper swiper-products">
              <div class="swiper-wrapper">
		
			<?php foreach ( $related_products as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
					?>
					<div class="swiper-slide">
						<?php 
            switch ($mkshopcart):
            case "value-1":
              get_template_part("template-part/product-cart-one");
              break; 
            case "value-2":
              get_template_part("template-part/product-cart-two"); 
              break;
            case "value-3":
              get_template_part("template-part/product-cart-three"); 
              break;
            case "value-4":
              get_template_part("template-part/product-cart-four"); 
              break;
            case "value-5":
              get_template_part("template-part/product-cart-five"); 
              break;
            case "value-6":
              get_template_part("template-part/product-cart-six"); 
              break;
            case "value-7":
              get_template_part("template-part/product-cart-seven"); 
              break;
            case "value-8":
              get_template_part("template-part/product-cart-eight"); 
              break;
            case "value-9":
              get_template_part("template-part/product-cart-nine"); 
              break;
            case "value-10":
              get_template_part("template-part/product-cart-ten"); 
              break;
            case "value-11":
              get_template_part("template-part/product-cart-eleven"); 
              break;
            case "value-12":
              get_template_part("template-part/product-cart-twelve"); 
              break;
            case "value-13":
              get_template_part("template-part/product-cart-thirteen"); 
              break;
            case "value-14":
              get_template_part("template-part/product-cart-fourteen"); 
              break;
            case "value-15":
              get_template_part("template-part/product-cart-fifteen"); 
              break;
            case "value-16":
              get_template_part("template-part/product-cart-sixteen"); 
              break;
            endswitch;	
            ?>
          </div>


			<?php endforeach; ?>
      </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
            <!-- End Products -->
		<?php woocommerce_product_loop_end(); ?>

		
          </div>
        </div>
        <!-- End Products Proposal -->

	</section>





                



        


	<?php
endif;

wp_reset_postdata();






