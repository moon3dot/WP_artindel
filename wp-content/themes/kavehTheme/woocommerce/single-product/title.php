<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce\Templates
 * @version    1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
global $product;
global $post;
$options = get_option( 'kaveh_frame' );
$catname = wp_get_post_terms( $product->get_id(), 'product_cat', array());
$catlink = get_term_link( $catname[0]->term_id , 'product_cat' );
$brname = wp_get_post_terms( $product->get_id(), 'brands', array());
if ( isset( $brname[0] ) ) {
    $brlink = get_term_link( $brname[0]->term_id , 'brands' );
}
$stocka = $product->get_stock_status();
$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();
$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

if($options['kaveh_pr_single_select']=='value-1'):
?>
<?php if ( $rating_count > 0 ) : ?>
<!-- Start Count Comments & Rate -->
<div class="count-comments-rate d-flex align-items-center">
	<div class="count-comment">
	<?php echo $review_count; ?>
	<span> نظر </span>
	</div>
	<div class="count-rate">
	<?php echo $average; ?>
	<i class="icon-star"></i>
	</div>
</div>
<!-- Start Count Comments & Rate -->
<?php endif ?>
<h1 class="name"> <?php the_title(); ?> </h1>
<br>
<ul class="full-info d-flex align-items-sm-center justify-content-sm-between position-relative flex-wrap flex-sm-nowrap">
<?php if("instock"==$stocka): ?>	
<li>
<i class="icon-check-circle"></i>
موجود در انبار
</li>
<?php elseif("onbackorder"==$stocka): ?>
<li class="obstock">
<i class="far fa-clock"></i>
در پیش خرید
</li>	
<?php else: ?>
<li class="oustock">
<i class="isax isax-close-circle"></i>
ناموجود در انبار
</li>
<?php endif; ?>
<?php if(!empty($catname[0]->name)): ?>
<li>
<span> دسته بندی </span>
<a href="<?php echo $catlink; ?>"> <?php echo $catname[0]->name; ?> </a>
</li>
<?php endif; ?>
<?php if(!empty($brname[0]->name)): ?>
<li>
<span> برند </span>
<a href="<?php echo $brlink; ?>"> <?php echo $brname[0]->name; ?> </a>
</li>
<?php endif; ?>
<?php
$cus_l = get_post_meta( get_the_ID(), "cus_lab_g", true );
$cus_v = get_post_meta( get_the_ID(), "cus_lab_g", true );
if(!empty($cus_l) and !empty($cus_v)):
?>	
<li>
<span> <?php echo $cus_l[0]['cus_lab']; ?> </span>
<a> <?php echo $cus_v[0]['cus_val']; ?> </a>
</li>
<?php
endif;
?>
</ul>
<?php
	$product_attributes = array();
	// Display weight and dimensions before attribute list.
	$display_dimensions = apply_filters( 'wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions() );

	if ( $display_dimensions && $product->has_weight() ) {
		$product_attributes['weight'] = array(
			'label' => __( 'Weight', 'woocommerce' ),
			'value' => wc_format_weight( $product->get_weight() ),
		);
	}
	if ( $display_dimensions && $product->has_dimensions() ) {
		$product_attributes['dimensions'] = array(
			'label' => __( 'Dimensions', 'woocommerce' ),
			'value' => wc_format_dimensions( $product->get_dimensions( false ) ),
		);
	}
	// Add product attributes to list.
	$attributes = array_filter( $product->get_attributes(), 'wc_attributes_array_filter_visible' );
	foreach ( $attributes as $attribute ) {
		$values = array();
		if ( $attribute->is_taxonomy() ) {
			$attribute_taxonomy = $attribute->get_taxonomy_object();
			$attribute_values   = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );

			foreach ( $attribute_values as $attribute_value ) {
				$value_name = esc_html( $attribute_value->name );

				if ( $attribute_taxonomy->attribute_public ) {
					$values[] = '<a href="' . esc_url( get_term_link( $attribute_value->term_id, $attribute->get_name() ) ) . '" rel="tag">' . $value_name . '</a>';
				} else {
					$values[] = $value_name;
				}
			}
		} else {
			$values = $attribute->get_options();

			foreach ( $values as &$value ) {
				$value = make_clickable( esc_html( $value ) );
			}
		}
		$product_attributes[ 'attribute_' . sanitize_title_with_dashes( $attribute->get_name() ) ] = array(
			'label' => wc_attribute_label( $attribute->get_name() ),
			'value' => apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values ),
		);
	}
