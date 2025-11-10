<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_container_size' );

	function dolphincargo_container_size(){
		Block::make( __( 'Container sizes & volumes' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_title', 'Заголовок'),
			     Field::make_rich_text('dolphincargo_about_containers', 'Інформація про контейнери'),
			     Field::make_rich_text('dolphincargo_offer', 'Текст пропозиції'),
			     Field::make_complex('dolphincargo_list', 'Формати контейнерів')
			          ->add_fields( array(
				            Field::make_text('name', 'Назва формату'),
					          Field::make_text('length', 'Довжина'),
					          Field::make_text('width', 'Ширина'),
					          Field::make_text('volume_height', 'Об’єм/Висота'),
					          Field::make_text('empty_weight', 'Вага порожнього'),
					          Field::make_text('load_capacity', 'Вантажопідйомність'),
				          )
			          ),

		     ) )

		     ->set_category( 'dolphincargo-container-page-category' )
		     ->set_icon('performance')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php
			     if( !empty($fields['dolphincargo_title']) && !empty($fields['dolphincargo_list']) ):?>
				     <!-- Розразунок вартості -->
				     <section class="container-sizing indent-top-small indent-bottom-small animation-tracking">
					     <div class="container-fluid">
						     <div class="row">
							     <h2 class="block-title small-title col-xl-8 col-lg-10 offset-xl-4 offset-lg-2 first-up">
								     <?php echo $fields['dolphincargo_title'];?>
							     </h2>
						     </div>
						     <div class="row">
							     <div class="content col-12">
								     <div class="inner">
									     <div class="info-wrapper">
										     <?php foreach( $fields['dolphincargo_list'] as $item ):?>
											     <ul class="container-item">
												     <li class="item">
													     <span class="label">
														     <?php echo esc_html( pll__( 'Формат' ) ); ?>
													     </span>
													     <span class="data"><?php echo $item['name'];?></span>
												     </li>
												     <li class="item">
													     <span class="label">
														     <?php echo esc_html( pll__( 'Довжина' ) ); ?>
													     </span>
													     <span class="data"><?php echo $item['length'];?></span>
												     </li>
												     <li class="item">
													     <span class="label">
														     <?php echo esc_html( pll__( 'Ширина' ) ); ?>
													     </span>
													     <span class="data"><?php echo $item['width'];?></span>
												     </li>
												     <li class="item">
													     <span class="label">
														     <?php echo esc_html( pll__( 'Об’єм/Висота' ) ); ?>
													     </span>
													     <span class="data"><?php echo $item['volume_height'];?></span>
												     </li>
												     <li class="item">
													     <span class="label">
														     <?php echo esc_html( pll__( 'Вага порожнього' ) ); ?>
													     </span>
													     <span class="data"><?php echo $item['empty_weight'];?></span>
												     </li>
												     <li class="item">
													     <span class="label">
														     <?php echo esc_html( pll__( 'Вантажопідйомність' ) ); ?>
													     </span>
													     <span class="data"><?php echo $item['load_capacity'];?></span>
												     </li>
											     </ul>
										     <?php endforeach;?>
									     </div>
									     <div class="text-content">
										     <?php if( !empty($fields['dolphincargo_about_containers']) ):?>
											     <div class="text-about">
												     <?php echo wpautop($fields['dolphincargo_about_containers']);?>
											     </div>
										     <?php endif;?>
										     <?php if( !empty($fields['dolphincargo_offer']) ):?>
											     <div class="text-offer">
												     <?php echo wpautop($fields['dolphincargo_offer']);?>
											     </div>
										     <?php endif;?>
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

