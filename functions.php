<?php
/**
 * Theme Framework functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

// Set up the content width value based on the theme's design and stylesheet.
if (!isset($content_width))
    $content_width = 625;

/**
 * CMS Theme setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * CMS Theme supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 *    custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since 1.0.0
 */
function book_junky_setup()
{

    // load language.
    load_theme_textdomain('book-junky', get_template_directory() . '/languages');

    // Adds title tag
    add_theme_support("title-tag");

    // Add woocommerce
    add_theme_support('woocommerce');

    // Adds custom header
    add_theme_support('custom-header');

    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support('automatic-feed-links');

    // This theme supports a variety of post formats.
    add_theme_support('post-formats', array('video', 'gallery'));

    // This theme uses wp_nav_menu() in one location.
    register_nav_menu('primary', esc_html__('Primary Menu', 'book-junky'));
    register_nav_menu('shortcode_menu', esc_html__('Shortcode Menu', 'book-junky'));

    /*
     * This theme supports custom background color and image,
     * and here we also set up the default background color.
     */
    add_theme_support('custom-background', array('default-color' => 'e6e6e6',));

    // This theme uses a custom image size for featured images, displayed on "standard" posts.
    add_theme_support('post-thumbnails');

    set_post_thumbnail_size(624, 9999); // Unlimited height, soft crop
    add_image_size('book_junky_450X500', 450, 500, true);
    add_image_size('book_junky_500X500', 500, 500, true);
    add_image_size('book_junky_230X300', 230, 300, true);
    add_image_size('book_junky_390X315', 390, 315, true);
    add_image_size('book_junky_450X265', 450, 265, true);

    update_option('thumbnail_size_w', 150);
    update_option('thumbnail_size_h', 120);
    update_option('thumbnail_crop', 1);

    update_option('medium_size_w', 415);
    update_option('medium_size_h', 380);
    update_option('medium_crop', 1);

    update_option('large_size_w', 400);
    update_option('large_size_h', 270);
    update_option('large_crop', 1);

    $catalog = array(
        'width' => '330',
        'height' => '500',
        'crop' => 1
    );

    $single = array(
        'width' => '300',
        'height' => '450',
        'crop' => 1
    );

    $thumbnail = array(
        'width' => '110',
        'height' => '170',
        'crop' => 1
    );

    /* Image sizes */
    update_option('shop_catalog_image_size', $catalog);       /* Product category thumbs */
    update_option('shop_single_image_size', $single);         /* Single product image */
    update_option('shop_thumbnail_image_size', $thumbnail);   /* Image gallery thumbs */

    /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, icons, and column width.
     */
    add_editor_style(array('assets/css/editor-style.css'));
}

add_action('after_setup_theme', 'book_junky_setup');


/**
 * Add elements for VC
 *
 * @author FOX
 */

add_action('vc_after_init', 'book_junky_after_vc_params');

function book_junky_after_vc_params()
{


    /*Custom Elements With Param CMS*/

    require(get_template_directory() . '/vc_params/vc_row.php');
    require(get_template_directory() . '/vc_params/vc_column.php');

    if (class_exists('CmsShortCode')) {

        /*Custom Elements With Param CMS*/

        require(get_template_directory() . '/vc_params/vc_custom_heading.php');
        require(get_template_directory() . '/vc_params/vc_widget_sidebar.php');

        /*New Elements*/

        require(get_template_directory() . '/inc/elements/cms_fancybox_single.php');
        require(get_template_directory() . '/inc/elements/cms_button.php');
        require(get_template_directory() . '/inc/elements/cms_carousel.php');
        require(get_template_directory() . '/inc/elements/cms_search_book.php');
        require(get_template_directory() . '/inc/elements/cms_latest_publications.php');
        require(get_template_directory() . '/inc/elements/cms_subscribe.php');
        require(get_template_directory() . '/inc/elements/cms_grid.php');
        require(get_template_directory() . '/inc/elements/cms_most_popular_book.php');
        require(get_template_directory() . '/inc/elements/cms_highest_rate.php');
        require(get_template_directory() . '/inc/elements/cms_your_bookshelf.php');
        require(get_template_directory() . '/inc/elements/cms_featured_authors.php');
        require(get_template_directory() . '/inc/elements/cms_explore_more_author.php');
        require(get_template_directory() . '/inc/elements/cms_customer_favorites.php');
        require(get_template_directory() . '/inc/elements/cms_best_sellers.php');
        require(get_template_directory() . '/inc/elements/cms_popular_categories.php');
        require(get_template_directory() . '/inc/elements/cms_post_single.php');
        /*
        require( get_template_directory() . '/inc/elements/cms_counter_single.php' );
        require( get_template_directory() . '/inc/elements/cms_charity.php' );
        require( get_template_directory() . '/inc/elements/cms_search_donate.php' );
        require( get_template_directory() . '/inc/elements/cms_image.php' );*/
    }
}


