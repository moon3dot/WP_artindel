<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;
$sale_price = $product->get_sale_price();
$product_id = $product->get_id();
$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);


$options = get_option( 'kaveh_frame' );
if($options['kaveh_pr_single_select']=='value-1'):
?>  
	
	<div class="gallery-image position-relative">
	<!-- Start Gallery Image Origin -->
	<div class="gallery-image-origin d-flex align-items-center justify-content-center">
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' );?>
		<img src="<?php  echo $image[0]; ?>" alt="product" data-modal-gallery="show" />
	</div>
	<!-- End Gallery Image Origin -->

		<?php do_action( 'woocommerce_product_thumbnails' ); ?>

               <?php if(!empty($sale_price) ) { ?>
	              <!-- Start Offer -->
	              <div class="detail-product-offer">
                <?php
                $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
                echo $percentage . "%";
                ?>
                </div>
                <!-- End Offer -->
                <?php } ?>

                <!-- Start Icons -->
                <ul class="detail-product-icons">
                   <li data-bs-toggle="tooltip" title="مقایسه" data-bs-placement="left">

					   <?php
              if ( is_plugin_active( 'woo-smart-compare/wpc-smart-compare.php' ) ) {
                echo do_shortcode( '[woosc id="".<?php echo get_the_ID(); ?>.""]' ); 
              } else {
                  
              }
              ?>
                  </li>
                  <li data-bs-toggle="tooltip" title="اشتراک گذاری" data-bs-placement="left">
                    <i class="isax isax-share5 popupp-button"></i>
                  </li>
                  <li data-bs-toggle="tooltip" title="افزودن به موردعلاقه" data-bs-placement="left">
                          <?php
      if ( is_plugin_active( 'woo-smart-wishlist/wpc-smart-wishlist.php' ) ) { ?>
        <?php echo do_shortcode( '[woosw id="".<?php echo get_the_ID(); ?>.""]' ); ?>
      <?php
      } else {
          
      }
      ?>
                  </li>
                </ul>
                <!-- End Icons -->
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
			  <div class="box-gallery">
          <div class="box-gallery-dialog">
            <div class="box-gallery-content">
              <div class="box-gallery-header d-flex align-items-center justify-content-between">
                <h4> گالری محصولات </h4>
                <button type="button" class="box-gallery-close">
                  <i class="icon-close"></i>
                </button>
              </div>
              <div class="box-gallery-body d-flex flex-column-reverse flex-sm-row">
                <ul>
                <?php
                $attachment_ids = $product->get_gallery_image_ids();
                if ( $attachment_ids && $product->get_image_id() ) {
                  foreach ( $attachment_ids as $attachment_id ) {
                    if($count==0){
                      $first_image= wp_get_attachment_url( $attachment_id );
                    }
                    ?>
                <li>
                <img  src="<?php echo wp_get_attachment_url( $attachment_id ); ?>" alt="product" data-gallery="img-origin" />
              </li>
              <?php
            }
          }
          ?>              
                       
        </ul>
        <img src="<?php echo $first_image ?>" alt="product" id="img-origin" />
      </div>
    </div>
  </div>
</div>



