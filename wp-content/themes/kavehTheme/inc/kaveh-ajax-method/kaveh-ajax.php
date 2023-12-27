<?php
// filters of shop 
add_action('wp_ajax_filter_kaveh', 'filter_kaveh_call');
add_action('wp_ajax_nopriv_filter_kaveh', 'filter_kaveh_call');

function filter_kaveh_call() {
  if(!isset($_POST['page'])):
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    else:
    $paged = $_POST['page'];
    endif;
    $sortt = $_POST['sortt'];
    $onsalee = $_POST['onsalee'];
    $onstock = $_POST['onstock'];
    $catIds = $_POST['catIds'];
    $pricemin = 0;
    $pricemax = 999999999999999999999999999999;
    if(isset($_POST['pricemin'])):
    $pricemin = $_POST['pricemin'];
    endif; 
    if(isset($_POST['pricemax'])):
    $pricemax = $_POST['pricemax'];
    endif; 
    $pricerange = array(
      array(
      'key' => '_price',
      'value' => array($pricemin, $pricemax),
      'compare' => 'BETWEEN',
      'type' => 'NUMERIC',
      )
    );
    if($onstock == 'true'):
      $onstock = array(
          array(
            'key'     => '_stock_status',
            'value'   => 'outofstock',
            'compare' => '!=',
        )
      );
    endif;  
    if($onsalee == 'true'):
      $onsalee = array(
        'relation' => 'OR',
          array( // Simple products type
              'key'           => '_sale_price',
              'value'         => 0,
              'compare'       => '>',
              'type'          => 'numeric'
          ),
          array( // Variable products type
              'key'           => '_min_variation_sale_price',
              'value'         => 0,
              'compare'       => '>',
              'type'          => 'numeric'
          )
        );
    endif;  
    if($catIds):
    if (count($catIds) > 1):
      $catIds = array(
        array(
          'taxonomy'      => 'product_cat',
          'field'		      => 'term_id',
          'terms'         => $catIds,
          'operator'      => 'IN'
          )
      );
    endif; 
    endif; 

    $sorttt = []; // Default value

    if ($sortt === 'sort-2') {
      $sorttt = [
        'orderby' => 'date',
        'order' => 'DESC',
      ];
    } elseif ($sortt === 'sort-3') {
      $sorttt = [
        'meta_key' => '_price',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
      ];
    } elseif ($sortt === 'sort-4') {
      $sorttt = [
        'meta_key' => '_price',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
      ];
    }
    elseif ($sortt === 'sort-5') {
      $sorttt = [
        'meta_key' => 'total_sales', // Set the meta key to order by (in this case, total sales)
        'orderby' => 'meta_value_num', // Order products by the numeric value of the meta key
        'order' => 'DESC' , 
      ];
    }

    $products = new WP_Query([
      'post_type' => 'product',
      'posts_per_page' => 9,
      'post_status' => 'publish',
      'orderby' => $sorttt['orderby'], // Set the 'orderby' value from $sorttt
      'order' => $sorttt['order'], // Set the 'order' value from $sorttt
      'paged' => $paged,
      'meta_query' => array(
        'relation' => 'AND',
        $pricerange,
        $onstock,
        $onsalee,
      ),
      'tax_query' => array(
        'relation' => 'AND',
        $catIds,
      )
    ]);

      if ( $products->have_posts() ) {
        do_action( 'woocommerce_before_shop_loop' );
        woocommerce_product_loop_start();
        
        while ( $products->have_posts() ) {
          $products->the_post();
          do_action( 'woocommerce_shop_loop' );
          wc_get_template_part( 'content', 'product' );
        }
        woocommerce_product_loop_end();
        do_action( 'woocommerce_after_shop_loop' );
        // Add pagination links
        $total_pages = $products->max_num_pages;
        $base_url = get_permalink( wc_get_page_id( 'shop' ) );
        echo '<div class="woocommerce-pagination pg1">';
        echo paginate_links( array(
          'base' => $base_url . '%_%',
          'format' => '?paged=%#%',
          'current' => $paged,
          'total' => $total_pages,
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;',
          'add_args' => array_merge( [
            'post_type' => 'product',
            'posts_per_page' => 9,
            'post_status'  => 'publish',
            'orderby'        => 'date',
            'order'          => 'asc',
            'orderby_meta_key' => '_price',
            'paged' => $paged,
            'meta_query'     => array(
              'relation' => 'AND',
              $pricerange,
              $onstock,
              $onsalee,
            
            ),
            'tax_query' => array(
              'relation' => 'AND',
              $catIds,
            ) 
          ], array(
            'paged' => $paged,
          ) ),
        ) );
        echo '</div>';
        ?>
        <script>
          jQuery(document).on('click', 'a.page-numbers', function(a) {
              a.preventDefault();
              var fired_a = jQuery(this).text();
              const catIds = jQuery('#filters-category').val().split(',');
                  jQuery.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>', 
                    type: 'post',
                    data: {
                      action: 'filter_kaveh',
                      onsalee : jQuery('#onlysale').is(':checked'),
                      onstock : jQuery('#exists-products').is(':checked'),
                      pricemin : jQuery('.noUi-handle.noUi-handle-lower').attr('aria-valuenow'),
                      pricemax : jQuery('.noUi-handle.noUi-handle-lower').attr('aria-valuemax'),
                      page: fired_a, 
                      catIds,
                    },
                    beforeSend: function(inum){
                      jQuery('#woor').html('<div id="loading"></div>');
                    },
                    success: function(data) {
                      jQuery('#woor').html(data);
                    },  
                  })
                return false;
              });
        </script>
      <?php
    } else {
    echo '<p>هیچ محصولی یافت نشد</p>';
  }
  wp_reset_postdata();
  die();
}





