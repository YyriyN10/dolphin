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
      <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M9 18.5L15 12.5L9 6.5" stroke="#067FEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <span><?php echo $attributes['itemName'];?></span>
    </h3>
  <?php endif;?>

	<?php if( !empty($attributes['innerList']) ):?>
    <ul class="inner-list">
	    <?php echo $attributes['innerList'];?>
    </ul>
	<?php endif;?>
  <?php if( ($attributes['blockIndex'] + 1) < 10 ):?>
    <p class="card-number">0<?php echo $attributes['blockIndex'] + 1;?></p>
  <?php else:?>
    <p class="card-number"><?php echo $attributes['blockIndex'] + 1;?></p>
  <?php endif;?>


</div>



