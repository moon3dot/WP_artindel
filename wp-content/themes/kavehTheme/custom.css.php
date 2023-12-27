<?php
header( "Content-type: text/css; charset: UTF-8" );
$options = get_option( 'kaveh_frame' );
$color= $options['opt-color-5'];
$hovercolor= $options['opt-color-5-hover'];
$navresbg = $options['kaveh_header_mobile_bg_type'];
?>
<?php if($navresbg =='option-1'): ?>
.nav-responsive-content .discounts-contact::before {
    background: url("<?php echo $options['kaveh_mobile_header_bg_image']; ?>") 0 0 no-repeat;
    -webkit-background-size: 100% 100%;
    -moz-background-size: 100% 100%;
}
<?php elseif($navresbg =='option-2'): ?>
.nav-responsive-content .discounts-contact::before {
    background-color: <?php echo $color;  ?> !important;
	background-image:unset !important;
}
<?php endif; ?>
.nav-responsive-content .discounts-contact .discount {
    color: <?php echo $color;  ?> ;
}
.nav-responsive-content-menu li.has-child > .children .heading {
    color: <?php echo $color;  ?> ;
}
.wpcvs-term.wpcvs-selected {
    border-color: <?php echo $color;  ?>;
}
#loading {
  border-top-color: <?php echo $color;  ?> !important;
}
span.page-numbers.current {
    background-color: <?php echo $color;  ?> !important;
}
.nav-responsive-close, .nav-responsive-back {
    background-color: <?php echo $color;  ?> ;
    -webkit-box-shadow: 0 15px 25px <?php echo $color;  ?>25;
    -moz-box-shadow: 0 15px 25px <?php echo $color;  ?>25;
    box-shadow: 0 15px 25px <?php echo $color;  ?>25;

}
.popup-content:after {
    background-color: <?php echo $color;  ?>;
}
.nav-pills .nav-link.active {
    -webkit-box-shadow: 0 10px 35px <?php echo $color;  ?>25 !important;
    -moz-box-shadow: 0 10px 35px <?php echo $color;  ?>25 !important;
    box-shadow: 0 10px 35px <?php echo $color;  ?>25 !important;

}
.woosw-popup .woosw-popup-inner .woosw-popup-content .woosw-popup-content-top {
    background-color: <?php echo $color;  ?> !important;
}
.woosw-popup-content::before {
    background-color: <?php echo $color;  ?> !important;
}
.woosw-popup-content::after {
    background-color: <?php echo $color;  ?> !important;
}
.nav-bottom-four > a:hover, .nav-bottom-four > a.active {
    color:<?php echo $hovercolor;  ?>;
}
.nav-bottom > a:hover, .nav-bottom > a.active {
    color: <?php echo $hovercolor;  ?>;
}
.cart-sliding-content-heading .btn {
    -webkit-box-shadow: 0 15px 25px <?php echo $color;  ?>25;
    -moz-box-shadow: 0 15px 25px <?php echo $color;  ?>25;
    box-shadow: 0 15px 25px <?php echo $color;  ?>25;
}
.nav-bottom {
    border-bottom-color: <?php echo $color;  ?>;
}
.nav-bottom::after {
    background-color: <?php echo $color;  ?>;
}
.nav-bottom > a:nth-child(3) {
    background-color: <?php echo $color;  ?>;
}
.nav-bottom-two::before {
   background-color: <?php echo $color;  ?>;
}
.panel1kaveh table.my_account_orders::after {
	background-color: <?php echo $color;  ?>;
}
.btn-outline-dark:hover{
    border-color:<?php echo $color;  ?>;
    
}
.detail-product-three .options-box{
    background-color: <?php echo $color;  ?>;
}
.amazing-offer .product-image .discount {
    background-color: <?php echo $color;  ?>;
}
.top-products-tabs .nav-item .nav-link.active, .top-products-tabs .nav-item .nav-link:hover {
    background-color: <?php echo $color;  ?>;
}
.article figure .category-time {
    background-color: <?php echo $color;  ?>;
}
.footer-three-titr::before {
    background-color: <?php echo $color;  ?>;
}

