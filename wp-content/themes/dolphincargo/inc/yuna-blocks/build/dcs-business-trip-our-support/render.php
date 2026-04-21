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
    }

	$customCslasses = '';

	if ($attributes['topRadius'] == 'Yes'){
		$customCslasses = $customCslasses.' radial-block';
	}

	if ($attributes['backgroundType'] == 'light-bg'){
		$customCslasses = $customCslasses.' light-bg';
	}

	$blockAttr = get_block_wrapper_attributes(["class" => $customCslasses]);
	?>

  <section <?php echo $blockAttr; ?>
	  <?php if( !empty($attributes['anchorId']) ):?>
      id="<?php echo $attributes['anchorId'];?>"
	  <?php endif;?>
	  <?php if( !empty($attributes['bloсkZindex'])):?>
      style="z-index: <?php echo $attributes['bloсkZindex'];?>;"
	  <?php endif;?>
  >
    <div class="main-container <?php echo $indent;?>"
	    <?php if( !empty($attributes['bgImageUrl']) ):?>
        style="background-image: url(<?php echo $attributes['bgImageUrl'];?>)"
	    <?php endif;?>
    >
      <div class="container-fluid custom-container">
        <div class="row">
          <div class="content col-12">
				    <?php if( !empty($attributes['blockTitle'])):?>
              <div class="title-wrapper">
                <h2 class="block-title-new"><?php echo $attributes['blockTitle'];?></h2>
              </div>
				    <?php endif;?>
				    <?php if( !empty($content) ):?>
              <div class="cards-wrapper">
						    <?php echo $content;?>
              </div>
				    <?php endif;?>
          </div>
        </div>
      </div>
    </div>

    <?php if( !empty($attributes['bgImageId']) ):?>
      <div class="block-image-wrapper">
        <picture>
          <source media="(min-width: 768px)" srcset="<?php echo $attributes['staticBottomImageUrl'];?>">
          <source media="(min-width: 200px)" srcset="<?php echo $attributes['mobImageUrl'];?>">
          <img
              loading="lazy"
              src="<?php echo wp_get_attachment_image_src($attributes['staticBottomImageId'], 'full')[0];?>"
		        <?php
			        $altText = get_post_meta($attributes['staticBottomImageId'], '_wp_attachment_image_alt', TRUE);
			        if ( !empty( $altText ) ):?>
                alt="<?php echo $altText;?>"
			        <?php else:?>
                alt="<?php echo wp_strip_all_tags($attributes['blockTitle']);?>"
			        <?php endif;?>
          >
        </picture>

      </div>
    <?php endif;?>

  </section>

<?php endif;?>


