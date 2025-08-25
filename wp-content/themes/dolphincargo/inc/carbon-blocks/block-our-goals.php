<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_our_goals' );

	function dolphincargo_block_our_goals(){
		Block::make( __( 'Our goals' ) )
		     ->add_fields( array(
			     Field::make_complex('dolphincargo_block_our_goals_list', 'Перелік цілей')
			          ->add_fields(array(
				          Field::make_text('name', 'Назва цілі'),
				          Field::make_rich_text('text', 'Текст цілі')
			          )),
			     Field::make_text('dolphincargo_block_our_goals_marque', 'Текст бігучого рядку')
		     ) )

		     ->set_category( 'dolphincargo-how-category' )
		     ->set_icon('chart-line')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Наші цілі -->
			     <?php if( !empty( $fields['dolphincargo_block_our_goals_list'] ) ):?>
				     <section class="block-our-goals indent-bottom-small indent-top-small" >
					     <?php get_template_part('template-parts/decor-lines');?>
					     <div class="container-fluid">
						     <div class="row">
							     <ul class="goals-list col-12">
								     <?php foreach( $fields['dolphincargo_block_our_goals_list'] as $item ):?>
									     <li class="goal">
										     <p class="name"><?php echo $item['name'];?></p>
										     <div class="text"><?php echo wpautop( $item['text'] );?></div>
									     </li>
								     <?php endforeach;?>
							     </ul>
						     </div>
					     </div>
				     </section>
				     <?php if( !empty( $fields['dolphincargo_block_our_goals_marque'] ) ):?>
               <div class="our-goals-marque-wrapper">
                 <div class="marque-list marquee-move">
							     <?php
								     $marqueImage = carbon_get_theme_option('dolphincargo_option_marque_image');

								     for ($mi = 0; $mi < 15; $mi ++):?>
                       <p class="marque-item"><?php echo $fields['dolphincargo_block_our_goals_marque'];?></p>
                       <img src="<?php echo $marqueImage;?>" alt="<?php echo get_bloginfo('name');?>">
								     <?php endfor;?>
                 </div>
               </div>
					     <!--<p class="our-goals-marque" id="our-goals-marque">
						     <?php /*echo $fields['dolphincargo_block_our_goals_marque'];*/?>
						     <?php /*echo $fields['dolphincargo_block_our_goals_marque'];*/?>
						     <?php /*echo $fields['dolphincargo_block_our_goals_marque'];*/?>
					     </p>-->
				     <?php endif;?>
			     <?php endif;?>
			     <?php
		     } );
	}