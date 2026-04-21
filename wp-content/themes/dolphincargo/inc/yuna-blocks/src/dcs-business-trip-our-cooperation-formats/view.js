jQuery(function($) {

  let blocksList = $('.wp-block-dcs-business-trip-our-cooperation-formats');

  blocksList.each(function () {
    let thisBlock = $(this);

    let prevBtn = thisBlock.find('.control.prev');
    let nextBtn = thisBlock.find('.control.next');
    let slider = thisBlock.find('.cooperation-formats-slider');

    slider.slick({
      autoplay: false,
      autoplaySpeed: 2000,
      centerMode: true,
      centerPadding: 0,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: false,
      fade: false,
      dots: true,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            centerPadding: "25%",
            slidesToShow: 1,
          }
        },
        {
          breakpoint: 910,
          settings: {
            centerPadding: "15%",
            slidesToShow: 1,
          }
        },
        {
          breakpoint: 690,
          settings: {
            centerPadding: "5%",
            slidesToShow: 1,
          }
        },
        {
          breakpoint: 560,
          settings: {
            centerPadding: 0,
            slidesToShow: 1,
            fade: true,
          }
        },
      ]
    });

    prevBtn.click(function(e){
      e.preventDefault();

      slider.slick('slickPrev');
    });

    nextBtn.click(function(e){
      e.preventDefault();

      slider.slick('slickNext');
    });

    slider.find('.slide').on('click', function (e) {
      e.preventDefault();

      let goToSlideIndex = Number($(this).attr('data-slick-index'));

      slider.slick('slickGoTo', goToSlideIndex);
    });


  });

});