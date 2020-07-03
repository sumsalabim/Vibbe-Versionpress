<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wordpresscore
 */

?>

<article class="blog-item" id="post-<?php the_ID(); ?>">
  <a href="<?php the_permalink(); ?>" class="blog-item__image">
      <?php the_post_thumbnail(); ?>
  </a>
  <div class="blog-item__wrapper">
    <div class="blog-item__content">
      <div class="blog-category">
          <?php
          $args = array('hide_empty' => '0');
          $category_detail = get_the_category($post->ID);
          $categories = get_the_category($category_detail);
          foreach ($category_detail as $category) {
              $category_background_color = get_field('category_background_color', 'category_' . $category->term_id);
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
</article><!-- #post-<?php the_ID(); ?> -->