add_action( 'wp_ajax_woocommerce_apply_coupon_kaveh', 'woocommerce_apply_coupon_ajax_kaveh' );
add_action( 'wp_ajax_nopriv_woocommerce_apply_coupon_kaveh', 'woocommerce_apply_coupon_ajax_kaveh' );

function woocommerce_apply_coupon_ajax_kaveh() {
  if ( ! isset( $_POST['coupon_code'] ) ) {
    $response = array(
      'result' => 'error',
    );
    wp_send_json( $response );
  }
  $coupon_code = sanitize_text_field( $_POST['coupon_code'] );
  if (  WC()->cart->apply_coupon( $coupon_code ) ) {
    $response = array(
      'result' => 'success',
      'cart_total' => WC()->cart->total,
    );
    wp_send_json( $response );
    
  } else {
    $response = array(
      'result' => 'error',
    );
    wp_send_json( $response );
    
  }
  wp_die();
}

add_action( 'wp_ajax_wc_remove_cart_item_dropdwon', 'wc_remove_cart_item_dropdwon_callback' );
add_action( 'wp_ajax_nopriv_wc_remove_cart_item_dropdwon', 'wc_remove_cart_item_dropdwon_callback' );
function wc_remove_cart_item_dropdwon_callback() {
  global $woocommerce;
  $cart_item_key = $_POST['product_id'];
  $cart = WC()->cart;
  $cart->remove_cart_item( $cart_item_key );
	ob_start();
	?>
<ul class="tot-aj-cc">
<?php
  if ( WC()->cart->get_cart_contents_count() == 0 ) {
    ?>
    <div class="align-items-center">
    <img class="mx-auto w-50 d-block text-center position-relative mn-r" src="<?php echo get_template_directory_uri() . '/assets/images/emptybag.png'; ?>" alt="">
    <h6 class="text-center position-relative mn-r">هیچ محصولی در سبد نیست</h6>
    </div>
    <?php
  }
  ?>
<?php
foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
  $product = $cart_item['data'];
  $product_id = $cart_item['product_id'];
  $variation_id = $cart_item['variation_id'];
  $quantity = $cart_item['quantity'];
  $price = WC()->cart->get_product_price( $product );
  $subtotal = WC()->cart->get_product_subtotal( $product, $cart_item['quantity'] );
  $link = $product->get_permalink( $cart_item );
  // Anything related to $product, check $product tutorial
  $attributes = $product->get_attributes();
  $meta = wc_get_formatted_cart_item_data( $cart_item );
  $sale_price = $product->get_sale_price();
  $normal_price = $product->get_regular_price();

?>

<li class="position-relative">
<a href="<?php echo wc_get_cart_remove_url( $cart_item_key ); ?>" type="button" class="delete position-absolute text-center rounded-pill fw-light remove" data-cart-item-key="<?php echo esc_attr( $cart_item_key ); ?>" aria-label="حذف این آیتم" data-product_id="<?php if($variation_id == 0): echo $product_id; else: echo $variation_id; endif; ?>"> حذف </a>
    <img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'thumbnail' ); echo $image[0]; ?>" alt="product" />
      <div class="detail">
          <h2>
            <a href="#"> <?php echo $product->name; ?> </a>
          </h2>
          <?php if ( !$product->is_type( 'variable' ) ) { ?>
           <?php if(!empty($sale_price) ) { ?>
            <div class="offer">
            <?php echo number_format($normal_price, 0, '.', ',');; ?>
            </div>
            <?php } ?>
            <div class="price">
            <?php echo number_format($sale_price, 0, '.', ','); ?>
              <span> <?php echo get_woocommerce_currency_symbol(); ?> </span>
            </div> 
            <?php }else{ 
              $price_v = $product->get_price_html(); 
              echo str_replace("&ndash;","<span class=\"dashvar\"> – </span>", $price_v);
             } ?>
      </div>