.megamenu-two-tabs-item.active i {
    background-color: <?php echo $color;  ?>;
}
.megamenu-two-content-item ul li a::before {
    background-color: <?php echo $color;  ?>80;
}
.megamenu-two-content-item .title .name-fa::before {
    background-color: <?php echo $color;  ?>80;
}
.footer-scroll-header {
    background-color: <?php echo $color;  ?>;
}
.megamenu-tab-contents-item .categories .btn {
    background-color: <?php echo $color;  ?>;
}
.btn-danger {
    background-color: <?php echo $color;  ?>;
}
.product-eleven .product-image .discount {
    background-color: <?php echo $color;  ?>;
}
.nav-pills .nav-link.active {
    background-color: <?php echo $color;  ?>;
}
#comments::before {
    background-color: <?php echo $color;  ?>;
}
.woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) #respond input#submit, .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) a.button, .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button, .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) input.button, :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce #respond input#submit, :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce a.button, :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button, :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce input.button {
    background-color: <?php echo $color;  ?>;
}
.article-seven .content {
    background-color: <?php echo $color;  ?>;
}
.amazing-offer-three-wrapper::after {
    background-color: <?php echo $color;  ?>;
}
.amazing-offer-three-item .detail .offer {
    background-color: <?php echo $color;  ?>;
}
.top-products-three-tabs .nav-item .nav-link.active, .top-products-three-tabs .nav-item .nav-link:hover {
    background-color: <?php echo $color;  ?>;
}

.top-header-auth-dropdown li a::before {
    background-color: <?php echo $color;  ?>;
}
.products-category .swiper-button-next, .products-category .swiper-button-prev {
    background-color: <?php echo $color;  ?>;
}
.products-category-title::after, .products-category-title::before {
    background-color: <?php echo $color;  ?>;
}
.article-four {
    background-color: <?php echo $color;  ?>;
}
.btn-danger-2 {
    background-color: <?php echo $color;  ?>;
}
.product-thirteen .discount {
    background-color: <?php echo $color;  ?>;
}
.article-five figure ul li:last-child {
    background-color: <?php echo $color;  ?>;
}
.product-thirteen-three .btns li a {
    background-color: <?php echo $color;  ?>;
}
.landing-fiveteen .swiper-pagination-bullet {
    background-color: <?php echo $color;  ?>;
}
.elementor-2866 .elementor-element.elementor-element-b049d44 .amazing-offer-fiveteen-item .detail .content .btn {
    background-color: <?php echo $color;  ?>;
}
.landing-fourteen .swiper-pagination-bullet {
    background-color: <?php echo $color;  ?>;
}
.amazing-offer-seven-wrapper::before {
    background-color: <?php echo $color;  ?>72;
}
.category-slider-banner .category {
    background-color: <?php echo $color;  ?>;
}
.top-seller-products-two-tabs li.active, .top-seller-products-two-tabs li:hover {
    background-color: <?php echo $color;  ?>;
}
.products-category-two .section-heading::before {
    background-color: <?php echo $color;  ?>;
}
.about-us-home-seven .content .socials {
    background-color: <?php echo $color;  ?>;
}
.about-us-home-seven::before {
    background-color: <?php echo $color;  ?>;
}
.category-products-two-item h2, .category-products-two-item h3, .category-products-two-item h4, .category-products-two-item h5, .category-products-two-item h6, .category-products-two-item span, .category-products-two-item div, .category-products-two-item p {
    background-color: <?php echo $color;  ?>;
}
.amazing-offer-eight-wrapper .left .swiper::after {
    background-color: <?php echo $color;  ?>;
}
.top-products-two-tabs .nav-item .nav-link.active, .top-products-two-tabs .nav-item .nav-link:hover {
    background-color: <?php echo $color;  ?>;
}
.article-two .date-view {
    background-color: <?php echo $color;  ?>;
}
.landing-seven .swiper-slide .container .content .link a {
    background-color: <?php echo $color;  ?>;
}
.buy-vip-left .timear::after, .buy-vip-left .timear::before {
    background-color: <?php echo $color;  ?>;
}
.top-seller-products-tabs li.active, .top-seller-products-tabs li:hover {
    background-color: <?php echo $color;  ?>;
}
.detail-product-two-review .title::after {
    background-color: <?php echo $color;  ?>;
}
.product-two-detail .offer {
    background-color: <?php echo $color;  ?>;
}
.detail-product-two .nav-link.active {
    background-color: <?php echo $color;  ?>;
}

