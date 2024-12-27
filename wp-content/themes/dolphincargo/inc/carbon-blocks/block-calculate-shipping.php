<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_calculate_shipping' );

	function dolphincargo_block_calculate_shipping(){
		Block::make( __( 'Calculate Shipping' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_calculate_shipping_title', 'Заголовок'),
			     Field::make_rich_text('dolphincargo_calculate_shipping_text', 'Текст'),
			     Field::make_image('dolphincargo_calculate_shipping_image', 'Зображення')
			      ->set_type('image')
		     ) )

		     ->set_category( 'dolphincargo-services-category' )
		     ->set_icon('calculator')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php
			     if( $fields['dolphincargo_calculate_shipping_title'] && $fields['dolphincargo_calculate_shipping_text'] && $fields['dolphincargo_calculate_shipping_image']):
				     ?>
				     <!-- Розрахунок вартості доставки -->
				     <section class="services-calculate-shipping indent-top-small indent-bottom-small animation-tracking">
					     <?php get_template_part('template-parts/decor-lines');?>
               <div class="light"><img src="<?php echo THEME_PATH;?>/assets/img/home-services-light.png" alt=""></div>
					     <div class="container-fluid">
						     <div class="row">
							     <div class="text-content col-lg-6 first-up">
								     <h2 class="block-title big-title"><?php echo $fields['dolphincargo_calculate_shipping_title'];?></h2>
								     <div class="text"><?php echo wpautop( $fields['dolphincargo_calculate_shipping_text']);?></div>
								     <a href="#" rel="nofollow" class="button blue-btn" data-toggle="modal" data-target="#formModal">
                       <?php echo esc_html( pll__( 'Надіслати заявку' ) ); ?>
                     </a>
							     </div>
							     <div class="pic col-lg-6 second-up">
								     <div class="pic-wrapper">
									     <img
									        class="lazy"
									        data-src="<?php echo wp_get_attachment_image_src( $fields['dolphincargo_calculate_shipping_image'], 'full')[0];?>"
									        <?php
										        $altText = get_post_meta( $fields['dolphincargo_calculate_shipping_image'], '_wp_attachment_image_alt', TRUE);
										        if( !empty( $altText ) ):?>
											        alt="<?php echo $altText;?>"
											    <?php else:?>
											        alt="<?php the_title();?>"
									        <?php endif;?>
									     >
								     </div>
							     </div>

						     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}

