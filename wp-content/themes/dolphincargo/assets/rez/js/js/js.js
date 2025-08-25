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

  $(window).scroll(function() {

    let scroll = $(window).scrollTop();

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

});


