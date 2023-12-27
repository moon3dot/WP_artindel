<?php

function kaveh_ajax_login_assets(){
    $data = array(
        admin_url( 'admin-ajax.php' ),
      );
    wp_enqueue_script( 'kaveh-login-ajax', get_template_directory_uri() . '/inc/kaveh-login-ajax/kaveh-login-ajax.js', array('jquery') , null, true);
	wp_localize_script( 'kaveh-login-ajax', 'ajaxurl', $data );
}
add_action( 'wp_enqueue_scripts', 'kaveh_ajax_login_assets' );

