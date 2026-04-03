<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_container_types' );

	function dolphincargo_container_types(){
		Block::make( __( 'Container types' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_title', 'Заголовок'),
			     Field::make_rich_text('dolphincargo_text', 'Текст блоку'),
			     Field::make_complex('dolphincargo_list', 'Формати контейнерів')
			          ->add_fields( array(
					          Field::make_text('name_tab', 'Назва типу контейнера'),
					          Field::make_image('image', 'Зображення контейнера'),
					          Field::make_text('title', 'Заголовок'),
					          Field::make_text('description', 'Короткий опис'),
					          Field::make_complex('for_list', 'Перелік, для чого підходить')
											->add_fields(array(
												Field::make_image('image', 'Зобрадення типу вантажу'),
												Field::make_text('name', 'Назва типу вантажу')
											)),
					          Field::make_text('advantage', 'Текст переваги')
				          )
			          ),

		     ) )

		     ->set_category( 'dolphincargo-container-page-category' )
		     ->set_icon('info')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php
			     if( !empty($fields['dolphincargo_title']) && !empty($fields['dolphincargo_list']) ):?>

				     <section class="container-types indent-top-small indent-bottom-small animation-tracking">
               <svg class="logo-bg" width="890" height="938" viewBox="0 0 890 938" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <g style="mix-blend-mode:luminosity" opacity="0.2">
                   <path d="M704.891 303.174C706.373 306.033 707.856 308.892 709.338 311.751C753.51 392.096 763.91 490.664 729.537 583.515C666.657 753.369 477.928 840.133 308.099 777.262C249.39 755.528 200.836 718.841 164.643 673.099C116.764 615.87 89.1298 543.265 87.7001 467.885C73.5936 617.677 160.89 764.349 308.78 819.098C485.11 884.375 681.076 794.284 746.363 617.928C786.829 508.62 767.504 391.732 704.891 303.174Z" fill="#0F0F0F"/>
                   <path d="M164.658 451.557C218.437 306.287 366.481 245.814 502.588 296.201C506.245 297.555 509.902 298.908 513.483 300.465C503.245 313.77 493.186 321.598 477.998 333.301C457.399 349.009 450.139 346.783 454.511 355.563C458.575 363.305 491.634 368.844 520.839 356.092C535.088 350.047 550.172 337.38 562.194 326.122C596.143 350.471 626.037 381.406 642.164 418.333C648.847 433.975 657.691 475.598 663.071 482.904C668.527 490.006 684.274 496.76 685.566 478.294C686.859 459.829 683.315 461.289 687.978 448.693C692.567 436.299 699.54 424.326 704.323 410.157C715.267 377.476 700.244 325.711 676.812 287.927C645.697 237.828 603.456 207.174 556.311 186.025L556.762 184.806C551.225 182.294 545.612 179.985 539.924 177.879C537.484 158.263 528.731 126.377 500.357 101.318C455.978 62.7115 441.759 69.9227 439.676 74.9269C434.907 86.5606 460.423 119.34 449.653 157.167C311.955 144.771 177.433 225.498 126.963 361.828C70.251 515.022 160.939 648.164 160.939 648.164C160.939 648.164 124.794 559.24 164.658 451.557ZM514.265 299.6L514.642 298.584C514.845 298.659 514.845 298.659 515.048 298.734C514.694 299.065 514.416 299.193 514.265 299.6Z" fill="#0F0F0F"/>
                   <path d="M553.692 403.369C525.033 389.063 494.531 382.854 464.542 383.996C472.465 386.929 480.313 390.065 487.859 394.014C591.088 445.859 632.887 571.299 581.038 674.544C567.032 702.395 547.758 725.755 524.813 744.059C571.406 729.888 612.293 697.435 635.702 650.425C681.316 559.656 644.649 449.054 553.692 403.369Z" fill="#464646"/>
                   <path d="M466.193 433.815C518.571 493.865 533.996 581.356 498.568 658.338C474.573 710.675 431.805 748.208 381.91 766.931C451.241 769.958 518.573 731.585 548.999 664.995C589.001 578.155 551.862 475.694 466.193 433.815Z" fill="#464646"/>
                   <path d="M390.073 480.947C388.726 480.217 387.304 479.69 385.957 478.961C424.574 528.141 433.887 597.198 403.889 657.016C379.097 706.517 332.882 738.384 282.159 746.867C348.497 767.96 422.052 738.359 454.187 674.019C489.894 603.146 461.137 516.726 390.073 480.947Z" fill="#464646"/>
                   <path d="M557.043 343.158C552.115 347.109 544.757 352.009 534.383 356.947C573.929 373.666 606.922 399.973 631.498 432.173C614.137 397.33 588.96 366.756 557.043 343.158Z" fill="#464646"/>
                   <path d="M213.797 495.391C251.78 392.787 352.357 331.376 456.237 338.413C456.793 338.157 457.147 337.826 457.501 337.495C466.506 332.512 483.41 318.671 494.123 309.7C366.984 263.788 226.261 328.819 179.176 456.007C141.945 556.579 174.548 665.677 252.123 730.665C200.768 666.604 183.259 577.88 213.797 495.391Z" fill="#464646"/>
                 </g>
               </svg>

               <div class="container-fluid">
						     <div class="row">
                   <div class="block-heading col-xl-8 col-lg-10 offset-xl-4 offset-lg-2 first-up">
                     <h2 class="block-title small-title"><?php echo $fields['dolphincargo_title'];?></h2>
                     <?php if( !empty($fields['dolphincargo_text']) ):?>
                       <div class="text"><?php echo $fields['dolphincargo_text'];?></div>
                     <?php endif;?>
                   </div>
						     </div>
						     <div class="row second-up">
							     <div class="slider-wrapper col-12">
								     <ul class="slider-prev-nav" id="container-types-slider-nav">
									     <?php foreach( $fields['dolphincargo_list'] as $index=>$item ):?>
										     <li class="item" data-index="<?php echo $index;?>">
											     <?php echo $item['name_tab'];?>
										     </li>
									     <?php endforeach;?>
								     </ul>
								     <div class="slider" id="container-types-slider">
									     <?php foreach( $fields['dolphincargo_list'] as $index=>$item ):?>
										     <div class="slide" >
											     <div class="inner">
												     <div class="text-content">
													     <?php if( !empty($item['title']) ):?>
														     <h3 class="name"><?php echo $item['title'];?></h3>
													     <?php endif;?>
													     <?php if( !empty($item['description']) ):?>
														     <p class="description"><?php echo $item['description'];?></p>
													     <?php endif;?>
													     <?php if( !empty($item['for_list']) ):?>
														     <div class="for-wrapper">
															     <h3 class="name"><?php echo esc_html( pll__( 'Підходить для' ) ); ?>:</h3>
															     <ul class="for-list">
																     <?php foreach( $item['for_list'] as $innerItem):?>
																	     <li class="item">
																		     <?php if( !empty($innerItem['image']) ):?>
																			     <div class="image">
																				     <img
																					     class="lazy"
																					     data-src="<?php echo wp_get_attachment_image_src($innerItem['image'], 'full')[0];?>"
																					     alt="<?php echo get_post_meta($innerItem['image'], '_wp_attachment_image_alt', TRUE);?>"
																				     >
																			     </div>
																		     <?php endif;?>
																		     <?php if( !empty($innerItem['name']) ):?>
																			     <p class="type-cargo"><?php echo $innerItem['name'];?></p>
																		     <?php endif;?>
																	     </li>
																     <?php endforeach;?>
															     </ul>
														     </div>
													     <?php endif;?>
													     <?php if( !empty($item['advantage']) ):?>
														     <h3 class="name"><?php echo esc_html( pll__( 'Перевага' ) ); ?></h3>
														     <p class="advantage-text"><?php echo $item['advantage'];?></p>
													     <?php endif;?>

												     </div>
												     <div class="image-wrapper">
													     <img
														     src="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0];?>"
														     alt="<?php echo get_post_meta($item['image'], '_wp_attachment_image_alt', TRUE);?>"
													     >
												     </div>
											     </div>
										     </div>
									     <?php endforeach;?>
								     </div>
								     <?php get_template_part('template-parts/slider-navigation');?>
							     </div>
						     </div>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}

