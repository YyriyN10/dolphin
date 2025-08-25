<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_price_service_list' );

	function dolphincargo_block_price_service_list(){
		Block::make( __( 'Price service list' ) )
		     ->add_fields( array(
			     Field::make_complex('dolphincargo_service_price_list', 'Перелік сервісів')
			          ->add_fields( array(
				          Field::make_text('name', 'Назва сервісу')
			              ->set_width(50),
				          Field::make_image('image', 'Зображення')
					          ->set_width(50)
				               ->set_type('image'),
				          Field::make_text('title', 'Заголовок опису')
					          ->set_width(50),
				          Field::make_rich_text('text', 'Текст опису')
					          ->set_width(50),
				          Field::make_text('title_price', 'Заголовок тарифів')
					          ->set_width(50),
				          Field::make_complex('price_list', 'Перелік орієнтовних тарифів')
					          ->set_width(50)
				            ->add_fields(array(
				            	Field::make_text('price', 'Тариф')
				            )),
		              Field::make_text('delivery_time', 'Час доставки'),


			          )),
		     ) )

		     ->set_category( 'dolphincargo-price-page-category' )
		     ->set_icon('slides')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php
			     if( $fields['dolphincargo_service_price_list']):
				     ?>
				     <!-- Переваги -->
				     <section class="services-delivery-price-list indent-top-small indent-bottom-small animation-tracking" id="servise-pices">

					     <div class="container-fluid">
						     <div class="row">
							     <div class="slider-wrapper col-12" >
								     <ul class="slider-prev-nav" id="services-delivery-price-slider-nav">
									     <?php foreach( $fields['dolphincargo_service_price_list'] as $navItem):?>
												<li class="item"><?php echo $navItem['name'];?></li>
									     <?php endforeach;?>
								     </ul>

								     <div class="slider" id="services-delivery-price-slider">
									     <?php foreach( $fields['dolphincargo_service_price_list'] as $item ):?>
										     <div class="slide">
											     <div class="pic-wrapper">
												     <img
													     src="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0];?>"
													     <?php
														     $altText = get_post_meta($item['image'], '_wp_attachment_image_alt', TRUE);
														     if ( !empty( $altText ) ):?>
															     alt="<?php echo $altText;?>"
														     <?php else:?>
															     alt="<?php echo $item['title'];?>"
														     <?php endif;?>
												     >
											     </div>
											     <div class="text-wrapper">
												     <h3 class="title"><?php echo $item['title'];?></h3>
												     <div class="text"><?php echo wpautop($item['text']);?></div>
												     <h3 class="title title-price"><?php echo $item['title_price'];?></h3>
												     <?php if( !empty($item['price_list']) ):?>
													     <ul class="price-list">
														     <?php foreach( $item['price_list'] as $priceItem):?>
                                   <li class="price-item">
                                     <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M9 18.5L15 12.5L9 6.5" stroke="#067FEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                     </svg>
                                     <span><?php echo $priceItem['price'];?></span>
                                   </li>
														     <?php endforeach;?>
													     </ul>
												     <?php endif;?>
												     <?php if( !empty($item['delivery_time']) ):?>
													     <p class="delivery-time"><?php echo $item['delivery_time'];?></p>
												     <?php endif;?>
                             <div class="button-wrapper">
                               <div class="button blue-btn" data-toggle="modal" data-target="#formModal">
		                             <?php echo esc_html( pll__( 'Замовити прорахунок' ) ); ?>
                               </div>
                             </div>


											     </div>

										     </div>
									     <?php endforeach;?>
								     </div>

								     <?php get_template_part('template-parts/slider-navigation');?>

							     </div>
						     </div>
				     </section>
			     <?php endif;?>
			     <?php
		     } );
	}

