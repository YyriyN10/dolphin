<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	add_action( 'wp_enqueue_scripts', 'green_system_ajax_data', 99 );
	function green_system_ajax_data(){

		wp_localize_script('dolphincargo-main-js', 'dolphincargo_ajax',
			array(
				'url' => admin_url('admin-ajax.php')
			)
		);

	}

	/**
	 * Reviews text modal
	 */

	add_action('wp_ajax_review_text_modal', 'review_text_modal_callback');
	add_action('wp_ajax_nopriv_review_text_modal', 'review_text_modal_callback');

	function review_text_modal_callback(){

		$reviewId = $_POST['reviewId'];

		?>

		<div class="inner">
			<div class="info">
				<div class="avatar">
					<img
						src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $reviewId ), 'full')[0];?>"
						<?php
							$altText = get_post_meta( get_post_thumbnail_id( $reviewId ), '_wp_attachment_image_alt', TRUE);

							if( !empty( $altText ) ):?>
								alt="<?php echo $altText;?>"
							<?php else:?>
								alt="<?php echo get_the_title( $reviewId );?>"
							<?php endif;?>
					>
				</div>
				<div class="name-position">
					<p class="name"><?php echo get_the_title( $reviewId );?></p>
					<?php
						$position = carbon_get_post_meta( $reviewId, 'dolphincargo_review_position'.dolphincargo_lang_prefix());

						if( !empty( $position ) ):?>
							<p class="position"><?php echo $position;?></p>
						<?php endif;?>

				</div>
			</div>
			<?php

				$content_no_filter = get_the_content(null, false, $reviewId );

				/*print_r(esc_html($content_no_filter), true);*/
				$content = apply_filters( 'the_content', $content_no_filter );
				echo $content;
				?>
		</div>

		<?php

		wp_reset_postdata();
		wp_die();
	}

	/**
	 * Blog pagination
	 */

	add_action('wp_ajax_blog_pagination', 'blog_pagination_callback');
	add_action('wp_ajax_nopriv_blog_pagination', 'blog_pagination_callback');

	function blog_pagination_callback(){

		$currentPage = $_POST['currentPage'];

		$paged = $currentPage;

		$blogPostPerPage = carbon_get_theme_option('dolphincargo_option_blog_posts_page');

		if ( empty( $blogPostPerPage ) ){
			$blogPostPerPage = 2;
		}

		$blogArgs = array(
			'posts_per_page' => $blogPostPerPage,
			'orderby' 	 => 'date',
			'post_type'  => 'blog',
			'post_status'    => 'publish',
      /*'offset' => $currentPage * 2,*/
			'paged' => $paged,
		);

		$blogList = new WP_Query( $blogArgs );

		$response = [];

		ob_start();

		if ( $blogList->have_posts() ) :

       while ( $blogList->have_posts() ) : $blogList->the_post(); ?>

        <a href="<?php the_permalink();?>" class="blog-post col-lg-4 col-sm-6">
           <span class="inner">
             <span class="blog-post__image">
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
             </span>
             <span class="blog-post__title"><?php the_title();?></span>
             <span class="description">
               <?php
                 $excerpt = mb_substr( get_the_excerpt(), 0, 150) . '...';
                 echo wpautop( $excerpt );
               ?>
             </span>
             <span class="button text-btn-blue"><?php echo esc_html( pll__( 'Читати далі' ) ); ?></span>
           </span>
        </a>

      <?php endwhile;
		endif;

		$response['posts'] = ob_get_clean();

		ob_start();

      $big = 999999999;
      $blogPagination =  paginate_links( array(
        'prev_next' => false,
        'end_size' => 2,
        'mid_size' => 1,
        'type' => 'list',
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '',
        'current' => max( $currentPage, get_query_var('paged') ),
        'total' => $blogList->max_num_pages
      ) );?>

        <?php

          if ( $paged == 1 ):
        ?>
            <a href="#" rel="nofollow" class="pagination-control prev disable">
              <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_b_295_2630)">
                  <rect x="0.5" y="-0.5" width="57" height="57" rx="4.5" transform="matrix(-1 0 0 1 58 1)" stroke="url(#paint0_radial_295_2630)"/>
                  <rect x="0.5" y="-0.5" width="57" height="57" rx="4.5" transform="matrix(-1 0 0 1 58 1)" stroke="url(#paint1_radial_295_2630)"/>
                  <rect x="0.5" y="-0.5" width="57" height="57" rx="4.5" transform="matrix(-1 0 0 1 58 1)" stroke="url(#paint2_radial_295_2630)"/>
                  <path d="M32 35L26 29L32 23" stroke="#067FEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                  <filter id="filter0_b_295_2630" x="-42" y="-42" width="142" height="142" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feGaussianBlur in="BackgroundImageFix" stdDeviation="21"/>
                    <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_295_2630"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur_295_2630" result="shape"/>
                  </filter>
                  <radialGradient id="paint0_radial_295_2630" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(0.819515 -7.08637e-06) rotate(44.8459) scale(77.828 143.094)">
                    <stop stop-color="white"/>
                    <stop offset="1" stop-color="white" stop-opacity="0"/>
                  </radialGradient>
                  <radialGradient id="paint1_radial_295_2630" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(1.17518 -1.30465) rotate(49.3593) scale(77.8999 129.652)">
                    <stop stop-color="#067FEF" stop-opacity="0.6"/>
                    <stop offset="1" stop-color="#067FEF" stop-opacity="0.2"/>
                  </radialGradient>
                  <radialGradient id="paint2_radial_295_2630" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="rotate(44.8459) scale(77.828 143.094)">
                    <stop stop-color="#16246F" stop-opacity="0.4"/>
                    <stop offset="1" stop-color="#16246F" stop-opacity="0"/>
                  </radialGradient>
                </defs>
              </svg>
              <span><?php echo $paged -1;?></span>
            </a>
        <?php else:?>
            <a href="#" rel="nofollow" class="pagination-control prev">
              <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_b_295_2630)">
                  <rect x="0.5" y="-0.5" width="57" height="57" rx="4.5" transform="matrix(-1 0 0 1 58 1)" stroke="url(#paint0_radial_295_2630)"/>
                  <rect x="0.5" y="-0.5" width="57" height="57" rx="4.5" transform="matrix(-1 0 0 1 58 1)" stroke="url(#paint1_radial_295_2630)"/>
                  <rect x="0.5" y="-0.5" width="57" height="57" rx="4.5" transform="matrix(-1 0 0 1 58 1)" stroke="url(#paint2_radial_295_2630)"/>
                  <path d="M32 35L26 29L32 23" stroke="#067FEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                  <filter id="filter0_b_295_2630" x="-42" y="-42" width="142" height="142" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feGaussianBlur in="BackgroundImageFix" stdDeviation="21"/>
                    <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_295_2630"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur_295_2630" result="shape"/>
                  </filter>
                  <radialGradient id="paint0_radial_295_2630" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(0.819515 -7.08637e-06) rotate(44.8459) scale(77.828 143.094)">
                    <stop stop-color="white"/>
                    <stop offset="1" stop-color="white" stop-opacity="0"/>
                  </radialGradient>
                  <radialGradient id="paint1_radial_295_2630" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(1.17518 -1.30465) rotate(49.3593) scale(77.8999 129.652)">
                    <stop stop-color="#067FEF" stop-opacity="0.6"/>
                    <stop offset="1" stop-color="#067FEF" stop-opacity="0.2"/>
                  </radialGradient>
                  <radialGradient id="paint2_radial_295_2630" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="rotate(44.8459) scale(77.828 143.094)">
                    <stop stop-color="#16246F" stop-opacity="0.4"/>
                    <stop offset="1" stop-color="#16246F" stop-opacity="0"/>
                  </radialGradient>
                </defs>
              </svg>
              <span><?php echo $paged -1;?></span>
            </a>
        <?php endif;?>

        <?php echo $blogPagination;?>

        <?php if ( $paged == $blogList->max_num_pages ):?>
          <a href="#" rel="nofollow" class="pagination-control next disable">
            <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g filter="url(#filter0_b_295_2436)">
                <rect x="0.5" y="0.5" width="57" height="57" rx="4.5" stroke="url(#paint0_radial_295_2436)"/>
                <rect x="0.5" y="0.5" width="57" height="57" rx="4.5" stroke="url(#paint1_radial_295_2436)"/>
                <rect x="0.5" y="0.5" width="57" height="57" rx="4.5" stroke="url(#paint2_radial_295_2436)"/>
                <path d="M26 35L32 29L26 23" stroke="#067FEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </g>
              <defs>
                <filter id="filter0_b_295_2436" x="-42" y="-42" width="142" height="142" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                  <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                  <feGaussianBlur in="BackgroundImageFix" stdDeviation="21"/>
                  <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_295_2436"/>
                  <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur_295_2436" result="shape"/>
                </filter>
                <radialGradient id="paint0_radial_295_2436" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(1.81952 0.999993) rotate(44.8459) scale(77.828 143.094)">
                  <stop stop-color="white"/>
                  <stop offset="1" stop-color="white" stop-opacity="0"/>
                </radialGradient>
                <radialGradient id="paint1_radial_295_2436" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(2.17518 -0.304655) rotate(49.3593) scale(77.8999 129.652)">
                  <stop stop-color="#067FEF" stop-opacity="0.6"/>
                  <stop offset="1" stop-color="#067FEF" stop-opacity="0.2"/>
                </radialGradient>
                <radialGradient id="paint2_radial_295_2436" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(1 1) rotate(44.8459) scale(77.828 143.094)">
                  <stop stop-color="#16246F" stop-opacity="0.4"/>
                  <stop offset="1" stop-color="#16246F" stop-opacity="0"/>
                </radialGradient>
              </defs>
            </svg>
            <span><?php echo $paged + 1;?></span>
          </a>
        <?php else:?>
          <a href="#" rel="nofollow" class="pagination-control next">
            <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g filter="url(#filter0_b_295_2436)">
                <rect x="0.5" y="0.5" width="57" height="57" rx="4.5" stroke="url(#paint0_radial_295_2436)"/>
                <rect x="0.5" y="0.5" width="57" height="57" rx="4.5" stroke="url(#paint1_radial_295_2436)"/>
                <rect x="0.5" y="0.5" width="57" height="57" rx="4.5" stroke="url(#paint2_radial_295_2436)"/>
                <path d="M26 35L32 29L26 23" stroke="#067FEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </g>
              <defs>
                <filter id="filter0_b_295_2436" x="-42" y="-42" width="142" height="142" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                  <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                  <feGaussianBlur in="BackgroundImageFix" stdDeviation="21"/>
                  <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_295_2436"/>
                  <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur_295_2436" result="shape"/>
                </filter>
                <radialGradient id="paint0_radial_295_2436" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(1.81952 0.999993) rotate(44.8459) scale(77.828 143.094)">
                  <stop stop-color="white"/>
                  <stop offset="1" stop-color="white" stop-opacity="0"/>
                </radialGradient>
                <radialGradient id="paint1_radial_295_2436" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(2.17518 -0.304655) rotate(49.3593) scale(77.8999 129.652)">
                  <stop stop-color="#067FEF" stop-opacity="0.6"/>
                  <stop offset="1" stop-color="#067FEF" stop-opacity="0.2"/>
                </radialGradient>
                <radialGradient id="paint2_radial_295_2436" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(1 1) rotate(44.8459) scale(77.828 143.094)">
                  <stop stop-color="#16246F" stop-opacity="0.4"/>
                  <stop offset="1" stop-color="#16246F" stop-opacity="0"/>
                </radialGradient>
              </defs>
            </svg>
            <span><?php echo $paged + 1;?></span>
          </a>
        <?php endif;?>

      <?php

		$response['pagination'] = ob_get_clean();

		wp_send_json($response);

		wp_reset_postdata();
		wp_die();
	}
