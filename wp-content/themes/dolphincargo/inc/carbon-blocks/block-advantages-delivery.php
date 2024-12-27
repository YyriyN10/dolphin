<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_advantages_delivery' );

	function dolphincargo_block_advantages_delivery(){
		Block::make( __( 'Advantages delivery' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_advantages_delivery_title', 'Заголовок'),
			     Field::make_complex('dolphincargo_advantages_delivery_list', 'Перелік переваг')
			          ->add_fields( array(
			          	Field::make_image('icon', 'Іконка переваги')
										->set_type('image')
										->set_value_type('url'),
				          Field::make_text('name', 'Назва переваги'),
				          Field::make_rich_text('text', 'Текст переваги')
			          )),

		     ) )

		     ->set_category( 'dolphincargo-services-category' )
		     ->set_icon('thumbs-up')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php
			     if( $fields['dolphincargo_advantages_delivery_title'] && $fields['dolphincargo_advantages_delivery_list'] ):
				     ?>
				     <!-- Переваги -->
				     <section class="services-advantages-delivery indent-top-small indent-bottom-small animation-tracking">
					     <?php get_template_part('template-parts/decor-lines');?>
					     <div class="container-fluid">
						     <div class="row">
							     <h2 class="block-title big-title text-center col-12"><?php echo $fields['dolphincargo_advantages_delivery_title'];?></h2>
						     </div>
						     <ul class="row content">
							     <?php foreach( $fields['dolphincargo_advantages_delivery_list'] as $item ):?>
								     <li class="item col-lg-4">
									     <div class="icon">
										     <img src="<?php echo $item['icon'];?>" class="svg-pic" alt="<?php echo $item['name'];?>">
									     </div>
									     <p class="name"><?php echo $item['name'];?></p>
									     <div class="description"><?php echo wpautop( $item['text']);?></div>
								     </li>
							     <?php endforeach;?>
						     </ul>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}

