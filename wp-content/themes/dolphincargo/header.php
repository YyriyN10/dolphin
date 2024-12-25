<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dolphincargo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrapper">
	<header class="site-header">
    <div class="container-fluid">
      <div class="row">
        <div class="content col-12">
          <?php if( is_front_page() ):?>
            <div class="logo">
              <img src="<?php echo carbon_get_theme_option('dolphincargo_option_logo');?>" alt="<?php echo get_bloginfo('name');?>">
            </div>
          <?php else:?>
            <a href="<?php echo get_home_url('/');?>" class="logo">
              <img src="<?php echo carbon_get_theme_option('dolphincargo_option_logo');?>" alt="<?php echo get_bloginfo('name');?>">
            </a>
          <?php endif;?>
          <nav id="header-navigation" class="header-navigation">

		        <?php
			        wp_nav_menu(
				        array(
					        'theme_location' => 'menu-1',
					        'menu_id'        => 'primary-menu',
                  'container' => false,
                  'menu_class' => 'main-menu'
				        )
			        );
		        ?>

            <ul class="mob-lang-wrapper"><?php pll_the_languages( $langArgs ); ?></ul>

            <?php
/*	            $fbLink = carbon_get_theme_option('dolphincargo_option_facebook_link');
	            $instLink = carbon_get_theme_option('dolphincargo_option_instagram_link');

	            if ( !empty( $fbLink ) || !empty( $instLink )):
            */?><!--
                <div class="menu-social menu-contacts">
                  <h3 class="contact-name"><?php /*echo esc_html( pll__( 'Соціальні мережі' ) ); */?></h3>
                  <?php /*echo get_template_part('template-parts/social-wrapper');*/?>
                </div>
            --><?php /*endif;*/?>
	          <?php echo get_template_part('template-parts/social-wrapper');?>

            <?php
/*              if( !empty( carbon_get_theme_option('dolphincargo_option_contact_email') ) ):*/?><!--
                <div class="menu-mail menu-contacts">
                  <h3 class="contact-name"><?php /*echo esc_html( pll__( 'Пошта' ) ); */?></h3>
	                <?php /*echo get_template_part('template-parts/email');*/?>
                </div>
            --><?php /*endif;*/?>
	          <?php echo get_template_part('template-parts/email');?>

            <?php /*if( !empty( carbon_get_theme_option('dolphincargo_option_contact_phone') ) ):*/?><!--
              <div class="menu-phone menu-contacts">
                <h3 class="contact-name"><?php /*echo esc_html( pll__( 'Телефон' ) ); */?></h3>
	              <?php /*echo get_template_part('template-parts/phone');*/?>
              </div>
            --><?php /*endif;*/?>
	          <?php echo get_template_part('template-parts/phone');?>

          </nav>
	        <?php
		        $langArgs = array(
			        'show_names' => 1,
			        'display_names_as' => 'name',
			        'show_flags' => 0,
			        'hide_current' => 0
		        );

		        if ( $langArgs ):
			        ?>
              <div class="lang-wrapper" id="lang-wrapper">
                <button class="page-lang">
                  <span class="lang-name"></span>
                </button>

                <ul class="lang-list">
		              <?php pll_the_languages( $langArgs ); ?>
                </ul>

              </div>

		      <?php endif;?>
          <button class="menu-btn close-type" id="menu-btn">
            <span></span><span></span><span></span>
          </button>
        </div>
      </div>
    </div>
	</header>
  <main>
