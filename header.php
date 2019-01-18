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
	$pice = explode( '-', $_GET['product-price']);
	$wp_query->set('meta_query', [
		[
			'key'     => '_regular_price',
			'value'   => [$price[0], ((int) $price[1]) - 1],
			'compare' => 'BETWEEN',
			'type'  => 'NUMERIC'
		]
	]);
}

