<?php

if ( ! class_exists( 'Timber' ) ){
	echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
	
	return;
}

$context            = Timber::get_context();
$context['sidebar'] = Timber::get_widgets( 'shop-sidebar' );

if ( is_singular( 'product' ) ) {
	
	$context['post']        = Timber::get_post();
	$product                = wc_get_product( $context['post']->ID );
	$context['product']     = $product;
	
	$vendor                 = wp_get_post_terms( $context['product']->get_id(), 'wcpv_product_vendors' )[0];
	$context['vendor']      = new TimberTerm($vendor->term_id);
	$context['vendor_data'] = WC_Product_Vendors_Utils::get_vendor_data_by_id( $context['vendor']->id );
	
	$context['recent']      = Timber::get_post( the_recently_visited() );
	
	$comments = get_comments([
		'post_id'   => $context['post']->ID
	]);
	$cmt = [];
	foreach ($comments as $comment )
	{
		$cmt [] = new TimberComment( absint( $comment->comment_ID ) );
	}
	$context['comments']    = $cmt;
// Get related products
	$related_limit               =  2;
	$related_ids                 =  wc_get_related_products( $context['product']->get_id(), $related_limit );
	$context['related_products'] =  Timber::get_posts( $related_ids );
	
	if( count( $context[ 'related_products' ] ) < $related_limit )
	{
	
	}

// Restore the context and loop back to the main query loop.
	wp_reset_postdata();
	
	Timber::render( 'templates/woocommerce/single-product.twig', $context );
} else {
	$posts = Timber::get_posts();
	$context['products'] = $posts;
	
	if ( is_product_category() ) {
		$queried_object = get_queried_object();
		$term_id = $queried_object->term_id;
		$context['category'] = get_term( $term_id, 'product_cat' );
		$context['title'] = single_term_title( '', false );
	}
	
	Timber::render( 'templates/woocommerce/archive.twig', $context );
}