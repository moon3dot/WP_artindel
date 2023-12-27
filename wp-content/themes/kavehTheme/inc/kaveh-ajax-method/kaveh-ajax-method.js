function fetchData(inputElement){    
    setTimeout( function(){
      var keyword = jQuery(inputElement).val();
      console.log(keyword)
    jQuery.ajax({
        url: ajaxurl,
        type: 'post',
        data: { action: 'data_fetch', keyword: keyword },
        beforeSend: function(data) {
            jQuery('.datafetch').html('<div class="ph-item wowload-box"> <div class="ph-col-12"> <div class="ph-row"> <div class="ph-col-12 big"></div><div class="ph-col-6 empty"></div><div class="ph-col-6"></div><div class="ph-col-12"></div></div></div></div>');
        },
        success: function(data) {
            jQuery('.datafetch').html(data);
        }
    });

      jQuery.ajax({
          url: ajaxurl,
          type: 'post',
          data: { action: 'data_fetch2', keyword: keyword },
      beforeSend: function(data){
            jQuery('.datafetch2').html('<div class="ph-item wowload-box"> <div class="ph-col-12"> <div class="ph-row"> <div class="ph-col-12 big"></div><div class="ph-col-6 empty"></div><div class="ph-col-6"></div><div class="ph-col-12"></div></div></div></div>');
          },
          success: function(data) {
              jQuery('.datafetch2').html( data );
          }
      });

      jQuery.ajax({
          url: ajaxurl,
          type: 'post',
          data: { action: 'data_fetch3', keyword: keyword },
      beforeSend: function(data){
        jQuery('.swiper.swiper-seabox').html('<div class="ph-item wowload-box"> <div class="ph-col-12"> <div class="ph-row"> <div class="ph-col-12 big"></div><div class="ph-col-6 empty"></div><div class="ph-col-6"></div><div class="ph-col-12"></div></div></div></div>');
          },
          success: function(data) {
              jQuery('.swiper.swiper-seabox').html( data );
          }
      });


      jQuery("input.fetchinpu").keyup(function () {
        if (jQuery(this).val().length > 2) {
          jQuery(".datafetch").show();
        } else {
          jQuery(".datafetch").hide();
        }
      });
      jQuery("input.fetchinpu").keyup(function () {
        if (jQuery(this).val().length > 2) {
          jQuery(".datafetch2").show();
        } else {
          jQuery(".datafetch2").hide();
        }
      });
      jQuery("input.fetchinpu").keyup(function () {
        if (jQuery(this).val().length > 2) {
          jQuery(".datafetch3").show();
        } else {
          jQuery(".datafetch3").hide();
        }
      });
    
    
      return false;
  
    },1500)
  }

  jQuery(document).ready(function($){   
  
    jQuery('.remove').click(function(e){
        e.preventDefault();
        var product_id = jQuery(this).data('cart-item-key');
        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,  
            data: {
                action: 'wc_remove_cart_item_dropdwon',
                product_id: product_id,
            },
            beforeSend: function(response){
              jQuery('.tot-aj-cc').html('<br><div id="loading"></div><br>');
            },
            success: function(response) {
              if ( response.result === 'success' ) {
              jQuery('.tot-aj-cc').html(response.cart_contents);
              jQuery('.price.tot-aj').html(response.cart_total);
              jQuery('.cart-aj-span').html(response.cart_count);
              }
            }, 
        });
    });

				jQuery(document).on('click', '.eyeid', function(emy) {
					var fired_button = jQuery(this).attr('value');
					jQuery.ajax({
							url: ajaxurl,
							type: 'post',
							data: { 
							  action: 'ajax_popup',
							  postid: fired_button, 
							},
							beforeSend: function(inud){
							  jQuery('#ajax_popup').html('<div class="ph-item wowload-box"> <div class="ph-col-6"> <div class="ph-row"> <div class="ph-col-6 big"></div><div class="ph-col-4 empty big"></div><div class="ph-col-2 big"></div><div class="ph-col-4"></div><div class="ph-col-8 empty"></div><div class="ph-col-6"></div><div class="ph-col-6 empty"></div><div class="ph-col-12"></div><br><br><br><br><br><div class="ph-col-6 empty big"></div><div class="ph-col-6 big"></div></div></div><div class="ph-col-6"> <div class="ph-picture"></div><div class="ph-row"> <div class="ph-col-12 big"></div><div class="ph-col-6"></div><div class="ph-col-6 empty"></div><div class="ph-col-12"></div></div></div></div>');
							},
							success: function(data) {
								jQuery('#ajax_popup').html( data );
							},

						});
						return false;
					});


        jQuery(document).on('click', '.single_add_to_cart_button', function (e) {
            e.preventDefault();
    
            var jQuerythisbutton = jQuery(this),
                    jQueryform = jQuerythisbutton.closest('form.cart'),
                    id = jQuerythisbutton.attr('value'),
                    product_qty = jQueryform.find('input[name=quantity]').val() || 1,
                    product_id = jQueryform.find('input[name=product_id]').val() || id,
                    variation_id = jQueryform.find('input[name=variation_id]').val() || 0;
    
            var data = {
                action: 'woocommerce_ajax_add_to_cart',
                product_id: product_id,
                product_sku: '',
                quantity: product_qty,
                variation_id: variation_id,
            };
    
            jQuery(document.body).trigger('adding_to_cart', [jQuerythisbutton, data]);
    
            jQuery.ajax({
                type: 'post',
                url: ajaxurl,
                data: data,
                beforeSend: function (response) {
                    jQuerythisbutton.removeClass('added').addClass('loading');
                },
                complete: function (response) {
                    jQuerythisbutton.addClass('added').removeClass('loading');
                },
                success: function (response) {
    
                    if (response.error && response.product_url) {
                        window.location = response.product_url;
                        return;
                    } else {
                        jQuery(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, jQuerythisbutton]);
    
                        jQuery(".inform").animate({
                          opacity: '1',
                        });
                        jQuery(".inform").delay(2000).animate({opacity:0},4000)
                    }
                },
            });
            return false;
        });
  });