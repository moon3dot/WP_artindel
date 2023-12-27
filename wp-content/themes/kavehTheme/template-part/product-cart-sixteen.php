<?php
global $product;
$sale_price = $product->get_sale_price();
$normal_price = $product->get_regular_price();

$pr_id = get_the_ID();
$stocka = $product->get_stock_status();
?>
          <div class="product product-thirteen product-thirteen-three position-relative bg-white radius-15 overflow-hidden">
			<?php if("instock"!=$stocka){ ?>
            <div class="status">
              ناموجود
            </div>
            <?php } ?>
          <?php
            if(!empty($normal_price) ) { 
             if("instock"==$stocka){ 
             if(!empty($sale_price) ) { ?>
            <div class="discount position-absolute text-white rounded-circle text-center fw-bold">
            % <?php
            $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
            echo $percentage;
            ?> 
            </div>
            <?php } 
            }
          }?>  
            <div class="product-image pt-0">
            <?php
if ( is_plugin_active( 'woo-smart-compare/wpc-smart-compare.php' ) ) {
   echo do_shortcode( '[woosc id="".<?php echo get_the_ID(); ?>.""]' ); 
} else {
    
}
?>
             <a href="<?php the_permalink(); ?>" class="d-block">
                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="product" class="d-block w-100" />
              </a>
              <ul class="btns position-absolute">
              <?php 
              if(!empty($normal_price) ) { 
              if ( !$product->is_type( 'variable' ) ) {
                if("instock"==$stocka ){ ?>
                <li>
                <a type="submit" name="add-to-cart" value="<?php echo $pr_id ?>" class="rounded-circle text-center d-block position-relative single_add_to_cart_button">
                    <i class="icon icon-cart-3"></i>
                  </a>
                </li>
                <?php }
              }
                } ?>
                <li>
                <a id="eyeid" type="button" value="<?php echo $pr_id; ?>" class="rounded-circle text-center d-block eyeid" data-bs-toggle="modal" data-bs-target="#modal-product" >
                    <i class="isax isax-eye3"></i>
                  </a>
                </li>
                <li>
                  <a href="#" class="rounded-circle text-center d-block">
                          <?php
      if ( is_plugin_active( 'woo-smart-wishlist/wpc-smart-wishlist.php' ) ) { ?>
        <?php echo do_shortcode( '[woosw id="".<?php echo get_the_ID(); ?>.""]' ); ?>
      <?php
      } else {
          
      }
      ?>
                  </a>
                </li>
              </ul>
            </div>
            <div class="detail p-0">
              <h2 class="text-center mt-0">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
              <?php if("instock"==$stocka){ ?>
              <?php if ( !$product->is_type( 'variable' ) ) { ?>
              <div class="price text-center">
              <?php echo number_format($normal_price, 0, '.', ',');; ?> 
                <span> <?php echo get_woocommerce_currency_symbol(); ?></span>
              </div>
              <?php }else{ 
              $price_v = $product->get_price_html(); ?>
              <div class="text-center"><?php
              echo str_replace("&ndash;","<span class=\"dashvar\"> – </span>", $price_v);?>
              </div><?php
                  } 
                }
              
              ?>
            </div>
          </div>