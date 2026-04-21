<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dolphincargo
 */

$anchorMenuTrigger = carbon_get_post_meta(get_the_ID(), 'anchor_menu_trigger');
$anchorMenuList = carbon_get_post_meta(get_the_ID(), 'anchor_menu');



if ( $anchorMenuTrigger && !empty($anchorMenuList)){
	get_header('anchor', $anchorMenuList);
}else{
	get_header();
}

?>

	<?php the_content();?>

<?php
get_footer('new');
