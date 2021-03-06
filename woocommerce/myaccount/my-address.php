<?php
/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
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
 * @version 20.6.0
 * Theme 	Book Junky
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
	$get_addresses = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' => esc_html__( 'Billing address', 'book-junky' ),
		'shipping' => esc_html__( 'Shipping address', 'book-junky' ),
	), $customer_id );
} else {
	$get_addresses = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' => esc_html__( 'Billing address', 'book-junky' ),
	), $customer_id );
}

?>
<div class="wrap-address">
	<h4><?php esc_html_e('Address','book-junky'); ?></h4>

	<?php foreach ( $get_addresses as $name => $title ) : ?>

		<div class="woocommerce-address">
			<div class="address-title clearfix">
				<h3><?php echo ''.$title; ?></h3>
				<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', $name ) ); ?>" class="edit"><?php _e( 'Edit', 'book-junky' ); ?></a>
			</div>
			<div class="address-content">
				<?php
					$address = apply_filters( 'woocommerce_my_account_my_address_formatted_address', array(
						'first_name'  => get_user_meta( $customer_id, $name . '_first_name', true ),
						'last_name'   => get_user_meta( $customer_id, $name . '_last_name', true ),
						'company'     => get_user_meta( $customer_id, $name . '_company', true ),
						'address_1'   => get_user_meta( $customer_id, $name . '_address_1', true ),
						'address_2'   => get_user_meta( $customer_id, $name . '_address_2', true ),
						'city'        => get_user_meta( $customer_id, $name . '_city', true ),
						'state'       => get_user_meta( $customer_id, $name . '_state', true ),
						'postcode'    => get_user_meta( $customer_id, $name . '_postcode', true ),
						'country'     => get_user_meta( $customer_id, $name . '_country', true ),
					), $customer_id, $name );

					$formatted_address = WC()->countries->get_formatted_address( $address );

					if ( ! $formatted_address ) {
						esc_html_e( 'You have not set up this type of address yet.', 'book-junky' );
					} else {
						echo ''.$formatted_address;
					}
				?>
			</div>
		</div>
	<?php endforeach; ?>
</div>


