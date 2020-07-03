<?php
/* Template Name: blog*/
$pageName = 'blog';
$title = "blog";
?>
<?php include 'includes/header.php'; ?>
  <div class="banner banner--page banner--center banner--blog">
    <img class="banner__img" src="<?= get_template_directory_uri(); ?>/assets/img/blog.jpg"/>
    <div class="banner__wrapper">
      <div class="container container-relative">
        <div class="banner__content">
          <div class="banner__title">
              <?php the_title(); ?>
          </div>
          <div class="banner__desc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="blog blog--featured">
    <div class="blog__wrapper" id="blogFeatured">

      <ul class="blog-list list-unstyled swiper-wrapper">
          <?php
          $posts = array(
              'post_type' => 'post',
              'order' => 'DESC',
          );
          $posts_loop = new WP_Query($posts);
          if ($posts_loop->have_posts()) : ?>
              <?php while ($posts_loop->have_posts()) : $posts_loop->the_post(); ?>
                  <?php if (get_field('is_featured_post')): ?>
                <li class="blog-item swiper-slide">
                  <a href="<?php the_permalink(); ?>" class="blog-link">
                      <?php the_post_thumbnail(); ?>
                    <div class="blog-item__content">
                      <div class="blog-category">
                        <?php
                          $args = array( 'hide_empty' => '0');
                          $category_detail = get_the_category($post->ID);
                          $categories = get_the_category($category_detail);
                          foreach($category_detail as $category) {
                              $category_background_color = get_field('category_background_color', 'category_'.$category->term_id);
                              $category->name;
                              echo '<span class="category-flag category-flag--blue" style="background: ' . $category_background_color . '" ' . '>' . $category->name . '</span> ';
                          }
                          ?>
                      </div>
                      <h2 class="blog-item__title"><?php the_title(); ?></h2>
                      <div class="blog-item__action">
                        <span>Read More</span>
                      </div>
                    </div>
                  </a>
                </li>
                  <?php endif; ?>
              <?php endwhile; ?>
          <?php endif;
          wp_reset_postdata(); ?>
      </ul>
    </div>
  </div>
  <section class="section blog blog--news">
    <div class="blog-container">
      <div class="blog-content">
        <div class="blog-news">
          <ul class="blog-list list-unstyled">
              <?php
              $posts = array(
                  'post_type' => 'post',
                  'order' => 'DESC',
                  'posts_per_page' => 12,
              );
              $posts_loop = new WP_Query($posts);
              if ($posts_loop->have_posts()) : ?>
                  <?php while ($posts_loop->have_posts()) : $posts_loop->the_post(); ?>
                  <li class="blog-item">
                    <a href="<?php the_permalink(); ?>" class="blog-item__image">
                        <?php the_post_thumbnail(); ?>
                    </a>
                    <div class="blog-item__wrapper">
                      <div class="blog-item__content">
                        <div class="blog-category">
                            <?php
                            $args = array( 'hide_empty' => '0');
                            $category_detail = get_the_category($post->ID);
                            $categories = get_the_category($category_detail);
                            foreach($category_detail as $category) {
                                $category_background_color = get_field('category_background_color', 'category_'.$category->term_id);
                                $category->name;
                                echo '<a class="category-flag category-flag--blue" style="background: ' . $category_background_color . '" href="' . get_category_link($category->term_id) . '" title="' . sprintf(__("View all posts in %s"), $category->name) . '" ' . '>' . $category->name . '</a> ';
                            }
                            ?>

                        </div>
                        <a href="<?php the_permalink(); ?>"><h2 class="blog-item__title"><?php the_title(); ?></h2></a>
                        <div class="blog-item__desc blog-item__desc--desktop">
                            <?php echo wp_trim_words(get_the_content(), 50, '...'); ?>
                        </div>
                        <div class="blog-item__desc blog-item__desc--mobile">
                            <?php echo wp_trim_words(get_the_content(), 20, '...'); ?>
                        </div>

                      </div>
                      <div class="blog-item__action">
                        <div class="blog-item__date">
                          <span><i class="zmdi zmdi-time"></i> <?php $post_date = get_the_date('d.m.Y');
                              echo $post_date; ?></span>
                        </div>
                        <a href="<?php the_permalink(); ?>">Read More</a>
                      </div>

                    </div>
                  </li>

                  <?php endwhile; ?>
              <?php endif;
              wp_reset_postdata(); ?>
          </ul>
        </div>
        <div class="blog-sidebar">
            <?php get_sidebar(); ?>

        </div>
      </div>
    </div>
  </section>
<?php
get_footer();

