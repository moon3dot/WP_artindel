<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	<meta name="enamad" content="232271" />
  <?php wp_head(); $options = get_option( 'kaveh_frame' ); ?>
</head>
<body <?php body_class(); ?>>
<div class="app <?php if($options['kaveh_typoselect']==='value-1'): ?>irsans<?php elseif($options['kaveh_typoselect']==='value-2'): ?>iryekan<?php else: ?>ybakh<?php endif; ?>">
<?php if($options['kaveh_preload_switch']==1) : ?>
  <div id="loftloader-wrapper" class="end-split-h loftloader-imgloading loftloader-forever imgloading-horizontal">
    <div class="loader-bg"></div>
    <div class="loader-inner">
      <div id="loader">
        <div class="imgloading-container"><span
            style="background-image: url(<?php echo $options['kaveh_logo_up'] ?>)"
           class="skip-lazy"></span></div><img 
          class="skip-lazy" alt="loader image" src="<?php echo $options['kaveh_logo_up'] ?>">
      </div>
    </div>
  </div>
<?php endif; ?>

  <?php
  $page = get_page_by_path('klogin');
  $page_id = $page->ID;
  $account_page_id = get_option('woocommerce_myaccount_page_id');
  if( !is_page( $account_page_id ) and !is_page( $page_id ) ): ?>

  <?php if (  function_exists( 'boostify_header_active' ) && boostify_header_active() ): ?>
  <?php boostify_get_header_template(); //Custom header ?>
  <?php if ( wp_is_mobile() ) : ?>
    <div class="nav-responsive position-fixed top-0 end-0 w-100 h-100">
      <div class="nav-responsive-backdrop position-fixed top-0 end-0 w-100 h-100"></div>
      <div class="nav-responsive-content position-absolute top-0 right-0 w-100 h-100">
        <div class="nav-responsive-content-wrapper bg-white">
          <button type="button"
            class="nav-responsive-close rounded-circle d-flex align-items-center justify-content-center text-white">
            <i class="icon-close"></i>
          </button>
          <ul class="nav-responsive-content-menu">
          <?php
            function has_sub_menu( array $menu_items, int $id ){
              foreach ( $menu_items as $menu_item ){
                  if ( (int)$menu_item->menu_item_parent === $id ) {
                      return true;
                  }
              }
              return false;
            }
            // wordpress does not group child menu items with parent menu items
            $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
            if(!empty($options['kaveh_mobile_select'])):
            $menuop = $options['kaveh_mobile_select'];
            $navbar_items= wp_get_nav_menu_items($menuop);
            else:
            $navbar_items= wp_get_nav_menu_items('primary');
            endif;
         
            foreach ($navbar_items as $navbar_item) {
              $nav_meta = get_post_meta($navbar_item->ID);
              $icon_class = $nav_meta['_menu_item_desc'];
             if($navbar_item->menu_item_parent==0):
             ?>    
               <li <?php if(has_sub_menu($navbar_items,$navbar_item->ID)): ?> class="has-child"<?php endif; ?>>
                  <a href="<?php echo $navbar_item->url; ?>" class="d-block rounded-pill">
                    <i class="<?php echo $icon_class[0]; ?>"></i>
                    <?php echo $navbar_item->title; ?>
                    <?php if(has_sub_menu($navbar_items,$navbar_item->ID)): ?>
                      <i class="icon-angle-left position-absolute top-50 translate-middle-y m-0"></i>
                    <?php endif; ?>
                  </a>
              <?php if(has_sub_menu($navbar_items,$navbar_item->ID)): ?>
              <div class="children position-fixed top-0 start-0 w-100 h-100 bg-white">
                <div class="heading px-3 py-4 d-flex align-items-center justify-content-between">
                <?php echo $navbar_item->title; ?>
                  <button type="button"
                    class="nav-responsive-back rounded-circle d-flex align-items-center justify-content-center text-white mb-0">
                    <i class="icon-arrow-left-2"></i>
                  </button>
                </div>
                <ul>
                  <?php
                  foreach ( $navbar_items as $menu_item ){
                    if ( (int)$menu_item->menu_item_parent === $navbar_item->ID ) {
                        ?>
                        <li <?php if(has_sub_menu($navbar_items,$menu_item->ID)): ?>class="has-child"<?php endif; ?>>
                          <a href="<?php echo $menu_item->url; ?>" class="d-block rounded-pill"> <?php echo $menu_item->title; ?> 
                          <?php if(has_sub_menu($navbar_items,$menu_item->ID)): ?>
                          <i class="icon-angle-left position-absolute top-50 translate-middle-y m-0"></i>
                          <?php endif; ?>
                           </a>
                          <?php if(has_sub_menu($navbar_items,$menu_item->ID)): ?>
                            <div class="children position-fixed top-0 start-0 w-100 h-100 bg-white">
                            <div class="heading px-3 py-4 d-flex align-items-center justify-content-between">
                            <?php echo $menu_item->title; ?> 
                              <button type="button"
                                class="nav-responsive-back rounded-circle d-flex align-items-center justify-content-center text-white mb-0">
                                <i class="icon-arrow-left-2"></i>
                              </button>
                            </div>
                            <ul>
                              <?php foreach ( $navbar_items as $submenu_item ): ?>
                              <?php if ( (int)$submenu_item->menu_item_parent === $menu_item->ID ): ?>
                              <li <?php if(has_sub_menu($navbar_items,$submenu_item->ID)): ?>class="has-child"<?php endif; ?>>
                                <a href="<?php echo $submenu_item->url; ?>" class="d-block rounded-pill"> <?php echo $submenu_item->title; ?> 
                                <?php if(has_sub_menu($navbar_items,$submenu_item->ID)): ?>
                                <i class="icon-angle-left position-absolute top-50 translate-middle-y m-0"></i>
                                <?php endif; ?>
                                </a>
                                <?php if(has_sub_menu($navbar_items,$submenu_item->ID)): ?>
                                <div class="children position-fixed top-0 start-0 w-100 h-100 bg-white">
                                  <div class="heading px-3 py-4 d-flex align-items-center justify-content-between">
                                  <?php echo $submenu_item->title; ?> 
                                    <button type="button"
                                      class="nav-responsive-back rounded-circle d-flex align-items-center justify-content-center text-white mb-0">
                                      <i class="icon-arrow-left-2"></i>
                                    </button>
                                  </div>
                                  <ul>
                                  <?php foreach ( $navbar_items as $subsubmenu_item ): ?>
                                    <?php if ( (int)$subsubmenu_item->menu_item_parent === $submenu_item->ID ): ?>
                                    <li <?php if(has_sub_menu($navbar_items,$subsubmenu_item->ID)): ?>class="has-child"<?php endif; ?>>
                                      <a href="<?php echo $subsubmenu_item->url; ?>" class="d-block rounded-pill"> <?php echo $subsubmenu_item->title; ?> 
                                      <?php if(has_sub_menu($navbar_items,$subsubmenu_item->ID)): ?>
                                        <div class="children position-fixed top-0 start-0 w-100 h-100 bg-white">
                                          <div class="heading px-3 py-4 d-flex align-items-center justify-content-between">
                                          <?php echo $subsubmenu_item->title; ?> 
                                            <button type="button"
                                              class="nav-responsive-back rounded-circle d-flex align-items-center justify-content-center text-white mb-0">
                                              <i class="icon-arrow-left-2"></i>
                                            </button>
                                          </div>
                                          <ul>
                                          <?php foreach ( $navbar_items as $subsubsubmenu_item ): ?>
                                            <?php if ( (int)$subsubsubmenu_item->menu_item_parent === $subsubmenu_item->ID ): ?>
                                            <li class="has-child">
                                              <a href="#" class="d-block rounded-pill"> ایتم 1 </a>
                                              <div class="children position-fixed top-0 start-0 w-100 h-100 bg-white">
                                                <div class="heading px-3 py-4 d-flex align-items-center justify-content-between">
                                                  دسته بندی محصولات
                                                  <button type="button"
                                                    class="nav-responsive-back rounded-circle d-flex align-items-center justify-content-center text-white mb-0">
                                                    <i class="icon-arrow-left-2"></i>
                                                  </button>
                                                </div>
                                                <ul>
                                                  <li class="has-child">
                                                    <a href="#" class="d-block rounded-pill"> ایتم 1 </a>
                                                    
                                                  </li>
                                                  <li class="has-child">
                                                    <a href="#" class="d-block rounded-pill"> ایتم 2 </a>
                                                  
                                                  </li>
                                                  <li>
                                                    <a href="#" class="d-block rounded-pill"> ایتم 3 </a>
                                                  </li>
                                                </ul>
                                              </div>
                                            </li>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                          </ul>
                                        </div>
                                      <?php endif; ?>
                                      </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                  </ul>
                                </div>
                                <?php endif; ?>
                              </li>

                              <?php endif; ?>
                          <?php endforeach; ?>
                             
                            </ul>
                          </div>
                          <?php endif; ?>
                        </li>
                        <?php
                    }
                  }
                  ?>
                </ul>
              </div>
              <?php endif; ?>
               </li>  
               <?php endif; ?>            
              <?php  
            }
            ?>
          </ul>
        </div>
        <div class="discounts-contact d-flex align-items-center justify-content-between position-relative">
          <?php
          if(!empty($options['kaveh_boxmenudown_mobile_on'])):
          if($options['kaveh_boxmenudown_mobile_on'] === '1' ):
          ?>
          <a href="<?php echo $options['kaveh_boxmenudown_url']['url']; ?>" class="discount rounded-pill">
            <i class="<?php echo $options['kaveh_boxmenudown_iconclass']; ?>"></i>
            <?php echo $options['kaveh_boxmenudown_text']; ?>
          </a>
          <ul class="d-flex align-items-center">
            <li>
              <a href="<?php echo $options['kaveh_boxmenudown_url_icon1']['url']; ?>">
                <i class="<?php echo $options['kaveh_boxmenudown_icon1']; ?>"></i>
              </a>
            </li>
            <li>
              <a href="<?php echo $options['kaveh_boxmenudown_url_icon2']['url']; ?>">
                <i class="<?php echo $options['kaveh_boxmenudown_icon2']; ?>"></i>
              </a>
            </li>
          </ul>
          <?php
          endif;
           endif;
          ?>
        </div>
        <?php if($options['kaveh_icons_mobile_on']==true): ?>
        <div class="socials d-flex align-items-center justify-content-between position-relative">
          <ul class="d-flex align-items-center">
            <?php
            if(!empty($options['kaveh_mobile_menu-repeater'])):
            $iconh = $options['kaveh_mobile_menu-repeater'];
            for ($i = 0; $i < count($iconh); $i++) {
            ?>
            <li>
              <a href="<?php echo $iconh[$i]['kaveh_mobile_menu_text']; ?>" class="d-flex align-items-center justify-content-center rounded-pill">
                <i class="<?php echo $iconh[$i]['kaveh_mobile_menu_icon']; ?>"></i>
              </a>
            </li>
            <?php
            }
            endif;
            ?>
         
          </ul>
          <span class="text-white"> شبکه های اجتماعی </span>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <?php endif; ?>
  <?php else: ?>

    <header class="top-header">
      <div class="container d-flex align-items-center">
        <!-- Start Logo -->
        <a href="#" class="top-header-logo">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets//images/logo.svg" alt="shop" title="shop" />
        </a>
        <!-- End Logo -->
        <!-- Start Search -->
        <form method="get" action="#" class="top-header-search position-relative d-none d-lg-block">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="جستجوی محصول" />
            <button type="submit" class="btn btn-primary">
              <i class="icon-search"></i>
            </button>
          </div>
        </form>
        <!-- End Search -->
      
        <!-- Start Auth -->
        <div class="top-header-auth">
          <a href="#" class="btn p-0">
            <i class="icon-user-circle"></i>
            <span> ثبت نام / ورود </span>
            <i class="icon-angle-left"></i>
          </a>
          <ul class="top-header-auth-dropdown">
            <li>
              <i class="icon-user"></i>
              احمد یوسف وند
            </li>
            <li>
              <a href="#"> سفارش ها </a>
            </li>
            <li>
              <a href="#"> لیست ها </a>
            </li>
            <li>
              <a href="#"> دیدگاه ها </a>
            </li>
            <li>
              <a href="#"> خروج از حساب کاربری </a>
            </li>
          </ul>
        </div>
        <!-- End Auth -->
      </div>
    </header>
 
    <nav class="nav-header">
      <div class="container d-flex align-items-center justify-content-lg-between position-relative">
        <button type="button" class="btn-nav-header me-2 fs-3 d-lg-none">
          <i class="icon-menu"></i>
        </button>
        <!-- Start Search -->
        <form method="get" action="#" class="top-header-search position-relative d-lg-none ms-auto">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="جستجوی محصول" />
            <button type="submit" class="btn btn-primary">
              <i class="icon-search"></i>
            </button>
          </div>
        </form>
        <!-- End Search -->
        
        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'container' => 'ul',
          'menu_class' => 'nav-header-menu d-none d-lg-flex align-items-center',
          'depth' => 1,
      ));
        ?>
        <div class="nav-header-cart">
          <a href="#" class="btn btn-success position-relative d-flex align-items-center justify-content-center">
            <i class="icon-cart"></i>
            <span> 4 </span>
          </a>
       

        </div>
      </div>
    </nav>

    <?php if ( wp_is_mobile() ) : ?>
    <div class="nav-responsive position-fixed top-0 end-0 w-100 h-100">
      <div class="nav-responsive-backdrop position-fixed top-0 end-0 w-100 h-100"></div>
      <div class="nav-responsive-content position-absolute top-0 right-0 w-100 h-100">
        <div class="nav-responsive-content-wrapper bg-white">
          <button type="button"
            class="nav-responsive-close rounded-circle d-flex align-items-center justify-content-center text-white">
            <i class="icon-close"></i>
          </button>
          <ul class="nav-responsive-content-menu">
          <?php
            function has_sub_menu( array $menu_items, int $id ){
              foreach ( $menu_items as $menu_item ){
                  if ( (int)$menu_item->menu_item_parent === $id ) {
                      return true;
                  }
              }
              return false;
            }
            // wordpress does not group child menu items with parent menu items
            $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
            if(!empty($options['kaveh_mobile_select'])):
            $menuop = $options['kaveh_mobile_select'];
            $navbar_items= wp_get_nav_menu_items($menuop);
            else:
            $navbar_items= wp_get_nav_menu_items('primary');
            endif;
         
            foreach ($navbar_items as $navbar_item) {
              $nav_meta = get_post_meta($navbar_item->ID);
              $icon_class = $nav_meta['_menu_item_desc'];
             if($navbar_item->menu_item_parent==0):
             ?>    
               <li <?php if(has_sub_menu($navbar_items,$navbar_item->ID)): ?> class="has-child"<?php endif; ?>>
                  <a href="<?php echo $navbar_item->url; ?>" class="d-block rounded-pill">
                    <i class="<?php echo $icon_class[0]; ?>"></i>
                    <?php echo $navbar_item->title; ?>
                    <?php if(has_sub_menu($navbar_items,$navbar_item->ID)): ?>
                      <i class="icon-angle-left position-absolute top-50 translate-middle-y m-0"></i>
                    <?php endif; ?>
                  </a>
              <?php if(has_sub_menu($navbar_items,$navbar_item->ID)): ?>
              <div class="children position-fixed top-0 start-0 w-100 h-100 bg-white">
                <div class="heading px-3 py-4 d-flex align-items-center justify-content-between">
                <?php echo $navbar_item->title; ?>
                  <button type="button"
                    class="nav-responsive-back rounded-circle d-flex align-items-center justify-content-center text-white mb-0">
                    <i class="icon-arrow-left-2"></i>
                  </button>
                </div>
                <ul>
                  <?php
                  foreach ( $navbar_items as $menu_item ){
                    if ( (int)$menu_item->menu_item_parent === $navbar_item->ID ) {
                        ?>
                        <li <?php if(has_sub_menu($navbar_items,$menu_item->ID)): ?>class="has-child"<?php endif; ?>>
                          <a href="<?php echo $menu_item->url; ?>" class="d-block rounded-pill"> <?php echo $menu_item->title; ?> 
                          <?php if(has_sub_menu($navbar_items,$menu_item->ID)): ?>
                          <i class="icon-angle-left position-absolute top-50 translate-middle-y m-0"></i>
                          <?php endif; ?>
                           </a>
                          <?php if(has_sub_menu($navbar_items,$menu_item->ID)): ?>
                            <div class="children position-fixed top-0 start-0 w-100 h-100 bg-white">
                            <div class="heading px-3 py-4 d-flex align-items-center justify-content-between">
                            <?php echo $menu_item->title; ?> 
                              <button type="button"
                                class="nav-responsive-back rounded-circle d-flex align-items-center justify-content-center text-white mb-0">
                                <i class="icon-arrow-left-2"></i>
                              </button>
                            </div>
                            <ul>
                              <?php foreach ( $navbar_items as $submenu_item ): ?>
                              <?php if ( (int)$submenu_item->menu_item_parent === $menu_item->ID ): ?>
                              <li <?php if(has_sub_menu($navbar_items,$submenu_item->ID)): ?>class="has-child"<?php endif; ?>>
                                <a href="<?php echo $submenu_item->url; ?>" class="d-block rounded-pill"> <?php echo $submenu_item->title; ?> 
                                <?php if(has_sub_menu($navbar_items,$submenu_item->ID)): ?>
                                <i class="icon-angle-left position-absolute top-50 translate-middle-y m-0"></i>
                                <?php endif; ?>
                                </a>
                                <?php if(has_sub_menu($navbar_items,$submenu_item->ID)): ?>
                                <div class="children position-fixed top-0 start-0 w-100 h-100 bg-white">
                                  <div class="heading px-3 py-4 d-flex align-items-center justify-content-between">
                                  <?php echo $submenu_item->title; ?> 
                                    <button type="button"
                                      class="nav-responsive-back rounded-circle d-flex align-items-center justify-content-center text-white mb-0">
                                      <i class="icon-arrow-left-2"></i>
                                    </button>
                                  </div>
                                  <ul>
                                  <?php foreach ( $navbar_items as $subsubmenu_item ): ?>
                                    <?php if ( (int)$subsubmenu_item->menu_item_parent === $submenu_item->ID ): ?>
                                    <li <?php if(has_sub_menu($navbar_items,$subsubmenu_item->ID)): ?>class="has-child"<?php endif; ?>>
                                      <a href="<?php echo $subsubmenu_item->url; ?>" class="d-block rounded-pill"> <?php echo $subsubmenu_item->title; ?> 
                                      <?php if(has_sub_menu($navbar_items,$subsubmenu_item->ID)): ?>
                                        <div class="children position-fixed top-0 start-0 w-100 h-100 bg-white">
                                          <div class="heading px-3 py-4 d-flex align-items-center justify-content-between">
                                          <?php echo $subsubmenu_item->title; ?> 
                                            <button type="button"
                                              class="nav-responsive-back rounded-circle d-flex align-items-center justify-content-center text-white mb-0">
                                              <i class="icon-arrow-left-2"></i>
                                            </button>
                                          </div>
                                          <ul>
                                          <?php foreach ( $navbar_items as $subsubsubmenu_item ): ?>
                                            <?php if ( (int)$subsubsubmenu_item->menu_item_parent === $subsubmenu_item->ID ): ?>
                                            <li class="has-child">
                                              <a href="#" class="d-block rounded-pill"> ایتم 1 </a>
                                              <div class="children position-fixed top-0 start-0 w-100 h-100 bg-white">
                                                <div class="heading px-3 py-4 d-flex align-items-center justify-content-between">
                                                  دسته بندی محصولات
                                                  <button type="button"
                                                    class="nav-responsive-back rounded-circle d-flex align-items-center justify-content-center text-white mb-0">
                                                    <i class="icon-arrow-left-2"></i>
                                                  </button>
                                                </div>
                                                <ul>
                                                  <li class="has-child">
                                                    <a href="#" class="d-block rounded-pill"> ایتم 1 </a>
                                                    
                                                  </li>
                                                  <li class="has-child">
                                                    <a href="#" class="d-block rounded-pill"> ایتم 2 </a>
                                                  
                                                  </li>
                                                  <li>
                                                    <a href="#" class="d-block rounded-pill"> ایتم 3 </a>
                                                  </li>
                                                </ul>
                                              </div>
                                            </li>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                          </ul>
                                        </div>
                                      <?php endif; ?>
                                      </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                  </ul>
                                </div>
                                <?php endif; ?>
                              </li>

                              <?php endif; ?>
                          <?php endforeach; ?>
                             
                            </ul>
                          </div>
                          <?php endif; ?>
                        </li>
                        <?php
                    }
                  }
                  ?>
                </ul>
              </div>
              <?php endif; ?>
               </li>  
               <?php endif; ?>            
              <?php  
            }
            ?>
          </ul>
        </div>
        <div class="discounts-contact d-flex align-items-center justify-content-between position-relative">
          <?php
          if(!empty($options['kaveh_boxmenudown_mobile_on'])):
          if($options['kaveh_boxmenudown_mobile_on'] === '1' ):
          ?>
          <a href="<?php echo $options['kaveh_boxmenudown_url']; ?>" class="discount rounded-pill">
            <i class="<?php echo $options['kaveh_boxmenudown_iconclass']; ?>"></i>
            <?php echo $options['kaveh_boxmenudown_text']; ?>
          </a>
          <ul class="d-flex align-items-center">
            <li>
              <a href="#">
                <i class="icon-document"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="icon-phone-4"></i>
              </a>
            </li>
          </ul>
          <?php
          endif;
           endif;
          ?>
        </div>
        <?php if($options['kaveh_icons_mobile_on']==true): ?>
        <div class="socials d-flex align-items-center justify-content-between position-relative">
          <ul class="d-flex align-items-center">
            <?php
            if(!empty($options['kaveh_mobile_menu-repeater'])):
            $iconh = $options['kaveh_mobile_menu-repeater'];
            for ($i = 0; $i < count($iconh); $i++) {
            ?>
            <li>
              <a href="<?php echo $iconh[$i]['kaveh_mobile_menu_text']; ?>" class="d-flex align-items-center justify-content-center rounded-pill">
                <i class="<?php echo $iconh[$i]['kaveh_mobile_menu_icon']; ?>"></i>
              </a>
            </li>
            <?php
            }
            endif;
            ?>
         
          </ul>
          <span class="text-white"> شبکه های اجتماعی </span>
        </div>
        <?php endif; ?>
       
      </div>
    </div>
    <?php endif; ?>
<?php endif; ?>
<?php endif; ?>
