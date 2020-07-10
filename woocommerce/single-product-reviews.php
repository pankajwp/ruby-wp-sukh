<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
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
 * @version     20.3.2
 * Theme        Book Junky
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;
$id_product = get_the_ID();

if (!comments_open()) {
    return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
    <button class="bj-write-cmt-btn"><?php echo esc_html__("Write a review", "book-junky") ?></button>
    <div id="comments">
        <div class="wrap-rating">
            <p><?php esc_html_e('Average customer rating', 'book-junky'); ?></p>
            <?php echo book_junky_get_review_product($id_product); ?>
        </div>

        <?php if (get_option('woocommerce_review_rating_verification_required') === 'no' || wc_customer_bought_product('', get_current_user_id(), $product->get_id())) : ?>

            <div id="review_form_wrapper" class="bj-comment-form">
                <div id="review_form">
                    <?php
                    $commenter = wp_get_current_commenter();

                    $comment_form = array(
                        'title_reply' => have_comments() ? __('Add a review', 'book-junky') : sprintf(__('Be the first to review &ldquo;%s&rdquo;', 'book-junky'), get_the_title()),
                        'title_reply_to' => __('Leave a Reply to %s', 'book-junky'),
                        'title_reply_before' => '<span id="reply-title" class="comment-reply-title">',
                        'title_reply_after' => '</span>',
                        'comment_notes_after' => '',
                        'fields' => array(
                            'author' => '<p class="comment-form-author">' . '<label for="author">' . esc_html__('Name', 'book-junky') . ' <span class="required">*</span></label> ' .
                                '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" aria-required="true" required /></p>',
                            'email' => '<p class="comment-form-email"><label for="email">' . esc_html__('Email', 'book-junky') . ' <span class="required">*</span></label> ' .
                                '<input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-required="true" required /></p>',
                        ),
                        'label_submit' => __('Submit', 'book-junky'),
                        'logged_in_as' => '',
                        'comment_field' => '',
                    );

                    if ($account_page_url = wc_get_page_permalink('myaccount')) {
                        $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf(__('You must be <a href="%s">logged in</a> to post a review.', 'book-junky'), esc_url($account_page_url)) . '</p>';
                    }

                    if (get_option('woocommerce_enable_review_rating') === 'yes') {
                        $comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__('Your rating', 'book-junky') . '</label><select name="rating" id="rating" aria-required="true" required>
                                <option value="">' . esc_html__('Rate&hellip;', 'book-junky') . '</option>
                                <option value="5">' . esc_html__('Perfect', 'book-junky') . '</option>
                                <option value="4">' . esc_html__('Good', 'book-junky') . '</option>
                                <option value="3">' . esc_html__('Average', 'book-junky') . '</option>
                                <option value="2">' . esc_html__('Not that bad', 'book-junky') . '</option>
                                <option value="1">' . esc_html__('Very poor', 'book-junky') . '</option>
                            </select></div>';
                    }

                    $comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__('Your review', 'book-junky') . ' <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea></p>';

                    comment_form(apply_filters('woocommerce_product_review_comment_form_args', $comment_form));
                    ?>
                </div>
            </div>

        <?php else : ?>

            <p class="woocommerce-verification-required"><?php _e('Only logged in customers who have purchased this product may leave a review.', 'book-junky'); ?></p>

        <?php endif;
        $cnt = get_post_meta($id_product, '_wc_review_count', true);?>
        <?php if (!empty($cnt)) :
            $per_page = get_option('comments_per_page', '5');
            $get_per_page = ($cnt <= $per_page) ? "" : intval($per_page);
            ?>
            <ol class="commentlist">
                <?php wp_list_comments(apply_filters('woocommerce_product_review_list_args', array('callback' => 'woocommerce_comments', 'page' => 1, 'per_page' => $get_per_page))); ?>
            </ol>
            <?php if ($cnt > $per_page) :
            $more = $cnt - $per_page;
            echo '<div class="bj-showmore-comments">';
            echo '<button class="bj-showmore-comments-btn" data-currentpage="1" data-post="' . get_the_ID() . '" data-count="' . esc_attr($more) . '">' . esc_html__("View more", "book-junky") . ' <p class="bj-more">(' . esc_attr($more) . ')</p> </button>';
            echo '</div>';
        endif; ?>

        <?php else : ?>

            <p class="woocommerce-noreviews"><?php _e('There are no reviews yet.', 'book-junky'); ?></p>

        <?php endif; ?>
    </div>
    <div class="clear"></div>
</div>
