<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_service_card' );

	function dolphincargo_service_card(){

		Container::make( 'post_meta', 'Сервіс' )
		         ->where( 'post_type', '=', 'services' )
		         ->add_fields( array(
			         Field::make_textarea('dolphincargo_service_card_text', 'Текст відгуку' ),
		         ) );
	}