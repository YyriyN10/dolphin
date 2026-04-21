<?php
	/**
	 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
	 */
?>

<?php if( !empty($attributes['blockTitle']) ):?>
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
        <div class="content col-12">
          <div class="heading text-center">
	          <?php if( !empty($attributes['blockTitle'])):?>
              <h2 class="block-title-new-big"><?php echo $attributes['blockTitle'];?></h2>
	          <?php endif;?>
            <?php if( !empty($attributes['blockSubtitle']) ):?>
              <p class="subtitle"><?php echo $attributes['blockSubtitle'];?></p>
            <?php endif;?>
	          <?php if( !empty($attributes['bgImageId']) ):?>
              <div class="block-image-wrapper">
                <img loading="lazy"
                    src="<?php echo wp_get_attachment_image_src($attributes['bgImageId'], 'full')[0];?>"
				          <?php
					          $altText = get_post_meta($attributes['bgImageId'], '_wp_attachment_image_alt', TRUE);
					          if ( !empty( $altText ) ):?>
                      alt="<?php echo $altText;?>"
					          <?php else:?>
                      alt="<?php echo wp_strip_all_tags($attributes['blockTitle']);?>"
					          <?php endif;?>
                >
              </div>
	          <?php endif;?>
          </div>
        </div>
      </div>
    </div>

	  <?php if( !empty($content) ):?>
      <div class="scroll-viewport">
        <div class="container-fluid custom-container">
          <div class="row">
            <div class="cards-wrapper col-12">
              <div class="scroll-container">
                <div class="inner-container">
								  <?php echo $content;?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	  <?php endif;?>

  </section>

<?php endif;?>


