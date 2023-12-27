<?php $options = get_option( 'kaveh_frame' ); ?>
<?php
  $page = get_page_by_path('klogin');
  $page_id = $page->ID;
  $account_page_id = get_option('woocommerce_myaccount_page_id');
  if( !is_page( $account_page_id ) and !is_page( $page_id ) ): ?>
<?php if (  function_exists( 'boostify_footer_active' ) && boostify_footer_active() ): ?>
  <?php boostify_get_footer_template(); //Custom footer ?>
  <?php else: ?>
<!-- Start Footer -->
    <footer class="footer-two position-relative">
      <div class="container">
        <div class="d-flex align-items-center justify-content-between flex-column-reverse flex-sm-row">
          <div class="footer-tow-copyright mt-3 mt-sm-0">
            کلیه حقوق این سایت متعلق به شرکت
            <b> <?php echo get_bloginfo('name'); ?> </b>
            می باشد
          </div>
        </div>
      </div>
    </footer>
    <!-- End Footer -->
    <?php endif; ?>
  </div>
    
<?php
?>
<?php endif; ?>
<?php if($options['kaveh_preload_switch']==1) : ?>
    <script>  
        document.onreadystatechange = function() {
          setTimeout(function() {
                if (document.readyState !== "complete") {
                    document.querySelector(
                      "body").style.visibility = "hidden";
                    document.querySelector(
                      "#loftloader-wrapper").style.visibility = "visible";
                } else {
                    document.querySelector(
                      "#loftloader-wrapper").style.display = "none";
                    document.querySelector(
                      "body").style.visibility = "visible";
                }
          }, 3000);
        };
    </script>
<?php endif; ?>

<?php if ( class_exists( 'woocommerce' )):  ?>
  <!-- Start Modal -->
  <div id="modal-product" class="modal modal-product fade">
    <div class="modal-dialog modal-dialog-centered">
        <div id="ajax_popup" class="modal-content">
          
        </div>
    </div>
  </div>
   <!-- End Modal -->
  
 <div class="position-fixed bottom-0 end-0 me-4 mb-5 align-items-center inform nomobile">
      <a href="<?php global $woocommerce; $cart_page_url = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url(); echo $cart_page_url; ?>"><div class="box-inform shadow-lg rounded bg-light px-5 py-2 position-relative align-items-center">
        <img class="position-absolute start-0 zangoole" src="<?php echo get_template_directory_uri() .'/assets/images/Clock-1.png'; ?>" alt="">
        <p class="position-relative mip">محصول به سبد خرید اضافه شد</p>
      </div></a>

  </div>
