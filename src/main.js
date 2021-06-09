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

// Page Specific
if (document.body.classList.contains('home')) {
  headerScroll();
  heroAnim();

  // window.addEventListener('DOMContentLoaded', () => {
  //   // Element Variables
  //   const body = document.body;
  //   const footer = document.querySelector('#eqFooter');
  //   const pinWrapper = document.querySelector('.pin__wrapper');
  //   const siteMain = document.querySelector('.site-main');
  //   const colOne = document.querySelector('#front-page__col-01');
  //   const colTwo = document.querySelector('#front-page__col-02');
  //   const colOneFeaturedPost = colOne.querySelector('.featured-post__wrapper');

  //   // variables for scroll points
  //   let scrollPointFirst = colOneFeaturedPost.offsetHeight;
  //   let scrollPointSecond = colTwo;
  //   let scrollPointThird;
  //   let scrollPointFourth;

  //   // set height for pin wrapper
  //   pinWrapper.style.height = `${
  //     siteMain.offsetHeight + footer.offsetHeight
  //   }px`;

  //   function pinEl(el) {
  //     el.classList.add('pinned');
  //   }

  //   function unpinEl(el) {
  //     // Remove pin
  //     el.classList.remove('pinned');
  //     // Reset value to zero
  //     // el.style.top = 0;
  //   }

  //   function scroller() {
  //     if (window.scrollY >= scrollPointFirst) {
  //       console.log('fire first');
  //       // First Scroll Point fires
  //       // Site becomes fixed
  //       pinEl(siteMain);

  //       // Column 2 moves up
  //       //  **** Second Scroll Point Takes Over ****
  //     }
  //     // if (sY === scrollPointSecond) {
  //     //   // Undo Site Main fixed position
  //     // }
  //   }

  //   // Function to update values on screen resize
  //   function updateScrollPointValues() {
  //     scrollPointFirst;
  //     scrollPointSecond;
  //     scrollPointThird;
  //     scrollPointFourth;
  //   }

  //   window.addEventListener('resize', updateScrollPointValues);

  //   window.addEventListener('scroll', scroller);
  // });
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
