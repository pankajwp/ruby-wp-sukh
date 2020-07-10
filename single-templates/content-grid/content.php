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

global $opt_meta_options;

$post_layout = !empty($opt_meta_options['post_layout']) ? $opt_meta_options['post_layout'] : '1';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	<?php 
		switch ($post_layout) {
			case '1': ?>

				<div class="wrap-layout-1">

					<div class="wrap-thumbnail">
						<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('large'); ?>
						</a>
					</div>
					
					<div class="wrap-content">

						<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

						<?php book_junky_archive_detail(); ?>
					</div>

					<footer class="entry-footer">

						<a href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'book-junky') ?></a>

						<?php echo book_junky_get_like(); ?>
					</footer><!-- .entry-footer -->
				</div>
			<?php break;
			
			case '2': ?>
				<div class="wrap-layout-2">

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
			<?php break;
		}
	?>
</article><!-- #post-## -->
