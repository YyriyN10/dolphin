<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_calculator_how_get_price' );

	function dolphincargo_block_calculator_how_get_price(){
		Block::make( __( 'Calculator how get price' ) )
		     ->add_fields( array(
			     Field::make_text('block_title', 'Заголовок блоку'),
			     Field::make_image('block_image', 'Зображення блоку')
						->set_type('image'),
			     Field::make_complex('block_list', 'Перелік кроків')
			          ->add_fields(array(
				          Field::make_text('name', 'Назва кроку'),
				          Field::make_rich_text('text', 'Текст кроку')
			          )),
			     Field::make_text('block_marque', 'Текст бігучого рядку')
		     ) )

		     ->set_category( 'dolphincargo-calculator-page-category' )
		     ->set_icon('editor-ol')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php if( !empty( $fields['block_list'] ) ):?>
				     <section class="how-find-shipping-cost indent-bottom-small indent-top-small animation-tracking" >
					     <div class="container-fluid">
						     <?php if( !empty($fields['block_title']) ):?>
							     <div class="row first-up">
								     <h2 class="block-title big-title col-xl-8 offset-xl-4 col-lg-10 offset-lg-2"><?php echo $fields['block_title'];?></h2>
							     </div>
						     <?php endif;?>
						     <div class="row">
							     <?php if( !empty($fields['block_image']) ):?>
							      <div class="pic-wrapper col-lg-6 offset-lg-0 col-md-6 offset-md-3 col-sm-8 offset-sm-2">
								      <img
								         class="lazy"
								         data-src="<?php echo wp_get_attachment_image_src($fields['block_image'], 'full')[0];?>"
								         <?php
								          $altText = get_post_meta($fields['block_image'], '_wp_attachment_image_alt', TRUE);
								          if ( !empty( $altText ) ):?>
								              alt="<?php echo $altText;?>"
								          <?php else:?>
								              alt="<?php echo wp_strip_all_tags($fields['block_title']);?>"
								          <?php endif;?>
								      >
							      </div>
							     <?php endif;?>

							     <ul class="step-list <?php if(!empty($fields['block_image'])){echo 'col-lg-6';}else{echo 'col-12';}?>">
								     <?php foreach( $fields['block_list'] as $index=>$item ):?>
									     <li class="step">
										     <p class="number"><?php echo $index + 1;?></p>
										     <div class="text">
											     <?php if( !empty($item['name']) ):?>
												     <p class="name"><?php echo $item['name'];?></p>
											     <?php endif;?>
											     <?php if( !empty($item['text']) ):?>
												     <div class="description"><?php echo wpautop( $item['text'] );?></div>
											     <?php endif;?>
										     </div>
									     </li>
								     <?php endforeach;?>
							     </ul>
						     </div>
					     </div>
				     </section>
				     <?php if( !empty( $fields['block_marque'] ) ):?>
					     <div class="how-find-shipping-cos-marque-wrapper marque-wrapper">
						     <div class="marque-list marquee-move">
							     <?php
								     $marqueImage = carbon_get_theme_option('dolphincargo_option_marque_image');

								     for ($mi = 0; $mi < 15; $mi ++):?>
									     <p class="marque-item"><?php echo $fields['block_marque'];?></p>
									     <img src="<?php echo $marqueImage;?>" alt="<?php echo get_bloginfo('name');?>">
								     <?php endfor;?>
						     </div>
					     </div>
				     <?php endif;?>
			     <?php endif;?>
			     <?php
		     } );
	}