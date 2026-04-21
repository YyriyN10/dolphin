<?php
	/**
	 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
	 */
?>

<?php

	$blockAttr = get_block_wrapper_attributes();
	$context = isset( $block->context ) && is_array( $block->context ) ? $block->context : [];

	$class = get_block_wrapper_attributes(["class" => 'card']);

?>

<div <?php echo $class;?> >
  <div class="card-header">
    <a class="collapsed card-link" data-toggle="collapse" href="#faq<?php echo $attributes['blockIndex'];?>">
			<?php echo $attributes['itemQuestion'];?>
      <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M18 9.5L12 15.5L6 9.5" stroke="#FBFBFB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </a>
  </div>
  <div id="faq<?php echo $attributes['blockIndex'];?>" class="collapse" data-parent="#accordion-faq">
    <div class="card-body">
			<?php echo $content;?>
    </div>
  </div>
</div>