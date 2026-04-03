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

			pll_register_string(
				'dolphincargo_btn_read_more',
				'Читати далі',
				'Кнопки',
				false
			);

			pll_register_string(
				'dolphincargo_btn_go_home',
				'Повернутись на головну',
				'Кнопки',
				false
			);

			pll_register_string(
				'dolphincargo_btn_get_calc',
				'Замовити прорахунок',
				'Кнопки',
				false
			);

			pll_register_string(
				'dolphincargo_btn_menu',
				'Меню',
				'Кнопки',
				false
			);

			pll_register_string(
				'dolphincargo_btn_go_to_price',
				'Проглянути ціни',
				'Кнопки',
				false
			);

			pll_register_string(
				'dolphincargo_btn_calc',
				'Розрахувати обʼєм',
				'Кнопки',
				false
			);

			pll_register_string(
				'dolphincargo_btn_taobao_calc',
				'Розрахувати вартість',
				'Кнопки',
				false
			);

			pll_register_string(
				'dolphincargo_btn_container_calc',
				'ОТРИМАТИ РОЗРАХУНОК',
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

			pll_register_string(
				'dolphincargo_calc_title',
				'Розрахунок обʼєму вантажу',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_calc_result',
				'Обʼєм вантажу',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_calc_data_type_title',
				'Одиниці виміру',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_calc_data_type_1',
				'Метри',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_calc_data_type_2',
				'Cантиметри',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_calc_data_type_3',
				'Міліметри',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_calc_sizes_title',
				'Габарити',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_calc_box_count',
				'Кількість коробок',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_cotainer_format',
				'Формат',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_cotainer_length',
				'Довжина',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_cotainer_width',
				'Ширина',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_cotainer_height',
				'Висота',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_cotainer_volume',
				'Об’єм',
				'Заголовки',
				false
			);


			pll_register_string(
				'dolphincargo_cotainer_empty_weight',
				'Вага порожнього',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_cotainer_load_capacity',
				'Вантажопідйомність',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_cotainer_label_1',
				'Підходить для',
				'Заголовки',
				false
			);

			pll_register_string(
				'dolphincargo_cotainer_label_2',
				'Перевага',
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

			pll_register_string(
				'dolphincargo_form_calc_placeholder_white',
				'Ширина: м',
				'Форми',
				false
			);

			pll_register_string(
				'dolphincargo_form_calc_placeholder_height',
				'Висота: м',
				'Форми',
				false
			);

			pll_register_string(
				'dolphincargo_form_calc_placeholder_length',
				'Довжина: м',
				'Форми',
				false
			);

			pll_register_string(
				'dolphincargo_form_calc_delivery_title',
				'Оберіть спосіб доставки',
				'Форми',
				false
			);

			pll_register_string(
				'dolphincargo_form_calc_delivery_category_title',
				'Оберіть категорію товару',
				'Форми',
				false
			);

			pll_register_string(
				'dolphincargo_form_calc_delivery_category_placeholder',
				'Електротовари,мобільні аксесуари',
				'Форми',
				false
			);

			pll_register_string(
				'dolphincargo_form_calc_volume_name',
				'Вага і об’єм вантажу з упаковкою',
				'Форми',
				false
			);

			pll_register_string(
				'dolphincargo_form_calc_volume_placeholder',
				'Введіть масу, кг/об’єм, куб.м.',
				'Форми',
				false
			);

			pll_register_string(
				'dolphincargo_form_calc_name_title',
				'Ім’я, Прізвище',
				'Форми',
				false
			);

			pll_register_string(
				'dolphincargo_form_calc_name_placeholder',
				'Ваше ім’я',
				'Форми',
				false
			);

			pll_register_string(
				'dolphincargo_form_calc_phone_title',
				'Телефон',
				'Форми',
				false
			);

			pll_register_string(
				'dolphincargo_form_calc_email_placeholder',
				'Напишіть вам еmail',
				'Форми',
				false
			);

			pll_register_string(
				'dolphincargo_form_calc_send_btn',
				'Дізнатись вартість',
				'Форми',
				false
			);

			pll_register_string(
				'dolphincargo_form_coment_placeholder',
				'Ваш коментар',
				'Форми',
				false
			);







			/**
			 * 404
			 */

			pll_register_string(
				'dolphincargo_404_page_first_text',
				'Сторінки не знайдено',
				'Сторінка 404',
				false
			);

			pll_register_string(
				'dolphincargo_404_page_second_text',
				'Вибачте, сторінка, яку ви шукаєте, не існує або була переміщена.',
				'Сторінка 404',
				false
			);

















		}
	}