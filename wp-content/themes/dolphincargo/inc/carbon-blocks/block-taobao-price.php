<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_taobao_price' );

	function dolphincargo_taobao_price(){
		Block::make( __( 'Taobao price' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_title', 'Заголовок'),
			     Field::make_text('dolphincargo_subtitle', 'Підзаголовок'),
			     Field::make_text('dolphincargo_call', 'Текст заклику'),
			     Field::make_complex('dolphincargo_list', 'Перелік складових')
			      ->add_fields( array(
			      		Field::make_text('name', 'Назва'),
					      Field::make_text('description', 'Опис')
				      )
			      )
		     ) )

		     ->set_category( 'dolphincargo-taobao-page-category' )
		     ->set_icon('editor-ol')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php
			     if( !empty($fields['dolphincargo_title']) && !empty($fields['dolphincargo_list']) ):?>
				     <!-- Розразунок вартості -->
				     <section class="taobao-price indent-top-small indent-bottom-small animation-tracking">
					     <div class="container-fluid">
						     <div class="row">
							     <div class="block-heading col-xl-8 col-lg-10 offset-xl-4 offset-lg-2 first-up">
								     <h2 class="block-title small-title"><?php echo $fields['dolphincargo_title'];?></h2>
								     <p class="subtitle"><?php echo $fields['dolphincargo_subtitle'];?></p>
							     </div>
						     </div>
                 <div class="row">
                   <ol class="list-ingredients second-up col-12">
								     <?php foreach( $fields['dolphincargo_list'] as $index=>$item ):?>
                       <li class="item">
                         <p class="index"><?php echo $index + 1;?></p>
                         <p class="name"><?php echo $item['name'];?></p>
                         <p class="description">
                           <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                             <path d="M9 18.5L15 12.5L9 6.5" stroke="#067FEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                           </svg>
                           <span><?php echo $item['description'];?></span>
                         </p>
                         <div class="decor"></div>

                       </li>
								     <?php endforeach;?>
                   </ol>
                 </div>
                 <div class="row">
                   <div class="call-wrapper col-12">
                     <p class="block-title small-title call-text"><?php echo $fields['dolphincargo_call'];?></p>
                     <div class="button blue-btn" data-toggle="modal" data-target="#formModal">
									     <?php echo esc_html( pll__( 'Розрахувати вартість' ) ); ?>
                     </div>
                   </div>
                 </div>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}