?>
<div class="options position-relative">
<div class="title">
ویژگی‌های ﻣﺤﺼﻮل
</div>
<ul class="d-flex align-items-center flex-wrap">
<?php $countme=0; ?>	
<?php foreach ( $product_attributes as $product_attribute_key => $product_attribute ) : ?>
<?php if($countme < 8): ?>	
<li> <?php echo $product_attribute['label']; ?> : <?php echo str_replace( 'p>' , 'span>' , $product_attribute['value'] ); ?> </li>
<?php $countme += 1; ?>
<?php endif; ?>
<?php endforeach; ?>
</ul>
</div>
<div class="options position-relative">
<?php if($short_description): ?>
<div class="title">
توضیحات کوتاه
</div>
<?php endif; ?>
<div class="title tozi">
<?php woocommerce_template_single_excerpt() ?>
</div>
</div>

			
<?php		
elseif($options['kaveh_pr_single_select']=='value-2'):
?>


<h1 class="detail-product-two-name"> <?php the_title(); ?> </h1>
<ul class="info d-flex align-items-center justify-content-between">

<?php if(!empty($catname[0]->name)): ?>
<li>
<span> دسته بندی </span>
<a href="<?php echo $catlink; ?>"> <?php echo $catname[0]->name; ?> </a>
</li>
<?php endif; ?>
<?php if(!empty($brname[0]->name)): ?>
<li>
<span> برند </span>
<a href="<?php echo $brlink; ?>"> <?php echo $brname[0]->name; ?> </a>
</li>
<?php endif; ?>
<?php
$cus_l = get_post_meta( get_the_ID(), "cus_lab_g", true );
$cus_v = get_post_meta( get_the_ID(), "cus_lab_g", true );
if(!empty($cus_l) and !empty($cus_v)):
?>	
<li>
<span> <?php echo $cus_l[0]['cus_lab']; ?> </span>
<a> <?php echo $cus_v[0]['cus_val']; ?> </a>
</li>
<?php
endif;
?>
</ul>
<div class="row">
<div class="col-sm-6">
<div class="options-product">
<div class="title"> ویژگی‌های ﻣﺤﺼﻮل </div>
<?php
	$product_attributes = array();
	// Display weight and dimensions before attribute list.
	$display_dimensions = apply_filters( 'wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions() );

	if ( $display_dimensions && $product->has_weight() ) {
		$product_attributes['weight'] = array(
			'label' => __( 'Weight', 'woocommerce' ),
			'value' => wc_format_weight( $product->get_weight() ),
		);
	}
	if ( $display_dimensions && $product->has_dimensions() ) {
		$product_attributes['dimensions'] = array(
			'label' => __( 'Dimensions', 'woocommerce' ),
			'value' => wc_format_dimensions( $product->get_dimensions( false ) ),
		);
	}
	// Add product attributes to list.
	$attributes = array_filter( $product->get_attributes(), 'wc_attributes_array_filter_visible' );
	foreach ( $attributes as $attribute ) {
		$values = array();
		if ( $attribute->is_taxonomy() ) {
			$attribute_taxonomy = $attribute->get_taxonomy_object();
			$attribute_values   = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );

			foreach ( $attribute_values as $attribute_value ) {
				$value_name = esc_html( $attribute_value->name );

				if ( $attribute_taxonomy->attribute_public ) {
					$values[] = '<a href="' . esc_url( get_term_link( $attribute_value->term_id, $attribute->get_name() ) ) . '" rel="tag">' . $value_name . '</a>';
				} else {
					$values[] = $value_name;
				}
			}
		} else {
			$values = $attribute->get_options();

			foreach ( $values as &$value ) {
				$value = make_clickable( esc_html( $value ) );
			}
		}
		$product_attributes[ 'attribute_' . sanitize_title_with_dashes( $attribute->get_name() ) ] = array(
			'label' => wc_attribute_label( $attribute->get_name() ),
			'value' => apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values ),
		);
	}
?>
<ul>
<?php $countme=0; ?>	
<?php foreach ( $product_attributes as $product_attribute_key => $product_attribute ) : ?>
<?php if($countme < 4): ?>	
<li> <?php echo $product_attribute['label']; ?> : <?php echo str_replace( 'p>' , 'span>' , $product_attribute['value'] ); ?> </li>
<?php $countme += 1; ?>
<?php endif; ?>
<?php endforeach; ?>
</ul>
</div>
</div>
<div class="col-sm-6">
	
