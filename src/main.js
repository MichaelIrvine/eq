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
import lightbox from './js/lightbox';

// Globals
lazyLoad();
navigation();
staggerAnim();
headerScroll();
dropDownNav();

// Page Specific
if (document.body.classList.contains('home')) {
  heroAnim();
}

if (document.body.classList.contains('page-about')) {
  bioModal();
}
if (document.body.classList.contains('post-type-archive-projects')) {
  accordion();
}
if (document.body.classList.contains('single-projects')) {
  flexibleColumns();

  if (window.matchMedia('(min-width: 768px)').matches) {
    lightbox();
  }
}
