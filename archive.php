<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, CMS Theme already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
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

<section id="primary" class="container blog-default <?php echo esc_attr($_get_sidebar); ?>">
    <div class="row">
        <?php if($_get_sidebar == 'is-sidebar-left'){ ?>
            
            <div class="<?php echo esc_html($sidebar_col);?>">
                <?php get_sidebar(); ?>
            </div>

        <?php }?>
        <div class="<?php echo esc_html($blog_column);?>">
            <main id="main" class="site-main">

                <?php
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

        <?php if($_get_sidebar == 'is-sidebar-right'){ ?>
            
            <div class="<?php echo esc_html($sidebar_col);?>">
                <?php get_sidebar(); ?>
            </div>

        <?php }?>

    </div>
</section><!-- #primary -->

<?php get_footer(); ?>