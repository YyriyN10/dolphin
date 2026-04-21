<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>

<?php if( !empty($content) ):?>
	<?php
		$blockAttr = get_block_wrapper_attributes();

		$indent = '';

    if ($attributes['topRadius'] == 'Yes'){
      $indent = $indent.' radial-block';
    }

    if ( !empty($attributes['backgroundType'])){
      $indent = $indent.' '.$attributes['backgroundType'];
    }

	if ( !empty( $attributes['topIndent']) || !empty( $attributes['bottomIndent']) ){
		$indent = $indent.' '.$attributes['topIndent'].' '.$attributes['bottomIndent'];
  }

    $blockAttr = get_block_wrapper_attributes(["class" => $indent]);

	?>

	<section <?php echo $blockAttr; ?>
      <?php if( !empty($attributes['bloсkZindex']) ):?>
        style="z-index: <?php echo $attributes['bloсkZindex'];?>"
      <?php endif;?>
	>
		<?php echo $content; ?>
	</section>

<?php endif;?>


