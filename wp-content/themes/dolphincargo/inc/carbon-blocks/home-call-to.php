<?php


	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_home_call_to' );

	function dolphincargo_home_call_to(){
		Block::make( __( 'Airplane call to action' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_home_call_to_title', 'Заголовок блоку'),
			     Field::make_rich_text('dolphincargo_home_call_to_text', 'Текст'),
			     Field::make_image('dolphincargo_home_call_to_image', 'Зображення літака')
			      ->set_type('image'),
           Field::make_text('dolphincargo_home_call_to_marque', 'Текст у бігучий рядок')
            ->set_help_text('Не обовʼязкове поле')

		     ) )

		     ->set_category( 'dolphincargo-custom-category' )
		     ->set_icon('airplane')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Ббок заклику до дії -->
			     <?php if ( $fields['dolphincargo_home_call_to_title'] && $fields['dolphincargo_home_call_to_image']):?>
             <?php if( !empty( $fields['dolphincargo_home_call_to_marque']) ):?>
               <section class="airplane-call-to marque-type indent-bottom-small animation-tracking">
                 <div class="run-rows-wrapper indent-top-big">
                   <div class="first-row marque-row">
                     <div class="marque-list marquee-move-left">
			                 <?php
				                 $marqueImage = carbon_get_theme_option('dolphincargo_option_marque_image');

				                 for ($ml = 0; $ml < 11; $ml ++):?>
                           <p class="marque-item"><?php echo $fields['dolphincargo_home_call_to_marque'];?></p>
                           <img src="<?php echo $marqueImage;?>" alt="<?php echo get_bloginfo('name');?>">
				                 <?php endfor;?>
                     </div>
                   </div>
                   <div class="second-row marque-row">
                     <div class="marque-list marquee-move-right">
			                 <?php
				                 $marqueImage = carbon_get_theme_option('dolphincargo_option_marque_image');

				                 for ($mr = 0; $mr < 11; $mr ++):?>
                           <p class="marque-item"><?php echo $fields['dolphincargo_home_call_to_marque'];?></p>
                           <img src="<?php echo $marqueImage;?>" alt="<?php echo get_bloginfo('name');?>">
				                 <?php endfor;?>
                     </div>
                   </div>
                 </div>
             <?php else:?>
               <section class="airplane-call-to indent-bottom-small animation-tracking">
             <?php endif;?>

					     <?php get_template_part('template-parts/decor-lines');?>
               <!--<div class="light"><img src="<?php /*echo THEME_PATH;*/?>/assets/img/airplan-call-to-light.png" alt="<?php /*echo get_bloginfo('name');*/?>"></div>-->
               <div class="plain">
                 <img
                    class="lazy"
                    data-src="<?php echo wp_get_attachment_image_src( $fields['dolphincargo_home_call_to_image'], 'full')[0];?>"
                    alt="<?php echo get_post_meta( $fields['dolphincargo_home_call_to_image'], '_wp_attachment_image_alt', TRUE);?>"
                 >
               </div>
					     <div class="container-fluid">
						     <div class="row">
							     <div class="content col-xl-8 offset-xl-4 col-lg-10 offset-lg-2">
                     <?php if( !empty( $fields['dolphincargo_home_call_to_text'] ) ):?>
                       <h2 class="block-title big-title first-up"><?php echo $fields['dolphincargo_home_call_to_title'];?></h2>
                       <div class="text-content second-up "><?php echo wpautop( $fields['dolphincargo_home_call_to_text']);?></div>
                       <div class="button blue-btn third-up" data-toggle="modal" data-target="#formModal">
                         <?php echo esc_html( pll__( 'Надіслати заявку' ) ); ?>
                       </div>
                     <?php else:?>
                       <h2 class="block-title small-title first-up"><?php echo $fields['dolphincargo_home_call_to_title'];?></h2>
                       <div class="button blue-btn second-up" data-toggle="modal" data-target="#formModal">
                         <?php echo esc_html( pll__( 'Надіслати заявку' ) ); ?>
                       </div>
                     <?php endif;?>
							     </div>
						     </div>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}