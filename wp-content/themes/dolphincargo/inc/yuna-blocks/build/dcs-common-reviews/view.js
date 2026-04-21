/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./src/dcs-common-reviews/view.js ***!
  \****************************************/
jQuery(function ($) {
  let windWidth = $(window).width();
  let windHeight = $(window).height();
  $(window).resize(function () {
    windWidth = $(window).width();
    windHeight = $(window).height();
  });
  let reviewBlock = $('.wp-block-dcs-common-reviews');
  let reviewSlider = reviewBlock.find('.new-reviews');
  let prevBtn = reviewBlock.find('.control.prev');
  let nextBtn = reviewBlock.find('.control.next');
  reviewSlider.slick({
    autoplay: false,
    autoplaySpeed: 2000,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    responsive: [{
      breakpoint: 1350,
      settings: {
        slidesToShow: 2
      }
    }, {
      breakpoint: 660,
      settings: {
        slidesToShow: 1,
        fade: true
      }
    }]
  });
  $('.new-reviews .slide .full-text').remove();
  const reviewsCount = $('.new-reviews .slide:not(.slick-cloned)').length;
  if (windWidth > 1350 && reviewsCount < 4) {
    prevBtn.addClass('d-none');
    nextBtn.addClass('d-none');
  }
  $(window).resize(function () {
    if (windWidth > 1350 && reviewsCount < 4) {
      prevBtn.addClass('d-none');
      nextBtn.addClass('d-none');
    } else {
      prevBtn.removeClass('d-none');
      nextBtn.removeClass('d-none');
    }
  });
  prevBtn.click(function (e) {
    e.preventDefault();
    reviewSlider.slick('slickPrev');
  });
  nextBtn.click(function (e) {
    e.preventDefault();
    reviewSlider.slick('slickNext');
  });
});
/******/ })()
;
//# sourceMappingURL=view.js.map