<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	$socialList = carbon_get_theme_option('dolphincargo_option_social_list');

	if ( !empty( $socialList ) ):?>

  <div class="menu-social menu-contacts">
      <h3 class="contact-name"><?php echo esc_html( pll__( 'Соціальні мережі' ) ); ?></h3>

      <div class="social-wrapper">
        <?php
	        $stringList = array_chunk( $socialList, 3);

	        if ( !empty( $stringList )):?>

            <?php foreach( $stringList as $string ):?>
			        <?php if( $string ):?>
                <div class="social-row">
                  <?php foreach( $string as $item ):?>
                    <?php if( !empty( $item['name'] ) && !empty( $item['link'] ) ):?>
                      <a href="<?php echo $item['link'];?>" target="_blank" rel="nofollow"><?php echo $item['name'];?></a>
                    <?php endif;?>
                  <?php endforeach;?>
                </div>
			        <?php endif;?>
            <?php endforeach;?>
        <?php endif;?>

      </div>
  </div>

<?php endif;?>
