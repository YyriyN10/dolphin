<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	$mainPhone = carbon_get_theme_option('dolphincargo_option_contact_phone');

	if ( $mainPhone ):?>
		<?php
			$phoneToColl = preg_replace( '/[^0-9]/', '', $mainPhone);
		?>

		<?php if( str_contains(strval($mainPhone), '+') ):?>
			<a href="tel:+<?php echo $phoneToColl;?>" class="phone"><?php echo $mainPhone;?></a>
		<?php else :?>
			<a href="tel:<?php echo $phoneToColl;?>" class="phone"><?php echo $mainPhone;?></a>
		<?php endif;?>
<?php endif;?>
