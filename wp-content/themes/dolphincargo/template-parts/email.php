<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	$mainEmail = carbon_get_theme_option('dolphincargo_option_contact_email');

	if ( $mainEmail ):?>
  <div class="menu-mail menu-contacts">
      <h3 class="contact-name"><?php echo esc_html( pll__( 'Пошта' ) ); ?></h3>
      <a href="mailto:<?php echo antispambot( $mainEmail, 1);?>" class="email"><?php echo antispambot( $mainEmail, 0);?></a>
  </div>
<?php endif;?>
