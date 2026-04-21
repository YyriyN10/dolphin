<?php
	/**
	 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
	 */
?>

<?php

	$blockAttr = get_block_wrapper_attributes();
	$context = isset( $block->context ) && is_array( $block->context ) ? $block->context : [];

	$class = get_block_wrapper_attributes(["class" => 'item-card']);

?>

<div <?php echo $class;?> >

  <?php if( !empty($attributes['itemName']) ):?>
    <h3 class="card-title">
	    <?php echo $attributes['itemName'];?>
    </h3>
  <?php endif;?>

	<?php if( !empty($attributes['innerList']) ):?>
    <ul class="inner-list">
	    <?php echo $attributes['innerList'];?>
    </ul>
	<?php endif;?>
</div>



