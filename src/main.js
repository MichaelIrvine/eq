import './sass/style.scss';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
gsap.registerPlugin(ScrollTrigger);

// Header & Navigation
import dropDownNav from './js/dropDownNav';
import headerScroll from './js/headerScroll';
import bioModal from './js/bioModal';
import lazyLoad from './js/lazyLoad';
import accordion from './js/accordion';
import heroAnim from './js/heroAnim';
import navigation from './js/navigation';
import flexibleColumns from './js/flexColumns';
import staggerAnim from './js/staggerAnim';
import frontPageScroll from './js/frontPageScroll';

// Globals
lazyLoad();
navigation();
staggerAnim();
dropDownNav();
headerScroll();

// Page Level

if (document.body.classList.contains('home')) {
  heroAnim();

  window.addEventListener('DOMContentLoaded', () => {
    ScrollTrigger.matchMedia({
      '(min-width: 1200px)': () => {
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
              ease: 'power1',
              anticipatePin: 1,
              markers: false,
              invalidateOnRefresh: true,
            },
          })
          .to('.featured-post-details__wrapper', {
            autoAlpha: 0,
            duration: 0.25,
          })
          .to('.featured-post-text__wrapper', { display: 'block', duration: 0 })
          .to('.featured-post-text__wrapper', { autoAlpha: 1, duration: 0.5 })
          .to('#front-page__col-02', { marginTop: '0vh' })
          .to('#front-page__col-01', {
            y: () => {
              return `-${
                document.querySelector('.featured-post-image__wrapper')
                  .clientHeight + 15
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

        window.addEventListener('resize', ScrollTrigger.refresh());
      },
    });
  });
}

if (document.body.classList.contains('page-about')) {
  bioModal();
}
if (document.body.classList.contains('post-type-archive-projects')) {
  accordion();
}
if (document.body.classList.contains('single-projects')) {
  flexibleColumns();
}
