<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_how_we_work' );

	function dolphincargo_block_how_we_work(){
		Block::make( __( 'How we work' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_block_how_we_work_title', 'Заголовок блоку'),
			     Field::make_complex('dolphincargo_block_how_we_work_list', 'Перелік того як працюємо')
			          ->add_fields(array(
				          Field::make_text('name', 'Назва'),
				          Field::make_rich_text('text', 'Текст')
			          )),
			     Field::make_image('dolphincargo_block_how_we_work_bg', 'Фонове зображення')
			      ->set_type('image')
			      ->set_value_type('url')
		     ) )

		     ->set_category( 'dolphincargo-services-category' )
		     ->set_icon('admin-generic')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Як ми працюємо -->
			     <?php if( !empty( $fields['dolphincargo_block_how_we_work_title'] ) && !empty( $fields['dolphincargo_block_how_we_work_list']) ):?>

				     <section class="block-how-we-work indent-top-small indent-bottom-small animation-tracking">
					     <?php get_template_part('template-parts/decor-lines');?>
					     <div class="bg-image">
						     <img src="<?php echo $fields['dolphincargo_block_how_we_work_bg'];?>" alt="<?php echo $fields['dolphincargo_block_how_we_work_title'];?>">
					     </div>
					     <div class="container-fluid">
						     <div class="row">
							     <h2 class="block-title big-title col-xl-8 col-lg-10 offset-xl-4 offset-lg-2 first-up"><?php echo $fields['dolphincargo_block_how_we_work_title'];?></h2>
							     <ul class="how-we-work-list col-12">
								     <?php foreach( $fields['dolphincargo_block_how_we_work_list'] as $index=>$item ):?>
									     <li class="item">
										     <?php if( ( $index + 1 ) < 10 ):?>
										      <p class="number">0<?php echo $index + 1;?></p>
											   <?php else:;?>
										      <p class="number"><?php echo $index + 1;?></p>
										     <?php endif;?>
                         <?php if( !empty( $item['name'] ) ):?>
                           <p class="name"><?php echo $item['name'];?></p>
                         <?php endif;?>
										     <?php if( !empty( $item['text'] ) ):?>
                           <div class="text"><?php echo wpautop( $item['text'] );?></div>
										     <?php endif;?>
									     </li>
								     <?php endforeach;?>
							     </ul>
						     </div>
					     </div>
				     </section>

			     <?php endif;?>
			     <?php
		     } );
	}