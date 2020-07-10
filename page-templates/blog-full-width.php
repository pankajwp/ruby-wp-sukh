<?php
/**
 * Template Name: Blog Full Width
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 * @author Kenji
 */


get_header(); ?>

<section id="primary" class="container blog-default">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <main id="main" class="site-main">

                <?php global $wp_query, $paged;
                
                $wp_query->query('post_type=post&showposts='.get_option('posts_per_page').'&paged='.$paged);

                echo '<div class="blog-default-title">' . esc_html__('Recent News','book-junky') . '</div>';
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();

                        get_template_part( 'single-templates/content/content', get_post_format() );

                    endwhile; // end of the loop.

                    /* blog nav. */
                    book_junky_paging_nav();

                else :
                    /* content none. */
                    get_template_part( 'single-templates/content', 'none' );

                endif; ?>

            </main><!-- #content -->
        </div>

    </div>
</section><!-- #primary -->

<?php get_footer(); ?>