<?php endif; ?>

    <?php if ( wp_is_mobile() ) : ?>
      <?php
    if($options['kaveh_footer_mobile_on']==1):
    $mkfooter = $options['kaveh_footer_mobile'];
    switch ($mkfooter) {
      case "value-1":
        ?>
   <div class="nav-bottom nav-bottom-two position-fixed bottom-0 end-0 w-100 d-flex align-items-center justify-content-between">
      <a href="<?php echo $options['kaveh_foomobile_url_icon1']['url']; ?>">
        <i class="<?php echo $options['kaveh_foomobile_icon1']; ?>"></i>
      </a>
      <?php if ( class_exists( 'woocommerce' )):  ?>
      <a href="<?php echo $options['kaveh_foomobile_url_icon2']['url']; ?>">
        <i class="<?php echo $options['kaveh_foomobile_icon2']; ?>"></i>
      </a>
      <?php endif; ?>
      <?php if ( class_exists( 'woocommerce' )):  ?>
      <a href="#" data-open-cart="true">
        <i class="<?php echo $options['kaveh_foomobile_icon3']; ?>"></i>
        <span class="tot-mob"> <?php echo WC()->cart->get_cart_contents_count(); ?> </span>
      </a>
      <?php endif; ?>
      <a href="<?php echo $options['kaveh_foomobile_url_icon4']['url']; ?>">
        <i class="<?php echo $options['kaveh_foomobile_icon4']; ?>"></i>
      </a>
      <?php if ( class_exists( 'woocommerce' )):  ?>
      <a href="<?php echo $options['kaveh_foomobile_url_icon5']['url']; ?>">
        <i class="<?php echo $options['kaveh_foomobile_icon5']; ?>"></i>
      </a>
      <?php endif; ?>
    </div> 
        <?php
        break;
      case "value-2":
        ?>
   <div class="nav-bottom position-fixed bottom-0 end-0 w-100 d-flex align-items-center justify-content-between">
      <a <?php if(is_front_page()): ?>style="color:<?php echo $options['opt-color-5'];  ?>"<?php endif; ?> href="<?php echo $options['kaveh_foomobile_url_icon1']['url']; ?>">
        <i class="<?php echo $options['kaveh_foomobile_icon1']; ?>"></i>
      </a>
      <?php if ( class_exists( 'woocommerce' )):  ?>
      <a <?php if(is_shop()): ?>style="color:<?php echo $options['opt-color-5'];  ?>"<?php endif; ?> href="<?php echo $options['kaveh_foomobile_url_icon2']['url']; ?>">
        <i class="<?php echo $options['kaveh_foomobile_icon2']; ?>"></i>
      </a>
      <?php endif; ?>
      <?php if ( class_exists( 'woocommerce' )):  ?>
      <a href="#" data-open-cart="true">
        <i class="<?php echo $options['kaveh_foomobile_icon3']; ?>"></i>
        <span class="tot-mob"> <?php echo WC()->cart->get_cart_contents_count(); ?> </span>
      </a>
      <?php endif; ?>
      <a <?php if(is_home()): ?>style="color:<?php echo $options['opt-color-5'];  ?>"<?php endif; ?> href="<?php echo $options['kaveh_foomobile_url_icon4']['url']; ?>">
        <i class="<?php echo $options['kaveh_foomobile_icon4']; ?>"></i>
      </a>
      <?php if ( class_exists( 'woocommerce' )):  ?>
      <a <?php if(is_account_page()): ?>style="color:<?php echo $options['opt-color-5'];  ?>"<?php endif; ?> href="<?php echo $options['kaveh_foomobile_url_icon5']['url']; ?>">
        <i class="<?php echo $options['kaveh_foomobile_icon5']; ?>"></i>
      </a>
      <?php endif; ?>
    </div>

        
        <?php
        break;
      case "value-3":
        ?>
          <div class="nav-bottom nav-bottom-three position-fixed bottom-0 end-0 w-100 d-flex align-items-center justify-content-between">
            <a <?php if(is_front_page()): ?>style="color:<?php echo $options['opt-color-5'];  ?>"<?php endif; ?> href="<?php echo $options['kaveh_foomobile_url_icon1']['url']; ?>">
              <i class="<?php echo $options['kaveh_foomobile_icon1']; ?>"></i>
            </a>
            <?php if ( class_exists( 'woocommerce' )):  ?>
            <a <?php if(is_shop()): ?>style="color:<?php echo $options['opt-color-5'];  ?>"<?php endif; ?> href="<?php echo $options['kaveh_foomobile_url_icon2']['url']; ?>">
              <i class="<?php echo $options['kaveh_foomobile_icon2']; ?>"></i>
            </a>
            <?php endif; ?>
            <?php if ( class_exists( 'woocommerce' )):  ?>
            <a href="#" data-open-cart="true">
              <i class="<?php echo $options['kaveh_foomobile_icon3']; ?>"></i>
              <span class="tot-mob"> <?php echo WC()->cart->get_cart_contents_count(); ?> </span>
            </a>
            <?php endif; ?>
            <a <?php if(is_home()): ?>style="color:<?php echo $options['opt-color-5'];  ?>"<?php endif; ?> href="<?php echo $options['kaveh_foomobile_url_icon4']['url']; ?>">
              <i class="<?php echo $options['kaveh_foomobile_icon4']; ?>"></i>
            </a>
            <?php if ( class_exists( 'woocommerce' )):  ?>
            <a <?php if(is_account_page()): ?>style="color:<?php echo $options['opt-color-5'];  ?>"<?php endif; ?> href="<?php echo $options['kaveh_foomobile_url_icon5']['url']; ?>">
              <i class="<?php echo $options['kaveh_foomobile_icon5']; ?>"></i>
            </a>
            <?php endif; ?>
          </div> 
        <?php
        break;
      case "value-4":
        ?>
        <div class="nav-bottom nav-bottom-four position-fixed bottom-0 w-100 d-flex align-items-center justify-content-between">
          <a <?php if(is_front_page()): ?>style="color:<?php echo $options['opt-color-5'];  ?>"<?php endif; ?> href="<?php echo $options['kaveh_foomobile_url_icon1']['url']; ?>">
            <i class="<?php echo $options['kaveh_foomobile_icon1']; ?>"></i>
          </a>
          <?php if ( class_exists( 'woocommerce' )):  ?>
          <a <?php if(is_shop()): ?>style="color:<?php echo $options['opt-color-5'];  ?>"<?php endif; ?> href="<?php echo $options['kaveh_foomobile_url_icon2']['url']; ?>">
            <i class="<?php echo $options['kaveh_foomobile_icon2']; ?>"></i>
          </a>
          <?php endif; ?>
          <?php if ( class_exists( 'woocommerce' )):  ?>
          <a data-open-cart="true" <?php if(is_cart()): ?>style="color:<?php echo $options['opt-color-5'];  ?>"<?php endif; ?> href="#" data-open-cart="true">
            <i class="<?php echo $options['kaveh_foomobile_icon3']; ?>"></i>
          </a>
          <?php endif; ?>
          <a <?php if(is_home()): ?>style="color:<?php echo $options['opt-color-5'];  ?>"<?php endif; ?> href="<?php echo $options['kaveh_foomobile_url_icon4']['url']; ?>">
            <i class="<?php echo $options['kaveh_foomobile_icon4']; ?>"></i>
          </a>
          <?php if ( class_exists( 'woocommerce' )):  ?>
          <a <?php if(is_account_page()): ?>style="color:<?php echo $options['opt-color-5'];  ?>"<?php endif; ?> href="<?php echo $options['kaveh_foomobile_url_icon5']['url']; ?>">
            <i class="<?php echo $options['kaveh_foomobile_icon5']; ?>"></i>
          </a>
          <?php endif; ?>
        </div> 
        <?php
        break;

      }
      endif;
  endif;
  wp_footer();
    ?>
<style>
.amazing-offer-eight .single_add_to_cart_button.loading:before {
    position: relative;
}

.products-category  .swiper-button-prev:after {
    content: 'prev' !important;
}
 .products-category .swiper-button-next:after {
    content: 'next' !important;
}
.boostify-menu .menu-item-has-children .menu-item-has-children .sub-menu {
    right: 100% !important;
    left: auto !important;
}
.tooltip-inner {
       font-family: "Yekan Bakh"!important;
  }
	.megamenu-tabs span:hover, .megamenu-tabs span:hover::after, .megamenu-tabs span.active, .megamenu-tabs span.active::after {

    margin-right: 5px;
}
</style>

</body>
</html>
