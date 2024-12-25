<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_warranty' );

	function dolphincargo_block_warranty(){
		Block::make( __( 'Warranty/Services' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_warranty_title', 'Заголовок'),
			     Field::make_complex('dolphincargo_warranty_list', 'Перелік гарантій або сервісів')
			          ->add_fields( array(
				          Field::make_text('name', 'Назва'),
				          Field::make_image('image', 'Зображення')
				            ->set_type('image')
			          )),
			     Field::make_radio('dolphincargo_warranty_logic', 'Чи відкривати форму у модальному вікті при натисканні на гарантію/сервіс?')
				     ->add_options( array(
					     'no' => 'Ні',
					     'yes' => 'Так',

				     ) )
		     ) )

		     ->set_category( 'dolphincargo-services-category' )
		     ->set_icon('shield')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php
			     if( $fields['dolphincargo_warranty_title'] && $fields['dolphincargo_warranty_list']):
				     ?>
				     <!-- Гарантії -->
				     <section class="services-warranty indent-top-small indent-bottom-small animation-tracking">
					     <?php get_template_part('template-parts/decor-lines');?>
					     <div class="container-fluid">
						     <div class="row">
							     <h2 class="block-title big-title col-12 text-center"><?php echo $fields['dolphincargo_warranty_title'];?></h2>
						     </div>
						     <div class="row content">
							     <?php foreach( $fields['dolphincargo_warranty_list'] as $item ):?>
								     <?php if( $fields['dolphincargo_warranty_logic'] == 'yes' ):?>
							          <div class="warranty-item go-modal col-lg-3" data-toggle="modal" data-target="#formModal">
									   <?php else:?>
								        <div class="warranty-item col-lg-3">
								     <?php endif;?>

									     <div class="pic-wrapper">
										     <img
											     class="lazy"
											     data-src="<?php echo wp_get_attachment_image_src( $item['image'], 'full')[0];?>"
											     <?php
												     $altText = get_post_meta( $item['image'], '_wp_attachment_image_alt', TRUE);
												     if( !empty( $altText ) ):?>
													     alt="<?php echo $altText;?>"
													 <?php else:?>
													     alt="<?php echo the_title();?>"
											     <?php endif;?>
										     >
									     </div>
									     <p class="name"><?php echo $item['name'];?></p>
								     </div>
							     <?php endforeach;?>

						     </div>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}

