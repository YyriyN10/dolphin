<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	if ( defined( 'POLYLANG_VERSION' ) ) {

		add_action('init', 'dolphincargo_polylang_strings' );

		function dolphincargo_polylang_strings() {

			if( ! function_exists( 'pll_register_string' ) ) {
				return;
			}

			/**
			 * Buttons
			 */

			pll_register_string(
				'dolphincargo_btn_get_consult',
				'Отримати консультацію',
				'Кнопки',
				false
			);

			pll_register_string(
				'dolphincargo_btn_more_detail',
				'Дізнатись більше',
				'Кнопки',
				false
			);

			pll_register_string(
				'dolphincargo_btn_leave_request',
				'Залишити заявку',
				'Кнопки',
				false
			);

			pll_register_string(
				'dolphincargo_btn_about_us',
				'Більше про нас',
				'Кнопки',
				false
			);

			pll_register_string(
				'dolphincargo_btn_go_block',
				'Читати блог',
				'Кнопки',
				false
			);

			pll_register_string(
				'dolphincargo_btn_read_full',
				'Читати повний відгук',
				'Кнопки',
				false
			);




			/**
			 * Titles
			 */

			pll_register_string(
				'dolphincargo_title_reviews',
				'Відгуки наших клієнтів',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_title_inner_blog',
				'Корисний контент',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_title_contact_social',
				'Соціальні мережі',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_title_contact_email',
				'Пошта',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_title_contact_phone',
				'Телефон',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_title_contact_address',
				'Адреса',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_step_text',
				'Крок',
				'Заголовки',
				false
			);




			/**
			 * Forms
			 */

			pll_register_string(
				'dolphincargo_form_name_placeholder',
				'Ім’я',
				'Форми',
				false
			);

			pll_register_string(
				'dolphincargo_form_send_btn',
				'Надіслати заявку',
				'Форми',
				false
			);

			pll_register_string(
				'dolphincargo_form_modal_title',
				'Залиште заявку і наш менеджер зв’яжеться з вами!',
				'Форми',
				false
			);

			pll_register_string(
				'dolphincargo_form_main_title',
				'Є питання?',
				'Форми',
				false
			);

			pll_register_string(
				'dolphincargo_form_main_text',
				'Залиште заявку і наш менеджер зв’яжеться з вами! ',
				'Форми',
				false
			);


















		}
	}