<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;
global $product;
$options = get_option( 'kaveh_frame' );


if($options['kaveh_pr_single_select']=='value-1'):
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<!-- Start Gallery Image -->
<div class="col-lg-5 mb-auto">
	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>
</div>
<!-- End Gallery Image -->

<!-- Start Detail -->
<div class="col-lg-7 pt-3">
<div class="detail">
	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>
	</div>
	</div>
<!-- End Detail -->


	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>



<?php do_action( 'woocommerce_after_single_product' ); ?>


<?php elseif($options['kaveh_pr_single_select']=='value-2'): ?>
<?php
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>


	<div class="row">
        <div class="col-lg-5">
		<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			?>
        </div>
        <div class="col-lg-7 detail-product-two-left">
		<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action( 'woocommerce_single_product_summary' );
				?>
          
         
        
        </div>
      </div>
    </div>
    <div class="options-box">
      <div class="container">
        <ul class="d-flex align-items-center justify-content-between flex-wrap">
		<?php
			if(!empty($options['pro-pic-repeater'])):
			$productfebox = $options['pro-pic-repeater'];
            for ($i = 0; $i < count($productfebox); $i++) {
                ?>
             	<li>
					<i class="<?php echo $productfebox[$i]['pro-pic-icon']; ?>"></i>
					<span> <?php echo $productfebox[$i]['pro-pic-text']; ?> </span>
				</li>
                <?php
            }
			endif;
            ?>
	      
    
        </ul>
      </div>
    </div>

<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>



<?php do_action( 'woocommerce_after_single_product' ); ?>


<?php elseif($options['kaveh_pr_single_select']=='value-3'): ?>
<?php
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>


	<div class="row">
		
		<div class="col-lg-4 col-xl-3 order-2 order-lg-1">
				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				woocommerce_template_single_title();
				?>
		</div>

		<div class="col-lg-5 col-xl-6 order-1 order-lg-2">
			
			<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			?>

		</div>

		<div class="col-lg-3 order-3 order-lg-3">
		<?php require_once( get_template_directory() . '/woocommerce/single-product/col3.php'); ?>
			
		</div>


	</div>
	<div class="options-box">
          <ul class="d-flex align-items-center justify-content-between flex-wrap">
        	 <?php
			if(!empty($options['pro-pic-repeater'])):
			$productfebox = $options['pro-pic-repeater'];
            for ($i = 0; $i < count($productfebox); $i++) {
                ?>
             	<li>
					<i class="<?php echo $productfebox[$i]['pro-pic-icon']; ?>"></i>
					<span> <?php echo $productfebox[$i]['pro-pic-text']; ?> </span>
				</li>
                <?php
            }
			endif;
            ?>
          </ul>
        </div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>



<?php do_action( 'woocommerce_after_single_product' ); ?>


<?php endif; ?>	

