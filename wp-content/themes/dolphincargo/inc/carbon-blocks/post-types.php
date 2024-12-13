<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_service_card' );

	function dolphincargo_service_card(){

		Container::make( 'post_meta', 'Послуга' )
		         ->where( 'post_type', '=', 'services' )

						->add_tab(  'Головний екран', array(
							Field::make_text('dolphincargo_service_single_main_screen_title'.dolphincargo_lang_prefix(), 'Головний заголовок'),
							Field::make_text('dolphincargo_service_single_main-screen_subtitle'.dolphincargo_lang_prefix(), 'Підзаголовок'),
							Field::make_image('dolphincargo_service_single_main-screen_image'.dolphincargo_lang_prefix(), 'Зображення')
							     ->set_type('image')
							     ->set_value_type('url'),

						) )
						->add_tab(  'Про послугу', array(
							Field::make_text('dolphincargo_service_single_about_cargo_count'.dolphincargo_lang_prefix(), 'Кількість апнтажів'),
							Field::make_text('dolphincargo_service_single_about_period'.dolphincargo_lang_prefix(), 'За який період'),
							Field::make_complex('dolphincargo_service_single_about_part_list'.dolphincargo_lang_prefix(), 'Перлік тез')
									->add_fields(array(
										Field::make_text('name', 'Заголовок'),
										Field::make_rich_text('description', 'Опис')
									)),
						) )
						->add_tab(  'Наші послуги', array(
							Field::make_text('dolphincargo_service_single_services_title'.dolphincargo_lang_prefix(), 'Заголовок блоку'),
							Field::make_complex('dolphincargo_service_single_services_list'.dolphincargo_lang_prefix(), 'Перлік послуг')
							     ->add_fields(array(
								     Field::make_text('name', 'Заголовок'),
								     Field::make_image('image', 'Зображення')
								      ->set_type('image')
								      ->set_value_type('url')
							     )),
						) )
						->add_tab(  'Заклик до дії', array(
							Field::make_text('dolphincargo_service_single_call_to_action_title'.dolphincargo_lang_prefix(), 'Заголовок блоку'),
							Field::make_text('dolphincargo_service_single_call_to_action_text'.dolphincargo_lang_prefix(), 'Заклик'),
						) )
						->add_tab(  'Як працюємо', array(
							Field::make_text('dolphincargo_service_single_how_we_work_title'.dolphincargo_lang_prefix(), 'Заголовок блоку'),
							Field::make_complex('dolphincargo_service_single_how_we_work_list'.dolphincargo_lang_prefix(), 'Перлік кроків')
							     ->add_fields(array(
								     Field::make_rich_text('text', 'Текст кроку'),
							     )),
						) )
						->add_tab(  'Переваги послуги', array(
							Field::make_text('dolphincargo_service_single_advantages_title'.dolphincargo_lang_prefix(), 'Заголовок блоку'),
							Field::make_image('dolphincargo_service_single_advantages_image'.dolphincargo_lang_prefix(), 'Зображення')
								->set_type('image'),
							Field::make_complex('dolphincargo_service_single_advantages_list'.dolphincargo_lang_prefix(), 'Перлік переваг')
							     ->add_fields(array(
							     	 Field::make_text('name', 'Назва переваги'),
								     Field::make_rich_text('text', 'Текст переваги'),
								     Field::make_image('icon', 'Іконка переваги')
								        ->set_type('image')
									      ->set_value_type('url'),
							     )),
						) )
						->add_tab(  'Що забезпечуємо', array(
							Field::make_text('dolphincargo_service_single_we_provide_title'.dolphincargo_lang_prefix(), 'Заголовок блоку'),
							Field::make_text('dolphincargo_service_single_we_provide_subtitle'.dolphincargo_lang_prefix(), 'Підзаголовок блоку'),
							Field::make_complex('dolphincargo_service_single_we_provide_list'.dolphincargo_lang_prefix(), 'Перлік гарантій')
							     ->add_fields(array(
								     Field::make_text('name', 'Назва гарантії'),
								     Field::make_complex('inner_list', 'Що входить')
											->add_fields(array(
												Field::make_text('text', 'Текст'),
												Field::make_image('icon', 'Іконка')
												     ->set_type('image')
												     ->set_value_type('url'),
											)),
							     )),
						) )
						->add_tab(  'Заклик до дії 2', array(
							Field::make_text('dolphincargo_service_single_call_to_action2_title'.dolphincargo_lang_prefix(), 'Заголовок блоку'),
							Field::make_text('dolphincargo_service_single_call_to_action2_text'.dolphincargo_lang_prefix(), 'Заклик'),
						) )
						->add_tab(  'F.A.Q.', array(
							Field::make_text('dolphincargo_service_single_faq_title'.dolphincargo_lang_prefix(), 'Заголовок блоку'),
							Field::make_complex('dolphincargo_service_single_faq_list'.dolphincargo_lang_prefix(), 'Перелік питань')
							     ->add_fields(array(
								     Field::make_text('question', 'Питання'),
								     Field::make_rich_text('answer', 'Відповідь'),

							     ))
						) )
						->add_tab(  'SEO блок', array(
							Field::make_text('dolphincargo_service_single_seo_title'.dolphincargo_lang_prefix(), 'Заголовок блоку'),
							Field::make_rich_text('dolphincargo_service_single_seo_text'.dolphincargo_lang_prefix(), 'Текст'),
						) );
	}