/**
 * Enqueue scripts and styles for front-end.
 * @author Fox
 * @since CMS SuperHeroes 1.0
 */
function book_junky_front_end_scripts()
{

    global $wp_styles, $opt_meta_options;

    /* one page. */
    if (is_page() && isset($opt_meta_options['page_one_page']) && $opt_meta_options['page_one_page']) {
        wp_register_script('jquery.singlePageNav', get_template_directory_uri() . '/assets/js/jquery.singlePageNav.js', array('jquery'), '1.2.0');
        wp_localize_script('jquery.singlePageNav', 'one_page_options', array('filter' => '.is-one-page', 'speed' => $opt_meta_options['page_one_page_speed']));
        wp_enqueue_script('jquery.singlePageNav');
    }

    /* Adds JavaScript Bootstrap. */
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.2');

    /* Add main.js */
    wp_register_script('light-box-js', get_template_directory_uri() . '/assets/js/light-box.js', array('jquery'), '1.0.0', true);

    /* Add main.js */
    wp_enqueue_script('book-junky-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);

    /* Add main.js */
    wp_enqueue_script('jquery-ui.js', get_template_directory_uri() . '/assets/js/jquery-ui.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('jQAllRangeSliders-min.js', get_template_directory_uri() . '/assets/js/jQAllRangeSliders-min.js', array('jquery'), '1.0.0', true);

    /* Add main.js */
    wp_enqueue_script('book-junky', get_template_directory_uri() . '/assets/js/book-junky.js', array('jquery'), '1.0.0', true);

    /* Add menu.js */
    wp_enqueue_script('book-junky-menu', get_template_directory_uri() . '/assets/js/menu.js', array('jquery'), '1.0.0', true);

    /* Comment */
    if (is_singular() && comments_open() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply');

    /** ----------------------------------------------------------------------------------- */

    /* Loads Bootstrap stylesheet. */
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');

    /* Loads Bootstrap stylesheet. */
    wp_enqueue_style('owl-carousel-style', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');

    /* Loads Bootstrap stylesheet. */
    wp_register_style('light-box-css', get_template_directory_uri() . '/assets/css/light-box.css');

    /* Loads Bootstrap stylesheet. */
    wp_enqueue_style('book-junky-font', get_template_directory_uri() . '/assets/css/font.css');

    /* Loads jquery-ui.min.css stylesheet. */
    wp_enqueue_style('iThing.css', get_template_directory_uri() . '/assets/css/iThing.css');

    /* Loads our main stylesheet. */
    wp_enqueue_style('book-junky-style', get_stylesheet_uri());

    /* Load static css*/
    wp_enqueue_style('book-junky-static', get_template_directory_uri() . '/assets/css/static.css');
}

add_action('wp_enqueue_scripts', 'book_junky_front_end_scripts');

/**
 * load admin scripts.
 *
 * @author FOX
 */
function book_junky_admin_scripts()
{

    /* Loads Bootstrap stylesheet. */
    wp_enqueue_style('book-junky-font', get_template_directory_uri() . '/assets/css/font.css', array(), '4.3.0');

    wp_enqueue_style('vc-admin', get_template_directory_uri() . '/assets/css/vc-admin.css');

    $screen = get_current_screen();

    /* load js for edit post. */
    if ($screen->post_type == 'post') {
        /* post format select. */
        wp_enqueue_script('post-format', get_template_directory_uri() . '/assets/js/post-format.js', array(), '1.0.0', true);
    }
    wp_enqueue_media();
    if ($screen->post_type == 'product') {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
        /* post format select. */
        wp_enqueue_script('thumbnails.js', get_template_directory_uri() . '/assets/js/thumbnails.js', array(), 'all', true);

        wp_enqueue_style('thumbnail.css', get_template_directory_uri() . '/assets/css/thumbnail.css');
    }
}

add_action('admin_enqueue_scripts', 'book_junky_admin_scripts');

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Fox
 */
function book_junky_widgets_init()
{

    global $opt_theme_options;

    register_sidebar(array(
        'name' => esc_html__('Main Sidebar', 'book-junky'),
        'id' => 'sidebar-blog',
        'description' => esc_html__('Appears on posts and pages except the optional Front Page template, which has its own widgets', 'book-junky'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Home 5 Sidebar', 'book-junky'),
        'id' => 'sidebar-home-5',
        'description' => esc_html__('Appears on posts and pages except the optional Front Page template, which has its own widgets', 'book-junky'),
        'before_widget' => '<aside id="%1$s" class="widget-home %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-home-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Left Header 1', 'book-junky'),
        'id' => 'left-header-1',
        'description' => esc_html__('Appears on header 1 side left', 'book-junky'),
        'before_widget' => '<aside id="%1$s" class="widget-header-1 %2$s">',
        'after_widget' => '</aside>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Woo Sidebar', 'book-junky'),
        'id' => 'woo-sidebar',
        'description' => esc_html__('Appears on page woo', 'book-junky'),
        'before_widget' => '<aside id="%1$s" class="widget-woo %2$s">',
        'after_widget' => '</aside>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Review Sidebar', 'book-junky'),
        'id' => 'review-sidebar',
        'description' => esc_html__('Appears on page review', 'book-junky'),
        'before_widget' => '<aside id="%1$s" class="widget-review %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-title-review">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Home Sidebar', 'book-junky'),
        'id' => 'home-sidebar',
        'description' => esc_html__('Appears on page review', 'book-junky'),
        'before_widget' => '<aside id="%1$s" class="widget-home %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-home-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar 1', 'book-junky'),
        'id' => 'footer-sidebar-1',
        'description' => esc_html__('Appears on footer site', 'book-junky'),
        'before_widget' => '<aside id="footer-sidebar-1" class="widget-footer footer-sidebar-1">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-ft-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar 5', 'book-junky'),
        'id' => 'footer-sidebar-5',
        'description' => esc_html__('Appears on footer site', 'book-junky'),
        'before_widget' => '<aside id="footer-sidebar-5" class="widget-footer footer-sidebar-5">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="wg-ft-title">',
        'after_title' => '</h3>',
    ));
    
        register_sidebar(array(
        'name' => esc_html__('Footer Bottom', 'book-junky'),
        'id' => 'footer-bottom',
        'description' => esc_html__('Appears on bottom footer site', 'book-junky'),
        'before_widget' => '<aside id="footer-bottom" class="widget-footer footer-bottom">',
        'after_widget' => '</aside>',
        'before_title' => '',
        'after_title' => '',
    ));

    if (!empty($opt_theme_options['mega_menu'])) {

        register_sidebar(array(
            'name' => esc_html__('Menu Mega Widget', 'book-junky'),
            'id' => 'widget-mega-menu',
            'description' => esc_html__('Appears on Mega menu', 'book-junky'),
            'before_title' => '<h5 class="wg-mega-menu-title">',
            'after_title' => '</h5>',
        ));
    }

    /* footer-top */
    if (!empty($opt_theme_options['footer-top-column'])) {

        for ($i = 2; $i <= $opt_theme_options['footer-top-column']; $i++) {
            register_sidebar(array(
                'name' => sprintf(esc_html__('Footer Top %s', 'book-junky'), $i),
                'id' => 'sidebar-footer-top-' . $i,
                'description' => esc_html__('Appears on footer site', 'book-junky'),
                'before_widget' => '<aside id="%1$s" class="widget-footer %2$s">',
                'after_widget' => '</aside>',
                'before_title' => '<h3 class="wg-ft-title">',
                'after_title' => '</h3>',
            ));
        }
    }
}

