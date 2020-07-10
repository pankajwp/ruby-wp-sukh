<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">

			<?php the_content(); ?>

	</div><!-- .entry-content -->
	<footer class="edit-page">

			<?php edit_post_link( esc_html__( 'Edit', 'book-junky' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->