</li>
<?php 
}
?>
</ul>
<script>
  jQuery(document).ready(function($){
    jQuery('.remove').click(function(e){
        e.preventDefault();
        var product_id = jQuery(this).data('cart-item-key');
        jQuery.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',  
            data: {
                action: 'wc_remove_cart_item_dropdwon',
                product_id: product_id,
            },
            beforeSend: function(response){
              jQuery('.tot-aj-cc').html('<br><div id="loading"></div><br>');
            },
            success: function(response) {
              if ( response.result === 'success' ) {
              jQuery('.tot-aj-cc').html(response.cart_contents);
              jQuery('.price.tot-aj').html(response.cart_total);
              jQuery('.cart-aj-span').html(response.cart_count);
              }
            }, 
        });
    });
});
</script>
  <?php
     $conttent = ob_get_clean();
     $response = array(
       'result' => 'success',
       'cart_count' => WC()->cart->get_cart_contents_count(),
       'cart_total' => WC()->cart->total,
       'cart_contents' => $conttent,
     );
     
     wp_send_json( $response );
   wp_die();

}




// Handle the AJAX request to remove the cart item
function wc_remove_cart_item_callback() {
  $cart_item_key = $_POST['product_id'];
  $cart = WC()->cart;
  $cart->remove_cart_item( $cart_item_key );
  ob_start();
  if ( WC()->cart->is_empty() ) {
    ?>
    <img class="text-center mx-auto w-25 d-block" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/emptybag.png" alt="">
            <h5 class="text-center">هیچ محصولی در سبد خرید شما نیست</h5>
            <a href="<?php $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) ); echo $shop_page_url; ?>" type="button" class="btn btn-success-2 fw-bold shadow-none text-nowrap mbmt mx-auto text-center d-block w-25"> بازگشت به فروشگاه</a>	
                
    <?php
} else {
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) { 
        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
          $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
          $sale_price= $_product->get_sale_price();
          $normal_price = $_product->get_regular_price();
          if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
            ?>
              
              <!-- Start Products -->
              <div class="cart-two-products cart_item">
                <!-- Start Product -->
                <div class="cart-two-products-item d-flex align-items-center position-relative bg-white flex-column flex-lg-row">
                <?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
                    '<a href="%s" class="delete position-absolute text-center rounded-pill fw-light remove-cart-item" aria-label="%s" data-product_id="%s" data-product_sku="%s" data-cart-item-key="%s" > حذف </a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'woocommerce' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() ),
										esc_attr( $cart_item_key )
									),
									$cart_item_key
								);
							?>
                  
                    <?php
                    if(!empty($sale_price) ) { ?>
                    <div class="offer position-relative position-absolute text-center text-white fw-bold">
                    <?php
                    $percentage = round( ( ( $_product->get_regular_price() - $_product->get_sale_price() ) / $_product->get_regular_price() ) * 100 );
                    echo $percentage;
                    ?>٪
                     </div>
                    <?php } ?> 
                 
                  <img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'thumbnail' ); echo $image[0]; ?>" alt="product" class="w-100">
                  <div class="detail d-flex align-items-center justify-content-between w-100 flex-column flex-sm-row">
                    <div class="info">
                      <h2 class="text-center text-sm-start">
                        <a href="<?php echo $product_permalink; ?>"> <?php echo $_product->name; ?> </a>
                      </h2>
                      <div class="price fw-light text-center text-sm-start mb-3 mb-sm-0">
                      <?php if ( !$_product->is_type( 'variable' ) ) { ?>
                       <?php if(!empty($sale_price) ) { ?>
                        <del> <?php echo number_format($normal_price, 0, '.', ',');; ?> </del>
                      <span>  <?php echo number_format($sale_price, 0, '.', ','); ?> </span>
                      <?php echo get_woocommerce_currency_symbol(); ?>
                        <?php }else{  ?>
                        <span>  <?php echo number_format($normal_price, 0, '.', ',');; ?> </span>
                        <?php echo get_woocommerce_currency_symbol(); ?>
                      <?php } ?>
                      <?php }else{ 
                        $price_v = $_product->get_price_html(); 
                        echo str_replace("&ndash;","<span class=\"dashvar\"> – </span>", $price_v);
                      } ?>
                      </div>
                      
                    </div>
                    <div class="count d-flex align-items-center">
                    <button class="changeinp" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"> - </button>
                      <?php
                      if ( $_product->is_sold_individually() ) {
                        $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                      } else {
                        $product_quantity = woocommerce_quantity_input(
                          array(
                            'input_name'   => "cart[{$cart_item_key}][qty]",
                            'input_value'  => $cart_item['quantity'],
                            'max_value'    => $_product->get_max_purchase_quantity(),
                            'min_value'    => '0',
                            'product_name' => $_product->get_name(),
                          ),
                          $_product,
                          false
                        );
                      }
    
                      echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                      ?>
                    <button class="changeinp" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> + </button>
    
                    </div>
                  </div>
                </div>
                <!-- End Product -->
              
              </div>
              <!-- End Products -->
              
              <?php
              
          }
        }
    }
    ?>
    <script>
      jQuery(document).ready(function($){
    jQuery('.remove-cart-item').click(function(m){
        m.preventDefault();
        var product_id = jQuery(this).data('cart-item-key');
        jQuery.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',  
            data: {
                action: 'wc_remove_cart_item',
                product_id: product_id,
            },
            beforeSend: function(response){
              jQuery('.kaveh-cart-inner').html('<br><br><br><br><br><br><div id="loading"></div><br><br><br><br><br><br>');
            },
            
            success: function(response) {
              if ( response.result === 'success' ) {
              jQuery('.kaveh-cart-inner').html(response.cart_contents);
              jQuery('.kaveh-inner-cart-tot').html(response.cart_total);
              jQuery('.kaveh-cart-countt').html(response.cart_count);
              }

            }, 
        });

   
    });
});
    </script>
    <?php
    $conttent = ob_get_clean();
    $response = array(
      'result' => 'success',
      'cart_count' => WC()->cart->get_cart_contents_count(),
      'cart_total' => WC()->cart->total,
      'cart_contents' => $conttent,
    );
    
    wp_send_json( $response );
  wp_die();
}
add_action( 'wp_ajax_wc_remove_cart_item', 'wc_remove_cart_item_callback' );
add_action( 'wp_ajax_nopriv_wc_remove_cart_item', 'wc_remove_cart_item_callback' );




// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');

function data_fetch(){
    $ss = esc_attr( $_POST['keyword'] );
    $the_query = new WP_Query( array( 'posts_per_page' => 3, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => array('product') ) );
    if( $the_query->have_posts() ) :
      
        while( $the_query->have_posts() ): $the_query->the_post(); ?>

            <a href="<?php the_permalink(); ?>"><div class="lisea mt-2 py-2 pe-2 ps-2">
              <div class=" d-inline seer mx-2">
                <svg class="" xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8">
                  <path id="Search"
                    d="M2,5.468A3.45,3.45,0,0,1,5.431,2,3.413,3.413,0,0,1,7.857,3.016a3.487,3.487,0,0,1,1,2.452A3.431,3.431,0,1,1,2,5.468ZM8.805,8.262l1.022.825h.018a.539.539,0,0,1,0,.757.525.525,0,0,1-.749,0l-.848-.972a.434.434,0,0,1,0-.61A.394.394,0,0,1,8.805,8.262Z"
                    transform="translate(-2 -2)" fill="#919191" fill-rule="evenodd" />
                </svg>
              </div>
			  <?php $gtit= get_the_title(); ?>
              <span class="f-sea"><?php echo wp_trim_words( $gtit , 8 ); ?></span>
              <svg class="mx-2" xmlns="http://www.w3.org/2000/svg" width="14" height="1" viewBox="0 0 14 1">
                <g id="Rectangle_505" data-name="Rectangle 505" fill="#a9a9a9" stroke="#919191" stroke-width="1"
                  opacity="0.46">
                  <rect width="14" height="1" stroke="none" />
                  <rect x="0.5" y="0.5" width="13" fill="none" />
                </g>
              </svg>
            </div>
            </a>
            <svg class="mt-0 ms-3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                width="201" height="1" viewBox="0 0 201 1">
                <defs>
                  <linearGradient id="linear-gradient" x1="1.011" y1="1" x2="0" y2="1"
                    gradientUnits="objectBoundingBox">
                    <stop offset="0" stop-color="#a9a9a9" stop-opacity="0" />
                    <stop offset="0.485" stop-color="#7c7c7c" stop-opacity="0.502" />
                    <stop offset="1" stop-color="#555" stop-opacity="0" />
                  </linearGradient>
                </defs>
                <rect id="Rectangle_508" data-name="Rectangle 508" width="201" height="1" opacity="0.46"
                  fill="url(#linear-gradient)" />
              </svg>
           

        <?php endwhile;
           
            if($the_query->found_posts > 3){
            ?>
            <a href="<?php echo site_url().'/?s='.$ss.'&post_type=product'; ?>" class="d-block wrbut"> مشاهده همه  <svg class="mkt" width="16px"  height="16px"  viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <title>Iconly/Bulk/Arrow - Left</title>
    <g id="Iconly/Bulk/Arrow---Left" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Arrow---Left" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) translate(6.000000, 3.000000)" fill="#000000"  fill-rule="nonzero">
            <path d="M4.80969341,5.20248239 L4.48254085,1.50325451 C4.48254085,0.673082751 5.16218102,1.37667655e-14 6.00044061,1.37667655e-14 C6.8387002,1.37667655e-14 7.51834037,0.673082751 7.51834037,1.50325451 L7.19118781,5.20248239 C7.19118781,5.85374723 6.6580503,6.38174083 6.00044061,6.38174083 C5.34172939,6.38174083 4.80969341,5.85374723 4.80969341,5.20248239" id="Fill-1" opacity="0.400000006"></path>
            <path d="M4.86983661,17.6247318 C4.81145585,17.5669143 4.56471452,17.350917 4.3598311,17.1480103 C3.0765559,15.9643883 0.978153112,12.8738803 0.335964751,11.2571726 C0.23352304,11.0117211 0.0154213328,10.3910013 1.27897692e-13,10.0582781 C1.27897692e-13,9.74082738 0.0738020929,9.43755833 0.219203231,9.14847093 C0.422985129,8.7873844 0.744630072,8.49938789 1.12355425,8.34011709 C1.38571691,8.23866377 2.17330641,8.07939298 2.18762622,8.07939298 C3.04791628,7.92121308 4.44685148,7.8350323 5.99339086,7.8350323 C7.46502662,7.8350323 8.80668258,7.92121308 9.68129245,8.05102968 C9.69671379,8.06521133 10.6737654,8.22448213 11.0086286,8.39793457 C11.6210758,8.71538527 12,9.33610502 12,10.0004606 L12,10.0582781 C11.9856802,10.4913637 11.6056545,11.4011709 11.5924362,11.4011709 C10.9502478,12.9316978 8.95318524,15.9491158 7.62584909,17.162192 C7.62584909,17.162192 7.28437672,17.5047333 7.07178263,17.6530951 C6.76555902,17.884365 6.38663484,18 6.00771067,18 C5.58472554,18 5.19148155,17.8701834 4.86983661,17.6247318" id="Fill-4"></path>
        </g>
    </g>
</svg></a>
            <?php
            }elseif($the_query->found_posts == 0){
                ?>
                <p>هیچ محصولی پیدا نشد</p>
                <?php
            }
        wp_reset_postdata();  
    endif;
   die();
}


