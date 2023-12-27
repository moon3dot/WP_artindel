            <article class="article-five">
                <figure class="position-relative mb-4">
                  <a href="<?php the_permalink(); ?>">
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="article" class="w-100 d-block radius-15" />
                  </a>
                  <ul class="position-absolute top-50 translate-middle-y">
                    <li class="text-center">
                      <?php
                      $category = get_the_category(); 
                      ?>
                      <a href="<?php echo site_url('/category/') . $category[0]->slug; ?>" class="d-block"><?php
                    echo $category[0]->cat_name;
                    ?></a>
                    </li>
                    <li class="text-center"> <?php echo get_the_date(); ?></li>
                  </ul>
                </figure>
                <h2>
                  <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
                </h2>
                <p class="mb-0"> <?php echo get_the_excerpt(); ?></p>
              </article>