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

	<div class="wrap-video">
		
		<?php book_junky_post_video(); ?>

		<footer class="entry-footer">

			<a href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'book-junky') ?></a>
			
			<?php echo book_junky_get_like(); ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
