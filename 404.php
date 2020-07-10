<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div id="primary" class="container">

	<main id="main" class="site-main" role="main">

		<section class="error-404 not-found">
			
			<h2 class="page404-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'book-junky' ); ?></h2>

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'book-junky' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->
	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
