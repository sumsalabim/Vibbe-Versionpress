<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wordpresscore
 */

?>
<!--<footer class="footer">-->
<!--  <div class="footer__container">-->
<!--    <div class="footer__content">-->
<!--      <div class="row">-->
<!--        <div class="col-md-12 col-lg-3 order-sm-0 order-0">-->
<!--          <div class="footer__logo">-->
<!--              --><?php //the_custom_logo(); ?>
<!--          </div>-->
<!--          <div class="footer__desc">-->
<!--            It is a long established fact that a reader will be distracted by the readable content of a page when-->
<!--            looking at its layout.-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="col order-2 footer__column">-->
<!--          <div class="footer__block">-->
<!--            <div class="footer__title">-->
<!--              Szybkie menu-->
<!--            </div>-->
<!--            <ul class="footer__list">-->
<!--              <li class="footer__item"><a href="#" class="footer__link">Strona Główna</a></li>-->
<!--              <li class="footer__item"><a href="#" class="footer__link">Oferta</a></li>-->
<!--              <li class="footer__item"><a href="#" class="footer__link">Blog</a></li>-->
<!--              <li class="footer__item"><a href="#" class="footer__link">Kontakt</a></li>-->
<!--            </ul>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="col order-3 footer__column">-->
<!--          <div class="footer__block">-->
<!--            <div class="footer__title">-->
<!--              Oferta-->
<!--            </div>-->
<!--            <ul class="footer__list">-->
<!--              <li class="footer__item"><a href="#" class="footer__link">Element listy 1</a></li>-->
<!--              <li class="footer__item"><a href="#" class="footer__link">Element listy 2</a></li>-->
<!--              <li class="footer__item"><a href="#" class="footer__link">Element listy 3</a></li>-->
<!--              <li class="footer__item"><a href="#" class="footer__link">Element listy 4</a></li>-->
<!---->
<!--            </ul>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="col order-4 footer__column">-->
<!--          <div class="footer__block">-->
<!--            <div class="footer__title">-->
<!--              Kontakt-->
<!--            </div>-->
<!--            <ul class="footer__list">-->
<!--              <li class="footer__item"><span>Vibbe</span></li>-->
<!--              <li class="footer__item"><span>ul. Litewska 12</span></li>-->
<!--              <li class="footer__item"><span>35-012 Rzeszów</span></li>-->
<!--              <li class="footer__item"><a href="tel:987654321" class="footer__link footer__link--smp">987 654 321</a>-->
<!--              </li>-->
<!--            </ul>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="col-sm-12 col-md-2 order-1 order-md-5">-->
<!--          <div class="footer__block">-->
<!--            <div class="footer__title footer__title--social">-->
<!--              Socials-->
<!--            </div>-->
<!--            <ul class="footer__list footer__list--social">-->
<!--              <li class="footer__item"><a href="#" target="_blank" class="footer__link footer__link--social"><i-->
<!--                    class="zmdi zmdi-facebook"></i></a></li>-->
<!--              <li class="footer__item"><a href="#" target="_blank" class="footer__link footer__link--social"><i-->
<!--                    class="zmdi zmdi-instagram"></i></a></li>-->
<!--              <li class="footer__item"><a href="#" target="_blank" class="footer__link footer__link--social"><i-->
<!--                    class="zmdi zmdi-twitter"></i></a></li>-->
<!--            </ul>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</footer>-->
<!--<div class="copyright">-->
<!--  <div class="copyright__container">-->
<!--    <div class="copyright__left">-->
<!--      Vibbe S.C © <span class="copyright__year"></span> -  All rights reserved-->
<!--    </div>-->
<!--    <div class="copyright__right">-->
<!--      Projekt wykonany przez: <a href="https://vibbe.pl" class="copyright__link">vibbe.pl</a>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wordpresscore
 */

