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
			      ->set_type('image')

		     ) )

		     ->set_category( 'dolphincargo-custom-category' )
		     ->set_icon('airplane')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Ббок заклику до дії -->
			     <?php if ( $fields['dolphincargo_home_call_to_title'] && $fields['dolphincargo_home_call_to_text'] && $fields['dolphincargo_home_call_to_image']):?>
				     <section class="airplane-call-to indent-bottom-small animation-tracking">
					     <?php get_template_part('template-parts/decor-lines');?>
               <div class="light"><img src="<?php echo THEME_PATH;?>/assets/img/airplan-call-to-light.png" alt=""></div>
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
								     <h2 class="block-title big-title first-up"><?php echo $fields['dolphincargo_home_call_to_title'];?></h2>
								     <div class="text-content second-up "><?php echo wpautop( $fields['dolphincargo_home_call_to_text']);?></div>
								     <a href="#" class="button blue-btn third-up"><?php echo esc_html( pll__( 'Надіслати заявку' ) ); ?></a>
							     </div>
						     </div>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}