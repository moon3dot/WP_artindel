<?php
if ( ! function_exists( 'ah_shop_enqueue_scripts' ) ) :
    function ah_shop_enqueue_scripts() {
    wp_deregister_script( 'boostify_hf_nav_menu' );
	wp_deregister_script( 'boostify_hf_nav_mega' );
		
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('jquery') , null, true);
    wp_enqueue_style( 'main.min', get_template_directory_uri() . '/assets/css/main.min.css', false, null, 'all');
    wp_enqueue_style( 'icomoon', get_template_directory_uri() . '/assets/css/icomoon.css', false, null, 'all');
    wp_enqueue_style( 'iconsax', get_template_directory_uri() . '/assets/css/iconsax.css', false, null, 'all');
    wp_enqueue_style( 'iconly', get_template_directory_uri() . '/assets/css/iconly.css', false, null, 'all');
    wp_enqueue_style( 'kaveh', get_bloginfo('stylesheet_url'), false, null, 'all');
    }
    add_action( 'wp_enqueue_scripts', 'ah_shop_enqueue_scripts' );
endif;

$options = get_option( 'kaveh_frame' );
if(!empty($options['kaveh_typoselect'])):
$fontkaveh = $options['kaveh_typoselect'];

if ($fontkaveh == 'value-1'):
    function kaveh_font_ag()
    {
        wp_enqueue_style('kavehirsans', get_template_directory_uri() . '/assets/css/kavehirsans.css', false, null, 'all');

    }
    add_action('wp_enqueue_scripts', 'kaveh_font_ag');
elseif($fontkaveh == 'value-2'):
    function kaveh_font_ag()
    {
        wp_enqueue_style('kavehiryekan', get_template_directory_uri() . '/assets/css/kavehiryekan.css', false, null, 'all');

    }
    add_action('wp_enqueue_scripts', 'kaveh_font_ag');
else:
endif;
endif;

if ( class_exists( 'woocommerce' )):
require_once get_template_directory() . '/inc/slide-cart.php';
endif;
require_once( get_template_directory() . '/inc/range.php' );
require_once( get_template_directory() . '/inc/login-ajax.php' );
require_once( get_template_directory() . '/inc/redirect-login-ajax.php');
require_once( get_template_directory() . '/inc/framework/codestar-framework.php' );
require_once( get_template_directory() . '/inc/options.php' );
require_once( get_template_directory() . '/inc/kaveh-ajax-method/kaveh-ajax.php' );
require_once( get_template_directory() . '/inc/kaveh-ajax-method/kaveh-ajax-method.php' );
require_once( get_template_directory() . '/inc/kaveh-ajax-method/kaveh-fragments.php' );
require_once( get_template_directory() . '/inc/kaveh-login-ajax/kaveh-login-ajax.php' );

