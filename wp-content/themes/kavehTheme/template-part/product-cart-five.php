<?php
global $product;
$sale_price = $product->get_sale_price();
$normal_price = $product->get_regular_price();

$pr_id = get_the_ID();
$stocka = $product->get_stock_status();
?>
          <div class="product-eight">
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
              <?php if(!empty($sale_price) ) { ?>
              <div class="offer">
                % <?php
              $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
              echo $percentage;
              ?> 
              </div>
              <?php } ?> 
            </div>
            <div class="content">
              <h2 class="product-name">
                <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
              </h2>
              <div class="d-flex align-items-center justify-content-start">
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
                  $price_v = $product->get_price_html(); 
                  echo str_replace("&ndash;","<span class=\"dashvar\"> – </span>", $price_v);
                } 
              }
            
              
                if("instock"==$stocka ){ ?>
                <?php if ( !$product->is_type( 'variable' ) ) { ?>
                <a type="submit" name="add-to-cart" value="<?php echo $pr_id ?>" class="btn btn-success-2 shadow-none single_add_to_cart_button"><span> + خرید </span></a>
                <?php }else{ ?>
                <?php } 
                }else{?>
                <span class="btn btn-notstock rounded-pill"> ناموجود</span>
                <?php } ?>
              </div>
              <a href="<?php the_permalink(); ?>" class="btn btn-secondary rounded-pill"> مشاهده محصول </a>
            </div>
          </div>
 