<?php
	/**
	 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
	 */
?>

<?php

	$blockAttr = get_block_wrapper_attributes();
	$context = isset( $block->context ) && is_array( $block->context ) ? $block->context : [];

	$class = get_block_wrapper_attributes(["class" => 'item']);

?>

<li <?php echo $class;?> class="item" >
  <?php if( !empty($attributes['itemIcon']) ):?>
    <div class="icon-wrapper">
      <img class="svg-pic" src="<?php echo $attributes['itemIcon'];?>" alt="<?php echo wp_strip_all_tags($attributes['itemDescription']);?>">
    </div>
  <?php endif;?>

	<?php if( !empty($attributes['itemDescription']) ):?>
    <p class="description"><?php echo $attributes['itemDescription'];?></p>
	<?php endif;?>

</li>