// the ajax function
add_action('wp_ajax_data_fetch2' , 'data_fetch2');
add_action('wp_ajax_nopriv_data_fetch2','data_fetch2');
function data_fetch2(){
     $unique_trnames = array();
    $the_query = new WP_Query( array( 'posts_per_page' => 3, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => array('product') ) );
    if( $the_query->have_posts() ) :
        $wc_options = get_option('woocommerce_permalinks');
        $product_category_base = $wc_options['category_base'];
        while( $the_query->have_posts() ): $the_query->the_post(); 
        $terms = get_the_terms( get_the_ID() , 'product_cat' );
        $trname = $terms[0]->name;
        $trlink = $terms[0]->slug;

        if( ! in_array( $trname, $unique_trnames) ) :
          $unique_trnames[] = $trname;
          ?>
            <a href="<?php echo home_url() . '/' . $product_category_base . '/' . $trlink ?>">
            <div class="lisea mt-2 py-2 pe-2 ps-2">
              <div class=" d-inline seer mx-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="11.292" height="11.879" viewBox="0 0 11.292 11.879">
                  <path id="Arrow_-_Down_3" data-name="Arrow - Down 3" d="M12.7,8.193a.406.406,0,0,0-.356-.216h-2.31V3.417a.408.408,0,1,0-.815,0v4.56H6.907a.4.4,0,0,0-.356.216.425.425,0,0,0,.011.424l2.717,4.414a.4.4,0,0,0,.69,0l2.717-4.414a.425.425,0,0,0,.011-.424Z" transform="translate(8.02 18.301) rotate(-141)" fill="#919191"/>
                </svg>
                
              </div>
              <span class="f-sea"><?php echo wp_trim_words( $trname, 2 ); ?></span>
              <span class="rizs ms-2"> مشاهده کنید</span>
              <svg class="mx-2" xmlns="http://www.w3.org/2000/svg" width="6.667" height="8" viewBox="0 0 6.667 8">
                <path id="Arrow_-_Right_2" data-name="Arrow - Right 2" d="M7.246,10.754c.038.039.18.2.312.34a14.46,14.46,0,0,0,3.864,2.683,3.078,3.078,0,0,0,.786.223,1.289,1.289,0,0,0,.6-.145,1.249,1.249,0,0,0,.53-.6,6.561,6.561,0,0,0,.171-.709,15.986,15.986,0,0,0,.161-2.537,18.483,18.483,0,0,0-.142-2.459,5.663,5.663,0,0,0-.227-.885A1.19,1.19,0,0,0,12.246,6h-.038a3.252,3.252,0,0,0-.881.273A14.461,14.461,0,0,0,7.549,8.917a3.771,3.771,0,0,0-.321.369A1.189,1.189,0,0,0,7,10,1.25,1.25,0,0,0,7.246,10.754Z" transform="translate(-7 -6)" fill="#919191"/>
              </svg>
              
              
            </div>
            </a>
            <svg class="mt-0 ms-3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                width="201" height="1" viewBox="0 0 201 1">
                <defs>
                  <linearGradient id="linear-gradient" x1="1.011" y1="1" x2="0" y2="1"
                    gradientUnits="objectBoundingBox">
                    <stop offset="0" stop-color="#a9a9a9" stop-opacity="0" />
                    <stop offset="0.485" stop-color="#7c7c7c" stop-opacity="0.502" />
                    <stop offset="1" stop-color="#555" stop-opacity="0" />
                  </linearGradient>
                </defs>
                <rect id="Rectangle_508" data-name="Rectangle 508" width="201" height="1" opacity="0.46"
                  fill="url(#linear-gradient)" />
              </svg>
        
        <?php 
        endif;
        endwhile;
        
          if($the_query->found_posts > 3){
           
          }elseif($the_query->found_posts == 0){
            ?>
            <p>هیچ محصولی پیدا نشد</p>
            <?php
          }
        wp_reset_postdata();  
    endif;

   die();
}


