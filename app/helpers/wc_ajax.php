<?php
/**
 * Created by PhpStorm.
 * User: mitch
 * Date: 2018-12-11
 * Time: 11:46
 */

add_action('wp_ajax_vmw_ajax_add_to_cart_woo', 'vmw_ajax_add_to_cart_woo_callback');
add_action('wp_ajax_nopriv_vmw_ajax_add_to_cart_woo', 'vmw_ajax_add_to_cart_woo_callback');

function vmw_ajax_add_to_cart_woo_callback()
{
    ob_start();
    
    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST[ 'product_id' ]));
    $quantity = empty($_POST['quantity'])? 1 : apply_filters('woocommerce_stock_amount', absint($_POST['quantity']));
    
    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    
    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity)) {
        do_action('woocommerce_ajax_added_to_cart', $product_id);
        if (get_option('woocommerce_cart_redirect_after_add') === 'yes') {
            wc_add_to_cart_message($product_id);
        }
        
        the_big_shopping_cart();
        die();
    } else {
        $data = [
            'error' => true,
            'product_url'   =>  apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id),
        ];
        wp_send_json($data, 500);
    }
}
