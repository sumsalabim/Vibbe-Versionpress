<?php
/* Template Name: privacy-policy*/
$pageName = 'privacy-policy';
$title = "privacy-policy";
?>
<?php include 'includes/header.php'; ?>
  <div class="banner banner--page banner--center">
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
<?php
while (have_posts()) :
    the_post(); ?>
  <section class="section section--light">
    <div class="container-md">
      <div class="section__content">
        <div class="cms">
            <?php the_content(); ?>
        </div>
      </div>
    </div>
  </section>
<?php
endwhile; // End of the loop. ?>
<?php
get_footer();

