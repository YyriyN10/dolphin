<?php
	
	
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

/**
* Register a blog post type.
*
* @link http://codex.wordpress.org/Function_Reference/register_post_type
*
* @since dolphincargo 1.0
*/

function blog_post_type() {

	$labels = array(
	'name'               => _x( 'Блог', 'post type general name', 'dolphincargo' ),
	'singular_name'      => _x( 'Блог', 'post type singular name', 'dolphincargo' ),
	'menu_name'          => _x( 'Блог', 'admin menu', 'dolphincargo' ),
	'name_admin_bar'     => _x( 'Блог', 'add new on admin bar', 'dolphincargo' ),
	'add_new'            => _x( 'Додати нову статтю', 'actions', 'dolphincargo' ),
	'add_new_item'       => __( 'Додати нову статтю', 'dolphincargo' ),
	'new_item'           => __( 'Нова стаття', 'dolphincargo' ),
	'edit_item'          => __( 'Редагувати статтю', 'dolphincargo' ),
	'view_item'          => __( 'Дивитись статтю', 'dolphincargo' ),
	'all_items'          => __( 'Всі статті', 'dolphincargo' ),
	'search_items'       => __( 'Шукати статтю', 'dolphincargo' ),
	'parent_item_colon'  => __( 'Батько статті:', 'dolphincargo' ),
	'not_found'          => __( 'Стаття не знайдено', 'dolphincargo' ),
	'not_found_in_trash' => __( 'У кошику статті не знайдно', 'dolphincargo' )
	);

	$args = array(
	'labels'             => $labels,
	'taxonomies'         => [],
	'description'        => __( 'Description.', 'blog' ),
	'public'             => true,
	'publicly_queryable' => true,
	'show_ui'            => true,
	'show_in_menu'       => true,
	'query_var'          => true,
	'rewrite'            => array( 'slug' => 'blog' ),
	'capability_type'    => 'post',
	'has_archive'        => false,
	'hierarchical'       => false,
	'exclude_from_search'=> false,
	'menu_position'      => 5,
	'menu_icon'          => 'dashicons-welcome-write-blog',
	'supports'           => array( 'title', 'editor',)
	);

	register_post_type( 'blog', $args );
}

add_action( 'init', 'blog_post_type' );

	/**
	 * Register a services post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since dolphincargo 1.0
	 */

	function services_post_type() {

		$labels = array(
			'name'               => _x( 'Наші послуги', 'post type general name', 'dolphincargo' ),
			'singular_name'      => _x( 'Наші послуги', 'post type singular name', 'dolphincargo' ),
			'menu_name'          => _x( 'Наші послуги', 'admin menu', 'dolphincargo' ),
			'name_admin_bar'     => _x( 'Наші послуги', 'add new on admin bar', 'dolphincargo' ),
			'add_new'            => _x( 'Додати нову послугу', 'actions', 'dolphincargo' ),
			'add_new_item'       => __( 'Додати нову послугу', 'dolphincargo' ),
			'new_item'           => __( 'Нова послуга', 'dolphincargo' ),
			'edit_item'          => __( 'Редагувати послугу', 'dolphincargo' ),
			'view_item'          => __( 'Дивитись послугу', 'dolphincargo' ),
			'all_items'          => __( 'Всі послуги', 'dolphincargo' ),
			'search_items'       => __( 'Шукати послугу', 'dolphincargo' ),
			'parent_item_colon'  => __( 'Батько послуги:', 'dolphincargo' ),
			'not_found'          => __( 'Послуг не знайдено', 'dolphincargo' ),
			'not_found_in_trash' => __( 'У кошику послуг не знайдно', 'dolphincargo' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'services' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'services' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 6,
			'menu_icon'          => 'dashicons-category',
			'supports'           => array( 'title', 'editor',)
		);

		register_post_type( 'services', $args );
	}

	add_action( 'init', 'services_post_type' );