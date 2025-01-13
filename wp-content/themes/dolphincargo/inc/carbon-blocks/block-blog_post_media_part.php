<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_blog_post_media_part' );

	function dolphincargo_blog_post_media_part(){
		Block::make( __( 'Media part' ) )
		     ->add_fields( array(
		     	 Field::make_text('dolphincargo_blog_post_media_part_title', 'Заголовок'),
			     Field::make_rich_text('dolphincargo_blog_post_media_part_text', 'Текстова частина')
			          ->set_settings([
				          'media_buttons' => false,
			          ]),
			     Field::make_image('dolphincargo_blog_post_media_part_image', 'Зображення')

		     ) )

		     ->set_category( 'dolphincargo-blog-post-category' )
		     ->set_icon('analytics')


		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>


			     <?php if ( $fields['dolphincargo_blog_post_media_part_text'] && $fields['dolphincargo_blog_post_media_part_image'] ):?>
				     <div class="post-media-part">
					     <?php if( !empty( $fields['dolphincargo_blog_post_media_part_title'] ) ):?>
						     <h2><?php echo $fields['dolphincargo_blog_post_media_part_title'];?></h2>
					     <?php endif;?>
					     <div class="pic-wrapper">
						     <img
						        class="lazy"
						        data-src="<?php echo wp_get_attachment_image_src( $fields['dolphincargo_blog_post_media_part_image'], 'full')[0];?>"
						        <?php
						         $altText = get_post_meta( $fields['dolphincargo_blog_post_media_part_image'], '_wp_attachment_image_alt', TRUE);
						         if ( !empty( $altText ) ):?>
						             alt="<?php echo $altText;?>"
						         <?php else:?>
						             alt="<?php the_title();?>"
						         <?php endif;?>

						     >
					     </div>
					     <div class="text-wrapper">
						     <?php echo wpautop( $fields['dolphincargo_blog_post_media_part_text']);?>
					     </div>

				     </div>
			     <?php endif;?>

			     <?php
		     } );
	}