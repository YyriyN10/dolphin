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













		}
	}