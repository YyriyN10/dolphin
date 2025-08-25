<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_other_services' );

	function dolphincargo_block_other_services(){
		Block::make( __( 'Other services' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_other_services_title', 'Заголовок блоку'),
			     Field::make_complex('dolphincargo_other_services_list', 'Перелік сервісів')
			      ->add_fields(array(
			          Field::make_text('name', 'Назва послуги'),
                Field::make_rich_text('description', 'Короткий опис послуги'),
                Field::make_image('image', 'Зображення послуги')
                  ->set_type('image')
            ))

		     ) )

		     ->set_category( 'dolphincargo-services-category' )
		     ->set_icon('list-view')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php
			         if( $fields['dolphincargo_other_services_title'] && $fields['dolphincargo_other_services_list']):
			      ?>
			         <!-- Інші сервіси -->
			         <section class="other-services indent-top-medium indent-bottom-medium animation-tracking">
				         <?php get_template_part('template-parts/decor-lines');?>
                 <div class="light"><img src="<?php echo THEME_PATH;?>/assets/img/airplan-call-to-light.png" alt=""></div>
			           <div class="container-fluid">
			             <div class="row first-up">
			               <h2 class="block-title big-title col-12 text-center"><?php echo $fields['dolphincargo_other_services_title'];?></h2>
			             </div>
			             <div class="row second-up">
			               <div class="content col-12">
				               <div class="other-services__slider" id="other-services-slider">
					               <?php foreach( $fields['dolphincargo_other_services_list'] as $item ):?>
						               <div class="slide">
												     <div class="inner">
													     <div class="other-services__image" data-target="#formModal" data-toggle="modal">
														     <img
															     src="<?php echo wp_get_attachment_image_src( $item['image'], 'full')[0];?>"
															     <?php
																     $altText = get_post_meta( $item['image'], '_wp_attachment_image_alt', TRUE);

																     if( !empty( $altText ) ):?>
																	     alt="<?php echo $altText;?>"
																     <?php else:?>
																	     alt="<?php echo $item['name'];?>"
																     <?php endif;?>
														     >
													     </div>
													     <div class="other-services__title" data-target="#formModal" data-toggle="modal"><?php echo $item['name'];?></div>
													     <div class="description">
														     <?php echo wpautop( $item['description'] );?>
													     </div>
													     <p class="button" data-target="#formModal" data-toggle="modal">
                                 <?php echo esc_html( pll__( 'Дізнатись більше' ) ); ?>
                               </p>
												     </div>
						               </div>
					               <?php endforeach;?>
				               </div>
				               <?php get_template_part('template-parts/slider-navigation');?>
			               </div>
			             </div>
			           </div>
			         </section>
			     <?php endif;?>

			     <?php
		     } );
	}

