/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************************!*\
  !*** ./src/dcs-business-trip-advantages/view.js ***!
  \**************************************************/
jQuery(function ($) {
  let windWidth = $(window).width();
  let windHeight = $(window).height();
  $(window).resize(function () {
    windWidth = $(window).width();
    windHeight = $(window).height();
    advantagesSlider();
  });
  let tripAdvantagesBlock = $('.wp-block-dcs-business-trip-advantages');
  function advantagesSlider() {
    if (windWidth < 770) {
      tripAdvantagesBlock.each(function () {
        let thisBlock = $(this);
        let slider = thisBlock.find('.items-list');
        slider.not('.slick-initialized').slick({
          autoplay: false,
          autoplaySpeed: 2000,
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: false,
          dots: true,
          responsive: [{
            breakpoint: 575,
            settings: {
              slidesToShow: 2
            }
          }, {
            breakpoint: 350,
            settings: {
              slidesToShow: 1,
              fade: true
            }
          }]
        });
      });
    } else {
      tripAdvantagesBlock.each(function () {
        let thisBlock = $(this);
        let slider = thisBlock.find('.items-list');
        if (slider.hasClass('slick-initialized')) {
          slider.slick('unslick');
        }
      });
    }
  }
  advantagesSlider();
});
/******/ })()
;
//# sourceMappingURL=view.js.map