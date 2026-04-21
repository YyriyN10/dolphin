<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_options' );

	function dolphincargo_options(){
		Container::make( 'theme_options', __('Options'))
		         ->set_icon( 'dashicons-admin-generic' )
		         ->add_tab( 'Контакти', array(
			         Field::make_text('dolphincargo_option_rial_address'.dolphincargo_lang_prefix(), 'Адреса клініки'),
			         Field::make_complex('dolphincargo_option_contact_phone_list', 'Перелік контактних телефонів')
								->add_fields(array(
									Field::make_text('phone', 'Контактний телефон'),
								)),
			         Field::make_text('dolphincargo_option_contact_email', 'Контактний email')
		            ->set_attribute('type', 'email'),

		         ) )
						->add_tab( 'Соціальні мережі', array(
							Field::make_complex('dolphincargo_option_social_list', 'Перелік соціальних мереж')
								->add_fields(array(
									Field::make_text('name', 'Назва соціальної мережі'),
									Field::make_text('link', 'Посилання на соціальну мережу')
										->set_attribute('type', 'url'),
								))

						) )

		         ->add_tab( 'Опції сайту', array(
		         	  Field::make_image('dolphincargo_option_logo', 'Логотип')
									->set_type('image')
									->set_value_type('url'),
			         Field::make_association('policy_page', 'Сторінка політики конфіденційності')
			              ->set_types( array(
				              array(
					              'type'      => 'post',
					              'post_type' => 'page',
				              )
			              ) )
			              ->set_max( 1 ),
			         Field::make_association('blog_ua_page', 'Сторінка блогу для Української версії')
			              ->set_types( array(
				              array(
					              'type'      => 'post',
					              'post_type' => 'page',
				              )
			              ) )
			              ->set_max( 1 ),
			         Field::make_association('blog_ru_page', 'Сторінка блогу для російської версії')
			              ->set_types( array(
				              array(
					              'type'      => 'post',
					              'post_type' => 'page',
				              )
			              ) )
			              ->set_max( 1 ),
			         Field::make_text('dolphincargo_option_blog_posts_page', 'Вкажіть кількість постів на сторінці блогу')
			          ->set_attribute('type', 'number'),
			         Field::make_image('dolphincargo_option_marque_image', 'Логотип у бігучий рядок')
			              ->set_type('image')
			              ->set_value_type('url'),
			         Field::make_association('privacy_ua_page', 'Сторінка політики приватності Української версії')
			              ->set_types( array(
				              array(
					              'type'      => 'post',
					              'post_type' => 'page',
				              )
			              ) )
			              ->set_max( 1 ),
			         Field::make_association('privacy_ru_page', 'Сторінка політики приватності російської версії')
			              ->set_types( array(
				              array(
					              'type'      => 'post',
					              'post_type' => 'page',
				              )
			              ) )
			              ->set_max( 1 ),
			         Field::make_image('new_footer_image', 'Зображення для футеру')
			          ->set_width(30)
		         ) )

		         ->add_tab( 'Опції форми', array(
								Field::make_image('dolphincargo_option_form_image', 'Зображення у блоці з формою')
			            ->set_type('image'),

			         Field::make_association('dolphincargo_option_form_thx_page_ua', 'Сторінка подяки Української мови')
			              ->set_types( array(
				              array(
					              'type'      => 'post',
					              'post_type' => 'page',
				              )
			              ) )
			              ->set_max( 1 ),

			         Field::make_association('dolphincargo_option_form_thx_page_ru', 'Сторінка подяки російської мови')
			              ->set_types( array(
				              array(
					              'type'      => 'post',
					              'post_type' => 'page',
				              )
			              ) )
			              ->set_max( 1 ),

			         Field::make_association('dolphincargo_option_form_thx_page_en', 'Сторінка подяки Англійської мови')
			              ->set_types( array(
				              array(
					              'type'      => 'post',
					              'post_type' => 'page',
				              )
			              ) )
			              ->set_max( 1 ),
			         Field::make_complex('dolphincargo_option_form_mail_to_list', 'пошти для резервного збеореження заявок')
			          ->add_fields(array(
			          	Field::make_text('mail', 'Пошта')
				            ->set_attribute('type', 'email')
			          )),

			         Field::make_separator('dolphincargo_option_form_como', 'Налаштування для ComoCRM'),
							 Field::make_text('dolphincargo_option_form_como_subdomen', 'Назва субдомену'),
							 Field::make_textarea('dolphincargo_option_form_como_token', 'Токен доступу'),
							 Field::make_text('dolphincargo_option_form_como_funnel_id', 'ID воронки')
							 	->set_attribute('type', 'number'),
							 Field::make_text('dolphincargo_option_form_como_funnel_stage_id', 'ID етапу воронки')
							 	->set_attribute('type', 'number'),
							 Field::make_text('dolphincargo_option_form_como_lid_creator_user_id', 'ID користувача, створюючого лід')
							 	->set_attribute('type', 'number'),
			         Field::make_text('dolphincargo_option_form_como_utm_source', 'ID поля для utm_source')
			          ->set_attribute('type', 'number'),
			         Field::make_text('dolphincargo_option_form_como_utm_medium', 'ID поля для utm_medium')
			              ->set_attribute('type', 'number'),
			         Field::make_text('dolphincargo_option_form_como_utm_campaign', 'ID поля для utm_campaign')
			              ->set_attribute('type', 'number'),
			         Field::make_text('dolphincargo_option_form_como_utm_content', 'ID поля для utm_content')
			              ->set_attribute('type', 'number'),
			         Field::make_text('dolphincargo_option_form_como_utm_term', 'ID поля для utm_term')
			              ->set_attribute('type', 'number'),
			         Field::make_text('dolphincargo_option_form_como_lead_url', 'ID поля для URL сторінки з якої надіслана заявка')
			              ->set_attribute('type', 'number'),
			         Field::make_text('dolphincargo_option_form_como_calc_volume', 'ID поля для значення обʼєму з калькулятора')
			              ->set_attribute('type', 'number'),
			         Field::make_text('dolphincargo_option_form_como_product_cat', 'ID поля для категорії товару з калькулятора')
			              ->set_attribute('type', 'number'),
			         Field::make_text('dolphincargo_option_form_como_massage', 'ID поля для коментаря')
			              ->set_attribute('type', 'number'),

		         ) );
	}

	/**
	 * Trigger class to custom page styles
	 */

	add_action( 'carbon_fields_register_fields', 'dolphincargo_page_custom_triger_class' );

	function dolphincargo_page_custom_triger_class() {
		Container::make( 'post_meta', 'Кастомізація')
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
		         } )
							->set_context('side')

		         ->add_fields(array(
		         	  Field::make_text('custom_page_trigger_class', 'Кастомний клас сторінки')
		         ));

	}

	add_action( 'carbon_fields_register_fields', 'dolphincargo_service_page_custom_trigger_class' );

	function dolphincargo_service_page_custom_trigger_class() {
		Container::make( 'post_meta', 'Кастомізація')
		         ->where('post_type', '=', 'services')
		         ->set_context('side')

		         ->add_fields(array(
			         Field::make_text('custom_page_trigger_class', 'Кастомний клас сторінки')
		         ));

	}

	/**
	 * Anchor Menu
	 */

	add_action( 'carbon_fields_register_fields', 'dolphincargo_page_anchor_menu_trigger' );

	function dolphincargo_page_anchor_menu_trigger() {
		Container::make( 'post_meta', 'Якірне меню')
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
		         } )
		         ->set_context('side')

		         ->add_fields(array(
			         Field::make_checkbox('anchor_menu_trigger', 'Вивести якірне меню?')
				         ->set_option_value( 'yes' ),
			         Field::make_complex('anchor_menu', 'Меню')
				         ->set_conditional_logic( array(
					         array(
						         'field' => 'anchor_menu_trigger',
						         'value' => true,
					         )
				         ) )
			            ->add_fields(array(
			            	Field::make_text('name', 'Назва пункту'),
				            Field::make_text('anchor', 'Якір')
			            ))
		         ));

	}