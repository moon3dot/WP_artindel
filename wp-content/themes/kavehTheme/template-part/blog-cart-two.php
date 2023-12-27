              <div class="article-two">
                <div class="image">
                  <a href="<?php the_permalink(); ?>">
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="article" class="d-block w-100" />
                  </a>
                </div>
                <div class="date-view d-flex align-items-center justify-content-between">
                  <span> <?php echo get_the_date(); ?> </span>
                  <?php
                  $category = get_the_category(); 
                  ?>
                  <span>
                    <i class="fst-normal"> دسته بندی: </i>
                    <?php
                    echo $category[0]->cat_name;
                    ?>
                  </span>
                </div>
                <h2>
                  <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
                </h2>
                <p> <?php echo get_the_excerpt(); ?> </p>
              </div>