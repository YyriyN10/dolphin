<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_about_us_main_screen' );

	function dolphincargo_about_us_main_screen(){
		Block::make( __( 'About us main screen' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_about_us_main_screen_title', 'Головний заголовок'),
			     Field::make_text('dolphincargo_about_us_main_screen_who_are_we', 'Чим займаємось'),
			     Field::make_image('dolphincargo_about_us_main-screen_image', 'Зображення')
				     ->set_help_text('Зображення для моніторів з розширенням меншк за 2000рх')
			          ->set_type('image')
			          ->set_value_type('url'),
			     Field::make_image('dolphincargo_about_us_main-screen_image_larg', 'Зображення для великих екранів')
			          ->set_help_text('Зображення для моніторів з розширенням більше за 2000рх')
			          ->set_type('image')
			          ->set_value_type('url'),
			     Field::make_image('dolphincargo_main_screen_image_mob', 'Зображення мобільних пристроїв')
			          ->set_help_text('При необхідності')
			          ->set_type('image')
			          ->set_value_type('url'),
			     Field::make_complex('dolphincargo_about_us_main-screen_advantages_list', 'Перелік переваг')
			          ->add_fields(array(
				          Field::make_text('name', 'Назва переваги'),
			          )),

		     ) )

		     ->set_category( 'dolphincargo-how-category' )
		     ->set_icon('cover-image')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- головний екран -->
			    <section class="main-screen about-us-main-screen" >

              <style>

                .about-us-main-screen{
                  background-image: url(<?php echo $fields['dolphincargo_about_us_main-screen_image'];?>);
                }
         <?php if( !empty($fields['dolphincargo_about_us_main-screen_image_larg']) ):?>
                @media (min-width: 2001px) {
                  .about-us-main-screen{
                    background-image: url(<?php echo $fields['dolphincargo_about_us_main-screen_image_larg'];?>);
                  }
                }
                <?php endif;?>


                <?php if( !empty($fields['dolphincargo_about_us_main-screen_image']) ):?>
                @media (max-width: 2000px) {
                  .about-us-main-screen{
                    background-image: url(<?php echo $fields['dolphincargo_about_us_main-screen_image'];?>);
                  }
                }
                <?php endif;?>
                <?php if( !empty($fields['dolphincargo_main_screen_image_mob']) ):?>
                @media (max-width: 575px) {
                  .about-us-main-screen{
                    background-image: url(<?php echo $fields['dolphincargo_main_screen_image_mob'];?>);
                  }
                }
                <?php endif;?>

              </style>

            <!--<div class="cursor-container">
              <div class="circle-button" data-toggle="modal" data-target="#formModal">
						    <?php /*echo esc_html( pll__( 'Отримати консультацію' ) ); */?>
              </div>
            </div>-->
			     <?php get_template_part('template-parts/decor-lines');?>
			     <div class="container-fluid">
				     <div class="row">
					     <div class="content col-12">
						     <h1 class="main-title"><?php echo $fields['dolphincargo_about_us_main_screen_title'];?></h1>
						     <?php if( $fields['dolphincargo_about_us_main_screen_who_are_we'] ):?>
							     <p class="who-are"><?php echo $fields['dolphincargo_about_us_main_screen_who_are_we'];?></p>
						     <?php endif;?>
						     <div class="button blue-btn" data-toggle="modal" data-target="#formModal">
							     <?php echo esc_html( pll__( 'Отримати консультацію' ) ); ?>
						     </div>
					     </div>
				     </div>
				     <?php if( !empty( $fields['dolphincargo_about_us_main-screen_advantages_list'] ) ):?>
					     <div class="row">
						     <ul class="advantages-list col-12">
							     <?php foreach( $fields['dolphincargo_about_us_main-screen_advantages_list'] as $item ):?>
								     <li class="advantage">
									     <?php echo $item['name'];?>
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