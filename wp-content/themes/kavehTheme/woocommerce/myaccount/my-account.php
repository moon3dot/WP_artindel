<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

$user_id = get_current_user_id();

$porders = wc_get_orders( array(
    'customer' => $user_id,
    'status'   => 'processing',
) );
$pocount = !empty($porders) ? count($porders) : 0;

$corders = wc_get_orders( array(
    'customer' => $user_id,
    'status'   => 'completed',
) );
$cocount = !empty($corders) ? count($corders) : 0;

$rorders = wc_get_orders( array(
    'customer' => $user_id,
    'status'   => 'refunded',
) );
$rocount = !empty($rorders) ? count($rorders) : 0;

$caorders = wc_get_orders( array(
    'customer' => $user_id,
    'status'   => 'cancelled',
) );
$caocount = !empty($caorders) ? count($caorders) : 0;


$options = get_option( 'kaveh_frame' );
if(!empty($options['kaveh_panel_select'])):
$mkpanel = $options['kaveh_panel_select'];
if($mkpanel =='value-1'):
/**
 * My Account navigation.
 *
 * @since 2.6.0
 */

$sssl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>



	<div class="panel1kaveh position-relative">
      <!-- Start Sidebar -->
      <aside class="panel-sidebar position-fixed top-0 start-0 w-100 h-100">
        <div class="panel-sidebar-backdrop top-0 end-0 position-fixed w-100 h-100 d-xl-none"></div>
        <div class="panel-sidebar-content position-fixed top-0 start-0 w-100 h-100">
          <!-- Start Logo -->
          <div class="panel-sidebar-logo d-flex align-items-center position-relative">
            <a href="#" class="stretched-link"></a>
            <img src="<?php echo $options['kaveh_logo_panel'] ?>" alt="logo">
           
          </div>
          <!-- End Logo -->
          <!-- Start Info User -->
          <div class="panel-sidebar-info-user d-none d-md-flex align-items-md-center">
            <img src="<?php echo get_avatar_url($current_user-> ID); ?>" alt="avatar" width="60" height="60" class="rounded-circle">
            <div class="detail">
              <div class="name text-white">
              <?php echo esc_html( $current_user->display_name ); ?>
              </div>
              <div class="email">
              <?php echo esc_html( $current_user->user_email ); ?> 
              </div>
            </div>
          </div>
          <!-- End Info User -->
          <!-- Start Nav -->
			<?php do_action( 'woocommerce_account_navigation' ); ?>
          <!-- End Nav -->
          <!-- Start Description -->
          <div class="panel-sidebar-description d-none d-md-flex align-items-md-center">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-2.png" alt="logo" width="36" height="36">
            <div> <?php echo $options['kaveh_copy_panel']; ?> </div>
          </div>
          <!-- End Description -->
        </div>
      </aside>
      <!-- End Sidebar -->
      <!-- Start Header -->
      <div class="panel-header d-none d-md-flex align-items-md-center">
        <!-- Start Info -->
        <div class="panel-header-info d-flex align-items-center bg-white">
          <button type="button"
            class="panel-open-nav d-flex align-items-center justify-content-center d-xl-none rounded-circle me-3">
            <i class="icon-menu"></i>
          </button>
          <img src="<?php echo get_avatar_url($current_user-> ID); ?>" alt="avatar" class="rounded-circle me-3">
          <div class="wellcome">
            سلام
            <span> <?php echo esc_html( $current_user->display_name ); ?> </span>
            خوش امدید
          </div>
          <div class="date fw-bold">
            <i class="icon-calendar"></i>
            <?php echo wp_date( 'd F o' );?>
          </div>
        </div>
        <!-- End Info -->
        <!-- Start Icons -->
        <ul class="panel-header-icons d-flex align-items-center ms-auto">
          <li>
            <a href="<?php echo wc_get_cart_url(); ?>" class="d-flex align-items-center justify-content-center">
              <i class="icon-cart-5"></i>
            </a>
          </li>
          <li>
            <a href="<?php echo home_url(); ?>" class="d-flex align-items-center justify-content-center">
              <i class="icon-home-3"></i>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url( wc_logout_url() ) ?>" class="d-flex align-items-center justify-content-center">
              <i class="icon-off"></i>
            </a>
          </li>
        </ul>
        <!-- End Icons -->
      </div>
      <!-- End Header -->
      <!-- Start Info User Mobile -->
      <div class="panel-info-user-mobile position-relative d-md-none">
        <!-- Start Heading -->
        <div class="panel-info-user-mobile-heading position-relative">
          <button type="button"
            class="panel-open-nav d-flex align-items-center justify-content-center d-xl-none rounded-circle bg-white">
            <i class="icon-menu"></i>
          </button>
          <a href="#" class="panel-info-user-mobile-logo position-absolute top-50 start-50 translate-middle">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-2.png" alt="logo">
          </a>
        </div>
        <!-- End Heading -->
        <!-- Start Info -->
        <div class="panel-info-user-mobile-content text-center">
          <img src="<?php echo get_avatar_url($current_user-> ID); ?>" alt="avatar" class="rounded-circle">
          <div class="name fs-6 text-white"> <?php echo esc_html( $current_user->display_name ); ?> </div>
          <div class="email position-relative"> <?php echo esc_html( $current_user->user_email ); ?> </div>
        </div>
        <!-- End Info -->
      </div>
      <!-- End Info User Mobile -->
   
	  <!-- Start Content -->
      <div class="panel-content">
        <?php $menu_slugs=array(); foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
				<?php $menu_slugs[] = wc_get_account_endpoint_url( $endpoint ); ?>
	    	<?php endforeach; ?>
        <?php if($menu_slugs[0] == $sssl): ?>
        <!-- Start Full Info -->
        <div class="panel-full-info d-flex align-items-center">
          <!-- Start Full Info Item -->
          <div class="panel-full-info-item w-100">
            <div class="content d-flex align-items-center bg-white">
              <div class="icon position-relative d-flex align-items-center justify-content-center">
                <i class="icon-card text-white"></i>
              </div>
              <div class="detail">
                <div class="title">
                  در حال انجام
                </div>
                <div class="value">
                  <?php echo ($pocount > 0 ? $pocount : '0'); ?> سفارش
                </div>
              </div>
            </div>
          </div>
          <!-- End Full Info Item -->
          <!-- Start Full Info Item -->
          <div class="panel-full-info-item w-100">
            <div class="content d-flex align-items-center bg-white">
              <div class="icon position-relative d-flex align-items-center justify-content-center">
                <i class="icon-fast-driver text-white"></i>
              </div>
              <div class="detail">
                <div class="title">
                  تکمیل شده
                </div>
                <div class="value">
                <?php echo ($cocount > 0 ? $cocount : '0'); ?> سفارش
                </div>
              </div>
            </div>
          </div>
          <!-- End Full Info Item -->
          <!-- Start Full Info Item -->
          <div class="panel-full-info-item w-100">
            <div class="content d-flex align-items-center bg-white">
              <div class="icon position-relative d-flex align-items-center justify-content-center">
                <i class="icon-returning text-white"></i>
              </div>
              <div class="detail">
                <div class="title">
                 مسترد شده
                </div>
                <div class="value">
                <?php echo ($rocount > 0 ? $rocount : '0'); ?>  سفارش
                </div>
              </div>
            </div>
          </div>
          <!-- End Full Info Item -->
          <!-- Start Full Info Item -->
          <div class="panel-full-info-item w-100">
            <div class="content d-flex align-items-center bg-white">
              <div class="icon position-relative d-flex align-items-center justify-content-center">
                <i class="icon-note-delete text-white"></i>
              </div>
              <div class="detail">
                <div class="title">
                  لغو شده
                </div>
                <div class="value">
                <?php echo ($caocount > 0 ? $caocount : '0'); ?> سفارش
                </div>
              </div>
            </div>
          </div>
          <!-- End Full Info Item -->
        </div>
        <!-- End Full Info -->
        
        <?php endif; ?>
       <br>
       <br>
       <br>
        <!-- Start panel -->
        <div class="panel-favorite-list">
      
		 	<?php
				/**
				 * My Account content.
				 *
				 * @since 2.6.0
				 */
				do_action( 'woocommerce_account_content' );
			?>
		

        </div>
        <!-- End panel -->
        
      
        <!-- Start Description -->
        <div class="panel-description d-flex align-items-center justify-content-center d-md-none position-relative">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-3.png" alt="logo">
          <div class="w-100">
           <div> <?php echo $options['kaveh_copy_panel']; ?> </div>
          </div>
        </div>
        <!-- End Description -->
      </div>
      <!-- End Content -->
    </div>
