<?php
global $product;
$sale_price = $product->get_sale_price();
$normal_price = $product->get_regular_price();

$pr_id = get_the_ID();
$stocka = $product->get_stock_status();
?>
          <div class="product product-not">
            <div class="product-image">
            <?php
              if ( is_plugin_active( 'woo-smart-compare/wpc-smart-compare.php' ) ) {
                echo do_shortcode( '[woosc id="".<?php echo get_the_ID(); ?>.""]' ); 
              } else {
                  
              }
              ?>
            <?php if("instock"!=$stocka){ ?> 
              <div class="status">
                ناموجود
              </div>
              <?php } 
              ?> 
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
              <div class="price">
              <?php echo number_format($normal_price, 0, '.', ',');; ?>
              <span> <?php echo get_woocommerce_currency_symbol(); ?></span>
            </div>
            <?php } ?>
            <?php }else{ 
              $price_v = $product->get_price_html(); 
              echo str_replace("&ndash;","<span class=\"dashvar\"> – </span>", $price_v);
            } 
            ?>
            <?php }
             ?>
              <h2>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
              <div class="icons-offer d-flex align-items-center">
                <ul class="d-flex align-items-center">
                <?php if ( !$product->is_type( 'variable' ) ) { ?>
                  <?php if("instock"==$stocka ){ ?>
                  <li>
                    <a href="#" type="submit" name="add-to-cart" value="<?php echo $pr_id ?>" class="single_add_to_cart_button">
                      <i class="icon icon-cart-3"></i>
                    </a>
                  </li>
                  <?php }
                  } ?>
                  <li>
                    <a id="eyeid" type="button" data-bs-toggle="modal" data-bs-target="#modal-product" value="<?php echo $pr_id; ?>" class="eyeid">
                      <i class="isax isax-eye"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
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
                <?php if("instock"==$stocka){ 
                if(!empty($sale_price) ) { ?>
                <span>
                % <?php
                $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
                echo $percentage;
                ?>
                </span>
                <?php } 
                }?> 
              </div>
            </div>
          </div>
      







   

 