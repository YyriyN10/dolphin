<?php


	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'dolphincargo_block_blog' );

	function dolphincargo_block_blog(){
		Block::make( __( 'Blog block' ) )
		     ->add_fields( array(
			     Field::make_text('dolphincargo_block_blog_title', 'Заголовок блоку'),
			     Field::make_association('dolphincargo_block_blog_link', 'Посилання на сторінку блогу')
				     ->set_types( array(
					     array(
						     'type'      => 'post',
						     'post_type' => 'page',
					     )
				     ) ),

		     ) )

		     ->set_category( 'dolphincargo-common-category' )
		     ->set_icon('welcome-write-blog')

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

			     <!-- Блог -->
			     <?php
			     $blogArgs = array(
				     'posts_per_page' => 3,
				     'orderby' 	 => 'date',
				     'post_type'  => 'blog',
				     'post_status' => 'publish'
			     );

			     $blogList = new WP_Query( $blogArgs );

			     if ( $blogList->have_posts() ) :?>
				     <?php if ( $fields['dolphincargo_block_blog_title'] ):?>
					     <section class="blog-block indent-top-small indent-bottom-small" >
						     <?php get_template_part('template-parts/decor-lines');?>
                 <div class="light">
                   <img src="<?php echo THEME_PATH;?>/assets/img/blog-block-light.png" alt="<?php echo get_bloginfo('name');?>">
                 </div>
						     <div class="container-fluid">
							     <div class="row">
								     <h2 class="block-title small-title col-12 text-center"><?php echo $fields['dolphincargo_block_blog_title'];?></h2>
							     </div>
							     <div class="row content">
								     <?php while ( $blogList->have_posts() ) : $blogList->the_post(); ?>
									     <a href="<?php the_permalink();?>" class="blog-post col-lg-4 col-sm-6">
										     <span class="inner">
											     <span class="blog-post__image">
												     <img
													     src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'full')[0];?>"
													     <?php
														     $altText = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);

														     if( !empty( $altText ) ):?>
															     alt="<?php echo $altText;?>"
														     <?php else:?>
															     alt="<?php the_title();?>"
														     <?php endif;?>
												     >
											     </span>
											     <span class="blog-post__title"><?php the_title();?></span>
											     <span class="description">
												     <?php echo get_the_excerpt();?>
											     </span>
										     </span>
									     </a>
								     <?php endwhile;?>
							     </div>
							     <?php if( $fields['dolphincargo_block_blog_link'] ):?>
								     <div class="row button-wrapper">
									     <div class="col-12 text-center">
										     <?php foreach( $fields['dolphincargo_block_blog_link'] as $link ):?>
											     <a href="<?php get_the_permalink( $link['id']);?>" class="button blue-btn"><?php echo esc_html( pll__( 'Читати блог' ) ); ?></a>
										     <?php endforeach;?>
									     </div>
								     </div>
							     <?php endif;?>
						     </div>
					     </section>
				     <?php endif;?>
			     <?php endif; ?>
			     <?php wp_reset_postdata(); ?>

			     <?php
		     } );
	}
