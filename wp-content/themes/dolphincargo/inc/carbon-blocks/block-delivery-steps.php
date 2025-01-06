<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_delivery_steps' );

	function dolphincargo_block_delivery_steps(){
		Block::make( __( 'Delivery steps' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_delivery_steps_title', 'Заголовок'),
			     Field::make_complex('dolphincargo_delivery_steps_list', 'Перелік кроків')
						->add_fields( array(
							Field::make_text('text', 'Текст кроку')
						)),
			     Field::make_image('dolphincargo_delivery_steps_transport_pic', 'Зображення транспорту')
			          ->set_type('image'),
			     Field::make_image('dolphincargo_delivery_steps_road_pic', 'Зображення поверхні по якій йде рух')
			          ->set_type('image'),
			     Field::make_select('dolphincargo_delivery_steps_image_position', 'Оберіть яке зображення має бути попереду')
				     ->add_options( array(
					     'transport' => 'Зображення транспорту',
					     'road' => 'Зображення поверхні по якій йде рух',
				     ) ),
			     Field::make_image('dolphincargo_delivery_steps_road_pic_more', 'Додаткове зображення поверхні по якій йде рух')
              ->set_help_text('Якщо в дизайні треба додати глибину, тобто розташувати ще один шар позаду перших двох')
			        ->set_type('image'),

		     ) )

		     ->set_category( 'dolphincargo-services-category' )
		     ->set_icon('editor-ol')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php
			     if( $fields['dolphincargo_delivery_steps_title'] && $fields['dolphincargo_delivery_steps_list'] && $fields['dolphincargo_delivery_steps_road_pic'] && $fields['dolphincargo_delivery_steps_transport_pic']):
				     ?>
				     <!-- Кроки доставки -->
				     <section class="services-delivery-steps indent-top-small indent-bottom-small animation-tracking">
					     <?php get_template_part('template-parts/decor-lines');?>
					     <div class="container-fluid">
						     <div class="row">
							     <h2 class="block-title big-title text-center col-12"><?php echo $fields['dolphincargo_delivery_steps_title'];?></h2>
						     </div>
                 <div class="row content content-top">
                   <?php foreach( $fields['dolphincargo_delivery_steps_list'] as $index=>$item ):?>
                     <?php if( $index < 4 ):?>
                       <div class="step col-lg-3">
                         <p class="step__number">
                           <?php echo esc_html( pll__( 'Крок' ) ); ?> <?php echo $index + 1;?>
                         </p>
                         <p class="step-text"><?php echo $item['text'];?></p>
                       </div>
                     <?php endif;?>
                   <?php endforeach;?>
                 </div>
               </div>
               <div class="animation-wrapper">
                 <?php if( $fields['dolphincargo_delivery_steps_image_position'] == 'transport' ):?>
                  <div class="transport-wrapper top-level">
                 <?php else:?>
                    <div class="transport-wrapper bottom-level">
                 <?php endif;?>
                   <img
                      class="lazy"
                      data-src="<?php echo wp_get_attachment_image_src( $fields['dolphincargo_delivery_steps_transport_pic'], 'full')[0];?>"
                      <?php
                        $altText = get_post_meta( $fields['dolphincargo_delivery_steps_transport_pic'], '_wp_attachment_image_alt', TRUE);
                        if( $altText ):?>
                          alt="<?php echo $altText;?>"
                      <?php else:?>
                          alt="<?php the_title();?>"
                      <?php endif;?>
                   >
                 </div>
	               <?php if( $fields['dolphincargo_delivery_steps_image_position'] == 'transport' ):?>
                    <div class="road-wrapper bottom-level">
		             <?php else:?>
                    <div class="road-wrapper top-level">
			           <?php endif;?>
                       <img
                           class="lazy"
                           data-src="<?php echo wp_get_attachment_image_src( $fields['dolphincargo_delivery_steps_road_pic'], 'full')[0];?>"
					               <?php
						               $altText = get_post_meta( $fields['dolphincargo_delivery_steps_road_pic'], '_wp_attachment_image_alt', TRUE);
						               if( $altText ):?>
                             alt="<?php echo $altText;?>"
						               <?php else:?>
                             alt="<?php the_title();?>"
						               <?php endif;?>
                       >
                     </div>
                      <?php if( $fields['dolphincargo_delivery_steps_road_pic_more'] ):?>
                        <div class="back-layer">
                          <img
                              class="lazy"
                              data-src="<?php echo wp_get_attachment_image_src( $fields['dolphincargo_delivery_steps_road_pic_more'], 'full')[0];?>"
			                      <?php
				                      $altText = get_post_meta( $fields['dolphincargo_delivery_steps_road_pic_more'], '_wp_attachment_image_alt', TRUE);
				                      if( $altText ):?>
                                alt="<?php echo $altText;?>"
				                      <?php else:?>
                                alt="<?php the_title();?>"
				                      <?php endif;?>
                          >
                        </div>
                      <?php endif;?>

               </div>
               <div class="container-fluid">
                 <div class="row content content-bottom">
							     <?php foreach( $fields['dolphincargo_delivery_steps_list'] as $index=>$item ):?>
								     <?php if( $index > 3 ):?>
                       <div class="step col-lg-3">
                         <p class="step__number">
											     <?php echo esc_html( pll__( 'Крок' ) ); ?> <?php echo $index + 1;?>
                         </p>
                         <p class="step-text"><?php echo $item['text'];?></p>
                       </div>
								     <?php endif;?>
							     <?php endforeach;?>
                 </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}

