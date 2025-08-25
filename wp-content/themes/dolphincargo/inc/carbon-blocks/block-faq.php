<?php


	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_faq' );

	function dolphincargo_block_faq(){
		Block::make( __( 'F.A.Q block' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_block_faq_title', 'Заголовок блоку'),
			     Field::make_complex('dolphincargo_block_faq_list', 'Перелік питань')
			      ->add_fields( array(
			      	Field::make_text('question', 'Питання'),
				      Field::make_rich_text('answer', 'Відповідь')
			      ))

		     ) )

		     ->set_category( 'dolphincargo-common-category' )
		     ->set_icon('format-chat')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php

			         if ( $fields['dolphincargo_block_faq_title'] && $fields['dolphincargo_block_faq_list'] ):
			      ?>
			         <!-- F.A.Q -->
			         <section class="block-faq indent-top-small indent-bottom-small animation-tracking">
				         <?php get_template_part('template-parts/decor-lines');?>
                 <div class="light">
                   <img src="<?php echo THEME_PATH;?>/assets/img/faq-block-light.png" alt="<?php echo get_bloginfo('name');?>">
                 </div>
			           <div class="container-fluid">
			             <div class="row first-up">
			               <h2 class="block-title small-title col-xl-8 offset-xl-4 col-lg-10 offset-lg-2"><?php echo $fields['dolphincargo_block_faq_title'];?></h2>
			             </div>
			             <div class="row second-up">
				             <div class="accordion col-12" id="accordion-faq">

					             <?php foreach( $fields['dolphincargo_block_faq_list'] as $index => $item ):?>
						             <div class="card">
							             <div class="card-header">
								             <a class="collapsed card-link" data-toggle="collapse" href="#faq<?php echo $index;?>">
									             <?php echo $item['question'];?>
                               <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M18 9.5L12 15.5L6 9.5" stroke="#FBFBFB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                               </svg>

                             </a>
							             </div>
							             <div id="faq<?php echo $index;?>" class="collapse" data-parent="#accordion-faq">
								             <div class="card-body">
									             <?php echo wpautop( $item['answer'] );?>
								             </div>
							             </div>
						             </div>
					             <?php endforeach;?>
				             </div>
			             </div>
			           </div>
			         </section>
			     <?php endif;?>


			     <?php
		     } );
	}
