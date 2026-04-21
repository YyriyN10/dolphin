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
          <div class="inner">
            <div class="text-wrapper">
		          <?php if( !empty($attributes['blockTitle'])):?>
                <h2 class="block-title-new"><?php echo $attributes['blockTitle'];?></h2>
		          <?php endif;?>
		          <?php if( !empty($attributes['blockList']) ):?>
                <ul class="get-list">
				          <?php echo $attributes['blockList'];?>
                </ul>
		          <?php endif;?>
            </div>
            <div class="gallery-wrapper">
		          <?php if( !empty($content) ):
			          $inner_blocks = $block->parsed_block['innerBlocks'] ?? [];
			          $count = count( $inner_blocks );
			          ?>
                <div class="slider <?php if( $count > 1){ echo 'trip-gallery-slider';} ?>">
				          <?php echo $content;?>
                </div>
		          <?php endif;?>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

<?php endif;?>


