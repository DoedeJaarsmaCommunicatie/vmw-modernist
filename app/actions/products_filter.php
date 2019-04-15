<?php
/**
 * Created by PhpStorm.
 * User: mitch
 * Date: 2018-12-12
 * Time: 08:18
 */


use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Hamersma Score')
	->where('post_type', '=', 'product')
	->add_fields(
		Field::make('select', 'hamersma_score' , __('Choose Options'))
			->set_options(
				[
					'7.2'       => '7.2',
					'7.8'       => '7.8',
					'8'         => '8',
					'8.2'       => '8.2',
					'8.5'       => '8.5',
					'8.8'       => '8.8',
					'9'         => '9',
					'9.2'       => '9.2',
					'9.5'       => '9.5',
					'9.8'       => '9.8',
				]
			)
	);
