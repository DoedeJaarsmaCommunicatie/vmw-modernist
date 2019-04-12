<?php
/**
 * FIXME: Bestellen boven bedrag => bedrag dynamisch maken.
 * FIXME: Harde strings vertaalbaar of aanpasbaar maken.
 * @package filters
 */

add_theme_support('woocommerce');

/**
 * Require the helper files.
 */
array_map(
    function ($file) {
        $file = get_stylesheet_directory() . "/app/{$file}.php";
        load_template($file, true);
    },
    [
        'init',
        
        'helpers/wc',
        'helpers/general',
        'helpers/header',
        'helpers/elementor',
        'helpers/wc_ajax',
        'helpers/class-vmw-kiyoh-fetcher',
        'helpers/class-vmw-api-endpoint-admin',

        'filters/products',
        'filters/wc',
        
        'shortcodes/vendors',
        'shortcodes/search',
        
        'actions/products_filter',
    ]
);

/**
 * Adds SVG to the file uploads
 *
 * @param array $file_types current file types.
 *
 * @return array
 */
function add_file_types_to_uploads($file_types)
{
    $new_filetypes        = [];
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types           = array_merge($file_types, $new_filetypes);
    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

/**
 * Enqueue scripts and styles.
 */
function vmw_scripts()
{
    wp_enqueue_style('badubed-style', get_stylesheet_uri(), [], 201811, 'all');
    wp_enqueue_style('badubed-font', 'https://fonts.googleapis.com/css?family=Signika:300,400,700', []);
    wp_enqueue_style('vmw_general_styles', get_stylesheet_directory_uri() . '/styles/general.css', [], 20190114, 'all');
    wp_enqueue_style('vmw_products', get_stylesheet_directory_uri() . '/styles/product__card.css', [], 201811, 'all');
    wp_enqueue_style('vmw_product', get_stylesheet_directory_uri() . '/styles/single__product.css', [], 201812, 'all');
    wp_enqueue_style('vmw_shopping__cart', get_stylesheet_directory_uri() . '/styles/shopping__cart.css', [], 201812, 'all');
    wp_enqueue_style('vendor__card', get_stylesheet_directory_uri() . '/styles/vendor__card.css', [], 201812, 'all');
    wp_enqueue_style('search_form_cdn', 'https://cdn.jsdelivr.net/gh/TarekRaafat/autoComplete.js@3.2.2/dist/css/autoComplete.min.css', [], 201901, 'all');
    
    
    wp_enqueue_script('navigation', get_stylesheet_directory_uri() . '/js/dropdown-menu.js', [], 201811, true);
    wp_enqueue_script('mobile-navigation', get_stylesheet_directory_uri() . '/js/mobile-menu.js', [], 201811, true);
    wp_enqueue_script('ajax_add_to_cart', get_stylesheet_directory_uri() . '/js/add_to_cart.js', [], 201812, true);
    wp_enqueue_script('plus_minus_functions', get_stylesheet_directory_uri() . '/js/plus-minus.js', [], 201812, true);
    wp_enqueue_script('search_form_autofiller_cdn', 'https://cdn.jsdelivr.net/gh/TarekRaafat/autoComplete.js@3.2.2/dist/js/autoComplete.min.js', [  ], 201901, true);
    wp_enqueue_script('search_form_autofiller', get_stylesheet_directory_uri() . '/js/search_form.webpack.js', [ ], 201901, true);
    
    if (is_front_page() || is_404()) {
        wp_enqueue_script('vue', get_stylesheet_directory_uri() . '/vue/vue.webpack.js', [], 201901, true);
    }
    
    if (is_archive()) {
        wp_enqueue_script('form_navi_mobi', get_stylesheet_directory_uri() . '/js/product-filter.js', [  ], 201901, true);
        wp_enqueue_script('paginator-clicker', get_stylesheet_directory_uri() . '/js/pagination-send-to-top.js', [  ], 201901, true);
        wp_enqueue_style('vmw_filter_styling', get_stylesheet_directory_uri() . '/styles/product__filter.css', [], 201812, 'all');
    }
    
    if (is_checkout() || is_cart()) {
        wp_enqueue_style('vmw_checkout_styling', get_stylesheet_directory_uri() . '/styles/checkout__form.css', [], 201901, 'all');
    }
    
    wp_localize_script('ajax_add_to_cart', 'vmw_ajax_object', [ 'ajax_url' => admin_url('admin-ajax.php') ]);
}
add_action('wp_enqueue_scripts', 'vmw_scripts');

function set_user_visited_product_cookie()
{
    global $post;
    
    if (is_product()) {
        // manipulate your cookie string here, explode, implode functions
        wc_setcookie('woocommerce_recently_viewed', $post->ID);
    }
}

add_action('wp', 'set_user_visited_product_cookie');

//add_action('init', function () {
//	add_rewrite_rule( '^winkel/land/([^/]*)/', 'index.php?p=5&pa_land=$matches[1]', 'top');
//	global $wp_rewrite;
//	$wp_rewrite->flush_rules(false);  // This should really be done in a plugin activation
//}, 10, 0);

//add_action( 'init', function () {
//	add_rewrite_tag( '%pa_land%', '([^&]+)');
//}, 10, 0);

/**
 * Save product attributes to post metadata when a product is saved.
 *
 * @param int $post_id The post ID.
 * @param post $post The post object.
 * @param bool $update Whether this is an existing post being updated or not.
 *
 * Refrence: https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 */
function wh_save_product_custom_meta($post_id, $post, $update) {
	$post_type = get_post_type($post_id);
	// If this isn't a 'product' post, don't update it.
	if ($post_type != 'product')
		return;
	
	if (!empty($_POST['attribute_names']) && !empty($_POST['attribute_values'])) {
		$attribute_names = $_POST['attribute_names'];
		$attribute_values = $_POST['attribute_values'];
		foreach ($attribute_names as $key => $attribute_name) {
			switch ($attribute_name) {
				//for color (string)
				case 'pa_hamersma':
					//it may have multiple color (eg. black, brown, maroon, white) but we'll take only the first color.
					if (!empty($attribute_values[$key][0])) {
						update_post_meta($post_id, 'pa_hamersma', $attribute_values[$key][0]);
					}
					break;
				default:
					break;
			}
		}
	}
}

add_action( 'save_post', 'wh_save_product_custom_meta', 10, 3);


/**
 * Add custom sorting options (asc/desc)
 */
add_filter( 'woocommerce_get_catalog_ordering_args', function ( $args ) {
	$orderby_value = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
	if ( 'hamersma' == $orderby_value ) {
		$args['order'] = 'DESC';
		$args['meta_key'] = 'pa_hamersma';
		$args['orderby'] = 'meta_value';
	}
	return $args;
} );

add_filter( 'woocommerce_default_catalog_orderby_options', 'custom_woocommerce_catalog_orderby' );
add_filter( 'woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby' );
function custom_woocommerce_catalog_orderby( $sortby ) {
	$sortby['hamersma'] = 'Hamersma Score';
	return $sortby;
}