add_action('widgets_init', 'book_junky_widgets_init');

/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since 1.0.0
 */
function book_junky_comment_nav()
{
    // Are there comments to navigate through?
    if (get_comment_pages_count() > 1 && get_option('page_comments')) :
        ?>
        <nav class="navigation comment-navigation" role="navigation">
            <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'book-junky'); ?></h2>
            <div class="nav-links">
                <?php
                if ($prev_link = get_previous_comments_link(esc_html__('Older Comments', 'book-junky'))) :
                    printf('<div class="nav-previous">%s</div>', $prev_link);
                endif;

                if ($next_link = get_next_comments_link(esc_html__('Newer Comments', 'book-junky'))) :
                    printf('<div class="nav-next">%s</div>', $next_link);
                endif;
                ?>
            </div><!-- .nav-links -->
        </nav><!-- .comment-navigation -->
        <?php
    endif;
}

/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since 1.0.0
 */
function book_junky_paging_nav()
{
    // Don't print empty markup if there's only one page.
    if ($GLOBALS['wp_query']->max_num_pages < 2) {
        return;
    }

    $paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
    $pagenum_link = html_entity_decode(get_pagenum_link());
    $query_args = array();
    $url_parts = explode('?', $pagenum_link);

    if (isset($url_parts[1])) {
        wp_parse_str($url_parts[1], $query_args);
    }

    $pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
    $pagenum_link = trailingslashit($pagenum_link) . '%_%';

    // Set up paginated links.
    $links = paginate_links(array(
        'base' => $pagenum_link,
        'total' => $GLOBALS['wp_query']->max_num_pages,
        'current' => $paged,
        'mid_size' => 1,
        'add_args' => array_map('urlencode', $query_args),
        'prev_text' => '<i class="fa fa-angle-left"></i> Previous Page',
        'next_text' => 'Next Page <i class="fa fa-angle-right"></i>',
    ));

    if ($links) :

        ?>
        <nav class="paging-navigation clearfix">
            <?php echo wp_kses_post($links); ?>
        </nav><!-- .navigation -->
        <?php
    endif;
}

