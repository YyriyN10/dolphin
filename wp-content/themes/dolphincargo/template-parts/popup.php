<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	?>

<!-- Form Modal -->
<div class="modal form-modal" id="formModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
        <div class="image">
          <img src="<?php echo THEME_PATH;?>/assets/img/logo.png" alt="<?php echo get_bloginfo('name');?>">
        </div>
				<h4 class="modal-title"><?php echo esc_html( pll__( 'Залиште заявку і наш менеджер зв’яжеться з вами!' ) ); ?></h4>
				<button type="button" class="close" data-dismiss="modal">
          <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="0.5" y="0.5" width="39" height="39" rx="3.5" stroke="#FBFBFB" stroke-opacity="0.2"/>
            <path d="M14.2249 12.811C14.0363 12.6288 13.7837 12.528 13.5215 12.5303C13.2593 12.5326 13.0085 12.6378 12.8231 12.8232C12.6377 13.0086 12.5325 13.2594 12.5303 13.5216C12.528 13.7838 12.6288 14.0364 12.8109 14.225L18.5859 20L12.8099 25.775C12.7144 25.8672 12.6382 25.9776 12.5858 26.0996C12.5334 26.2216 12.5058 26.3528 12.5047 26.4856C12.5035 26.6184 12.5288 26.75 12.5791 26.8729C12.6294 26.9958 12.7036 27.1075 12.7975 27.2014C12.8914 27.2953 13.0031 27.3695 13.126 27.4198C13.2489 27.4701 13.3805 27.4954 13.5133 27.4942C13.6461 27.4931 13.7773 27.4655 13.8993 27.4131C14.0213 27.3607 14.1317 27.2845 14.2239 27.189L19.9999 21.414L25.7749 27.189C25.9635 27.3711 26.2161 27.4719 26.4783 27.4697C26.7405 27.4674 26.9913 27.3622 27.1767 27.1768C27.3622 26.9914 27.4673 26.7406 27.4696 26.4784C27.4719 26.2162 27.3711 25.9636 27.1889 25.775L21.4139 20L27.1889 14.225C27.3711 14.0364 27.4719 13.7838 27.4696 13.5216C27.4673 13.2594 27.3622 13.0086 27.1767 12.8232C26.9913 12.6378 26.7405 12.5326 26.4783 12.5303C26.2161 12.528 25.9635 12.6288 25.7749 12.811L19.9999 18.586L14.2249 12.81V12.811Z" fill="#067FEF"/>
          </svg>
        </button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
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


	        ?>

          <input type="hidden" name="thx-target" value="<?php echo base64_encode($thxPageUrl);;?>">
          <input type="hidden" name="page-url" value="<?php the_permalink();?>">
          <input type="hidden" name="page-name" value="<?php the_title();?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="<?php echo esc_html( pll__( 'Ім’я' ) ); ?>" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="+380" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
          </div>

          <button type="submit" class="button blue-btn"><?php echo esc_html( pll__( 'Надіслати заявку' ) ); ?></button>
        </form>
			</div>

		</div>
	</div>
</div>

