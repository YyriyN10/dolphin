import { gsap } from 'gsap/dist/gsap';
import { ScrollTrigger } from 'gsap/dist/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

if ( window.innerWidth > 1024 ){
  function initHorizontalScrollBlock(block) {
    const viewport = block.querySelector('.scroll-viewport');
    const track = block.querySelector('.inner-container');

    if (!viewport || !track) return;

    const getScrollDistance = () => {
      const totalWidth = track.scrollWidth;
      const viewportWidth = viewport.offsetWidth;
      return Math.max(0, totalWidth - viewportWidth + 600);
    };

    const distance = getScrollDistance();

    if (distance <= 0) return;

    const tween = gsap.to(track, {
      x: () => -getScrollDistance(),
      ease: 'none',
      scrollTrigger: {
        trigger: block,
        start: 'top 30%',
        /*start: 'top top',*/
        end: () => `+=${getScrollDistance()}`,
        scrub: true,
        pin: true,
        anticipatePin: 1,
        invalidateOnRefresh: true
      }
    });

    const onResize = () => {
      ScrollTrigger.refresh();
    };

    window.addEventListener('resize', onResize);

    return () => {
      window.removeEventListener('resize', onResize);
      tween.scrollTrigger?.kill();
      tween.kill();
    };
  }

  const cleanups = [];

  document.addEventListener('DOMContentLoaded', () => {
    document
      .querySelectorAll('.wp-block-dcs-business-trip-problem')
      .forEach((block) => {
        const cleanup = initHorizontalScrollBlock(block);
        if (cleanup) cleanups.push(cleanup);
      });
  });
}else{

  let blocksList = jQuery('.wp-block-dcs-business-trip-problem');

  blocksList.each(function () {
    let thisBlock = jQuery(this);

    let slider = thisBlock.find('.inner-container');

    slider.slick({
      autoplay: false,
      autoplaySpeed: 2000,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      responsive: [
        {
          breakpoint: 690,
          settings: {
            slidesToShow: 2,
          }
        }
      ]

    });
  });
}

