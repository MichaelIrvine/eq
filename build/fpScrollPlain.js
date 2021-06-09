// console.log('PLAIN');

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