<!-- Video Modal -->
<div class="modal video-modal" id="videoModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="0.5" y="0.5" width="39" height="39" rx="3.5" stroke="#FBFBFB" stroke-opacity="0.2"/>
            <path d="M14.2249 12.811C14.0363 12.6288 13.7837 12.528 13.5215 12.5303C13.2593 12.5326 13.0085 12.6378 12.8231 12.8232C12.6377 13.0086 12.5325 13.2594 12.5303 13.5216C12.528 13.7838 12.6288 14.0364 12.8109 14.225L18.5859 20L12.8099 25.775C12.7144 25.8672 12.6382 25.9776 12.5858 26.0996C12.5334 26.2216 12.5058 26.3528 12.5047 26.4856C12.5035 26.6184 12.5288 26.75 12.5791 26.8729C12.6294 26.9958 12.7036 27.1075 12.7975 27.2014C12.8914 27.2953 13.0031 27.3695 13.126 27.4198C13.2489 27.4701 13.3805 27.4954 13.5133 27.4942C13.6461 27.4931 13.7773 27.4655 13.8993 27.4131C14.0213 27.3607 14.1317 27.2845 14.2239 27.189L19.9999 21.414L25.7749 27.189C25.9635 27.3711 26.2161 27.4719 26.4783 27.4697C26.7405 27.4674 26.9913 27.3622 27.1767 27.1768C27.3622 26.9914 27.4673 26.7406 27.4696 26.4784C27.4719 26.2162 27.3711 25.9636 27.1889 25.775L21.4139 20L27.1889 14.225C27.3711 14.0364 27.4719 13.7838 27.4696 13.5216C27.4673 13.2594 27.3622 13.0086 27.1767 12.8232C26.9913 12.6378 26.7405 12.5326 26.4783 12.5303C26.2161 12.528 25.9635 12.6288 25.7749 12.811L19.9999 18.586L14.2249 12.81V12.811Z" fill="#067FEF"/>
          </svg>
        </button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="video-wrapper">
          <div class="video"></div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Review Modal -->
<div class="modal review-modal" id="reviewModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <div class="image">
          <img src="<?php echo THEME_PATH;?>/assets/img/logo.png" alt="<?php echo get_bloginfo('name');?>">
        </div>
        <button type="button" class="close" data-dismiss="modal">
          <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="0.5" y="0.5" width="39" height="39" rx="3.5" stroke="#FBFBFB" stroke-opacity="0.2"/>
            <path d="M14.2249 12.811C14.0363 12.6288 13.7837 12.528 13.5215 12.5303C13.2593 12.5326 13.0085 12.6378 12.8231 12.8232C12.6377 13.0086 12.5325 13.2594 12.5303 13.5216C12.528 13.7838 12.6288 14.0364 12.8109 14.225L18.5859 20L12.8099 25.775C12.7144 25.8672 12.6382 25.9776 12.5858 26.0996C12.5334 26.2216 12.5058 26.3528 12.5047 26.4856C12.5035 26.6184 12.5288 26.75 12.5791 26.8729C12.6294 26.9958 12.7036 27.1075 12.7975 27.2014C12.8914 27.2953 13.0031 27.3695 13.126 27.4198C13.2489 27.4701 13.3805 27.4954 13.5133 27.4942C13.6461 27.4931 13.7773 27.4655 13.8993 27.4131C14.0213 27.3607 14.1317 27.2845 14.2239 27.189L19.9999 21.414L25.7749 27.189C25.9635 27.3711 26.2161 27.4719 26.4783 27.4697C26.7405 27.4674 26.9913 27.3622 27.1767 27.1768C27.3622 26.9914 27.4673 26.7406 27.4696 26.4784C27.4719 26.2162 27.3711 25.9636 27.1889 25.775L21.4139 20L27.1889 14.225C27.3711 14.0364 27.4719 13.7838 27.4696 13.5216C27.4673 13.2594 27.3622 13.0086 27.1767 12.8232C26.9913 12.6378 26.7405 12.5326 26.4783 12.5303C26.2161 12.528 25.9635 12.6288 25.7749 12.811L19.9999 18.586L14.2249 12.81V12.811Z" fill="#067FEF"/>
          </svg>
        </button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

      </div>

    </div>
  </div>
</div>

