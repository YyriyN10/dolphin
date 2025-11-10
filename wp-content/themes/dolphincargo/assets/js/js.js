jQuery(function($) {


  /**
   * Get Window Width, Height
   */

  let windWidth = $(window).width();
  let windHeight = $(window).height();

  $(window).resize(function () {
    windWidth = $(window).width();
    windHeight = $(window).height();
  });

  /**
   * Lazy load
   */

  $('.lazy').lazy();

  /**
   * Header desktop phone
   */

  $('#desktop-phone-list').on('click', function (e) {

    e.preventDefault();

    $(this).toggleClass('active');

    $(this).find('.phone-list').slideToggle(300);

  })

  //SCROLL MENU

  $(document).on('click', '.scroll-to', function (e) {
      e.preventDefault();

      let href = $(this).attr('href');

      $('html, body').animate({
          scrollTop: $(href).offset().top
      }, 1000);

  });

  /**
   * Current lang
   */

  const langWrapper = $('#lang-wrapper');

  langWrapper.find('.lang-name').text( langWrapper.find('.current-lang a').text());

  langWrapper.find('.page-lang').on('click', function (e) {

    e.preventDefault();

    $(this).toggleClass('open');

    langWrapper.find('.lang-list').slideToggle(300);
  })

  /**
   * About us slider
   */

  if ( $('#about-us-slider').length ){

    $('#about-us-slider').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,

    });

    $('.about-us .prev').click(function(e){
        e.preventDefault();

        $('#about-us-slider').slick('slickPrev');
    });

    $('.about-us .next').click(function(e){
        e.preventDefault();

        $('#about-us-slider').slick('slickNext');
    });
  }

  /**
   * Reviews slider
   */

  if ( $('#reviews-slider').length ){

    $('#reviews-slider').slick({
      autoplay: false,
      autoplaySpeed: 2000,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: false,
      responsive: [
        {
          breakpoint: 1350,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 660,
          settings: {
            slidesToShow: 1,
            fade: true
          }
        },
      ]

    });

    $('#reviews-slider .slide .full-text').remove();

    const reviewsCount = $('#reviews-slider .slide:not(.slick-cloned)').length;

    if ( windWidth > 1350 && reviewsCount < 4 ){
      $('.reviews .controls-wrapper').addClass('d-none');
    }

    $( window ).resize(function () {
      if ( windWidth > 1350 && reviewsCount < 4 ){
        $('.reviews .controls-wrapper').addClass('d-none');
      }else{
        $('.reviews .controls-wrapper').removeClass('d-none');
      }
    });


    $('.reviews .prev').click(function(e){
      e.preventDefault();

      $('#reviews-slider').slick('slickPrev');
    });

    $('.reviews .next').click(function(e){
      e.preventDefault();

      $('#reviews-slider').slick('slickNext');
    });
  }

  /**
   * F.A.Q accordion
   */

  /*if ( $('#accordion-faq').length ){

    $('.card:first-child .card-link').removeClass('collapsed');
    $('.card:first-child .collapse').addClass('show');

  }*/

  /**
   * Main screen cursor
   */

  if ( $('.home-main-screen').length ){

    const customCursorContainer = $('.home-main-screen .cursor-container');
    const customCursor = $('.circle-button');

    customCursorContainer.on('mousemove', function (event) {
      customCursor.css({
        left: event.pageX + 'px',
        top: event.pageY + 'px',
        opacity: 1
      });
    });

    customCursorContainer.on('mouseleave ', function (event) {
      customCursor.css({
        opacity: 0
      });
    });
  }

  if ( $('.service-main-screen .cursor-container').length ){

    const customCursorContainer = $('.service-main-screen .cursor-container');
    const customCursor = $('.circle-button');

    customCursorContainer.on('mousemove', function (event) {
      let rect = this.getBoundingClientRect();
      customCursor.css({
        left: event.clientX - rect.left + 'px',
        top: event.clientY - rect.top + 'px',
        opacity: 1
      });
    });

    customCursorContainer.on('mouseleave ', function (event) {

      customCursor.css({
        opacity: 0
      });
    });

  }

  if ( $('.about-us-main-screen .cursor-container').length ){

    const customCursorContainer = $('.about-us-main-screen .cursor-container');
    const customCursor = $('.circle-button');

    customCursorContainer.on('mousemove', function (event) {
      let rect = this.getBoundingClientRect();
      customCursor.css({
        left: event.clientX - rect.left + 'px',
        top: event.clientY - rect.top + 'px',
        opacity: 1
      });
    });

    customCursorContainer.on('mouseleave ', function (event) {

      customCursor.css({
        opacity: 0
      });
    });
  }



  /**
   * Fixed Menu
   */

  $(document).scroll(function() {

    let scrollPosition = $(this).scrollTop();

    if ( scrollPosition > 1 ) {
      $('.site-header').addClass('fixed-header');
    } else {
      $('.site-header').removeClass('fixed-header');
    }
  });

  let positionScrollHeader = $(window).scrollTop();
  const calculatorBtn = $('#calculator-btn');
  const calculatorType1Btn = $('#calculator-type-1');

  $(window).scroll(function() {

    let scroll = $(window).scrollTop();

    if(scroll > windHeight){
      calculatorBtn.addClass('visible');
      calculatorType1Btn.addClass('visible');
    }else{
      calculatorBtn.removeClass('visible');
      calculatorType1Btn.removeClass('visible');
    }

    if( scroll > positionScrollHeader ) {

      langWrapper.find('.lang-list').slideUp(300);

      if ( $('.header-navigation.open-menu').length ){
        $('.site-header').addClass('fixed-header-visible');
      }else{
        $('.site-header').removeClass('fixed-header-visible');
      }


    } else {
      $('.site-header').addClass('fixed-header-visible');

    }

    positionScrollHeader = scroll;

  });

  /**
   * Mob Menu
   */

  $('#menu-btn').on('click', function (e) {
    e.preventDefault();

    $(this).toggleClass('active');
    $('.site-header').toggleClass('active-menu');
    $('#header-navigation').toggleClass('open-menu');
    $('html').toggleClass("fixedPosition");

  });

  /**
   * Viewport Animation
   */

  let animationTracking = $('.animation-tracking');

  animationTracking.each(function () {

    let thisTrack = $(this);

    thisTrack.viewportChecker({

      offset: 300,

      callbackFunction: function (elem, action) {

        $('.visible .first-up').addClass('animate');

        setTimeout(function () {
          $('.visible .second-up').addClass('animate');
        }, 500);

        setTimeout(function () {
          $('.visible .third-up').addClass('animate');
        }, 700);

      }
    });
  });

  /**
   * Phone mask
   */

  $('input[type=tel]').intlTelInput({
    preferredCountries: ["ua"],
  });

  $('input[type=tel]').on('countrychange', function(e, countryData) {
    jQuery(this).val('+'+countryData.dialCode);
  });

  $('input[type=tel]').val('+' + $('input[type=tel]').intlTelInput("getSelectedCountryData").dialCode);

  $.fn.forceNumbericOnly = function() {
    return this.each(function() {
      jQuery(this).keydown(function(e) {
        var key = e.charCode || e.keyCode || 0;
        return (key == 8 || key == 9 || key == 46 || (key >= 37 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105) || key == 107 || key == 109 || key == 173 || key == 61);
      });
    });
  };

  $('input[type=tel]').forceNumbericOnly();

  $('input[type=tel]').attr('maxlength', 13);



  /**
   * Container animation
   */

  /*if ( $('.home-what-you-get').length ){

    const blockPosition = Math.round($('.home-what-you-get').offset().top);

    let scrollPosition = 0;

    function displayPageYOffset() {

      scrollPosition = window.pageYOffset;
    }

// Оновлюємо зміщення при скролінгу
    window.addEventListener('scroll', displayPageYOffset);

// Ініціалізація значення при завантаженні сторінки
    displayPageYOffset();

    $('.home-what-you-get').viewportChecker({

      offset: 300,

      callbackFunction: function (elem, action) {

        $('.visible .img-container').css({'transform' : 'translateY('+ (blockPosition - scrollPosition) +'px)'});

      }
    });
  }*/



  /**
   * Service step animation
   */

  if ( $('.services-delivery-steps').length ){

    let animationTracking = $('.animation-wrapper');

    const topStepsTracking = $('.services-delivery-steps .content');

    animationTracking.each(function () {

      let thisTrack = $(this);

      thisTrack.viewportChecker({

        offset: 300,

        callbackFunction: function (elem, action) {

        }
      });
    });

    let adaptiveOffset = 300;

    if ( windWidth < 600 ){
      adaptiveOffset = 150;
    }

    topStepsTracking.each(function () {

      let thisTrack = $(this);

      thisTrack.viewportChecker({

        offset: adaptiveOffset,

        callbackFunction: function (elem, action) {

        }
      });
    });

  }

  /**
   * Services service level animation
   */
  if ( $('.services-service-level').length ){

    const topStepsTracking = $('.services-service-level .content');

    topStepsTracking.viewportChecker({

      offset: 300,

      callbackFunction: function (elem, action) {

      }
    });

  }


  /**
   * Open video popup
   */

  const videoModal = $('#videoModal');

  $('.open-video-modal').on('click', function (e) {

    e.preventDefault();

    videoModal.find('.video').html('<iframe src="https://www.youtube-nocookie.com/embed/'+$(this).attr('data-video')+'?rel=0&autoplay=1&autohide=1&border=0&wmode=opaque&enablejsapi=1"></iframe>');

    videoModal.modal("show");

  });

  videoModal.on('hidden.bs.modal', function (e) {

    videoModal.find('.video iframe').remove();

  });


  /**
   * Open text modal
   */

  const reviewTextModal = $('#reviewModal');

  $('.open-text-modal').on('click', function (e) {

    e.preventDefault();

    let reviewId = Number( $(this).attr('id') );

    let data = {

      action: 'review_text_modal',
      reviewId: reviewId
    };

    $.post( dolphincargo_ajax.url, data, function(response) {

      if( $.trim(response) !== ''){

        reviewTextModal.find('.modal-body').html(response);

        reviewTextModal.find('.modal-body .text').remove();
        reviewTextModal.find('.modal-body .open-text-modal').remove();

        reviewTextModal.modal("show");
      }
    });


  });

  /**
   * Typed service achievement
   */

  if ( $('.services-achievement').length ){

    const achievementTyped = $('.services-achievement .achievement-value').attr('data-text');

    let animationTracking = $('.services-achievement');

    animationTracking.each(function () {

      let thisTrack = $(this);

      thisTrack.viewportChecker({

        offset: 300,

        callbackFunction: function (elem, action) {

          $('.visible .first-up').addClass('animate');

          setTimeout(function () {
            $('.visible .second-up').addClass('animate');

            let textType = new Typed(".services-achievement.visible .achievement-value", {
              strings: [achievementTyped],
              typeSpeed: 150,
              showCursor: false,
              loopCount:1
            });

          }, 500);

          setTimeout(function () {
            $('.visible .third-up').addClass('animate');
          }, 700);

        }
      });
    });

  }

  /**
   * Other services slider
   */

  if ( $('#other-services-slider').length ){
    $('#other-services-slider').slick({
      autoplay: false,
      autoplaySpeed: 2000,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: false,
      responsive: [
        {
          breakpoint: 1350,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 660,
          settings: {
            slidesToShow: 1,
            fade: true
          }
        },
      ]
    });

    const otherServicesCount = $('#other-services-slider .slide:not(.slick-cloned)').length;

    if ( windWidth > 1350 && otherServicesCount < 4 ){
      $('.other-services .controls-wrapper').addClass('d-none');
    }

    $( window ).resize(function () {
      if ( windWidth > 1350 && otherServicesCount < 4 ){
        $('.other-services .controls-wrapper').addClass('d-none');
      }else{
        $('.other-services .controls-wrapper').removeClass('d-none');
      }
    });


    $('.other-services .prev').click(function(e){
      e.preventDefault();

      $('#other-services-slider').slick('slickPrev');
    });

    $('.other-services .next').click(function(e){
      e.preventDefault();

      $('#other-services-slider').slick('slickNext');
    });
  }

  /**
   * Blog pagination
   */

  $(document).on('click', '#pagination a', function (e) {

    e.preventDefault();

    let thisNumber = $(this);

    let pageNumber = Number( thisNumber.text() );

    $('ul.page-numbers .page-numbers.current').removeClass('current');

    thisNumber.addClass('current');

    let data = {

      action: 'blog_pagination',
      currentPage: pageNumber,

    }

    $.post( dolphincargo_ajax.url, data, function(response) {

      if( $.trim(response) !== ''){

        $('#blog-list').html(response.posts);
        $('#pagination').html(response.pagination);

      }
    });

  })
  /**
   * UTM
   */
  //

  let utmList = sessionStorage.getItem("utmList");

  if ( utmList ){
    storageUtm(utmList);
  }else{
    let currentUtmList = window.location.search.substring(1);

    if ( currentUtmList != '' ){
      sessionStorage.setItem("utmList", currentUtmList);

      storageUtm(currentUtmList);
    }
  }

  function storageUtm(utmList){

    let utmArray = utmList.split('&');

    function checkUtm(utmName) {
      for (let i = 0; i < utmArray.length; i++) {
        let pair = utmArray[i].split('=');
        if (decodeURIComponent(pair[0]) == utmName) {
          return decodeURIComponent(pair[1]);
        }
      }
    }

    let utm_source = checkUtm('utm_source') ? checkUtm('utm_source') : "";
    let utm_medium = checkUtm('utm_medium') ? checkUtm('utm_medium') : "";
    let utm_campaign = checkUtm('utm_campaign') ? checkUtm('utm_campaign') : "";
    let utm_term = checkUtm('utm_term') ? checkUtm('utm_term') : "";
    let utm_content = checkUtm('utm_content') ? checkUtm('utm_content') : "";


    let forms = $('form');
    $.each(forms, function (index, form) {
      let thisForm = $(form);
      thisForm.append('<input type="hidden" name="utm_source" value="' + utm_source + '">');
      thisForm.append('<input type="hidden" name="utm_medium" value="' + utm_medium + '">');
      thisForm.append('<input type="hidden" name="utm_campaign" value="' + utm_campaign + '">');
      thisForm.append('<input type="hidden" name="utm_term" value="' + utm_term + '">');
      thisForm.append('<input type="hidden" name="utm_content" value="' + utm_content + '">');

      let thisPageUrl = thisForm.find('input[name = page-url]').val();
      thisForm.find('input[name = page-url]').val(thisPageUrl + '?' + utmList);
    });
  }


  $('form').on('submit', function (e) {
    e.preventDefault();

    const thisForm = $(this);

    thisForm.find('.button').addClass('form-accepted');

    sessionStorage.removeItem("utmList");

    let name = thisForm.find('input[name = name]').val();
    let phone = thisForm.find('input[name = phone]').val();
    let email = thisForm.find('input[name = email]').val();
    let action = thisForm.find('input[name = action]').val();
    let thxPage = atob(thisForm.find('input[name = thx-target]').val());
    let pageName = thisForm.find('input[name = page-name]').val();
    let pageUrl = thisForm.find('input[name = page-url]').val();

    let utmSource = thisForm.find('input[name = utm_source]').val();
    let utmMedium = thisForm.find('input[name = utm_medium]').val();
    let utmCampaign = thisForm.find('input[name = utm_campaign]').val();
    let utmTerm = thisForm.find('input[name = utm_term]').val();
    let utmContent = thisForm.find('input[name = utm_content]').val();

    let calcDeliveryType = thisForm.find('input[name = calc-delivery-type]:checked').val();
    let calcDeliveryCategory = thisForm.find('select[name = calc-delivery-category]').val();
    let calcDeliveryVolume = thisForm.find('input[name = calc-form-volume]').val();


    const formData = {
      action: action,
      name: name,
      phone: phone,
      email: email,
      pageName: pageName,
      pageUrl: pageUrl,
      utmSource: utmSource,
      utmMedium: utmMedium,
      utmCampaign: utmCampaign,
      utmTerm: utmTerm,
      utmContent: utmContent,
      calcDeliveryType: calcDeliveryType,
      calcDeliveryCategory: calcDeliveryCategory,
      calcDeliveryVolume: calcDeliveryVolume,

    }

    $.post( dolphincargo_ajax.url, formData, function(response) {

      fbq("track","Lead");
      window.location.href = thxPage;

    });

  })

  /**
   * Price slider
   */

  if ( $('.services-delivery-price-list').length ){


    let anchor = window.location.hash;
    let position = anchor.indexOf('?');

    let anchorResult = anchor;

    if (position > 0){
      anchorResult = anchor.slice(0, position);
    }

    let urmAfterAnchor = anchor.slice((position + 1));
    let utm_campaign = checkUtm('utm_campaign') ? checkUtm('utm_campaign') : "";


    if(anchor == ''){
      urmAfterAnchor = window.location.search.substring(1);
      utm_campaign = checkUtm('utm_campaign') ? checkUtm('utm_campaign') : "";
    }

    function checkUtm(utmName) {
      let utmArray = urmAfterAnchor.split('&');

      for (let i = 0; i < utmArray.length; i++) {
        let pair = utmArray[i].split('=');
        if (decodeURIComponent(pair[0]) == utmName) {
          return decodeURIComponent(pair[1]);
        }
      }
    }


    let anchorTarget = '';

    if ( anchorResult == '#avia' || anchorResult == '#railway' || anchorResult == '#sea'){
      anchorTarget = anchorResult;
    }

    if (utm_campaign == 'price'){
      $('.sale-price').show(300);
      $('.base-price').hide(300);
    }


    $('#services-delivery-price-slider').slick({
      autoplay: false,
      autoplaySpeed: 2000,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      adaptiveHeight: true,
      asNavFor: '#services-delivery-price-slider-nav'
    });


    $('#services-delivery-price-slider-nav').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      asNavFor: '#services-delivery-price-slider',
      focusOnSelect: true,
      variableWidth: true,
      arrows: false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 575,
          settings: {
            slidesToShow: 2
          }
        }
      ]
    });

    if (anchorTarget != ''){
      $('#services-delivery-price-slider .slide').each(function () {
        let thisSlide = $(this);

        if (thisSlide.attr('data-hesh') == anchorTarget ){

          let thisIndex = thisSlide.attr('data-slick-index');

          $('#services-delivery-price-slider').slick('slickGoTo', thisIndex);
          $('#services-delivery-price-slider-nav').slick('slickGoTo', thisIndex);

        }
      })

      $('html, body').animate({
        scrollTop: $('#servise-pices').offset().top
      }, 1000);
    }

    $('.services-delivery-price-list .prev').click(function(e){
      e.preventDefault();

      $('#services-delivery-price-slider').slick('slickPrev');
      $('#services-delivery-price-slider-nav').slick('slickPrev');
    });

    $('.services-delivery-price-list .next').click(function(e){
      e.preventDefault();

      $('#services-delivery-price-slider').slick('slickNext');
      $('#services-delivery-price-slider-nav').slick('slickNext');
    });
  }

  /**
   * Calculator
   */

  const calcType1Width = $('#calc-type1-white');
  const calcType1Height = $('#calc-type1-height');
  const calcType1Length = $('#calc-type1-length');
  const calcType1Count = $('#calc-type1-count');
  let calcType1Metrics = $('#calculatorType1Modal .data-type-list input:checked').val();

  const calcType2Width = $('#calc-type2-white');
  const calcType2Height = $('#calc-type2-height');
  const calcType2Length = $('#calc-type2-length');
  const calcType2Count = $('#calc-type2-count');
  let calcType2Metrics = $('#calculatorType2 .data-type-list input:checked').val();

  let calcFormValue = $('#calc-form-volume');

  let calcWidthValue = 0;
  let calcHeightValue = 0;
  let calcLengthValue = 0;
  let calcCountValue = 1;

  const calcResultWrapper = $('.calculator-result');
  /*const formCalcResult = $('#cargo-volume');*/
  const calcBtnGo = $('.calculator-wrapper #calc-type-1');
  /*const calcFormContact = $('#calculatorModal form');*/
  const calcBtnGo2 = $('.calculator-wrapper #calc-type-2');

  let currentWidthPlaceholder = calcType1Width.attr('placeholder');
  let currentHeightPlaceholder = calcType1Height.attr('placeholder');
  let currentLengthPlaceholder = calcType1Length.attr('placeholder');

  let current2WidthPlaceholder = calcType2Width.attr('placeholder');
  let current2HeightPlaceholder = calcType2Height.attr('placeholder');
  let current2LengthPlaceholder = calcType2Length.attr('placeholder');

  function changeCalcPlaceholder(calcType1Metrics) {

    if ( calcType1Metrics == 'centimeters'){
      calcType1Width.attr('placeholder', currentWidthPlaceholder + ' см');
      calcType1Height.attr('placeholder', currentHeightPlaceholder + ' см');
      calcType1Length.attr('placeholder', currentLengthPlaceholder + ' см');
    }

    if ( calcType1Metrics == 'millimeters'){
      calcType1Width.attr('placeholder', currentWidthPlaceholder + ' мм');
      calcType1Height.attr('placeholder', currentHeightPlaceholder + ' мм');
      calcType1Length.attr('placeholder', currentLengthPlaceholder + ' мм');
    }

    if ( calcType1Metrics == 'meters'){
      calcType1Width.attr('placeholder', currentWidthPlaceholder + ' м');
      calcType1Height.attr('placeholder', currentHeightPlaceholder + ' м');
      calcType1Length.attr('placeholder', currentLengthPlaceholder + ' м');
    }
  }

  function changeCalcPlaceholder2(calcType2Metrics) {

    if ( calcType2Metrics == 'centimeters'){
      calcType2Width.attr('placeholder', current2WidthPlaceholder + ' см');
      calcType2Height.attr('placeholder', current2HeightPlaceholder + ' см');
      calcType2Length.attr('placeholder', current2LengthPlaceholder + ' см');
    }

    if ( calcType2Metrics == 'millimeters'){
      calcType2Width.attr('placeholder', current2WidthPlaceholder + ' мм');
      calcType2Height.attr('placeholder', current2HeightPlaceholder + ' мм');
      calcType2Length.attr('placeholder', current2LengthPlaceholder + ' мм');
    }

    if ( calcType2Metrics == 'meters'){
      calcType2Width.attr('placeholder', current2WidthPlaceholder + ' м');
      calcType2Height.attr('placeholder', current2HeightPlaceholder + ' м');
      calcType2Length.attr('placeholder', current2LengthPlaceholder + ' м');
    }
  }

  changeCalcPlaceholder(calcType1Metrics);
  changeCalcPlaceholder2(calcType2Metrics);

  $('#calculatorType1Modal .data-type-list input').on('change', function () {

    calcType1Metrics = $(this).val();

    changeCalcPlaceholder(calcType1Metrics);

  })

  $('#calculatorType2 .data-type-list input').on('change', function () {

    calcType2Metrics = $(this).val();

    changeCalcPlaceholder2(calcType2Metrics);

  })


  calcBtnGo.on('click', function (e) {
    e.preventDefault();

    calcWidthValue = calcType1Width.val();
    calcHeightValue = calcType1Height.val();
    calcLengthValue = calcType1Length.val();

    if(calcType1Count.val() > 0){
      calcCountValue = calcType1Count.val();

    }


    calcCargoValue(calcWidthValue, calcHeightValue, calcLengthValue, calcType1Metrics, calcCountValue);

  });

  calcBtnGo2.on('click', function (e) {
    e.preventDefault();

    calcWidthValue = calcType2Width.val();
    calcHeightValue = calcType2Height.val();
    calcLengthValue = calcType2Length.val();

    if(calcType2Count.val() > 0){
      calcCountValue = calcType2Count.val();
    }


    calcCargoValue(calcWidthValue, calcHeightValue, calcLengthValue, calcType2Metrics, calcCountValue);

  });

  function calcCargoValue(calcWidthValue, calcHeightValue, calcLengthValue, calcType1Metrics, calcCountValue){

    let calcResult = calcLengthValue * calcWidthValue * calcHeightValue * calcCountValue;

    if (calcResult > 0 ){

      if (calcType1Metrics == 'millimeters'){
        calcResult = calcResult /  1000000000;
      }
      if (calcType1Metrics == 'centimeters'){
        calcResult = calcResult / 1000000;
      }

      calcResultWrapper.find('span').text(calcResult.toFixed(3));
      calcResultWrapper.slideDown(300);

      if(calcFormValue.length){
        calcFormValue.val(calcResult.toFixed(3)+'м³');
      }

    }

  }



  /*calcWidth.on('change', function () {

    calcWidthValue = $(this).val();

    calcCargoValue(calcWidthValue, calcHeightValue, calcLengthValue);

  });

  calcHeight.on('change', function () {

    calcHeightValue = $(this).val();

    calcCargoValue(calcWidthValue, calcHeightValue, calcLengthValue);

  });

  calcLength.on('change', function () {

    calcLengthValue = $(this).val();

    calcCargoValue(calcWidthValue, calcHeightValue, calcLengthValue);

  });*/

  /**
   * About us slider
   */

  if ( $('.our-contacts .office .slider-wrapper').length ){

    $('.our-contacts .office .slider-wrapper').each(function () {

      let thisSliderContainer = $(this);

      let thisSlider = thisSliderContainer.find('.office-slider');
      let thisPrevBtn = thisSliderContainer.find('.prev');
      let thisNextBtn = thisSliderContainer.find('.next');

      thisSlider.slick({
        autoplay: false,
        autoplaySpeed: 2000,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
      });

      thisPrevBtn.click(function(e){
        e.preventDefault();

        thisSlider.slick('slickPrev');
      });

      thisNextBtn.click(function(e){
        e.preventDefault();

        thisSlider.slick('slickNext');
      });

    });

  }

  /**
   * Calculator info text
   */

  $('#form-info-text').on('click', function(){
    $(this).toggleClass('open');
  })

});


