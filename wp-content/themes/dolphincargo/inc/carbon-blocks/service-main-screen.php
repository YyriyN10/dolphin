<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_service_main_screen' );

	function dolphincargo_service_main_screen(){
		Block::make( __( 'Service main screen' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_service_main_screen_title', 'Головний заголовок'),
			     Field::make_text('dolphincargo_service_main_screen_who_are_we', 'Чим займаємось'),
			     Field::make_image('dolphincargo_service_main-screen_image', 'Зображення')
			          ->set_type('image')
			          ->set_value_type('url'),

		     ) )

		     ->set_category( 'dolphincargo-services-category' )
		     ->set_icon('cover-image')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- головний екран -->
			     <section class="main-screen service-main-screen" style="background-image: url(<?php echo $fields['dolphincargo_service_main-screen_image'];?>)">
				     <?php get_template_part('template-parts/decor-lines');?>
				     <div class="container-fluid">
					     <div class="row">
						     <div class="content col-12">
							     <h1 class="main-title"><?php echo $fields['dolphincargo_service_main_screen_title'];?></h1>
							     <?php if( $fields['dolphincargo_service_main_screen_who_are_we'] ):?>
								     <p class="who-are"><?php echo $fields['dolphincargo_service_main_screen_who_are_we'];?></p>
							     <?php endif;?>
							     <a href="#" rel="nofollow" class="button blue-btn" data-toggle="modal" data-target="#formModal">
								     <?php echo esc_html( pll__( 'Отримати консультацію' ) ); ?>
							     </a>
						     </div>
					     </div>
				     </div>
				     <a href="#" rel="nofollow" class="circle-button" data-toggle="modal" data-target="#formModal">
					     <?php echo esc_html( pll__( 'Отримати консультацію' ) ); ?>
				     </a>
			     </section>

			     <?php
		     } );
	}