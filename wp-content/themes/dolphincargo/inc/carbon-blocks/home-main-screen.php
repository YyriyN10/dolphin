<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_home_page_main_screen' );

	function dolphincargo_home_page_main_screen(){
		Block::make( __( 'Main screen' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_home_page_main_screen_title', 'Головний заголовок'),
			     Field::make_text('dolphincargo_home_page_main-screen_who_are_we', 'Чим займаємось'),
			     Field::make_image('dolphincargo_home_page_main-screen_image', 'Зображення')
				     ->set_help_text('Зображення для моніторів з розширенням менше за 2000рх')
			          ->set_type('image')
			          ->set_value_type('url'),
			     Field::make_image('dolphincargo_home_page_main-screen_image_larg', 'Зображення для великих екранів')
			          ->set_help_text('Зображення для моніторів з розширенням більше за 2000рх')
			          ->set_type('image')
			          ->set_value_type('url'),
			     Field::make_image('dolphincargo_main_screen_image_mob', 'Зображення мобільних пристроїв')
			          ->set_help_text('При необхідності')
			          ->set_type('image')
			          ->set_value_type('url'),

			     Field::make_complex('dolphincargo_home_page_our_numbers_list', 'Перелік здобутків у числах')
			          ->add_fields(array(
				          Field::make_text('number', 'Число'),
				          Field::make_text('number_more', 'Додаткове значення'),
				          Field::make_text('description', 'Опис числа')
			          )),

		     ) )

		     ->set_category( 'dolphincargo-custom-category' )
         ->set_icon('cover-image')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

           <!-- головний екран -->
           <section class="main-screen home-main-screen" >

               <style>

                 .home-main-screen{
                   background-image: url(<?php echo $fields['dolphincargo_home_page_main-screen_image'];?>);
                 }

                <?php if( !empty($fields['dolphincargo_home_page_main-screen_image_larg']) ):?>

                 @media (min-width: 2001px) {
                   .home-main-screen{
                     background-image: url(<?php echo $fields['dolphincargo_home_page_main-screen_image_larg'];?>);
                   }
                 }
                 <?php endif;?>


                 <?php if( !empty($fields['dolphincargo_home_page_main-screen_image']) ):?>
                   @media (max-width: 2000px) {
                     .home-main-screen{
                       background-image: url(<?php echo $fields['dolphincargo_home_page_main-screen_image'];?>);
                     }
                   }
                 <?php endif;?>
                 <?php if( !empty($fields['dolphincargo_main_screen_image_mob']) ):?>
                   @media (max-width: 575px) {
                     .home-main-screen{
                       background-image: url(<?php echo $fields['dolphincargo_main_screen_image_mob'];?>);
                     }
                   }
                 <?php endif;?>

               </style>

             <!--<div class="cursor-container" data-toggle="modal" data-target="#formModal">
               <div class="circle-button">
		             <?php /*echo esc_html( pll__( 'Отримати консультацію' ) ); */?>
               </div>
             </div>-->

             <div class="container-fluid">
               <div class="row">
                 <div class="content col-12">
                   <h1 class="main-title"><?php echo $fields['dolphincargo_home_page_main_screen_title'];?></h1>
							     <?php if( $fields['dolphincargo_home_page_main-screen_who_are_we'] ):?>
                     <p class="who-are"><?php echo $fields['dolphincargo_home_page_main-screen_who_are_we'];?></p>
							     <?php endif;?>
                   <div class="button blue-btn" data-toggle="modal" data-target="#formModal">
		                 <?php echo esc_html( pll__( 'Отримати консультацію' ) ); ?>
                   </div>
                 </div>
               </div>
               <?php if( $fields['dolphincargo_home_page_our_numbers_list'] ):?>
                 <div class="row">
                    <ul class="numbers-list col-12">
                      <?php foreach( $fields['dolphincargo_home_page_our_numbers_list'] as $item ):?>
                        <li class="item">
                          <p class="number-full">
                            <span class="number"><?php echo $item['number'];?></span>
			                      <?php if( $item['number_more'] ):?>
                              <span class="number-more"><?php echo $item['number_more'];?></span>
			                      <?php endif;?>
                          </p>
                          <p class="description"><?php echo $item['description'];?></p>
                        </li>
                      <?php endforeach;?>
                    </ul>
                 </div>
               <?php endif;?>

             </div>
           </section>

			     <?php
		     } );
	}



	add_action( 'carbon_fields_register_fields', 'dolphincargo_our_services_list' );

	function dolphincargo_our_services_list(){
		Block::make( __( 'Services list' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_our_services_title', 'Заголовок блоку'),
			     Field::make_association('dolphincargo_our_services_list', 'Перелік сервісів')
				     ->set_types( array(
					     array(
						     'type'      => 'post',
						     'post_type' => 'services',
					     )
				     ) ),
           Field::make_text('dolphincargo_our_services_run_text', 'Текст у бігучий рядок')

		     ) )

		     ->set_category( 'dolphincargo-custom-category' )
		     ->set_icon('excerpt-view')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

           <!-- Наші сервіси -->
			     <?php if ( $fields['dolphincargo_our_services_title'] && $fields['dolphincargo_our_services_list'] ):?>
             <section class="our-services" >
	             <?php get_template_part('template-parts/decor-lines');?>
               <?php if( ! is_front_page() ):?>
                 <div class="service-light">
                   <img src="<?php echo THEME_PATH;?>/assets/img/hom-what-light.png" alt="">
                 </div>
               <?php endif;?>
               <div class="light">
                 <!--<img src="<?php /*echo THEME_PATH;*/?>/assets/img/home-services-light.png" alt="">-->
               </div>
               <div class="container-fluid">
                 <div class="row animation-tracking">
                   <h2 class="block-title big-title col-12 text-center first-up"><?php echo $fields['dolphincargo_our_services_title'];?></h2>
                 </div>
                 <div class="row content">
                   <?php foreach( $fields['dolphincargo_our_services_list'] as $item ):?>
                     <div class="service-item col-12 animation-tracking">
                       <h3 class="name first-up">
                         <a href="<?php echo get_the_permalink( $item['id'] );?>">
	                         <?php echo get_the_title( $item['id'] );?>
                         </a>
                       </h3>
                       <div class="pic-wrapper second-up">
                         <a href="<?php echo get_the_permalink( $item['id'] );?>">
                           <img
                               class="lazy"
                               data-src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $item['id'] ), 'full')[0];?>"
		                         <?php

			                         $altText = get_post_meta( get_post_thumbnail_id( $item['id'] ), '_wp_attachment_image_alt', TRUE);

			                         if( !empty( $altText ) ):?>
                                 alt="<?php echo get_post_meta( get_post_thumbnail_id( $item['id'] ), '_wp_attachment_image_alt', TRUE);?>"

			                         <?php else:?>
                                 alt="<?php echo get_the_title( $item['id']);?>"
			                         <?php endif;?>
                           >
                         </a>
                       </div>

                       <div class="info third-up">
                         <h3 class="name"><?php echo get_the_title( $item['id'] );?></h3>
                         <p class="description"><?php echo get_the_excerpt( $item['id'] );?></p>
                         <a href="<?php echo get_the_permalink( $item['id'] );?>" class="button text-btn-blue"><?php echo esc_html( pll__( 'Дізнатись більше' ) ); ?></a>
                       </div>

                     </div>
                   <?php endforeach;?>

                 </div>
               </div>
               <?php if( $fields['dolphincargo_our_services_run_text'] ):?>
                 <div class="run-rows-wrapper">
                   <div class="first-row marque-row">
                     <div class="marque-list marquee-move-left">
		                   <?php
			                   $marqueImage = carbon_get_theme_option('dolphincargo_option_marque_image');

			                   for ($ml = 0; $ml < 11; $ml ++):?>
                           <p class="marque-item"><?php echo $fields['dolphincargo_our_services_run_text'];?></p>
                           <img src="<?php echo $marqueImage;?>" alt="<?php echo get_bloginfo('name');?>">
			                   <?php endfor;?>
                     </div>
                   </div>
                   <div class="second-row marque-row">
                     <div class="marque-list marquee-move-right">
		                   <?php
			                   $marqueImage = carbon_get_theme_option('dolphincargo_option_marque_image');

			                   for ($mr = 0; $mr < 11; $mr ++):?>
                           <p class="marque-item"><?php echo $fields['dolphincargo_our_services_run_text'];?></p>
                           <img src="<?php echo $marqueImage;?>" alt="<?php echo get_bloginfo('name');?>">
			                   <?php endfor;?>
                     </div>
                   </div>
                 </div>
               <?php endif;?>

             </section>
			     <?php endif;?>

			     <?php
		     } );
	}




