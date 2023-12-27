<?php
global $product;
$sale_price = $product->get_sale_price();
$normal_price = $product->get_regular_price();

$pr_id = get_the_ID();
$stocka = $product->get_stock_status();
?>
          <div class="product-two">
            <div class="product-two-image">
            <?php
if ( is_plugin_active( 'woo-smart-compare/wpc-smart-compare.php' ) ) {
   echo do_shortcode( '[woosc id="".<?php echo get_the_ID(); ?>.""]' ); 
} else {
    
}
?>
              <a href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
              </a>
            </div>
            <div class="product-two-detail">
              <h2>
                <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
              </h2>
              <?php if("instock"==$stocka){ ?>
              <?php if ( !$product->is_type( 'variable' ) ) { ?>
              <?php if(!empty($sale_price) ) { ?>
              <div class="offer-price d-flex align-items-center justify-content-center">
              <del> <?php echo number_format($normal_price, 0, '.', ',');; ?> </del>
              <span>
              <?php echo number_format($sale_price, 0, '.', ','); ?>
                <i> <?php echo get_woocommerce_currency_symbol(); ?> </i>
              </span>
              </div>
              <?php }else{ ?>
              <div class="offer-price d-flex align-items-center justify-content-center">
              <span>
              <?php echo number_format($normal_price, 0, '.', ',');; ?>
              <i> <?php echo get_woocommerce_currency_symbol(); ?> </i>
              </span>
              </div>
              <?php } ?>
              <?php }else{ 
                $price_v = $product->get_price_html(); ?>
              <div class="offer-price d-flex align-items-center justify-content-center"><?php
                echo str_replace("&ndash;","<span class=\"dashvar\"> – </span>", $price_v); ?>
                </div> <?php
              } 
                }
                   
             if ( !$product->is_type( 'variable' ) ) { ?>
            <a href="<?php the_permalink(); ?>" class="btn btn-secondary d-block w-100"> مشاهده محصول </a>
            <?php }else{ ?>
            <a href="<?php the_permalink(); ?>" class="btn btn-secondary d-block w-100"> مشاهده گزینه ها </a>
            <?php } ?>
            <?php if("instock"!=$stocka){ ?> 
            <div class="status">ناموجود</div>
            <?php } 
            if(!empty($sale_price) ) { ?>
           <div class="offer"> % <?php
            $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
            echo $percentage;
            ?> 
            </div>
            <?php } ?> 
            </div>
          </div>
