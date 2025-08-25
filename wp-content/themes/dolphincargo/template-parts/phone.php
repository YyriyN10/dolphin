<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	$mainPhone = carbon_get_theme_option('dolphincargo_option_contact_phone_list');

	if ( $mainPhone ):?>
    <div class="menu-phone menu-contacts">
        <h3 class="contact-name"><?php echo esc_html( pll__( 'Телефон' ) ); ?></h3>
      <?php foreach( $mainPhone as $phone ):

	      $phoneToColl = preg_replace( '/[^0-9]/', '', $phone['phone']);

        ?>
	      <?php if( str_contains( strval($phone['phone']), '+') ):?>
          <a href="tel:+<?php echo $phoneToColl;?>" class="phone"><?php echo $phone['phone'];?></a>
	      <?php else :?>
          <a href="tel:<?php echo $phoneToColl;?>" class="phone"><?php echo $phone['phone'];?></a>
	      <?php endif;?>
      <?php endforeach;?>

    </div>
<?php endif;?>
