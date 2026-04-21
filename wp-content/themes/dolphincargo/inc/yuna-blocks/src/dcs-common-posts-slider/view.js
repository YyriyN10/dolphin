jQuery(function($){

  let windWidth = $(window).width();

  let thisBlock = $('.wp-block-dcs-common-posts-slider');

  let sliderStart = thisBlock.find('.slider-start .slider');
  let sliderBasic = thisBlock.find('.slider-basic .slider');
  let sliderMobile = thisBlock.find('.slider-mobile .slider');

  let prevBtn = thisBlock.find('.control.prev');
  let nextBtn = thisBlock.find('.control.next');

  if (sliderStart.length){
    sliderStart.slick({
      autoplay: false,
      autoplaySpeed: 2000,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      responsive: [
        {
          breakpoint: 1025,
          settings: {
            slidesToShow: 2,
          }
        }
      ]

    });

    prevBtn.click(function(e){
      e.preventDefault();

      sliderStart.slick('slickPrev');
    });

    nextBtn.click(function(e){
      e.preventDefault();

      sliderStart.slick('slickNext');
    });
  }

  $(window).resize(function () {
    windWidth = $(window).width();

    if (windWidth < 445 && sliderMobile.length ){
      mobilePostSlider(sliderMobile)
    }else {
      if (sliderMobile.hasClass('slick-initialized')) {
        sliderMobile.slick('unslick')
      }
    }

    if (windWidth < 1025 && sliderBasic.length ){
      basicPostSlider(sliderBasic)
    }else {
      if (sliderBasic.hasClass('slick-initialized')) {
        sliderBasic.slick('unslick')
      }
    }
  });

  if (windWidth < 445 && sliderMobile.length ){
    mobilePostSlider(sliderMobile)
  }else {
    if (sliderMobile.hasClass('slick-initialized')) {
      sliderMobile.slick('unslick')
    }
  }

  if (windWidth < 1025 && sliderBasic.length ){
    basicPostSlider(sliderBasic)
  }else {
    if (sliderBasic.hasClass('slick-initialized')) {
      sliderBasic.slick('unslick')
    }
  }

  function mobilePostSlider(slider){
    slider.slick({
      autoplay: false,
      autoplaySpeed: 2000,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      fade: true
    });
  }

  function basicPostSlider(slider){
    slider.slick({
      autoplay: false,
      autoplaySpeed: 2000,
      slidesToShow: 2,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
    });

  }








});