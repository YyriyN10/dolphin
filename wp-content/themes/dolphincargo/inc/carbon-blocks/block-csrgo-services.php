<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_cargo_services' );

	function dolphincargo_block_cargo_services(){
		Block::make( __( 'Cargo services' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_cargo_services_title', 'Заголовок'),
			     Field::make_rich_text('dolphincargo_cargo_services_text', 'Текст блоку'),
			     Field::make_complex('dolphincargo_cargo_services_list', 'Перелік що надаємо')
			          ->add_fields( array(
			          	Field::make_text('name', 'Назва'),
				          Field::make_complex('list', 'Що входить')
										->add_fields( array(
											Field::make_text('text', 'Текст')
										))
			          )),
		     ) )

		     ->set_category( 'dolphincargo-services-category' )
		     ->set_icon('tickets-alt')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php
			     if( $fields['dolphincargo_cargo_services_title'] && $fields['dolphincargo_cargo_services_list'] ):
				     ?>
				     <!-- Рівень сервісу -->
				     <section class="services-service-level indent-top-small indent-bottom-small animation-tracking">
					     <?php get_template_part('template-parts/decor-lines');?>
					     <div class="container-fluid">
						     <div class="row">
							     <div class="block-header col-xl-8 col-lg-10 offset-xl-4 offset-lg-2 first-up">
								     <h2 class="block-title big-title"><?php echo $fields['dolphincargo_cargo_services_title'];?></h2>
								     <?php if( !empty( $fields['dolphincargo_cargo_services_text'] ) ):?>
									     <div class="text"><?php echo wpautop( $fields['dolphincargo_cargo_services_text'] );?></div>
								     <?php endif;?>
							     </div>
						     </div>
						     <div class="row content second-up">
							     <?php foreach( $fields['dolphincargo_cargo_services_list'] as $item ):?>
								     <div class="level-card col-lg-4 col-md-6">
									     <p class="name"><?php echo $item['name'];?></p>
									     <?php if( $item['list'] ):?>
										     <ul class="list">
											     <?php foreach( $item['list'] as $innerItem ):?>
												     <li>
                               <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M9 18.5L15 12.5L9 6.5" stroke="#067FEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                               </svg>
                               <span><?php echo $innerItem['text'];?></span>
                             </li>
											     <?php endforeach;?>

										     </ul>
									     <?php endif;?>

								     </div>
							     <?php endforeach;?>
						     </div>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}

