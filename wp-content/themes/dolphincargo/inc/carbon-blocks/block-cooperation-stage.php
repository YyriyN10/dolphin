<?php


	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_cooperation_stage' );

	function dolphincargo_block_cooperation_stage(){
		Block::make( __( 'Cooperation stages' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_cooperation_stage_title', 'Заголовок блоку'),
			     Field::make_complex('dolphincargo_cooperation_stage_list', 'Перелік етапів')
		        ->add_fields(array(
		        	Field::make_image('icon', 'Іконка етапу')
			          ->set_type('image')
			          ->set_value_type('url'),
			        Field::make_text('name', 'Назва етапу'),
			        Field::make_text('so_name', 'Невелике пояснення до назви')
			          ->help_text('Якщо потрібно'),
			        Field::make_text('steps_title', 'Заголовок переліку того що входить в етап')
				        ->help_text('Якщо потрібно'),
			        Field::make_complex('inner_list', 'Перелік того що входить в етап')
			          ->add_fields(array(
			          	Field::make_text('text', 'Текст')
			          ))
		        )),

		     ) )

		     ->set_category( 'dolphincargo-how-category' )
		     ->set_icon('clipboard')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Етапи співпраці -->
			     <?php if ( $fields['dolphincargo_cooperation_stage_title'] && $fields['dolphincargo_cooperation_stage_list'] ):?>
				     <section class="block-cooperation-stage animation-tracking indent-bottom-small" >
					     <?php get_template_part('template-parts/decor-lines');?>
					     <div class="container-fluid">
						     <div class="row first-up">
							     <h2 class="block-title big-title col-xl-8 col-lg-10 offset-xl-4 offset-lg-2"><?php echo $fields['dolphincargo_cooperation_stage_title'];?></h2>
						     </div>
						     <?php foreach( $fields['dolphincargo_cooperation_stage_list'] as $item ):?>
							     <div class="row stage-item second-up">
								     <div class="block-cooperation-stage__icon col-md-2 col-sm-4 col-6">
									     <img src="<?php echo $item['icon'];?>" alt="<?php echo $item['name'];?>" class="svg-pic">
								     </div>
								     <h3 class="block-cooperation-stage__name col-md-4 col-sm-8">
									     <?php echo $item['name'];?>
									     <?php if( $item['so_name'] ):?>
										     <span><?php echo $item['so_name'];?></span>
									     <?php endif;?>
								     </h3>
								     <div class="block-cooperation-stage__content col-md-6 col-12">
									     <?php if( $item['steps_title'] ):?>
										     <p class="description-text"><?php echo $item['steps_title'];?></p>
									     <?php endif;?>
									     <?php if( $item['inner_list'] ):?>
										     <ul class="description-list">
											     <?php foreach( $item['inner_list'] as $innerItem ):?>
												     <li class="item">
													     <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
														     <path d="M9 18.5L15 12.5L9 6.5" stroke="#067FEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													     </svg>
													     <span><?php echo $innerItem['text'];?></span>
												     </li>
											     <?php endforeach;?>
										     </ul>
									     <?php endif;?>
								     </div>
							     </div>
						     <?php endforeach;?>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}