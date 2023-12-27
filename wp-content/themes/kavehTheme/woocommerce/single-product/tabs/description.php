<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */

defined( 'ABSPATH' ) || exit;

global $post;
$heading = apply_filters( 'woocommerce_product_description_heading', __( 'معرفی محصول', 'woocommerce' ) );
$options = get_option( 'kaveh_frame' );
?>
<?php if($options['kaveh_pr_single_select']=='value-1'): ?>
<!-- Start Review -->
<div class="detail-product-review position-relative">
	<div class="title">
	<i class="icon-exclamation-circle"></i>
	<?php if ( $heading ) : ?>
		<h2><?php echo esc_html( $heading ); ?></h2>
	<?php endif; ?>
	</div>
	<div class="detail-product-review-content position-relative">
	<?php the_content(); ?>
	</div>
	<button type="button" class="btn btn-dark rounded-pill">
	نمایش بیشتر
	<i class="icon-angle-down"></i>
	</button>
</div>
<!-- End Review -->
<?php elseif($options['kaveh_pr_single_select']=='value-2'): ?>
	<div class="detail-product-two-review">
      <div class="container position-relative">
        <div class="title position-relative">
        <?php if ( $heading ) : ?>
          <?php echo esc_html( $heading ); ?>
	      <?php endif; ?>
          <span class="fw-light d-block"> </span>
        </div>
        <div class="content">
        <?php the_content(); ?>
        </div>
        <button type="button" class="btn btn-outline-secondary rounded-0 fw-300 p-0 d-block">
          نمایش بیشتر
          <i class="icon-angle-down"></i>
        </button>
      </div>
    </div>
<?php elseif($options['kaveh_pr_single_select']=='value-3'): ?>

  <div class="detail-product-two-review">
      <div class="title position-relative">
      <?php if ( $heading ) : ?>
          <?php echo esc_html( $heading ); ?>
	      <?php endif; ?>
          <span class="fw-light d-block"> </span>
      </div>
      <div class="content">
      <?php the_content(); ?>
      </div>
      <button type="button" class="btn btn-outline-secondary rounded-0 fw-300 p-0 d-block">
        نمایش بیشتر
        <i class="icon-angle-down"></i>
      </button>
    </div>
<?php endif; ?>