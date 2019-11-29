<?php
/**
 * Created by PhpStorm.
 * User: mitch
 * Date: 2018-11-28
 * Time: 12:03
 */

wp_localize_script(
    'vmw_ajax_caller',
    'vmw_ajax_object',
    [ 'ajax_url' => admin_url('admin-ajax.php') ]
);

function the_wc_shopping_cart($icon = 'shopping-cart')
{
    $icon = "fas fa-{$icon}";
    
    $count_producten = WC()->cart->get_cart_contents_count();
    
    $total = WC()->cart->get_cart_total();
    
    if ($count_producten == 1) {
        printf('<i class="%s mr-1"></i> %d product - %s', $icon, $count_producten, $total);
    }
    
    if ($count_producten > 1) {
        printf('<i class="%s mr-1"></i> %d product(en) - %s', $icon, $count_producten, $total);
    }
    
    if ($count_producten < 1) {
        printf('<i class="%s mr-1"></i> winkelmandje', $icon);
    }
}

function the_wc_single_stock($product_id)
{
    $product = wc_get_product($product_id);
    if ($product->is_in_stock()) : ?>
        <section class="vmw__single__product__shipping mt-lg-1">
            <i class="fas fa-check-circle text-success mt-1"></i> <span><strong class="text-success">Op voorraad:</strong> Binnen 2-4 werkdagen in huis</span>
        </section>
        <?php
    else : ?>
        <section class="vmw__single__product__shipping mt-lg-1">
            <i class="fas fa-question-circle text-warning mt-1"></i> <span><strong class="text-warning">Tijdelijk niet beschikbaar</strong></span>
        </section>
        <?php
    endif;
}

function the_wc_single_vendor($product_id)
{
    $vendor = wp_get_post_terms($product_id, 'wcpv_product_vendors')[0];
    ?>
    <span class="my-2">Verkoop door <a href="<?=get_term_link($vendor->term_id)?>"><?=$vendor->name?></a></span>
    <?php
}

function the_wc_usp()
{
    $steps = absint(get_post_meta(get_queried_object_id(), 'group_of_quantity', true));
    
    ?>
    <section class="vmw__single__product__usp">
        <ul class="p-0 m-2" style="list-style-type: circle;">
            <li>Gratis verzending > € 70,-</li>
    <?php if ($steps > 0) : ?>
            <li>Per <?=$steps?> flessen te bestellen</li>
    <?php else : ?>
            <li>Per fles te bestellen</li>
    <?php endif; ?>
            <li>Bestellen en betalen via vindmijnwijn.nl</li>
        </ul>
    </section>
    <?php
}

function the_wc_mobile_usp()
{
    $steps = (int) get_post_meta(get_queried_object_id(), 'group_of_quantity', true); ?>
    <section class="vmw__single__product__usp__mobile">
        <ul class="p-0 m-2" style="list-style-type: circle;">
            <li>Gratis verzending > € 70,-</li>
	        <?php if ($steps > 0) : ?>
                <li>Per <?=$steps?> flessen te bestellen</li>
	        <?php else : ?>
                <li>Per fles te bestellen</li>
	        <?php endif; ?>
            <li>Bestellen en betalen via vindmijnwijn.nl</li>
        </ul>
    </section>
    <?php
}