<!-- Calculator Modal -->
<div class="modal calculator-modal" id="calculatorModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <div class="image">
          <img src="<?php echo THEME_PATH;?>/assets/img/logo.png" alt="<?php echo get_bloginfo('name');?>">
        </div>
        <h4 class="modal-title"><?php echo esc_html( pll__( 'Розрахунок обʼєму вантажу' ) ); ?></h4>
        <button type="button" class="close" data-dismiss="modal">
          <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="0.5" y="0.5" width="39" height="39" rx="3.5" stroke="#FBFBFB" stroke-opacity="0.2"/>
            <path d="M14.2249 12.811C14.0363 12.6288 13.7837 12.528 13.5215 12.5303C13.2593 12.5326 13.0085 12.6378 12.8231 12.8232C12.6377 13.0086 12.5325 13.2594 12.5303 13.5216C12.528 13.7838 12.6288 14.0364 12.8109 14.225L18.5859 20L12.8099 25.775C12.7144 25.8672 12.6382 25.9776 12.5858 26.0996C12.5334 26.2216 12.5058 26.3528 12.5047 26.4856C12.5035 26.6184 12.5288 26.75 12.5791 26.8729C12.6294 26.9958 12.7036 27.1075 12.7975 27.2014C12.8914 27.2953 13.0031 27.3695 13.126 27.4198C13.2489 27.4701 13.3805 27.4954 13.5133 27.4942C13.6461 27.4931 13.7773 27.4655 13.8993 27.4131C14.0213 27.3607 14.1317 27.2845 14.2239 27.189L19.9999 21.414L25.7749 27.189C25.9635 27.3711 26.2161 27.4719 26.4783 27.4697C26.7405 27.4674 26.9913 27.3622 27.1767 27.1768C27.3622 26.9914 27.4673 26.7406 27.4696 26.4784C27.4719 26.2162 27.3711 25.9636 27.1889 25.775L21.4139 20L27.1889 14.225C27.3711 14.0364 27.4719 13.7838 27.4696 13.5216C27.4673 13.2594 27.3622 13.0086 27.1767 12.8232C26.9913 12.6378 26.7405 12.5326 26.4783 12.5303C26.2161 12.528 25.9635 12.6288 25.7749 12.811L19.9999 18.586L14.2249 12.81V12.811Z" fill="#067FEF"/>
          </svg>
        </button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="pic-wrapper"></div>
        <div class="form-wrapper">
          <div class="calculator-wrapper">
            <div class="form-group">
              <input type="number" name="white" class="form-control" id="calc-white" placeholder="<?php echo esc_html( pll__( 'Ширина' ) ); ?>" required>
            </div>
            <div class="form-group">
              <input type="number" name="height" class="form-control" id="calc-height" placeholder="<?php echo esc_html( pll__( 'Висота' ) ); ?>" required>
            </div>
            <div class="form-group">
              <input type="number" name="length" class="form-control" id="calc-length" placeholder="<?php echo esc_html( pll__( 'Довжина' ) ); ?>" required>
            </div>
            <p class="calculator-result">Обʼєм вантажу: <span></span>м³</p>
            <div class="button blue-btn" id="open-form">
              <?php echo esc_html( pll__( 'Давайте мы просчитаем ваш груз' ) ); ?>
            </div>
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


		        ?>

            <input type="hidden" name="thx-target" value="<?php echo base64_encode($thxPageUrl);;?>">
            <input type="hidden" name="page-url" value="<?php the_permalink();?>">
            <input type="hidden" name="page-name" value="<?php the_title();?>">
            <input type="hidden" name="cargo-volume" id="cargo-volume" value="">
            <div class="form-group">
              <input type="text" name="name" class="form-control" placeholder="<?php echo esc_html( pll__( 'Ім’я' ) ); ?>" required>
            </div>
            <div class="form-group">
              <input type="tel" name="phone" class="form-control" placeholder="+380" required>
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>

            <button type="submit" class="button blue-btn"><?php echo esc_html( pll__( 'Надіслати заявку' ) ); ?></button>
          </form>
        </div>

      </div>

    </div>
  </div>
</div>

