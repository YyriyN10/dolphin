<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_problem_solving' );

	function dolphincargo_problem_solving(){
		Block::make( __( 'Problem solving' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_block_problem_solving_title', 'Заголовок блоку'),
			     Field::make_complex('dolphincargo_block_problem_solving_list', 'Перелік того що робимо')
			          ->add_fields(array(
			          	Field::make_image('icon', 'Іконка')
										->set_type('image'),
				          Field::make_text('name', 'Назва'),
				          Field::make_complex('solving_list', 'Що входить')
				               ->add_fields(array(
					               Field::make_rich_text('text', 'Текст')
				               ))
			          )),
		     ) )

		     ->set_category( 'dolphincargo-services-category' )
		     ->set_icon('yes-alt')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Вирішуємо проблеми -->
			     <?php if( !empty( $fields['dolphincargo_block_problem_solving_title'] ) && !empty( $fields['dolphincargo_block_problem_solving_list']) ):?>

				     <section class="block-problem-solving indent-top-small indent-bottom-small animation-tracking" >
					     <?php get_template_part('template-parts/decor-lines');?>
					     <div class="light"><img src="<?php echo THEME_PATH;?>/assets/img/light-problem.png" alt="<?php echo the_title();?>"></div>
					     <div class="container-fluid">
						     <div class="row">
							     <h2 class="block-title big-title col-xl-8 col-lg-10 offset-xl-4 offset-lg-2 first-up"><?php echo $fields['dolphincargo_block_problem_solving_title'];?></h2>
							     <ul class="solving-list col-12 second-up">
								     <?php foreach( $fields['dolphincargo_block_problem_solving_list'] as $item ):?>
									     <li class="solving">
										     <div class="solving-heading">
											     <div class="icon">
												     <img
												        class="lazy"
												        data-src="<?php echo wp_get_attachment_image_src( $item['icon'], 'full')[0];?>"
												        <?php
												         $altText = get_post_meta( $item['icon'], '_wp_attachment_image_alt', TRUE);
												         if ( !empty( $altText ) ):?>
												             alt="<?php echo $altText;?>"
												         <?php else:?>
												             alt="<?php echo $item['name'];?>"
												         <?php endif;?>

												     >
											     </div>
											     <p class="name"><?php echo $item['name'];?></p>
										     </div>

										     <?php if( !empty( $item['solving_list'] ) ):?>
											     <ul class="solving-list">
												     <?php foreach( $item['solving_list'] as $solving ):?>
													     <li><?php echo wpautop( $solving['text'] );?></li>
												     <?php endforeach;?>
											     </ul>
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