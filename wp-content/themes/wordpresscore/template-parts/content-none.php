<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wordpresscore
 */

?>

<div class="no-results not-found">
  <div class="not-found__title"><?php esc_html_e('Nothing Found', 'wordpresscore'); ?></div>

  <div class="not-found__content">
      <?php
      if (is_search()) : ?>
        <p class="not-found__text"><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wordpresscore'); ?></p>
          <?php get_search_form();
      else : ?>
        <p class="not-found__text"><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wordpresscore'); ?></p>
          <?php get_search_form();
      endif; ?>
  </div>
</div>