function the_big_shopping_cart()
{
    $cart_totals            = wc()->cart->get_totals();
    $packages               = WC()->cart->get_shipping_packages();
    $package_per_product    = [];
    
//  // Groups the cart items per package and ultimately per vendor;
    foreach ($packages as $package_id => $package) {
        foreach ($package[ 'contents' ] as $content) {
            $package_per_product[ $content[ 'product_id' ] ] = $package_id;
        }
    }
    
    foreach (WC()->cart->get_cart() as $item_key => $cart_item) {
        $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $item_key);
        $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $item_key);
        
        if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $item_key)) {
            $package_id = $package_per_product[ $product_id ];
            if (!isset($package_id)) {
                $package_id = -1;
            }
            $packages[ $package_id ][ 'cart_items' ][ $item_key ]       = $cart_item;
            $packages[ $package_id ][ 'cart_products' ][ $item_key ]    = $_product;
            $packages[ $package_id ][ 'cart_product_ids' ][ $item_key ] = $product_id;
        }
    }
    
    ?>
    <section class="shopping__cart__container js-target-shopping-cart p-3 border border-tertiary-light-50">
        <header class="vmw__shopping__cart__header js-shopping-cart-close d-flex w-100">
            <h3>
                Winkelmandje &euro; <?=$cart_totals['total']?>
            </h3>
            <span class="ml-auto" style="cursor: pointer;">
                <i class="fas fa-times fa-2x"></i>
            </span>
        </header>
    <?php
    foreach ($packages as $package_id => $package) {
        // Skip empty packages
        if (empty($package[ 'cart_items' ])) {
            continue;
        }
        // Check if shipping is free, and if not
        // how much is missing to make shipping free,
        // per vendor
        $missing_amount         = null;
        $shipping_zone          = WC_Shipping_Zones::get_zone_matching_package($package);
        $shipping_methods       = $shipping_zone->get_shipping_methods();
        $free_shipping_method   = null;
        
        foreach ($shipping_methods as $shippingMethod) {
            if (is_a($shippingMethod, "WC_Shipping_Free_Shipping")) {
                $free_shipping_method = $shippingMethod;
                break;
            }
        }
        
        if ($free_shipping_method && in_array($free_shipping_method->requires, [ 'min_amount', 'both' ])) {
            $min_amount = $free_shipping_method->min_amount;
            $total = array_sum(wp_list_pluck($package[ 'cart_items' ], 'line_total'));
            
            if ('incl' === WC()->cart->tax_display_cart) {
                $tax = array_sum(wp_list_pluck($package[ 'cart_items' ], 'line_tax'));
                $total += $tax;
            }
            
            $total = round($total, wc_get_price_decimals());
            
            if ($total >= $min_amount) {
                $missing_amount = 0;
            } else {
                $missing_amount = $min_amount - $total;
            }
        }
        $sold_by = WC_Product_Vendors_Utils::get_sold_by_link(reset($package["cart_product_ids"]));
        ?>
        <div>
            <h5 class="vmw__shopping__cart__vendor__name">
               Verkoop door <a href="<?=$sold_by['link']?>"><?=$sold_by['name']?></a>
            </h5>
        </div>
        
        <?php
        foreach ($package[ 'cart_items' ] as $cartItemKey => $cartItem) {
            $_product = $package['cart_products'][$cartItemKey];
            $product_id = $package['cart_product_ids'][$cartItemKey];
            $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cartItem) : '', $cartItem, $cartItemKey);
            ?>
            
            <article class="vmw__shopping__cart__item border border-tertiary-light-50 mb-1 p-1">
                <aside class="vmw__shopping__cart__thumbnail">
                    <?php
                        $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cartItem, $cartItemKey);
                        
                    if (! $product_permalink) {
                        print $thumbnail;
                    } else {
                        printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail);
                    }
                    ?>
                </aside>
                <main class="vmw__shopping__cart__content">
                    <h6 class="vmw__shopping__cart__name">
                        <?php
                        if (! $product_permalink) {
                            echo apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cartItem, $cartItemKey) . '&nbsp;';
                        } else {
                            echo apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cartItem, $cartItemKey);
                        }

                            // Meta data
                            // Like Vendor( soldBy)
//                            print wc_get_formatted_cart_item_data( $cartItem );

                            // Backorder notification
                        if ($_product->backorders_require_notification() && $_product->is_on_backorder($cartItem['quantity'])) {
                            echo '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>';
                        }
                        ?>
                    </h6>
                    <section class="vmw__shopping__cart__price">
                        <?php
                            printf(
                                '<span class="vmw__shopping__cart__quantity">%d x %s</span>',
                                $cartItem['quantity'],
                                apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cartItem, $cartItemKey)
                            );
                        ?>
                    </section>
                        <?php
                        // Quantity part
