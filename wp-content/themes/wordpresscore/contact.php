<?php
/* Template Name: contact*/
$pageName = 'contact';
$title = "contact";
?>
<?php include 'includes/header.php'; ?>
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
    <section class="section section--contact">
        <div class="container">
            <div class="section__content contact">
                <div class="row">
                    <div class="col-md-12 col-lg-5">
                        <div class="contact__form">
                          <div class="contact__title">
                            Napisz do nas
                          </div>
                            <div class="contact__form-content">
                                <?= do_shortcode('[cf7form cf7key="bez-tytulu"]') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-7">
                        <div class="contact__info">
                            <div class="contact__title">
                                Informacje kontaktowe
                            </div>
                          <div class="contact__content">
                            <ul class="contact__list list-unstyled">
                              <li class="contact__item">
                                <div class="contact__icon">
                                  <i class="zmdi zmdi-balance"></i>
                                </div>
                                <span class="contact__text">Vibbe</span></li>
                              <li class="contact__item">
                                <div class="contact__icon">
                                  <i class="zmdi zmdi-city"></i>
                                </div>
                                <span class="contact__text">Litewska 12<br>35-302 Rzeszów
                                </span>
                              </li>
                              <li class="contact__item">
                                <div class="contact__icon">
                                 <i class="zmdi zmdi-phone"></i>
                                </div>
                                <a class="contact__link"
                                   href="tel:987987987">987 987 987</a>
                              </li>
                              <li class="contact__item">
                                <div class="contact__icon">
                                  <i class="zmdi zmdi-phone"></i>
                                </div>
                                <a class="contact__link"
                                   href="tel:987987987>">987 987 987</a>
                              </li>
                              <li class="contact__item">
                                <div class="contact__icon">
                                  <i class="zmdi zmdi-email"></i>
                                </div>
                                <a class="contact__link" href="mailto:contact@vibbe.pl">contact@vibbe.pl</a>
                              </li>
                            </ul>
                            <ul class="contact__list list-unstyled">
                              <li class="contact__item">
                                <div class="contact__icon">
                                  <i class="zmdi zmdi-accounts-list"></i>
                                </div>
                                <span class="contact__text">NIP: 127461782461</span></li>
                              <li class="contact__item">
                                <div class="contact__icon">
                                  <i class="zmdi zmdi-library"></i>
                                </div>
                                <span class="contact__text">REGON: 541251252</span></li>
                            </ul>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact__map">
            <a
                href="https://www.google.pl/maps/place/TRICOL+sp.+z+o.o+s.k./@49.9926763,22.0067532,17z/data=!3m1!4b1!4m5!3m4!1s0x473cfa1ce50d8c85:0xe4355e84e2aa96a0!8m2!3d49.9926729!4d22.0089419"
                target="_blank" class="btn btn-primary btn-map"><span class="btn__text">
                    Prowadź do celu
                </span></a>
            <div id="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10251.349335727644!2d22.0348332!3d50.0331438!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3b5105cb1918ed34!2sVibbe!5e0!3m2!1spl!2spl!4v1585726007160!5m2!1spl!2spl"
                      width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </section>
<?php
get_footer();