// the ajax function
add_action('wp_ajax_data_fetch3' , 'data_fetch3');
add_action('wp_ajax_nopriv_data_fetch3','data_fetch3');
function data_fetch3(){
	?>
	<div class="swiper-wrapper search_result" id="datafetch3">
	<?php
    $the_query = new WP_Query( array( 'posts_per_page' => 10, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => array('product') ) );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>
        <?php
        $terms = get_the_terms( get_the_ID() , 'product_cat' );
        $trname = $terms[0]->name;
        ?>
            <div class="swiper-slide">
             <a href="<?php the_permalink(); ?>">
              <div class="prseabox rounded-4 p-2">
                <div class="row align-items-center justify-content-center">
                  <div class="col-4">
                    <img class="p-2 d-inline boxim rounded-3" src="<?php the_post_thumbnail_url(); ?>" alt="">
                  </div>
                  <div class="col">
                    <p class="d-inline mx-2"><?php echo wp_trim_words( get_the_title(), 2 ); ?></p>
                    <span class="rizs ms-2">در دسته <?php echo $trname; ?></span>
                  </div>
                </div>
              </div>
              </a>
            </div>
        <?php endwhile;
        wp_reset_postdata();  
    endif;
	?>
	</div>
	<script>
	  // Swiper search box
  new Swiper(".swiper-seabox", {
    navigation: {
      nextEl: ".swiper-sea-next",
      prevEl: ".swiper-sea-prev",
    },
    breakpoints: {
      320: {
        slidesPerView: 1.5,
        spaceBetween: 3,
      },
      576: {
        slidesPerView: 2,
        spaceBetween: 8,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 8,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 15,
      },
    },
  });
  // Swiper search box
  new Swiper(".swiper-geabox", {
    slidesPerView: 1,
    spaceBetween: 0,
    pagination: {
    el: '.swiper-pagination',
    type: 'bullets',
    clickable:true,
    },
    autoplay: {
      delay: 2000,
    },
    effect: "fade",
    fadeEffect: {
      crossFade: true,
    },
    loop: true,
    
  });
	</script>
	<?php
   die();
}


// the ajax function
add_action('wp_ajax_ajax_popup', 'ajax_popup');
add_action('wp_ajax_nopriv_ajax_popup','ajax_popup');

