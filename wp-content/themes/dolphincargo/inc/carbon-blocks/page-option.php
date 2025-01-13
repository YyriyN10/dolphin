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
			         Field::make_text('dolphincargo_option_contact_phone', 'Контактний телефон'),
			         Field::make_text('dolphincargo_option_contact_email', 'Контактний email')
		            ->set_attribute('type', 'email'),

		         ) )
						->add_tab( 'Соціальні мережі', array(
							Field::make_text('dolphincargo_option_facebook_link', 'Посилання на Facebook')
							     ->set_attribute('type', 'url'),
							Field::make_text('dolphincargo_option_instagram_link', 'Посилання на Instagram')
							     ->set_attribute('type', 'url'),
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
			         Field::make_text('dolphincargo_option_blog_posts_page', 'Вкажіть кількість постів на сторінці блогу')
			          ->set_attribute('type', 'number')


		         ) )

		         ->add_tab( 'Опції форми', array(
								Field::make_image('dolphincargo_option_form_image', 'Зображення у блоці з формою')
			            ->set_type('image')
		         ) );
	}