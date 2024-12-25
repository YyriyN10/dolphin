<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_achievement' );

	function dolphincargo_block_achievement(){
		Block::make( __( 'Our achievement' ) )
		     ->add_fields( array(
		     	 Field::make_image('dolphincargo_achievement_image', 'Зображення')
						->set_type('image'),
			     Field::make_text('dolphincargo_achievement_main', 'Показник досягнення'),
			     Field::make_text('dolphincargo_achievement_description', 'Розшифровка показник досягнення'),
			     Field::make_complex('dolphincargo_achievement_list', 'Перелік того що надаємо')
			      ->add_fields( array(
			      	Field::make_text('name', 'Назва'),
				      Field::make_rich_text('description', 'Текст опису')
			      ))
		     ) )

		     ->set_category( 'dolphincargo-services-category' )
		     ->set_icon('awards')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php
			     if( $fields['dolphincargo_achievement_image'] && $fields['dolphincargo_achievement_main'] && $fields['dolphincargo_achievement_description']):
				     ?>
				     <!-- Інші сервіси -->
				     <section class="services-achievement indent-top-small indent-bottom-small animation-tracking">
					     <?php get_template_part('template-parts/decor-lines');?>
					     <div class="light light-left"><img src="<?php echo THEME_PATH;?>/assets/img/airplan-call-to-light.png" alt=""></div>
					     <div class="light light-right"><img src="<?php echo THEME_PATH;?>/assets/img/airplan-call-to-light.png" alt=""></div>
					     <div class="container-fluid">
						     <div class="row">
							     <div class="col-md-6 block-pic">
								     <div class="pic-wrapper">
									     <img
									        class="lazy"
									        data-src="<?php echo wp_get_attachment_image_src( $fields['dolphincargo_achievement_image'], 'full')[0];?>"
									        <?php
										        $altText = get_post_meta( $fields['dolphincargo_achievement_image'], '_wp_attachment_image_alt', TRUE);
										        if( !empty( $altText ) ):?>
											        alt="<?php echo $altText;?>"
											    <?php else:?>
											        alt="<?php the_title();?>"
									        <?php endif;?>
									     >
								     </div>
							     </div>
							     <div class="text-content col-mg-6">
								     <div class="main-info">
									     <p class="achievement-value"><?php echo $fields['dolphincargo_achievement_main'];?></p>
									     <p class="achievement-description"><?php echo $fields['dolphincargo_achievement_description'];?></p>
								     </div>
								     <?php if( $fields['dolphincargo_achievement_list'] ):?>
									     <ul class="achievement-list">
										     <?php foreach( $fields['dolphincargo_achievement_list'] as $index=>$item ):?>
											     <li class="item">
												     <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
													     <g filter="url(#filter0_b_295_2436_<?php echo $index;?>)">
														     <rect x="0.5" y="0.5" width="57" height="57" rx="4.5" stroke="url(#paint0_radial_295_2436)"/>
														     <rect x="0.5" y="0.5" width="57" height="57" rx="4.5" stroke="url(#paint1_radial_295_2436)"/>
														     <rect x="0.5" y="0.5" width="57" height="57" rx="4.5" stroke="url(#paint2_radial_295_2436)"/>
														     <path d="M26 35L32 29L26 23" stroke="#067FEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													     </g>
													     <defs>
														     <filter id="filter0_b_295_2436" x="-42" y="-42" width="142" height="142" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
															     <feFlood flood-opacity="0" result="BackgroundImageFix"/>
															     <feGaussianBlur in="BackgroundImageFix" stdDeviation="21"/>
															     <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_295_2436"/>
															     <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur_295_2436" result="shape"/>
														     </filter>
														     <radialGradient id="paint0_radial_295_2436_<?php echo $index;?>)" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(1.81952 0.999993) rotate(44.8459) scale(77.828 143.094)">
															     <stop stop-color="white"/>
															     <stop offset="1" stop-color="white" stop-opacity="0"/>
														     </radialGradient>
														     <radialGradient id="paint1_radial_295_2436_<?php echo $index;?>)" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(2.17518 -0.304655) rotate(49.3593) scale(77.8999 129.652)">
															     <stop stop-color="#067FEF" stop-opacity="0.6"/>
															     <stop offset="1" stop-color="#067FEF" stop-opacity="0.2"/>
														     </radialGradient>
														     <radialGradient id="paint2_radial_295_2436_<?php echo $index;?>)" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(1 1) rotate(44.8459) scale(77.828 143.094)">
															     <stop stop-color="#16246F" stop-opacity="0.4"/>
															     <stop offset="1" stop-color="#16246F" stop-opacity="0"/>
														     </radialGradient>
													     </defs>
												     </svg>
												     <div>
													     <p class="name"><?php echo $item['name'];?></p>
													     <div class="text"><?php echo wpautop( $item['description'] );?></div>
												     </div>
											     </li>
										     <?php endforeach;?>
									     </ul>
								     <?php endif;?>
							     </div>
						     </div>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}

