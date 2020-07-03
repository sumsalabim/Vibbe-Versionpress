<?php
/* Template Name: company*/
$pageName = 'company';
$title = "company";
?>
<?php include 'includes/header.php'; ?>
  <div class="banner banner--page ">
    <img class="banner__img" src="<?= get_template_directory_uri(); ?>/assets/img/blog.jpg"/>
    <div class="banner__wrapper">
      <div class="container container-relative">
        <div class="banner__content">
          <div class="banner__title">
              <?php the_title(); ?>
          </div>
          <div class="banner__desc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua
          </div>
        </div>
        <div class="banner__graphic">
          <img src="<?= get_template_directory_uri(); ?>/assets/img/graphic.png"/>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="section__content">
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-6 col-space">
            <div class="section__title">Lorem ipsum solor it</div>
            <div class="section__desc">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
              ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
              fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
              mollit anim id est laborum.
            </div>
            <div class="section__list">
              <ul class="list list-unstyled">
                <li class="list__item">Lorem ipsum dolor sit amet</li>
                <li class="list__item">Excepteur sint occaecat cupidatat non proident</li>
                <li class="list__item">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                  fugiat nulla pariatur</li>
              </ul>
            </div>
            <div class="section__action">
              <a href="#" class="btn btn--primary"><span class="btn__text">Lorem ipsum</span></a>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 hidden-md-down">
            <div class="section__img">
              <img src="<?= get_template_directory_uri(); ?>/assets/img/image1.webp"/>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
<?php
get_footer();

