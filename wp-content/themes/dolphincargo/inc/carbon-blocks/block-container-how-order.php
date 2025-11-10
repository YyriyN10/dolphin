<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_container_how_order' );

	function dolphincargo_container_how_order(){
		Block::make( __( 'Container how order' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_title', 'Заголовок'),
			     Field::make_text('dolphincargo_subtitle', 'Підзаголовок'),
			     Field::make_complex('dolphincargo_top_list', 'Що робимо ми')
			          ->add_fields( array(
					          Field::make_text('description', 'Опис дії')
				          )
			          ),
			     Field::make_image('dolphincargo_big_image', 'Велике зображення'),
			     Field::make_image('dolphincargo_small_image', 'Маленьке зображення'),
			     Field::make_complex('dolphincargo_list', 'Перелік кроків')
			          ->add_fields( array(
					          Field::make_text('name', 'Назва'),
					          Field::make_text('description', 'Опис')
				          )
			          )
		     ) )

		     ->set_category( 'dolphincargo-container-page-category' )
		     ->set_icon('editor-ol')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php
			     if( !empty($fields['dolphincargo_title']) && !empty($fields['dolphincargo_list']) ):?>
				     <!-- Розразунок вартості -->
				     <section class="container-how-order indent-top-small indent-bottom-small animation-tracking">
					     <div class="container-fluid">
						     <div class="row">
							     <div class="block-heading col-xl-8 col-lg-10 offset-xl-4 offset-lg-2 first-up">
								     <h2 class="block-title small-title"><?php echo $fields['dolphincargo_title'];?></h2>
								     <p class="subtitle"><?php echo $fields['dolphincargo_subtitle'];?></p>
							     </div>
						     </div>
						     <?php if( !empty($fields['dolphincargo_top_list']) ):?>
							     <div class="row">
								     <ul class="we-do-list col-12">
									     <?php foreach( $fields['dolphincargo_top_list'] as $doItem):?>
										     <li class="item">
											     <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
												     <path d="M9 18.5L15 12.5L9 6.5" stroke="#067FEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											     </svg>
											     <span><?php echo $doItem['description'];?></span>
										     </li>
									     <?php endforeach;?>
								     </ul>
							     </div>
						     <?php endif;?>
					     </div>
					     <?php if( !empty($fields['dolphincargo_big_image']) && !empty($fields['dolphincargo_small_image']) ):?>
						     <div class="image-animation-wrapper">
							     <div class="big-image">
								     <img
									     class="lazy"
									     data-src="<?php echo wp_get_attachment_image_src($fields['dolphincargo_big_image'], 'full')[0];?>"
									     <?php
										     $altText = get_post_meta($fields['dolphincargo_big_image'], '_wp_attachment_image_alt', TRUE);
										     if ( !empty( $altText ) ):?>
											     alt="<?php echo $altText;?>"
										     <?php else:?>
											     alt="<?php echo wp_strip_all_tags($fields['dolphincargo_title']);?>"
										     <?php endif;?>

								     >
							     </div>
							     <div class="small-image">
								     <img
									     class="lazy"
									     data-src="<?php echo wp_get_attachment_image_src($fields['dolphincargo_small_image'], 'full')[0];?>"
									     <?php
										     $altText = get_post_meta($fields['dolphincargo_small_image'], '_wp_attachment_image_alt', TRUE);
										     if ( !empty( $altText ) ):?>
											     alt="<?php echo $altText;?>"
										     <?php else:?>
											     alt="<?php echo wp_strip_all_tags($fields['dolphincargo_title']);?>"
										     <?php endif;?>

								     >
							     </div>
						     </div>
					     <?php endif;?>
					     <div class="container-fluid">
						     <div class="row">
							     <ol class="list-ingredients second-up col-12">
								     <?php foreach( $fields['dolphincargo_list'] as $index=>$item ):?>
									     <li class="item">
										     <p class="index"><?php echo $index + 1;?></p>
										     <p class="name"><?php echo $item['name'];?></p>
										     <p class="description">
											     <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
												     <path d="M9 18.5L15 12.5L9 6.5" stroke="#067FEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											     </svg>
											     <span><?php echo $item['description'];?></span>
										     </p>
										     <div class="decor"></div>

									     </li>
								     <?php endforeach;?>
							     </ol>
						     </div>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}

