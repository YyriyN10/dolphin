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
			     Field::make_image('dolphincargo_delivery_steps_road_pic', 'Зображення поверхні поякій йде рух')
			          ->set_type('image'),
			     Field::make_image('dolphincargo_delivery_steps_transport_pic', 'Зображення транспорту')
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
						     <div class="row first-up">
							     <h2 class="block-title big-title col-xl-8 offset-xl-4 col-lg-10 offset-lg-2 col-12"><?php echo $fields['dolphincargo_delivery_steps_title'];?></h2>
						     </div>
                 <div class="row content content-top second-up">
                   <?php foreach( $fields['dolphincargo_delivery_steps_list'] as $index=>$item ):?>
                     <?php if( $index < 4 ):?>
                       <div class="step col-lg-3 col-sm-6">
                         <p class="step__number">
                           <?php echo esc_html( pll__( 'Крок' ) ); ?> <?php echo $index + 1;?>
                         </p>
                         <p class="step__text"><?php echo $item['text'];?></p>
                       </div>
                     <?php endif;?>
                   <?php endforeach;?>
                 </div>
               </div>
               <div class="animation-wrapper">
                 <div class="transport-wrapper">
                   <img
                      class="lazy"
                      data-src="<?php echo wp_get_attachment_image_src( $fields['dolphincargo_delivery_steps_transport_pic'], 'full')[0];?>"
                      <?php
                        $altText = get_post_meta( $fields['dolphincargo_delivery_steps_transport_pic'], '_wp_attachment_image_alt', TRUE);
                        if( !empty( $altText ) ):?>
                          alt="<?php echo $altText;?>"
                      <?php else:?>
                          alt="<?php the_title();?>"
                      <?php endif;?>
                   >
                 </div>
                 <div class="road-wrapper">
                   <img
                      class="lazy"
                      data-src="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0];?>"
	                   <?php
		                   $altText = get_post_meta( $fields['dolphincargo_delivery_steps_road_pic'], '_wp_attachment_image_alt', TRUE);
		                   if( !empty( $altText ) ):?>
                         alt="<?php echo $altText;?>"
		                   <?php else:?>
                         alt="<?php the_title();?>"
		                   <?php endif;?>
                   >
                 </div>
               </div>
               <div class="container-fluid">
                 <div class="row content content-bottom">
							     <?php foreach( $fields['dolphincargo_delivery_steps_list'] as $index=>$item ):?>
								     <?php if( $index > 3 ):?>
                       <div class="step col-lg-3 col-sm-6">
                         <p class="step__number">
											     <?php echo esc_html( pll__( 'Крок' ) ); ?> <?php echo $index + 1;?>
                         </p>
                         <p class="step__text"><?php echo $item['text'];?></p>
                       </div>
								     <?php endif;?>
							     <?php endforeach;?>
                 </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}

