<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
?>
    <!-- Start Category -->
    <div class="category mt-4">
      <div class="container">
      <?php if(function_exists('get_breadcrumb')){get_breadcrumb();}?>
        <!-- Start Btn Filter Mobile -->
        <button type="button" class="btn category-btn-filter mb-4 d-lg-none">
          <i class="icon-filter"></i>
          فیلتر
        </button>
        <!-- End Btn Filter Mobile -->
        <div class="row">
          <div class="col-lg-3">
          <aside class="category-sidebar">
              <div class="category-sidebar-backdrop"></div>
              <div class="category-sidebar-content">
            <!-- Start Sidebar -->
            <?php
            /**
            * Hook: woocommerce_sidebar.
            *
            * @hooked woocommerce_get_sidebar - 10
            */
            do_action( 'woocommerce_sidebar' );
            ?>
            <!-- End Sidebar -->
          </div>
          </div>
<div class="col-lg-9">
            <div class="category-heading">
              <div class="d-flex align-items-center justify-content-between">
                <div class="name-category">
                  <span class="d-block"> دسته بندی </span>
                  <?php
                  echo get_queried_object()->name;
                 ?>
                </div>
                <ul class="counter d-flex align-items-center">
                  <li>
                    <span class="d-block"> <?php
                                    $slugt = get_queried_object()->slug;
                                    $argsa = array(
                                        'posts_per_page' => -1,
                                        'post_type' => 'product',
                                        'product_cat' => $slugt,
                                        'meta_query' => array(
                                          array(
                                              'key' => '_stock_status',
                                              'value' => 'instock'
                                          )
                                      )
                                    );
                                    $querya = new WP_Query( $argsa );
                                    
                                    $countr = $querya->post_count;
                                    ?>
									<?php echo $countr; ?> </span>
                    محصول موجود
                  </li>
                  <li>
                    <span class="d-block"> <?php
                                    $slugt = get_queried_object()->slug;
                                    $argsa = array(
                                        'posts_per_page' => -1,
                                        'post_type' => 'product',
                                        'product_cat' => $slugt,
                                    );
                                    $querya = new WP_Query( $argsa );
                                    
                                    $countr = $querya->post_count;
                                    ?>
									<?php echo $countr; ?> </span>
                    محصول
                  </li>
                </ul>
              </div>
              
            <br>
              <!-- Start Products -->
              <div class="row" id="woor">
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	
	
	

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

?>
			  </div>
              <!-- End Products -->
            
            </div>
            <br>
            <?php
            echo get_queried_object()->description;
            ?>
            <br>

          </div>
        </div>
      </div>
    </div>
    <!-- End Category -->

<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

                  
          	
	


get_footer( 'shop' );

