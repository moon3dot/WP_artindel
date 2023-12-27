jQuery(document).ready(function($) {
jQuery(document).on('click', '.vma', function(e){
        e.preventDefault();
        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,  
            data: {
              action: 'tab_email',
            },
            beforeSend: function(data){
              jQuery('.myloginpop').html('<br><div id="loading"></div><br>');
            },
            success: function(data) {
                jQuery('.myloginpop').html(data);
            }
          });
      });
      
      
jQuery(document).on('click', '.vpa', function(e){
        e.preventDefault();
        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,  
            data: {
              action: 'tab_pa',
            },
            beforeSend: function(data){
              jQuery('.myloginpop').html('<br><div id="loading"></div><br>');
            },
            success: function(data) {
                jQuery('.myloginpop').html(data);
            }
          });
      });
  
  jQuery(document).on('click', 'button.faramosh', function(e){
        e.preventDefault();
        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,  
            data: {
              action: 'tab_fa',
            },
            beforeSend: function(data){
              jQuery('.myloginpop').html('<br><div id="loading"></div><br>');
            },
            success: function(data) {
                jQuery('.myloginpop').html(data);
            }
          });
      });
      
jQuery(document).on('click', 'button.barr', function(e){
        e.preventDefault();
          var input = jQuery('#fa_field').val();
          if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(input)) {
            // input is a valid email
            jQuery.ajax({
              type: 'POST',
              url: ajaxurl,  
              data: {
                action: 'tab_fa_validmail',
                email: input,
              },
              beforeSend: function(data){
                jQuery('.logfapre button.barr').html('<div id="loading"></div>');
              },
              success: function(data) {
                  jQuery('.myloginpop').html(data);
              }
            });
          } else if (/^0[0-9]{10}$/.test(input)) {
            // input is a valid phone number
            jQuery.ajax({
              type: 'POST',
              url: ajaxurl,  
              data: {
                action: 'tab_fa_validsms',
                phone: input,
              },
              beforeSend: function(data){
                jQuery('.logfapre button.barr').html('<div id="loading"></div>');
                
              },
              success: function(data) {
                  jQuery('.myloginpop').html(data);
              }
            });
          } else {
            // input is invalid
            jQuery.ajax({
              type: 'POST',
              url: ajaxurl,  
              data: {
                action: 'tab_fa_invalid',
              },
              beforeSend: function(data){
                jQuery('.logfapre button.barr').html('<div id="loading"></div>');
              },
              success: function(data) {
                  jQuery('.myloginpop').html(data);
              }
            });
          }
      });
  
 
		jQuery(document).on('click', '.returnback', function(e){
          e.preventDefault();
        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,  
            data: {
              action: 'login_j_ajax_ver_back',
            },
            beforeSend: function(data){
              jQuery('.myloginpop').html('<br><div id="loading"></div><br>');
            },
            success: function(data) {
                jQuery('.myloginpop').html(data);
            }
          });
        })

   
		  jQuery(document).on('submit', 'form.tabemail', function(e){
          e.preventDefault();
          var emailInput = jQuery('form.tabemail').find('#email');
          var passInput = jQuery('form.tabemail').find('#password');
        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,  
            data: {
              action: 'login_email_ajax',
              email: emailInput.val(),
              pass: passInput.val(),
            },
            beforeSend: function(response){
              jQuery('.myloginpop').html('<br><div id="loading"></div><br>');
            },
            success: function(response) {
              if ( response.result === 'success' ) {
                jQuery('.myloginpop').html(response.res);
              }
            }
          });
        })

		  jQuery(document).on('submit', 'form.logbuttonpre', function(e){
        e.preventDefault();
        var phoneInput = jQuery('input.form-control.mt-3[name="phone"]');
        var persianNumberPattern = /[\u06F0-\u06F9]/g; // matches all Persian digits
        var englishNumberMapping = {
          '۰': '0',
          '۱': '1',
          '۲': '2',
          '۳': '3',
          '۴': '4',
          '۵': '5',
          '۶': '6',
          '۷': '7',
          '۸': '8',
          '۹': '9'
        };
        var englishPhone = phoneInput.val().replace(persianNumberPattern, function(match) {
          return englishNumberMapping[match];
        });
        
      jQuery.ajax({
          type: 'POST',
          url: ajaxurl,  
          data: {
            action: 'login_j_ajax_ver',
            phone: englishPhone,
          },
          beforeSend: function(data){
            jQuery('form.logbuttonpre .vercode').html('<div id="loading"></div>');
          },
          success: function(data) {
              jQuery('.myloginpop').html(data);
          }
        });
      })

 
		   jQuery(document).on('submit', 'form.logbutton', function(e){
          e.preventDefault();
          var boxv1 = document.getElementById('boxv1').value;
          var boxv2 = document.getElementById('boxv2').value;
          var boxv3 = document.getElementById('boxv3').value;
          var boxv4 = document.getElementById('boxv4').value;
          var boxesinputpre = boxv1 + boxv2 + boxv3 + boxv4;
          var persianNumberPatternn = /[\u06F0-\u06F9]/g; // matches all Persian digits
          var englishNumberMappingg = {
            '۰': '0',
            '۱': '1',
            '۲': '2',
            '۳': '3',
            '۴': '4',
            '۵': '5',
            '۶': '6',
            '۷': '7',
            '۸': '8',
            '۹': '9'
          };
          var boxesinput = boxesinputpre.replace(persianNumberPatternn, function(match) {
            return englishNumberMappingg[match];
          });
          jQuery.ajax({
            type: 'POST',
            url: ajaxurl,  
            data: {
              action: 'login_j_ajax',
              phones: jQuery('.pnumber').text(),
              uservcode : boxesinput,
            },
            beforeSend: function(data){
              jQuery('form.logbutton .vercode').html('<div id="loading"></div>');
            },
            success: function(data) {
                jQuery('.myloginpop').html(data);
            }
          });
        });
   
     
		    jQuery(document).on('submit', 'form.farbutton', function(e){
          e.preventDefault();
          var boxv1 = document.getElementById('boxv1').value;
          var boxv2 = document.getElementById('boxv2').value;
          var boxv3 = document.getElementById('boxv3').value;
          var boxv4 = document.getElementById('boxv4').value;
          var boxesinputpre = boxv1 + boxv2 + boxv3 + boxv4;
          var persianNumberPatternn = /[\u06F0-\u06F9]/g; // matches all Persian digits
          var englishNumberMappingg = {
            '۰': '0',
            '۱': '1',
            '۲': '2',
            '۳': '3',
            '۴': '4',
            '۵': '5',
            '۶': '6',
            '۷': '7',
            '۸': '8',
            '۹': '9'
          };
          var boxesinput = boxesinputpre.replace(persianNumberPatternn, function(match) {
            return englishNumberMappingg[match];
          });
          jQuery.ajax({
            type: 'POST',
            url: ajaxurl,  
            data: {
              action: 'login_j_fa',
              phones: jQuery('.pnumber').text(),
              uservcode : boxesinput,
            },
            beforeSend: function(data){
              jQuery('form.farbutton .vercode').html('<div id="loading"></div>');
            },
            success: function(data) {
                jQuery('.myloginpop').html(data);
            }
          });
        });
    

     
		 jQuery(document).on('submit', 'form.lognewpass', function(e){
          e.preventDefault();
          jQuery.ajax({
            type: 'POST',
            url: ajaxurl,  
            data: {
              action: 'passchange_aj',
              fpass : jQuery('#pas').val(),
              spass : jQuery('#pasv').val(),
              phone : jQuery('#ph').val(),
            },
            beforeSend: function(data){
              jQuery('form.lognewpass button').html('<div id="loading"></div>');
            },
            success: function(data) {
                jQuery('.myloginpop').html(data);
            }
          });
        });
    
})