.detail-blog-info .date {
    background-color: <?php echo $color;  ?>;
}
.detail-product-three .offer-product {
    background-color: <?php echo $color;  ?>;
}
.detail-product-two-review .title::after {
    background-color: <?php echo $color;  ?>;
}
.detail-product-three #specifications ul li span:first-child {
    background-color: <?php echo $color;  ?>;
}
.detail-product-three #comments .box-send-comment .btn {
    background-color: <?php echo $color;  ?>;
}
.detail-product-three #comments .comments li .content .info .detail .position {
    background-color: <?php echo $color;  ?>;
}
.btn-dark {
    background-color: <?php echo $color;  ?>;
}
#comments .rate-comment .btn {
    background-color: <?php echo $color;  ?>;
}
.top-sellers-two .swiper::before {
    background-color: <?php echo $color;  ?>;
}


.footer-nav li a::before {
    background-color: <?php echo $color;  ?>;
}
.btn-warning {
    background-color: <?php echo $color;  ?>;
}
.nav-header-five .menu::before {
    background-color: <?php echo $color;  ?>;
}
.product-not .detail .icons-offer > span {
    background-color: <?php echo $color;  ?>;
}
.product-eight .image .offer {
    background-color: <?php echo $color;  ?>;
}
.top-header-nine .top-header-auth > a {
    background-color: <?php echo $color;  ?>;
}
.footer.primary .footer-contact i {
    background-color: <?php echo $color;  ?>;
}
.amazing-offer-eight-wrapper .right .timear li span {
    background-color: <?php echo $color;  ?>;
}
.footer-thirteen .footer-socials li a {
    background-color: <?php echo $color;  ?>;
}
.product-twelve .offer {
    background-color: <?php echo $color;  ?>;
}
.vercode {
    background-color: <?php echo $color;  ?>;
}
.footer-four .footer-namad::after, .footer-four-news-letter::after {
    background-color: <?php echo $color;  ?>;
}
.btn-success-4 {
    background-color: <?php echo $color;  ?>;
}
.cart-two-title {
    background-color: <?php echo $color;  ?>;
}
.btn-success {
    background-color: <?php echo $color;  ?>;
}
.top-header-auth-dropdown::after {
    -webkit-box-shadow: 0 4px 1px <?php echo $color;  ?>;
    -moz-box-shadow: 0 4px 1px <?php echo $color;  ?>;
    box-shadow: 0 4px 1px <?php echo $color;  ?>;
}
.landing-thirteen-item .detail .btn {
    -webkit-box-shadow: 0 3px 35px <?php echo $color;  ?>35;
    -moz-box-shadow: 0 3px 35px <?php echo $color;  ?>35;
    box-shadow: 0 3px 35px <?php echo $color;  ?>35;
}
.best-seller-products .section-heading .detail::before, .category-products-four .section-heading .detail::before {
    background-image: -webkit-linear-gradient(225deg, <?php echo $color;  ?> -20%, rgba(0, 255, 147, 0) 64%);
    background-image: -moz-linear-gradient(225deg, <?php echo $color;  ?> -20%, rgba(0, 255, 147, 0) 64%);
    background-image: -o-linear-gradient(225deg, <?php echo $color;  ?> -20%, rgba(0, 255, 147, 0) 64%);
    background-image: linear-gradient(-135deg, <?php echo $color;  ?> -20%, rgba(0, 255, 147, 0) 64%);
}

.woosc-btn.woosc-btn-has-icon.woosc-btn-icon-text {
    background: <?php echo $color;  ?>;
}
.brands-four .brands-wrapper::before {
    background-color: <?php echo $color;  ?>;
}
.product-four .product-image .discount {
    background: <?php echo $color;  ?>;
}
.section-heading-title b {
    color: <?php echo $color;  ?>;
}