<div class="status d-flex align-items-center mb-4">
<span class="titr"> وضعیت </span>
<?php if("instock"==$stocka): ?>	
<div> موجود در انبار </div>
<?php elseif("onbackorder"==$stocka): ?>
<div> در پیش خرید</div>
<?php else: ?>
<div class="nam"> ناموجود در انبار </div>
<?php endif; ?>
</div>
<?php if($product->is_type( 'variable' )): ?>
	<div class="colors-product d-flex align-items-center">
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
	<br>
	<br>

</div>
</div>

<?php
elseif($options['kaveh_pr_single_select']=='value-3'):
global $post;
?>
<h1 class="detail-product-three-name"> <?php the_title(); ?></h1>
<div class="d-flex align-items-center justify-content-between">
	<div class="status d-flex align-items-center">
	<span class="titr"> وضعیت </span>
	<?php if("instock"==$stocka): ?>	
	<div> موجود در انبار </div>
	<?php elseif("onbackorder"==$stocka): ?>
	<div> در پیش خرید</div>
	<?php else: ?>
	<div class="nam"> ناموجود در انبار </div>
	<?php endif; ?>
	</div>
	<?php $skuid = get_the_ID(); ?>
	<div class="code-product"> کد محصول <?php echo $skuid; ?> </div>
</div>
<div class="options-product">
<div class="title"> ویژگی‌های ﻣﺤﺼﻮل </div>
	<?php
	$product_attributes = array();
	// Display weight and dimensions before attribute list.
	$display_dimensions = apply_filters( 'wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions() );

	if ( $display_dimensions && $product->has_weight() ) {
		$product_attributes['weight'] = array(
			'label' => __( 'Weight', 'woocommerce' ),
			'value' => wc_format_weight( $product->get_weight() ),
		);
	}
	if ( $display_dimensions && $product->has_dimensions() ) {
		$product_attributes['dimensions'] = array(
			'label' => __( 'Dimensions', 'woocommerce' ),
			'value' => wc_format_dimensions( $product->get_dimensions( false ) ),
		);
	}
	// Add product attributes to list.
	$attributes = array_filter( $product->get_attributes(), 'wc_attributes_array_filter_visible' );
	foreach ( $attributes as $attribute ) {
		$values = array();
		if ( $attribute->is_taxonomy() ) {
			$attribute_taxonomy = $attribute->get_taxonomy_object();
			$attribute_values   = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );

			foreach ( $attribute_values as $attribute_value ) {
				$value_name = esc_html( $attribute_value->name );

				if ( $attribute_taxonomy->attribute_public ) {
					$values[] = '<a href="' . esc_url( get_term_link( $attribute_value->term_id, $attribute->get_name() ) ) . '" rel="tag">' . $value_name . '</a>';
				} else {
					$values[] = $value_name;
				}
			}
		} else {
			$values = $attribute->get_options();

			foreach ( $values as &$value ) {
				$value = make_clickable( esc_html( $value ) );
			}
		}
		$product_attributes[ 'attribute_' . sanitize_title_with_dashes( $attribute->get_name() ) ] = array(
			'label' => wc_attribute_label( $attribute->get_name() ),
			'value' => apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values ),
		);
	}
?>
	<ul>
	<?php $countme=0; ?>	
	<?php foreach ( $product_attributes as $product_attribute_key => $product_attribute ) : ?>
	<?php if($countme < 5): ?>	
	<li> <?php echo $product_attribute['label']; ?> : <?php echo str_replace( 'p>' , 'span>' , $product_attribute['value'] ); ?></li>
	<?php $countme += 1; ?>
	<?php endif; ?>
	<?php endforeach; ?>
	</ul>

	
</div>
<div class="brands d-flex align-items-center justify-content-between">
<?php if(!empty($brname[0]->name)): ?>
	<span>
	برند محصول :
	<a href="<?php echo $brlink; ?>"> <?php echo $brname[0]->name; ?> </a>
	</span>
	<?php endif; ?>
	<?php $short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?>
           <?php 
            echo wp_trim_words($short_description , 30);
            ?>
</div>
	
<?php
endif;

