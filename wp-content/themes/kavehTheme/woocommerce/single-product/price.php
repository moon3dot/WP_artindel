<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
$sold_individually = get_post_meta( $product->get_id(), '_sold_individually', true );
$sale_price = $product->get_sale_price();
$normal_price = $product->get_regular_price();
$pr_id = get_the_ID();
$options = get_option( 'kaveh_frame' );
if($options['kaveh_pr_single_select']=='value-1'):
?>
<?php if($options['prtamas'] !== '1'): ?>
<?php if ( !$product->is_type( 'variable' ) ) : ?>
<form>
<div class="count-price d-flex align-items-sm-center justify-content-sm-between position-relative flex-column flex-sm-row">
	<div class="count d-flex align-items-center">
	<span class="titr<?php if ( $sold_individually == 'yes' ) : echo ' invisible'; endif; ?>"> تعداد </span>
	<div class="counter d-flex align-items-center">
                   
        </div>
	</div>
	
	<?php if(!empty($sale_price) ): ?>
	<div class="price d-flex align-items-center mt-3 mt-sm-0">
		قیمت
		<del> <?php echo number_format($normal_price, 0, '.', ','); ?> </del>
		<span>
		<?php echo $sale_price ?>
			<i> <?php echo get_woocommerce_currency_symbol(); ?> </i>
		</span>
		</div>
	</div>
	<?php else: ?>
		<div class="price d-flex align-items-center mt-3 mt-sm-0">
		قیمت
		<span class="mr-2">
		<?php echo number_format($normal_price, 0, '.', ','); ?>
			<i> <?php echo get_woocommerce_currency_symbol(); ?> </i>
		</span>
		</div>
	</div>
	<?php endif; ?>
<?php else: ?>
	<div class="count-price d-flex align-items-sm-center justify-content-sm-between position-relative flex-column flex-sm-row mycu">
	<div class="count d-flex align-items-center">
	<span class="titr<?php if ( $sold_individually == 'yes' ) : echo ' invisible'; endif; ?>"> تعداد </span>
	<div class="counter d-flex align-items-center">
                   
        </div>
	</div>
	<div class="price d-flex align-items-center mt-3 mt-sm-0">
	<?php
	$price_v = $product->get_price_html(); 
	echo str_replace("&ndash;","<span class=\"dashvar\"> – </span>", $price_v);
	?>
	</span>
		</div>
		</div>
	</div>
<?php endif; ?>
</form>
<?php elseif($options['prtamas'] === '1'): ?>
<div class="count-price d-flex align-items-sm-center justify-content-sm-between position-relative flex-column flex-sm-row mycu">
<div class="count d-flex align-items-center justify-content-center">
<p class="d-flex tamsho">
<?php echo $options['tamas_sho']; ?>
</p>	
</div>
</div>
<?php endif; ?>
<?php
elseif($options['kaveh_pr_single_select']=='value-2'):
?>
<div class="price-add-to-cart d-flex align-items-center justify-content-between mytu">
<?php if ( !$product->is_type( 'variable' ) ) : ?>
<div class="price">
	<?php if(!empty($sale_price) ): ?>	
	<del> <?php echo number_format($normal_price, 0, '.', ',');; ?> </del>
	<span> <?php echo $sale_price; ?> </span>
	<?php elseif(empty($sale_price)): ?>
	<span> <?php echo number_format($normal_price, 0, '.', ',');; ?> </span>
	<?php endif; ?>
	<?php echo get_woocommerce_currency_symbol(); ?>
</div>
	<form class="cart formall" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
		<div class="qacol">
		<?php
		do_action( 'woocommerce_before_add_to_cart_quantity' );
		?>
		<button class="changeinp" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"> - </button>
		<?php
		woocommerce_quantity_input(
			array(
				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
			)
		);
		?>
		<button class="changeinp" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> + </button>
		<?php
		do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>
		</div>
		<style>
			.detail-product-two .price-add-to-cart {
				position: relative;
			}
			@media only screen and (max-width: 600px) {
				.formall{
				width: 100% !important;
			}
			}
			.formall{
				position: absolute;
				left: 0px;
				bottom: 6px;
				width: 70%;
			}
			.qacol {
				position: relative !important;
				display: inline;
				top: -95px !important;
				right: 185px!important;
			}
		</style>
		<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> btn btn-succes"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>
	<?php else: ?>
	<div class="price d-flex align-items-center mt-3 mt-sm-0">
	<?php
	$price_v = $product->get_price_html(); 
	echo str_replace("&ndash;","<span class=\"dashvar\"> – </span>", $price_v);
	?>
	</div>
<?php endif; ?>


<div class="d-flex align-items-center justify-content-between flex-column-reverse flex-sm-row">

<?php
if ($date_from = get_post_meta($pr_id, '_sale_price_dates_from', true)){
	$sale_price_dates_from = date('Y-m-d 00:00:00', $date_from);
}
if ($date_to = get_post_meta($pr_id, '_sale_price_dates_to', true)){
	$sale_price_dates_to = date('Y-m-d 23:59:59', $date_to);
}
if(!empty($sale_price_dates_from)):
$deal_start_date = $sale_price_dates_from;
$deal_start_time = strtotime($deal_start_date);
$deal_end_date = $sale_price_dates_to;
$deal_end_time = strtotime($deal_end_date, current_time('timestamp'));
//$current_date = current_time( 'Y-m-d H:i:s', true );
$current_time = strtotime('NOW', current_time('timestamp'));
$time_diff = ($deal_end_time - $current_time); 
endif;
?>
<?php if (!empty($deal_end_date)): ?>
<div class="timear d-flex align-items-center justify-content-between">
<div class="title">
	پیشنهاد شگفت انگیز
	<span> فرصت باقی مانده </span>
</div>

<ul class="d-flex align-items-center" data-time="<?php  echo $deal_end_date; ?>">
	<li>
	<span class="second"> 00 </span>
	ثانیه
	</li>
	<li>
	<span class="minute"> 00 </span>
	دقیقه
	</li>
	<li>
	<span class="hour"> 00 </span>
	ساعت
	</li>
	<li>
	<span class="day"> 00 </span>
	روز
	</li>
</ul>
</div>
<?php endif; ?>
</div>

<?php endif; ?>