<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	$fbLink = carbon_get_theme_option('dolphincargo_option_facebook_link');
	$instLink = carbon_get_theme_option('dolphincargo_option_instagram_link');

	if ( $fbLink || $instLink ):?>

		<ul class="social-wrapper">
			<?php if( $fbLink ):?>
				<li><a href="<?php echo $fbLink;?>"></a></li>
			<?php endif;?>
			<?php if( $instLink ):?>
				<li><a href="<?php echo $instLink;?>"></a></li>
			<?php endif;?>
		</ul>

<?php endif;?>