</div>


<?php elseif($mkpanel =='value-2'): ?>
<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */

$sssl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>



<div class="panel-two position-relative">
    <!-- Start Sidebar -->
    <aside class="panel-two-sidebar panel-sidebar w-100 h-100 position-fixed top-0 start-0">
      <div class="panel-sidebar-backdrop top-0 end-0 position-fixed w-100 h-100 d-xl-none"></div>
      <div class="panel-two-sidebar-content position-fixed top-0 start-0 w-100 h-100">
        <!-- Start Logo -->
        <div class="panel-sidebar-logo panel-two-sidebar-logo d-flex align-items-center position-relative">
          <a href="<?php echo home_url(); ?>" class="stretched-link"></a>
           <img src="<?php echo $options['kaveh_logo_panel'] ?>" alt="logo">
           
        </div>
        <!-- End Logo -->
        <!-- Start Info User -->
        <div class="panel-sidebar-info-user panel-two-sidebar-info-user text-center">
          <img src="<?php echo get_avatar_url($current_user-> ID); ?>" alt="avatar" width="86" height="86" class="rounded-circle" />
          <div class="detail">
            <div class="name">
            <?php echo esc_html( $current_user->display_name ); ?>
            </div>
            <div class="email">
            <?php echo esc_html( $current_user->user_email ); ?> 
            </div>
          </div>
        </div>
        <!-- End Info User -->
        <!-- Start Nav -->
        <?php do_action( 'woocommerce_account_navigation' ); ?>
        <!-- End Nav -->
      </div>
    </aside>
    <!-- End Sidebar -->
    <!-- Start Header -->
    <div class="panel-two-header d-flex align-items-center w-100 ms-auto">
      <button type="button"
        class="panel-open-nav d-flex align-items-center justify-content-center d-xl-none rounded-circle me-3">
        <i class="icon-menu"></i>
      </button>
      <!-- Start Icons -->
      <ul class="panel-header-icons d-flex align-items-center ms-auto">
        <li>
          <a href="<?php echo wc_get_cart_url(); ?>" class="d-flex align-items-center justify-content-center">
            <i class="icon-cart-5"></i>
          </a>
        </li>
        <li>
          <a href="<?php echo home_url(); ?>" class="d-flex align-items-center justify-content-center">
            <i class="icon-home-3"></i>
          </a>
        </li>
        <li class="d-none d-md-block">
          <a href="<?php echo esc_url( wc_logout_url() ) ?>" class="d-flex align-items-center justify-content-center">
            <i class="icon-off"></i>
          </a>
        </li>
      </ul>
      <!-- End Icons -->
      <!-- Start Contact -->
      <a href="tel:<?php echo $options['kaveh_call_panel']; ?>"
        class="panel-two-header-contact btn btn-orange rounded-pill position-relative text-nowrap d-none d-sm-block">
        <i class="icon-phone-2"></i>
        <?php echo $options['kaveh_call_panel']; ?>
      </a>
      <!-- End Contact -->
    </div>
    <!-- End Header -->
    <!-- Start Content -->
    <div class="panel-two-content w-100 ms-auto overflow-hidden">
      <div class="panel-two-content-wrapper overflow-hidden">
         <?php $menu_slugs=array(); foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
				<?php $menu_slugs[] = wc_get_account_endpoint_url( $endpoint ); ?>
	    	<?php endforeach; ?>
        <?php if($menu_slugs[0] == $sssl): ?>
        <!-- End Note -->
        <!-- Start Full Info -->
       
        <div class="panel-two-full-info d-flex align-items-center">
          <!-- Start Full Info Item -->
          <div class="panel-two-full-info-item w-100">
            <div class="content d-flex align-items-center flex-column flex-md-row">
              <i class="icon-card d-flex align-items-center justify-content-center text-white"></i>
              <div class="detail text-center text-md-start">
                <div class="title"> در حال انجام </div>
                <div class="value"> <?php echo ($pocount > 0 ? $pocount : '0'); ?> سفارش </div>
              </div>
            </div>
          </div>
          <!-- End Full Info Item -->
          <!-- Start Full Info Item -->
          <div class="panel-two-full-info-item w-100">
            <div class="content d-flex align-items-center flex-column flex-md-row">
              <i class="icon-fast-driver d-flex align-items-center justify-content-center text-white"></i>
              <div class="detail text-center text-md-start">
                <div class="title"> تکمیل شده </div>
                <div class="value"> <?php echo ($cocount > 0 ? $cocount : '0'); ?> سفارش </div>
              </div>
            </div>
          </div>
          <!-- End Full Info Item -->
          <!-- Start Full Info Item -->
          <div class="panel-two-full-info-item w-100">
            <div class="content d-flex align-items-center flex-column flex-md-row">
              <i class="icon-returning d-flex align-items-center justify-content-center text-white"></i>
              <div class="detail text-center text-md-start">
                <div class="title"> مرجوع شده </div>
                <div class="value"> <?php echo ($rocount > 0 ? $rocount : '0'); ?> سفارش </div>
              </div>
            </div>
          </div>
          <!-- End Full Info Item -->
          <!-- Start Full Info Item -->
          <div class="panel-two-full-info-item w-100">
            <div class="content d-flex align-items-center flex-column flex-md-row">
              <i class="icon-note-delete d-flex align-items-center justify-content-center text-white"></i>
              <div class="detail text-center text-md-start">
                <div class="title"> لغو شده </div>
                <div class="value"> <?php echo ($caocount > 0 ? $caocount : '0'); ?> سفارش </div>
              </div>
            </div>
          </div>
          <!-- End Full Info Item -->
        </div>
        <!-- End Full Info -->
        <?php endif; ?>

      </div>
		 	<?php
				/**
				 * My Account content.
				 *
				 * @since 2.6.0
				 */
				do_action( 'woocommerce_account_content' );
			?>
		
    </div>
    <!-- End Content -->
  </div>



<?php endif; ?>
<?php endif; ?>