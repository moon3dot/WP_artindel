            <article class="article">
              <figure>
                <a href="<?php the_permalink(); ?>">
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="article" class="d-flex w-100" />
                </a>
                <div class="category-time">
                 <?php
                  $category = get_the_category(); 
                  ?>
                  <a href="<?php echo site_url('/category/') . $category[0]->slug; ?>">
                  <?php
                    echo $category[0]->cat_name;
                    ?>
                  </a>
                  <span> <?php echo get_the_date(); ?> </span>
                </div>
              </figure>
              <h2>
                <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
              </h2>
              <p> <?php echo get_the_excerpt(); ?></p>
            </article>