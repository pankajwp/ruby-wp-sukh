<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     10.6.4
 */

global $opt_theme_options, $wpdb;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$shop_column = $shop_sidebar = '';

if (is_active_sidebar('woo-sidebar')) {

    $shop_column = 'no-sidebar';
} else {

    $shop_column = 'en_sidebar';
}

get_header(); ?>

<div class="book-junky-cat <?php echo esc_attr($shop_column); ?>">
    <div class="wrap-search-shop">
        <?php echo do_shortcode('[cms_search_book]'); ?>
    </div>

    <div class="wrap-archive">
        <div class="row">
            <?php if (have_posts()) :
                global $wp_the_query; ?>

                <?php if (is_active_sidebar('woo-sidebar')) : ?>

                    <div class="sidebar-filter col-xs-12 col-md-4 col-lg-3">

                        <?php dynamic_sidebar('woo-sidebar'); ?>
                    </div>
                <?php endif; ?>

                <div class="shop-content col-xs-12 col-md-8 col-lg-9">

                    <div class="catalog_ordering clearfix">

                        <?php

                        /**
                         * woocommerce_before_shop_loop hook.
                         *
                         * @hooked wc_print_notices - 10
                         * @hooked woocommerce_result_count - 20
                         * @hooked woocommerce_catalog_ordering - 30
                         */
                        do_action('woocommerce_before_shop_loop');
                        ?>
                    </div>

                    <div class="book-junky-products grid-2 extend-space">

                        <?php while (have_posts()) : the_post(); ?>

                            <?php

                            /**
                             * woocommerce_shop_loop hook.
                             *
                             * @hooked WC_Structured_Data::generate_product_data() - 10
                             */
                            do_action('woocommerce_shop_loop');

                            global $product,$opt_meta_options;
                            $box_shadow = !empty($opt_meta_options['color_item']) ? $opt_meta_options['color_item'] : '#000';
                            $hover = "this.style.boxShadow ='0 0 20px 0 ".$box_shadow. "';";
                            $out = "this.style.boxShadow ='0 0 15px -2px ".$box_shadow. "';";
                            $styles_hover = 'onmouseover="'.$hover. '"';
                            $onmouseout = 'onmouseout="'.$out.'"';

                            if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'shop_catalog', false)):

                                $thumbnail = get_the_post_thumbnail(get_the_ID(),'shop_catalog');
                            else:

                                $thumbnail = '<img src="'.get_template_directory_uri().'/assets/images/no-image.jpg" alt="'.get_the_title().'" />';
                            endif;

                            ?>

                            <div class="product-item col-xs-12 col-sm-2 col-md-3 new-col-lg-5">

                                <div class="cms-grid-media" style="transition:all 0.25s ease 0s ;box-shadow: 0 0 15px -2px <?php echo esc_attr($box_shadow); ?>;" <?php echo ''.$styles_hover . ' ' . $onmouseout; ?> >
                                <a href="<?php echo get_the_permalink(); ?>"><?php echo ''.$thumbnail; ?></a>
                                </div>
                                <div class="info-product">
                                    <a class="product-title" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
                                    <p class="product-author"><?php echo esc_html__('by: ','book-junky'); echo book_junky_get_author( get_the_ID() ); ?></p>

                                    <?php

                                        /**
                                         * woocommerce_after_shop_loop_item_title hook.
                                         *
                                         * @hooked woocommerce_template_loop_rating - 5
                                         * @hooked woocommerce_template_loop_price - 10
                                         */
                                        do_action( 'woocommerce_after_shop_loop_item_title' );
                                    ?>
                                </div>
                            </div>
                        <?php endwhile; // end of the loop. ?>
                        <?php book_junky_paging_nav(); ?>
                    </div>
                </div>

            <?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>

                <?php

                /**
                 * woocommerce_no_products_found hook.
                 *
                 * @hooked wc_no_products_found - 10
                 */
                do_action('woocommerce_no_products_found');
                ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
