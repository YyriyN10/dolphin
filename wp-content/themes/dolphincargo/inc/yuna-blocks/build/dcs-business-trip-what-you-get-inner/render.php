<?php
	/**
	 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
	 */
?>

<?php

	$blockAttr = get_block_wrapper_attributes();
	$context = isset( $block->context ) && is_array( $block->context ) ? $block->context : [];

	$class = get_block_wrapper_attributes(["class" => 'slide']);

?>

<div <?php echo $class;?> >
  <div class="image-wrapper">
    <img
        loading="lazy"
        src="<?php echo wp_get_attachment_image_src($attributes['itemImageId'], 'full')[0];?>"
      <?php
        $altText = get_post_meta($attributes['itemImageId'], '_wp_attachment_image_alt', TRUE);
        if ( !empty( $altText ) ):?>
          alt="<?php echo $altText;?>"
        <?php else:?>
          alt="<?php the_title();?>"
        <?php endif;?>
    >
  </div>
</div>



