<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
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
            <!-- Start Sidebar -->
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
            </aside>
            <!-- End Sidebar -->
            </div>

			<div class="col-lg-9">
            <div class="category-heading">           
              <!-- Start Sort -->
              <div class="category-sort d-flex align-items-center">
                <div class="title">
                  <b class="d-block"> مرتب سازی </b>
                  براساس
                </div>
                <ul class="d-flex align-items-center">
                 
                  <li>
                    <input type="radio" name="sort" id="sort-2" hidden checked />
                    <label for="sort-2"> جدیدترین </label>
                  </li>
                  <li>
                    <input type="radio" name="sort" id="sort-3" hidden />
                    <label for="sort-3"> ارزان ترین </label>
                  </li>
                  <li>
                    <input type="radio" name="sort" id="sort-4" hidden />
                    <label for="sort-4"> گران ترین </label>
                  </li>
                  <li>
                    <input type="radio" name="sort" id="sort-1" hidden />
                    <label for="sort-1"> پرفروش ترین </label>
                  </li>
                
                </ul>
              </div>
              <!-- End Sort -->
            
              
              <!-- پاک شده است تگ هدر آرشیو فروشگاه -->
              <?php
                if ( woocommerce_product_loop() ) {

                  /**
                   * Hook: woocommerce_before_shop_loop.
                   *
                   * @hooked woocommerce_output_all_notices - 10
                   * @hooked woocommerce_result_count - 20
                   * @hooked woocommerce_catalog_ordering - 30
                   */
                  
                  
                  do_action( 'woocommerce_before_shop_loop' );
                  
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
