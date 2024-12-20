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
							        <section class="reviews indent-top-big indent-bottom-small" >
								        <?php get_template_part('template-parts/decor-lines');?>
								        <div class="container-fluid">
									        <div class="row">
										        <h2 class="block-title small-title col-12 text-center"><?php echo $fields['dolphincargo_block_reviews_title'];?></h2>
									        </div>
									        <div class="row">
										        <div class="reviews__slider-wrapper col-12">
											        <div class="reviews__slider" id="reviews-slider">
												        <?php while ( $reviewsList->have_posts() ) : $reviewsList->the_post(); ?>
													        <div class="slide">
														        <div class="info">
															        <div class="avatar">
																        <img
																           src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'full')[0];?>"
																           <?php
																	           $altText = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);

																	           if( !empty( $altText ) ):?>
																		           alt="<?php echo $altText;?>"
																		       <?php else:?>
																		           alt="<?php the_title();?>"
																           <?php endif;?>
																        >
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
                                    <?php the_content();?>
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
			     Field::make_file('dolphincargo_reviews_card_video_file', 'Відео відгуку')
            ->set_type('video')
            ->set_value_type('url'),
           Field::make_image('dolphincargo_reviews_card_video_poster', 'Постер для відео')
            ->set_type('image')

		     ) )

		     ->set_category( 'dolphincargo-reviews-category' )
		     ->set_icon('media-video')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

             <div class="video-review">
               <img
                  src="<?php echo wp_get_attachment_image_src( $fields['dolphincargo_reviews_card_video_poster'], 'full')[0];?>"
                  <?php
                    $altText = get_post_meta( $fields['dolphincargo_reviews_card_video_poster'], '_wp_attachment_image_alt', TRUE);

                    if( !empty( $altText ) ):?>
                      alt="<?php echo get_post_meta( $altText, '_wp_attachment_image_alt', TRUE);?>"
                  <?php else:?>
                      alt="<?php the_title();?>"
                  <?php endif;?>
               >
               <a href="#" class="play" data-video="<?php echo $fields['dolphincargo_reviews_card_video_file'];?>">
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
                 <div class="text">
			             <?php
				             $excerpt = mb_substr( $fields['dolphincargo_reviews_card_text_content'], 0, 187) . '...';
				             echo wpautop( $excerpt );
			             ?>
                 </div>
                 <a href="#" rel="nofollow" class="button"><?php echo esc_html( pll__( 'Читати повний відгук' ) ); ?></a>
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