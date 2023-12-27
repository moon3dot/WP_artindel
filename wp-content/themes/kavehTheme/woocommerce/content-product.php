<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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
$mkshopcart = $options['kaveh_sh_cart_select'];

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="col-sm-6 col-lg-4 mb-4">
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

