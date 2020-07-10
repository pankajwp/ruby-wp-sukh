<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     30.0.0
 * Theme        Book Junky
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$id_product = get_the_ID();
//global $wp_taxonomies;
//echo '<pre>';
//var_dump($wp_taxonomies);
//echo '</pre>';
$args_query = array(

    'post_type' => 'product',
    'p' => $id_product,
);
$info_product = new WP_Query($args_query);

if ($info_product->have_posts()) {
    global $opt_meta_options;

    $info_product->the_post();

    $check = get_post_meta($id_product, 'ef3-color_item', true);
    $box_shadow = !empty($check) ? $check : '#3c2a88';

    $term_id = book_junky_get_id_term($id_product);
    $id_avt = !empty($term_id) ? get_term_meta($term_id[0], "bj_avatar", true) : "";
    if (!empty($id_avt)) {

        $term_avt = wp_get_attachment_image_src($id_avt, 'book_junky_500X500', false);

        $url_avt = $term_avt[0];
    } else {

        $url_avt = get_template_directory_uri() . '/assets/images/author.png';
    }

    $item_background = get_post_meta($id_product, 'ef3-item_background', true);
    $bg_item_bg = !empty($item_background['background-image']) ? $item_background['background-image'] : '';
    $bg_item_color = !empty($item_background['background-color']) ? $item_background['background-color'] : '';
    $style = '';
    $style_text = "";
    $text_color = "white";
    $o = 0;
    $text_rating='#7151ed';
    if (!empty($bg_item_bg)) {
        $style = 'background-image: url("' . $bg_item_bg . '");background-size: cover;background-repeat: no-repeat;';
    } elseif (!empty($bg_item_color)) {
        $rgb = book_junky_get_text_color_by_bg($bg_item_color);
        $o = round(((intval($rgb["r"]) * 299) +
                (intval($rgb["g"]) * 587) +
                (intval($rgb["b"]) * 114)) / 1000);
        $text_color = ($o > 125) ? "black" : "white";
        $text_rating = ($o > 125) ? "#7151ed" : "#8e79df";
        $style_text = 'color:' . $text_color . ';';
        $style = 'background-color: ' . $bg_item_color . ';';
    } elseif (!empty($check)) {
        $rgb = book_junky_get_text_color_by_bg($check);
        $o = round(((intval($rgb["r"]) * 299) +
                (intval($rgb["g"]) * 587) +
                (intval($rgb["b"]) * 114)) / 1000);
        $text_color = ($o > 125) ? "black" : "white";
        $text_rating = ($o > 125) ? "#7151ed" : "#8e79df";
        $style_text = 'color:' . $text_color . ' !important;';
        $style = 'background-color: ' . $check . ';color:' . $text_color . ';';
    } else {

        $style = 'background-image: url("' . get_template_directory_uri() . '/assets/images/page_title_bg.jpg");';
    }

    ?>
    <div class="page-title-product_2" style="<?php echo esc_attr($style); ?>">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="wrap-thumbnail"
                         style="box-shadow: 0 5px 15px -5px <?php echo esc_attr($box_shadow); ?>">
                        <?php echo the_post_thumbnail('shop_catalog_image_size'); ?>
                    </div>
                    <div class="wrap-content">
                        <div class="author" style="<?php echo esc_html($style_text) ?>">
                            <?php
                            $author_page = get_option('woocommerce_author_page_id');
                            $id_author = book_junky_get_id_term_2($id_product);

                            ?>
                            <img src="<?php echo esc_url($url_avt); ?>"
                                 alt="<?php esc_html__("Avt Author", "book-junky"); ?>">
                            <?php
                            echo book_junky_get_author($id_product); 
                            ?>
                        </div>

                        <h4 style="<?php echo esc_html($style_text) ?>"><?php the_title(); ?></h4>

                        <div><?php echo book_junky_get_review_product($id_product, true, $text_rating); ?></div>

                        <p  style="<?php echo esc_html($style_text) ?>"><?php echo wp_trim_words(get_the_excerpt(), '55', ''); ?></p>

                        <div class="wrap-button">
                            <?php woocommerce_template_single_add_to_cart(); ?>
                            <?php
                            $liked = function_exists("flex_favorites_check_liked_post") ? flex_favorites_check_liked_post(get_the_ID()) : false;
                            if (function_exists('flex_favorites_build_layout')) {
                                echo flex_favorites_build_layout($post_id = $id_product, $button_text = "Add to BookShelf", $liked, $class_count = "aj-count");
                            }
                            ?>
                            <?php 
                                $lernmore = get_post_meta( get_the_ID(), 'ef3-learn_more', true );
                                if($lernmore != '') { ?>
                                    <a target="_blank" style="margin-left:2%;" class="single_add_to_cart_button" href="<?php echo $lernmore; ?>">Learn More </a>  
                                <?php }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

wp_reset_postdata();

?>

<div <?php post_class('wrap-single-product'); ?>>
    <div class="container">
        <div class="row">

            <div class="wrap-single-content col-xs-12 col-sm-8 col-lg-10">
                <div class="info-single-product">
                    <?php book_junky_info_single_product(); ?>
                </div>
                <?php
                /**
                 * woocommerce_before_single_product hook.
                 *
                 * @hooked wc_print_notices - 10
                 */
                do_action('woocommerce_before_single_product');

                if (post_password_required()) {
                    echo get_the_password_form();
                    return;
                }
                ?>
                <div class="wrap-overview">
                    <h3><?php echo esc_html__('Overview', 'book-junky'); ?></h3>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="wrap-details clearfix">
                    <div class="detail">
                        <h6><?php echo esc_html__('BOOK DETAILS', 'book-junky'); ?></h6>
                        <?php book_junky_single_detail(); ?>
                    </div>
                    <div class="gallery-review">
                        <h6><?php echo esc_html__('PREVIEW', 'book-junky'); ?></h6>
                        <?php woocommerce_show_product_thumbnails(); ?>
                    </div>
                </div>
                <div class="key-selling-feature book-feature">
                    <h5><?php esc_html_e('Key Selling Features', 'book-junky'); ?></h5>
                    <?php
                        echo get_post_meta(get_the_ID(), 'key_selling_features', true);
                    ?>
                </div>
                <div class="key-selling-feature book-feature">
                    <h5><?php esc_html_e('Series Information', 'book-junky'); ?></h5>
                    <?php
                        $series_name = get_the_terms( $id_product,"pa_series-name",true);
                        if( !empty( $series_name ) ) {

                            foreach ($series_name as $key) {
                                echo '<b>Series Name: '.$key ->name."</b>";
                                echo '<div>'.$key ->description.'</div>';
                                break;
                            } 
                        }
                    ?>
                </div>
                <div class="review">
					<?php if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes') { ?> 
                    <h5><?php esc_html_e('Customer Reviews', 'book-junky'); ?></h5>
                    <?php
                    call_user_func('comments_template', 'reviews');
                    ?>
					<?php } ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2">
                <div class="wrap-single-sidebar">
                    <div class="wrap-book-author">
                        <h4 class="sg-sidebar-title"><?php esc_html_e('BOOKS BY ', 'book-junky');
                            echo book_junky_get_author($id_product); ?></h4>
                        <?php
                        $id_term = book_junky_get_id_term($id_product);
                        $post_author = book_junky_get_posts_by_term_id($id_term, 10);

                        if ($post_author->have_posts()) {
                            while ($post_author->have_posts()) {
                                $color_item = get_post_meta(get_the_ID(), 'ef3-color_item', true);
                                ?>

                                <div class="item-product clearfix">

                                    <?php $post_author->the_post(); ?>

                                    <div class="wrap-thumbnail"
                                         style="box-shadow: 0 5px 15px -5px <?php echo esc_attr($color_item); ?>">

                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('single-product'); ?>
                                        </a>
                                    </div>

                                    <div class="wrap-content">

                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                                        <div class="wrap-price"><?php woocommerce_template_loop_price(); ?></div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>

                    <h4 class="sg-sidebar-title"><?php esc_html_e('SHARE THIS BOOK', 'book-junky'); ?></h4>
                    <?php book_junky_share_book(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