/**
 * Display navigation to next/previous post when applicable.
 *
 * @since 1.0.0
 */
function book_junky_post_nav()
{
    global $post;

    // Don't print empty markup if there's nowhere to navigate.
    $previous = (is_attachment()) ? get_post($post->post_parent) : get_adjacent_post(false, '', true);
    $next = get_adjacent_post(false, '', false);

    if (!$next && !$previous)
        return;
    ?>
    <nav class="navigation post-navigation" role="navigation">
        <div class="nav-links clearfix">
            <?php
            $prev_post = get_previous_post();
            if (!empty($prev_post)): ?>
                <a class="btn btn-default post-prev left" href="<?php echo get_permalink($prev_post->ID); ?>"><i
                            class="fa fa-angle-left"></i><?php echo esc_attr($prev_post->post_title); ?></a>
            <?php endif; ?>
            <?php
            $next_post = get_next_post();
            if (is_a($next_post, 'WP_Post')) { ?>
                <a class="btn btn-default post-next right"
                   href="<?php echo get_permalink($next_post->ID); ?>"><?php echo get_the_title($next_post->ID); ?><i
                            class="fa fa-angle-right"></i></a>
            <?php } ?>

        </div><!-- .nav-links -->
    </nav><!-- .navigation -->
    <?php
}

/* core functions. */
require_once(get_template_directory() . '/inc/functions.php');


