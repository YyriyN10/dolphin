<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	$anchorMenuTrigger = carbon_get_post_meta(get_the_ID(), 'anchor_menu_trigger');
	$anchorMenuList = carbon_get_post_meta(get_the_ID(), 'anchor_menu');



	if ( $anchorMenuTrigger && !empty($anchorMenuList)){
		get_header('anchor', $anchorMenuList);
	}else{
		get_header();
	}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Шаблон сторінки "Бізнес подорож"
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package dolphincargo
	 *
	 */

	get_header();?>

<?php the_content();?>

<?php get_footer('new');