<?php
global $product;
$sale_price = $product->get_sale_price();
$normal_price = $product->get_regular_price();

$pr_id = get_the_ID();
$stocka = $product->get_stock_status();
?>
          <div class="product-twelve d-flex align-items-center position-relative bg-white radius-15">
			<?php if("instock"!=$stocka){ ?>
            <div class="status">
              ناموجود
            </div>
            <?php } ?>
            <?php
if ( is_plugin_active( 'woo-smart-compare/wpc-smart-compare.php' ) ) {
   echo do_shortcode( '[woosc id="".<?php echo get_the_ID(); ?>.""]' ); 
} else {
    
}
?>
            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="product" class="imagestp13" />
            <?php if("instock"==$stocka){ 
             if(!empty($sale_price) ) { ?>
            <div class="offer position-absolute text-white top-0 rounded-circle text-center">
            % <?php
            $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
            echo $percentage;
            ?> 
            </div>
            <?php } 
            }?> 
            <div class="detail w-100">
              <h2 class="overflow-hidden fw-bold">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
              <?php if("instock"==$stocka){ ?>
              <?php if ( !$product->is_type( 'variable' ) ) { ?>
              <div class="price fw-light">
                <b>  <?php echo number_format($normal_price, 0, '.', ',');; ?> </b>
                <?php echo get_woocommerce_currency_symbol(); ?>
              </div>
              <?php }else{ 
              $price_v = $product->get_price_html(); ?>
              <div><?php
              echo str_replace("&ndash;","<span class=\"dashvar\"> – </span>", $price_v); ?>
              </div><?php
            } 
          }
        
            ?>
            </div>
          </div>