add_filter('vc_google_fonts_get_fonts_filter', 'book_junky_font_filter');
//font list is array
function book_junky_font_filter($fonts_list)
{

    $averta_1->font_family = "averta-semibold-italic";
    $averta_1->font_types = "600 Italic:400:italic";
    $averta_1->font_styles = 'regular';

    $averta_2->font_family = "averta-semibold";
    $averta_2->font_types = "600 Normal:400:normal";
    $averta_2->font_styles = 'regular';

    $averta_3->font_family = "averta-thin-italic";
    $averta_3->font_types = "100 Italic:400:italic";
    $averta_3->font_styles = 'regular';

    $averta_4->font_family = "averta-thin";
    $averta_4->font_types = "100 Normal:100:normal";
    $averta_4->font_styles = 'regular';

    $averta_5->font_family = "averta-black-italic";
    $averta_5->font_types = "900 Italic:400:italic";
    $averta_5->font_styles = 'regular';

    $averta_6->font_family = "averta-black";
    $averta_6->font_types = "900 Normal:400:normal";
    $averta_6->font_styles = 'regular';

    $averta_7->font_family = "averta-bold-italic";
    $averta_7->font_types = "700 Italic:400:italic";
    $averta_7->font_styles = 'regular';

    $averta_8->font_family = "averta-bold";
    $averta_8->font_types = "700 Normal:400:normal";
    $averta_8->font_styles = 'regular';

    $averta_9->font_family = "averta-extrabold-italic";
    $averta_9->font_types = "800 Italic:400:italic";
    $averta_9->font_styles = 'regular';

    $averta_10->font_family = "averta-extrabold";
    $averta_10->font_types = "800 Normal:400:normal";
    $averta_10->font_styles = 'regular';

    $averta_11->font_family = "averta-extrathin-italic";
    $averta_11->font_types = "200 Italic:400:italic";
    $averta_11->font_styles = 'regular';

    $averta_12->font_family = "averta-extrathin";
    $averta_12->font_types = "200 Normal:400:normal";
    $averta_12->font_styles = 'regular';

    $averta_13->font_family = "averta-light-italic";
    $averta_13->font_types = "300 Italic:400:italic";
    $averta_13->font_styles = 'regular';

    $averta_14->font_family = "averta-light";
    $averta_14->font_types = "300 Normal:400:normal";
    $averta_14->font_styles = 'regular';

    $averta_15->font_family = "averta-regular-italic";
    $averta_15->font_types = "400 Italic:400:italic";
    $averta_15->font_styles = 'regular';

    $averta_16->font_family = "averta-regular";
    $averta_16->font_types = "400 Normal:400:normal";
    $popoaverta_16ins->font_styles = 'regular';


    $fonts_list[] = $averta_1;
    $fonts_list[] = $averta_2;
    $fonts_list[] = $averta_3;
    $fonts_list[] = $averta_4;
    $fonts_list[] = $averta_5;
    $fonts_list[] = $averta_6;
    $fonts_list[] = $averta_7;
    $fonts_list[] = $averta_8;
    $fonts_list[] = $averta_9;
    $fonts_list[] = $averta_10;
    $fonts_list[] = $averta_11;
    $fonts_list[] = $averta_12;
    $fonts_list[] = $averta_13;
    $fonts_list[] = $averta_14;
    $fonts_list[] = $averta_15;
    $fonts_list[] = $averta_16;

    return $fonts_list;
}


add_filter('cms-shorcode-list', 'book_junky_shortcodes');
/**
 * support shortcodes
 * @return array
 */
function book_junky_shortcodes()
{
    return array(
        'cms_carousel',
        'cms_grid',
        'cms_fancybox_single',
        'cms_counter_single',
        'cms_progressbar',
    );
}

/**
 * Move comment field to bottom of Comment form
 */
function book_junky_field_comment($fields)
{
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;

    return $fields;
}

add_filter('comment_form_fields', 'book_junky_field_comment');


/**
 * Demo Data
 */

// Must delete this action when submit theme
// Start delete position
add_action('ef3-export-finish', 'book_junky_plugin_export');
function book_junky_plugin_export($folder_dir)
{
    global $wp_taxonomies;
    $tax = $wp_taxonomies;
    $list_tax = array(
        'pa_book_author',
        'product_cat',
        'pa_dimensions',
        'pa_hardcover',
        'pa_isbn',
        'pa_language',
        'pa_originally_published',
        'pa_publisher',
        'pa_year_publication',
    );
    global $wp_filesystem;
    /**
     * Export terms and term_meta
     */
//    $tax = array();
    $tax_meta = array();
    foreach ($list_tax as $taxonomy) {
        /**
         * Export Terms
         */
        $terms = get_terms(array('taxonomy' => $taxonomy, "hide_empty" => false));
//        $tax[$taxonomy] = $terms;
        /**
         * Export term meta
         */
        $temp = array();
        foreach ($terms as $term) {
            $temp[$term->slug] = get_term_meta($term->term_id);
        }
        $tax_meta[$taxonomy] = $temp;
    }
    $wp_filesystem->put_contents($folder_dir . 'bj_woo_attribute.json', json_encode($tax));
    $wp_filesystem->put_contents($folder_dir . 'bj_woo_attribute_term_meta.json', json_encode($tax_meta));
}

