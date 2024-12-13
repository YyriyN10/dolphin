<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;
	use Carbon_Fields\Block;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_home_page' );

	function dolphincargo_home_page() {
		Container::make( 'post_meta', 'Головна')
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
			         $homeFields->where( 'post_template', '=', 'template-home.php' );
		         } )

		         ->add_tab(  'Головний екран', array(
			         Field::make_text('dolphincargo_home_page_main_screen_title'.dolphincargo_lang_prefix(), 'Головний заголовок'),
			         Field::make_text('dolphincargo_home_page_main-screen_who_are_we'.dolphincargo_lang_prefix(), 'Чим займаємось'),
			         Field::make_text('dolphincargo_home_page_main-screen_slogan'.dolphincargo_lang_prefix(), 'Слоган'),
			         Field::make_image('dolphincargo_home_page_main-screen_image'.dolphincargo_lang_prefix(), 'Зображення')
			              ->set_type('image')
		                ->set_value_type('url'),

		         ) )
						->add_tab(  'Наші числа', array(
							Field::make_complex('dolphincargo_home_page_our_numbers_list'.dolphincargo_lang_prefix(), 'Перелік здобутків у числах')
								->add_fields(array(
									Field::make_text('number', 'Число'),
									Field::make_text('number_more', 'Додаткове значення'),
									Field::make_text('description', 'Опис числа')
								))

						) )
						->add_tab(  'Що надаємо', array(
							Field::make_complex('dolphincargo_home_page_what_we_provide_list'.dolphincargo_lang_prefix(), 'Перелік того що надаємо')
							     ->add_fields(array(
								     Field::make_text('text', 'Твердження'),
								     Field::make_image('image', 'Іконка')
								      ->set_type('image')
								      ->set_value_type('url')
							     ))
						) )
						->add_tab(  'Наші послуги', array(
							Field::make_text('dolphincargo_home_page_our_services_title'.dolphincargo_lang_prefix(), 'Заголовок блоку'),
							Field::make_complex('dolphincargo_home_page_our_services_list'.dolphincargo_lang_prefix(), 'Перелік послуг')
							     ->add_fields(array(
								     Field::make_text('name', 'Назва послуги'),
								     Field::make_text('description', 'Опис послуги'),
								     Field::make_image('image', 'Зображення послуги')
								          ->set_type('image'),
								     Field::make_text('link', 'Постлання на сторінку послуги')
								          ->set_attribute('type', 'url')

							     ))
						) )
						->add_tab(  'Заклик до дії', array(
							Field::make_text('dolphincargo_home_page_call_to_action_title'.dolphincargo_lang_prefix(), 'Заголовок блоку'),
							Field::make_text('dolphincargo_home_page_call_to_action_text'.dolphincargo_lang_prefix(), 'Заклик'),
						) )
						->add_tab(  'Про нас', array(
							Field::make_text('dolphincargo_home_page_about_us_title'.dolphincargo_lang_prefix(), 'Заголовок блоку'),
							Field::make_rich_text('dolphincargo_home_page_about_us_text'.dolphincargo_lang_prefix(), 'Текст'),
							Field::make_image('dolphincargo_home_page_about_us_image', 'Зображення блоку')
									->set_type('image'),
							Field::make_text('dolphincargo_home_page_about_us_link'.dolphincargo_lang_prefix(), 'Посилання на сторінку')
								->set_attribute('type', 'url')

						) )
						->add_tab(  'Переваги', array(
							Field::make_text('dolphincargo_home_page_advantages_title'.dolphincargo_lang_prefix(), 'ЗЗаголовок блоку'),
							Field::make_complex('dolphincargo_home_page_advantages_list'.dolphincargo_lang_prefix(), 'Перелік переваг')
							     ->add_fields(array(
								     Field::make_text('name', 'Назва переваги'),
								     Field::make_text('description', 'Опис переваги'),
								     Field::make_image('image', 'Зображення переваги')
								          ->set_type('image')
							            ->set_value_type('url'),

							     ))
						) )
						->add_tab(  'Калькулятор', array(
							Field::make_text('dolphincargo_home_page_calculator_title'.dolphincargo_lang_prefix(), 'Заголовок блоку'),
							Field::make_text('dolphincargo_home_page_calculator_subtitle'.dolphincargo_lang_prefix(), 'Підзаголовок'),
						) )
						->add_tab(  'F.A.Q.', array(
							Field::make_text('dolphincargo_home_page_faq_title'.dolphincargo_lang_prefix(), 'Заголовок блоку'),
							Field::make_complex('dolphincargo_home_page_faq_list'.dolphincargo_lang_prefix(), 'Перелік питань')
							     ->add_fields(array(
								     Field::make_text('question', 'Питання'),
								     Field::make_rich_text('answer', 'Відповідь'),

							     ))
						) )
						->add_tab(  'SEO блок', array(
							Field::make_text('dolphincargo_home_page_seo_title'.dolphincargo_lang_prefix(), 'Заголовок блоку'),
							Field::make_rich_text('dolphincargo_home_page_seo_text'.dolphincargo_lang_prefix(), 'Текст'),
						) );

	}



