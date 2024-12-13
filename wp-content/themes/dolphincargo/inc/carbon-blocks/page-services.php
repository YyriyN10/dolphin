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
			         Field::make_text('dolphincargo_services_page_main_screen_title', 'Головний заголовок'),
			         Field::make_text('dolphincargo_services_page_main_screen_text', 'Текст'),
			         Field::make_image('dolphincargo_services_page_main_screen_page_main-screen_image', 'Зображення')
			              ->set_type('image')
		                ->set_value_type('url'),

		         ) )
						->add_tab(  'Заклик до дії', array(
							Field::make_text('dolphincargo_services_page_call_to_action_title'.dolphincargo_lang_prefix(), 'Заголовок блоку'),
							Field::make_text('dolphincargo_services_page_call_to_action_text'.dolphincargo_lang_prefix(), 'Заклик'),
						) )
						->add_tab(  'F.A.Q.', array(
							Field::make_text('dolphincargo_services_page_faq_title'.dolphincargo_lang_prefix(), 'Заголовок блоку'),
							Field::make_complex('dolphincargo_services_page_faq_list'.dolphincargo_lang_prefix(), 'Перелік питань')
							     ->add_fields(array(
								     Field::make_text('question', 'Питання'),
								     Field::make_rich_text('answer', 'Відповідь'),

							     ))
						) )
						->add_tab(  'SEO блок', array(
							Field::make_text('dolphincargo_services_page_seo_title'.dolphincargo_lang_prefix(), 'Заголовок блоку'),
							Field::make_rich_text('dolphincargo_services_page_seo_text'.dolphincargo_lang_prefix(), 'Текст'),
						) );

	}