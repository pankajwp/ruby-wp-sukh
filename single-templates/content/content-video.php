<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

	<div class="wrap-left">
		
		<?php book_junky_post_video(); ?>
	</div>

	<div class="wrap-right">

		<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

		<?php book_junky_archive_detail(); ?>
		
		<p><?php echo wp_trim_words( get_the_excerpt(), '25', ''); ?></p>

		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'book-junky' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>

		<?php book_junky_archive_tag(); ?>
		<?php book_junky_edit_link(); ?>

		<footer class="entry-footer">
			<a href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'book-junky') ?></a>
			<?php echo book_junky_get_like(); ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
