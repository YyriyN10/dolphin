<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_services_page' );

	function dolphincargo_services_page() {
		Container::make( 'post_meta', 'Головна')
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
			         $homeFields->where( 'post_template', '=', 'template-services.php' );
		         } )

		         ->add_tab(  'Головний екран', array(
			         Field::make_text('food_home_page_main_screen_title', 'Головний заголовок'),
			         Field::make_text('food_home_page_main-screen_text', 'Текст'),
			         Field::make_image('food_home_page_main-screen_image', 'Зображення')
			              ->set_type('image'),
			         Field::make_complex('food_home_page_main-screen_image_spices', 'Зображення спецій')
			              ->add_fields(array(
				              Field::make_image('image', 'Зображення спеції')
				                   ->set_type('image')
			              ))

		         ) );

	}