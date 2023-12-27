<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;
global $product;
$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
echo wp_trim_words($short_description , 60);
?>

<?php if($product->is_type( 'variable' )): ?>
<div class="size d-flex align-items-center mt-4">
<?php
$attributes = $product->get_variation_attributes();
$available_variations = $product->get_available_variations();
$variations_json = wp_json_encode($available_variations);
$variations_attr = function_exists('wc_esc_json') ? wc_esc_json($variations_json) : _wp_specialchars($variations_json, ENT_QUOTES, 'UTF-8', true);
if (is_array($attributes) && (count($attributes) > 0)) {
   ?>
<form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>
   <table class="variations vcup" cellspacing="0" role="presentation">
			<tbody>
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
					<tr>
						<th class="label"><label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo wc_attribute_label( $attribute_name ); // WPCS: XSS ok. ?></label></th>
						<td class="value">
            <?php
                $attr     = 'attribute_' . sanitize_title( $attribute_name );
                $selected = isset( $_REQUEST[ $attr ] ) ? wc_clean( stripslashes( urldecode( $_REQUEST[ $attr ] ) ) ) : $product->get_variation_default_attribute( $attribute_name );
                wc_dropdown_variation_attribute_options( array(
                    'options'          => $options,
                    'attribute'        => $attribute_name,
                    'product'          => $product,
                    'selected'         => $selected,
                    'show_option_none' => esc_html__( 'Choose', 'wpc-variation-swatches' ) . ' ' . wc_attribute_label( $attribute_name )
                ) );
                ?>
						</td>
					</tr>
          </tr>
				<?php endforeach; ?>
			</tbody>
      </table>
		<?php do_action( 'woocommerce_after_variations_table' ); ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>
   <?php
}

?>
</div>
<?php endif; ?>				

				




