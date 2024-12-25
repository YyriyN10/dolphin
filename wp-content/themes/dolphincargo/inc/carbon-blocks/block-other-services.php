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
			     Field::make_association('dolphincargo_other_services_list', 'Перелік сервісів')
			          ->set_types( array(
				          array(
					          'type'      => 'post',
					          'post_type' => 'services',
				          )
			          ) ),

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
						               <a href="<?php echo get_the_permalink( $item['id']);?>" class="slide">
												     <span class="inner">
													     <span class="other-services__image">
														     <img
															     src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $item['id']), 'full')[0];?>"
															     <?php
																     $altText = get_post_meta( get_post_thumbnail_id( $item['id']), '_wp_attachment_image_alt', TRUE);

																     if( !empty( $altText ) ):?>
																	     alt="<?php echo $altText;?>"
																     <?php else:?>
																	     alt="<?php get_the_title( $item['id']);?>"
																     <?php endif;?>
														     >
													     </span>
													     <span class="other-services__title"><?php echo get_the_title( $item['id']);?></span>
													     <span class="description">
														     <?php echo get_the_excerpt( $item['id']);?>
													     </span>
													     <span class="button"><?php echo esc_html( pll__( 'Дізнатись більше' ) ); ?></span>
												     </span>
						               </a>
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

