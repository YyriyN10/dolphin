<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Add Carbon Fields
	 */

	add_action( 'after_setup_theme', 'carbon_load' );

	function carbon_load() {
		require get_template_directory() . '/vendor/autoload.php';
		\Carbon_Fields\Carbon_Fields::boot();
	}

	/**
	 * WPML Support
	 */

	function dolphincargo_lang_prefix() {
		$prefix = '';
		if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
			return $prefix;
		}

		$prefix = '_' . ICL_LANGUAGE_CODE;
		return $prefix;
	}

	/**
	 * Create Block Category
	 */

	add_filter( 'block_categories_all' , function( $categories ) {

		$categories[] = array(
			'slug'  => 'dolphincargo-custom-category',
			'title' => 'Dolphin Cargo Blocks',
			'icon'  => 'admin-home'
		);

		$categories[] = array(
			'slug'  => 'dolphincargo-common-category',
			'title' => 'Dolphin Cargo Common Blocks',
			'icon'  => 'admin-site'
		);

		$categories[] = array(
			'slug'  => 'dolphincargo-services-category',
			'title' => 'Dolphin Cargo Services Blocks',
			'icon'  => 'welcome-widgets-menus'
		);

		return $categories;
	} );

	/**
	 * Add Blocks
	 */

	require ('carbon-blocks/page-option.php');
	require ('carbon-blocks/post-types.php');
	require ('carbon-blocks/page-home.php');
	require ('carbon-blocks/page-about.php');
	require ('carbon-blocks/page-how-we-work.php');
	require ('carbon-blocks/page-services.php');

require ('carbon-blocks/home-main-screen.php');
require ('carbon-blocks/home-what-you-get.php');