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

		$categories[] = array(
			'slug'  => 'dolphincargo-how-category',
			'title' => 'Dolphin Cargo How work',
			'icon'  => 'admin-tools'
		);

		$categories[] = array(
			'slug'  => 'dolphincargo-reviews-category',
			'title' => 'Dolphin Cargo Reviews Blocks',
			'icon'  => 'testimonial'
		);

		$categories[] = array(
			'slug'  => 'dolphincargo-contact-category',
			'title' => 'Dolphin Cargo Contacts',
			'icon'  => 'index-card'
		);

		$categories[] = array(
			'slug'  => 'dolphincargo-thx-category',
			'title' => 'Dolphin Cargo Thank you!',
			'icon'  => 'heart'
		);

		$categories[] = array(
			'slug'  => 'dolphincargo-blog-post-category',
			'title' => 'Dolphin Cargo Blog Post',
			'icon'  => 'edit-page'
		);

		return $categories;
	} );

	/**
	 * Add Blocks
	 */

	require ('carbon-blocks/page-option.php');
	/*require ('carbon-blocks/post-types.php');*/
	require ('carbon-blocks/page-home.php');
	require ('carbon-blocks/page-about.php');
	require ('carbon-blocks/page-how-we-work.php');
	/*require ('carbon-blocks/page-services.php');*/

require ('carbon-blocks/home-main-screen.php');
require ('carbon-blocks/home-what-you-get.php');
require ('carbon-blocks/home-call-to.php');
require ('carbon-blocks/block-about-us.php');
require ('carbon-blocks/block-advantages.php');
require ('carbon-blocks/block-reviews.php');
require ('carbon-blocks/block-faq.php');
require ('carbon-blocks/blocl-blog.php');
require ('carbon-blocks/block-seo.php');
require ('carbon-blocks/service-main-screen.php');
require ('carbon-blocks/block-other-services.php');
require ('carbon-blocks/block-achievement.php');
require ('carbon-blocks/block-warranty.php');
require ('carbon-blocks/block-calculate-shipping.php');
require ('carbon-blocks/block-delivery-steps.php');
require ('carbon-blocks/block-advantages-delivery.php');
require ('carbon-blocks/block-csrgo-services.php');
require ('carbon-blocks/block-call-to-action.php');
require ('carbon-blocks/blocl-contact-content.php');
require ('carbon-blocks/block-contact-main-screen.php');
require ('carbon-blocks/block-thx.php');
require ('carbon-blocks/block-slogan.php');
require ('carbon-blocks/block-cooperation-stage.php');
require ('carbon-blocks/block-representation.php');
require ('carbon-blocks/block-blog-post-text-part.php');
require ('carbon-blocks/block-blog_post_media_part.php');