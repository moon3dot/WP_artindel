<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}
global $product;
$attachment_ids = $product->get_gallery_image_ids();
$options = get_option( 'kaveh_frame' );

if($options['kaveh_pr_single_select']=='value-1'):
?>

<!-- Start Gallery Image Items -->
<div class="swiper gallery-image-items overflow-hidden">
    <div class="swiper-wrapper">

<?php
if ( $attachment_ids && $product->get_image_id() ) {
	foreach ( $attachment_ids as $attachment_id ) {
		?>
		  <div class="swiper-slide">
        <div class="gallery-image-item">
          <img src="<?php echo wp_get_attachment_url( $attachment_id ); ?>" alt="product" />
        </div>
      </div>
		<?php
	}
}

?>

    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
  <!-- End Gallery Image Items -->


<?php elseif($options['kaveh_pr_single_select']=='value-2'): ?>


<?php elseif($options['kaveh_pr_single_select']=='value-3'): ?>
  
   

<?php endif; ?>	