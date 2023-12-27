
jQuery(document).ready(function($){
    jQuery('.remove-cart-item').click(function(m){
        m.preventDefault();
        var product_id = jQuery(this).data('cart-item-key');
        jQuery.ajax({
            type: 'POST',
            url: ajaxurl, 
            data: {
                action: 'wc_remove_cart_item',
                product_id: product_id,
            },
            beforeSend: function(response){
              jQuery('.kaveh-cart-inner').html('<br><br><br><br><br><br><div id="loading"></div><br><br><br><br><br><br>');
            },
            
            success: function(response) {
              if ( response.result === 'success' ) {
              jQuery('.kaveh-cart-inner').html(response.cart_contents);
              jQuery('.kaveh-inner-cart-tot').html(response.cart_total);
              jQuery('.kaveh-cart-countt').html(response.cart_count);
              }
            }, 
        });
    });

  jQuery('.cart-two-offer-code .btn.btn-danger').click(function(e) {
    e.preventDefault();
    var coupon_code = jQuery('input[name="coupon_code"]').val();
    console.log(coupon_code);
    if (coupon_code) {
      jQuery.ajax({
        type: 'POST',
        url: ajaxurl, 
        data: {
          action: 'woocommerce_apply_coupon_kaveh',
          coupon_code: coupon_code,
        },
        beforeSend: function(response){
              jQuery('.kaveh-inner-cart-tot').html('<div id="loading"></div>');
            },
        success: function (response) {
          if (response.result === 'success') {
              jQuery('.kaveh-inner-cart-tot').html(response.cart_total);
          } else {
            jQuery('.kaveh-cart-inne').html('<h3>مشکل در اعتبار سنجی کد تخفیف</h3>');
          }
        }
      });
    }
    return false;
  });
});