.top-seller-home .section-heading-sub-title {
    color: <?php echo $color;  ?>;
}

.about-us-home-heading .sup-title {
    color: <?php echo $color;  ?>;
}
.article h2 a {
    color: <?php echo $color;  ?>;
}

.footer-two-phone div {
    color: <?php echo $color;  ?>;
}
.products-category-wrapper::after {
    border: 1px solid <?php echo $color;  ?>;
}

.article-four figure h2::before {
    border: 3px solid <?php echo $color;  ?>;
}

.landing-fiveteen .swiper-pagination {
    border: 2px solid <?php echo $color;  ?>20;
}
.landing-fourteen .swiper-pagination {
    border: 2px solid <?php echo $color;  ?>11;
}
.best-seller-products .section-heading-link::after, .category-products-four .section-heading-link::after {
    border: 2px solid <?php echo $color;  ?>;
}
.article-eight .content::before {
    border: 3px solid <?php echo $color;  ?>;
}


.megamenu-two-tabs-item::after {
    color: <?php echo $color;  ?>;
}

.megamenu-tabs span:hover, .megamenu-tabs span:hover::after, .megamenu-tabs span.active, .megamenu-tabs span.active::after {
    color: <?php echo $color;  ?>;
}
.megamenu-tab-contents-item .right ul li.offer {
    color: <?php echo $color;  ?>;
}

#comments .rate-comment .rate-box-count i {
    color: <?php echo $color;  ?>;
}


.best-selling-fiveteen .section-heading-sub-title, .best-selling-fiveteen .section-heading-title {
    color: <?php echo $color;  ?>;
}

.new-products-fourteen .section-heading-title {
    color: <?php echo $color;  ?>;
}

.products-category-two .section-heading-title {
    color: <?php echo $color;  ?>;
}

.best-seller-products .section-heading-link, .category-products-four .section-heading-link {
    color: <?php echo $color;  ?>;
}
.footer-four .titr b {
    color: <?php echo $color;  ?>;
}
.footer-name-shop {
    color: <?php echo $color;  ?>;
}

