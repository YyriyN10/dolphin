<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_container_main_screen' );

	function dolphincargo_container_main_screen(){
		Block::make( __( 'Container main screen' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_container_main_screen_title', 'Головний заголовок'),
			     Field::make_text('dolphincargo_container_main_screen_who_are_we', 'Чим займаємось'),
			     Field::make_image('dolphincargo_container_main_screen_image', 'Зображення')
			          ->set_help_text('Зображення для моніторів з розширенням меншк за 2000рх')
			          ->set_type('image')
			          ->set_value_type('url'),
			     Field::make_image('dolphincargo_container_main_screen_image_larg', 'Зображення для великих екранів')
			          ->set_help_text('Зображення для моніторів з розширенням більше за 2000рх')
			          ->set_type('image')
			          ->set_value_type('url'),
			     Field::make_image('dolphincargo_container_main_screen_image_mob', 'Зображення для мобільних телефонів')
			          ->set_type('image')
			          ->set_value_type('url'),
			     Field::make_complex('dolphincargo_container_main_screen_advantages_list', 'Перелік переваг')
			          ->add_fields(array(
				          Field::make_text('name', 'Назва переваги'),
			          )),

		     ) )

		     ->set_category( 'dolphincargo-container-page-category' )
		     ->set_icon('cover-image')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- головний екран -->
			     <section class="main-screen container-main-screen" >

				     <style>

					     .container-main-screen{
						     background-image: url(<?php echo $fields['dolphincargo_container_main_screen_image'];?>);
					     }
					     <?php if( !empty($fields['dolphincargo_container_main_screen_image_larg']) ):?>

					     @media (min-width: 2001px) {
						     .container-main-screen{
							     background-image: url(<?php echo $fields['dolphincargo_container_main_screen_image_larg'];?>);
						     }
					     }
					     <?php endif;?>


					     <?php if( !empty($fields['dolphincargo_container_main_screen_image']) ):?>
					     @media (max-width: 2000px) {
						     .container-main-screen{
							     background-image: url(<?php echo $fields['dolphincargo_container_main_screen_image'];?>);
						     }
					     }
					     <?php endif;?>

					     <?php if( !empty($fields['dolphincargo_container_main_screen_image_mob']) ):?>
					     @media (max-width: 575px) {
						     .container-main-screen{
							     background-image: url(<?php echo $fields['dolphincargo_container_main_screen_image_mob'];?>);
						     }
					     }
					     <?php endif;?>

				     </style>

				     <div class="container-fluid">
					     <div class="row">
						     <div class="content col-12">
							     <h1 class="main-title"><?php echo $fields['dolphincargo_container_main_screen_title'];?></h1>
							     <?php if( $fields['dolphincargo_container_main_screen_who_are_we'] ):?>
								     <p class="who-are"><?php echo $fields['dolphincargo_container_main_screen_who_are_we'];?></p>
							     <?php endif;?>
							     <div class="button blue-btn" data-toggle="modal" data-target="#formModal">
								     <?php echo esc_html( pll__( 'ОТРИМАТИ РОЗРАХУНОК' ) ); ?>
							     </div>
						     </div>

					     </div>
					     <?php if( !empty( $fields['dolphincargo_container_main_screen_advantages_list'] ) ):?>
						     <div class="row">
							     <ul class="advantages-list col-12">
								     <?php foreach( $fields['dolphincargo_container_main_screen_advantages_list'] as $item ):?>
									     <li class="advantage">
										     <?php echo $item['name'];?>
									     </li>
								     <?php endforeach;?>
							     </ul>
						     </div>
					     <?php endif;?>
				     </div>
			     </section>

			     <?php
		     } );
	}