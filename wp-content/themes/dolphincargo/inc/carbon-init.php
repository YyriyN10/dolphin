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

		$categories[] = array(
			'slug'  => 'dolphincargo-price-page-category',
			'title' => 'Dolphin Cargo Price Page',
			'icon'  => 'money-alt'
		);

		$categories[] = array(
			'slug'  => 'dolphincargo-taobao-page-category',
			'title' => 'Dolphin Cargo Taobao Page',
			'icon'  => 'admin-page'
		);

		$categories[] = array(
			'slug'  => 'dolphincargo-calculator-page-category',
			'title' => 'Dolphin Calculator Page',
			'icon'  => 'calculator'
		);

		$categories[] = array(
			'slug'  => 'dolphincargo-containers-page-category',
			'title' => 'Dolphin Containers Page',
			'icon'  => 'screenoptions'
		);

		return $categories;
	} );

	/**
	 * Add Blocks
	 */

	require ('carbon-blocks/page-option.php');
	/*require ('carbon-blocks/post-types.php');*/
	/*require ('carbon-blocks/page-home.php');
	require ('carbon-blocks/page-about.php');
	require ('carbon-blocks/page-how-we-work.php');*/
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
require ('carbon-blocks/block-problem.php');
require ('carbon-blocks/block-problem-solving.php');
require ('carbon-blocks/block-how-we-work.php');
require ('carbon-blocks/block-about-us-main-screen.php');
require ('carbon-blocks/block-about-company.php');
require ('carbon-blocks/block-our-goals.php');

require ('carbon-blocks/block-price-main-screen.php');
require ('carbon-blocks/block-price-service-list.php');
require ('carbon-blocks/block-price-why-us.php');

require ('carbon-blocks/block-taobao-main-screen.php');
require ('carbon-blocks/block-taobao-more-choice.php');
require ('carbon-blocks/block-taobao-difficulties-solutions.php');
require ('carbon-blocks/block-taobao-how-order.php');
require ('carbon-blocks/block-taobao-call-to-action.php');
require ('carbon-blocks/block-taobao-price.php');

require ('carbon-blocks/block-calculator-how-get-price.php');
require ('carbon-blocks/block-calculator-main-sceen.php');
require ('carbon-blocks/block-calculator-form.php');

require ('carbon-blocks/block-container-main-screen.php');
require ('carbon-blocks/block-container-call.php');
require ('carbon-blocks/block-container-how-order.php');
require ('carbon-blocks/block-container-size.php');
require ('carbon-blocks/block-container-types.php');
require ('carbon-blocks/block-container-call-animation.php');
require ('carbon-blocks/block-container-trust.php');
