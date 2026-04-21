jQuery(function($) {

  let blocksContainerList = $('.wp-block-dcs-business-trip-group-container');

  let darkContainer = $('.wp-block-dcs-business-trip-group-container.dark-bg');

  darkContainer.each(function (index) {

    console.log(index);
    if ((index + 1) % 2 == 0) {
      $(this).addClass('even-block')
    }
  });


  blocksContainerList.each(function(){
    let thisBlock = $(this);

    let lastCta = thisBlock.find('section:last-of-type.off-bg');

    if (lastCta.length){

      let nextSection = thisBlock.next();

      let ctaHeight = lastCta.innerHeight();

      let paddingTop = parseInt(nextSection.css('padding-top'));

      lastCta.find('.inner').css({'margin-bottom' : '-'+ctaHeight / 2+'px'});

      nextSection.css({'padding-top' : (paddingTop + (ctaHeight / 2))+'px' });

      thisBlock.css({'overflow-y' : 'unset', 'overflow-x' : 'clip'});
    }
  });

});
