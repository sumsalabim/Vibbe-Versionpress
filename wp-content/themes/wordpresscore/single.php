<?php
/* Template Name: single-post*/
$pageName = 'single-post';
$title = "single-post";
?>
<?php include 'includes/header.php'; ?>
<?php
while (have_posts()) :
    the_post(); ?>
  <section class="blog blog--single">
    <div class="blog-container blog-container--single">
      <div class="blog-content">
        <div class="blog-news">
          <article class="article">
            <div class="article__image">
                <?php the_post_thumbnail(); ?>
              <div class="article__title">
                <div class="article__category blog-category">
                    <?php
                    $args = array('hide_empty' => '0');
                    $category_detail = get_the_category($post->ID);
                    $categories = get_the_category($category_detail);
                    foreach ($category_detail as $category) {
                        $category_background_color = get_field('category_background_color', 'category_' . $category->term_id);
                        $category->name;
                        echo '<a class="category-flag" style="background: ' . $category_background_color . '" href="' . get_category_link($category->term_id) . '" title="' . sprintf(__("View all posts in %s"), $category->name) . '" ' . '>' . $category->name . '</a> ';
                    }
                    ?>

                </div>
                  <?php the_title(); ?>
              </div>
            </div>
            <div class="article__top">
              <div class="article__date">
                <i class="zmdi zmdi-time"></i> <?php $post_date = get_the_date('d.m.Y');
                  echo $post_date; ?>
              </div>
              <div class="article__share">
                  <?php echo do_shortcode('[ss_social_share]'); ?>
              </div>
            </div>
            <div class="article__content">
                <?php the_content(); ?>
<!--              <div class="article__tags">-->
<!--                  --><?php
//                  $post_id = get_the_ID();
//
//                  if (is_array(get_the_tags($post_id)) || is_object(get_the_tags($post_id))) :
//                      foreach (get_the_tags($post_id) as $tag) {
//                          echo '<div><a href="' . get_tag_link($tag->term_id) . '" title="' . $tag->name . '" class="' . $tag->slug . '">' . $tag->name . '</a></div> ';
//                      }
//                  endif;
//                  ?>
<!--              </div>-->
            </div>
            <div class="article__comment comment">
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </div>

          </article>
        </div>
        <div class="blog-sidebar">
            <?php get_sidebar(); ?>
        </div>
      </div>

    </div>
  </section>
<?php
endwhile; // End of the loop.
?>


<?php
get_footer();
