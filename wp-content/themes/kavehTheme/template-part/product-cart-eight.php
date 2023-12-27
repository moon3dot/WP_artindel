<?php
  global $product;
  $sale_price = $product->get_sale_price();
  $normal_price = $product->get_regular_price();

  $pr_id = get_the_ID();
  $stocka = $product->get_stock_status();
?> 
          <div class="product-six">
            <h2>
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
              <?php if("instock"==$stocka){ 
              if(!empty($sale_price) ) { ?>
              <div class="offer"> 
              % <?php
              $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
              echo $percentage;
              ?>
              </div>
              <?php } 
              }?> 
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
                <?php }else{ 
              $price_v = $product->get_price_html(); ?>
              <div class="price priceva"><?php
              echo str_replace("&ndash;","<span class=\"dashvar\"> – </span>", $price_v);?>
              </div><?php
            } 
          }else{ ?>
                <div class="price nam08">
                  <span class="mx-auto na8"> ناموجود </span>
                </div>
            <?php
          
            ?>
              <?php } 
              if ( !$product->is_type( 'variable' ) ) { ?>
            <a href="<?php the_permalink(); ?>" class="btn btn-success-3"> مشاهده محصول </a>
            <?php }else{ ?>
            <a href="<?php the_permalink(); ?>" class="btn btn-success-3"> مشاهده گزینه ها </a>
            <?php } ?>
          </div>
    