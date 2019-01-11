<?php
/**
 * FIXME: Bestellen boven bedrag => bedrag dynamisch maken.
 * FIXME: Add to cart AJAX
 * FIXME: Harde strings vertaalbaar of aanpasbaar maken.
 * FIXME: Winkelmand pagina Twiggen.
 * FIXME:
 * @package filters
 */

add_theme_support( 'woocommerce' );

/**
 * Require the helper files.
 */
array_map(
	function ( $file ) {
		$file = get_stylesheet_directory() . "/app/{$file}.php";
		load_template( $file, true );
	},
	[
		'init',
		
		'helpers/wc',
		'helpers/general',
		'helpers/header',
		'helpers/elementor',
		'helpers/wc_ajax',
		'helpers/class-vmw-kiyoh-fetcher',

		'filters/products',
		
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
function add_file_types_to_uploads( $file_types ) {
	$new_filetypes        = [];
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types           = array_merge( $file_types, $new_filetypes );
	return $file_types;
}
add_action( 'upload_mimes', 'add_file_types_to_uploads' );

/**
 * Enqueue scripts and styles.
 */
function vmw_scripts() {
	wp_enqueue_style( 'badubed-style', get_stylesheet_uri(), [], 201811, 'all' );
	wp_enqueue_style( 'badubed-font', 'https://fonts.googleapis.com/css?family=Signika:300,400,700', [] );
	wp_enqueue_style( 'vmw_general_styles', get_stylesheet_directory_uri() . '/styles/general.css', [], 201901, 'all' );
	wp_enqueue_style( 'vmw_products', get_stylesheet_directory_uri() . '/styles/product__card.css', [], 201811, 'all' );
	wp_enqueue_style( 'vmw_product', get_stylesheet_directory_uri() . '/styles/single__product.css', [], 201812, 'all' );
	wp_enqueue_style( 'vmw_shopping__cart', get_stylesheet_directory_uri() . '/styles/shopping__cart.css', [], 201812, 'all' );
	wp_enqueue_style( 'vendor__card', get_stylesheet_directory_uri() . '/styles/vendor__card.css', [], 201812, 'all' );
	
	wp_enqueue_script( 'navigation', get_stylesheet_directory_uri() . '/js/dropdown-menu.js', [], 201811, true );
	wp_enqueue_script( 'mobile-navigation', get_stylesheet_directory_uri() . '/js/mobile-menu.js', [], 201811, true );
	wp_enqueue_script( 'ajax_add_to_cart', get_stylesheet_directory_uri() . '/js/add_to_cart.js', [], 201812, true );
	wp_enqueue_script( 'plus_minus_functions', get_stylesheet_directory_uri() . '/js/plus-minus.js', [], 201812, true );
	
	if( is_front_page() ) {
		wp_enqueue_script( 'vue', get_stylesheet_directory_uri() . '/vue/vue.webpack.js', [], 201901, true );
	}
	
	
	if( is_archive() )
	{
		wp_enqueue_style( 'vmw_filter_styling', get_stylesheet_directory_uri() . '/styles/product__filter.css', [], 201812, 'all');
	}
	
	if (is_checkout() ) {
		wp_enqueue_style( 'vmw_filter_styling', get_stylesheet_directory_uri() . '/styles/checkout__form.css', [], 201901, 'all');
	}
	
	wp_localize_script( 'ajax_add_to_cart', 'vmw_ajax_object', [ 'ajax_url' => admin_url( 'admin-ajax.php' ) ]);
}
add_action( 'wp_enqueue_scripts', 'vmw_scripts' );

function set_user_visited_product_cookie() {
	global $post;
	
	if ( is_product() ){
		// manipulate your cookie string here, explode, implode functions
		wc_setcookie( 'woocommerce_recently_viewed', $post->ID );
	}
}

add_action( 'wp', 'set_user_visited_product_cookie' );

//add_action('init', function () {
//	add_rewrite_rule( '^winkel/land/([^/]*)/', 'index.php?p=5&pa_land=$matches[1]', 'top');
//	global $wp_rewrite;
//	$wp_rewrite->flush_rules(false);  // This should really be done in a plugin activation
//}, 10, 0);

//add_action( 'init', function () {
//	add_rewrite_tag( '%pa_land%', '([^&]+)');
//}, 10, 0);