<?php
global $product;
$sale_price = $product->get_sale_price();
$normal_price = $product->get_regular_price();

$pr_id = get_the_ID();
$stocka = $product->get_stock_status();
?>
          <div class="product product-five">
            <div class="content">
              <h2>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
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
              <div><?php
              echo str_replace("&ndash;","<span class=\"dashvar\"> – </span>", $price_v); ?>
              </div><?php
            } 
          }
            ?>
              <div class="product-hover">
              <?php if ( !$product->is_type( 'variable' ) ) { ?>
                <a href="<?php the_permalink(); ?>" class="btn btn-secondary rounded-pill"> مشاهده محصول </a>
                <?php }else{ ?>
                <a href="<?php the_permalink(); ?>" class="btn btn-secondary rounded-pill"> مشاهده گزینه ها </a>
                <?php }
                if ( !$product->is_type( 'variable' ) ) {
                if("instock"==$stocka ){ ?>
                <button type="submit" name="add-to-cart" value="<?php echo $pr_id ?>" class="single_add_to_cart_button btn btn-secondary rounded-circle icarrt">
                  <i class="icon icon-cart-3"></i>
                </button>
                <?php }
                } 
				  if ( is_plugin_active( 'woo-smart-compare/wpc-smart-compare.php' ) ) {
					  echo do_shortcode( '[woosc id="".<?php echo get_the_ID(); ?>.""]' ); 
				  } else {
				  }
				  ?>
				      <?php
      if ( is_plugin_active( 'woo-smart-wishlist/wpc-smart-wishlist.php' ) ) { ?>
        <?php echo do_shortcode( '[woosw id="".<?php echo get_the_ID(); ?>.""]' ); ?>
      <?php
      } else {
          
      }
      ?>
              <button id="eyeid" type="button" class="btn btn-secondary rounded-circle eyeid" data-bs-toggle="modal" data-bs-target="#modal-product" value="<?php echo $pr_id; ?>">
              <i class="isax isax-eye3"></i>
              </button>
              </div>
            </div>
            <?php
            if("instock"!=$stocka){ ?> 
            <div class="status">
              ناموجود
            </div>
            <?php } ?>
            <div class="product-image">
            <?php if("instock"==$stocka){ 
             if(!empty($sale_price) ) { ?>
            <div class="discount">
            % <?php
            $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
            echo $percentage;
            ?> 
            </div>
            <?php } 
            }?> 
              <a href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
              </a>
            </div>
          </div>
 