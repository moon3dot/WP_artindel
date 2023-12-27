<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post;
global $product;
$catname = wp_get_post_terms( $product->get_id(), 'product_cat', array());
$catlink = get_term_link( $catname[0]->term_id , 'product_cat' );
$brname = wp_get_post_terms( $product->get_id(), 'brands', array());
if ( isset( $brname[0] ) ) {
    $brlink = get_term_link( $brname[0]->term_id , 'brands' );
}
$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();
$sale_price = $product->get_sale_price();
$normal_price = $product->get_regular_price();
$pr_id = get_the_ID();
?>
<div class="d-flex align-items-center justify-content-between">
              <div class="count-comment-rate position-relative">
                <span>
                  <b> <?php echo $review_count; ?> </b>
                  نظر
                </span>
                <span>
                  <i class="icon-star"></i>
                  <?php echo $average; ?>
                </span>
              </div>
              <ul class="icons d-flex align-items-center">
                <li>
                  <a href="#">
                    <?php
              if ( is_plugin_active( 'woo-smart-compare/wpc-smart-compare.php' ) ) {
                echo do_shortcode( '[woosc id="".<?php echo get_the_ID(); ?>.""]' ); 
              } else {
                  
              }
              ?>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="isax isax-share5 popupp-button"></i>
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
	<div class="popupp-overlay">
      <div class="popupp">
        <h6>اشتراک در شبکه های اجتماعی</h6>
<a class="social" href="https://twitter.com/intent/tweet">Twitter</a>
<a class="social" href="https://www.facebook.com/sharer/sharer.php">Facebook</a>
<a class="social" href="https://www.linkedin.com/shareArticle">LinkedIn</a>
<a class="social" href="https://pinterest.com/pin/create/button">Pinterest</a>
<a class="social" href="https://www.tumblr.com/share">Tumblr</a>
<a class="social" href="https://plus.google.com/share">Google+</a>
<a class="social" href="https://vk.com/share.php">VK</a>
<a class="social" href="https://www.xing-share.com">Xing</a>
  

        <button class="close-button">بستن</button>
      </div>
    </div>
     
<style>
    a.social {
  position: relative;
  display: inline-block;
  margin: 0.333rem 0.25rem;
  border-radius: 0.75rem;
  color: #fff;
  text-decoration: none;
  text-align: center;
  line-height: 3rem;
  width: 3rem;
  height: 3rem;
  font-size: 0;
  transition: color 0.333s;
}
a.social::after {
  font-family: "fontawesome", sans-serif;
  font-size: 1.25rem;
}
a.social::before {
  position: absolute;
  left: 5px;
  right: 5px;
  top: 5px;
  bottom: 5px;
  border-radius: 0.6875rem;
  content: "";
}

a.social.social-twitter, a.social[href^="https://twitter"] {
  background-color: #00aced;
}
a.social.social-twitter::after, a.social[href^="https://twitter"]::after {
  content: "";
}
a.social.social-twitter::before, a.social[href^="https://twitter"]::before {
  box-shadow: 0 0 0 6px #00aced;
}

a.social.social-facebook, a.social[href^="https://www.facebook"] {
  background-color: #3b5998;
}
a.social.social-facebook::after, a.social[href^="https://www.facebook"]::after {
  content: "";
}
a.social.social-facebook::before, a.social[href^="https://www.facebook"]::before {
  box-shadow: 0 0 0 6px #3b5998;
}

a.social.social-google, a.social[href^="https://plus.google"] {
  background-color: #dd4b39;
}
a.social.social-google::after, a.social[href^="https://plus.google"]::after {
  content: "";
}
a.social.social-google::before, a.social[href^="https://plus.google"]::before {
  box-shadow: 0 0 0 6px #dd4b39;
}

a.social.social-linkedin, a.social[href^="https://www.linkedin"] {
  background-color: #007bb6;
}
a.social.social-linkedin::after, a.social[href^="https://www.linkedin"]::after {
  content: "";
}
a.social.social-linkedin::before, a.social[href^="https://www.linkedin"]::before {
  box-shadow: 0 0 0 6px #007bb6;
}

a.social.social-pintrest, a.social[href^="https://pinterest"] {
  background-color: #cb2027;
}
a.social.social-pintrest::after, a.social[href^="https://pinterest"]::after {
  content: "";
}
a.social.social-pintrest::before, a.social[href^="https://pinterest"]::before {
  box-shadow: 0 0 0 6px #cb2027;
}

a.social.social-tumblr, a.social[href^="https://www.tumblr"] {
  background-color: #32506d;
}
a.social.social-tumblr::after, a.social[href^="https://www.tumblr"]::after {
  content: "";
}
a.social.social-tumblr::before, a.social[href^="https://www.tumblr"]::before {
  box-shadow: 0 0 0 6px #32506d;
}

a.social.social-vk, a.social[href^="https://vk.com"] {
  background-color: #5E82A8;
}
a.social.social-vk::after, a.social[href^="https://vk.com"]::after {
  content: "";
}
a.social.social-vk::before, a.social[href^="https://vk.com"]::before {
  box-shadow: 0 0 0 6px #5E82A8;
}

a.social.social-xing, a.social[href^="https://www.xing-share"] {
  background-color: #175E60;
}
a.social.social-xing::after, a.social[href^="https://www.xing-share"]::after {
  content: "";
}
a.social.social-xing::before, a.social[href^="https://www.xing-share"]::before {
  box-shadow: 0 0 0 6px #175E60;
}


    .popupp-overlay {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 999;
}

