<?php
/**
 * Displayed when no products are found matching the current query
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/no-products-found.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     20.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="row">
<div class="sidebar-filter col-xs-12 col-md-4 col-lg-3">
<?php dynamic_sidebar('woo-sidebar'); ?>
</div>
<div class="sidebar-filter col-xs-12 col-md-8 col-lg-9">
<p class="woocommerce-info"><?php _e( 'No products were found matching your selection.', 'book-junky' ); ?></p>
</div>
</div>