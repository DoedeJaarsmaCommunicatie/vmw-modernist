<?php
/**
 * Created by PhpStorm.
 * User: mitch
 * Date: 2019-01-04
 * Time: 12:29
 */



add_filter( 'cron_schedules', 'example_add_cron_interval' );

function example_add_cron_interval( $schedules ) {
	$schedules['five_seconds'] = array(
		'interval' => 5,
		'display'  => esc_html__( 'Every Five Seconds' ),
	);
	
	return $schedules;
}

if ( !wp_next_scheduled( 'vmw_kiyoh_search') )
{
	wp_schedule_event( time(), 'five_seconds', 'vmw_kiyoh_search');
}
add_action('vmw_kiyoh_search', 'vmw_bd_kiyoh_search');

function vmw_bd_kiyoh_search()
{


//
//	if( $vmw )
//	{
//		/** @noinspection SummerTimeUnsafeTimeManipulationInspection */
//		set_transient('vmw_kiyoh_score', $vmw->getTotalScore(), 86400 );
//	} else {
//		set_transient('vmw_kiyoh_score', '9,9', 86400 );
//	}
}