.popupp {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 300px;
  background-color: white;
  padding: 20px;
  text-align: center;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
  animation-name: zoomIn;
  animation-duration: 0.5s;
}

@keyframes zoomIn {
  from {
    transform: scale(0);
  }
  to {
    transform: scale(1);
  }
}

.close-button {
  background-color: #eee;
  color: black;
  border: none;
  padding: 5px 10px;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 10px;
}


.popupp-overlay.show {
  display: block;
}

</style>
    <script>
        const popuppOverlay = document.querySelector('.popupp-overlay');
const popuppButton = document.querySelector('.popupp-button');
const closeButton = document.querySelector('.close-button');

popuppButton.addEventListener('click', () => {
  popuppOverlay.classList.add('show');
});

closeButton.addEventListener('click', () => {
  popuppOverlay.classList.remove('show');
});

    </script>
            </div>
            <?php
            if ($date_from = get_post_meta($pr_id, '_sale_price_dates_from', true)){
                $sale_price_dates_from = date('Y-m-d 00:00:00', $date_from);
            }
            if ($date_to = get_post_meta($pr_id, '_sale_price_dates_to', true)){
                $sale_price_dates_to = date('Y-m-d 23:59:59', $date_to);
            }
            if(!empty($sale_price_dates_from)):
            $deal_start_date = $sale_price_dates_from;
            $deal_start_time = strtotime($deal_start_date);
            $deal_end_date = $sale_price_dates_to;
            $deal_end_time = strtotime($deal_end_date, current_time('timestamp'));
            //$current_date = current_time( 'Y-m-d H:i:s', true );
            $current_time = strtotime('NOW', current_time('timestamp'));
            $time_diff = ($deal_end_time - $current_time); 
            endif;
            ?>
            <?php if (!empty($deal_end_date)): ?>
            <div class="timear d-flex align-items-center justify-content-between">
            <div class="title">
                پیشنهاد شگفت انگیز
                <span> فرصت باقی مانده </span>
            </div>
            
            <ul class="d-flex align-items-center" data-time="<?php  echo $deal_end_date; ?>">
                <li>
                <span class="second"> 00 </span>
                ثانیه
                </li>
                <li>
                <span class="minute"> 00 </span>
                دقیقه
                </li>
                <li>
                <span class="hour"> 00 </span>
                ساعت
                </li>
                <li>
                <span class="day"> 00 </span>
                روز
                </li>
            </ul>
            </div>
            <?php endif; ?>
            <ul class="info-product d-flex align-items-center flex-wrap">
            <?php if(!empty($catname[0]->name)): ?>
              <li>
                <span> دسته بندی </span>
                <a href="<?php echo $catlink; ?>"> <?php echo $catname[0]->name; ?> </a>
              </li>
              <?php endif; ?>
              <?php
                $cus_l = get_post_meta( get_the_ID(), "cus_lab_g", true );
                $cus_v = get_post_meta( get_the_ID(), "cus_lab_g", true );
                if(!empty($cus_l) and !empty($cus_v)):
                ?>
              <li>
                <span> <?php echo $cus_l[0]['cus_lab']; ?> </span>
                <span> <?php echo $cus_v[0]['cus_val']; ?> </span>
              </li>
              <?php
                endif;
                ?>
                <?php if(!empty($brname[0]->name)): ?>
              <li>
                <span> برند </span>
                <a href="<?php echo $brlink; ?>"> <?php echo $brname[0]->name; ?> </a>
              </li>
              <?php
                endif;
                ?>
            </ul>
            <br>
           
            <div class="price-add-to-cart">
                <?php if ( !$product->is_type( 'variable' ) ) : ?>
                    <?php if(!empty($sale_price) ): ?>
                    <div class="offer-product">
                        <span> <?php
                $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
                echo $percentage . "%";
                ?> </span>
                        تخفیف
                    </div>
                    <?php endif; ?>
                <div class="price">
                    <?php if(!empty($sale_price) ): ?>
                    <del> <?php echo number_format($normal_price, 0, '.', ','); ?> </del>
                    <?php endif; ?>
                    <?php if(!empty($sale_price) ): ?>
                    <span> <?php echo $sale_price ?> </span>
                    <?php echo get_woocommerce_currency_symbol(); ?>
                    <?php else: ?>
                    <span> <?php echo number_format($normal_price, 0, '.', ','); ?> </span>
                    <?php echo get_woocommerce_currency_symbol(); ?>
                    <?php endif; ?>
                </div>

                <form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
                  <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
                  <div class="qacol">
                  <?php
                  do_action( 'woocommerce_before_add_to_cart_quantity' );
                  ?>
                  <button class="changeinp" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"> - </button>
                  <?php
                  woocommerce_quantity_input(
                    array(
                      'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                      'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                      'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
                    )
                  );
                  ?>
                  <button class="changeinp" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> + </button>
                  <?php
                  do_action( 'woocommerce_after_add_to_cart_quantity' );
                  ?>
                  </div>
                  
                  <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="rounded single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> btn btn-success-2 d-block w-100"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

                  <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
                </form>
                  <style>
                    .qacol {
                        position: relative !important;
                        display: block;
                        top: unset !important;
                        right: unset !important;
                        margin-bottom: 25px !important;
                    }
                  </style>
              <?php elseif ( $product->is_type( 'variable' ) ) : 
				      woocommerce_template_single_add_to_cart();
              endif; ?>
            </div>
          