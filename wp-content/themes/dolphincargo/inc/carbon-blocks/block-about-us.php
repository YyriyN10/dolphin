<?php


	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_about_us' );

	function dolphincargo_block_about_us(){
		Block::make( __( 'About us' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_block_about_us_title', 'Заголовок блоку'),
			     Field::make_rich_text('dolphincargo_block_about_us_text', 'Текст'),
			     Field::make_complex('dolphincargo_block_about_us_gallery', 'Галерея зображень')
						->add_fields( array(
							Field::make_image('image', 'Зображення')
							     ->set_type('image'),
						)),

			     Field::make_association('dolphincargo_block_about_us_link', 'Посилання на сторінку')
				     ->set_max(1)
				     ->set_types( array(
					     array(
						     'type'      => 'post',
						     'post_type' => 'page',
					     )
				     ) ),

		     ) )

		     ->set_category( 'dolphincargo-common-category' )
		     ->set_icon('building')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Про нас -->
			     <?php if ( $fields['dolphincargo_block_about_us_title'] && $fields['dolphincargo_block_about_us_text'] && $fields['dolphincargo_block_about_us_gallery']):?>
				     <section class="about-us indent-top-small indent-bottom-medium animation-tracking" >
					     <?php get_template_part('template-parts/decor-lines');?>
					     <div class="container-fluid">
						     <div class="row">
							     <div class="about-us__slider-wrapper col-lg-4 col-md-5 third-up">
								     <div class="about-us__slider" id="about-us-slider">
                       <?php foreach( $fields['dolphincargo_block_about_us_gallery'] as $image ):?>
                         <div class="slide">
                           <img
                               src="<?php echo wp_get_attachment_image_src( $image['image'], 'full')[0];?>"
                               <?php
                                 $altText = get_post_meta( $image['image'], '_wp_attachment_image_alt', TRUE);

                                 if( !empty( $altText ) ):?>
                                   alt="<?php echo get_post_meta( $image['image'], '_wp_attachment_image_alt', TRUE);?>"
                                 <?php else:?>
                                   alt="<?php echo get_bloginfo('name');?>"
                               <?php endif;?>

                           >
                         </div>
                       <?php endforeach;?>

								     </div>
								     <?php get_template_part('template-parts/slider-navigation');?>
							     </div>
							     <div class="text-content col-lg-8 col-md-7 ">
								     <h2 class="block-title small-title first-up"><?php echo $fields['dolphincargo_block_about_us_title'];?></h2>
								     <div class="text-content second-up"><?php echo wpautop( $fields['dolphincargo_block_about_us_text']);?></div>
                     <?php if( $fields['dolphincargo_block_about_us_link'] ):?>
                       <?php foreach( $fields['dolphincargo_block_about_us_link'] as $item ):?>
                         <a href="<?php the_permalink( $item['id']);?>" class="button second-up"><?php echo esc_html( pll__( 'Більше про нас' ) ); ?></a>
                       <?php endforeach;?>
                     <?php endif;?>
							     </div>
						     </div>
					     </div>
               <div class="light">
                 <img src="<?php echo THEME_PATH;?>/assets/img/about-us-block-light.png" alt="">
               </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}