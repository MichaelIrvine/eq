import './sass/style.scss';

import { gsap, Power2 } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
gsap.registerPlugin(ScrollTrigger);

// Header & Navigation
import dropDownNav from './js/dropDownNav';
import headerScroll from './js/headerScroll';
import bioModal from './js/bioModal';
import lazyLoad from './js/lazyLoad';

// Globals
dropDownNav();
headerScroll();
lazyLoad();

// Page Level
if (document.body.classList.contains('page-about')) {
  bioModal();
}
