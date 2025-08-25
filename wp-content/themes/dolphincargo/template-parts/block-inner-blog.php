<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	 	$blogArgs = array(
	 		'posts_per_page' => -1,
	 		'orderby' 	 => 'date',
	 		'post_type'  => 'blog',
	 		'post_status'    => 'publish'
	 	);

	 	$blogList = new WP_Query( $blogArgs );

	 		  if ( $blogList->have_posts() ) :?>

			        <!-- Останні статті -->
			        <section class="blog-last-posts">
			          <div class="container">
			            <div class="row">
			              <h2 class="block-title col-12"><?php echo esc_html( pll__( 'Корисний контент' ) ); ?></h2>
			            </div>
			            <div class="row">
			              <div class="last-posts-slider-wrapper col-12">
				              <div class="last-posts-slider" id="last-posts-slider">
					              <?php while ( $blogList->have_posts() ) : $blogList->the_post(); ?>
						              <a href="<?php the_permalink();?>" class="slide">
														<span class="preview-wrapper">
															<img
															   class="lazy"
															   data-src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];?>"
															   alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);?>"
															>
														</span>
							              <span class="name"></span>
							              <span class="description"><?php the_excerpt();?></span>
						              </a>
					              <?php endwhile;?>
				              </div>
				              <a href="" class="button"><?php echo esc_html( pll__( 'Читати блог' ) ); ?></a>
			              </div>
			            </div>
			          </div>
			        </section>



	 	<?php endif; ?>
	 <?php wp_reset_postdata(); ?>