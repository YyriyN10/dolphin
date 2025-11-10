<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_calculator_main_screen' );

	function dolphincargo_calculator_main_screen(){
		Block::make( __( 'Calculator main screen' ) )
		     ->add_fields( array(
			     Field::make_text('block_title', 'Головний заголовок'),
			     Field::make_text('block_text', 'Текст заклику'),
			     Field::make_image('block_image', 'Зображення')
			          ->set_help_text('Зображення для моніторів з розширенням на більше 2000рх')
			          ->set_type('image')
			          ->set_value_type('url'),
			     Field::make_image('block_image_larg', 'Зображення для великих екранів')
			          ->set_help_text('Зображення для моніторів з розширенням більше за 2000рх')
			          ->set_type('image')
			          ->set_value_type('url'),
			     Field::make_image('block_image_mob', 'Зображення мобільних пристроїв')
			          ->set_help_text('При необхідності')
			          ->set_type('image')
			          ->set_value_type('url'),
           Field::make_text('block_form_text', 'Інформаційний текст у формі')
		     ) )

		     ->set_category( 'dolphincargo-calculator-page-category' )
		     ->set_icon('cover-image')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- головний екран -->
			     <section class="main-screen calculator-main-screen">

			     <style>
				     .calculator-main-screen{
					     background-image: url(<?php echo $fields['block_image'];?>);
				     }

				     <?php if( !empty($fields['block_image_larg']) ):?>
				     @media (min-width: 2001px) {
					     .calculator-main-screen{
						     background-image: url(<?php echo $fields['block_image_larg'];?>);
					     }
				     }
				     <?php endif;?>

				     <?php if( !empty($fields['block_image']) ):?>
				     @media (max-width: 2000px) {
					     .calculator-main-screen{
						     background-image: url(<?php echo $fields['block_image'];?>);
					     }
				     }
				     <?php endif;?>
				     <?php if( !empty($fields['block_image_mob']) ):?>
				     @media (max-width: 575px) {
					     .calculator-main-screen{
						     background-image: url(<?php echo $fields['block_image_mob'];?>);
					     }
				     }
				     <?php endif;?>
			     </style>

			     <div class="container-fluid">
				     <div class="row">
					     <div class="text-content col-lg-6 col-12">
						     <h1 class="main-title"><?php echo $fields['block_title'];?></h1>
						     <?php if( $fields['block_text'] ):?>
							     <p class="who-are"><?php echo $fields['block_text'];?></p>
						     <?php endif;?>
					     </div>
					     <div class="form-wrapper col-lg-6">
                 <div class="inner">
                   <div class="calculator-wrapper" id="calculatorType2">
                     <div class="calc-data-type-wrapper">
                       <h3 class="title"><?php echo esc_html( pll__( 'Одиниці виміру' ) ); ?>:</h3>
                       <div class="data-type-list">
                         <div class="form-check">
                           <label class="form-check-label">
                             <input type="radio" checked class="form-check-input" name="calc-form-units-measurement" value="meters" >
                             <span class="label"><?php echo esc_html( pll__( 'Метри' ) ); ?></span>
                           </label>
                         </div>
                         <div class="form-check">
                           <label class="form-check-label" >
                             <input type="radio" class="form-check-input" name="calc-form-units-measurement" value="centimeters" >
                             <span class="label"><?php echo esc_html( pll__( 'Cантиметри' ) ); ?></span>
                           </label>
                         </div>
                         <div class="form-check">
                           <label class="form-check-label">
                             <input type="radio" class="form-check-input" name="calc-form-units-measurement" value="millimeters">
                             <span class="label"><?php echo esc_html( pll__( 'Міліметри' ) ); ?></span>
                           </label>
                         </div>
                       </div>
                     </div>
                     <h3 class="title"><?php echo esc_html( pll__( 'Габарити' ) ); ?>:</h3>
                     <div class="calc-param-wrapper">
                       <div class="form-group">
                         <input type="number" name="white" class="form-control" id="calc-type2-white" placeholder="<?php echo esc_html( pll__( 'Ширина:' ) ); ?>" required>
                       </div>
                       <div class="form-group">
                         <input type="number" name="height" class="form-control" id="calc-type2-height" placeholder="<?php echo esc_html( pll__( 'Висота:' ) ); ?>" required>
                       </div>
                       <div class="form-group">
                         <input type="number" name="length" class="form-control" id="calc-type2-length" placeholder="<?php echo esc_html( pll__( 'Довжина:' ) ); ?>" required>
                       </div>
                       <div class="form-group">
                         <input type="number" name="count" class="form-control" id="calc-type2-count" placeholder="<?php echo esc_html( pll__( 'Кількість коробок' ) ); ?>" required>
                       </div>
                     </div>

                     <p class="calculator-result"><?php echo esc_html( pll__( 'Обʼєм вантажу' ) ); ?>: <span></span>м³</p>

                     <div class="button blue-btn" id="calc-type-2">
			                 <?php echo esc_html( pll__( 'Розрахувати обʼєм' ) ); ?>
                     </div>

		                 <?php if( !empty($fields['block_form_text']) ):?>
                       <p class="form-text-info" id="form-info-text">
				                 <?php echo $fields['block_form_text'];?>
                         <svg class="icon" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M18 9.5L12 15.5L6 9.5" stroke="#FBFBFB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                         </svg>

                       </p>
		                 <?php endif;?>



                   </div>
                 </div>

					     </div>
				     </div>
			     </div>
			     </section>

			     <?php
		     } );
	}