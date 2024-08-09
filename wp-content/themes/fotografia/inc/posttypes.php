<?php
/**
 * Fotografia posttypes and taxonomies
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fotografia
 */
register_post_type(
	'portfolio',
	array(
		'labels' => array(
			'name' => __('Portfolio'),
			'singular_name' => __('Portfolio'),
			'add_new' => __('New portfolio item'),
			'add_new_item' => __('New portfolio item'),
			'edit' => __('Edit portfolio item'),
			'edit_item' => __('Edit portfolio item'),
			'new_item' => __('New portfolio item'),
			'view' => __('View portfolio item'),
			'view_item' => __('View portfolio item'),
			'search_items' => __('Search portfolio items'),
			'not_found' => __('Not found'),
			'not_found_in_trash' => __('Not found'),
		),
		'public' => true,
		'show_ui' => true,
		'menu_position' => 18,
		'query_var' => true,
		'supports' => array('title', 'thumbnail', 'editor'),
		'rewrite' => array('slug' => 'portfolio', 'with_front' => false),
		'can_export' => true
	)
);