add_action('ef3-import-start', 'book_junky_store_plugin_import', 10, 2);
function book_junky_store_plugin_import($id, $folder_dir)
{
    if (file_exists($folder_dir . 'bj_woo_attribute.json')) {
//        $taxonomies = json_decode(file_get_contents($folder_dir . 'bj_woo_attribute.json'), true);
//        global $wp_taxonomies;
//        echo '<pre>';
//        var_dump($wp_taxonomies);
//        echo '</pre>';
//        $wp_taxonomies = $taxonomies;
//        global $wp_taxonomies;
//        $x = $wp_taxonomies;
//        echo '<pre>';
//        var_dump($x);
//        echo '</pre>';
//        $GLOBALS['wp_taxonomies'] = $taxonomies;
//        $categories = 'KP';
//        $category   = 'KP';
//        $labels     = array(
//            'name'              => esc_attr__( $categories, "book-junky" ),
//            'singular'          => esc_attr__( $category, "book-junky" ),
//            'menu_name'         => esc_attr__( $categories, "book-junky" ),
//            'add_new_item'      => esc_attr__( "Add new $category", "book-junky" ),
//            'search_items'      => esc_attr__( "Search $category", "book-junky" ),
//            'edit_item'         => esc_attr__( "Edit $category", "book-junky" ),
//            'update_item'       => esc_attr__( "Update $category", "book-junky" ),
//            'parent_item_colon' => esc_attr__( "Parent $categories", "book-junky" ),
//            'parent_item'       => esc_attr__( "Parent $categories", "book-junky" ),
//        );
//        $args       = array(
//            'labels'       => $labels,
//            'hierarchical' => true,
//            'show_ui'      => true,
//            'public'       => true,
//        );
//        $x= register_taxonomy( 'kp-manufacturer', array( 'product' ), $args );
//        echo '<pre>';
//        var_dump($x);
//        echo '</pre>';

    }
//    if (file_exists($folder_dir . 'bj_woo_attribute_term_meta.json')) {
//        $term_metas = json_decode(file_get_contents($folder_dir . 'bj_woo_attribute_term_meta.json'), true);
//        foreach ($term_metas as $tax_slug => $terms_meta) {
//            foreach ($terms_meta as $term_slug => $term_meta) {
//                foreach ($term_meta as $key => $value) {
//                    $term = get_term_by('slug', $term_slug, $tax_slug);
//                    update_term_meta($term->term_id, $key, $value[0]);
//                }
//            }
//        }
//    }
}
//End delete position
/**
 * End Demo Data
 */

// Assign sidebar to search page 
// =============================================================================
add_filter( 'ups_sidebar', 'custom_search_sidebar' );
function custom_search_sidebar($sidebar){
	if( is_search() ){
		return 'woo-sidebar';
	}
	return $sidebar;
}
 
function x_get_content_layout() {

$content_layout = x_get_option( 'x_layout_content' );

if ( $content_layout != 'full-width' ) {
  if ( is_home() ) {
    $opt    = x_get_option( 'x_blog_layout' );
    $layout = ( $opt == 'sidebar' ) ? $content_layout : $opt;
  } elseif ( is_singular( 'post' ) ) {
    $meta   = get_post_meta( get_the_ID(), '_x_post_layout', true );
    $layout = ( $meta == 'on' ) ? 'full-width' : $content_layout;
  } elseif ( x_is_portfolio_item() ) {
    $layout = 'full-width';
  } elseif ( x_is_portfolio() ) {
    $meta   = get_post_meta( get_the_ID(), '_x_portfolio_layout', true );
    $layout = ( $meta == 'sidebar' ) ? $content_layout : $meta;
  } elseif ( is_page_template( 'template-layout-content-sidebar.php' ) ) {
    $layout = 'content-sidebar';
  } elseif ( is_page_template( 'template-layout-sidebar-content.php' ) ) {
    $layout = 'sidebar-content';
  } elseif ( is_page_template( 'template-layout-full-width.php' ) ) {
    $layout = 'full-width';
  } elseif ( is_archive() ) {
    if ( x_is_shop() || x_is_product_category() || x_is_product_tag() ) {
      $opt    = x_get_option( 'x_woocommerce_shop_layout_content' );
      $layout = ( $opt == 'sidebar' ) ? $content_layout : $opt;
    } else {
      $opt    = x_get_option( 'x_archive_layout' );
      $layout = ( $opt == 'sidebar' ) ? $content_layout : $opt;
    }
  } elseif ( x_is_product() ) {
    $layout = 'full-width';
  } elseif ( x_is_bbpress() ) {
    $opt    = x_get_option( 'x_bbpress_layout_content' );
    $layout = ( $opt == 'sidebar' ) ? $content_layout : $opt;
  } elseif ( x_is_buddypress() ) {
    $opt    = x_get_option( 'x_buddypress_layout_content' );
    $layout = ( $opt == 'sidebar' ) ? $content_layout : $opt;
  } elseif ( is_404() ) {
    $layout = 'full-width';
  } else {
    $layout = $content_layout;
  }
} else {
  $layout = $content_layout;
}

	if (x_is_product_category() ) {
     $layout = 'content-sidebar';
 }
 if (is_search() ) {
     $layout = 'content-sidebar';
 }
return $layout;

  }

