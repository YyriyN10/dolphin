<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_container_types' );

	function dolphincargo_container_types(){
		Block::make( __( 'Container types' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_title', 'Заголовок'),
			     Field::make_complex('dolphincargo_list', 'Формати контейнерів')
			          ->add_fields( array(
					          Field::make_text('name_tab', 'Назва типу контейнера'),
					          Field::make_image('image', 'Зображення контейнера'),
					          Field::make_text('title', 'Заголовок'),
					          Field::make_text('description', 'Короткий опис'),
					          Field::make_complex('for_list', 'Перелік, для чого підходить')
											->add_fields(array(
												Field::make_image('image', 'Зобрадення типу вантажу'),
												Field::make_text('name', 'Назва типу вантажу')
											)),
					          Field::make_text('advantage', 'Текст переваги')
				          )
			          ),

		     ) )

		     ->set_category( 'dolphincargo-container-page-category' )
		     ->set_icon('info')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php
			     if( !empty($fields['dolphincargo_title']) && !empty($fields['dolphincargo_list']) ):?>

				     <section class="container-types indent-top-small indent-bottom-small animation-tracking">
					     <div class="container-fluid">
						     <div class="row">
							     <h2 class="block-title small-title col-xl-8 col-lg-10 offset-xl-4 offset-lg-2 first-up">
								     <?php echo $fields['dolphincargo_title'];?>
							     </h2>
						     </div>
						     <div class="row">
							     <div class="slider-wrapper col-12">
								     <ul class="slider-prev-nav" id="container-types-slider-nav">
									     <?php foreach( $fields['dolphincargo_list'] as $index=>$item ):?>
										     <li class="item">
											     <?php echo $item['name_tab'];?>
										     </li>
									     <?php endforeach;?>
								     </ul>
								     <div class="slider">
									     <?php foreach( $fields['dolphincargo_list'] as $index=>$item ):?>
										     <div class="slide" id="container-types-slider">
											     <div class="inner">
												     <div class="text-content">
													     <?php if( !empty($item['title']) ):?>
														     <h3 class="name"><?php echo $item['title'];?></h3>
													     <?php endif;?>
													     <?php if( !empty($item['description']) ):?>
														     <p class="description"><?php echo $item['description'];?></p>
													     <?php endif;?>
													     <?php if( !empty($item['for_list']) ):?>
														     <div class="for-wrapper">
															     <h3 class="name"><?php echo esc_html( pll__( 'Підходить для' ) ); ?>:</h3>
															     <ul class="for-list">
																     <?php foreach( $item['for_list'] as $innerItem):?>
																	     <li class="item">
																		     <?php if( !empty($innerItem['image']) ):?>
																			     <div class="image">
																				     <img
																					     class="lazy"
																					     data-src="<?php echo wp_get_attachment_image_src($innerItem['image'], 'full')[0];?>"
																					     alt="<?php echo get_post_meta($innerItem['image'], '_wp_attachment_image_alt', TRUE);?>"
																				     >
																			     </div>
																		     <?php endif;?>
																		     <?php if( !empty($innerItem['name']) ):?>
																			     <p class="type-cargo"><?php echo $innerItem['name'];?></p>
																		     <?php endif;?>
																	     </li>
																     <?php endforeach;?>
															     </ul>
														     </div>
													     <?php endif;?>
													     <?php if( !empty($item['advantage']) ):?>
														     <h3 class="name"><?php echo esc_html( pll__( 'Перевага' ) ); ?></h3>
														     <p class="advantage-text"><?php echo $item['advantage'];?></p>
													     <?php endif;?>

												     </div>
												     <div class="image-wrapper">
													     <img
														     class="lazy"
														     data-src="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0];?>"
														     alt="<?php echo get_post_meta($item['image'], '_wp_attachment_image_alt', TRUE);?>"
													     >
												     </div>
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

