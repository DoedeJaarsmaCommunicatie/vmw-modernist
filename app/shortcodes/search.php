<?php
/**
 * Created by PhpStorm.
 * User: mitch
 * Date: 2019-01-11
 * Time: 13:38
 */

add_shortcode( 'search_results', function ( $atts ) {
	$atts = shortcode_atts( [
		'tag'   =>  'h1',
		'class' =>  '',
		'id'    =>  '',
		'content' => 'Zoekresultaten voor:',
		'search' => $_GET['s']?? ''
	], $atts);
	
	return \Timber\Timber::render('templates/shortcodes/search_results.twig', $atts);
});