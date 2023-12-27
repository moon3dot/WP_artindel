              <article class="article-eight position-relative">   
                <ul class="date-view d-flex align-items-center justify-content-between">
                  <li><?php echo get_the_date(); ?></li>
                  <?php
                        $category = get_the_category(); 
                        ?>
                       <a href="<?php echo site_url('/category/') . $category[0]->slug; ?>"> <li> <b> دسته بندی: </b> <?php echo $category[0]->cat_name; ?> </li></a></ul>
                <div class="image position-relative">
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="article" class="w-100 d-block" />
                </div>
                <div class="content position-relative">
                  <h2 class="text-truncate">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </h2>
                  <p><?php echo get_the_excerpt(); ?></p>
                </div>
              </article>