<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_container_call_to_action_2' );

	function dolphincargo_container_call_to_action_2(){
		Block::make( __( 'Container call to action animate image' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_title', 'Заголовок'),
			     Field::make_rich_text('dolphincargo_text', 'Текст блоку'),
			     Field::make_image('dolphincargo_image', 'Зображення')
			          ->set_type('image'),
		     ) )

		     ->set_category( 'dolphincargo-container-page-category' )
		     ->set_icon('megaphone')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php
			     if( !empty($fields['dolphincargo_title']) && !empty($fields['dolphincargo_image']) ):?>
				     <!-- Заклик до дії -->
				     <section class="container-call-to-acton animation-type indent-top-small indent-bottom-small animation-tracking">
					     <div class="container-fluid">
						     <div class="row">
							     <div class="content col-12">
								     <div class="inner">
									     <div class="text-content second-up">
										     <h2 class="block-title small-title"><?php echo $fields['dolphincargo_title'];?></h2>
										     <?php if( !empty( $fields['dolphincargo_text'] ) ):?>
											     <div class="text"><?php echo wpautop( $fields['dolphincargo_text'] );?></div>
										     <?php endif;?>
										     <div class="button blue-btn" data-toggle="modal" data-target="#formModal">
											     <?php echo esc_html( pll__( 'Залишити заявку' ) ); ?>
										     </div>
									     </div>
									     <div class="pic-wrapper">
										     <img
											     class="lazy"
											     data-src="<?php echo wp_get_attachment_image_src( $fields['dolphincargo_image'], 'full')[0];?>"
											     <?php
												     $altText = get_post_meta( $fields['dolphincargo_image'], '_wp_attachment_image_alt', TRUE);
												     if( !empty( $altText ) ):?>
													     alt="<?php echo $altText;?>"
												     <?php else:?>
													     alt="<?php echo wp_strip_all_tags($fields['dolphincargo_title']);?> "
												     <?php endif;?>
										     >
									     </div>
								     </div>
							     </div>
						     </div>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}

