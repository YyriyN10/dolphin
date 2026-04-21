<?php
	/**
	 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
	 */
?>

<?php

	$blockAttr = get_block_wrapper_attributes();
	$context = isset( $block->context ) && is_array( $block->context ) ? $block->context : [];

	$class = get_block_wrapper_attributes(["class" => 'slide']);

	if(!empty($attributes['itemTeg'])){
		$class = get_block_wrapper_attributes(["class" => 'slide special']);
	}

?>

<div <?php echo $class;?> >
  <div class="slide-inner">
	  <?php if( !empty($attributes['itemTeg']) ):?>
      <p class="teg"><?php echo $attributes['itemTeg'];?></p>
	  <?php endif;?>
	  <?php if( !empty($attributes['itemIcon']) ):?>
      <div class="icon-wrapper">
        <img class="svg-pic" src="<?php echo $attributes['itemIcon'];?>" alt="<?php echo wp_strip_all_tags($attributes['itemName']);?>">
      </div>
	  <?php endif;?>
    <div class="text-part">
		  <?php if( !empty($attributes['itemName']) ):?>
        <h3 class="card-title">
				  <?php echo $attributes['itemName'];?>
        </h3>
		  <?php endif;?>
		  <?php if( !empty($attributes['itemDescription']) ):?>
        <p class="description"><?php echo $attributes['itemDescription'];?></p>
		  <?php endif;?>
		  <?php if( !empty($attributes['innerList']) ):?>
        <ul class="inner-list">
				  <?php echo $attributes['innerList'];?>
        </ul>
		  <?php endif;?>
    </div>
	  <?php if( !empty($attributes['btnText']) ):?>
      <div class="button orange-btn" data-toggle="modal" data-target="#formModal"><?php echo $attributes['btnText'];?></div>
	  <?php endif;?>
  </div>
</div>