?>
<?php
$footer = array(
    'post_type' => 'Footer',
    'order' => 'DESC',
    'supports' => 'thumbnail'
);
$footer_loop = new WP_Query($footer);
if ($footer_loop->have_posts()) : ?>
    <?php while ($footer_loop->have_posts()) :
        $footer_loop->the_post($footer); ?>
    <footer class="footer">
      <div class="container">
        <div class="footer__content">
          <div class="row">
            <div class="col-md-12 col-lg-3 order-sm-0 order-0 footer__change">
              <div class="footer__logo">
                  <?php
                  $footerLogo = get_field('column_1');
                  if ($footerLogo): ?>
                    <img src="<?php echo esc_attr($footerLogo['footer_logo']); ?>"/>
                  <?php endif; ?>
                  <?php
                  $footerColumn5 = get_field('column_5');
                  if (have_rows('column_5')) : ?>
                      <?php while (have_rows('column_5')) :the_row();
                          if (have_rows('column_item')): ?>
                            <ul class="footer__list footer__list--social">
                                <?php while (have_rows('column_item')) : the_row(); ?>
                                  <li class="footer__item"><a
                                      href="<?php the_sub_field('footer_column_item_link'); ?>" target="_blank"
                                      class="footer__link footer__link--social"><i
                                        class="zmdi zmdi-<?php the_sub_field('footer_column_item_icon'); ?>"></i></a>
                                  </li>

                                <?php
                                endwhile; ?>
                            </ul>
                          <?php endif; ?>
                      <?php endwhile; ?>
                  <?php endif; ?>
              </div>
              <ul class="footer__list footer__list--contact">
                  <?php
                  $footerColumn1 = get_field('column_1');
                  if ($footerColumn1): ?>
                    <li class="footer__item"><a
                        href="tel:<?php echo esc_attr($footerColumn1['footer_phone_number']); ?>"
                        class="footer__link"><i
                          class="zmdi zmdi-phone-in-talk"></i><?php echo esc_attr($footerColumn1['footer_phone_number']); ?>
                      </a></li>
                    <li class="footer__item"><a href="mailto:<?php echo esc_attr($footerColumn1['footer_email']); ?>"
                                                class="footer__link"><i
                          class="zmdi zmdi-email"></i><?php echo esc_attr($footerColumn1['footer_email']); ?></a></li>
                    <li class="footer__item footer__item--start">
                      <div class="footer__icon"><i class="zmdi zmdi-pin"></i></div>
                      <div class="footer__multiline">
                        <span><?php echo esc_attr($footerColumn1['footer_address_line_1']); ?></span>
                        <span><?php echo esc_attr($footerColumn1['footer_address_line_2']); ?></span>
                      </div>
                    </li>
                  <?php endif; ?>

              </ul>
            </div>
            <div class="col order-2 footer__column">
              <div class="footer__block">
                  <?php
                  $footerColumn2 = get_field('column_2');
                  if (have_rows('column_2')) : ?>
                    <div class="footer__title">
                        <?php echo esc_attr($footerColumn2['footer_column_title']); ?>
                    </div>
                      <?php while (have_rows('column_2')) :the_row();
                          if (have_rows('column_item')): ?>
                            <ul class="footer__list">
                                <?php while (have_rows('column_item')) : the_row(); ?>
                                  <li class="footer__item"><a
                                      href="<?php the_sub_field('footer_column_item_link'); ?>"
                                      class="footer__link"><?php the_sub_field('footer_column_item_title'); ?></a>
                                  </li>
                                <?php
                                endwhile; ?>
                            </ul>
                          <?php endif; ?>
                      <?php endwhile; ?>
                  <?php endif; ?>
              </div>
            </div>
            <div class="col order-2 footer__column">
              <div class="footer__block">
                  <?php
                  $footerColumn3 = get_field('column_3');
                  if (have_rows('column_3')) : ?>
                    <div class="footer__title">
                        <?php echo esc_attr($footerColumn3['footer_column_title']); ?>
                    </div>
                      <?php while (have_rows('column_3')) :the_row();
                          if (have_rows('column_item')): ?>
                            <ul class="footer__list">
                                <?php while (have_rows('column_item')) : the_row(); ?>
                                  <li class="footer__item"><a
                                      href="<?php the_sub_field('footer_column_item_link'); ?>"
                                      class="footer__link"><?php the_sub_field('footer_column_item_title'); ?></a>
                                  </li>
                                <?php
                                endwhile; ?>
                            </ul>
                          <?php endif; ?>
                      <?php endwhile; ?>
                  <?php endif; ?>
              </div>
            </div>
            <div class="col order-3 footer__column">
              <div class="footer__block">
                  <?php
                  $footerColumn4 = get_field('column_4');
                  if (have_rows('column_4')) : ?>
                    <div class="footer__title">
                        <?php echo esc_attr($footerColumn4['footer_column_title']); ?>
                    </div>
                      <?php while (have_rows('column_4')) :the_row();
                          if (have_rows('column_item')): ?>
                            <ul class="footer__list">
                                <?php while (have_rows('column_item')) : the_row(); ?>
                                  <li class="footer__item"><a
                                      href="<?php the_sub_field('footer_column_item_link'); ?>"
                                      class="footer__link"><?php the_sub_field('footer_column_item_title'); ?></a>
                                  </li>
                                <?php
                                endwhile; ?>
                            </ul>
                          <?php endif; ?>
                      <?php endwhile; ?>
                  <?php endif; ?>
              </div>
            </div>
            <div class="col-sm-12 col-md-2 order-1 order-md-5 footer__social">
              <div class="footer__block">
                  <?php
                  $footerColumn6 = get_field('column_5');
                  if (have_rows('column_5')) : ?>
                    <div class="footer__title">
                        <?php echo esc_attr($footerColumn6['footer_column_title']); ?>
                    </div>
                      <?php while (have_rows('column_5')) :the_row();
                          if (have_rows('column_item')): ?>
                            <ul class="footer__list footer__list--social">
                                <?php while (have_rows('column_item')) : the_row(); ?>
                                  <li class="footer__item"><a
                                      href="<?php the_sub_field('footer_column_item_link'); ?>" target="_blank"
                                      class="footer__link footer__link--social"><i
                                        class="zmdi zmdi-<?php the_sub_field('footer_column_item_icon'); ?>"></i></a>
                                  </li>

                                <?php
                                endwhile; ?>
                            </ul>
                          <?php endif; ?>
                      <?php endwhile; ?>
                  <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright">
        <div class="container">
          <div class="copyright__left">
              <?php  the_field('copyright');?><span class="copyright__year"></span> Vibbe S.C
          </div>
          <div class="copyright__right">
            Projekt wykonany przez: <a href="https://vibbe.pl" class="copyright__link">vibbe.pl</a>
          </div>
        </div>
      </div>
    </footer>
    <?php endwhile; ?>
<?php endif;
wp_reset_postdata(); ?>

<?php wp_footer(); ?>
<script src="<?= get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/assets/js/plugins.js"></script>
<script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/assets/js/base.js"></script>
<script src="<?= get_template_directory_uri(); ?>/assets/js/main.js"></script>
<script src="<?= get_template_directory_uri(); ?>/assets/js/wow.min.js"></script>
<script>
    new WOW().init();
</script>
</body>
</html>