function changeFormatOfIsbn($isbn) {
  $numbers_only = preg_replace("/[^\d]/", "", $isbn);
  return preg_replace("/^1?(\d{3})(\d{1})(\d{5})(\d{3})(\d{1})$/", "$1-$2-$3-$4-$5", $numbers_only);
}

function search_by_isbn( $query ) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ( $query->is_search ) {
      	$meta_query = array(
                 array(
                    'key'=>'_sku',
                    'value'=> changeFormatOfIsbn($_GET['isbn']),
                    'compare'=>'=',
                 ),
		);
		if($_GET['isbn'] !='')
			$query->set('meta_query',$meta_query);
    }
  }
}
add_action( 'pre_get_posts', 'search_by_isbn' );

// Modify search query to read ampersand  as "and";

function replace_search( $query_object )
{
    if( $query_object->is_search() ) {
        $raw_search = $query_object->query['s'];

        $replacement = str_replace( '&', 'and', $raw_search );

        if( $replacement ) {
            $query_object->set( 's', $replacement );
        }
    }
}

add_action( 'parse_query', 'replace_search' );


// Modify search query based on books series name;

function handle_book_series( $query_object )
{
		
		if( $query_object->is_search() ) {
        $raw_search = $query_object->query['s'];
				$taxonomies = $terms = get_terms( array(
											'taxonomy' => 'pa_series-name',
											'hide_empty' => false,
									) );
				// echo trim(strtolower($raw_search));die;
				$redirectUrl = get_site_url();
				if((strpos(trim(strtolower($raw_search)), "woody’s") !== false) || (strpos(trim(strtolower($raw_search)), "woody") || (strpos(trim(strtolower($raw_search)), "woodys")))){
					$redirectUrl .= "/series-name/fred-woodys-fantastic-world";
					wp_safe_redirect( $redirectUrl );
					exit;					
				}
				
				foreach($taxonomies as $key=>$tax){	
					if(strpos(strtolower($tax->name), trim(strtolower($raw_search))) !== false){
						$redirectUrl .= "/series-name/{$tax->slug}";						
						wp_safe_redirect( $redirectUrl );
						exit;						
					}				
				}
    }
		
}

add_action( 'parse_query', 'handle_book_series' );


// Modify search query based on Product Curriculum Links ;

function handle_curriculum_links( $query_object )
{
		
		if( $query_object->is_search() ) {
        $raw_search = $query_object->query['s'];
				$taxonomies = $terms = get_terms( array(
											'taxonomy' => 'pa_curriculum-links',
											'hide_empty' => false,
									) );				
				if((strpos(trim(strtolower($raw_search)), "stem") !== false) || (strpos(trim(strtolower($raw_search)), "stems"))){
					$redirectUrl .= "/curriculum-links/stem";
					wp_safe_redirect( $redirectUrl );
					exit;					
				}
				
				
				foreach($taxonomies as $key=>$tax){				
					
					if(strpos(strtolower($tax->name), trim(strtolower($raw_search))) !== false){						
						$redirectUrl .= "/curriculum-links/{$tax->slug}";						
						wp_safe_redirect( $redirectUrl );
						exit;						
					}		
				}
    }
		
}

add_action( 'parse_query', 'handle_curriculum_links' );

