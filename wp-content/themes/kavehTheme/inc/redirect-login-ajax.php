<?php
function create_klogin_page(){
	$page_title = 'ورود به سایت';
	$page_content = '';
	$page_slug = 'klogin';
	$page_template = 'klogin-template.php';

	// Check if page exists, update if it does, create if it doesn't
	$page = get_page_by_path($page_slug);
	if ($page) {
		$page_id = $page->ID;
		wp_update_post(array(
			'ID' => $page_id,
			'post_title' => $page_title,
			'post_content' => $page_content,
			'page_template' => $page_template,
		));
	} else {
		$page_id = wp_insert_post(array(
			'post_title' => $page_title,
			'post_content' => $page_content,
			'post_name' => $page_slug,
			'post_type' => 'page',
			'post_status' => 'publish',
			'page_template' => $page_template,
		));
	}
}
add_action( 'after_switch_theme', 'reate_klogin_page' );


if ( class_exists( 'woocommerce' )): 


function kredirect() {
    if (  ! is_user_logged_in() && is_account_page() ) {
        // feel free to customize the following line to suit your needs
        wp_redirect(home_url('klogin'));
        exit;
    }
}
add_action('template_redirect', 'kredirect');


function kredirectch() {
    if ( ! is_user_logged_in() && is_checkout() )  {
        $checkout_url = add_query_arg( 'redirect_to_checkout', 'true', wc_get_checkout_url() );
        wp_redirect( home_url( 'klogin?redirect_to=' . urlencode( $checkout_url ) ) );
        exit;
    }
}
if($guest_checkout_enabled === 'no'){
add_action('template_redirect', 'kredirectch');
}

endif;

function kredirectback() {
    $page = get_page_by_path('klogin');
    $page_id = $page->ID;
    if ( is_user_logged_in() && is_page( $page_id ) ) {
        // feel free to customize the following line to suit your needs
        wp_redirect(home_url());
        exit;
    }
}
add_action('template_redirect', 'kredirectback');
