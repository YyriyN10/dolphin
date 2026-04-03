<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_calculator_form' );

	function dolphincargo_block_calculator_form(){
		Block::make( __( 'Calculator form' ) )
		     ->add_fields( array(
			     Field::make_text('block_title', 'Заголовок блоку'),
			     Field::make_text('block_subtitle', 'Підзаголовок блоку'),
			     Field::make_complex('block_delivery_list', 'Перелік способів доставки')
			          ->add_fields(array(
				          Field::make_text('name', 'Назва способу'),
			          )),
			     Field::make_complex('block_delivery_category_list', 'Перелік категорій товарів')
			          ->add_fields(array(
				          Field::make_text('name', 'Назва категорії'),
			          )),
		     ) )

		     ->set_category( 'dolphincargo-calculator-page-category' )
		     ->set_icon('forms')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <?php if( !empty( $fields['block_title'] ) ):?>
				     <section class="calculator-form-block indent-bottom-small indent-top-small animation-tracking" >
					     <div class="container-fluid">
						     <?php if( !empty($fields['block_title']) ):?>
							     <div class="row first-up">
								     <h2 class="block-title big-title col-12 text-center"><?php echo $fields['block_title'];?></h2>
							     </div>
						     <?php endif;?>
						     <?php if( !empty($fields['block_subtitle']) ):?>
							     <div class="row second-up">
								     <p class="subtitle col-12 text-center"><?php echo $fields['block_subtitle'];?></p>
							     </div>
						     <?php endif;?>
						     <div class="row">
							     <form class="form-wrapper col-lg-8 offset-lg-2 col-sm-10 offset-sm-1 col-12">
                     <input type="hidden" name="action" value="contact_form">
								     <?php
									     $currentPageLang = ICL_LANGUAGE_CODE;

									     $thxPageUrl = '';

									     if ( $currentPageLang == 'uk' && !empty(carbon_get_theme_option('dolphincargo_option_form_thx_page_ua')) ){

										     $thxPageUrl = carbon_get_theme_option('dolphincargo_option_form_thx_page_ua')[0]['id'];

									     }

									     if ( $currentPageLang == 'ru' && !empty(carbon_get_theme_option('dolphincargo_option_form_thx_page_ru'))){
										     $thxPageUrl = carbon_get_theme_option('dolphincargo_option_form_thx_page_ru')[0]['id'];
									     }

									     if ( $currentPageLang == 'en' && !empty(carbon_get_theme_option('dolphincargo_option_form_thx_page_en'))){
										     $thxPageUrl = carbon_get_theme_option('dolphincargo_option_form_thx_page_en')[0]['id'];
									     }

									     if ( $thxPageUrl == '' ){
										     $thxPageUrl = get_site_url('/').'/thx';
									     }else{
										     $thxPageUrl = get_permalink($thxPageUrl);
									     }

									     $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
								     ?>

                     <input type="hidden" name="thx-target" value="<?php echo base64_encode($thxPageUrl);;?>">
                     <!--<input type="hidden" name="page-url" value="<?php /*the_permalink();*/?>">-->
                     <input type="hidden" name="page-url" value="<?php echo $actual_link;?>">

                     <input type="hidden" name="page-name" value="<?php the_title();?>">
                     <input type="hidden" name="g-recaptcha-response" class="recaptchaResponse">
								     <div class="inner">
									     <?php if( !empty($fields['block_delivery_list']) ):?>
										     <div class="delivery-wrapper">
											     <h3 class="item-title"><?php echo esc_html( pll__( 'Оберіть спосіб доставки' ) ); ?></h3>
											     <div class="data-type-list">
												     <?php foreach( $fields['block_delivery_list'] as $delivery ):?>
													     <div class="form-check">
														     <label class="form-check-label">
															     <input type="radio" class="form-check-input" name="calc-delivery-type" value="<?php echo $delivery['name'];?>" >
															     <span class="label"><?php echo $delivery['name'];?></span>
														     </label>
													     </div>
												     <?php endforeach;?>
											     </div>
										     </div>
									     <?php endif;?>
									     <?php if( !empty($fields['block_delivery_category_list']) ):?>
										     <div class="form-group">
											     <h3 class="item-title"><?php echo esc_html( pll__( 'Оберіть категорію товару' ) ); ?></h3>
											     <select name="calc-delivery-category" >
                             <option value="" disabled selected><?php echo esc_html( pll__( 'Електротовари,мобільні аксесуари' ) ); ?></option>
												     <?php foreach( $fields['block_delivery_category_list'] as $category ):?>
													     <option value="<?php echo $category['name'];?>"><?php echo $category['name'];?></option>
												     <?php endforeach;?>
											     </select>
										     </div>
									     <?php endif;?>
									     <div class="form-group">
										     <h3 class="item-title"><?php echo esc_html( pll__( 'Вага і об’єм вантажу з упаковкою' ) ); ?></h3>
										     <input type="text" name="calc-form-volume" id="calc-form-volume" class="form-control" placeholder="<?php echo esc_html( pll__( 'Введіть масу, кг/об’єм, куб.м.' ) ); ?>">
									     </div>
									     <div class="contacts-wrapper">
										     <div class="form-group">
											     <h3 class="item-title"><?php echo esc_html( pll__( 'Ім’я, Прізвище' ) ); ?></h3>
											     <input type="text" name="name" class="form-control" placeholder="<?php echo esc_html( pll__( 'Ваше ім’я' ) ); ?>" >
										     </div>
										     <div class="form-group">
											     <h3 class="item-title"><?php echo esc_html( pll__( 'Телефон' ) ); ?><span>*</span></h3>
											     <input type="tel" name="phone" class="form-control" placeholder="+380" required>
										     </div>
										     <div class="form-group">
											     <h3 class="item-title"><?php echo esc_html( pll__( 'Email' ) ); ?><span>*</span></h3>
											     <input type="email" name="email" class="form-control" placeholder="<?php echo esc_html( pll__( 'Напишіть вам еmail' ) ); ?>" required>
										     </div>
									     </div>
                       <div class="form-group textarea-group">
                         <textarea name="message" class="form-control" placeholder="<?php echo esc_html( pll__( 'Ваш коментар' ) ); ?>"></textarea>
                       </div>
									     <button type="submit" class="button blue-btn"><?php echo esc_html( pll__( 'Дізнатись вартість' ) ); ?></button>
								     </div>
							     </form>
						     </div>
					     </div>
				     </section>
			     <?php endif;?>
			     <?php
		     } );
	}