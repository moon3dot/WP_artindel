<?php

function kaveh_ajax_assets(){
    $data = array(
        admin_url( 'admin-ajax.php' ),
      );
    wp_enqueue_script( 'kaveh-ajax-method', get_template_directory_uri() . '/inc/kaveh-ajax-method/kaveh-ajax-method.js', array('jquery') , null, true);
	wp_localize_script( 'kaveh-ajax-method', 'ajaxurl', $data );
	if ( class_exists( 'woocommerce' )): 
    if( is_shop() or is_product_category() ):
    wp_enqueue_script( 'kaveh-ajax-shop-method', get_template_directory_uri() . '/inc/kaveh-ajax-method/kaveh-ajax-shop-method.js', array('jquery') , null, true);
    wp_localize_script( 'kaveh-ajax-shop-method', 'ajaxurl', $data );
    endif;    
    if ( is_cart() ):
    wp_enqueue_script( 'kaveh-ajax-cart-method', get_template_directory_uri() . '/inc/kaveh-ajax-method/kaveh-ajax-cart-method.js', array('jquery') , null, true);
    wp_localize_script( 'kaveh-ajax-cart-method', 'ajaxurl', $data );
    endif;  
	endif;  
}
add_action( 'wp_enqueue_scripts', 'kaveh_ajax_assets' );

