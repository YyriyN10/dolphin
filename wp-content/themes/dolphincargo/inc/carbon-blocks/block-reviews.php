<?php


	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_reviews' );

	function dolphincargo_block_reviews(){
		Block::make( __( 'Reviews block' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_block_reviews_title', 'Заголовок блоку'),

		     ) )

		     ->set_category( 'dolphincargo-common-category' )
		     ->set_icon('testimonial')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Відгуки-->
			      <?php
			      	$reviewsArgs = array(
			      		'posts_per_page' => -1,
			      		'orderby' 	 => 'date',
			      		'post_type'  => 'reviews',
			      		'post_status' => 'publish'
			      	);

			      	$reviewsList = new WP_Query( $reviewsArgs );

			      		  if ( $reviewsList->have_posts() ) :?>
						        <?php if ( $fields['dolphincargo_block_reviews_title'] ):?>
							        <section class="reviews indent-top-big indent-bottom-small animation-tracking" >
								        <div class="container-fluid">
									        <div class="row first-up">
										        <h2 class="block-title small-title col-xl-8 offset-xl-4 col-lg-10 offset-lg-2"><?php echo $fields['dolphincargo_block_reviews_title'];?></h2>
									        </div>
									        <div class="row second-up">
										        <div class="reviews__slider-wrapper col-12">
											        <div class="reviews__slider" id="reviews-slider">
												        <?php while ( $reviewsList->have_posts() ) : $reviewsList->the_post(); ?>
													        <div class="slide">
														        <div class="info">
															        <div class="avatar">
                                        <?php
	                                        $avatarName = get_the_title();

	                                        $first_character = mb_substr($avatarName, 0, 1, 'UTF-8');

                                          ?>
                                        <p><?php echo $first_character;?></p>
															        </div>
															        <div class="name-position">
																        <p class="name"><?php the_title();?></p>
                                        <?php
                                          $position = carbon_get_post_meta( get_the_ID(), 'dolphincargo_review_position'.dolphincargo_lang_prefix());
                                          if( !empty( $position ) ):?>
                                            <p class="position"><?php echo $position;?></p>
                                        <?php endif;?>

															        </div>
														        </div>
                                    <?php
	                                    $content = parse_blocks( get_the_content( null, false, get_the_ID() ) );

	                                    /*print_r($content);


	                                    echo $content['0']['blockName'];*/
                                      ?>
                                    <?php if( $content['0']['blockName'] == 'carbon-fields/video-review'):?>
                                      <div class="video-review">

                                        <div class="youtube" id="<?php echo $content['0']['attrs']['data']['dolphincargo_reviews_card_video_id'];?>"></div>

                                        <a href="#" class="play open-video-modal" data-video="<?php echo $content['0']['attrs']['data']['dolphincargo_reviews_card_video_id'];?>">
                                          <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="0.5" y="0.5" width="35" height="35" rx="17.5" stroke="#16246F"/>
                                            <path d="M28.5 17.134C29.1667 17.5189 29.1667 18.4811 28.5 18.866L13.5 27.5263C12.8333 27.9112 12 27.4301 12 26.6603L12 9.33975C12 8.56995 12.8333 8.08882 13.5 8.47372L28.5 17.134Z" fill="#16246F"/>
                                          </svg>
                                        </a>
                                      </div>
                                    <?php endif;?>
                                    <?php if( $content['0']['blockName'] == 'carbon-fields/text-review' ):?>
                                      <div class="text-review-wrapper">
		                                    <?php
/*			                                    $textLength = mb_strlen( $content['0']['attrs']['data']['dolphincargo_reviews_card_text_content']);

			                                    if ( $textLength > 187 ):*/?><!--
                                            <div class="full-text">
					                                    <?php
/*						                                    echo wpautop( $content['0']['attrs']['data']['dolphincargo_reviews_card_text_content'] );
					                                    */?>
                                            </div>
                                            <div class="text">
					                                    <?php
/*						                                    $excerpt = mb_substr( $content['0']['attrs']['data']['dolphincargo_reviews_card_text_content'], 0, 187) . '...';
						                                    echo wpautop( $excerpt );
					                                    */?>
                                            </div>
                                            <a href="#" rel="nofollow" id="<?php /*the_ID();*/?>" class="button text-btn-blue open-text-modal"><?php /*echo esc_html( pll__( 'Читати повний відгук' ) ); */?></a>
			                                    <?php /*else:*/?>
                                            <div class="text">
					                                    <?php
/*						                                    echo wpautop( $content['0']['attrs']['data']['dolphincargo_reviews_card_text_content'] );
					                                    */?>
                                            </div>

			                                    --><?php /*endif;*/?>
                                        <div class="text">
		                                      <?php
			                                      echo wpautop( $content['0']['attrs']['data']['dolphincargo_reviews_card_text_content'] );
		                                      ?>
                                        </div>
                                      </div>
                                    <?php endif;?>
													        </div>
												        <?php endwhile;?>
											        </div>
											        <?php get_template_part('template-parts/slider-navigation');?>
										        </div>
									        </div>
								        </div>
							        </section>
						        <?php endif;?>
			      	<?php endif; ?>
			      <?php wp_reset_postdata(); ?>


			     <?php
		     } );
	}


	add_action( 'carbon_fields_register_fields', 'dolphincargo_reviews_card_video' );

	function dolphincargo_reviews_card_video(){
		Block::make( __( 'Video review' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_reviews_card_video_id', 'ID відео з Youtube')
            ->set_help_text('Повне посилання https://www.youtube.com/watch?v=_lfVn9GRA9Aб, ID  _lfVn9GRA9Aб'),

		     ) )

		     ->set_category( 'dolphincargo-reviews-category' )
		     ->set_icon('media-video')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

             <div class="video-review">

               <div class="youtube" id="<?php echo $fields['dolphincargo_reviews_card_video_id'];?>"></div>

               <a href="#" class="play open-video-modal" data-video="<?php echo $fields['dolphincargo_reviews_card_video_id'];?>">
                 <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                   <rect x="0.5" y="0.5" width="35" height="35" rx="17.5" stroke="#16246F"/>
                   <path d="M28.5 17.134C29.1667 17.5189 29.1667 18.4811 28.5 18.866L13.5 27.5263C12.8333 27.9112 12 27.4301 12 26.6603L12 9.33975C12 8.56995 12.8333 8.08882 13.5 8.47372L28.5 17.134Z" fill="#16246F"/>
                 </svg>
               </a>
             </div>

			     <?php
		     } );
	}

	add_action( 'carbon_fields_register_fields', 'dolphincargo_reviews_card_text' );

	function dolphincargo_reviews_card_text(){
		Block::make( __( 'Text review' ) )
		     ->add_fields( array(
			     Field::make_rich_text('dolphincargo_reviews_card_text_content', 'Текст відгуку')

		     ) )

		     ->set_category( 'dolphincargo-reviews-category' )
		     ->set_icon('media-text')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

           <div class="text-review-wrapper">
             <?php
	             $textLength = mb_strlen( $fields['dolphincargo_reviews_card_text_content']);

	             if ( $textLength > 187 ):?>
                 <div class="full-text">
                   <?php
		                 echo wpautop( $fields['dolphincargo_reviews_card_text_content'] );
	                 ?>
                 </div>
                 <div class="text">
			             <?php
				             $excerpt = mb_substr( $fields['dolphincargo_reviews_card_text_content'], 0, 187) . '...';
				             echo wpautop( $excerpt );
			             ?>
                 </div>
                 <a href="#" rel="nofollow" id="<?php the_ID();?>" class="button text-btn-blue open-text-modal"><?php echo esc_html( pll__( 'Читати повний відгук' ) ); ?></a>
              <?php else:?>
                 <div class="text">
			             <?php
				             echo wpautop( $fields['dolphincargo_reviews_card_text_content'] );
			             ?>
                 </div>

             <?php endif;?>
           </div>

			     <?php
		     } );
	}