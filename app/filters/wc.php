<?php
/**
 * Created by PhpStorm.
 * User: mitch
 * Date: 2019-01-14
 * Time: 08:29
 */

add_filter('woocommerce_catalog_orderby', 'wc_customize_product_sorting');

function wc_customize_product_sorting($sorting_options){
	/** @noinspection SuspiciousAssignmentsInspection */
	$sorting_options = array(
		'menu_order' => __( 'Meest relevant', 'woocommerce' ),
		'popularity' => __( 'Best verkocht', 'woocommerce' ),
		'rating'     => __( 'Best beoordeeld', 'woocommerce' ),
		'date'       => __( 'Nieuwste', 'woocommerce' ),
		'price'      => __( 'Prijs laag-hoog', 'woocommerce' ),
		'price-desc' => __( 'Prijs hoog-laag', 'woocommerce' ),
	);
	
	return $sorting_options;
}