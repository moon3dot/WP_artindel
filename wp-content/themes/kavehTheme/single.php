<?php 
get_header();
?>


<?php
while ( have_posts() ) {
the_post(); 
$categories = get_the_category();
$category_name = esc_html( $categories[0]->name );
$tags = get_the_tags();
if ( $tags ) {
$tag_name = esc_html( $tag->name ); 
}
$post_id = get_the_ID();
$content = get_post_field( 'post_content', $post_id );
$pattern = '/[\x{0600}-\x{06FF}]+/u'; // Unicode range for Persian script
preg_match_all($pattern, $content, $matches);
$word_count = count($matches[0]);
$reading_time = ceil( $word_count / 200 );


?>
<section class="detail-blog mt-4">
      <div class="container position-relative">
      <?php if(function_exists('get_breadcrumb')){get_breadcrumb();}?>
        <div class="detail-blog-wrapper position-relative">
          <!-- Start Info -->
          <div class="detail-blog-info">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="detail-blog" class="w-100 d-block" />
            <div class="detail d-flex align-items-center justify-content-center">
              <a href="#" class="category"> <?php if(!empty($tag_name)): echo $tag_name; endif; ?> </a>
              <ul class="d-flex align-items-center">
                <li>
                  <div class="detail">
                    <span> دسته‌بندی‌ها </span>
                    <a href="#"> <?php if(!empty($tag_name)): echo $category_name; endif; ?></a>
                  </div>
                </li>
                <li>
                  <i class="icon-user"></i>
                  <div class="detail">
                    <span> نویسنده </span>
                    <a href="#"> <?php the_author(); ?> </a>
                  </div>
                </li>
                <li>
                  <div class="detail">
                    <span> زمان مورد نیاز برای مطالعه </span>
                    <span>
                      <b> <?php echo $reading_time; ?> </b>
                      دقیقه
                    </span>
                  </div>
                </li>
              </ul>
              <span class="date"> <?php echo get_the_date(); ?> </span>
            </div>
          </div>
          <!-- End Info -->
          <h1 class="detail-blog-name"> <?php the_title(); ?></h1>
          <!-- Start Content -->
          <div class="detail-blog-content">
           <?php the_content(); ?>
          </div>
          <!-- End Content -->


          <!-- <div class="like-share">
            <button type="button" class="like">
              <span> 15 </span>
              <i class="icon-like"></i>
            </button>
            <button type="button" class="dislike">
              <span> 2 </span>
              <i class="icon-dislike"></i>
            </button>
            <ul class="socials">
              <li>
                <a href="#">
                  <i class="icon-telegram"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="icon-linkedin"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="icon-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="icon-instagram"></i>
                </a>
              </li>
            </ul>
          </div> -->



        </div>
      </div>
      <!-- Start Related Articles -->
      <div class="detail-blog-related overflow-hidden">
        <div class="container position-relative">
          <!-- Start Heading -->
          <div class="heading d-flex align-items-center justify-content-between">
            <h4 class="fw-bold position-relative">
              <span class="fw-light d-block"> مطالب </span>
              مرتبط
            </h4>
            <a href="#" class="btn btn-outline-dark rounded-pill"> مشاهده همه </a>
          </div>
          <!-- End Heading -->
          <div class="detail-blog-related-wrapper">
            <div class="swiper swiper-related-articles">
              <div class="swiper-wrapper">
                <?php
                // WP_Query args
                $q_querylast_args = array(
                'post_type' => array('post'),
                'posts_per_page' =>5,
                'order' => 'DESC',
                'orderby' => 'date',
                );

                // The Query
                $querylast = new WP_Query($q_querylast_args);
                
                // The Loop
                if ( $querylast->have_posts() ) {
                while ( $querylast->have_posts() ) {
                $querylast->the_post();
                ?>
                <div class="swiper-slide">
                  <article class="article">
                    <figure>
                      <?php if(has_post_thumbnail(get_the_ID())){ ?>
                      <a href="<?php the_permalink(); ?>">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="d-flex w-100" />
                      </a>
                      <?php } ?>
                      <div class="category-time">
                        <a href="#">
                          برندسازی
                        </a>
                        <span> <?php echo get_the_date(); ?> </span>
                      </div>
                    </figure>
                    <h2>
                      <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
                    </h2>
                    <p> <?php echo get_the_excerpt(); ?></p>
                  </article>
                </div>
                <?php
                }
                } else {
                // There are no posts
                }
                // Reset Original Post Data
                wp_reset_postdata();
                ?>
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Related Articles -->
      <?php
      comments_template();
      ?>
    </section>




<?php } ?>
 
 

<?php 
get_footer();
?>