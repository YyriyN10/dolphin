<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	$mainEmail = carbon_get_theme_option('dolphincargo_option_contact_email');

	if ( $mainEmail ):?>

		<a href="mailto:<?php echo antispambot( $mainEmail, 1);?>" class="email"><?php echo antispambot( $mainEmail, 0);?></a>
<?php endif;?>
