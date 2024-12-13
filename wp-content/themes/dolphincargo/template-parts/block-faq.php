<?php
		if ( ! defined( 'ABSPATH' ) ) {
			exit;
		}
	 ?>
	    <!-- Питання та відповіді -->
	    <section class="block-faq">
	      <div class="container">
	        <div class="row">
	          <h2 class="block-title col-12"><?php echo $args['title'];?></h2>
	        </div>
	        <div class="row">
	          <div class="content col-12">
		          <?php foreach( $args['question-list'] as $item ):?>
		          <?php endforeach;?>
	          </div>
	        </div>
	      </div>
	    </section>

