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
<footer class="site-footer new-footer">
	<div class="container-fluid custom-container">
		<div class="row">
			<div class="content col-12">

        <div class="form-contacts">
	        <?php if( is_front_page() ):?>
            <div class="logo">
              <img src="<?php echo carbon_get_theme_option('dolphincargo_option_logo');?>" alt="<?php echo get_bloginfo('name');?>">
            </div>
	        <?php else:?>
            <a href="<?php echo get_home_url('/');?>" class="logo">
              <img src="<?php echo carbon_get_theme_option('dolphincargo_option_logo');?>" alt="<?php echo get_bloginfo('name');?>">
            </a>
	        <?php endif;?>
          <div class="heading">
            <h2 class="form-title"><?php echo esc_html( pll__( 'Є питання?' ) ); ?></h2>
            <p class="form-call"><?php echo esc_html( pll__( 'Залиште заявку і наш менеджер зв’яжеться з вами! ' ) ); ?></p>
          </div>
          <form action="">
            <input type="hidden" name="action" value="contact_form">
		        <?php
			        $currentPageLang = ICL_LANGUAGE_CODE;

			        $thxPageUrl = '';

			        if ( $currentPageLang == 'uk' && !empty(carbon_get_theme_option('dolphincargo_option_form_thx_page_ua')) ){

				        $thxPageUrl = carbon_get_theme_option('dolphincargo_option_form_thx_page_ua')[0]['id'];

			        }

			        if ( $currentPageLang == 'ru' && !empty(carbon_get_theme_option('dolphincargo_option_form_thx_page_ru'))){
				        $thxPageUrl = carbon_get_theme_option('dolphincargo_option_form_thx_page_ru')[0]['id'];
			        }

			        if ( $currentPageLang == 'en' && !empty(carbon_get_theme_option('dolphincargo_option_form_thx_page_en'))){
				        $thxPageUrl = carbon_get_theme_option('dolphincargo_option_form_thx_page_en')[0]['id'];
			        }

			        if ( $thxPageUrl == '' ){
				        $thxPageUrl = get_site_url('/').'/thx';
			        }else{
				        $thxPageUrl = get_permalink($thxPageUrl);
			        }

			        $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		        ?>

            <input type="hidden" name="thx-target" value="<?php echo base64_encode($thxPageUrl);;?>">
            <!--<input type="hidden" name="page-url" value="<?php /*the_permalink();*/?>">-->
            <input type="hidden" name="page-url" value="<?php echo $actual_link;?>">

            <input type="hidden" name="page-name" value="<?php the_title();?>">
            <input type="hidden" name="g-recaptcha-response" class="recaptchaResponse">
            <div class="form-group">
              <label>
                <p class="label-text"><?php echo esc_html( pll__( 'Як до вас звертатись?' ) ); ?><span>*</span></p>
                <input type="text" name="name" class="form-control" placeholder="<?php echo esc_html( pll__( 'Ім’я' ) ); ?>" required>
              </label>
            </div>
            <div class="form-group">
              <label>
                <p class="label-text"><?php echo esc_html( pll__( 'Номер телефону' ) ); ?><span>*</span></p>
                <input type="tel" name="phone" class="form-control" placeholder="+380" required>
              </label>
            </div>
            <div class="form-group">
              <label>
                <p class="label-text">Email<span>*</span></p>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
              </label>

            </div>
            <div class="form-group textarea-group">
              <label>
                <p class="label-text"><?php echo esc_html( pll__( 'Ваш коментар' ) ); ?></p>
                <textarea name="message" class="form-control"></textarea>
              </label>

            </div>

            <button type="submit" class="button orange-btn"><?php echo esc_html( pll__( 'Надіслати заявку' ) ); ?></button>
          </form>
          <div class="contacts-wrapper">
            <div class="menu-contacts menu-address">
              <h3 class="contact-name"><?php echo esc_html( pll__( 'Адреса' ) ); ?></h3>
              <p class="address"><?php echo carbon_get_theme_option('dolphincargo_option_rial_address'.dolphincargo_lang_prefix());?></p>
            </div>
		        <?php get_template_part('template-parts/phone');?>
		        <?php get_template_part('template-parts/email');?>
		        <?php get_template_part('template-parts/social-wrapper');?>
          </div>
        </div>
				<?php
					$footerImage = carbon_get_theme_option('new_footer_image');
					if( !empty($footerImage) ):?>
            <div class="footer-image">
              <div class="image-wrapper">
								<?php echo wp_get_attachment_image($footerImage, 'full');?>
              </div>
            </div>
					<?php endif;?>
			</div>
		</div>
		<div class="row">
			<div class="copy-wrapper col-12">
				<p class="copy">Copyright © Dolphin Cargo <?php echo date('Y');?></p>
				<?php if( is_front_page() ):?>
					<div class="logo">
						<img src="<?php echo carbon_get_theme_option('dolphincargo_option_logo');?>" alt="<?php echo get_bloginfo('name');?>">
					</div>
				<?php else:?>
					<a href="<?php echo get_home_url('/');?>" class="logo">
						<img src="<?php echo carbon_get_theme_option('dolphincargo_option_logo');?>" alt="<?php echo get_bloginfo('name');?>">
					</a>
				<?php endif;?>
				<?php
					$privacyLinkUa = carbon_get_theme_option('privacy_ua_page');
					$privacyLinkRu = carbon_get_theme_option('privacy_ru_page');

					$currentLang = dolphincargo_lang_prefix();

					if( $currentLang == '_uk' && !empty($privacyLinkUa )):?>
						<a href="<?php echo get_permalink($privacyLinkUa[0]['id']);?>" class="privacy">
							<?php echo get_the_title($privacyLinkUa[0]['id']);?>
						</a>
					<?php endif;?>
				<?php if( $currentLang == '_ru' && !empty($privacyLinkRu ) ):?>
					<a href="<?php echo get_permalink($privacyLinkRu[0]['id']);?>" class="privacy">
						<?php echo get_the_title($privacyLinkRu[0]['id']);?>
					</a>
				<?php endif;?>
			</div>
		</div>
		<!--<div class="row">
        <div class="content col-12">
          <div class="menu-contacts menu-address">
            <h3 class="contact-name"><?php /*echo esc_html( pll__( 'Адреса' ) ); */?></h3>
            <p class="address"><?php /*echo carbon_get_theme_option('dolphincargo_option_rial_address'.dolphincargo_lang_prefix());*/?></p>
          </div>
			    <?php /*get_template_part('template-parts/phone');*/?>
			    <?php /*get_template_part('template-parts/email');*/?>
			    <?php /*get_template_part('template-parts/social-wrapper');*/?>
        </div>
      </div>-->
	</div>
</footer>
<?php get_template_part('template-parts/popup');?>
</div>

<?php wp_footer(); ?>
<script src="https://www.google.com/recaptcha/api.js?render=6LeJTiYsAAAAAOwtVqoNv2ARZgNA4MOjSXXyMF6v"></script>
<script>
  grecaptcha.ready(function() {
    grecaptcha.execute('6LeJTiYsAAAAAOwtVqoNv2ARZgNA4MOjSXXyMF6v', {action: 'contact_form'})
      .then(function(token) {

        const recaptchaElementsList = document.getElementsByClassName('recaptchaResponse');

        for (let i = 0; i < recaptchaElementsList.length; i++) {
          recaptchaElementsList[i].value = token;
        }
      });
  });
</script>

</body>
</html>
