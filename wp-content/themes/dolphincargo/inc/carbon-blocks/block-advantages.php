<?php


	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_advantages' );

	function dolphincargo_block_advantages(){
		Block::make( __( 'Advantages' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_block_advantages_title', 'Заголовок блоку'),
			     Field::make_complex('dolphincargo_block_advantages_list', 'Перелік переваг')
			          ->add_fields( array(
				          Field::make_text('name', 'Назва переваги'),
				          Field::make_rich_text('description', 'Короткий опис переаги')
			          )),
			     Field::make_image('dolphincargo_block_advantages_top_image', 'Зображення верхнє')
			      ->set_type('image'),
			     Field::make_image('dolphincargo_block_advantages_bottom_image', 'Зображення нижнє')
			          ->set_type('image'),

		     ) )

		     ->set_category( 'dolphincargo-common-category' )
		     ->set_icon('yes-alt')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Переваги -->
			     <?php if ( $fields['dolphincargo_block_advantages_title'] && $fields['dolphincargo_block_advantages_list'] ):?>
				     <section class="our-advantages" >
					     <?php get_template_part('template-parts/decor-lines');?>
					     <div class="container-fluid">
						     <div class="row">
							     <h2 class="block-title col-12 text-center"><?php echo $fields['dolphincargo_block_advantages_title'];?></h2>
						     </div>
						     <div class="row content">
							     <?php foreach( $fields['dolphincargo_block_advantages_list'] as $index => $item ):?>
                     <?php if( $index == 2 ):?>
                       <?php if( !empty( $fields['dolphincargo_block_advantages_top_image'] ) ):?>
                         <div class="our-advantages__item image image-top col-lg-4">
                           <div class="inner">
                             <img
                                 src="<?php echo wp_get_attachment_image_src( $fields['dolphincargo_block_advantages_top_image'], 'full')[0];?>"
													     <?php
														     $altText = get_post_meta( $fields['dolphincargo_block_advantages_top_image'], '_wp_attachment_image_alt', TRUE);

														     if( !empty( $altText ) ):?>
                                   alt="<?php echo $altText;?>"
														     <?php else:?>
                                   alt="<?php echo get_bloginfo('name');?>"
														     <?php endif;?>
                             >
                           </div>
                         </div>
                       <?php endif;?>
                       <?php if( !empty( $fields['dolphincargo_block_advantages_bottom_image'] ) ):?>
                         <div class="our-advantages__item image image-bootom col-lg-4">
                           <div class="inner">
                             <img
                                 src="<?php echo wp_get_attachment_image_src( $fields['dolphincargo_block_advantages_bottom_image'], 'full')[0];?>"
													     <?php
														     $altText = get_post_meta( $fields['dolphincargo_block_advantages_bottom_image'], '_wp_attachment_image_alt', TRUE);

														     if( !empty( $altText ) ):?>
                                   alt="<?php echo $altText;?>"
														     <?php else:?>
                                   alt="<?php echo get_bloginfo('name');?>"
														     <?php endif;?>
                             >
                           </div>
                         </div>
                       <?php endif;?>
                       <div class="our-advantages__item text col-lg-4">
                         <div class="inner">
                         <span class="number">
                           <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9 18.5L15 12.5L9 6.5" stroke="#067FEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                           0<?php echo $index + 1;?>
                         </span>
                           <h3 class="name"><?php echo $item['name'];?></h3>
                           <div class="description"><?php echo wpautop( $item['description']);?></div>
                         </div>
                       </div>
                     <?php else:?>
                       <div class="our-advantages__item text col-lg-4">
                         <div class="inner">
                         <span class="number">
                           <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9 18.5L15 12.5L9 6.5" stroke="#067FEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                           0<?php echo $index + 1;?>
                         </span>
                           <h3 class="name"><?php echo $item['name'];?></h3>
                           <div class="description"><?php echo wpautop( $item['description']);?></div>
                         </div>
                       </div>
                     <?php endif;?>
							     <?php endforeach;?>
						     </div>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}