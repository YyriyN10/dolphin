<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_taobao_how_orde' );

	function dolphincargo_taobao_how_orde(){
		Block::make( __( 'How to order' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_block_title', 'Заголовок блоку'),
			     Field::make_complex('dolphincargo_block_list', 'Перелік того як працюємо')
			          ->add_fields(array(
				          Field::make_text('name', 'Назва'),
				          Field::make_rich_text('text', 'Текст')
			          )),
		     ) )

		     ->set_category( 'dolphincargo-taobao-page-category' )
		     ->set_icon('admin-generic')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Як ми працюємо -->
			     <?php if( !empty( $fields['dolphincargo_block_title'] ) && !empty( $fields['dolphincargo_block_list']) ):?>

				     <section class="block-taobao-how-order indent-top-small indent-bottom-small animation-tracking">

					     <div class="container-fluid">
						     <div class="row">
							     <h2 class="block-title big-title col-xl-8 col-lg-10 offset-xl-4 offset-lg-2 first-up">
								     <?php echo $fields['dolphincargo_block_title'];?>
							     </h2>
							     <ul class="how-we-work-list col-12">
								     <?php foreach( $fields['dolphincargo_block_list'] as $index=>$item ):?>
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