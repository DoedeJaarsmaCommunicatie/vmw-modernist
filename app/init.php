<?php
/**
 * Created by PhpStorm.
 * User: mitch
 * Date: 2019-01-08
 * Time: 13:35
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vmw_sidebar_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Archive header', BADUBED_TRANSLATION_STRING ),
		'id'            => 'sidebar-archive',
		'description'   => esc_html__( 'Add widgets here.', BADUBED_TRANSLATION_STRING ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'vmw_sidebar_init' );


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page([
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	]);

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Product settings',
		'menu_title'	=> 'Product',
		'parent_slug'	=> 'theme-options',
	));
}

