<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


	/**
	 * Create Block Category
	 */

	function yuna_custom_block_category( $categories, $post ){

		$new = array(
			array(
				'slug'  => 'dcs-business_trip_block-category',
				'title' => 'DCS Business trips and support in China',
				'icon'  => 'admin-home',
			),
			array(
				'slug'  => 'dcs-inner-block-category',
				'title' => 'Inner Blocks',
				'icon'  => 'category',
			),
			array(
				'slug'  => 'dcs-common-block-category',
				'title' => 'DCS Common Blocks',
				'icon'  => 'category',
			),
		);

		// додати свої категорії на початок списку
		return array_merge( $new, $categories );

	}

	add_filter( 'block_categories_all', 'yuna_custom_block_category', 10, 2);


/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function yuna_custom_blocks_init() {

	register_block_type( __DIR__ . '/build/dcs-business-trip-hero' );

	register_block_type( __DIR__ . '/build/dcs-business-trip-advantages' );
	register_block_type( __DIR__ . '/build/dcs-business-trip-advantages-inner' );

	register_block_type( __DIR__ . '/build/dcs-business-trip-group-container' );

	register_block_type( __DIR__ . '/build/dcs-business-trip-our-support' );
	register_block_type( __DIR__ . '/build/dcs-business-trip-our-support-inner' );

	register_block_type( __DIR__ . '/build/dcs-business-trip-problem' );
	register_block_type( __DIR__ . '/build/dcs-business-trip-problem-inner' );

	register_block_type( __DIR__ . '/build/dcs-business-trip-our-cooperation-formats' );
	register_block_type( __DIR__ . '/build/dcs-business-trip-our-cooperation-formats-inner' );

	register_block_type( __DIR__ . '/build/dcs-business-trip-call-to-action-full-image' );

	register_block_type( __DIR__ . '/build/dcs-business-trip-why-choose-us' );

	register_block_type( __DIR__ . '/build/dcs-business-trip-tour' );

	register_block_type( __DIR__ . '/build/dcs-business-trip-numbers' );
	register_block_type( __DIR__ . '/build/dcs-business-trip-numbers-inner' );

	register_block_type( __DIR__ . '/build/dcs-business-trip-what-you-get' );
	register_block_type( __DIR__ . '/build/dcs-business-trip-what-you-get-inner' );

	register_block_type( __DIR__ . '/build/dcs-common-reviews' );

	register_block_type( __DIR__ . '/build/dcs-common-faq' );
	register_block_type( __DIR__ . '/build/dcs-common-faq-inner' );

	register_block_type( __DIR__ . '/build/dcs-common-posts-slider' );

}
add_action( 'init', 'yuna_custom_blocks_init' );