<!-- Calculator Type-1 Modal -->
<div class="modal form-modal" id="calculatorType1Modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <div class="image">
          <img src="<?php echo THEME_PATH;?>/assets/img/logo.png" alt="<?php echo get_bloginfo('name');?>">
        </div>
        <h4 class="modal-title"><?php echo esc_html( pll__( 'Розрахунок обʼєму вантажу' ) ); ?></h4>
        <button type="button" class="close" data-dismiss="modal">
          <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="0.5" y="0.5" width="39" height="39" rx="3.5" stroke="#FBFBFB" stroke-opacity="0.2"/>
            <path d="M14.2249 12.811C14.0363 12.6288 13.7837 12.528 13.5215 12.5303C13.2593 12.5326 13.0085 12.6378 12.8231 12.8232C12.6377 13.0086 12.5325 13.2594 12.5303 13.5216C12.528 13.7838 12.6288 14.0364 12.8109 14.225L18.5859 20L12.8099 25.775C12.7144 25.8672 12.6382 25.9776 12.5858 26.0996C12.5334 26.2216 12.5058 26.3528 12.5047 26.4856C12.5035 26.6184 12.5288 26.75 12.5791 26.8729C12.6294 26.9958 12.7036 27.1075 12.7975 27.2014C12.8914 27.2953 13.0031 27.3695 13.126 27.4198C13.2489 27.4701 13.3805 27.4954 13.5133 27.4942C13.6461 27.4931 13.7773 27.4655 13.8993 27.4131C14.0213 27.3607 14.1317 27.2845 14.2239 27.189L19.9999 21.414L25.7749 27.189C25.9635 27.3711 26.2161 27.4719 26.4783 27.4697C26.7405 27.4674 26.9913 27.3622 27.1767 27.1768C27.3622 26.9914 27.4673 26.7406 27.4696 26.4784C27.4719 26.2162 27.3711 25.9636 27.1889 25.775L21.4139 20L27.1889 14.225C27.3711 14.0364 27.4719 13.7838 27.4696 13.5216C27.4673 13.2594 27.3622 13.0086 27.1767 12.8232C26.9913 12.6378 26.7405 12.5326 26.4783 12.5303C26.2161 12.528 25.9635 12.6288 25.7749 12.811L19.9999 18.586L14.2249 12.81V12.811Z" fill="#067FEF"/>
          </svg>
        </button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-wrapper">
          <div class="calculator-wrapper">
            <div class="calc-data-type-wrapper">
              <h3 class="title"><?php echo esc_html( pll__( 'Одиниці виміру' ) ); ?>:</h3>
              <div class="data-type-list">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="calc-units-measurement" value="meters" >
                    <span class="label"><?php echo esc_html( pll__( 'Метри' ) ); ?></span>
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label" >
                    <input type="radio" class="form-check-input" checked name="calc-units-measurement" value="centimeters" >
                    <span class="label"><?php echo esc_html( pll__( 'Cантиметри' ) ); ?></span>
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="calc-units-measurement" value="millimeters">
                    <span class="label"><?php echo esc_html( pll__( 'Міліметри' ) ); ?></span>
                  </label>
                </div>
              </div>
            </div>
            <h3 class="title"><?php echo esc_html( pll__( 'Габарити' ) ); ?>:</h3>
            <div class="calc-param-wrapper">
              <div class="form-group">
                <input type="number" name="white" class="form-control" id="calc-type1-white" placeholder="<?php echo esc_html( pll__( 'Ширина:' ) ); ?>" required>
              </div>
              <div class="form-group">
                <input type="number" name="height" class="form-control" id="calc-type1-height" placeholder="<?php echo esc_html( pll__( 'Висота:' ) ); ?>" required>
              </div>
              <div class="form-group">
                <input type="number" name="length" class="form-control" id="calc-type1-length" placeholder="<?php echo esc_html( pll__( 'Довжина:' ) ); ?>" required>
              </div>
              <div class="form-group">
                <input type="number" name="count" class="form-control" id="calc-type1-count" placeholder="<?php echo esc_html( pll__( 'Кількість коробок' ) ); ?>" required>
              </div>
            </div>

            <div class="button blue-btn" id="calc-type-1">
		          <?php echo esc_html( pll__( 'Розрахувати обʼєм' ) ); ?>
            </div>
            <p class="calculator-result"><?php echo esc_html( pll__( 'Обʼєм вантажу' ) ); ?>: <span></span>м³</p>
          </div>

        </div>

      </div>

    </div>
  </div>
</div>
