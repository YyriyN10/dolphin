<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	$fbLink = carbon_get_theme_option('dolphincargo_option_facebook_link');
	$instLink = carbon_get_theme_option('dolphincargo_option_instagram_link');

	if ( $fbLink || $instLink ):?>

  <div class="menu-social menu-contacts">
      <h3 class="contact-name"><?php echo esc_html( pll__( 'Соціальні мережі' ) ); ?></h3>

      <ul class="social-wrapper">
        <?php if( $fbLink ):?>
          <li><a href="<?php echo $fbLink;?>">Facebook</a></li>
        <?php endif;?>
        <?php if( $instLink ):?>
          <li><a href="<?php echo $instLink;?>">Instagram</a></li>
        <?php endif;?>
      </ul>
  </div>

<?php endif;?>