<?php elseif($options['kaveh_pr_single_select']=='value-2'): ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' ); ?>
        <?php $attachment_ids = $product->get_gallery_image_ids(); ?>
          <div class="gallery position-relative">
            <div class="origin-image position-relative">
              <img src="<?php  echo $image[0]; ?>" alt="product" id="origin-image"
                data-modal-gallery="show" />
              <button type="button" class="zoom" data-modal-gallery="show">
                <i class="icon-arrow-zoom"></i>
              </button>
            </div>
            <div class="swiper swiper-gallery-product-two overflow-hidden">
              <div class="swiper-wrapper">
              <?php
              if ( $attachment_ids && $product->get_image_id() ) {
                foreach ( $attachment_ids as $attachment_id ) {
                  ?>
              
                <div class="swiper-slide">
                  <div class="gallery-product-two-item d-flex align-items-center h-100">
                    <img src="<?php echo wp_get_attachment_url( $attachment_id ); ?>" alt="product" class="mx-auto w-100" data-gallery="origin-image" />
                  </div>
                </div>
                <?php
                  }
                }
                ?>
               
                
              </div>
          </div>
           
        

            <ul class="icons">
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
            <div class="rate">
              <i class="icon-star d-block"></i>
              <?php echo $average; ?>
            </div>
            <?php if(!empty($sale_price) ) { ?>
            <div class="offer">
            <?php
                $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
                echo $percentage . "%";
                ?>
              <span class="fw-light d-block"> تخفیف </span>
            </div>
            <?php } ?>
          </div>
          <div class="box-gallery">
            <div class="box-gallery-dialog">
              <div class="box-gallery-content">
                <div class="box-gallery-header d-flex align-items-center justify-content-between">
                  <h4> گالری محصولات </h4>
                  <button type="button" class="box-gallery-close">
                    <i class="icon-close"></i>
                  </button>
                </div>
                <div class="box-gallery-body d-flex flex-column-reverse flex-sm-row">
                  <ul>
                  <?php
                  if ( $attachment_ids && $product->get_image_id() ) {
                    foreach ( $attachment_ids as $attachment_id ) {
                      ?>
                    <li>
                      <img src="<?php echo wp_get_attachment_url( $attachment_id ); ?>" alt="product" data-gallery="img-origin" />
                    </li>
                    <?php
                      }
                    }
                    ?>
                  </ul>
                  <img src="<?php  echo $image[0]; ?>" alt="product" id="img-origin" />
                </div>
              </div>
            </div>
          </div>

<?php elseif($options['kaveh_pr_single_select']=='value-3'): ?>

        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' ); ?>
        <?php $attachment_ids = $product->get_gallery_image_ids(); ?>
          

        <div class="gallery">
          <div class="gallery-origin">
            <img src="<?php  echo $image[0]; ?>" alt="product" id="gallery-origin"
              data-modal-gallery="show" />
            <button type="button" class="zoom" data-modal-gallery="show">
              <i class="icon-arrow-zoom"></i>
            </button>
          </div>
          <div class="swiper swiper-gallery-product-three overflow-hidden w-100 mx-auto">
            <div class="swiper-wrapper">
              <?php
              if ( $attachment_ids && $product->get_image_id() ) {
                foreach ( $attachment_ids as $attachment_id ) {
                  ?>
                <div class="swiper-slide">
                  <div class="gallery-product-three-item d-flex align-items-center justify-content-center">
                    <img src="<?php echo wp_get_attachment_url( $attachment_id ); ?>" alt="product" data-gallery="gallery-origin" />
                  </div>
                </div>
                <?php
                  }
                }
                ?>
                
            </div>
          </div>
      
        </div>
        <div class="box-gallery">
          <div class="box-gallery-dialog">
            <div class="box-gallery-content">
              <div class="box-gallery-header d-flex align-items-center justify-content-between">
                <h4> گالری محصولات </h4>
                <button type="button" class="box-gallery-close">
                  <i class="icon-close"></i>
                </button>
              </div>
              <div class="box-gallery-body d-flex flex-column-reverse flex-sm-row">
                <ul>
                <?php
                    if ( $attachment_ids && $product->get_image_id() ) {
                      foreach ( $attachment_ids as $attachment_id ) {
                        ?>
                      <li>
                        <img src="<?php echo wp_get_attachment_url( $attachment_id ); ?>" alt="product" data-gallery="img-origin" />
                      </li>
                      <?php
                        }
                      }
                      ?>              
                </ul>
                <img src="<?php  echo $image[0]; ?>" alt="product" id="img-origin" />
              </div>
            </div>
          </div>
        </div>

<?php endif; ?>	 