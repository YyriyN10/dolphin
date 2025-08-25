<?php


	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_representation' );

	function dolphincargo_block_representation(){
		Block::make( __( 'World representation' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_representation_title', 'Заголовок блоку'),
			     Field::make_rich_text('dolphincargo_representation_text', 'Текст блоку'),
			     Field::make_image('dolphincargo_representation_map_pic', 'Зображення мапи')
			      ->set_type('image'),
			     Field::make_image('dolphincargo_representation_text_pic', 'Зображення під текстом')
			          ->set_type('image')
                ->set_value_type('url'),
		     ) )

		     ->set_category( 'dolphincargo-how-category' )
		     ->set_icon('admin-site-alt3')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Представнитства у світі -->
			     <?php if ( $fields['dolphincargo_representation_title'] && $fields['dolphincargo_representation_map_pic'] && $fields['dolphincargo_representation_text_pic']):?>
				     <section class="block-representation animation-tracking indent-top-big indent-bottom-small" >
					     <?php get_template_part('template-parts/decor-lines');?>
               <div class="light"><img src="<?php echo THEME_PATH;?>/assets/img/light-h-2.png" alt="<?php the_title();?>"></div>
					     <p class="image-text" style="background-image: url(<?php echo $fields['dolphincargo_representation_text_pic'];?>)">Dolphin</p>
					     <div class="container-fluid">
						     <div class="row first-up">
							     <div class="content col-xl-8 col-lg-10 offset-xl-4 offset-lg-2">
								     <h2 class="block-title big-title "><?php echo $fields['dolphincargo_representation_title'];?></h2>
								     <?php if( !empty( $fields['dolphincargo_representation_text'] ) ):?>
									     <div class="text"><?php echo wpautop( $fields['dolphincargo_representation_text'] );?></div>
								     <?php endif;?>
							     </div>
						     </div>
						     <div class="row">
							     <div class="pic-wrapper col-12">
								     <img
								        class="lazy"
								        data-src="<?php echo wp_get_attachment_image_src( $fields['dolphincargo_representation_map_pic'], 'full')[0];?>"
								        <?php
								         $altText = get_post_meta( $fields['dolphincargo_representation_map_pic'], '_wp_attachment_image_alt', TRUE);
								         if ( !empty( $altText ) ):?>
								             alt="<?php echo $altText;?>"
								         <?php else:?>
								             alt="<?php echo $fields['dolphincargo_representation_title'];?>"
								         <?php endif;?>

								     >
							     </div>
						     </div>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}