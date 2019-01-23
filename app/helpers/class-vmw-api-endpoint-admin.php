<?php
/**
 * Created by PhpStorm.
 * User: mitch
 * Date: 2019-01-23
 * Time: 14:15
 */

class AdminEndpointApi
{
    public function __construct()
    {
        add_action('rest_api_init', [$this, 'registerRoute']);
    }
    
    public function registerRoute(): void
    {
        register_rest_route('wp/v2', '/product/(?P<id>\d+)', [
            'methods'   =>  'POST',
            'callback' => [ $this, 'connectVendorToProduct'],
            'args'  =>  [
                'id' => ['validate_callback' => function ($param, $request, $key) {
                    return is_numeric($param);
                }
            ]
        ]
        ]);
    }
    
    public function connectVendorToProduct(WP_REST_Request $request)
    {
        try {
            $product  = wc_get_product($request->get_param('id'));
        } catch (Exception $e) {
            return new WP_Error('Product not found', 'Het product is niet gevonden', [ 'status' => 404]);
        }
        
        if (!$request->get_param('wcpv_product_vendors')) {
            return new WP_Error('vendor not supplied', 'Er is geen vendor meegegeven', ['status' => 403]);
        }
        
        wp_set_post_terms($product->get_id(), [ (int) $request['wcpv_product_vendors'] ], 'wcpv_product_vendors') ;
    }
}

new AdminEndpointApi();
