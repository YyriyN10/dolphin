<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_advantages_delivery' );

	function dolphincargo_block_advantages_delivery(){
		Block::make( __( 'Advantages delivery' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_advantages_delivery_title', 'Заголовок'),
			     Field::make_complex('dolphincargo_advantages_delivery_list', 'Перелік переваг')
			          ->add_fields( array(
			          	Field::make_image('icon', 'Іконка переваги')
										->set_type('image')
										->set_value_type('url'),
				          Field::make_text('name', 'Назва переваги'),
				          Field::make_rich_text('text', 'Текст переваги')
			          )),
           Field::make_text('dolphincargo_advantages_delivery_marque', 'Бігучий рядок')
            ->set_help_text('Не обовʼязковий блок'),
           Field::make_select('dolphincargo_advantages_delivery_bg', 'Увімкнути фонове зображення?')
	           ->add_options( array(
		           'yes' => 'Так',
		           'no' => 'Ні',
	           ) )

		     ) )

		     ->set_category( 'dolphincargo-services-category' )
		     ->set_icon('thumbs-up')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php
			     if( $fields['dolphincargo_advantages_delivery_title'] && $fields['dolphincargo_advantages_delivery_list'] ):
				     ?>
				     <!-- Переваги -->
				     <section class="services-advantages-delivery indent-top-small indent-bottom-small animation-tracking">
					     <?php get_template_part('template-parts/decor-lines');?>
               <?php if( $fields['dolphincargo_advantages_delivery_bg'] != 'no' ):?>
                 <div class="bg-image">
                   <img src="<?php echo THEME_PATH;?>/assets/img/big-service-bg.png" alt="<?php echo $fields['dolphincargo_advantages_delivery_title'];?>">
                 </div>
               <?php endif;?>

					     <div class="container-fluid">
						     <div class="row">
							     <h2 class="block-title big-title col-xl-8 offset-xl-4 col-lg-10 offset-lg-2 col-12"><?php echo $fields['dolphincargo_advantages_delivery_title'];?></h2>
						     </div>
						     <ul class="row content">
							     <?php foreach( $fields['dolphincargo_advantages_delivery_list'] as $item ):?>
								     <li class="item col-lg-4 col-sm-6">
									     <div class="icon">
										     <img src="<?php echo $item['icon'];?>" class="svg-pic" alt="<?php echo $item['name'];?>">
									     </div>
									     <p class="name"><?php echo $item['name'];?></p>
									     <div class="description"><?php echo wpautop( $item['text']);?></div>
								     </li>
							     <?php endforeach;?>
						     </ul>
				     </section>
			     <?php endif;?>
			     <?php if( !empty( $fields['dolphincargo_advantages_delivery_marque']) ):?>
             <div class="advantages-delivery-marque-wrapper">
               <div class="marque-list marquee-move">
						     <?php
							     $marqueImage = carbon_get_theme_option('dolphincargo_option_marque_image');

							     for ($mi = 0; $mi < 15; $mi ++):?>
                     <p class="marque-item"><?php echo $fields['dolphincargo_advantages_delivery_marque'];?></p>
                     <img src="<?php echo $marqueImage;?>" alt="<?php echo get_bloginfo('name');?>">
							     <?php endfor;?>
               </div>
             </div>

			     <?php endif;?>

			     <?php
		     } );
	}

