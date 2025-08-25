<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_call_to_action' );

	function dolphincargo_block_call_to_action(){
		Block::make( __( 'Call to action' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_call_to_action_title', 'Заголовок'),
			     Field::make_rich_text('dolphincargo_call_to_action_text', 'Текст блоку'),
			     Field::make_image('dolphincargo_call_to_action_image', 'Зображення')
			      ->set_type('image'),
           Field::make_select('dolphincargo_call_to_action_contact', 'Оберіть куди може перейти користувач')
	           ->add_options( array(
		           'form' => 'Форма зворотнього звʼязку',
		           'social' => 'Соціальні мережі',

	           ) )
		     ) )

		     ->set_category( 'dolphincargo-common-category' )
		     ->set_icon('megaphone')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php
			     if( $fields['dolphincargo_call_to_action_title'] && $fields['dolphincargo_call_to_action_image'] ):
				     ?>
				     <!-- Заклик до дії -->
				     <section class="block-call-to-acton indent-top-small indent-bottom-small animation-tracking">
					     <?php get_template_part('template-parts/decor-lines');?>
					     <div class="container-fluid">
						     <div class="row">
							     <div class="content col-12">
                     <div class="inner">
                       <div class="pic-wrapper first-up">
                         <img
                             class="lazy"
                             data-src="<?php echo wp_get_attachment_image_src( $fields['dolphincargo_call_to_action_image'], 'full')[0];?>"
			                     <?php
				                     $altText = get_post_meta( $fields['dolphincargo_call_to_action_image'], '_wp_attachment_image_alt', TRUE);
				                     if( !empty( $altText ) ):?>
                               alt="<?php echo $altText;?>"
				                     <?php else:?>
                               alt="<?php echo $fields['dolphincargo_call_to_action_title'];?>"
				                     <?php endif;?>
                         >
                       </div>
                       <div class="text-content second-up">
                         <h2 class="block-title big-title"><?php echo $fields['dolphincargo_call_to_action_title'];?></h2>
		                     <?php if( !empty( $fields['dolphincargo_call_to_action_text'] ) ):?>
                           <div class="text"><?php echo wpautop( $fields['dolphincargo_call_to_action_text'] );?></div>
		                     <?php endif;?>
                         <?php if( $fields['dolphincargo_call_to_action_contact'] == 'form' ):?>
                           <div class="button blue-btn" data-toggle="modal" data-target="#formModal"><?php echo esc_html( pll__( 'Отримати консультацію' ) ); ?></div>
                         <?php elseif ( $fields['dolphincargo_call_to_action_contact'] == 'social' ):?>
	                         <?php get_template_part('template-parts/social-wrapper');?>
                         <?php endif;?>

                       </div>
                       <div class="light"><img src="<?php echo THEME_PATH;?>/assets/img/faq-block-light.png" alt="<?php echo $fields['dolphincargo_call_to_action_title'];?>"></div>
                     </div>
							     </div>
						     </div>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}

