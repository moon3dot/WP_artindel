<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$options = get_option( 'kaveh_frame' );
if(!empty($options['kaveh_panel_select'])):
$mkpanel = $options['kaveh_panel_select'];
if($mkpanel =='value-1'):

do_action( 'woocommerce_before_account_navigation' );


     $icons = [
	'dashboard' => '<i class="icon-home-3"></i>',
	'orders' => '<i class="icon-cart-5"></i>',
	'downloads' => '<i class="icon-comments"></i>',
	'edit-address' => '<i class="icon-cpu"></i>',
	'edit-account' => '<i class="icon-user-fill-2"></i>',
	'wishlist' => '<i class="iconly iconly-Heart"></i>',
	'customer-logout' => '<i class="icon-off"></i>',
  	];


  

  
  $sssl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


?>
<nav class="panel-sidebar-nav position-relative">
	<ul>
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li>
				<?php 
				$menu_slugs = wc_get_account_endpoint_url( $endpoint );
				?>
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?><?php if( $menu_slugs == $sssl ){ ?> active<?php } ?> position-relative d-flex align-items-center">
				<?php echo $icons[$endpoint] ?>
				<?php echo esc_html( $label ); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>





<?php do_action( 'woocommerce_after_account_navigation' ); ?>

<?php elseif($mkpanel =='value-2'): ?>

<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );



     $icons = [
	'dashboard' => '<i class="icon-home-3"></i>',
	'orders' => '<i class="icon-cart-5"></i>',
	'downloads' => '<i class="icon-comments"></i>',
	'edit-address' => '<i class="icon-cpu"></i>',
	'edit-account' => '<i class="icon-user-fill-2"></i>',
	'wishlist' => '<i class="iconly iconly-Heart"></i>',
	'customer-logout' => '<i class="icon-off"></i>',
  	];

  
  $sssl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


?>
<nav class="panel-sidebar-nav panel-two-sidebar-nav position-relative">
    <ul>
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li>
				<?php 
				$menu_slugs = wc_get_account_endpoint_url( $endpoint );
				?>
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?><?php if( $menu_slugs == $sssl ){ ?> active<?php } ?> position-relative d-flex align-items-center">
				<?php echo $icons[$endpoint] ?>
				<?php echo esc_html( $label ); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>





<?php do_action( 'woocommerce_after_account_navigation' ); ?>
 
<?php endif; ?>
<?php endif; ?>