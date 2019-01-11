<?php
/**
 * Created by PhpStorm.
 * User: mitch
 * Date: 2019-01-11
 * Time: 13:13
 */

if( class_exists( 'Timber') ) {
	
	$context = \Timber\Timber::get_context();
	
	$posts = Timber::get_posts();
	$context['posts'] = $posts;
	
	Timber::render( 'templates/search.twig', $context );
}