<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	add_action( 'wp_enqueue_scripts', 'green_system_ajax_data', 99 );
	function green_system_ajax_data(){

		wp_localize_script('dolphincargo-main-js', 'dolphincargo_ajax',
			array(
				'url' => admin_url('admin-ajax.php')
			)
		);

	}