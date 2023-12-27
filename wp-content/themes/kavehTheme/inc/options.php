<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'kaveh_frame';
  //
  // Create options
  CSF::createOptions( $prefix, array(
    'menu_title' => 'تنظیمات قالب',
    'menu_slug'  => 'kaveh-options',
   
  ) );

  //
  // Create a top-tab
  CSF::createSection( $prefix, array(
    'id'    => 'one_tab', // Set a unique slug-like ID
    'title' => 'تنظیمات عمومی',
    'fields' => array(

       array(
        'id'           => 'kaveh_logo_up',
        'type'         => 'upload',
        'title'        => 'آپلود لوگو',
        'library'      => 'image',
        'placeholder'  => 'http://',
        'button_title' => 'آپلود تصویر',
        'remove_title' => 'حذف تصویر',
        'default' => 'https://kaveh.moeinwp.com/1/wp-content/uploads/2022/10/demo1.svg',
      ),
      array(
        'id'      => 'kaveh_preload_switch',
        'type'    => 'switcher',
        'title'   => 'پیش بارگزاری صفحات',
        'text_on'    => 'فعال',
        'text_off'   => 'غیرفعال',
        'default' => false
      ),
     

     

      array(
        'id'        => 'search-pic-repeater',
        'type'      => 'repeater',
        'title'     => 'تصاویر اسلایدر باکس سرچ',
        'fields'    => array(

           array(
              'id'           => 'searc-pic',
              'type'         => 'upload',
              'title'        => 'تصویر اسلایدر',
              'library'      => 'image',
              'placeholder'  => 'http://',
              'button_title' => 'آپلود تصویر',
              'remove_title' => 'حذف تصویر',
            ),


        ),
        'default'   => array(
          array(
            'searc-pic' => 'https://kaveh.moeinwp.com/4/wp-content/uploads/2023/02/slider.png',
          ),
          array(
            'searc-pic' => 'https://kaveh.moeinwp.com/4/wp-content/uploads/2023/02/cloths3.jpg',
          ),
          array(
            'searc-pic' => 'https://kaveh.moeinwp.com/4/wp-content/uploads/2023/02/cloths2.jpg',
          ),
        )
      ),

      array(
        'id'           => 'aj-search',
        'type'         => 'upload',
        'title'        => 'تصویر کوچک اول سرچ',
        'library'      => 'image',
        'placeholder'  => 'http://',
        'button_title' => 'آپلود تصویر',
        'remove_title' => 'حذف تصویر',
        'default' => 'https://kaveh.moeinwp.com/1/wp-content/uploads/2022/08/banner-03.png',
      ),
      array(
        'id'           => 'aj-search2',
        'type'         => 'upload',
        'title'        => 'تصویر کوچک اول دوم',
        'library'      => 'image',
        'placeholder'  => 'http://',
        'button_title' => 'آپلود تصویر',
        'remove_title' => 'حذف تصویر',
        'default' => 'https://kaveh.moeinwp.com/1/wp-content/uploads/2022/08/banner-02.png',
      ),

    )

  ) );



         //
  // Create a top-tab
  CSF::createSection( $prefix, array(
    'id'    => 'four_tab', // Set a unique slug-like ID
    'title' => 'تنظیمات ظاهری',
    'fields' => array(
      array(
        'id'     => 'opt-color-5',
        'type'   => 'color',
        'title'  => 'رنگ اولیه سایت',
      ),
      array(
        'id'     => 'opt-color-5-hover',
        'type'   => 'color',
        'title'  => 'رنگ ثانویه سایت',
      ),
      array(
        'id'        => 'kaveh_typoselect',
        'type'      => 'image_select',
        'title'     => ' -در حال حاضر آزمایشی- انتخاب فونت اصلی سایت',
        'options'   => array(
          'value-1' => esc_url( get_template_directory_uri() ) . "/assets/images/preloader/irsans.svg",
          'value-2' => esc_url( get_template_directory_uri() ) . "/assets/images/preloader/iryekan.svg",
          'value-3' => esc_url( get_template_directory_uri() ) . "/assets/images/preloader/ybakh.svg",

        ),
        'default'   => 'value-3'
      ),
    )
  ) );




   
  // Create a top-tab
  CSF::createSection( $prefix, array(
    'id'    => 'mobile_tab', // Set a unique slug-like ID
    'title' => 'تنظیمات موبایل',
    'fields' => array(

     array(
        'id'      => 'kaveh_footer_mobile_on',
        'type'    => 'switcher',
        'title'   => 'فوتر اختصاصی موبایل',
        'text_on'    => 'فعال',
        'text_off'   => 'غیرفعال',
        'default' => true
      ),

      array(
        'id'        => 'kaveh_footer_mobile',
        'type'      => 'image_select',
        'title'     => 'انتخاب نوع فوتر موبایل',
        'dependency' => array(
          array( 'kaveh_footer_mobile_on', '==', 'true' ),
        ),
        'options'   => array(
          'value-1' => esc_url( get_template_directory_uri() ) . "/assets/images/fmobile1.png",
          'value-2' => esc_url( get_template_directory_uri() ) . "/assets/images/fmobile2.png",
          'value-3' => esc_url( get_template_directory_uri() ) . "/assets/images/fmobile3.png",
          'value-4' => esc_url( get_template_directory_uri() ) . "/assets/images/fmobile4.png",
        ),
        'default'   => 'value-1'
      ),

      array(
        'id'           => 'kaveh_foomobile_icon1',
        'type'         => 'text',
        'title'        => 'آیکون اول فوتر',
        'default' => 'icon-home-4',
        'dependency' => array(
          array( 'kaveh_footer_mobile_on', '==', 1 ),
        ),
      ),
      array(
        'id'           => 'kaveh_foomobile_url_icon1',
        'type'         => 'link',
        'title'        => 'لینک آیکون اول فوتر',
        'add_title'    => 'اضافه کردن لینک',
        'edit_title'   => 'ویرایش لینک',
        'remove_title' => 'حذف لینک',
        'default'  => array(
          'url'    => 'https://kaveh.moeinwp.com/1/',
        ),
        'dependency' => array(
          array( 'kaveh_footer_mobile_on', '==', 1 ),
        ),
      ),
      
      array(
        'id'           => 'kaveh_foomobile_icon2',
        'type'         => 'text',
        'title'        => 'آیکون دوم فوتر',
        'default' => 'icon-grid',
        'dependency' => array(
          array( 'kaveh_footer_mobile_on', '==', 1 ),
        ),
      ),
      array(
        'id'           => 'kaveh_foomobile_url_icon2',
        'type'         => 'link',
        'title'        => 'لینک آیکون دوم فوتر',
        'add_title'    => 'اضافه کردن لینک',
        'edit_title'   => 'ویرایش لینک',
        'remove_title' => 'حذف لینک',
        'default'  => array(
          'url'    => 'https://kaveh.moeinwp.com/1/shop/',
        ),
        'dependency' => array(
          array( 'kaveh_footer_mobile_on', '==', 1 ),
        ),
      ),
      
      array(
        'id'           => 'kaveh_foomobile_icon3',
        'type'         => 'text',
        'title'        => 'آیکون سوم فوتر',
        'default' => 'icon-cart-3',
        'dependency' => array(
          array( 'kaveh_footer_mobile_on', '==', 1 ),
        ),
      ),
      array(
        'id'           => 'kaveh_foomobile_url_icon3',
        'type'         => 'link',
        'title'        => 'لینک آیکون سوم فوتر',
        'add_title'    => 'اضافه کردن لینک',
        'edit_title'   => 'ویرایش لینک',
        'remove_title' => 'حذف لینک',
        'default'  => array(
          'url'    => 'http://codestarframework.com/',
        ),
        'dependency' => array(
          array( 'kaveh_footer_mobile_on', '==', 1 ),
        ),
      ),
      
      array(
        'id'           => 'kaveh_foomobile_icon4',
        'type'         => 'text',
        'title'        => 'آیکون چهارم فوتر',
        'default' => 'icon-folder',
        'dependency' => array(
          array( 'kaveh_footer_mobile_on', '==', 1 ),
        ),
      ),
      array(
        'id'           => 'kaveh_foomobile_url_icon4',
        'type'         => 'link',
        'title'        => 'لینک آیکون چهارم فوتر',
        'add_title'    => 'اضافه کردن لینک',
        'edit_title'   => 'ویرایش لینک',
        'remove_title' => 'حذف لینک',
        'default'  => array(
          'url'    => 'https://kaveh.moeinwp.com/1/blog/',
        ),
        'dependency' => array(
          array( 'kaveh_footer_mobile_on', '==', 1 ),
        ),
      ),
      
      array(
        'id'           => 'kaveh_foomobile_icon5',
        'type'         => 'text',
        'title'        => 'آیکون پنجم فوتر',
        'default' => 'icon-user-2',
        'dependency' => array(
          array( 'kaveh_footer_mobile_on', '==', 1 ),
        ),
      ),
      array(
        'id'           => 'kaveh_foomobile_url_icon5',
        'type'         => 'link',
        'title'        => 'لینک آیکون پنجم فوتر',
        'add_title'    => 'اضافه کردن لینک',
        'edit_title'   => 'ویرایش لینک',
        'remove_title' => 'حذف لینک',
        'default'  => array(
          'url'    => 'https://kaveh.moeinwp.com/1/my-account/',
        ),
        'dependency' => array(
          array( 'kaveh_footer_mobile_on', '==', 1 ),
        ),
      ),



      // Select with AJAX search Pages
      array(
        'id'          => 'kaveh_mobile_select',
        'type'        => 'select',
        'title'       => 'منوی موبایل کاوه',
        'placeholder' => 'یک منو را انتخاب کنید ',
        'chosen'      => false,
        'ajax'        => true,
        'options'     => 'menus',
      ),

      array(
        'id'      => 'kaveh_header_mobile_bg_type',
        'type'        => 'select',
        'title'       => 'نوع بک گراند منو موبایل',
        'options'     => array(
          'option-1'  => 'بک گراند تصویر',
          'option-2'  => 'رنگ بک گراند',
        ),
        'default'     => 'option-1'
      ),

      array(
        'id'      => 'kaveh_boxmenudown_mobile_on',
        'type'    => 'switcher',
        'title'   => 'باکس پایین منوی موبایل',
        'text_on'    => 'فعال',
        'text_off'   => 'غیرفعال',
        'default' => true
      ),
      array(
        'id'           => 'kaveh_boxmenudown_text',
        'type'         => 'text',
        'title'        => 'متن دکمه تخفیف',
        'default' => 'تخفیف ها',
        'dependency' => array(
          array( 'kaveh_boxmenudown_mobile_on', '==', 1 ),
        ),
      ),
      array(
        'id'           => 'kaveh_boxmenudown_iconclass',
        'type'         => 'text',
        'title'        => 'آیکون دکمه تخفیف',
        'default' => 'icon-offer-2',
        'dependency' => array(
          array( 'kaveh_boxmenudown_mobile_on', '==', 1 ),
        ),
      ),
      array(
        'id'           => 'kaveh_boxmenudown_url',
        'type'         => 'link',
        'title'        => 'لینک دکمه تخفیف',
        'add_title'    => 'اضافه کردن لینک',
        'edit_title'   => 'ویرایش لینک',
        'remove_title' => 'حذف لینک',
        'dependency' => array(
          array( 'kaveh_boxmenudown_mobile_on', '==', 1 ),
        ),
      ),
      array(
        'id'           => 'kaveh_boxmenudown_icon1',
        'type'         => 'text',
        'title'        => 'آیکون اول کنار دکمه تخفیف',
        'default' => 'icon-document',
        'dependency' => array(
          array( 'kaveh_boxmenudown_mobile_on', '==', 1 ),
        ),
      ),
      array(
        'id'           => 'kaveh_boxmenudown_url_icon1',
        'type'         => 'link',
        'title'        => 'لینک آیکون اول',
        'add_title'    => 'اضافه کردن لینک',
        'edit_title'   => 'ویرایش لینک',
        'remove_title' => 'حذف لینک',
        'dependency' => array(
          array( 'kaveh_boxmenudown_mobile_on', '==', 1 ),
        ),
      ),
      array(
        'id'           => 'kaveh_boxmenudown_icon2',
        'type'         => 'text',
        'title'        => 'آیکون دوم کنار دکمه تخفیف',
        'default' => 'icon-phone-4',
        'dependency' => array(
          array( 'kaveh_boxmenudown_mobile_on', '==', 1 ),
        ),
      ),
      array(
        'id'           => 'kaveh_boxmenudown_url_icon2',
        'type'         => 'link',
        'title'        => 'لینک آیکون دوم',
        'add_title'    => 'اضافه کردن لینک',
        'edit_title'   => 'ویرایش لینک',
        'remove_title' => 'حذف لینک',
        'dependency' => array(
          array( 'kaveh_boxmenudown_mobile_on', '==', 1 ),
        ),
      ),
      
      array(
        'id'           => 'kaveh_mobile_header_bg_image',
        'type'         => 'upload',
        'title'        => 'تصویر بگ گراند منو',
        'library'      => 'image',
        'placeholder'  => 'http://',
        'button_title' => 'آپلود تصویر',
        'remove_title' => 'حذف تصویر',
        'default' => 'https://kaveh.moeinwp.com/1/wp-content/themes/kaveh%20Theme/assets/images/bg-nav-responsive.png',
        'dependency' => array(
          array( 'kaveh_header_mobile_bg_type', '==', 'option-1' ),
        ),
      ),

      array(
        'id'      => 'kaveh_icons_mobile_on',
        'type'    => 'switcher',
        'title'   => 'شبکه های اجتماعی منوی موبایل',
        'text_on'    => 'فعال',
        'text_off'   => 'غیرفعال',
        'default' => true
      ),

      array(
        'id'        => 'kaveh_mobile_menu-repeater',
        'type'      => 'repeater',
        'title'     => 'آیکون شبک های اجتماعی',
        'dependency' => array(
          array( 'kaveh_icons_mobile_on', '==', true ),
        ),
        'fields'    => array(

           array(
              'id'           => 'kaveh_mobile_menu_icon',
              'type'         => 'text',
              'title'        => 'کلاس آیکون',
            ),
           array(
              'id'           => 'kaveh_mobile_menu_text',
              'type'         => 'link',
              'title'        => 'لینک',
              'add_title'    => 'اضافه کردن لینک',
              'edit_title'   => 'ویرایش لینک',
              'remove_title' => 'حذف لینک',
            ),

        ),
        'default'   => array(
          array(
            'kaveh_mobile_menu_icon' => 'icon-whatsapp',
            'kaveh_mobile_menu_text' => '#',
          ),
          array(
            'kaveh_mobile_menu_icon' => 'icon-linkedin',
            'kaveh_mobile_menu_text' => '#',
          ),
          array(
            'kaveh_mobile_menu_icon' => 'icon-twitter',
            'kaveh_mobile_menu_text' => '#',
          ),
          array(
            'kaveh_mobile_menu_icon' => 'icon-instagram',
            'kaveh_mobile_menu_text' => '#',
          ),
        
        )
      )

     
    )
  ) );


  // Create a top-tab
  CSF::createSection( $prefix, array(
    'id'    => 'two_tab', // Set a unique slug-like ID
    'title' => 'تنظیمات وبلاگ',
    'fields' => array(
     
      array(
        'id'        => 'kaveh_bl_cart_select',
        'type'      => 'image_select',
        'title'     => 'انتخاب نوع کارت بلاگ',
        'description'  => 'این آپشن نوع استایل کارت های صفحه وبلاگ و صفحه دسته بندی های نوشته ها را تغییر خواهد داد و مابقی مکان هایی که دارای کارت وبلاگ است از المنتور قابل شخصی سازی هست',
        'options'   => array(
          'value-1' => esc_url( get_template_directory_uri() ) . "/assets/images/blog-cart/bl-single-1.png",
          'value-2' => esc_url( get_template_directory_uri() ) . "/assets/images/blog-cart/bl-single-2.png",
          'value-3' => esc_url( get_template_directory_uri() ) . "/assets/images/blog-cart/bl-single-3.png",
          'value-4' => esc_url( get_template_directory_uri() ) . "/assets/images/blog-cart/bl-single-4.png",
          'value-5' => esc_url( get_template_directory_uri() ) . "/assets/images/blog-cart/bl-single-5.png",
          'value-6' => esc_url( get_template_directory_uri() ) . "/assets/images/blog-cart/bl-single-6.png",
          'value-7' => esc_url( get_template_directory_uri() ) . "/assets/images/blog-cart/bl-single-7.png",
          'value-8' => esc_url( get_template_directory_uri() ) . "/assets/images/blog-cart/bl-single-8.png",
          'value-9' => esc_url( get_template_directory_uri() ) . "/assets/images/blog-cart/bl-single-9.png",  
        ),
        'default'   => 'value-1'
      ),
      array(
        'id'        => 'blog-pic-repeater',
        'type'      => 'repeater',
        'title'     => 'تصاویر اسلایدر وبلاگ',
        'fields'    => array(

           array(
              'id'           => 'blog-pic',
              'type'         => 'upload',
              'title'        => 'تصویر اسلایدر',
              'library'      => 'image',
              'placeholder'  => 'http://',
              'button_title' => 'آپلود تصویر',
              'remove_title' => 'حذف تصویر',
            ),


        ),
        'default'   => array(
          array(
            'blog-pic' => 'https://kaveh.moeinwp.com/4/wp-content/uploads/2023/02/slider.png',
          ),
          array(
            'blog-pic' => 'https://kaveh.moeinwp.com/4/wp-content/uploads/2023/02/cloths3.jpg',
          ),
          array(
            'blog-pic' => 'https://kaveh.moeinwp.com/4/wp-content/uploads/2023/02/cloths2.jpg',
          ),
        )
      ),
     
    )

  ) );

    //
  // Create a top-tab
  CSF::createSection( $prefix, array(
    'id'    => 'three_tab', // Set a unique slug-like ID
    'title' => 'تنظیمات فروشگاه',
    'fields' => array(
      array(
        'id'         => 'prtamas',
        'type'       => 'switcher',
        'title'      => 'تماس بگیرید به جای دکمه افزودن به سبد خرید',
        'default'    => false
      ),
      array(
        'id'      => 'tamas_sho',
        'type'    => 'text',
        'title'   => 'متن تماس بگیرید',
        'default' => '09305238720 : تماس',
        'dependency' => array( 'prtamas', '==', '1' ),
      ),
      array(
        'id'        => 'kaveh_sh_cart_select',
        'type'      => 'image_select',
        'title'     => 'انتخاب نوع کارت فروشگاه',
        'options'   => array(
          'value-1' => esc_url( get_template_directory_uri() ) . "/assets/images/cart-shop/c-shop-10.jpg",
          'value-2' => esc_url( get_template_directory_uri() ) . "/assets/images/cart-shop/c-shop-9.jpg",
          'value-3' => esc_url( get_template_directory_uri() ) . "/assets/images/cart-shop/c-shop-6.jpg",
          'value-4' => esc_url( get_template_directory_uri() ) . "/assets/images/cart-shop/c-shop-5.jpg",
          'value-5' => esc_url( get_template_directory_uri() ) . "/assets/images/cart-shop/c-shop-3.jpg",
          'value-6' => esc_url( get_template_directory_uri() ) . "/assets/images/cart-shop/c-shop-2.jpg",
          'value-7' => esc_url( get_template_directory_uri() ) . "/assets/images/cart-shop/c-shop-8.jpg",
          'value-8' => esc_url( get_template_directory_uri() ) . "/assets/images/cart-shop/c-shop-4.jpg",
          'value-9' => esc_url( get_template_directory_uri() ) . "/assets/images/cart-shop/c-shop-1.jpg",
          'value-10' => esc_url( get_template_directory_uri() ) . "/assets/images/cart-shop/c-shop-7.jpg",
          'value-11' => esc_url( get_template_directory_uri() ) . "/assets/images/cart-shop/c-shop-11.jpg",
          'value-12' => esc_url( get_template_directory_uri() ) . "/assets/images/cart-shop/c-shop-12.jpg",
          'value-13' => esc_url( get_template_directory_uri() ) . "/assets/images/cart-shop/c-shop-13.jpg",
          'value-14' => esc_url( get_template_directory_uri() ) . "/assets/images/cart-shop/c-shop-14.jpg",
          'value-15' => esc_url( get_template_directory_uri() ) . "/assets/images/cart-shop/c-shop-15.jpg",
          'value-16' => esc_url( get_template_directory_uri() ) . "/assets/images/cart-shop/c-shop-16.jpg",
        ),
        'default'   => 'value-1'
      ),
      array(
        'id'        => 'kaveh_pr_single_select',
        'type'      => 'image_select',
        'title'     => 'انتخاب نوع صفحه محصول تکی',
        'options'   => array(
          'value-1' => esc_url( get_template_directory_uri() ) . "/assets/images/single-pr/1-pr-single.svg",
          'value-2' => esc_url( get_template_directory_uri() ) . "/assets/images/single-pr/2-pr-single.svg",
          'value-3' => esc_url( get_template_directory_uri() ) . "/assets/images/single-pr/3-pr-single.svg",

        ),
        'default'   => 'value-2'
      ),
      array(
        'id'        => 'pro-pic-repeater',
        'type'      => 'repeater',
        'title'     => 'آیکون باکس های محصول',
        'fields'    => array(

           array(
              'id'           => 'pro-pic-icon',
              'type'         => 'text',
              'title'        => 'کلاس آیکون',
            ),
           array(
              'id'           => 'pro-pic-text',
              'type'         => 'text',
              'title'        => 'متن باکس',
            ),


        ),
        'default'   => array(
          array(
            'pro-pic-icon' => 'icon-box',
            'pro-pic-text' => ' تحویل اکسپرس ',
          ),
          array(
            'pro-pic-icon' => 'icon-money',
            'pro-pic-text' => ' پرداخت در محل ',
          ),
          array(
            'pro-pic-icon' => 'icon-seven-plus',
            'pro-pic-text' => ' هفت روز ضمانت بازگشت ',
          ),
          array(
            'pro-pic-icon' => 'icon-security',
            'pro-pic-text' => '  ضمانت کالا  ',
          ),
          array(
            'pro-pic-icon' => 'icon-suport',
            'pro-pic-text' => ' پشتیبانی آنلاین ',
          ),
        
        )
      )

     
    )
  ) );


  // Create a top-tab
  CSF::createSection( $prefix, array(
    'id'    => 'six_tab', // Set a unique slug-like ID
    'title' => 'تنظیمات پنل کاربری',
    'fields' => array(
     
      array(
        'id'        => 'kaveh_panel_select',
        'type'      => 'image_select',
        'title'     => 'انتخاب استایل پنل کاربری',
        'options'   => array(
          'value-1' => esc_url( get_template_directory_uri() ) . "/assets/images/single-pr/panel.png",
          'value-2' => esc_url( get_template_directory_uri() ) . "/assets/images/single-pr/panel2.png",

        ),
        'default'   => 'value-1'
      ),
      array(
            'id'           => 'kaveh_logo_panel',
            'type'         => 'upload',
            'title'        => 'آپلود لوگو پنل کاربری',
            'library'      => 'image',
            'placeholder'  => 'http://',
            'button_title' => 'آپلود تصویر',
            'remove_title' => 'حذف تصویر',
            'default' => 'https://s2.uupload.ir/files/kavele_3a0u.png',
      ),
      array(  
            'id'           => 'kaveh_copy_panel',
            'type'         => 'text',
            'title'        => 'متن کپی رایت پنل کاربری',
            'default' => 'کپی رایت قالب کاوه 1402',
      ),
      array(  
            'id'           => 'kaveh_call_panel',
            'type'         => 'text',
            'title'        => 'شماره تماس پنل کاربری',
            'default' => '09122222222',
      ),

     
    )
  ));

  // Create a top-tab
  CSF::createSection( $prefix, array(
    'id'    => 'vor_tab', // Set a unique slug-like ID
    'title' => 'تنظیمات ورود و ثبت نام',
    'fields' => array(
       // A Notice
       array(
        'type'    => 'notice',
        'style'   => 'info',
        'content' => ' نکته: پنل های پیامکی فراز اس ام اس، مکس اس ام اس و مدیانا از ippanel استفاده می کنند
        . اکثر پنل های پیامکی نماینده آی پی پنل هستند و در کاوه پشتیبانی میشود',
      ),
      array(
        'id'      => 'kaveh_sms_gateway',
        'type'        => 'select',
        'title'       => 'انتخاب پنل پیامک',
        'options'     => array(
          'option-1'  => 'ippanel',
          'option-2'  => 'sms.ir',
          'option-3'  => 'melipayamak',
          'option-4'  => 'kavenegar',
        ),
        'default'     => 'option-1'
      ),
     
      array(  
            'id'           => 'kaveh_username_sms',
            'type'         => 'text',
            'title'        => 'نام کاربری	',
            'dependency' => array( 'kaveh_sms_gateway', 'any', 'option-1,option-3' ),
      ),
      array(  
            'id'           => 'kaveh_password_sms',
            'type'         => 'text',
            'title'        => 'رمز عبور	',
            'dependency' => array( 'kaveh_sms_gateway', 'any', 'option-1,option-3' ),
      ),
      
      array(  
        'id'           => 'kaveh_password_api',
        'type'         => 'text',
        'title'        => 'کلید وب سرویس (API key)',
       
        'dependency' => array( 'kaveh_sms_gateway', 'any', 'option-2,option-4' ),
      ),
      array(  
            'id'           => 'kaveh_number_sms',
            'type'         => 'text',
            'title'        => ' شماره فرستنده ',
            'dependency' => array( 'kaveh_sms_gateway', '==', 'option-1' ),
      ),
      array(  
            'id'           => 'kaveh_pattern_sms',
            'type'         => 'text',
            'title'        => 'پترن قالب',
      ),
      // A Notice
      array(
        'type'    => 'notice',
        'style'   => 'info',
        'content' => 'حتما یک پترن به صورت زیر در پنل پیامک خود ایجاد کنید و کد آن را در پترن قالب قرار دهید. لازم به ذکر است تا زمان تایید پترن امکان ارسال وجود ندارد',
      ),
      array(
        'type'    => 'notice',
        'style'   => 'warning',
        'content' =>  'کد تأیید شما %verification-code%
نام سایت شما
Yoursite.com',
'dependency' => array( 'kaveh_sms_gateway', '==', 'option-1' ),

      ),
      array(
        'type'    => 'notice',
        'style'   => 'warning',
        'content' =>  'کد تأیید شما [code] 

        نام سایت شما
        Yoursite.com',
'dependency' => array( 'kaveh_sms_gateway', '==', 'option-2' ),

      ),
      array(
        'type'    => 'notice',
        'style'   => 'warning',
        'content' =>  'کد تأیید شما {0} 

        نام سایت شما
        Yoursite.com',
'dependency' => array( 'kaveh_sms_gateway', '==', 'option-3' ),

      ),
      

    )
  ));

}