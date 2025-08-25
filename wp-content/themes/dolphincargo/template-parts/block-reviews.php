<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}


	 	$reviewsArgs = array(
	 		'posts_per_page' => -1,
	 		'orderby' 	 => 'date',
	 		'post_type'  => 'reviews',
	 		'post_status'    => 'publish'
	 	);

	 	$reviewsList = new WP_Query( $reviewsArgs );

	 		  if ( $reviewsList->have_posts() ) :?>

			    <!-- Dsluerb -->
			    <section class="reviews">
				    <div class="container">
					    <div class="row">
						    <h2 class="block-title col-12"><?php echo esc_html( pll__( 'Відгуки наших клієнтів' ) ); ?></h2>
					    </div>
					    <div class="row">
						    <div class="reviews-slider-wrapper col-12">
							    <div class="reviews-slider" id="reviews-slider">
			              <?php while ( $reviewsList->have_posts() ) : $reviewsList->the_post(); ?>
								      <div class="slide"></div>
			              <?php endwhile;?>
							    </div>
						    </div>
					    </div>
				    </div>
			    </section>
	 	<?php endif; ?>
	 <?php wp_reset_postdata(); ?>