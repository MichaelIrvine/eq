import { gsap, Power2 } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
gsap.registerPlugin(ScrollTrigger);

const frontPageScroll = () => {
  gsap
    .timeline({
      scrollTrigger: {
        trigger: '.featured-post__wrapper',
        start: 'bottom+=15px bottom',
        endTrigger: '#section-news',
        end: 'bottom bottom+=15px',
        scrub: 2,
        pin: '.site-main',
        pinSpacing: false,
        ease: 'power4.inOut',
        anticipatePin: 1,
        markers: false,
      },
    })
    .to('.featured-post-details__wrapper', { autoAlpha: 0, duration: 0.25 })
    .to('.featured-post-text__wrapper', { display: 'block', duration: 0 })
    .to('.featured-post-text__wrapper', { autoAlpha: 1, duration: 0.5 })
    .to('#front-page__col-02', { marginTop: '0vh' })
    .to('#front-page__col-01', {
      y: () => {
        return `-${
          document.querySelector('.featured-post-image__wrapper').clientHeight +
          15
        }px`;
      },
    })
    .to('#front-page__col-02', {
      y: () => {
        return `-${
          document.querySelector('#section-news').clientHeight + 15
        }px`;
      },
    });
};

export default frontPageScroll;
