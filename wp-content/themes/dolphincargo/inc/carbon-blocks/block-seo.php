<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_seo_block' );

	function dolphincargo_seo_block(){
		Block::make( __( 'Seo Block' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_home_page_seo_title', 'Заголовок блоку'),
			     Field::make_text('dolphincargo_home_page_seo_subtitle', 'Підзаголовок блоку'),
			     Field::make_rich_text('dolphincargo_home_page_seo_text', 'Текст'),

		     ) )

		     ->set_category( 'dolphincargo-common-category' )
		     ->set_icon('info')


		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- SEO блок -->
			     <?php if ( $fields['dolphincargo_home_page_seo_title'] && $fields['dolphincargo_home_page_seo_text'] ):?>
				     <section class="seo-block indent-top-small indent-bottom-big" >
					     <?php get_template_part('template-parts/decor-lines');?>

					     <div class="container-fluid">
						     <div class="row">
							     <div class="content col-12">
								     <h2 class="block-title small-title text-center"><?php echo $fields['dolphincargo_home_page_seo_title'];?></h2>
								     <?php if( $fields['dolphincargo_home_page_seo_subtitle'] ):?>
									     <h3 class="subtitle text-center"><?php echo $fields['dolphincargo_home_page_seo_subtitle'];?></h3>
								     <?php endif;?>
								     <div class="text-content"><?php echo wpautop( $fields['dolphincargo_home_page_seo_text']);?></div>
							     </div>
						     </div>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}