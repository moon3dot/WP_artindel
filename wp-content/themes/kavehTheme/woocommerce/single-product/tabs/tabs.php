<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$options = get_option( 'kaveh_frame' );

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>
<?php if($options['kaveh_pr_single_select']=='value-1'): ?>

	<div class="mt-5"></div>
	<div class="woocommerce-tabs wc-tabs-wrapper mt-5">
		<!-- Start Specifications & Comments -->
		<ul class="nav nav-pills justify-content-center">
			<?php $countne=0; ?>
			<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
			<li class="nav-item" role="presentation" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
			<a href="#tab-<?php echo esc_attr( $key ); ?>" class="nav-link <?php if($countne==0): ?>active<?php endif; ?>" data-bs-toggle="pill"> <?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?> </a>
			</li>
			<?php $countne += 1 ; ?>
			<?php endforeach; ?>
		</ul>

		<?php $countnee=0; ?>
		<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
			<div class="tab-content">
			<div class="tab-pane fade <?php if($countnee==0): ?>show active<?php endif; ?>" id="tab-<?php echo esc_attr( $key ); ?>"  role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<?php
				if ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?>
			</div>
			<?php $countnee += 1 ; ?>
			</div>
		<?php endforeach; ?>

		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>
	<?php elseif($options['kaveh_pr_single_select']=='value-2'): ?>
		<div class="container">

		<div class="mt-5"></div>
	<div class="woocommerce-tabs wc-tabs-wrapper mt-5">
		<!-- Start Specifications & Comments -->
		<ul class="nav nav-pills justify-content-center">
			<?php $countne=0; ?>
			<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
			<li class="nav-item" role="presentation" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
			<a href="#tab-<?php echo esc_attr( $key ); ?>" class="nav-link <?php if($countne==0): ?>active<?php endif; ?>" data-bs-toggle="pill"> <?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?> </a>
			</li>
			<?php $countne += 1 ; ?>
			<?php endforeach; ?>
		</ul>
		<?php $countnee=0; ?>
		<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
			<div class="tab-content">
			<div class="tab-pane fade <?php if($countnee==0): ?>show active<?php endif; ?>" id="tab-<?php echo esc_attr( $key ); ?>"  role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<?php
				if ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?>
			</div>
			<?php $countnee += 1 ; ?>
			</div>
		<?php endforeach; ?>

		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>
	</div>
	<?php elseif($options['kaveh_pr_single_select']=='value-3'): ?>

		<div class="mt-5"></div>
	<div class="woocommerce-tabs wc-tabs-wrapper mt-5">
		<!-- Start Specifications & Comments -->
		<ul class="nav nav-pills justify-content-center">
			<?php $countne=0; ?>
			<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
			<li class="nav-item" role="presentation" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
			<a href="#tab-<?php echo esc_attr( $key ); ?>" class="nav-link <?php if($countne==0): ?>active<?php endif; ?>" data-bs-toggle="pill"> <?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?> </a>
			</li>
			<?php $countne += 1 ; ?>
			<?php endforeach; ?>
		</ul>

		<?php $countnee=0; ?>
		<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
			<div class="tab-content">
			<div class="tab-pane fade <?php if($countnee==0): ?>show active<?php endif; ?>" id="tab-<?php echo esc_attr( $key ); ?>"  role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<?php
				if ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?>
			</div>
			<?php $countnee += 1 ; ?>
			</div>
		<?php endforeach; ?>

		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>

<?php endif; ?>
<?php endif; ?>




  