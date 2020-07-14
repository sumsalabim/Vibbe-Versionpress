<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PizzaLondonTyczyn
 */
/* Template Name: index*/
$pageName = 'index';
$title = "index";
?>
<?php include 'includes/header.php'; ?>
  <div class="banner">
    <img class="banner__img" src="<?= get_template_directory_uri(); ?>/assets/img/image1.webp"/>
    <div class="banner__wrapper">
      <div class="container container-relative">
        <div class="banner__content">
          <div class="banner__title">
            The standard Lorem Ipsum passage versionpress
          </div>
          <div class="banner__desc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur.
          </div>
          <div class="banner__action">
            <a href="#" class="btn btn--primary"><span class="btn__text">Get started</span></a>
          </div>
        </div>
        <div class="banner__graphic">
          <img src="<?= get_template_directory_uri(); ?>/assets/img/graphic.png"/>
        </div>
      </div>
    </div>
  </div>
  <div class="section section--first">
    <div class="container">
      <div class="section__content">
        <div class="row align-items-center">
          <div class="col-md-6 col-lg-6 col-space hidden-md-down">
            <div class="section__img">
              <img src="<?= get_template_directory_uri(); ?>/assets/img/image1.webp"/>
            </div>
          </div>
          <div class="col-md-12 col-lg-6 ">
            <div class="section__title">Lorem ipsum solor it</div>
            <div class="section__subtitle">Our system is crafted to provide best features for you</div>
            <div class="section__desc">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex
                ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.
              </p>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex
                ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt
                mollit anim id est laborum.
              </p>
            </div>
            <div class="section__action">
              <a href="#" class="btn btn--primary"><span class="btn__text">Lorem ipsum</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section section--center section--light">
    <div class="container">
      <div class="section__content">
        <div class="section__title">Lorem ipsum solor it</div>
        <div class="section__desc">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
          dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
          ea commodo consequat.
        </div>
        <div class="cards cards-xxs-1 cards-xs-2 cards-sm-2 cards-md-2 cards-lg-3">
          <div class="card">
            <div class="card__icon">
              <img src="<?= get_template_directory_uri(); ?>/assets/img/globe.png"/>
            </div>
            <div class="card__title">
              Lorem ipsum
            </div>
            <div class="card__desc">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
              ea commodo consequat.
            </div>
          </div>
          <div class="card card--dark">
            <div class="card__icon">
              <img src="<?= get_template_directory_uri(); ?>/assets/img/globe.png"/>
            </div>
            <div class="card__title">
              Lorem ipsum
            </div>
            <div class="card__desc">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
              ea commodo consequat.
            </div>
          </div>
          <div class="card">
            <div class="card__icon">
              <img src="<?= get_template_directory_uri(); ?>/assets/img/globe.png"/>
            </div>
            <div class="card__title">
              Lorem ipsum
            </div>
            <div class="card__desc">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
              ea commodo consequat.
            </div>
          </div>
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
  <div class="section section--light section--center">
    <div class="container">
      <div class="section__content">
        <div class="section__title">Lorem ipsum solor it</div>
        <div class="section__desc">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
          dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
          ea commodo consequat.
        </div>
        <div class="section__action">
          <a href="#" class="btn btn--outline-secondary"><span class="btn__text btn__text--dark">Sample text</span></a>
        </div>
      </div>
    </div>
  </div>

<?php
get_footer();
