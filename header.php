<?php
/**
 * Created by PhpStorm.
 * User: mitch
 * Date: 2018-12-03
 * Time: 08:43
 */

$GLOBALS['timberContext'] = Timber::get_context();
ob_start();

if( isset($_GET['product-price'])) {
	global $wp_query;
	$wp_query->set('meta_query', [
		[
			'key'     => '_regular_price',
			'value'   => explode( '-', $_GET['product-price']),
			'compare' => 'BETWEEN',
			'type'  => 'NUMERIC'
		]
	]);
}

