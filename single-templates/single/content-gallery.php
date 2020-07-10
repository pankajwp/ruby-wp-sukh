<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php book_junky_post_gallery(); ?>

	<header class="entry-header">

		<h3 class="entry-title"><?php the_title(); ?></h3>

		<div class="entry-meta">

			<?php book_junky_post_detail(); ?>

		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
		/* translators: %s: Name of current post */
		the_content( sprintf(
			__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'book-junky' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		) );

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'book-junky' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php book_junky_single_tag(); ?>
</article><!-- #post-## -->
