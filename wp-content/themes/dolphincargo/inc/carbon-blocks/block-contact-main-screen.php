<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_contact_main_screen' );

	function dolphincargo_contact_main_screen(){
		Block::make( __( 'Contact main screen' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_contact_main_screen_title', 'Головний заголовок'),
			     Field::make_image('dolphincargo_contact_main-screen_image', 'Зображення')
			          ->set_type('image')
			          ->set_value_type('url'),
		     ) )

		     ->set_category( 'dolphincargo-contact-category' )
		     ->set_icon('cover-image')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- головний екран -->
			     <section class="main-screen contact-main-screen" style="background-image: url(<?php echo $fields['dolphincargo_contact_main-screen_image'];?>)">
				     <?php get_template_part('template-parts/decor-lines');?>
				     <div class="container-fluid">
					     <div class="row">
						     <div class="content col-12">
							     <h1 class="main-title"><?php echo $fields['dolphincargo_contact_main_screen_title'];?></h1>
						     </div>
					     </div>
				     </div>
			     </section>
			     <?php
		     } );
	}





