<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Шаблон сторінки "Блог"
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package dolphincargo
	 *
	 */

	get_header();?>


	 <?php

	  $blogPostPerPage = carbon_get_theme_option('dolphincargo_option_blog_posts_page');

	  if ( empty( $blogPostPerPage ) ){
		  $blogPostPerPage = 2;
    }

	 	$blogArgs = array(
	 		'posts_per_page' => $blogPostPerPage,
	 		'orderby' 	 => 'date',
	 		'post_type'  => 'blog',
	 		'post_status' => 'publish'
	 	);

	 	$blogList = new WP_Query( $blogArgs );

	 		  if ( $blogList->have_posts() ) :?>

			    <!-- Блог -->
			    <section class="main-blog indent-bottom-small">
				    <?php get_template_part('template-parts/decor-lines');?>
				    <svg class="bg-pic" width="890" height="938" viewBox="0 0 890 938" fill="none" xmlns="http://www.w3.org/2000/svg">
					    <g style="mix-blend-mode:luminosity" opacity="0.2">
						    <path d="M704.891 303.174C706.373 306.033 707.856 308.892 709.338 311.751C753.51 392.096 763.91 490.664 729.537 583.515C666.657 753.369 477.928 840.133 308.099 777.262C249.39 755.528 200.836 718.841 164.643 673.099C116.764 615.87 89.1298 543.265 87.7001 467.885C73.5936 617.677 160.89 764.349 308.78 819.098C485.11 884.375 681.076 794.284 746.363 617.928C786.829 508.62 767.504 391.732 704.891 303.174Z" fill="#0F0F0F"/>
						    <path d="M164.658 451.557C218.437 306.287 366.481 245.814 502.588 296.201C506.245 297.555 509.902 298.908 513.483 300.465C503.245 313.77 493.186 321.598 477.998 333.301C457.399 349.009 450.139 346.783 454.511 355.563C458.575 363.305 491.634 368.844 520.839 356.092C535.088 350.047 550.172 337.38 562.194 326.122C596.143 350.471 626.037 381.406 642.164 418.333C648.847 433.975 657.691 475.598 663.071 482.904C668.527 490.006 684.274 496.76 685.566 478.294C686.859 459.829 683.315 461.289 687.978 448.693C692.567 436.299 699.54 424.326 704.323 410.157C715.267 377.476 700.244 325.711 676.812 287.927C645.697 237.828 603.456 207.174 556.311 186.025L556.762 184.806C551.225 182.294 545.612 179.985 539.924 177.879C537.484 158.263 528.731 126.377 500.357 101.318C455.978 62.7115 441.759 69.9227 439.676 74.9269C434.907 86.5606 460.423 119.34 449.653 157.167C311.955 144.771 177.433 225.498 126.963 361.828C70.251 515.022 160.939 648.164 160.939 648.164C160.939 648.164 124.794 559.24 164.658 451.557ZM514.265 299.6L514.642 298.584C514.845 298.659 514.845 298.659 515.048 298.734C514.694 299.065 514.416 299.193 514.265 299.6Z" fill="#0F0F0F"/>
						    <path d="M553.692 403.369C525.033 389.063 494.531 382.854 464.542 383.996C472.465 386.929 480.313 390.065 487.859 394.014C591.088 445.859 632.887 571.299 581.038 674.544C567.032 702.395 547.758 725.755 524.813 744.059C571.406 729.888 612.293 697.435 635.702 650.425C681.316 559.656 644.649 449.054 553.692 403.369Z" fill="#464646"/>
						    <path d="M466.193 433.815C518.571 493.865 533.996 581.356 498.568 658.338C474.573 710.675 431.805 748.208 381.91 766.931C451.241 769.958 518.573 731.585 548.999 664.995C589.001 578.155 551.862 475.694 466.193 433.815Z" fill="#464646"/>
						    <path d="M390.073 480.947C388.726 480.217 387.304 479.69 385.957 478.961C424.574 528.141 433.887 597.198 403.889 657.016C379.097 706.517 332.882 738.384 282.159 746.867C348.497 767.96 422.052 738.359 454.187 674.019C489.894 603.146 461.137 516.726 390.073 480.947Z" fill="#464646"/>
						    <path d="M557.043 343.158C552.115 347.109 544.757 352.009 534.383 356.947C573.929 373.666 606.922 399.973 631.498 432.173C614.137 397.33 588.96 366.756 557.043 343.158Z" fill="#464646"/>
						    <path d="M213.797 495.391C251.78 392.787 352.357 331.376 456.237 338.413C456.793 338.157 457.147 337.826 457.501 337.495C466.506 332.512 483.41 318.671 494.123 309.7C366.984 263.788 226.261 328.819 179.176 456.007C141.945 556.579 174.548 665.677 252.123 730.665C200.768 666.604 183.259 577.88 213.797 495.391Z" fill="#464646"/>
					    </g>
				    </svg>
				    <div class="light light-top"><img src="<?php echo THEME_PATH;?>/assets/img/airplan-call-to-light.png" alt=""></div>
            <div class="light light-left"><img src="<?php echo THEME_PATH;?>/assets/img/airplan-call-to-light.png" alt=""></div>
            <div class="light light-right"><img src="<?php echo THEME_PATH;?>/assets/img/airplan-call-to-light.png" alt=""></div>
				    <div class="container-fluid">
					    <div class="row">
						    <h1 class="main-title col-12 text-center"><?php the_title();?></h1>
					    </div>
				    </div>
				    <div class="run-rows-wrapper">
              <div class="first-row marque-row">
                <div class="marque-list marquee-move-left">
							    <?php
								    $marqueImage = carbon_get_theme_option('dolphincargo_option_marque_image');

								    for ($ml = 0; $ml < 11; $ml ++):?>
                      <p class="marque-item">Services of the transportation & logistics company DOLPHIN CARGO</p>
                      <img src="<?php echo $marqueImage;?>" alt="<?php echo get_bloginfo('name');?>">
								    <?php endfor;?>
                </div>
              </div>
              <div class="second-row marque-row">
                <div class="marque-list marquee-move-right">
							    <?php
								    $marqueImage = carbon_get_theme_option('dolphincargo_option_marque_image');

								    for ($mr = 0; $mr < 11; $mr ++):?>
                      <p class="marque-item">Services of the transportation & logistics company DOLPHIN CARGO</p>
                      <img src="<?php echo $marqueImage;?>" alt="<?php echo get_bloginfo('name');?>">
								    <?php endfor;?>
                </div>
				    </div>
				    <div class="container-fluid">
					    <div class="row blog-list" id="blog-list">
						    <?php while ( $blogList->have_posts() ) : $blogList->the_post(); ?>

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
												    <!-- --><?php /*echo get_the_excerpt();*/?>
											     </span>
                           <span class="button text-btn-blue"><?php echo esc_html( pll__( 'Читати далі' ) ); ?></span>
										     </span>
							    </a>

						    <?php endwhile;?>

					    </div>
              <?php if( $blogList->max_num_pages > 1):?>
                <div class="row">
                  <div class="pagination-wrapper col-12" id="pagination">
			              <?php

				              $big = 999999999;
				              $blogPagination =  paginate_links( array(
					              'prev_next' => false,
					              'end_size' => 2,
					              'mid_size' => 1,
					              'type' => 'list',
					              'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
					              'format' => '?paged=%#%',
					              'current' => max( 1, get_query_var('paged') ),
					              'total' => $blogList->max_num_pages
				              ) );?>

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
                      <span>1</span>
                    </a>

			              <?php echo $blogPagination;?>

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
                      <span>2</span>
                    </a>
                  </div>
                </div>
              <?php endif;?>

				    </div>
			    </section>

	 	<?php endif; ?>
	 <?php wp_reset_postdata(); ?>

	<?php the_content();?>

<?php get_footer();