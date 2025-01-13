<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_blog_post_text_part' );

	function dolphincargo_blog_post_text_part(){
		Block::make( __( 'Text part' ) )
		     ->add_fields( array(
			     Field::make_rich_text('dolphincargo_blog_post_text_part', 'Текстовий розділ')
            ->set_settings([
	            'media_buttons' => false,
            ])

		     ) )

		     ->set_category( 'dolphincargo-blog-post-category' )
		     ->set_icon('text-page')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php if ( $fields['dolphincargo_blog_post_text_part'] ):?>
				     <div class="post-text-part"><?php echo wpautop( $fields['dolphincargo_blog_post_text_part']);?></div>
			     <?php endif;?>

			     <?php
		     } );
	}