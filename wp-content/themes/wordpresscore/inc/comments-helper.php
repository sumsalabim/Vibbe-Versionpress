<?php
if (!function_exists('better_commets')):
    function better_comments($comment, $args, $depth)
    {
        ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

      <div class="comment__content">
        <div class="comment__avatar">
            <?php
            // Display avatar unless size is set to 0
            if ($args['avatar_size'] != 0) {
                $avatar_size = !empty($args['avatar_size']) ? $args['avatar_size'] : 70; // set default avatar size
                echo get_avatar($comment, $avatar_size);
            }
            ?>
        </div>
        <div class="comment__block">
            <?php if ($comment->comment_approved == '0') : ?>
              <em><?php esc_html_e('Your comment is awaiting moderation.', 'wordpresscore') ?></em>
              <br/>
            <?php endif; ?>
          <div class="comment__top">
            <div class="comment__by">
                <?php echo get_comment_author() ?>
            </div>
            <span class="comment__date"><?php printf(/* translators: 1: date and time(s). */
                    esc_html__('%1$s at %2$s', 'wordpresscore'), get_comment_date(), get_comment_time()) ?>
            </span>
          </div>
          <div class="comment__text">
              <?php comment_text() ?>
          </div>
          <div class="comment__reply">
            <i class="zmdi zmdi-mail-reply"></i>
              <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
          </div>

        </div>
      </div>
        <?php
    }
endif;