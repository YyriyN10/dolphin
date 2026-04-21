<?php
	/**
	 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
	 */

	$selectedPosts = $attributes['postsList'] ?? [];

	if (!empty($selectedPosts)){
		$blogArgs = array(
			'posts_per_page' => -1,
			'post__in'       => $selectedPosts,
			'orderby' 	 => 'post__in',
			'post_type'  => 'post',
			'post_status' => 'publish'
		);

  }else{
		$blogArgs = array(
			'posts_per_page' => 3,
			'orderby' 	 => 'date',
			'post_type'  => 'post',
			'post_status' => 'publish'
		);
  }


	$blogList = new WP_Query( $blogArgs );

	$postsCount = $blogList->post_count;
?>

<?php if( !empty($attributes['blockTitle']) && $blogList->have_posts() ):?>
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
        <div class="slider-wrapper col-12 <?php if( $postsCount > 3){ echo 'slider-start';}elseif ($postsCount == 3){echo 'slider-basic';}elseif ($postsCount == 2){echo 'slider-mobile';}?>">
          <div class="slider">
	          <?php while ( $blogList->have_posts() ) : $blogList->the_post(); ?>
              <div class="blog-post">
                <div class="inner">
                  <a href="<?php the_permalink();?>" class="blog-post__image">
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
                  </a>
                  <h3 class="blog-post__title">
                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                  </h3>
                  <a href="<?php the_permalink();?>" class="blog-post__description">
					          <?php
						          $excerpt = mb_substr( get_the_excerpt(), 0, 150) . '...';
						          echo $excerpt;
					          ?>
                  </a>
                </div>
              </div>
              </a>
	          <?php endwhile;?>
          </div>
          <?php get_template_part('template-parts/slider-navigation-no-wrapper');?>
        </div>
      </div>
	    <?php
		    $blogLinkUa = carbon_get_theme_option('blog_ua_page');
		    $blogLinkRu = carbon_get_theme_option('blog_ru_page');

		    $currentLang = dolphincargo_lang_prefix();

		    if( $currentLang == '_uk' && !empty($blogLinkUa )):?>
          <div class="row button-wrapper">
            <div class="col-12 text-center">
              <a href="<?php echo get_permalink($blogLinkUa[0]['id']);?>" class="button white-btn">
                <?php echo esc_html( pll__( 'Читати блог' ) ); ?>
              </a>
            </div>
          </div>
		    <?php endif;?>
	    <?php if( $currentLang == '_ru' && !empty($blogLinkRu ) ):?>
        <div class="row button-wrapper">
          <div class="col-12 text-center">
            <a href="<?php echo get_permalink($blogLinkRu[0]['id']);?>" class="button white-btn">
              <?php echo esc_html( pll__( 'Читати блог' ) ); ?>
            </a>
          </div>
        </div>
	    <?php endif;?>
    </div>
  </section>
<?php endif;?>


