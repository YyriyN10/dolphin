<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	add_action( 'wp_enqueue_scripts', 'green_system_ajax_data', 99 );
	function green_system_ajax_data(){

		wp_localize_script('dolphincargo-main-js', 'dolphincargo_ajax',
			array(
				'url' => admin_url('admin-ajax.php')
			)
		);

	}

	/**
	 * Reviews text modal
	 */

	add_action('wp_ajax_review_text_modal', 'review_text_modal_callback');
	add_action('wp_ajax_nopriv_review_text_modal', 'review_text_modal_callback');

	function review_text_modal_callback(){

		$reviewId = $_POST['reviewId'];

		?>

		<div class="inner">
			<div class="info">
				<div class="avatar">
					<img
						src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $reviewId ), 'full')[0];?>"
						<?php
							$altText = get_post_meta( get_post_thumbnail_id( $reviewId ), '_wp_attachment_image_alt', TRUE);

							if( !empty( $altText ) ):?>
								alt="<?php echo $altText;?>"
							<?php else:?>
								alt="<?php echo get_the_title( $reviewId );?>"
							<?php endif;?>
					>
				</div>
				<div class="name-position">
					<p class="name"><?php echo get_the_title( $reviewId );?></p>
					<?php
						$position = carbon_get_post_meta( $reviewId, 'dolphincargo_review_position'.dolphincargo_lang_prefix());

						if( !empty( $position ) ):?>
							<p class="position"><?php echo $position;?></p>
						<?php endif;?>

				</div>
			</div>
			<?php

				$content_no_filter = get_the_content(null, false, $reviewId );

				/*print_r(esc_html($content_no_filter), true);*/
				$content = apply_filters( 'the_content', $content_no_filter );
				echo $content;
				?>
		</div>

		<?php

		wp_reset_postdata();
		wp_die();
	}