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
			     /* Field::make_image('dolphincargo_contact_main-screen_image', 'Зображення')
				     ->set_help_text('Зображення для моніторів з розширенням менше за 2000рх')
			          ->set_type('image')
			          ->set_value_type('url'),
			     Field::make_image('dolphincargo_contact_main-screen_image_larg', 'Зображення для великих екранів')
			          ->set_help_text('Зображення для моніторів з розширенням більше за 2000рх')
			          ->set_type('image')
			          ->set_value_type('url'), */
		     ) )




		     ->set_category( 'dolphincargo-contact-category' )
		     ->set_icon('cover-image')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- головний екран -->
			     <section class="main-screen contact-main-screen" >
				     <!-- <?php if( !empty($fields['dolphincargo_contact_main-screen_image_larg']) ):?>
               <style>
                 @media (min-width: 2001px) {
                   .contact-main-screen{
                     background-image: url(<?php echo $fields['dolphincargo_contact_main-screen_image_larg'];?>);
                   }
                 }


                 <?php if( !empty($fields['dolphincargo_contact_main-screen_image']) ):?>
                 @media (max-width: 2000px) {
                   .contact-main-screen{
                     background-image: url(<?php echo $fields['dolphincargo_contact_main-screen_image'];?>);
                   }
                 }
                 <?php endif;?>

               </style>
				     <?php else:?>
               <style>
                 .contact-main-screen{
                   background-image: url(<?php echo $fields['dolphincargo_contact_main-screen_image'];?>);
                 }

               </style>
				     <?php endif;?> -->
				     <!-- <?php get_template_part('template-parts/decor-lines');?> -->
				     <div class="container-fluid">
					     <div class="row">
						     <div class="content col-12 text-cente">
							     <h1 class="main-title text-center"><?php echo $fields['dolphincargo_contact_main_screen_title'];?></h1>
						     </div>
					     </div>
				     </div>
						 
						
			     </section>
			     <?php
		     } );
	}





