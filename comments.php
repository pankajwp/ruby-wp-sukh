<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
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

<div id="comments" class="comments-area">

	<?php
	$form = array(
				'id_form'           => 'commentform',
				'id_submit'         => 'submit',
				'title_reply'       => esc_html__( 'Leave Comment', 'book-junky'),
				'cancel_reply_link' => esc_html__( 'Cancel Comment', 'book-junky'),
				'label_submit'      => esc_html__( 'Send Comment', 'book-junky'),
				'comment_notes_before' => '',
				'fields' => apply_filters( 'comment_form_default_fields', array(

						'author' =>
						'<div class="row"><div class="comment-form-author col-md-6 col-sm-12 col-xs-12">'.
						'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
						'" size="30" placeholder="'.esc_html__('Your Name', "book-junky").'"/></div>',

						'email' =>
						'<div class="comment-form-email col-md-6 col-sm-12 col-xs-12">'.
						'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
						'" size="30" placeholder="'.esc_html__('Email', "book-junky").'"/></div></div>',
				)
				),
				'comment_field' =>  '<div class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.esc_html__('Comment', "book-junky").'" aria-required="true">' .
				'</textarea></div>',
		);
	comment_form($form); ?>

	<?php if ( have_comments() ) : ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 85,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php book_junky_comment_nav(); ?>

	<?php endif; // have_comments() ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'book-junky' ); ?></p>
	<?php endif; ?>

</div><!-- .comments-area -->
