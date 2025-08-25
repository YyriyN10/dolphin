<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_home_page_what_you_get' );

	function dolphincargo_home_page_what_you_get(){
		Block::make( __( 'What you get' ) )
		     ->add_fields( array(
			     Field::make_complex('dolphincargo_home_page_what_you_get_list', 'Перелік того що надаємо')
			          ->add_fields(array(
				          Field::make_text('text', 'Твердження'),
			          )),
			     Field::make_image('dolphincargo_home_page_what_you_get_list_image', 'Зображення контейнеру')
			      ->set_type('image')

		     ) )

		     ->set_category( 'dolphincargo-custom-category' )
		     ->set_icon('list-view')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Що ви отримуєте -->
			     <?php if( $fields['dolphincargo_home_page_what_you_get_list'] ):?>
				     <section class="home-what-you-get animation-tracking">
					     <?php get_template_part('template-parts/decor-lines');?>

               <p class="text-element">logistics</p>

               <div class="light">
                 <!--<img src="<?php /*echo THEME_PATH;*/?>/assets/img/hom-what-light.png" alt="">-->
               </div>

               <div class="container-fluid">
						     <div class="row">
							     <ul class="get-list col-xl-6 col-lg-7 col-md-9 first-up">
								     <?php foreach( $fields['dolphincargo_home_page_what_you_get_list'] as $index=>$item ):?>
									     <li class="item">
                         <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <g filter="url(#filter0_b_295_2436<?php echo $index;?>)">
                             <rect x="0.5" y="0.5" width="57" height="57" rx="4.5" stroke="url(#paint0_radial_295_2436)"/>
                             <rect x="0.5" y="0.5" width="57" height="57" rx="4.5" stroke="url(#paint1_radial_295_2436)"/>
                             <rect x="0.5" y="0.5" width="57" height="57" rx="4.5" stroke="url(#paint2_radial_295_2436)"/>
                             <path d="M26 35L32 29L26 23" stroke="#067FEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                           </g>
                           <defs>
                             <filter id="filter0_b_295_2436<?php echo $index;?>" x="-42" y="-42" width="142" height="142" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                               <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                               <feGaussianBlur in="BackgroundImageFix" stdDeviation="21"/>
                               <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_295_2436"/>
                               <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur_295_2436" result="shape"/>
                             </filter>
                             <radialGradient id="paint0_radial_295_2436<?php echo $index;?>" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(1.81952 0.999993) rotate(44.8459) scale(77.828 143.094)">
                               <stop stop-color="white"/>
                               <stop offset="1" stop-color="white" stop-opacity="0"/>
                             </radialGradient>
                             <radialGradient id="paint1_radial_295_2436<?php echo $index;?>" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(2.17518 -0.304655) rotate(49.3593) scale(77.8999 129.652)">
                               <stop stop-color="#067FEF" stop-opacity="0.6"/>
                               <stop offset="1" stop-color="#067FEF" stop-opacity="0.2"/>
                             </radialGradient>
                             <radialGradient id="paint2_radial_295_2436<?php echo $index;?>" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(1 1) rotate(44.8459) scale(77.828 143.094)">
                               <stop stop-color="#16246F" stop-opacity="0.4"/>
                               <stop offset="1" stop-color="#16246F" stop-opacity="0"/>
                             </radialGradient>
                           </defs>
                         </svg>
                         <span><?php echo $item['text'];?></span>
                       </li>
								     <?php endforeach;?>
							     </ul>
                   <div class="pic-container col-xl-6 col-lg-5">
                     <div class="img-container">
                       <img
                           class="lazy"
                           data-src="<?php echo wp_get_attachment_image_src( $fields['dolphincargo_home_page_what_you_get_list_image'], 'full')[0];?>"
                           alt="<?php echo get_post_meta( $fields['dolphincargo_home_page_what_you_get_list_image'], '_wp_attachment_image_alt', TRUE);?>"
                       >
                     </div>

                   </div>

						     </div>
					     </div>
               <svg class="logo-bg" width="1268" height="1422" viewBox="0 0 1268 1422" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <g style="mix-blend-mode:luminosity" opacity="0.2">
                   <path d="M986.973 246.314C991.482 250.414 995.991 254.513 1000.5 258.612C1131.66 372.164 1214.86 540.236 1214.86 727.575C1214.86 1070.28 936.969 1348.21 594.315 1348.21C475.862 1348.21 365.606 1315.01 271.336 1257.62C148.784 1187.52 52.0538 1076.84 0 944.019C73.3672 1219.08 324.619 1422 623.006 1422C978.776 1422 1267.33 1133.41 1267.33 777.587C1267.33 557.043 1156.25 362.325 986.973 246.314Z" fill="#0F0F0F"/>
                   <path d="M125.831 864.492C125.831 571.391 348.802 366.835 623.416 366.835C630.794 366.835 638.172 366.835 645.549 367.245C636.122 397.58 623.416 418.076 604.152 448.821C577.92 490.224 563.575 491.044 577.101 503.752C589.397 514.82 651.698 502.932 695.144 461.119C716.457 441.032 734.902 408.648 748.837 380.772C825.074 401.679 898.441 436.933 951.315 491.864C973.448 515.23 1016.48 583.279 1030.83 592.707C1045.18 601.726 1077.56 603.366 1067.72 569.751C1057.88 536.137 1052.55 541.056 1052.55 515.64C1052.55 490.634 1057.06 464.808 1056.24 436.523C1054.19 371.344 993.531 289.358 927.132 237.706C839.009 169.247 743.919 142.602 646.369 136.043V133.583C634.893 132.763 623.416 132.353 611.94 132.353C594.725 99.1489 558.247 48.3174 491.437 22.4917C387.33 -16.8618 366.836 5.27452 366.426 15.5228C365.606 39.2989 432.416 80.702 438.154 154.9C185.672 223.358 0 454.97 0 730.035C0 1039.12 248.383 1215.8 248.383 1215.8C248.383 1215.8 125.831 1081.76 125.831 864.492ZM646.369 365.195V363.145C646.779 363.145 646.779 363.145 647.189 363.145C646.779 363.965 646.369 364.375 646.369 365.195Z" fill="#0F0F0F"/>
                   <path d="M784.495 523.429C724.244 516.87 666.042 525.889 613.578 547.615C629.563 547.615 645.548 548.025 661.533 550.074C878.766 574.26 1035.34 769.388 1011.15 986.652C1004.6 1045.27 985.742 1099.38 957.051 1146.94C1030.42 1091.18 1081.65 1006.74 1092.31 907.945C1113.62 716.917 975.906 544.745 784.495 523.429Z" fill="#464646"/>
                   <path d="M649.234 634.931C781.623 707.079 866.467 852.195 854.171 1012.07C845.973 1120.7 794.739 1215.39 718.503 1281.39C843.514 1241.22 937.785 1128.9 948.032 990.752C961.967 810.382 828.759 652.968 649.234 634.931Z" fill="#464646"/>
                   <path d="M545.125 768.568C542.256 768.158 539.387 768.158 536.518 767.748C637.346 829.648 699.237 946.069 685.302 1071.92C673.825 1176.04 612.754 1262.95 528.32 1311.32C659.889 1305.17 770.965 1204.33 785.72 1069.05C802.525 919.833 694.729 785.375 545.125 768.568Z" fill="#464646"/>
                   <path d="M750.893 414.387C744.744 424.635 734.907 438.163 719.742 453.74C800.897 457.43 876.723 482.435 941.483 523.429C887.79 473.007 823.03 435.293 750.893 414.387Z" fill="#464646"/>
                   <path d="M241.826 909.995C241.826 702.979 379.953 527.938 568.905 472.187C569.725 471.367 570.134 470.547 570.544 469.727C583.25 454.97 604.154 419.306 617.27 396.35C361.509 398.399 154.523 606.235 154.523 862.852C154.523 1065.77 284.043 1237.94 464.387 1302.3C331.179 1222.36 241.826 1076.43 241.826 909.995Z" fill="#464646"/>
                 </g>
               </svg>

             </section>
			     <?php endif;?>
			     <?php
		     } );
	}