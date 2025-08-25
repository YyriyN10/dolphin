<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_service_main_screen' );

	function dolphincargo_service_main_screen(){
		Block::make( __( 'Service main screen' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_service_main_screen_title', 'Головний заголовок'),
			     Field::make_text('dolphincargo_service_main_screen_who_are_we', 'Чим займаємось'),
			     Field::make_image('dolphincargo_service_main-screen_image', 'Зображення')
             ->set_help_text('Зображення для моніторів з розширенням на більше 2000рх')
			          ->set_type('image')
			          ->set_value_type('url'),
			     Field::make_image('dolphincargo_service_main-screen_image_larg', 'Зображення для великих екранів')
				     ->set_help_text('Зображення для моніторів з розширенням більше за 2000рх')
			          ->set_type('image')
			          ->set_value_type('url'),
			     Field::make_image('dolphincargo_main_screen_image_mob', 'Зображення мобільних пристроїв')
			          ->set_help_text('При необхідності')
			          ->set_type('image')
			          ->set_value_type('url'),
           Field::make_complex('dolphincargo_service_main-screen_advantages_list', 'Перелік переваг')
            ->set_help_text('Не обовʼязковий блок, є не на всіх послугах')
            ->add_fields(array(
                Field::make_text('name', 'Назва переваги'),
                Field::make_rich_text('text', 'Текст переваги')
            )),
           Field::make_text('dolphincargo_service_main-screen_marque', 'Текст бігучого рядку')
	           ->set_help_text('Не обовʼязковий блок, є не на всіх послугах')

		     ) )

		     ->set_category( 'dolphincargo-services-category' )
		     ->set_icon('cover-image')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>



			     <!-- головний екран -->
           <?php if( !empty( $fields['dolphincargo_service_main-screen_advantages_list'] ) ):?>
             <section class="main-screen service-main-screen long-screen">
           <?php else:?>
             <section class="main-screen service-main-screen">
           <?php endif;?>

             <style>
               .service-main-screen{
                 background-image: url(<?php echo $fields['dolphincargo_service_main-screen_image'];?>);
               }

         <?php if( !empty($fields['dolphincargo_service_main-screen_image_larg']) ):?>
               @media (min-width: 2001px) {
                 .service-main-screen{
                   background-image: url(<?php echo $fields['dolphincargo_service_main-screen_image_larg'];?>);
                 }
               }
               <?php endif;?>

               <?php if( !empty($fields['dolphincargo_service_main-screen_image']) ):?>
                 @media (max-width: 2000px) {
                   .service-main-screen{
                     background-image: url(<?php echo $fields['dolphincargo_service_main-screen_image'];?>);
                   }
                 }
               <?php endif;?>
               <?php if( !empty($fields['dolphincargo_main_screen_image_mob']) ):?>
                 @media (max-width: 575px) {
                   .service-main-screen{
                     background-image: url(<?php echo $fields['dolphincargo_main_screen_image_mob'];?>);
                   }
                 }
               <?php endif;?>
             </style>

				     <div class="container-fluid">
					     <div class="row">
						     <div class="content col-12">
							     <h1 class="main-title"><?php echo $fields['dolphincargo_service_main_screen_title'];?></h1>
							     <?php if( $fields['dolphincargo_service_main_screen_who_are_we'] ):?>
								     <p class="who-are"><?php echo $fields['dolphincargo_service_main_screen_who_are_we'];?></p>
							     <?php endif;?>
							     <div class="button blue-btn" data-toggle="modal" data-target="#formModal">
								     <?php echo esc_html( pll__( 'Отримати консультацію' ) ); ?>
							     </div>
						     </div>
					     </div>
               <?php if( !empty( $fields['dolphincargo_service_main-screen_advantages_list'] ) ):?>
                 <div class="row">
                   <ul class="advantages-list col-12">
                     <?php foreach( $fields['dolphincargo_service_main-screen_advantages_list'] as $item ):?>
                       <li class="advantage">
                         <p class="name"><?php echo $item['name'];?></p>
                         <?php if( !empty( $item['text'] ) ):?>
                           <div class="description"><?php echo wpautop( $item['text'] );?></div>
                         <?php endif;?>

                       </li>
                     <?php endforeach;?>
                   </ul>
                 </div>
               <?php endif;?>
				     </div>
           <?php if( empty( $fields['dolphincargo_service_main-screen_advantages_list'] ) ):?>
             <div class="cursor-container">
               <div class="circle-button" data-toggle="modal" data-target="#formModal">
		             <?php echo esc_html( pll__( 'Отримати консультацію' ) ); ?>
               </div>
             </div>
           <?php endif;?>

			     </section>

           <?php if( !empty($fields['dolphincargo_service_main-screen_marque']) ):?>
             <div class="service-main-marque-wrapper">
               <div class="marque-list marquee-move">
						     <?php
							     $marqueImage = carbon_get_theme_option('dolphincargo_option_marque_image');

							     for ($mi = 0; $mi < 15; $mi ++):?>
                     <p class="marque-item"><?php echo $fields['dolphincargo_service_main-screen_marque'];?></p>
                     <img src="<?php echo $marqueImage;?>" alt="<?php echo get_bloginfo('name');?>">
							     <?php endfor;?>
               </div>
             </div>
           <?php endif;?>




			     <?php
		     } );
	}