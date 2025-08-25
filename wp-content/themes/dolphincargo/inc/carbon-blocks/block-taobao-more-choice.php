<?php


	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_taobao_more_choice' );

	function dolphincargo_block_taobao_more_choice(){
		Block::make( __( 'More choice, lessL cost' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_taobao_more_choice_title', 'Заголовок блоку'),
			     Field::make_rich_text('dolphincargo_taobao_more_choice_text', 'Текст'),
			     Field::make_image('block_image', 'Зображення')
			          ->set_type('image'),
			     Field::make_complex('dolphincargo_taobao_more_choice_list', 'Перелік переваг')
			          ->add_fields( array(
				          Field::make_text('text', 'Текст переваги')
			          )),

		     ) )

		     ->set_category( 'dolphincargo-taobao-page-category' )
		     ->set_icon('list-view')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Переваги -->
			     <?php if ( $fields['dolphincargo_taobao_more_choice_title'] && $fields['dolphincargo_taobao_more_choice_list'] && $fields['block_image']):?>
				     <section class="taobao-more-choice indent-top-big indent-bottom-small animation-tracking" >
					     <div class="container-fluid">
						     <div class="row first-up">
							     <h2 class="block-title small-title col-xl-8 offset-xl-4 col-lg-10 offset-lg-2">
								     <?php echo $fields['dolphincargo_taobao_more_choice_title'];?>
							     </h2>
						     </div>
						     <div class="row">
							     <div class="pic-wrapper col-md-5 col-lg-6 second-up">
                     <div class="inner">
                       <img
                           class="lazy"
                           data-src="<?php echo wp_get_attachment_image_src($fields['block_image'], 'full')[0];?>"
		                     <?php
			                     $altText = get_post_meta($fields['block_image'], '_wp_attachment_image_alt', TRUE);
			                     if ( !empty( $altText ) ):?>
                             alt="<?php echo $altText;?>"
			                     <?php else:?>
                             alt="<?php echo wp_strip_all_tags($fields['dolphincargo_taobao_more_choice_title']);?> "
			                     <?php endif;?>

                       >
                     </div>
							     </div>
							     <div class="text-content col-md-7 col-lg-6 third-up">
								     <div class="text"><?php echo wpautop($fields['dolphincargo_taobao_more_choice_text']);?></div>
								     <ul class="list-wrapper">
									     <?php foreach( $fields['dolphincargo_taobao_more_choice_list'] as $item ):?>
									        <li class="item">
										        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
											        <path d="M9 18.5L15 12.5L9 6.5" stroke="#067FEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										        </svg>
														<span><?php echo $item['text'];?></span>
									        </li>
									     <?php endforeach;?>
								     </ul>
							     </div>
						     </div>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}