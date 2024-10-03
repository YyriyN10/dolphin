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

			pll_register_string(
				'dolphincargo_form',
				'Працюємо',
				'Переклади',
				false
			);


		}
	}