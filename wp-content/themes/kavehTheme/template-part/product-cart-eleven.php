<?php
global $product;
$sale_price = $product->get_sale_price();
$normal_price = $product->get_regular_price();

$pr_id = get_the_ID();
$stocka = $product->get_stock_status();
?>
          <div class="product product-ten gradient">
            <div class="product-image">
            <?php
if ( is_plugin_active( 'woo-smart-compare/wpc-smart-compare.php' ) ) {
   echo do_shortcode( '[woosc id="".<?php echo get_the_ID(); ?>.""]' ); 
} else {
    
}
?>
            <?php
            if("instock"!=$stocka){ ?>
              <div class="status">
                ناموجود
              </div>
              <?php } ?>
              <a href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
              </a>
            </div>
            <div class="detail">
            <?php if("instock"==$stocka){ ?>
            <?php if ( !$product->is_type( 'variable' ) ) { ?>
            <?php if(!empty($sale_price) ) { ?>
            <div class="offer">
              <?php echo number_format($normal_price, 0, '.', ',');; ?>
            </div>
            <div class="price">
              <?php echo number_format($sale_price, 0, '.', ','); ?>
              <span> <?php echo get_woocommerce_currency_symbol(); ?> </span>
            </div>
            <?php }else{ ?>
              <div class="price nor10p">
              <?php echo number_format($normal_price, 0, '.', ',');; ?>
              <span> <?php echo get_woocommerce_currency_symbol(); ?></span>
            </div>
            <?php } ?>
            <?php }else{ ?>
              <div><?php
              $price_v = $product->get_price_html(); 
              echo str_replace("&ndash;","<span class=\"dashvar\"> – </span>", $price_v);?>
              </div><?php
            } 
            ?>
            <?php }else
            {
              ?>
              <div class="mt-p10"></div>
              <?php
            }?>
                <?php if(empty($normal_price) ) { ?>
                <div class="mt-p101"></div>
                <?php } ?>
              <h2>
                <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
              </h2>
              <?php if(!empty($normal_price) ) { ?>
              <?php if("instock"==$stocka){ ?>
              <button type="button" class="add-to-cart single_add_to_cart_button position-relative cart11" value="<?php echo $pr_id; ?>">
                <span> + </span>
                <span> افزودن به سبد خرید </span>
              </button>
              <?php }
              } ?>
            </div>
          </div>
