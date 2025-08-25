<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_taobao_call_to_action' );

	function dolphincargo_taobao_call_to_action(){
		Block::make( __( 'Taobao call to action' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_title', 'Заголовок'),
			     Field::make_rich_text('dolphincargo_text', 'Текст блоку'),
			     Field::make_image('dolphincargo_image', 'Зображення')
			          ->set_type('image'),
		     ) )

		     ->set_category( 'dolphincargo-taobao-page-category' )
		     ->set_icon('megaphone')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php
			     if( !empty($fields['dolphincargo_title']) && !empty($fields['dolphincargo_image']) ):?>
				     <!-- Заклик до дії -->
				     <section class="taobao-call-to-acton indent-top-small indent-bottom-small animation-tracking">
               <svg class="bg-pic" width="670" height="752" viewBox="0 0 670 752" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <g style="mix-blend-mode:luminosity" opacity="0.2">
                   <path d="M521.618 130.179C524.001 132.346 526.384 134.512 528.767 136.679C598.085 196.691 642.058 285.518 642.058 384.527C642.058 565.647 495.191 712.536 314.097 712.536C251.494 712.536 193.224 694.987 143.402 664.656C78.6326 627.609 27.5105 569.113 -0.00012207 498.918C38.7747 644.291 171.562 751.533 329.261 751.533C517.286 751.533 669.786 599.011 669.786 410.958C669.786 294.4 611.082 191.491 521.618 130.179Z" fill="#0F0F0F"/>
                   <path d="M66.5025 456.887C66.5025 301.982 184.343 193.873 329.478 193.873C333.377 193.873 337.276 193.873 341.175 194.09C336.193 210.122 329.478 220.955 319.297 237.203C305.433 259.085 297.852 259.518 305 266.234C311.499 272.084 344.425 265.801 367.386 243.703C378.65 233.087 388.398 215.972 395.763 201.239C436.054 212.289 474.829 230.92 502.773 259.952C514.471 272.301 537.216 308.265 544.797 313.248C552.379 318.014 569.492 318.881 564.293 301.115C559.094 283.35 556.278 285.95 556.278 272.517C556.278 259.302 558.661 245.653 558.227 230.704C557.144 196.256 525.085 152.926 489.993 125.628C443.419 89.4478 393.164 75.3655 341.609 71.8991V70.5992C335.543 70.1659 329.478 69.9492 323.413 69.9492C314.315 52.4005 295.035 25.5359 259.727 11.8869C204.705 -8.91151 193.874 2.7876 193.658 8.20386C193.225 20.7696 228.533 42.6513 231.566 81.865C98.1289 118.046 0.000488281 240.453 0.000488281 385.826C0.000488281 549.18 131.272 642.556 131.272 642.556C131.272 642.556 66.5025 571.712 66.5025 456.887ZM341.609 193.007V191.923C341.825 191.923 341.825 191.923 342.042 191.923C341.825 192.357 341.609 192.573 341.609 193.007Z" fill="#0F0F0F"/>
                   <path d="M414.608 276.634C382.765 273.167 352.006 277.933 324.278 289.416C332.726 289.416 341.175 289.633 349.623 290.716C464.431 303.498 547.179 406.624 534.399 521.448C530.933 552.429 520.968 581.027 505.805 606.159C544.58 576.694 571.657 532.064 577.289 479.852C588.553 378.893 515.769 287.899 414.608 276.634Z" fill="#464646"/>
                   <path d="M343.123 335.564C413.091 373.694 457.931 450.389 451.432 534.882C447.1 592.295 420.023 642.341 379.731 677.222C445.8 655.99 495.623 596.628 501.038 523.616C508.403 428.29 438.002 345.097 343.123 335.564Z" fill="#464646"/>
                   <path d="M288.1 406.191C286.584 405.974 285.067 405.974 283.551 405.758C336.839 438.472 369.549 500 362.184 566.512C356.118 621.541 323.842 667.471 279.219 693.036C348.753 689.786 407.457 636.49 415.255 564.996C424.137 486.135 367.166 415.074 288.1 406.191Z" fill="#464646"/>
                   <path d="M396.848 219.005C393.598 224.421 388.399 231.571 380.385 239.804C423.275 241.753 463.35 254.969 497.575 276.634C469.198 249.986 434.973 230.054 396.848 219.005Z" fill="#464646"/>
                   <path d="M127.802 480.935C127.802 371.527 200.803 279.017 300.664 249.552C301.098 249.119 301.314 248.686 301.531 248.252C308.246 240.453 319.294 221.604 326.225 209.472C191.055 210.555 81.6625 320.397 81.6625 456.02C81.6625 563.262 150.114 654.255 245.426 688.269C175.025 646.023 127.802 568.895 127.802 480.935Z" fill="#464646"/>
                 </g>
               </svg>
					     <div class="container-fluid">
						     <div class="row">
                   <div class="pic-wrapper col-xl-4 col-lg-5 first-up">
                     <img
                         class="lazy"
                         data-src="<?php echo wp_get_attachment_image_src( $fields['dolphincargo_image'], 'full')[0];?>"
									     <?php
										     $altText = get_post_meta( $fields['dolphincargo_image'], '_wp_attachment_image_alt', TRUE);
										     if( !empty( $altText ) ):?>
                           alt="<?php echo $altText;?>"
										     <?php else:?>
                           alt="<?php echo $fields['dolphincargo_title'];?>"
										     <?php endif;?>
                     >
                   </div>
                   <div class="text-content col-xl-8 col-lg-7 second-up">
                     <h2 class="block-title big-title"><?php echo $fields['dolphincargo_title'];?></h2>
								     <?php if( !empty( $fields['dolphincargo_text'] ) ):?>
                       <div class="text"><?php echo wpautop( $fields['dolphincargo_text'] );?></div>
								     <?php endif;?>
                     <div class="button blue-btn" data-toggle="modal" data-target="#formModal">
									     <?php echo esc_html( pll__( 'Отримати консультацію' ) ); ?>
                     </div>
                   </div>
						     </div>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}

