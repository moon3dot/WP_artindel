<?php
global $product;
$sale_price = $product->get_sale_price();
$normal_price = $product->get_regular_price();

$pr_id = get_the_ID();
$stocka = $product->get_stock_status();
?>
          <div class="product-seven">
            <h2 class="product-name">
              <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
            </h2>
            <div class="image">
            <?php
if ( is_plugin_active( 'woo-smart-compare/wpc-smart-compare.php' ) ) {
   echo do_shortcode( '[woosc id="".<?php echo get_the_ID(); ?>.""]' ); 
} else {
    
}
?>
              <a href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" />
              </a>
            </div>
                <?php if("instock"==$stocka){ ?>
                <?php if ( !$product->is_type( 'variable' ) ) { ?>
                  <?php if(!empty($sale_price) ) { ?>
                  <div class="price">
                    <del> <?php echo number_format($normal_price, 0, '.', ',');; ?> </del>
                    <span> <?php echo number_format($sale_price, 0, '.', ','); ?> </span>
                    <?php echo get_woocommerce_currency_symbol(); ?>
                  </div>
                  <?php }else{ ?>
                    <div class="price">
                    <span> <?php echo number_format($normal_price, 0, '.', ',');; ?> </span>
                    <?php echo get_woocommerce_currency_symbol(); ?>
                  </div>
                  <?php } ?>
                  <?php }else{ ?>
                  <div class="price"><?php
                $price_v = $product->get_price_html(); 
                echo str_replace("&ndash;","<span class=\"dashvar\"> – </span>", $price_v); ?>
                </div><?php
              } 
            }
              ?>
            <div class="d-flex align-items-center justify-content-between">
                <?php if("instock"==$stocka ){ ?>
                  <?php if(!empty($normal_price) ) { ?>
                <?php if ( !$product->is_type( 'variable' ) ) { ?>
                <a href="<?php the_permalink(); ?>" class="position-absolute bottom-0 start-0 ms-3 ms-md-3 ms-lg-3 ms-xl-3 ms-xxl-4 mb-3 btn btn-success-2 shadow-none"> + خرید </a>
                <?php }else{ ?>
                <a href="<?php the_permalink(); ?>" class="position-absolute bottom-0 start-0 ms-3 ms-md-3 ms-lg-3 ms-xl-3 ms-xxl-4 mb-3 btn btn-success-2 shadow-none"> مشاهده گزینه ها </a>
                <?php } }
                }else{?>
                <div class="price w-100 na6">
                    <h6 class="mx-auto my-1 nam-6">ناموجود</h6>
                  </div>
                <?php } 
               if("instock"==$stocka ){
                if(!empty($sale_price) ) { ?>
              <span class="position-absolute bottom-0 end-0 me-3 me-md-3 me-lg-3 me-xl-3 me-xxl-4 mb-3 offer">
                % <?php
                $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
                echo $percentage;
                ?> 
              </span>
              <?php } 
              }?> 
            </div>
            <a href="<?php the_permalink(); ?>" class="btn btn-danger-2"> مشاهده و بررسی محصول </a>
          </div>
