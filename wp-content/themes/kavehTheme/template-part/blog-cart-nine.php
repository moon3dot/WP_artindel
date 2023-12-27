
              <article class="article-sixteen">
                  <figure class="mb-0 position-relative">
                    <a href="<?php the_permalink(); ?>">
                      <img src="<?php the_post_thumbnail_url('full'); ?>" alt="article" class="w-100 d-block" />
                    </a>
                  </figure>
                  <div class="content position-relative">
                    <div class="info bg-white">
                      <h2 class="text-truncate">
                        <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
                      </h2>
                      <p class="mb-0"><?php echo get_the_excerpt(); ?></p>
                    </div>
                    <ul class="d-flex align-items-center justify-content-between text-white">
                      <li><?php echo get_the_date(); ?></li>
                      <?php
                        $category = get_the_category(); 
                        ?>
                       <a href="<?php echo site_url('/category/') . $category[0]->slug; ?>"> <li> <b> دسته بندی: </b> <?php echo $category[0]->cat_name; ?> </li></a>
                    </ul>
                  </div>
                </article>