//                            if ( $_product->is_sold_individually() ) {
//                                $product_quantity = sprintf( '  <input type="hidden" name="cart[%s][qty]" value="1" />', $cartItemKey );
//                            } else {
//                                $product_quantity = woocommerce_quantity_input( array(
//                                    'input_name'  => "cart[{$cartItemKey}][qty]",
//                                    'input_value' => $cartItem['quantity'],
//                                    'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
//                                    'min_value'   => '0',
//                                ), $_product, false );
//                            }
//
//                            echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cartItemKey, $cartItem);
                        ?>
                        
                    <?php
                        echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cartItem['quantity']), $cartItem, $cartItemKey);
                    ?>
                </main>
            </article>
            <?php
        }
        if ($missing_amount > 0) {
            ?>
            <i class="fas fa-exclamation-triangle text-warning" aria-hidden="true"></i>
            Bestel voor nog <span class="text-primary">&euro; <?= str_replace('.', ',', money_format('%.2n', $missing_amount))?></span>
            bij <a href="<?=$sold_by['link']?>" title="<?=$sold_by['name']?>"><?=$sold_by['name']?></a>
            voor gratis verzending!
            <?php
        }
        ?>
        <hr>
        <?php
    }?>
        <footer class="shopping__cart__footer">
            <a class="btn bg-tertiary text-white p-2" href="<?=get_permalink(wc_get_page_id('cart'));?>">Winkelwagen bekijken</a>
            <a class="btn bg-success text-white p-2 ml-auto" href="<?=get_permalink(wc_get_page_id('checkout'));?>">Direct afrekenen</a>
            <a class="btn bg-transparent text-success border-success d-block p-2 mt-2 mt-sm-0 d-sm-inline-block continue-btn" href=".">Verder winkelen</a>
        </footer>
    </section>
    <?php
}

function the_recently_visited()
{
	$viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', wp_unslash( $_COOKIE['woocommerce_recently_viewed'] ) ) : array(); // @codingStandardsIgnoreLine
    $viewed_products = array_reverse(array_filter(array_map('absint', $viewed_products)));
    if (empty($viewed_products)) {
        return;
    }
    
    $query_args = array(
        'posts_per_page' => 1,
        'no_found_rows'  => 1,
        'post_status'    => 'publish',
        'post_type'      => 'product',
        'post__in'       => $viewed_products,
        'orderby'        => 'post__in',
    );
    
    $query_args['tax_query'] = array(
        array(
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'outofstock',
            'operator' => 'NOT IN',
        ),
    ); // WPCS: slow query ok.
    
    $r = new WP_Query(apply_filters('woocommerce_recently_viewed_products_widget_query_args', $query_args));
    if ($r->have_posts()) {
        while ($r->have_posts()) {
            $r->the_post();
            
            return $r->post->ID;
        }
    }
    \wp_reset_postdata();
}

function the_fa_rating($rating, $return = true)
{
    $max_rating = 5;
    
    $html = null;
    
    $html_filled = sprintf('<i class="fas fa-star text-primary"></i>');
    $html_outline = sprintf('<i class="far fa-star text-primary"></i>');
    
    for ($i = 0; $i < $rating; $i++) {
        $html .= $html_filled;
    }
    
    for ($i = 0; $i < ($max_rating - $rating); $i++) {
        $html .= $html_outline;
    }
    
    if ($return) {
        return $html;
    }
    
    print $html;
}

function is_verified_buyer()
{
    $bought = false;
    
    $customer_orders = get_posts(array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => 'shop_order', // WC orders post type
        'post_status' => 'wc-completed' // Only orders with status "completed"
    ));
    
    foreach ($customer_orders as $customer_order) {
        // Updated compatibility with WooCommerce 3+
        $order = wc_get_order($customer_order);
        
        // Iterating through each current customer products bought in the order
        foreach ($order->get_items() as $item) {
            // WC 3+ compatibility
            if (version_compare(WC_VERSION, '3.0', '<')) {
                $product_id = $item['product_id'];
            } else {
                $product_id = $item->get_product_id();
            }
            
            // Your condition related to your 2 specific products Ids
            if ($product_id === get_queried_object_id()) {
                $bought = true;
            }
        }
    }
    // return "true" if one the specifics products have been bought before by customer
    return $bought;
}

function the_wc_attribute($product, $attribute)
{
    if ($product instanceof WC_Product) {
        return get_post_meta($product->get_id(), $attribute, true);
    } elseif (is_int($product)) {
        $product = wc_get_product($product);
        return get_post_meta($product->get_id(), $attribute, true);
    }
    
    return null;
}
