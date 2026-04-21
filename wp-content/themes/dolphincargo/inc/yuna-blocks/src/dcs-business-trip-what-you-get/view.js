jQuery(function($) {

  let blocksList = $('.wp-block-dcs-business-trip-what-you-get');

  blocksList.each(function () {
    let thisBlock = $(this);

    let slider = thisBlock.find('.trip-gallery-slider');

    if ( slider.length ){
      slider.slick({
        autoplay: false,
        autoplaySpeed: 2000,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        dots: true
      });
    }
  })
});