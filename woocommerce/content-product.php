<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 30.0.0
 * Theme 	Book Junky
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product,$opt_theme_options,$opt_meta_options;

$box_shadow = !empty($opt_meta_options['color_item']) ? $opt_meta_options['color_item'] : '#000';
$hover = "this.style.boxShadow ='0 0 20px 0 ".$box_shadow. "';";
$out = "this.style.boxShadow ='0 0 15px -2px ".$box_shadow. "';";
$styles_hover = 'onmouseover="'.$hover. '"';
$onmouseout = 'onmouseout="'.$out.'"';

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$classes = 'book-junky-product clearfix col-xs-12 col-sm-12 col-md-12 col-lg-'.$opt_theme_options['woo_columns_layout'];

?>
<div <?php post_class( $classes ); ?>>
	<div class="product-thumbnial fll" style="transition:all 0.25s ease 0s ;box-shadow: 0 0 15px -2px <?php echo esc_attr($box_shadow); ?>;" <?php echo ''.$styles_hover . ' ' . $onmouseout; ?> >
		<a href="<?php echo get_the_permalink(); ?>">
		<?php

		/**
		 * woocommerce_before_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
			//do_action( 'woocommerce_before_shop_loop_item_title' );
			the_post_thumbnail('shop_catalog');
		?>
		</a>
	</div>

	<div class="product-content fll">

		<a href="<?php echo get_the_permalink(); ?>" class="title-product">
			<?php echo get_the_title(); ?>
		</a>

		<p class="product-author">
			<?php 
				$pbk = get_post_meta( get_the_ID(), 'ef3-pbk_code', true );
				if($pbk != '') {
					echo esc_html__('pbk: ','book-junky'); echo $pbk; 
				}
				?><br/>
			<?php 
				$hbk = get_post_meta( get_the_ID(), 'ef3-hbk_code', true );
				if($hbk != '') {
					echo esc_html__('hbk: ','book-junky'); echo $hbk; 
				}
				?>
		</p>

		<?php 

			/**
			 * woocommerce_after_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );

		?>

		<!-- <div class="excerpt-product"><?php echo wp_trim_words( get_the_excerpt(), '25', ''); ?></div> -->

		<?php

			/**
			 * woocommerce_after_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
		?>
	</div>
</div>
