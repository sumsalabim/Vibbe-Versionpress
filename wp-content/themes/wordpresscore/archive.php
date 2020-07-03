<?php include 'includes/header.php'; ?>
  <div class="banner banner--page banner--center banner--blog">
    <img class="banner__img" src="<?= get_template_directory_uri(); ?>/assets/img/blog.jpg"/>
    <div class="banner__wrapper">
      <div class="container container-relative">
        <div class="banner__content">
          <div class="banner__title">
              <?php the_archive_title(); ?>
          </div>
          <div class="banner__desc">
              <?php the_archive_description(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="section blog blog--news">
    <div class="blog-container">
      <div class="blog-content">
        <div class="blog-news">
          <div class="blog-list list-unstyled">
              <?php if (have_posts()) : ?>
                  <?php
                  while (have_posts()) :
                      the_post();
                      get_template_part('template-parts/content', get_post_type());
                  endwhile;
                  the_posts_navigation();
              else :
                  get_template_part('template-parts/content', 'none');
              endif;
              ?>
          </div>
        </div>
        <div class="blog-sidebar">
            <?php get_sidebar(); ?>

        </div>
      </div>
    </div>
  </section>
<?php
get_footer();

