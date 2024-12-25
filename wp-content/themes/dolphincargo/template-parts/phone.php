<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	$mainPhone = carbon_get_theme_option('dolphincargo_option_contact_phone');

	if ( $mainPhone ):?>
		<?php
			$phoneToColl = preg_replace( '/[^0-9]/', '', $mainPhone);
		?>
    <div class="menu-phone menu-contacts">
        <h3 class="contact-name"><?php echo esc_html( pll__( 'Телефон' ) ); ?></h3>
        <?php if( str_contains(strval($mainPhone), '+') ):?>
          <a href="tel:+<?php echo $phoneToColl;?>" class="phone"><?php echo $mainPhone;?></a>
        <?php else :?>
          <a href="tel:<?php echo $phoneToColl;?>" class="phone"><?php echo $mainPhone;?></a>
        <?php endif;?>
    </div>
<?php endif;?>
