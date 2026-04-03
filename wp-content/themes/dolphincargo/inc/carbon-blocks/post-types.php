<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;


	add_action( 'carbon_fields_register_fields', 'dolphincargo_review_card' );

	function dolphincargo_review_card(){

		Container::make( 'post_meta', 'Відгук' )
		         ->where( 'post_type', '=', 'reviews' )

		         ->add_fields(array(
			         Field::make_text('dolphincargo_review_position'.dolphincargo_lang_prefix(), 'Посада')
		         ));
	}

	add_action( 'carbon_fields_register_fields', 'dolphincargo_service_page_custom_triger_class' );

	function dolphincargo_service_page_custom_triger_class() {
		Container::make( 'post_meta', 'Кастомізація')
		         ->where('post_type', '=', 'services')
		         ->set_context('side')

		         ->add_fields(array(
			         Field::make_text('custom_page_trigger_class', 'Кастомний клас сторінки')
		         ));

	}

