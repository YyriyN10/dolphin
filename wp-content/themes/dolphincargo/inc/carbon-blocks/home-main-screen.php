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
           <section class="main-screen home-main-screen" style="background-image: url(<?php echo $fields['dolphincargo_home_page_main-screen_image'];?>)">
             <?php get_template_part('template-parts/decor-lines');?>
             <div class="container-fluid">
               <div class="row">
                 <div class="content col-12">
                   <h1 class="main-title"><?php echo $fields['dolphincargo_home_page_main_screen_title'];?></h1>
							     <?php if( $fields['dolphincargo_home_page_main-screen_who_are_we'] ):?>
                     <p class="who-are"><?php echo $fields['dolphincargo_home_page_main-screen_who_are_we'];?></p>
							     <?php endif;?>
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
             <a href="#" rel="nofollow" class="circle-button">
		           <?php echo esc_html( pll__( 'Отримати консультацію' ) ); ?>
             </a>
           </section>

			     <?php
		     } );
	}

	add_action( 'carbon_fields_register_fields', 'dolphincargo_seo_block' );

	function dolphincargo_seo_block(){
		Block::make( __( 'Seo Block' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_home_page_seo_title', 'Заголовок блоку'),
			     Field::make_rich_text('dolphincargo_home_page_seo_text', 'Текст'),

		     ) )

		     ->set_category( 'dolphincargo-common-category' )
		     ->set_icon('info')


		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

           <!-- SEO блок -->
           <?php if ( $fields['dolphincargo_home_page_seo_title'] && $fields['dolphincargo_home_page_seo_text'] ):?>
             <section class="seo-block" >
               <div class="container-fluid">
                 <div class="row">
                   <div class="content col-12">
                     <h2 class="block-title"><?php echo $fields['dolphincargo_home_page_seo_title'];?></h2>
                     <div class="text-content"><?php echo wpautop( $fields['dolphincargo_home_page_seo_text']);?></div>
                   </div>
                 </div>
               </div>
             </section>
           <?php endif;?>

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
               <div class="light">
                 <img src="<?php echo THEME_PATH;?>/assets/img/home-services-light.png" alt="">
               </div>
               <div class="container-fluid">
                 <div class="row">
                   <h2 class="block-title col-12 text-center"><?php echo $fields['dolphincargo_our_services_title'];?></h2>
                 </div>
                 <div class="row content">
                   <?php foreach( $fields['dolphincargo_our_services_list'] as $item ):?>
                     <div class="service-item col-12">
                       <h3 class="name"><?php echo get_the_title( $item['id'] );?></h3>
                       <div class="pic-wrapper">
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
                       </div>

                       <div class="info">
                         <div class="description"><?php echo get_the_excerpt( $item['id'] );?></div>
                         <a href="<?php echo get_the_permalink( $item['id'] );?>"><?php echo esc_html( pll__( 'Дізнатись більше' ) ); ?></a>
                       </div>

                     </div>
                   <?php endforeach;?>

                 </div>
               </div>
               <?php if( $fields['dolphincargo_our_services_run_text'] ):?>
                 <div class="run-rows-wrapper">
                   <div class="run-row first-row">
                     <?php echo $fields['dolphincargo_our_services_run_text'];?>
                     <?php echo $fields['dolphincargo_our_services_run_text'];?>
                     <?php echo $fields['dolphincargo_our_services_run_text'];?>
                   </div>
                   <p class="run-row second-row"><?php echo $fields['dolphincargo_our_services_run_text'];?> <?php echo $fields['dolphincargo_our_services_run_text'];?></p>
                 </div>
               <?php endif;?>

             </section>
			     <?php endif;?>

			     <?php
		     } );
	}




