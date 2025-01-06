<?php


	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_thx' );

	function dolphincargo_block_thx(){
		Block::make( __( 'Thank you!' ) )
		     ->add_fields( array(
		     	 Field::make_text('dolphincargo_block_thx_title', 'Заголовок'),
			     Field::make_image('dolphincargo_block_thx_image', 'Зображення')
			      ->set_type('image'),
			     Field::make_rich_text('dolphincargo_block_thx_text', 'Текст')

		     ) )

		     ->set_category( 'dolphincargo-thx-category' )
		     ->set_icon('yes')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Дякуємо -->
			     <?php if ( $fields['dolphincargo_block_thx_title'] && $fields['dolphincargo_block_thx_image'] && $fields['dolphincargo_block_thx_text'] ):?>
				     <section class="block-thx indent-top-small indent-bottom-medium animation-tracking" >
					     <?php get_template_part('template-parts/decor-lines');?>
               <div class="light top-pic"><img src="<?php echo THEME_PATH;?>/assets/img/faq-block-light.png" alt="<?php the_title();?>"></div>
               <div class="light bottom-pic"><img src="<?php echo THEME_PATH;?>/assets/img/faq-block-light.png" alt="<?php the_title();?>"></div>
					     <div class="container-fluid">
						     <div class="content col-12 text-center">
                   <div class="pic-wrapper">
                     <img
                         src="<?php echo wp_get_attachment_image_src( $fields['dolphincargo_block_thx_image'], 'full')[0];?>"
		                   <?php
			                   $altText = get_post_meta( $fields['dolphincargo_block_thx_image'], '_wp_attachment_image_alt', TRUE);
			                   if ( !empty( $altText ) ):?>
                           alt="<?php echo $altText;?>"
			                   <?php else:?>
                           alt="<?php echo $fields['dolphincargo_block_thx_title'];?>"
			                   <?php endif;?>
                     >
                   </div>

							     <h1 class="block-title big-title"><?php echo $fields['dolphincargo_block_thx_title'];?></h1>
							     <div class="text"><?php echo wpautop( $fields['dolphincargo_block_thx_text']);?></div>
							     <a href="<?php echo get_home_url('/');?>" class="button blue-btn">
								     <?php echo esc_html( pll__( 'Повернутись на головну' ) ); ?>
							     </a>
							     <?php get_template_part('template-parts/social-wrapper');?>
						     </div>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}