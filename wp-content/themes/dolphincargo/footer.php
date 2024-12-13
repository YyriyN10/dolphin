<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dolphincargo
 */

?>
  </main>
	<footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="content col-12">
          <!--<form class="contact-form">
            <div class="mb-3 mt-3">
              <input type="text" class="form-control" placeholder="<?php /*echo esc_html( pll__( 'Ім’я' ) ); */?>" name="name" required>
            </div>
            <div class="mb-3 mt-3">
              <input type="tel" class="form-control" placeholder="Email" name="phone" required>
            </div>
            <div class="mb-3 mt-3">
              <input type="email" class="form-control" placeholder="Email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="pwd" class="form-label">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            </div>
            <button type="submit" class="btn btn-primary"><?php /*echo esc_html( pll__( 'Надіслати заявку' ) ); */?></button>
          </form>-->
          <div class="contacts-wrapper">
            <div class="contacts-list">
              <p class="address"><?php echo carbon_get_theme_option('dolphincargo_option_rial_address'.dolphincargo_lang_prefix());?></p>
	            <?php get_template_part('template-parts/phone');?>
	            <?php get_template_part('template-parts/email');?>
            </div>
            <?php get_template_part('template-parts/social-wrapper');?>
          </div>
        </div>
      </div>
    </div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
