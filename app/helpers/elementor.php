<?php
/**
 * Created by PhpStorm.
 * User: mitch
 * Date: 2018-11-29
 * Time: 11:04
 */

function vmw_register_elementor_locations( $elementor_theme_manager ) {
	
	$elementor_theme_manager->register_location(
		'footer-widgets',
		[
			'label' => __( 'Widgets footer', 'vmw' ),
			'multiple' => false,
			'edit_in_content' => false,
		]
	);
	
	$elementor_theme_manager->register_location(
		'footer-image',
		[
			'label'             =>  __( 'Footer images', 'vmw'),
			'multiple'          =>  false,
			'edit_in_content'   =>  false,
		]
	);
	
	$elementor_theme_manager->register_location(
		'footer-disclaimer',
		[
			'label'             =>  __( 'Footer disclaimer', 'vmw'),
			'multiple'          =>  false,
			'edit_in_content'   =>  false,
		]
	);

}
add_action( 'elementor/theme/register_locations', 'vmw_register_elementor_locations' );