.about-us-home-five .content h2 {
    color: <?php echo $color;  ?>;
}
.top-products-tabs .nav-item .nav-link.active, .top-products-tabs .nav-item .nav-link:hover {
    -webkit-box-shadow: 0 10px 25px <?php echo $color;  ?>25;
    -moz-box-shadow: 0 10px 25px <?php echo $color;  ?>25;
    box-shadow: 0 10px 25px <?php echo $color;  ?>25;
}
.inform::after {
    background-color: <?php echo $color;  ?>;
}
.inform::before {
    background-color: <?php echo $color;  ?>;
}
.article-seven .content .info::before {
    border: 3px solid <?php echo $color;  ?>;
}
.best-selling-products::before {
    background-color: <?php echo $color;  ?>;
}
.landing-sixteen .swiper-pagination {
    background-color: <?php echo $color;  ?>;
}
.amazing-offer-fiveteen-item .detail .content .offer {
    background-color: <?php echo $color;  ?>;
}
.category-products-fiveteen-item .cat2st6 {
    background-color: <?php echo $color;  ?>10;
}
.amazing-offer-fourteen-item .detail .price .offer {
    background-color: <?php echo $color;  ?>;
}
.btn-danger-3 {
    background-color: <?php echo $color;  ?>;
}
.landing-eight-item .btn {
    -webkit-box-shadow: 0 3px 35px <?php echo $color;  ?>10;
    -moz-box-shadow: 0 3px 35px <?php echo $color;  ?>10;
    box-shadow: 0 3px 35px <?php echo $color;  ?>10;
}
.amazing-offer-seven-item .btns .btn-danger-3 {
    -webkit-box-shadow: 0 3px 35px <?php echo $color;  ?>50;
    -moz-box-shadow: 0 3px 35px <?php echo $color;  ?>50;
    box-shadow: 0 3px 35px <?php echo $color;  ?>50;
}
.btn-danger-3 {
    background-color: <?php echo $color;  ?>;
}
.ready-cases-item.active::before {
    background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo $color;  ?>), color-stop(rgba(29, 30, 57, 0.22)), to(rgba(33, 35, 65, 0)));
    background-image: -webkit-linear-gradient(top, <?php echo $color;  ?>, rgba(29, 30, 57, 0.22), rgba(33, 35, 65, 0));
    background-image: -moz-linear-gradient(top, <?php echo $color;  ?>, rgba(29, 30, 57, 0.22), rgba(33, 35, 65, 0));
    background-image: -o-linear-gradient(top, <?php echo $color;  ?>, rgba(29, 30, 57, 0.22), rgba(33, 35, 65, 0));
    background-image: linear-gradient(to bottom, <?php echo $color;  ?>, rgba(29, 30, 57, 0.22), rgba(33, 35, 65, 0));
}
.btn-purple {
    background-color: <?php echo $color;  ?>;
    -webkit-box-shadow: 0 10px 25px <?php echo $color;  ?>25;
    -moz-box-shadow: 0 10px 25px <?php echo $color;  ?>25;
    box-shadow: 0 10px 25px <?php echo $color;  ?>25;
}
.category-slider-banner .category ul li a::before {
    background-color: <?php echo $color;  ?>;
}
.amazing-offer-six-item .detail .offer {
    background-color: <?php echo $color;  ?>;
}
.product-five:hover, .product-five:hover .content .product-hover {
    background-color: <?php echo $color;  ?>;
}
.amazing-offer-nine .amazing-offer-seven-item {
    background: -webkit-linear-gradient(225deg, <?php echo $color;  ?>, rgba(7, 7, 13, 0) 66%);
    background: -moz-linear-gradient(225deg, <?php echo $color;  ?>, rgba(7, 7, 13, 0) 66%);
    background: -o-linear-gradient(225deg, <?php echo $color;  ?>, rgba(7, 7, 13, 0) 66%);
    background: linear-gradient(-135deg, <?php echo $color;  ?>, rgba(7, 7, 13, 0) 66%);
}
.amazing-offer-nine .amazing-offer-seven-item::after {
    background-image: -webkit-linear-gradient(315deg, <?php echo $color;  ?>, rgba(18, 19, 32, 0) 65%);
    background-image: -moz-linear-gradient(315deg, <?php echo $color;  ?>, rgba(18, 19, 32, 0) 65%);
    background-image: -o-linear-gradient(315deg, <?php echo $color;  ?>, rgba(18, 19, 32, 0) 65%);
    background-image: linear-gradient(135deg, <?php echo $color;  ?>, rgba(18, 19, 32, 0) 65%);
}
.amazing-offer-nine .amazing-offer-seven-item .content ul li::before {
    background-color: <?php echo $color;  ?>;
}
.row .sale-ready-cases-item:hover::before {
    background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo $color;  ?>), color-stop(<?php echo $color;  ?>), color-stop(90%, rgba(33, 35, 65, 0)));
    background-image: -webkit-linear-gradient(top, <?php echo $color;  ?>, <?php echo $color;  ?>, rgba(33, 35, 65, 0) 90%);
    background-image: -moz-linear-gradient(top, <?php echo $color;  ?>, <?php echo $color;  ?>, rgba(33, 35, 65, 0) 90%);
    background-image: -o-linear-gradient(top, <?php echo $color;  ?>, <?php echo $color;  ?>, rgba(33, 35, 65, 0) 90%);
    background-image: linear-gradient(to bottom, <?php echo $color;  ?>, <?php echo $color;  ?>, rgba(33, 35, 65, 0) 90%);
}
.amazing-offer-two-item .detail .offer span {
    background-color: <?php echo $color;  ?>;
}
.article-two h2::before {
    border: 3px solid <?php echo $color;  ?>;
}
.elementor-element-61c9045 .section-heading-two::after {
    background-image: -webkit-linear-gradient(right, <?php echo $color;  ?>20, #fff) !important;
    background-image: -moz-linear-gradient(right, <?php echo $color;  ?>20, #fff) !important;
    background-image: -o-linear-gradient(right, <?php echo $color;  ?>20, #fff) !important;
    background-image: linear-gradient(to left, <?php echo $color;  ?>20, #fff) !important;
}
.about-us-home-five .content {
    padding: 0 65px 49px 0;
    background-image: -webkit-linear-gradient(315deg, #fff 55%, <?php echo $color;  ?>20);
    background-image: -moz-linear-gradient(315deg, #fff 55%, <?php echo $color;  ?>20);
    background-image: -o-linear-gradient(315deg, #fff 55%, <?php echo $color;  ?>20);
    background-image: linear-gradient(135deg, #fff 55%, <?php echo $color;  ?>20);
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
}
.about-us-landing .title span {
    color: <?php echo $color;  ?>;
}
.about-us-description-content .heading::before {
    background-color: <?php echo $color;  ?>;
}
.about-us-statistics-item .count {
    color: <?php echo $color;  ?>;
}
.contact-us-image::before {
    content: "";
    background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(238, 39, 58, 0)), to(<?php echo $color;  ?>));
    background-image: linear-gradient(to bottom, rgba(238, 39, 58, 0), <?php echo $color;  ?>);
}
.contact-us .info-contact-item .image {
    background-color: <?php echo $color;  ?>10;
}
.about-us-home-three-wrapper .content::after {
    background-image: -webkit-linear-gradient(right, #fff, <?php echo $color;  ?>);
    background-image: -moz-linear-gradient(right, #fff, <?php echo $color;  ?>);
    background-image: -o-linear-gradient(right, #fff, <?php echo $color;  ?>);
    background-image: linear-gradient(to left, #fff, <?php echo $color;  ?>);
}
.about-us-home-three-wrapper .content h3 {
    color: <?php echo $color;  ?>;
}
.new-article .heading .title mark {
    background-color: <?php echo $color;  ?>40;
}
.amazing-offer-sixteen-item .detail .offer > div del {
    background-color: <?php echo $color;  ?>;
}
.nav-header-cart > .btn {
    -webkit-box-shadow: 0 10px 15px <?php echo $color;  ?>25;
    -moz-box-shadow: 0 10px 15px <?php echo $color;  ?>25;
    box-shadow: 0 10px 15px <?php echo $color;  ?>25;
}
.btn-danger-3:hover, .btn-danger-3:focus, .btn-danger-3:active{
    background-color: <?php echo $color;  ?>;
}
.row .ready-cases-item:hover::before {
    background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo $color;  ?>), color-stop(rgba(29, 30, 57, 0.22)), to(rgba(33, 35, 65, 0)));
    background-image: -webkit-linear-gradient(top, <?php echo $color;  ?>, rgba(29, 30, 57, 0.22), rgba(33, 35, 65, 0));
    background-image: -moz-linear-gradient(top, <?php echo $color;  ?>, rgba(29, 30, 57, 0.22), rgba(33, 35, 65, 0));
    background-image: -o-linear-gradient(top, <?php echo $color;  ?>, rgba(29, 30, 57, 0.22), rgba(33, 35, 65, 0));
    background-image: linear-gradient(to bottom, <?php echo $color;  ?>, rgba(29, 30, 57, 0.22), rgba(33, 35, 65, 0));
}
.new-articles-blog .right .title::before {
    background-color: <?php echo $color;  ?>;
}
.sale-ready-cases-item.active::before {
    background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo $color;  ?>), color-stop(<?php echo $color;  ?>), color-stop(90%, rgba(33, 35, 65, 0)));
    background-image: -webkit-linear-gradient(top, <?php echo $color;  ?>, <?php echo $color;  ?>, rgba(33, 35, 65, 0) 90%);
    background-image: -moz-linear-gradient(top, <?php echo $color;  ?>, <?php echo $color;  ?>, rgba(33, 35, 65, 0) 90%);
    background-image: -o-linear-gradient(top, <?php echo $color;  ?>, <?php echo $color;  ?>, rgba(33, 35, 65, 0) 90%);
    background-image: linear-gradient(to bottom, <?php echo $color;  ?>, <?php echo $color;  ?>, rgba(33, 35, 65, 0) 90%);
}
.product-image .discount::after {
    background-color: <?php echo $color;  ?>;
}
.megamenu-tab-contents-item .right ul li.offer span {
    background-color: <?php echo $color;  ?>;
}
.megamenu-product .offer {
    background-color: <?php echo $color;  ?>;
}
.footer-contact i {
    background-color: <?php echo $color;  ?>;
}
.footer-newsletter .btn {
    background-color: <?php echo $color;  ?>;
}
.megamenu-product .btn {
    -webkit-box-shadow: 0 6px 30px <?php echo $color;  ?>25;
    -moz-box-shadow: 0 6px 30px <?php echo $color;  ?>25;
    box-shadow: 0 6px 30px <?php echo $color;  ?>25;
}
.article-three:hover .date span {
    background-color: <?php echo $color;  ?>;
}






/* hover ha */
.product .detail h2 a:hover {
    color: <?php echo $hovercolor;  ?>;
}
.product h2 a:hover, .product-two h2 a:hover, .product-three h2 a:hover, .product-four h2 a:hover, .product-fiv h2 a:hover, .product-six h2 a:hover, .product-name a:hover {
    color: <?php echo $hovercolor;  ?>;
}
.top-category-item:hover i {
    background-color: <?php echo $hovercolor;  ?>;
    border-color: <?php echo $hovercolor;  ?>;
}
.megamenu-two-content-item ul li a:hover {
    color: <?php echo $hovercolor;  ?>;
}
.new-article .heading a:hover {
    color: <?php echo $hovercolor;  ?>;
}
.btn-primary:hover, .btn-primary:focus, .btn-primary:active {
    background-color: <?php echo $hovercolor;  ?>;
}
.product-three:hover {
    border-color: <?php echo $hovercolor;  ?>;
}

.top-header-auth-dropdown li a:hover {
    color: <?php echo $hovercolor;  ?>;
}
.product-not .detail .icons-offer ul li a:hover {
    background-color: <?php echo $hovercolor;  ?>;
    border-color: <?php echo $hovercolor;  ?>;
}
.article-four figure h2 a:hover {
    color: <?php echo $hovercolor;  ?>;
}
.article-five h2 a:hover {
    color: <?php echo $hovercolor;  ?>;
}
.about-us-home-six .content .socials li a:hover {
    color: <?php echo $hovercolor;  ?>;
}
.article-six h2 a:hover {
    color: <?php echo $hovercolor;  ?>;
}
.category-slider-banner .category ul li a:hover {
    color: <?php echo $hovercolor;  ?>;
}
.article-eight .content h2 a:hover {
    color: <?php echo $hovercolor;  ?>;
}
.about-us-home-six .content .socials li a:hover {
    color: <?php echo $hovercolor;  ?>;
}
.about-us-home-five .content .socials li a:hover {
    color: <?php echo $hovercolor;  ?>;
}
#comments .rate-comment .text-login:hover {
    color: <?php echo $hovercolor;  ?>;
}
.about-us-home-six .content .socials li a:hover {
    color: <?php echo $hovercolor;  ?>;
}
.top-header-auth > a:hover {
    background-color: <?php echo $hovercolor;  ?>;
}
.btn-danger:hover, .btn-danger:focus, .btn-danger:active {
    background-color: <?php echo $hovercolor;  ?>;
}
.btn-outline-dark:hover, .btn-outline-dark:focus, .btn-outline-dark:active {
    background-color: <?php echo $hovercolor;  ?>;
}
.article h2 a:hover {
    color: <?php echo $hovercolor;  ?>;
}
.footer-four-nav li a:hover {
    color: <?php echo $hovercolor;  ?>;
}
.article-three h2 a:hover {
    color: <?php echo $hovercolor;  ?>;
}
.product-not .detail .icons-offer ul li a:hover {
    background-color: <?php echo $hovercolor;  ?>;
    border-color: <?php echo $hovercolor;  ?>;
}
.btn-warning:hover, .btn-warning:focus, .btn-warning:active {
    background-color: <?php echo $hovercolor;  ?>;
}
.landing-seven .swiper-slide .container .content .link a:hover {
    background-color: <?php echo $hovercolor;  ?>;
}
.btn-danger-2:hover, .btn-danger-2:focus, .btn-danger-2:active {
    background-color: <?php echo $hovercolor;  ?>;
}