function ajax_popup(){
$idofpost = $_POST['postid'];
global $product;
$product = wc_get_product( $idofpost ); 
$sale_price = $product->get_sale_price();
$normal_price = $product->get_regular_price();

$stocka = $product->get_stock_status();
$product_type = $product->get_type();
$sale_price_dates_from = $sale_price_dates_to = '';
?>

      <div class="modal-body position-relative d-flex flex-column flex-lg-row overflow-hidden hideme">
        <div class="icons d-flex align-items-center position-absolute">
          
          <button type="button" class="d-flex align-items-center justify-content-center" data-bs-dismiss="modal">
          <i class="isax isax-close-square5"></i>
          </button>
        </div>
        <div class="right">
          <div class="gallery position-relative">
          <?php if("instock"==$stocka){ 
            if(!empty($sale_price) ) { ?>
            <div class="offer position-absolute">
            تخفیف  <?php
            $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
            echo $percentage;
            ?>%
            </div>
            <?php } 
            }?> 

            <div class="d-flex position-relative">
              <div class="swiper swiper-modal-product overflow-hidden">
                <div class="swiper-wrapper">
                  <?php
                  $attachment_ids = $product->get_gallery_image_ids();
                  if ( $attachment_ids && $product->get_image_id() ) {
                    $cou=0;
                  foreach ( $attachment_ids as $attachment_id ) {
                  if($cou<4){
                  ?>
                  <div class="swiper-slide">
                    <div class="gallery-item">
                      <img src="<?php echo wp_get_attachment_image_url($attachment_id,'thumbnail'); ?>" alt="product" width="39" height="40"
                        class="w-100 d-block" data-gallery="gallery-origin<?php echo $idofpost; ?>">
                    </div>
                  </div>
                  <?php
                  $cou+=1;
                    }
                  }
                  }
                  ?>  
                </div>
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
              <div class="gallery-origin">
                <img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $idofpost ), 'thumbnail' ); echo $image[0]; ?>" alt="product" width="201" height="201"
                  id="gallery-origin<?php echo $idofpost; ?>" class="w-100 d-block">
              </div>
            </div>
            <button type="button">
            </button>
          </div>
          <a href="<?php echo get_permalink($idofpost); ?>" class="btn-view btn btn-primary d-none d-lg-inline-block">
            مشخصات بیشتر محصول
            <i class="isax isax-arrow-left5"></i>
          </a>
        </div>
        <div class="left w-100">
          <h2 class="name"> <?php echo $product->get_title(); ?> </h2>
          <?php
          if("instock"==$stocka){
          if ($date_from = get_post_meta($product_id, '_sale_price_dates_from', true)){
              $sale_price_dates_from = date('Y-m-d 00:00:00', $date_from);
          }
          if ($date_to = get_post_meta($product_id, '_sale_price_dates_to', true)){
              $sale_price_dates_to = date('Y-m-d 23:59:59', $date_to);
          }
          $deal_start_date = $sale_price_dates_from;
          $deal_start_time = strtotime($deal_start_date);
          $deal_end_date = $sale_price_dates_to;
          $deal_end_time = strtotime($deal_end_date, current_time('timestamp'));
          //$current_date = current_time( 'Y-m-d H:i:s', true );
          $current_time = strtotime('NOW', current_time('timestamp'));
          $time_diff = ($deal_end_time - $current_time); ?>
        <?php if (!empty($deal_end_date)){ ?>
          <ul class="timear d-flex align-items-center" data-time="<?php  echo $deal_end_date; ?>">
            <li class="text-center">
              <span class="second d-block rounded-circle text-center text-white"> 00 </span>
              ثانیه
            </li>
            <li class="text-center">
              <span class="minute d-block rounded-circle text-center text-white"> 00 </span>
              دقیقه
            </li>
            <li class="text-center">
              <span class="hour d-block rounded-circle text-center text-white"> 00 </span>
              ساعت
            </li>
            <li class="text-center">
              <span class="day d-block rounded-circle text-center text-white"> 00 </span>
              روز
            </li>
          </ul>
          <?php }
          } ?>
          <div class="row align-items-center">
            <div class="col-sm-6">
              <!-- Start Colors -->
              <div class="colors d-flex align-items-center">
                <span class="label fw-bold"> رنگ </span>
                <div class="d-flex align-items-center flex-wrap">
                  <?php
                  // Get the terms associated with the product
                  $terms = get_the_terms( $product->get_id() , 'pa_color' );
                  $sin = 0 ;	
                  // Loop through the terms
                  foreach ( $terms as $term ) {
                    $val     = get_term_meta( $term->term_id, 'wpcvs_color', true ) ?: '';
                    $tooltip = get_term_meta( $term->term_id, 'wpcvs_tooltip', true ) ?: $term->name;
                    ?>
                  <input type="radio" name="color" id="color-<?php echo $sin; ?>" value="<?php echo $sin; ?>" hidden>
                  <label for="color-<?php echo $sin; ?>" class="rounded-pill d-flex align-items-center">
                    <span class="color rounded-circle fw-light" style="background-color: <?php echo esc_attr( $val ) ?>"></span>
                    <span class="color-name overflow-hidden"> <?php echo esc_attr( $tooltip ) ?> </span>
                  </label>
                  <?php
                $sin += 1;
                }
                ?>
                </div>
              </div>
              <!-- End Colors -->
              <!-- Start Status -->
              <div class="status d-flex align-items-center">
                <span class="label fw-bold"> وضعیت </span>
                <?php if("instock"==$stocka): ?>	
                <div class="badge rounded-pill fw-light"> موجود در انبار </div>
                <?php elseif("onbackorder"==$stocka): ?>
                <div class="badge rounded-pill fw-light obstock"> در پیش خرید </div>
                <?php else: ?>
                <div class="badge rounded-pill fw-light oustock namo"> ناموجود </div>
                <?php endif; ?>
              </div>
              <!-- End Status -->
            </div>
            <div class="col-sm-6">
              <div class="options">
                <div class="title"> ویژگی‌های ﻣﺤﺼﻮل </div>
                <ul>
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
            <div class="col-lg-6">
            <?php if(!empty($normal_price) ) { ?>
            <?php if("instock"==$stocka){ ?>
            <?php if ( !$product->is_type( 'variable' ) ) { ?>
              <?php if(!empty($sale_price) ) { ?>
              <div class="price d-flex align-items-center fw-light">
                <del> <?php echo number_format($normal_price, 0, '.', ',');; ?> </del>
                <span> <?php echo number_format($sale_price, 0, '.', ','); ?> </span>
                <?php echo get_woocommerce_currency_symbol(); ?>
              </div>
              <?php }else{ ?>
                <div class="price d-flex align-items-center fw-light">
                <span> <?php echo number_format($normal_price, 0, '.', ',');; ?> </span>
                <?php echo get_woocommerce_currency_symbol(); ?>
              </div>
              <?php } ?>
              <?php }else{ 
            $price_v = $product->get_price_html(); 
            echo str_replace("&ndash;","<span class=\"dashvar\"> – </span>", $price_v);
          } 
        }
          ?>
            <?php } ?>
            </div>
            <div class="col-lg-6">
              <?php if("instock"==$stocka): ?>
              <?php if ( !$product->is_type( 'variable' ) ) : ?>
              <form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
                <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
                <div class="qacol2 d-inline-flex">
                <?php
                do_action( 'woocommerce_before_add_to_cart_quantity' );
                ?>
                <button class="changeinp" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"> - </button>
                <?php
                woocommerce_quantity_input(
                  array(
                    'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                    'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                    'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
                  )
                );
                ?>
                <button class="changeinp" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> + </button>
                <?php
                do_action( 'woocommerce_after_add_to_cart_quantity' );
                ?>
                </div>
                
                <div type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="btn-add-to-cart btn btn-success-2 d-block w-100 single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
                <i class="icon-arrow-left-2"></i>
                </div> 
                <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
              </form>
              <?php elseif ( $product->is_type( 'variable' ) ) : ?>
                <a href="<?php echo get_permalink($idofpost); ?>"><div type="submit" class="btn-add-to-cart btn btn-success-2 d-block w-100 single_add_to_cart_button button alt">خرید محصول</button>
                <i class="icon-arrow-left-2"></i>
                </div></a>
              <?php endif; ?>
              <?php endif; ?>
              
              </div>
            </div>
          </div>
        </div>
            </div>
          </div>
        </div>
      </div>
<script>

 // Swiper Gallery Image Modal Product
new Swiper(".swiper-modal-product", {
  slidesPerView: 3,
  spaceBetween: 11,
  direction: "vertical",
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
</script>
<?php
die();
}

add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');   
function woocommerce_ajax_add_to_cart() {     
            $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
            $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
            $variation_id = absint($_POST['variation_id']);
            $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
            $product_status = get_post_status($product_id);

            if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

                do_action('woocommerce_ajax_added_to_cart', $product_id);

                if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
                    wc_add_to_cart_message(array($product_id => $quantity), true);
                }
                WC_AJAX :: get_refreshed_fragments();
            } else {

                $data = array(
                    'error' => true,
                    'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

                echo wp_send_json($data);
            }
            wp_die();
 }