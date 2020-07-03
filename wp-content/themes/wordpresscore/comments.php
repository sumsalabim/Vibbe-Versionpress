<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wordpresscore
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments comments-area">
	<?php
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$wordpresscore_comment_count = get_comments_number();
			if ( '1' === $wordpresscore_comment_count ) {
          printf(
              esc_html( $wordpresscore_comment_count) . ' Comment '
          );
			} else {
          printf(
              esc_html( $wordpresscore_comment_count) . ' Comments '
          );
			}
			?>
		</h2>

		<?php the_comments_navigation(); ?>

		<ul class="comments-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ul',
				'short_ping' => true,
          'callback' => 'better_comments'
			) );
			?>
		</ul>

		<?php
		the_comments_navigation();

		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'wordpresscore' ); ?></p>
			<?php
		endif;

	endif;

	comment_form();
	?>

</div>
