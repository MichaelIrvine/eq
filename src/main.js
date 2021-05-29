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

// Globals
lazyLoad();
navigation();
staggerAnim();
dropDownNav();
headerScroll();

// Page Level

if (document.body.classList.contains('home')) {
  heroAnim();

  const fpHero = document.querySelector('#front-page-hero');
  const fpContent = document.querySelector('#front-page-content__wrapper');

  console.log({ fpHero });
  console.log({ fpContent });

  window.addEventListener('DOMContentLoaded', () => {
    ScrollTrigger.matchMedia({
      '(min-width: 1200px)': () => {
        gsap
          .timeline({
            scrollTrigger: {
              trigger: '.featured-post__wrapper',
              start: 'bottom+=15px bottom',
              endTrigger: '#section-news',
              end: 'bottom-=80px bottom',
              scrub: 2,
              pin: '.site-main',
              pinSpacing: false,
              ease: 'power1',
              anticipatePin: 1,
              markers: false,
              invalidateOnRefresh: true,
            },
          })
          .to('#front-page__col-02', { marginTop: '2vh' })
          .to('#front-page__col-01', {
            y: () => {
              return `-${
                document.querySelector('.featured-post__wrapper').clientHeight -
                10
              }px`;
            },
          })
          .to('#front-page-content__wrapper', {
            y: () => {
              return `-${
                window.innerHeight -
                document.querySelector('.featured-post__wrapper').clientHeight -
                75
              }`;
            },
          })
          .to('#front-page__col-02', {
            y: () => {
              return `-${
                document.querySelector('#section-news').clientHeight
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
