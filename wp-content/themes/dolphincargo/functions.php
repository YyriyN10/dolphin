<?php
	if ( ! defined( 'ABSPATH' ) ) {
				exit;
			}
/**
 * dolphincargo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dolphincargo
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dolphincargo_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on dolphincargo, use a find and replace
		* to change 'dolphincargo' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'dolphincargo', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'dolphincargo' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'dolphincargo_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'dolphincargo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dolphincargo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dolphincargo_content_width', 640 );
}
add_action( 'after_setup_theme', 'dolphincargo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dolphincargo_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'dolphincargo' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dolphincargo' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'dolphincargo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */


function dolphincargo_scripts() {
	wp_enqueue_style( 'dolphincargo-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_style( 'dolphincargo-style-main', get_template_directory_uri() . '/assets/css/style.min.css', array(), _S_VERSION );

	wp_enqueue_script( 'intlTelInput', get_template_directory_uri() . '/assets/js/intlTelInput.min.js', array('jquery'), '1.0.14', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.6.0', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.6.1', true );
	wp_enqueue_script( 'dolphincargo-main-js', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), _S_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'dolphincargo_scripts' );

	/*$postTest = get_option('page_on_front');;

	if (!empty($postTest)){
		echo 'post in';
	}else{
		echo 'post not in';
	}



	if (has_block('carbon-fields/what-you-get', $postTest)){
		echo 'has block';
	}else{
		echo 'not in page';
	}*/

	/*function enqueue_slider_script_if_block_present() {
		if ( is_singular() ) {
			$post = get_post();
			if ( has_block('acf/slider', $post) ) {
				wp_enqueue_script(
					'slider-script',
					get_template_directory_uri() . '/js/slider.js',
					['jquery'],
					null,
					true
				);
			}
		}
	}
	add_action('wp_enqueue_scripts', 'enqueue_slider_script_if_block_present');*/



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Poly translations
 */

require get_template_directory() . '/inc/poly-translation.php';

/**
 * Custom post types
 */

require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Carbon init
 */

require get_template_directory() . '/inc/carbon-init.php';

/**
 * Carbon init
 */

require get_template_directory() . '/inc/ajax-functions.php';

/**
 * Constants
 */

define( 'SITE_URL', get_site_url() );
define( 'SITE_LOCALE', get_locale() );
define( 'THEME_PATH', get_template_directory_uri() );

/**
 * Form integration
 */

	add_action('wp_ajax_contact_form', 'contact_form_callback');
	add_action('wp_ajax_nopriv_contact_form', 'contact_form_callback');

	require_once 'vendor/autoload.php';

	use GuzzleHttp\Client;
	use GuzzleHttp\Exception\RequestException;

	function contact_form_callback(){

		$mailToList = carbon_get_theme_option('dolphincargo_option_form_mail_to_list');

			function mailTest($name, $email, $phone, $utmSource, $utmMedium, $utmCampaign, $utmTerm, $utmContent, $pageName, $pageUrl, $mailToList){

				if (!empty($mailToList)){
					$sendMail = '';
					foreach ($mailToList as $index=>$mail){
						if ( $index > 0 ){
							$sendMail .= ', '.$mail['mail'];
						}else{
							$sendMail .= $mail['mail'];
						}
					}
				}

				$to = $sendMail;
				$headers = "Content-type: text/plain; charset = UTF-8";
				$subject = "Заявка з сайту Dolphin Cargo з $pageName";
				$message = "Ім'я: $name \n Телефон: $phone \n Пошта: $email \n Адреса сторінки: $pageUrl\n\n UTM мітки: \n utmSource: $utmSource \n utmMedium: $utmMedium \n utmCampaign: $utmCampaign \n utmTerm: $utmTerm \n utmContent: $utmContent ";

				$send = mail ($to, $subject, $message, $headers);
			}




		/**
		 * Функция для создания лида в Kommo CRM
		 *
		 * @param string $name  Имя/название лида
		 * @param string $email Email контакта
		 * @param string $phone Телефон контакта
		 * @param float  $price Цена лида
		 * @param string $utmSource Мітка utm_Source
		 * @param string $utmMedium Мітка utm_Medium
		 * @param string $utmTerm Мітка utm_Term
		 * @param string $utmCampaign Мітка utm_Campaign
		 * @param string $utmContent Мітка utm_Content
		 * @param string $pageName Назва сторінки
		 * @param string $pageUrl Адреса сторінки
		 * 
		 * @param string $komoSubdomne Субдомен CRM
		 * @param string $komoToken Токен авторізації
		 * @param int 	 $komoFunnelId ID воронки
		 * @param int 	 $komoFullenStageId ID етапу воронки
		 * @param int 	 $komoLidCreatorUserId ID кормстувача який сворює лід
		 *
		 * @return array Результат выполнения с ключами success, message и (опционально) response
		 */


		function createKommoLead($name, $email, $phone, $price, $utmSource, $utmMedium, $utmCampaign, $utmTerm, $utmContent, $pageName, $pageUrl, $komoSubdomne, $komoToken, $komoFunnelId, $komoFullenStageId, $komoLidCreatorUserId ) {
			
			// ==== Настройки Kommo ====
			$subdomain = $komoSubdomne;    // Замените на ваш субдомен в Kommo
			$accessToken = $komoToken; // Токен доступа (получите через OAuth 2.0)
			$pipelineId = intval($komoFunnelId);            // ID воронки
			$statusId   = intval($komoFullenStageId);           // ID этапа воронки
			$createdBy  = intval($komoLidCreatorUserId);           // ID пользователя, создающего лид

			/*$createdBy  = 6282904 или 29019994;*/

			$fieldIdUtmSource = '';
			$fieldIdUtmMedium = '';
			$fieldIdUtmCampaign = '';
			$fieldIdUtmContent = '';
			$fieldIdUtmTerm = '';
			$fieldIdLeadUrl = '';

			if (!empty(carbon_get_theme_option('dolphincargo_option_form_como_utm_source'))){
				$fieldIdUtmSource = carbon_get_theme_option('dolphincargo_option_form_como_utm_source');
			}
			if (!empty(carbon_get_theme_option('dolphincargo_option_form_como_utm_medium'))){
				$fieldIdUtmMedium = carbon_get_theme_option('dolphincargo_option_form_como_utm_medium');
			}
			if (!empty(carbon_get_theme_option('dolphincargo_option_form_como_utm_campaign'))){
				$fieldIdUtmCampaign = carbon_get_theme_option('dolphincargo_option_form_como_utm_campaign');
			}
			if (!empty(carbon_get_theme_option('dolphincargo_option_form_como_utm_content'))){
				$fieldIdUtmContent = carbon_get_theme_option('dolphincargo_option_form_como_utm_content');
			}
			if (!empty(carbon_get_theme_option('dolphincargo_option_form_como_utm_term'))){
				$fieldIdUtmTerm = carbon_get_theme_option('dolphincargo_option_form_como_utm_term');
			}
			if (!empty(carbon_get_theme_option('dolphincargo_option_form_como_lead_url'))){
				$fieldIdLeadUrl = carbon_get_theme_option('dolphincargo_option_form_como_lead_url');
			}


			// ==== Подготовка данных лида ====
			$leadData = [
				[
					'name'        => $name,
					'created_by'  => $createdBy,
					'price'       => $price,
					'status_id'   => $statusId,
					'pipeline_id' => $pipelineId,

					'_embedded' => [
						'contacts' => [
							[
								'first_name' => $name,
								'custom_fields_values' => [
									[
										'field_code' => 'EMAIL',
										'values'     => [
											['value' => $email, 'enum_code' => 'WORK']
										]
									],
									[
										'field_code' => 'PHONE',
										'values'     => [
											['value' => $phone, 'enum_code' => 'WORK']
										]
									],
									[
										'field_id' => intval($fieldIdUtmSource), // utm_source
										'values'   => [
											['value' => $utmSource]
										]
									],
									[
										'field_id' => intval($fieldIdUtmMedium), // utm_medium
										'values'   => [
											['value' => $utmMedium]
										]
									],
									[
										'field_id' => intval($fieldIdUtmCampaign), // utm_campaign
										'values'   => [
											['value' => $utmCampaign]
										]
									],
									[
										'field_id' => intval($fieldIdUtmContent), // utm_content
										'values'   => [
											['value' => $utmContent]
										]
									],
									[
										'field_id' => intval($fieldIdUtmTerm), // utm_term
										'values'   => [
											['value' => $utmTerm]
										]
									],
									[
										'field_id' => intval($fieldIdLeadUrl), // page_url
										'values'   => [
											['value' => $pageUrl]
										]
									]
								]
							]
						]
					]
				]
			];

			$client = new Client();
			try {
				$response = $client->request('POST', "https://{$subdomain}.kommo.com/api/v4/leads/complex", [
					'headers' => [
						'Authorization' => "Bearer {$accessToken}",
						'Content-Type'  => 'application/json',
						'Accept'        => 'application/json',
					],
					'body' => json_encode($leadData),
				]);

				$statusCode = $response->getStatusCode();
				$body = $response->getBody()->getContents();

				echo $body;

				if ($statusCode === 200 || $statusCode === 201) {
					return [
						'success'  => true,
						'message'  => 'Лид успешно создан!',
						'response' => json_decode($body, true)
					];
				} else {
					return [
						'success'  => false,
						'message'  => "Ошибка при создании лида: Код {$statusCode}.",
						'response' => json_decode($body, true)
					];
				}
			} catch (RequestException $e) {
				$errorMessage = $e->getMessage();
				echo $errorMessage;
				if ($e->hasResponse()) {
					$errorMessage .= ' ' . $e->getResponse()->getBody()->getContents();
				}
				return [
					'success' => false,
					'message' => "Произошла ошибка при соединении с Kommo: " . $errorMessage
				];
			}
		}

		function clearData($data) {
			return addslashes(strip_tags(trim($data)));
		}

		$name  = clearData($_POST['name']);
		$email = clearData($_POST['email']);
		$phone = clearData($_POST['phone']);
		$price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
		$pageName = isset($_POST['pageName']) ? clearData($_POST['pageName']) : '';
		$pageUrl = clearData($_POST['pageUrl']);

		$utmSource = isset($_POST['utmSource']) ? clearData($_POST['utmSource']) : '';
		$utmMedium = isset($_POST['utmMedium']) ? clearData($_POST['utmMedium']) : '';
		$utmCampaign = isset($_POST['utmCampaign']) ? clearData($_POST['utmCampaign']) : '';
		$utmTerm = isset($_POST['utmTerm']) ? clearData($_POST['utmTerm']) : '';
		$utmContent = isset($_POST['utmContent']) ? clearData($_POST['utmContent']) : '';


		$komoSubdomain = carbon_get_theme_option('dolphincargo_option_form_como_subdomen');
		$komoToken = carbon_get_theme_option('dolphincargo_option_form_como_token');
		$komoFunnelId = carbon_get_theme_option('dolphincargo_option_form_como_funnel_id');
		$komoFullenStageId = carbon_get_theme_option('dolphincargo_option_form_como_funnel_stage_id');
		$komoLidCreatorUserId = carbon_get_theme_option('dolphincargo_option_form_como_lid_creator_user_id');

		// echo $komoSubdomain.' '.$komoToken.' '.$komoFunnelId.' '.$komoFullenStageId.' '.$komoLidCreatorUserId; 

		/* if (!empty($mailToList)){
			mailTest($name, $email, $phone, $utmSource, $utmMedium, $utmCampaign, $utmTerm, $utmContent, $pageName, $pageUrl, $mailToList);
		} */

		if	(!empty($komoSubdomain) && !empty($komoToken) && !empty($komoFunnelId) && !empty($komoFullenStageId) && !empty($komoLidCreatorUserId)){
			createKommoLead($name, $email, $phone, $price, $utmSource, $utmMedium, $utmCampaign, $utmTerm, $utmContent, $pageName, $pageUrl, $komoSubdomain, $komoToken, $komoFunnelId, $komoFullenStageId, $komoLidCreatorUserId);
		}
		
		

		/*wp_die();*/

	}

	function contact_form_callback2(){

		/**
		 * Функция для создания лида в Kommo CRM
		 *
		 * @param string $name  Имя/название лида
		 * @param string $email Email контакта
		 * @param string $phone Телефон контакта
		 * @param float  $price Цена лида
		 * @param string $utmSource Мітка utm_Source
		 * @param string $utmMedium Мітка utm_Medium
		 * @param string $utmTerm Мітка utm_Term
		 * @param string $utmCampaign Мітка utm_Campaign
		 * @param string $utmContent Мітка utm_Content
		 * @param string $pageName Назва сторінки
		 * @param string $pageUrl Адреса сторінки
		 *
		 * @return array Результат выполнения с ключами success, message и (опционально) response
		 */


		function createKommoLead($name, $email, $phone, $price, $utmSource, $utmMedium, $utmCampaign, $utmTerm, $utmContent, $pageName) {
			// ==== Настройки Kommo ====
			$subdomain = 'tranzit23';    // Замените на ваш субдомен в Kommo
			$accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjY4NGZkZTQ3M2ZlNjFjYzgwMjZiZWJhZWFkOThlMDVhZGUwNWM2YWZkMmUyZDEwNTVlMGJkYjgyYjI3OGJkYjc2NzIwODI2NzRhZTExYmMwIn0.eyJhdWQiOiJkZGExMDVjOC1jNjJiLTRiZDUtYWExMS1hN2I1MTA0NjM1MGEiLCJqdGkiOiI2ODRmZGU0NzNmZTYxY2M4MDI2YmViYWVhZDk4ZTA1YWRlMDVjNmFmZDJlMmQxMDU1ZTBiZGI4MmIyNzhiZGI3NjcyMDgyNjc0YWUxMWJjMCIsImlhdCI6MTc0MjU1NjQ4MCwibmJmIjoxNzQyNTU2NDgwLCJleHAiOjE3NzUwMDE2MDAsInN1YiI6IjYyODI5MDQiLCJncmFudF90eXBlIjoiIiwiYWNjb3VudF9pZCI6MjkwMTk5OTQsImJhc2VfZG9tYWluIjoia29tbW8uY29tIiwidmVyc2lvbiI6Miwic2NvcGVzIjpbImNybSIsImZpbGVzIiwiZmlsZXNfZGVsZXRlIiwibm90aWZpY2F0aW9ucyIsInB1c2hfbm90aWZpY2F0aW9ucyJdLCJoYXNoX3V1aWQiOiIwM2I0MjczMi00N2VjLTRhOGUtOTMxNi05M2VlOThkNDQ0M2MiLCJhcGlfZG9tYWluIjoiYXBpLWcua29tbW8uY29tIn0.E6K6iPLzbsN8N8Iwrm4RNwZbXBGzxsNIiATMPSCbl8Aa8kOgC7SPDLHLSqpsUs4yYWP_IqP34Hq0PyqM6XQm7axIlsybVHaxUazgsW89vrMMUWGyJEjRXceN7SFBQw4Qd-sO9lootVLSNbkhIuCu_TMOrvp33GFl0ykLqIZz-J5cpB-OxL2BN-cfDbFxQ_f_kdBvhYkdOnQwi3HgIM71asla49L7Qp7tC1kXdVIRjyAAqagd6lkL56W4rjMBXACMqkJblleQr8LuYRNA6d5w7WPNzInWzKOPYphJVv0ykzAuGAOU7yxYOkVFke2GksLCFoeY7utiadCHROvpCDz2Fw'; // Токен доступа (получите через OAuth 2.0)
			$pipelineId = 7526932;            // ID воронки
			$statusId   = 61498184;           // ID этапа воронки
			$createdBy  = 6282904;           // ID пользователя, создающего лид

			/*$createdBy  = 6282904 или 29019994;*/


			// ==== Подготовка данных лида ====
			$leadData = [
				[
					'name'       => $name,
					'created_by' => $createdBy,
					'price'      => $price,
					'status_id'  => $statusId,
					'pipeline_id'=> $pipelineId,
					'_embedded'  => [
						'contacts' => [
							[
								'first_name' => $name,
								'custom_fields_values' => [
									[
										'field_code' => 'EMAIL',
										'values'     => [
											['value' => $email, 'enum_code' => 'WORK']
										]
									],
									[
										'field_code' => 'PHONE',
										'values'     => [
											['value' => $phone, 'enum_code' => 'WORK']
										]
									]
								]
							]
						]
					]
				]
			];

			$client = new Client();
			try {
				$response = $client->request('POST', "https://{$subdomain}.kommo.com/api/v4/leads/complex", [
					'headers' => [
						'Authorization' => "Bearer {$accessToken}",
						'Content-Type'  => 'application/json',
						'Accept'        => 'application/json',
					],
					'body' => json_encode($leadData),
				]);

				$statusCode = $response->getStatusCode();
				$body = $response->getBody()->getContents();

				if ($statusCode === 200 || $statusCode === 201) {
					return [
						'success'  => true,
						'message'  => 'Лид успешно создан!',
						'response' => json_decode($body, true)
					];
				} else {
					return [
						'success'  => false,
						'message'  => "Ошибка при создании лида: Код {$statusCode}.",
						'response' => json_decode($body, true)
					];
				}
			} catch (RequestException $e) {
				$errorMessage = $e->getMessage();
				if ($e->hasResponse()) {
					$errorMessage .= ' ' . $e->getResponse()->getBody()->getContents();
				}
				return [
					'success' => false,
					'message' => "Произошла ошибка при соединении с Kommo: " . $errorMessage
				];
			}
		}

		function mailTest($name, $email, $phone, $price, $utmSource, $utmMedium, $utmCampaign, $utmTerm, $utmContent, $pageName){
			$to = '1987elessar@gmail.com';
			$headers = "Content-type: text/plain; charset = windows-1251";
			$subject = "Заявка з сайту Dolphin Cargo з $pageName";
			$message = "Ім'я: $name \n Телефон: $phone \n Пошта: $email\n\n UTM мітки: \n utmSource: $utmSource \n utmMedium: $utmMedium \n utmCampaign: $utmCampaign \n utmTerm: $utmTerm \n utmContent: $utmContent";

			$send = mail ($to, $subject, $message, $headers);
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			function clearData($data) {
				return addslashes(strip_tags(trim($data)));
			}

			$name  = clearData($_POST['name']);
			$email = clearData($_POST['email']);
			$phone = clearData($_POST['phone']);
			$price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
			$pageName = isset($_POST['pageName']) ? clearData($_POST['pageName']) : '';

			$utmSource = isset($_POST['utmSource']) ? clearData($_POST['utmSource']) : '';
			$utmMedium = isset($_POST['utmMedium']) ? clearData($_POST['utmMedium']) : '';
			$utmCampaign = isset($_POST['utmCampaign']) ? clearData($_POST['utmCampaign']) : '';
			$utmTerm = isset($_POST['utmTerm']) ? clearData($_POST['utmTerm']) : '';
			$utmContent = isset($_POST['utmContent']) ? clearData($_POST['utmContent']) : '';

			/*if (empty($name) || empty($email) || empty($phone)) {
				header('Content-Type: application/json');
				echo json_encode([
					'success' => false,
					'message' => 'Пожалуйста, заполните все обязательные поля: имя, email и телефон.'
				]);
				exit;
			}*/

			/*$result = mailTest($name, $email, $phone, $utmSource, $utmMedium, $utmCampaign, $utmTerm, $utmContent, $pageName);*/

			/*$result = createKommoLead($name, $email, $phone, $price, $utmSource, $utmMedium, $utmCampaign, $utmTerm, $utmContent, $pageName);*/

			header('Content-Type: application/json');
			/*echo json_encode($result);*/

			echo "$name $email $phone, $utmSource, $utmMedium, $utmCampaign, $utmTerm, $utmContent, $pageName";
			/*exit;*/
		}



	}



