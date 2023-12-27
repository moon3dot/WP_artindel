<?php
global $product;
$sale_price = $product->get_sale_price();
$normal_price = $product->get_regular_price();

$pr_id = get_the_ID();
$stocka = $product->get_stock_status();
?>
          <div class="product product-eleven overflow-hidden">
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
            <?php if("instock"==$stocka){ 
             if(!empty($sale_price) ) { ?>
              <div class="discount">
                % <?php
              $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
              echo $percentage;
              ?> 
              </div>
              <button type="button" class="bookmark btn btn-warning p-0 position-absolute">
                <i class="isax isax-ticket-discount5"></i>
              </button>
              <?php } 
              }?> 
              <ul class="colors position-absolute">
                <?php
                // Get the terms associated with the product
                
                $terms = get_the_terms( $pr_id , 'pa_color' );
                // Loop through the terms
                foreach ( $terms as $term ) {
                    $val     = get_term_meta( $term->term_id, 'wpcvs_color', true ) ?: '';
                    $tooltip = get_term_meta( $term->term_id, 'wpcvs_tooltip', true ) ?: $term->name;
                    ?>
                      <li>
                        <a href="<?php the_permalink(); ?>" class="rounded-circle d-block hint--right" aria-label="<?php echo esc_attr( $tooltip ) ?>" title="<?php echo esc_attr( $tooltip ) ?>" style="background-color: <?php echo esc_attr( $val ) ?>;"></a>
                      </li>
                
                    <?php
                }
                ?>
              </ul>
              <a href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="product">
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
              <div class="price nor12p">
              <?php echo number_format($normal_price, 0, '.', ',');; ?>
              <span> <?php echo get_woocommerce_currency_symbol(); ?></span>
            </div>
            <?php } ?>
            <?php }else{ 
              $price_v = $product->get_price_html(); ?>
			<div><?php
              echo str_replace("&ndash;","<span class=\"dashvar\"> – </span>", $price_v); ?>
		    </div><?php
            } 
            ?>
            <?php }else
            {
              ?>
              <div class="mt-p12"></div>
              <?php
            }?>
            <?php if(empty($normal_price) ) { ?>
              <div class="mt-p121"></div>
                <?php } ?>
              <h2>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
              <div class="btns d-flex align-items-center justify-content-center">
             <?php if ( !$product->is_type( 'variable' ) ) {
                if("instock"==$stocka ){ ?>
                <button type="button" class="add-to-cart single_add_to_cart_button position-relative cart11" value="<?php echo $pr_id; ?>">
                  <i class="icon icon-cart-3"></i>
                </button>
                <?php }
                } ?>
                <button id="eyeid" type="button" value="<?php echo $pr_id; ?>" class="rounded-circle text-center d-block eyeid" data-bs-toggle="modal" data-bs-target="#modal-product">
                  <i class="isax isax-eye3"></i>
                </button>
      <?php
      if ( is_plugin_active( 'woo-smart-wishlist/wpc-smart-wishlist.php' ) ) { ?>
        <?php echo do_shortcode( '[woosw id="".<?php echo get_the_ID(); ?>.""]' ); ?>
      <?php
      } else {
          
      }
      ?>
              </div>
            </div>
          </div>