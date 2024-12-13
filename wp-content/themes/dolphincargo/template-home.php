<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Шаблон головної сторінки
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package dolphincargo
	 *
	 */

	get_header();?>

  <?php the_content();?>

	<?php
	    $homeMainScreenTitle = carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_main_screen_title'.dolphincargo_lang_prefix());
			$homeMainScreenWhoAre= carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_main-screen_who_are_we'.dolphincargo_lang_prefix());
			$homeMainScreenSlogan = carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_main-screen_slogan'.dolphincargo_lang_prefix());
			$homeMainScreenBg = carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_main-screen_image'.dolphincargo_lang_prefix());

	    if( $homeMainScreenTitle && $homeMainScreenBg ):?>
	    <!-- головний екран -->
	    <section class="main-screen homr main-screen" style="background-image: url(<?php echo $homeMainScreenBg;?>)">
	      <div class="container">
	        <div class="row">
	          <div class="content col-12">
	            <h1 class="main-title"><?php echo $homeMainScreenTitle;?></h1>
		          <?php if( $homeMainScreenWhoAre ):?>
			          <p class="who-are"><?php echo $homeMainScreenWhoAre;?></p>
		          <?php endif;?>
		          <?php if( $homeMainScreenSlogan ):?>
			          <p class="slogan"><?php echo $homeMainScreenSlogan;?></p>
		          <?php endif;?>
		          <a href="" rel="nofollow" class="button">
			          <?php echo esc_html( pll__( 'Отримати консультацію' ) ); ?>
		          </a>
	          </div>
	        </div>
	      </div>
	    </section>
	<?php endif;?>

  <!--<a href="" rel="nofollow" class="button arrow-btn">
		<?php /*echo esc_html( pll__( 'Дізнатись більше' ) ); */?>
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M19 12L13 18M19 12L13 6M19 12L5 12" stroke="#1D255C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
  </a>-->

	<?php
	    $homeOurNumbersList = carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_our_numbers_list'.dolphincargo_lang_prefix());

	    if( $homeOurNumbersList ):?>
	    <!-- Наші числа -->
	    <section class="home-our-numbers">
	      <div class="container">
	        <div class="row">
	          <div class="content col-12">
		          <?php foreach( $homeOurNumbersList as $item ):?>
			          <div class="item">
									<p class="number-full">
										<span class="number"><?php echo $item['number'];?></span>
										<?php if( $item['number_more'] ):?>
											<span class="number-more"><?php echo $item['number_more'];?></span>
										<?php endif;?>
									</p>
				          <p class="description"><?php echo $item['description'];?></p>
			          </div>
		          <?php endforeach;?>
	          </div>
	        </div>
	      </div>
	    </section>
	<?php endif;?>

	<?php
	    $homeWhatweProvide = carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_what_we_provide_list'.dolphincargo_lang_prefix());

	    if( $homeWhatweProvide  ):?>
	    <!-- Що надаємо -->
	    <section class="home-what-we-provide">
	      <div class="container">
	        <div class="row">
	          <div class="content col-12">
		          <?php foreach( $homeWhatweProvide as $item ):?>
			          <div class="item">
				          <img src="<?php echo $item['image'];?>" alt="" class="svg-pic">
									<p class="provide-text"><?php echo $item['text'];?></p>
			          </div>
		          <?php endforeach;?>
	          </div>
	        </div>
	      </div>
	    </section>
	<?php endif;?>

  <?php
      $homeOurServicesTittle = carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_our_services_title'.dolphincargo_lang_prefix());
	    $homeOurServicesList = carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_our_services_list'.dolphincargo_lang_prefix());

      if( $homeOurServicesList && $homeOurServicesTittle):?>
      <!-- Наші послуги -->
      <section class="home-page-our-services">
        <div class="container">
          <div class="row">
            <h2 class="block-title col-12"><?php echo $homeOurServicesTittle;?></h2>
          </div>
          <div class="row">
            <?php foreach( $homeOurServicesList as $item ):?>
              <a href="<?php echo $item['link'];?>" class="content col-md-6 col-12">
                <span class="service-pic-preview">
                  <img
                     class="lazy"
                     data-src="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0];?>"
                     alt="<?php echo get_post_meta($item['image'], '_wp_attachment_image_alt', TRUE);?>"
                  >
                </span>
                <span class="service-name"><?php echo $item['name'];?></span>
                <span class="description"><?php echo $item['description'];?></span>
                <span class="button"><?php echo esc_html( pll__( 'Дізнатись більше' ) ); ?></span>
              </a>
            <?php endforeach;?>
          </div>
        </div>
      </section>
  <?php endif;?>

  <?php
      $homeCallToActiontitle = carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_call_to_action_title'.dolphincargo_lang_prefix());
	    $homeCallToActiontext = carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_call_to_action_text'.dolphincargo_lang_prefix());

      if( $homeCallToActiontext && $homeCallToActiontitle ):?>
      <!-- Заклик до дії --->
      <section class="home-call-to-action">
        <div class="container">
          <div class="row">
            <div class="content col-12">
              <h2 class="block-title"><?php echo $homeCallToActiontitle;?></h2>
              <p class="call-text"><?php echo $homeCallToActiontext;?></p>
              <a href="" rel="nofollow" class="button"><?php echo esc_html( pll__( 'Залишити заявку' ) ); ?></a>
            </div>
          </div>
        </div>
      </section>
  <?php endif;?>

  <?php
      $homeAboutUsTitle = carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_about_us_title'.dolphincargo_lang_prefix());
	    $homeAboutUsText= carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_about_us_text'.dolphincargo_lang_prefix());
	    $homeAboutUsImage = carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_about_us_image'.dolphincargo_lang_prefix());
	    $homeAboutUsLink = carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_about_us_link'.dolphincargo_lang_prefix());

      if( $homeAboutUsImage && $homeAboutUsText && $homeAboutUsTitle ):?>
      <!-- Про нас -->
      <section class="home-about-us">
        <div class="container">
          <div class="row">
            <div class="text-content col-lg-6">
              <h2 class="block-title"><?php echo $homeAboutUsTitle;?></h2>
              <div class="text"><?php echo wpautop( $homeAboutUsText);?></div>
              <?php if( $homeAboutUsLink ):?>
                <a href="<?php echo $homeAboutUsLink;?>" class="button"><?php echo esc_html( pll__( 'Більше про нас' ) ); ?>/a>
              <?php endif;?>
            </div>
            <div class="image-wrapper col-lg-6">
              <img
                 class="lazy"
                 data-src="<?php echo wp_get_attachment_image_src($homeAboutUsImage, 'full')[0];?>"
                 alt="<?php echo get_post_meta($homeAboutUsImage, '_wp_attachment_image_alt', TRUE);?>"
              >
            </div>
          </div>
        </div>
      </section>
  <?php endif;?>

  <?php
      $homeAdvantagesTitle = carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_advantages_title'.dolphincargo_lang_prefix());
	    $homeAdvantagesList = carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_advantages_list'.dolphincargo_lang_prefix());

      if( $homeAdvantagesTitle && $homeAdvantagesList):?>
      <!-- Переваги -->
      <section class="home-advantages">
        <div class="container">
          <div class="row">
            <h2 class="block-title col-12"><?php echo $homeAdvantagesTitle;?></h2>
          </div>
          <div class="row">
            <?php foreach( $homeAdvantagesList as $item ):?>
              <div class="home-advantages__item col-12">
                <div class="inner">
                  <div class="icon">
                    <img src="<?php echo $item['image'];?>" alt="" class="svg-pic">
                  </div>
                  <p class="name"><?php echo $item['name'];?></p>
                  <p class="description"><?php echo $item['description'];?></p>
                </div>
              </div>
            <?php endforeach;?>
          </div>
        </div>
      </section>
  <?php endif;?>

  <?php get_template_part('template-parts/block-reviews');?>

  <?php
      $calculatorTitle = carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_calculator_title'.dolphincargo_lang_prefix());
	    $calculatorSubitle = carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_calculator_title'.dolphincargo_lang_prefix());

      if( $calculatorSubitle && $calculatorTitle ):?>
      <!-- Калькулятор -->
      <section class="calculator">
        <div class="container">
          <div class="row">
            <h2 class="block-title col-12"><?php echo $calculatorTitle;?></h2>
            <p class="subtitle col-12"><?php echo $calculatorSubitle;?></p>
          </div>
        </div>
      </section>
  <?php endif;?>

<?php
  $faqTitle = carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_faq_title'.dolphincargo_lang_prefix());
	$faqList = carbon_get_post_meta(get_the_ID(), 'dolphincargo_home_page_faq_list'.dolphincargo_lang_prefix());

	if ( $faqTitle && $faqList ){

	  $faqContent = array(
		  'title' => $faqTitle,
		  'question-list' => $faqList
    );

	  get_template_part('template-parts/block-faq');

  }
?>

<?php get_template_part('template-parts/block-inner-blog');?>

<?php get_footer();
