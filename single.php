<?php
/**
    * The Template for displaying all single posts
    * @package CMSSuperHeroes
    * @subpackage CMS Theme
    * @since 1.0.0
*/

/* get side-bar position. */
$_get_sidebar = book_junky_post_sidebar();

/* get side-bar position. */

$blog_column = $sidebar_col = '';
$_get_sidebar = book_junky_archive_sidebar( 'single_layout' );

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

<div id="primary" class="container single-blog <?php echo esc_attr($_get_sidebar); ?>">
    <div class="row">
        <?php if($_get_sidebar == 'is-sidebar-left'){ ?>
            <div class="<?php echo esc_html($sidebar_col);?>">
                <?php get_sidebar(); ?>
            </div>
        <?php }?>
        <div class="<?php echo esc_attr($blog_column); ?>">
            <main id="main" class="site-main" role="main">
                <?php
                    while ( have_posts() ) : the_post();
                    book_junky_setPostViews(get_the_ID());
                    get_template_part( 'single-templates/single/content', get_post_format() );
                    book_junky_single_comment(); endwhile;
                ?>
            </main>
        </div>
        <?php if($_get_sidebar == 'is-sidebar-right'){ ?>
            <div class="<?php echo esc_html($sidebar_col);?>">
                <?php get_sidebar(); ?>
            </div>
        <?php }?>
    </div>
</div>
<?php get_footer(); ?>