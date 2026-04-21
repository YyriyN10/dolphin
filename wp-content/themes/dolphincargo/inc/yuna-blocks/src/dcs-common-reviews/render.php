<?php
	/**
	 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
	 */

	$reviewsArgs = array(
		'posts_per_page' => -1,
		'orderby' 	 => 'date',
		'post_type'  => 'reviews',
		'post_status' => 'publish'
	);

	$reviewsList = new WP_Query( $reviewsArgs );
?>

<?php if( !empty($attributes['blockTitle']) && $reviewsList->have_posts() ):?>
	<?php
    $blockAttr = get_block_wrapper_attributes();

    if ( !empty( $attributes['topIndent']) || !empty( $attributes['bottomIndent']) ){
      $indent = $attributes['topIndent'].' '.$attributes['bottomIndent'];

      if ($attributes['topRadius'] == 'Yes'){
        $indent = $indent.' radial-block';
      }

      if ($attributes['backgroundType'] == 'light-bg'){
        $indent = $indent.' light-bg';
      }

      $blockAttr = get_block_wrapper_attributes(["class" => $indent]);
    }
	?>

  <section <?php echo $blockAttr; ?>
	  <?php if( !empty($attributes['anchorId']) ):?>
      id="<?php echo $attributes['anchorId'];?>"
	  <?php endif;?>
	  <?php if( !empty($attributes['bloсkZindex']) ):?>
      style="z-index: <?php echo $attributes['bloсkZindex'];?>"
	  <?php endif;?>
  >
    <div class="container-fluid custom-container">
      <div class="row">
	      <?php if( !empty($attributes['blockTitle'])):?>
          <h2 class="block-title-new text-center col-12"><?php echo $attributes['blockTitle'];?></h2>
	      <?php endif;?>
      </div>
      <div class="row">
        <div class="reviews__slider-wrapper col-12">
          <div class="reviews__slider new-reviews">
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
			    <?php get_template_part('template-parts/slider-navigation-no-wrapper');?>
        </div>
      </div>
    </div>
  </section>

<?php endif;?>


