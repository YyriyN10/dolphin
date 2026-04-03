<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_container_trust' );

	function dolphincargo_container_trust(){
		Block::make( __( 'Trust delivery' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_title', 'Заголовок'),
			     Field::make_rich_text('dolphincargo_text', 'Підхід'),
			     Field::make_image('dolphincargo_image', 'Зображення'),
			     Field::make_complex('dolphincargo_list', 'Причини довіри')
			          ->add_fields( array(
                    Field::make_rich_text('text', 'Текст причини')
				          )
			          ),
		     ) )

		     ->set_category( 'dolphincargo-container-page-category' )
		     ->set_icon('yes-alt')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php
			     if( !empty($fields['dolphincargo_title']) && !empty($fields['dolphincargo_list']) ):?>

				     <section class="container-trust indent-top-small indent-bottom-big animation-tracking">
					     <div class="container-fluid">
						     <div class="row">
                   <h2 class="block-title small-title col-xl-8 col-lg-10 offset-xl-4 offset-lg-2 first-up"><?php echo $fields['dolphincargo_title'];?></h2>
						     </div>
						     <div class="row second-up">
                   <?php if( !empty($fields['dolphincargo_image']) ):?>
                     <div class="image-wrapper col-lg-6">
                       <div class="inner">
                         <img
                             class="lazy"
                             data-src="<?php echo wp_get_attachment_image_src($fields['dolphincargo_image'], 'full')[0];?>"
				                   <?php
					                   $altText = get_post_meta($fields['dolphincargo_image'], '_wp_attachment_image_alt', TRUE);
					                   if ( !empty( $altText ) ):?>
                               alt="<?php echo $altText;?>"
					                   <?php else:?>
                               alt="<?php echo wp_strip_all_tags($fields['dolphincargo_title']);?>"
					                   <?php endif;?>
                         >
                       </div>
                     </div>
                   <?php endif;?>
                   <div class="text-content col-lg-6">
                     <ul class="trust-list">
                       <?php foreach( $fields['dolphincargo_list'] as $index=>$item ):?>
                        <li class="item">
                          <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_b_295_2436<?php echo $index;?>)">
                              <rect x="0.5" y="0.5" width="57" height="57" rx="4.5" stroke="url(#paint0_radial_295_2436<?php echo $index;?>)"></rect>
                              <rect x="0.5" y="0.5" width="57" height="57" rx="4.5" stroke="url(#paint1_radial_295_2436<?php echo $index;?>)"></rect>
                              <rect x="0.5" y="0.5" width="57" height="57" rx="4.5" stroke="url(#paint2_radial_295_2436<?php echo $index;?>)"></rect>
                              <path d="M26 35L32 29L26 23" stroke="#067FEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                            <defs>
                              <filter id="filter0_b_295_2436<?php echo $index;?>" x="-42" y="-42" width="142" height="142" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                <feGaussianBlur in="BackgroundImageFix" stdDeviation="21"></feGaussianBlur>
                                <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_295_2436"></feComposite>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur_295_2436<?php echo $index;?>" result="shape"></feBlend>
                              </filter>
                              <radialGradient id="paint0_radial_295_2436<?php echo $index;?>" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(1.81952 0.999993) rotate(44.8459) scale(77.828 143.094)">
                                <stop stop-color="white"></stop>
                                <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                              </radialGradient>
                              <radialGradient id="paint1_radial_295_2436<?php echo $index;?>" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(2.17518 -0.304655) rotate(49.3593) scale(77.8999 129.652)">
                                <stop stop-color="#067FEF" stop-opacity="0.6"></stop>
                                <stop offset="1" stop-color="#067FEF" stop-opacity="0.2"></stop>
                              </radialGradient>
                              <radialGradient id="paint2_radial_295_2436<?php echo $index;?>" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(1 1) rotate(44.8459) scale(77.828 143.094)">
                                <stop stop-color="#16246F" stop-opacity="0.4"></stop>
                                <stop offset="1" stop-color="#16246F" stop-opacity="0"></stop>
                              </radialGradient>
                            </defs>
                          </svg>
                          <div class="text"><?php echo $item['text'] ;?></div>
                        </li>
                       <?php endforeach;?>
                     </ul>
                     <?php if( !empty($fields['dolphincargo_text']) ):?>
                      <div class="apr-text"><?php echo $fields['dolphincargo_text'];?></div>
                     <?php endif;?>
                   </div>

						     </div>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}

