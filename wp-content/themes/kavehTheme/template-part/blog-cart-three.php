              <div class="article-three">
                <figure>
                  <a href="<?php the_permalink(); ?>">
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="article" />
                  </a>
                  <?php
                  $category = get_the_category(); 
                  ?>
                  <a href="<?php echo site_url('/category/') . $category[0]->slug; ?>" class="category"> <?php
                    echo $category[0]->cat_name;
                    ?> </a>
                </figure>
                <h2>
                  <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
                </h2>
                <div class="d-flex">
                  <div class="date">
                    <span> <?php echo get_the_date('d'); ?> </span>
                    <?php echo get_the_date('F'); ?>
                  </div>
                  <p> <?php echo get_the_excerpt(); ?> </p>
                </div>
              </div>
