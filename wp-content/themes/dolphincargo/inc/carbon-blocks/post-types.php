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

