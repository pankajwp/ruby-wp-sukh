<?php
/**
 * Template Name: Blog Grid
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 * @author Kenji
 */

/* get side-bar position. */
$_get_sidebar = book_junky_archive_sidebar( 'archive_layout' );
$blog_column = $sidebar_col = '';

if($_get_sidebar == 'is-sidebar-full' ) {

    $blog_column = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
    $sidebar_col = 'hidden-xs hidden-sm hidden-md hidden-lg';
} 

else {

    if( is_active_sidebar( 'sidebar-blog' ) ){

        $blog_column = 'col-xs-12 col-sm-7 col-md-8 col-lg-8';
        $sidebar_col = 'col-xs-12 col-sm-5 col-md-4 col-lg-4';
    }
    else{

        $blog_column = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
        $sidebar_col = 'hidden-xs hidden-sm hidden-md hidden-lg';
    }
}

get_header(); ?>

<section id="primary" class="container blog-grid <?php echo esc_attr($_get_sidebar); ?>">
    <div class="row">
        <?php if($_get_sidebar == 'is-sidebar-left'){ ?>
            
            <div class="<?php echo esc_html($sidebar_col);?>">
                <?php get_sidebar(); ?>
            </div>

        <?php }?>
        <div class="<?php echo esc_html($blog_column);?>">
            <main id="main" class="site-main">

                <?php global $wp_query, $paged;
                
                $wp_query->query('post_type=post&showposts='.get_option('posts_per_page').'&paged='.$paged);

                echo '<div class="blog-default-title">' . esc_html__('Recent News','book-junky') . '</div>';
                    $i = 0;
                    $post_count = $wp_query ->post_count;
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();

                            if( (($i%2) == 0) || ($i == 0) ) {
                                echo "<div class='row'>";
                            }

                                echo '<div class="col-xs-12 col-md-6">';
                                    get_template_part( 'single-templates/content-grid/content', get_post_format() );
                                echo '</div>';

                            if( (($i%2) == 1) || ($i == ($post_count - 1 )) ) {
                                echo "</div>";
                            }
                            $i++;
                        endwhile; // end of the loop.

                        /* blog nav. */
                        book_junky_paging_nav();

                    else :
                        /* content none. */
                        get_template_part( 'single-templates/content', 'none' );

                    endif; ?>
            </main><!-- #content -->
        </div>

        <?php if($_get_sidebar == 'is-sidebar-right'){ ?>
            
            <div class="<?php echo esc_html($sidebar_col);?>">
                <?php get_sidebar(); ?>
            </div>

        <?php }?>

    </div>
</section><!-- #primary -->

<?php get_footer(); ?>