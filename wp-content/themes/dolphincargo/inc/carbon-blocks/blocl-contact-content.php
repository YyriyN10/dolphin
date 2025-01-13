<?php


	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_contact_content' );

	function dolphincargo_block_contact_content(){
		Block::make( __( 'Our contacts' ) )
		     ->add_fields( array(
			     Field::make_complex('dolphincargo_block_contact_content_list', 'Контакти офісів')
			          ->add_fields( array(
			          	Field::make_text('name', 'Назва офісу'),
				          Field::make_rich_text('address', 'Адреса офісу'),
				          Field::make_complex('phone_list', 'Перелік контактних телефонів офісу')
										->add_fields(array(
											Field::make_text('phone')
										)),
				          Field::make_text('email', 'Електронна адреса офісу')
										->set_attribute('type', 'email'),
				          Field::make_image('image', 'Фото офісу')
				               ->set_type('image'),
				          Field::make_text('map', 'Посилання на мапу')
				            ->set_attribute('type', 'url')
			          )),

		     ) )

		     ->set_category( 'dolphincargo-contact-category' )
		     ->set_icon('admin-multisite')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Перелік контактів -->
			     <?php if ( $fields['dolphincargo_block_contact_content_list'] ):?>
				     <section class="our-contacts indent-top-small indent-bottom-medium animation-tracking" >
					     <?php get_template_part('template-parts/decor-lines');?>
               <div class="light top-pic"><img src="<?php echo THEME_PATH;?>/assets/img/faq-block-light.png" alt="<?php the_title();?>"></div>
               <div class="light bottom-pic"><img src="<?php echo THEME_PATH;?>/assets/img/faq-block-light.png" alt="<?php the_title();?>"></div>
					     <div class="container-fluid">
						     <?php foreach( $fields['dolphincargo_block_contact_content_list'] as $contact ):?>
							     <div class="row office">
										<div class="office__info col-lg-4 col-sm-6">
											<h3 class="office-name"><?php echo $contact['name'];?></h3>

											<?php if( !empty( $contact['address'] ) ):?>
                        <div class="contact-item">
                          <h3 class="contact-name"><?php echo esc_html( pll__( 'Адреса' ) ); ?></h3>
                          <div class="text"><?php echo wpautop( $contact['address'] );?></div>
                        </div>
											<?php endif;?>

											<?php if( !empty( $contact['phone_list']) ):?>

												<div class="contact-item"">
													<h3 class="contact-name"><?php echo esc_html( pll__( 'Телефон' ) ); ?></h3>

													<?php foreach( $contact['phone_list'] as $phone ):?>

														<?php
														$phoneToColl = preg_replace( '/[^0-9]/', '', $phone['phone']);
														?>

														<?php if( str_contains(strval( $phone['phone']), '+') ):?>
															<a href="tel:+<?php echo $phoneToColl;?>" class="phone"><?php echo $phone['phone'];?></a>
														<?php else :?>
															<a href="tel:<?php echo $phoneToColl;?>" class="phone"><?php echo $phone['phone'];?></a>
														<?php endif;?>
													<?php endforeach;?>

												</div>
											<?php endif;?>

											<?php if( !empty( $contact['email']) ):?>
                        <div class="contact-item">
                          <h3 class="contact-name"><?php echo esc_html( pll__( 'Пошта' ) ); ?></h3>
                          <a href="mailto:<?php echo antispambot( $contact['email'], 1);?>" class="email"><?php echo antispambot( $contact['email'], 0);?></a>
                        </div>

											<?php endif;?>
										</div>
								     <div class="office__image col-lg-4 col-sm-6">
                       <div class="inner">
                         <img
                             class="lazy"
                             data-src="<?php echo wp_get_attachment_image_src( $$contact['image'], 'full')[0];?>"
		                       <?php
			                       $altText = get_post_meta( $contact['image'], '_wp_attachment_image_alt', TRUE);
			                       if( $altText ):?>
                               alt="<?php echo $altText;?>"
			                       <?php else:?>
                               alt="<?php echo get_post_meta( $contact['name'], '_wp_attachment_image_alt', TRUE);?>"
			                       <?php endif;?>
                         >
                       </div>
								     </div>
								     <div class="office__map col-lg-4 col-sm-12">
                       <div class="inner">
                         <iframe src="<?php echo $contact['map'];?>" width="800" height="600" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                       </div>
                     </div>
							     </div>
						     <?php endforeach;?>
					     </div>
				     </section>
			     <?php endif;?>

			     <?php
		     } );
	}