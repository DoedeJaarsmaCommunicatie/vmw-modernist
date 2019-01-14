<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
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
 * @version 3.0.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_cart' );

?>
<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>
<!--	--><?php //include 'proceed-to-checkout-button.php'; ?>
	<?php
	// Group cart-items by package
	$packages=WC()->cart->get_shipping_packages();
	$package_id_by_product_id=array();
	foreach($packages as $package_id=>$package) {
		foreach($package["contents"] as $product) {
			$package_id_by_product_id[$product["product_id"]]=$package_id;
		}
	}
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
		$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
		if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
			$package_id = $package_id_by_product_id[$product_id];
			if (!isset($package_id)) $package_id=-1;
			$packages[$package_id]["cart_items"][$cart_item_key]=$cart_item;
			$packages[$package_id]["cart_products"][$cart_item_key]=$_product;
			$packages[$package_id]["cart_product_ids"][$cart_item_key]=$product_id;
		}
	}
	// Display cart-items grouped by package.
	foreach($packages as $package_id => $package) {
		if (empty($package["cart_items"])) continue;
		// Check whether free-shipping is allowed, and if not, how much needs to be purchased to allow free shipping
		$missing_amount = null;
		$shipping_zone = WC_Shipping_Zones::get_zone_matching_package( $package );
		$shipping_methods = $shipping_zone->get_shipping_methods();
		$free_shipping_method=null;
		foreach($shipping_methods as $shipping_method) {
			if (is_a($shipping_method, "WC_Shipping_Free_Shipping")) {
				$free_shipping_method=$shipping_method;
				break;
			}
		}
		if ($free_shipping_method && in_array( $free_shipping_method->requires, array( 'min_amount', 'both' ) )) {
			$min_amount = $free_shipping_method->min_amount;
			$total = array_sum( wp_list_pluck( $package["cart_items"], 'line_total' ) );
			if ( 'incl' === WC()->cart->tax_display_cart ) {
				$tax = array_sum( wp_list_pluck( $package["cart_items"], 'line_tax' ) );
				$total += $tax;
			}
			$total = round($total, wc_get_price_decimals() );
			if ( $total >= $min_amount ) {
				$missing_amount = 0;
			} else {
				$missing_amount = $min_amount - $total;
			}
		}
		// Get vendor data for display
		$sold_by = WC_Product_Vendors_Utils::get_sold_by_link( reset($package["cart_product_ids"] ));
		?>
		<div class="cart-package-container">
			<h3 class="vendor-name"><?php print $sold_by["name"] ?></h3>
			<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
				<thead>
				<tr>
					<th class="product-remove">&nbsp;</th>
					<th class="product-thumbnail">&nbsp;</th>
					<th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
					<th class="product-price"><?php _e( 'Price', 'woocommerce' ); ?></th>
					<th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
					<th class="product-subtotal"><?php _e( 'Total', 'woocommerce' ); ?></th>
				</tr>
				</thead>
				<tbody>
				<?php do_action( 'woocommerce_before_cart_contents' ); ?>
				
				<?php
				foreach ( $package["cart_items"] as $cart_item_key => $cart_item) {
					$_product=$package["cart_products"][$cart_item_key];
					$product_id=$package["cart_product_ids"][$cart_item_key];
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
						
						<td class="product-remove">
							<?php
							echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
								'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
								esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
								__( 'Remove this item', 'woocommerce' ),
								esc_attr( $product_id ),
								esc_attr( $_product->get_sku() )
							), $cart_item_key );
							?>
						</td>
						
						<td class="product-thumbnail">
							<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
							
							if ( ! $product_permalink ) {
								echo $thumbnail;
							} else {
								printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
							}
							?>
						</td>
						
						<td class="product-name" data-title="<?php _e( 'Product', 'woocommerce' ); ?>">
							<?php
							if ( ! $product_permalink ) {
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else {
								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
							}
							
							// Meta data
                            // Like SoldBy: $vendor->name
//							print wc_get_formatted_cart_item_data( $cart_item );
							
							// Backorder notification
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
							}
							?>
						</td>
						
						<td class="product-price" data-title="<?php _e( 'Price', 'woocommerce' ); ?>">
							<?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							?>
						</td>
						
						<td class="product-quantity" data-title="<?php _e( 'Quantity', 'woocommerce' ); ?>">
							<?php
							if ( $_product->is_sold_individually() ) {
								$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
							} else {
								$product_quantity = woocommerce_quantity_input( array(
									'input_name'  => "cart[{$cart_item_key}][qty]",
									'input_value' => $cart_item['quantity'],
									'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
									'min_value'   => '0',
								), $_product, false );
							}
							
							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
							?>
							<input type="submit" class="update-button button" name="update_cart" value="<?php _e('Update Shopping Bag', 'theretailer'); ?>" hidden/>
						</td>
						
						<td class="product-subtotal" data-title="<?php _e( 'Total', 'woocommerce' ); ?>">
							<?php
							echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
							?>
						</td>
					</tr>
					<?php
				}
				?>
				
				<?php do_action( 'woocommerce_cart_contents' ); ?>
				</tbody>
                <?php if( $missing_amount > 0) { ?>
                    <i class="fas fa-exclamation-triangle text-warning" aria-hidden="true"></i>
                    Bestel voor nog <span class="text-primary">&euro; <?= str_replace( '.', ',', money_format('%.2n', $missing_amount) )?></span>
                    bij <a href="<?=$sold_by['link']?>" title="<?=$sold_by['name']?>"><?=$sold_by['name']?></a>
                    voor gratis verzending!
				<?php } ?>
			</table>
		</div>
	<?php } ?>
	
	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents d-none" cellspacing="0">
		<tbody>
		<tr>
			<td colspan="6" class="actions">
				
				<?php if ( wc_coupons_enabled() ) { ?>
					<div class="coupon">
						<label for="coupon_code"><?php _e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" />
						<?php do_action( 'woocommerce_cart_coupon' ); ?>
					</div>
				<?php } ?>
				
				<?php do_action( 'woocommerce_cart_actions' ); ?>
				
				<?php wp_nonce_field( 'woocommerce-cart' ); ?>
			</td>
		</tr>
		
		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</tbody>
	</table>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<div class="cart-collaterals">
	<?php do_action( 'woocommerce_cart_collaterals' ); ?>
</div>

<?php do_action( 'woocommerce_after_cart' );
