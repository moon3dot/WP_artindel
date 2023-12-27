<article class="article-four">
                <figure class="position-relative mb-0">
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="article" class="d-block w-100" />
                  <h2 class="position-relative text-nowrap overflow-hidden">
                    <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
                  </h2>
                </figure>
                <div class="date-view d-flex align-items-center justify-content-between">
                  <span> <?php the_date(); ?> </span>
                  <span>
                  <?php
                  $category = get_the_category(); 
                  ?>
                    <b> 
                     دسته بندی: </b>
                     <a href="<?php echo site_url('/category/') . $category[0]->slug; ?>">
                    <?php
                    echo $category[0]->cat_name;
                    ?>
                    </a>
                  </span>
                </div>
              </article>