<?php

if (!function_exists("ah_shop_setup")) {
    function ah_shop_setup()
    {
        load_theme_textdomain("kavehTheme", get_template_directory() . "/languages");
        add_theme_support("automatic-feed-links");
        add_theme_support("title-tag");
        add_theme_support("post-thumbnails");
        register_nav_menus(["primary" => __("Primary Menu", "kavehTheme"), "social" => __("Social Links Menu", "kavehTheme")]);
        add_theme_support("boostify-header-footer");
        add_theme_support("html5", ["search-form", "comment-form", "comment-list", "gallery", "caption"]);
        add_theme_support("woocommerce");
        add_theme_support("post-formats", ["aside", "image", "video", "quote", "link", "gallery", "status", "audio", "chat"]);
        add_post_type_support("page", "excerpt");
    }
}
add_action("after_setup_theme", "ah_shop_setup");
add_action("after_setup_theme", "kaveh_blog_widgets_init");
add_action("after_setup_theme", "kaveh_main_widgets_init");
if (!function_exists("ah_shop_init")) {
    function ah_shop_init()
    {
        register_taxonomy_for_object_type("category", "attachment");
        register_taxonomy_for_object_type("post_tag", "attachment");
    }
}
add_action("init", "ah_shop_init");
if (!function_exists("ah_shop_custom_image_sizes_names")) {
    function ah_shop_custom_image_sizes_names($sizes)
    {
        return $sizes;
    }
    add_action("image_size_names_choose", "ah_shop_custom_image_sizes_names");
}
if (!function_exists("ah_shop_widgets_init")) {
    function ah_shop_widgets_init()
    {
    }
    add_action("widgets_init", "ah_shop_widgets_init");
}
if (!function_exists("ah_shop_customize_register")) {
    function ah_shop_customize_register($wp_customize)
    {
    }
    add_action("customize_register", "ah_shop_customize_register");
}
add_filter("excerpt_length", "my_excerpt_length");
if (!function_exists("ah_shop_pingback_header")) {
    function ah_shop_pingback_header()
    {
        if (is_singular() && pings_open()) {
            printf("<link rel=\"pingback\" href=\"%s\">\n", get_bloginfo("pingback_url"));
        }
    }
}
add_action("elementor/editor/before_enqueue_scripts", "wpsh_elementor_styles");
if (did_action("elementor/loaded")) {
    add_action("elementor/editor/before_enqueue_scripts", function () {
        if (get_locale() == "fa_IR" || get_locale() == "fa_AF") {
            $css = ".elementor-element .icon .eicon-archive-posts:before {\n                color: transparent;\n                background-image: url(https://s2.uupload.ir/files/kavele_3a0u.png);\n                display: block;\n                background-size: contain;\n                background-repeat: no-repeat;\n                background-position: center center;\n                height: 100%;\n                width: 80px;\n            }";
            wp_add_inline_style("wpsh-elementor-style", $css);
        }
    });
}
add_action("init", "kaveh_pr_tax_brand", 0);
add_filter("woocommerce_product_tabs", "woo_rename_tabs", 98);
add_action("woocommerce_single_product_summary", "customizing_single_product_summary_hooks", 2);
add_filter("upload_mimes", "add_fonts_to_allowed_mimes", 10, 3);
add_filter("wp_check_filetype_and_ext", "update_mime_types", 10, 3);
$page_slug = "register";
$new_page = ["post_type" => "page", "post_title" => "register", "post_status" => "publish", "post_author" => 1, "post_name" => $page_slug];
if (!get_page_by_path($page_slug, OBJECT, "page")) {
    $new_page_id = wp_insert_post($new_page);
}
add_action("template_redirect", "wpse131387_template_redirect");
add_action("wp_nav_menu_item_custom_fields", "menu_item_desc", 10, 2);
add_action("wp_update_nav_menu_item", "save_menu_item_desc", 10, 2);
add_action("woocommerce_checkout_update_order_meta", "wcdm_save_delivery_location_iframe");
add_action("woocommerce_admin_order_data_after_billing_address", "wcdm_display_delivery_location", 10, 1);
add_action("woocommerce_checkout_update_order_meta", "wcdd_save_delivery_date");
add_action("woocommerce_order_details_after_order_table", "wcdd_display_delivery_date_in_order_details");
add_action("init", "remove_wc_breadcrumbs");
add_action("wp_enqueue_scripts", "theme_custom_style_script", 11);
add_action("wp_ajax_dynamic_css", "dynamic_css");
add_action("wp_ajax_nopriv_dynamic_css", "dynamic_css");
add_action("lzb/init", function () {
    lazyblocks()->add_block(["id" => 13176, "title" => "آخرین مقالات سایدبار کاوه", "icon" => "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path d=\"M10 18h4v-2h-4v2zM3 6v2h18V6H3zm3 7h12v-2H6v2z\" /></svg>", "keywords" => ["سایدبار", "کاوه", "مقالات"], "slug" => "lazyblock/kaside", "description" => "", "category" => "widgets", "category_label" => "widgets", "supports" => ["customClassName" => true, "anchor" => false, "align" => ["wide", "full"], "html" => false, "multiple" => true, "inserter" => true], "ghostkit" => ["supports" => ["spacings" => false, "display" => false, "scrollReveal" => false, "frame" => false, "customCSS" => false]], "controls" => [], "code" => ["output_method" => "php", "editor_html" => "", "editor_callback" => "", "editor_css" => "", "frontend_html" => "<div class=\"lapost\">\n                              <h5>آخرین مقالات</h5> \n                              <p>آخرین اخبار منتشر شده</p>\n                              <ul class=\"footer-three-articles\">\n                              <?php\n                              \n                                              // WP_Query args\n                                      \$q_query_args = array(\n                                          'post_type' => array('post'),\n                                          'posts_per_page' => 4,\n                                          'order' => 'DESC',\n                                          'orderby' => 'date',\n                                      );\n  \n                                      // The Query\n                                      \$query = new \\WP_Query(\$q_query_args);\n                                      \n                                      // The Loop\n                                      if ( \$query->have_posts() ) {\n                                          while ( \$query->have_posts() ) {\n                                              \$query->the_post();\n                                          ?>\n                                      <li class=\"d-flex align-items-center\">\n                                          <img src=\"<?php the_post_thumbnail_url(); ?>\" alt=\"article\" class=\"d-block w-100\" />\n                                          <div class=\"detail w-100\">\n                                              <h2 class=\"mb-0 text-nowrap overflow-hidden\">\n                                                  <a href=\"<?php the_permalink(); ?>\"><?php \$tit=the_title(); echo wp_trim_words(\$tit, 6) ?></a>\n                                              </h2>\n                                              \n                                              <span class=\"d-block text-nowrap overflow-hidden\"><?php \$exp=get_the_excerpt(); echo wp_trim_words(\$exp, 7)    ?></span>\n  \n                                          \n  \n                                          </div>\n                                      </li>\n                                      <?php \n                                          }\n                                      }\n                                          // There are no posts\n                                      // Reset Original Post Data\n                                      wp_reset_postdata();\n                                      \n                                              ?>\n                                      \n                              </ul>\n                          </div>    ", "frontend_callback" => "", "frontend_css" => "", "show_preview" => "always", "single_output" => false], "condition" => []]);
    lazyblocks()->add_block(["id" => 13172, "title" => "فیلتر بر اساس دسته بندی وبلاگ", "icon" => "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path d=\"M10 18h4v-2h-4v2zM3 6v2h18V6H3zm3 7h12v-2H6v2z\" /></svg>", "keywords" => ["دسته بندی", "کاوه", "وبلاگ"], "slug" => "lazyblock/lapostk", "description" => "", "category" => "widgets", "category_label" => "widgets", "supports" => ["customClassName" => true, "anchor" => false, "align" => ["wide", "full"], "html" => false, "multiple" => true, "inserter" => true], "ghostkit" => ["supports" => ["spacings" => false, "display" => false, "scrollReveal" => false, "frame" => false, "customCSS" => false]], "controls" => [], "code" => ["output_method" => "php", "editor_html" => "", "editor_callback" => "", "editor_css" => "", "frontend_html" => " <div class=\"lapost\">\n                                          <!-- Start Category -->\n                                          <div class=\"category-sidebar-box\">\n                                          <div class=\"category-sidebar-box-heading\">\n                                              <i class=\"icon-filter\"></i>\n                                              دسته بندی وبلاگ\n                                          </div>\n                                          <div class=\"category-sidebar-box-body\">\n                                              <ul class=\"category-sidebar-box-items\">\n                                              <input type=\"hidden\" id=\"filters-category\" /> \n                                              <?php \$categories = get_categories(); ?>\n                                                  <?php \$numcat = 0 ; ?>\n                                                  <?php foreach(\$categories as \$category) : ?>\n                                                  <li>\n                                                      <a href=\"<?php echo home_url() . \"/category/\" . \$category->slug; ?>\">\n                                                      <?php echo \$category->name; ?>\n                                                      </a>\n                                                  </li>\n                                                  <?php \$numcat += 1; ?>\n                                              <?php endforeach; ?> \n                                              </ul>\n                                          </div>\n                                      </div>\n                                      <!-- End Category -->\n                                  </div>", "frontend_callback" => "", "frontend_css" => "", "show_preview" => "always", "single_output" => true], "condition" => []]);
    lazyblocks()->add_block(["id" => 12456, "title" => "فیلتر بر اساس تخفیف", "icon" => "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path d=\"M10 18h4v-2h-4v2zM3 6v2h18V6H3zm3 7h12v-2H6v2z\" /></svg>", "keywords" => [], "slug" => "lazyblock/fyltr", "description" => "", "category" => "woocommerce", "category_label" => "woocommerce", "supports" => ["customClassName" => true, "anchor" => false, "align" => ["wide", "full"], "html" => false, "multiple" => true, "inserter" => true], "ghostkit" => ["supports" => ["spacings" => false, "display" => false, "scrollReveal" => false, "frame" => false, "customCSS" => false]], "controls" => [], "code" => ["output_method" => "php", "editor_html" => "", "editor_callback" => "", "editor_css" => "", "frontend_html" => "     <!-- Start Fast Send -->\n                                  <div class=\"category-sidebar-box\">\n                                      <div class=\"category-sidebar-box-heading\">\n                                          <div class=\"form-check form-switch\">\n                                              <input class=\"form-check-input\" type=\"checkbox\" id=\"onlysale\">\n                                              <label class=\"form-check-label\" for=\"onlysale\"> فقط تخفیف دار ها </label>\n                                          </div>\n                                      </div>\n                                  </div>\n                                  <!-- End Fast Send -->", "frontend_callback" => "", "frontend_css" => "", "show_preview" => "always", "single_output" => true], "condition" => []]);
    lazyblocks()->add_block(["id" => 12454, "title" => "فیلتر محصولات موجود", "icon" => "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path d=\"M10 18h4v-2h-4v2zM3 6v2h18V6H3zm3 7h12v-2H6v2z\" /></svg>", "keywords" => ["filter", "فیلتر"], "slug" => "lazyblock/fyltr-mhswlat-mwjwd", "description" => "", "category" => "woocommerce", "category_label" => "woocommerce", "supports" => ["customClassName" => true, "anchor" => false, "align" => ["wide", "full"], "html" => false, "multiple" => true, "inserter" => true], "ghostkit" => ["supports" => ["spacings" => false, "display" => false, "scrollReveal" => false, "frame" => false, "customCSS" => false]], "controls" => [], "code" => ["output_method" => "php", "editor_html" => "", "editor_callback" => "", "editor_css" => "", "frontend_html" => "     \n                                  <!-- Start Exists Products -->\n                                  <div class=\"category-sidebar-box exists-products\">\n                                      <div class=\"category-sidebar-box-heading\">\n                                          <div class=\"form-check form-switch\">\n                                              <input class=\"form-check-input\" type=\"checkbox\" id=\"exists-products\">\n                                              <label class=\"form-check-label\" for=\"exists-products\"> فقط کالاهای موجود </label>\n                                          </div>\n                                      </div>\n                                  </div>\n                                  <!-- End Exists Products -->", "frontend_callback" => "", "frontend_css" => "", "show_preview" => "always", "single_output" => true], "condition" => []]);
    lazyblocks()->add_block(["id" => 12452, "title" => "فیلتر بر اساس دسته بندی فروشگاه", "icon" => "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path d=\"M10 18h4v-2h-4v2zM3 6v2h18V6H3zm3 7h12v-2H6v2z\" /></svg>", "keywords" => ["فیلتر", "filter"], "slug" => "lazyblock/fyltr-br-asas-dsth-bndy", "description" => "", "category" => "woocommerce", "category_label" => "woocommerce", "supports" => ["customClassName" => true, "anchor" => false, "align" => ["wide", "full"], "html" => false, "multiple" => true, "inserter" => true], "ghostkit" => ["supports" => ["spacings" => false, "display" => false, "scrollReveal" => false, "frame" => false, "customCSS" => false]], "controls" => [], "code" => ["output_method" => "php", "editor_html" => "", "editor_callback" => "", "editor_css" => "", "frontend_html" => "<div class=\"category-sidebar-box boxme\">\n        <div class=\"category-sidebar-box-heading\">\n                <i class=\"icon-filter\"></i>\n                دسته بندی محصولات\n        </div>\n        <div class=\"category-sidebar-box-body\">\n                <ul class=\"category-sidebar-box-items\">\n                <input type=\"hidden\" id=\"filters-category\" /> \n                <?php\n                \$current_category = get_queried_object(); // Get the current category object\n                \$subcategories = get_categories(array(\n                        'taxonomy' => 'product_cat',\n                        'parent' => \$current_category->term_id, // Get only subcategories of the current category\n                ));\n\n                if (!empty(\$subcategories)) { // Check if there are subcategories\n                        \$numcat = 0;\n                        foreach (\$subcategories as \$category) :\n                                ?>\n                                <li>\n                                        <div class=\"form-check\">\n                                                <input type=\"checkbox\" name=\"category\" id=\"category-<?php echo \$numcat; ?>\" myid=\"<?php echo \$category->term_id; ?>\" class=\"form-check-input\" />\n                                                <label for=\"category-<?php echo \$numcat; ?>\" class=\"form-check-label\"><?php echo \$category->name; ?></label>\n                                        </div>\n                                </li>\n                                <?php \$numcat += 1;\n                        endforeach;\n                } else { // No subcategories found\n                        ?>\n                        <style>\n                                .category-sidebar-box.boxme{\n                                        display:none !important;\n                                }\n                        </style>\n                        <?php\n                }\n                ?>\n                </ul>\n        </div>\n</div>\n", "frontend_callback" => "", "frontend_css" => "", "show_preview" => "always", "single_output" => false], "condition" => []]);
    lazyblocks()->add_block(["id" => 12449, "title" => "فیلتر بر اساس قیمت", "icon" => "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path d=\"M10 18h4v-2h-4v2zM3 6v2h18V6H3zm3 7h12v-2H6v2z\" /></svg>", "keywords" => ["filter", "فیلتر"], "slug" => "lazyblock/fyltr-br-asas-qymt", "description" => "", "category" => "woocommerce", "category_label" => "woocommerce", "supports" => ["customClassName" => true, "anchor" => false, "align" => ["wide", "full"], "html" => false, "multiple" => true, "inserter" => true], "ghostkit" => ["supports" => ["spacings" => false, "display" => false, "scrollReveal" => false, "frame" => false, "customCSS" => false]], "controls" => [], "code" => ["output_method" => "php", "editor_html" => "", "editor_callback" => "", "editor_css" => "", "frontend_html" => "    <!-- Start Range Price -->\n                                  <div class=\"category-sidebar-box filter-price\">\n                                      <div class=\"category-sidebar-box-heading\">\n                                          <i class=\"icon-filter\"></i>\n                                          براساس قیمت\n                                      </div>\n                                      <div class=\"category-sidebar-box-body\">\n                                          <div id=\"category-price\"></div>\n                                          <div class=\"filter-price-value d-flex align-items-center\">\n                                              <span> از </span>\n                                              <input type=\"text\" id=\"category-price-min\" class=\"form-control text-left\" />\n                                          </div>\n                                          <div class=\"filter-price-value d-flex align-items-center\">\n                                              <span> تا </span>\n                                              <input type=\"text\" id=\"category-price-max\" class=\"form-control text-left\" />\n                                          </div>\n                                      </div>\n                                  </div>\n                                  <!-- End Range Price -->", "frontend_callback" => "", "frontend_css" => "", "show_preview" => "always", "single_output" => true], "condition" => []]);
});
require_once get_template_directory() . "/inc/assets.php";
function kaveh_blog_widgets_init()
{
    register_sidebar(["name" => __("سایدبار بلاگ", "kaveh_theme"), "id" => "blog"]);
}
function kaveh_main_widgets_init()
{
    register_sidebar(["name" => __("سایدبار فروشگاه", "kaveh_theme"), "id" => "shop"]);
}
function my_excerpt_length($length)
{
    return 40;
}
function wpsh_elementor_styles()
{
    wp_register_style("wpsh-elementor-style", get_stylesheet_directory_uri() . "/wpsh-elementor-style.css", [], "1.0.0");
    wp_enqueue_style("wpsh-elementor-style");
}
function kaveh_pr_tax_brand()
{
    register_taxonomy("brands", "product", ["label" => __("برند", "textdomain"), "rewrite" => ["slug" => "brand"], "hierarchical" => true]);
}
function woo_rename_tabs($tabs)
{
    $tabs["additional_information"]["title"] = __("مشخصات");
    return $tabs;
}
function customizing_single_product_summary_hooks()
{
    remove_action("woocommerce_single_product_summary", "woocommerce_template_single_excerpt", 20);
}
function add_fonts_to_allowed_mimes($mimes)
{
    $mimes["woff"] = "application/x-font-woff";
    $mimes["woff2"] = "application/x-font-woff2";
    $mimes["ttf"] = "application/x-font-ttf";
    $mimes["eot"] = "application/vnd.ms-fontobject";
    $mimes["otf"] = "font/otf";
    return $mimes;
}
function update_mime_types($defaults, $file, $filename)
{
    if ("ttf" === pathinfo($filename, PATHINFO_EXTENSION)) {
        $defaults["type"] = "application/x-font-ttf";
        $defaults["ext"] = "ttf";
    }
    if ("otf" === pathinfo($filename, PATHINFO_EXTENSION)) {
        $defaults["type"] = "application/x-font-otf";
        $defaults["ext"] = "otf";
    }
    if ("woff" === pathinfo($filename, PATHINFO_EXTENSION)) {
        $defaults["type"] = "application/x-font-woff";
        $defaults["ext"] = "woff";
    }
    if ("woff2" === pathinfo($filename, PATHINFO_EXTENSION)) {
        $defaults["type"] = "application/x-font-woff";
        $defaults["ext"] = "woff2";
    }
    if ("eot" === pathinfo($filename, PATHINFO_EXTENSION)) {
        $defaults["type"] = "application/x-font-woff";
        $defaults["ext"] = "eot";
    }
    return $defaults;
}
function wpse131387_template_redirect()
{
    if ($_SERVER["REQUEST_URI"] == "/logout") {
        wp_redirect(home_url());
        exit;
    }
}
function menu_item_desc($item_id, $item)
{
    $menu_item_desc = get_post_meta($item_id, "_menu_item_desc", true);
    echo "      <div style=\"clear: both;\">\n          <span class=\"description\">";
    _e("کد آیکون منوی موبایل", "menu-item-desc");
    echo "</span><br />\n          <input type=\"hidden\" class=\"nav-menu-id\" value=\"";
    echo $item_id;
    echo "\" />\n          <div class=\"logged-input-holder\">\n              <input class=\"widefat\" type=\"text\" name=\"menu_item_desc[";
    echo $item_id;
    echo "]\" id=\"menu-item-desc-";
    echo $item_id;
    echo "\" value=\"";
    echo esc_attr($menu_item_desc);
    echo "\" />\n          </div>\n      </div>\n      ";
}
function save_menu_item_desc($menu_id, $menu_item_db_id)
{
    if (isset($_POST["menu_item_desc"][$menu_item_db_id])) {
        $sanitized_data = sanitize_text_field($_POST["menu_item_desc"][$menu_item_db_id]);
        update_post_meta($menu_item_db_id, "_menu_item_desc", $sanitized_data);
    } else {
        delete_post_meta($menu_item_db_id, "_menu_item_desc");
    }
}
function wcdm_save_delivery_location_iframe($order_id)
{
    if (!empty($_POST["delivery_location_iframe"])) {
        update_post_meta($order_id, "_delivery_location_iframe", $_POST["delivery_location_iframe"]);
    }
}
function wcdm_display_delivery_location($order)
{
    $delivery_location = get_post_meta($order->get_id(), "_delivery_location_iframe", true);
    if ($delivery_location) {
        echo "<p><strong>" . __("Delivery Location:", "wcdm") . "</strong> " . $delivery_location . "</p>";
    }
}
function wcdd_save_delivery_date($order_id)
{
    if (!empty($_POST["delivery_date"])) {
        update_post_meta($order_id, "_delivery_date", sanitize_text_field($_POST["delivery_date"]));
    }
}
function wcdd_display_delivery_date_in_order_details($order)
{
    $delivery_date = get_post_meta($order->get_id(), "_delivery_date", true);
    if (!empty($delivery_date)) {
        echo "<p><strong>" . __("Delivery Date:", "wcdd") . "</strong> " . $delivery_date . "</p>";
    }
}
function remove_wc_breadcrumbs()
{
    remove_action("woocommerce_before_main_content", "woocommerce_breadcrumb", 20, 0);
}
function get_breadcrumb()
{
    $breadcrumb_items = [];
    if (!is_home()) {
        $breadcrumb_items[] = ["url" => home_url(), "text" => "صفحه اصلی"];
        if (function_exists("is_shop") && is_shop()) {
            $breadcrumb_items[] = ["text" => "محصولات"];
        } else {
            if (is_product_category()) {
                $current_term = get_queried_object();
                $ancestors = array_reverse(get_ancestors($current_term->term_id, "product_cat"));
                foreach ($ancestors as $ancestor) {
                    $ancestor_term = get_term($ancestor, "product_cat");
                    $breadcrumb_items[] = ["url" => get_term_link($ancestor_term), "text" => $ancestor_term->name];
                }
                $breadcrumb_items[] = ["text" => $current_term->name];
            } else {
                if (is_single() && get_post_type() == "product") {
                    $shop_page_url = get_permalink(get_option("woocommerce_shop_page_id"));
                    $breadcrumb_items[] = ["url" => $shop_page_url, "text" => "محصولات"];
                    $terms = wp_get_post_terms(get_the_ID(), "product_cat");
                    foreach ($terms as $term) {
                        $ancestors = array_reverse(get_ancestors($term->term_id, "product_cat"));
                        foreach ($ancestors as $ancestor) {
                            $ancestor_term = get_term($ancestor, "product_cat");
                            $breadcrumb_items[] = ["url" => get_term_link($ancestor_term), "text" => $ancestor_term->name];
                        }
                        $breadcrumb_items[] = ["url" => get_term_link($term->term_id, "product_cat"), "text" => $term->name];
                    }
                    $breadcrumb_items[] = ["text" => get_the_title()];
                } else {
                    if (is_category() || is_single()) {
                        $category = get_the_category();
                        if (!empty($category)) {
                            $category_link = get_category_link($category[0]->term_id);
                            $breadcrumb_items[] = ["url" => $category_link, "text" => $category[0]->name];
                            if (is_single()) {
                                $breadcrumb_items[] = ["text" => get_the_title()];
                            }
                        }
                    } else {
                        if (is_page()) {
                            $post_id = get_the_ID();
                            if ($post->post_parent) {
                                $ancestors = get_post_ancestors($post_id);
                                $ancestors = array_reverse($ancestors);
                                foreach ($ancestors as $ancestor_id) {
                                    $ancestor_title = get_the_title($ancestor_id);
                                    $ancestor_url = get_permalink($ancestor_id);
                                    $breadcrumb_items[] = ["url" => $ancestor_url, "text" => $ancestor_title];
                                }
                            }
                            if (!is_front_page()) {
                                $breadcrumb_items[] = ["text" => get_the_title()];
                            }
                        }
                    }
                }
            }
        }
    } else {
        $breadcrumb_items[] = ["text" => "صفحه اصلی"];
    }
    if (!empty($breadcrumb_items)) {
        echo "<ul class=\"breadcrumb\">";
        foreach ($breadcrumb_items as $item) {
            $text = esc_html($item["text"]);
            if (isset($item["url"])) {
                $url = esc_url($item["url"]);
                echo "<li><a href=\"" . $url . "\">" . $text . "</a></li>";
            } else {
                echo "<li>" . $text . "</li>";
            }
        }
        echo "</ul>";
    }
}
function theme_custom_style_script()
{
    wp_enqueue_style("dynamic-css", admin_url("admin-ajax.php") . "?action=dynamic_css", "", "1.0");
}
function dynamic_css()
{
    require get_template_directory() . "/custom.css.php";
    exit;
}
function wpdocs_remove_menus()
{
    remove_menu_page("edit.php");
    remove_menu_page("edit.php?post_type=page");
    remove_menu_page("edit-comments.php");
    remove_menu_page("users.php");
    remove_menu_page("tools.php");
}

?>