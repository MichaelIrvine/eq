// ScrollTrigger.matchMedia({
//   '(min-width: 1200px)': () => {
// gsap
//   .timeline({
//     scrollTrigger: {
//       trigger: '.featured-post__wrapper',
//       start: 'bottom+=15px bottom',
//       endTrigger: '#section-news',
//       end: 'bottom bottom+=15px',
//       scrub: 2,
//       pin: '.site-main',
//       pinSpacing: false,
//       ease: 'power1',
//       anticipatePin: 1,
//       markers: false,
//       invalidateOnRefresh: true,
//     },
//   })
//   .to('.featured-post-details__wrapper', {
//     autoAlpha: 0,
//     duration: 0.25,
//   })
//   .to('.featured-post-text__wrapper', { display: 'block', duration: 0 })
//   .to('.featured-post-text__wrapper', { autoAlpha: 1, duration: 0.5 })
//   .to('#front-page__col-02', { marginTop: '0vh' })
//   .to('#front-page__col-01', {
//     y: () => {
//       return `-${
//         document.querySelector('.featured-post-image__wrapper')
//           .clientHeight + 15
//       }px`;
//     },
//   })
//   .to('#front-page__col-02', {
//     y: () => {
//       return `-${
//         document.querySelector('#section-news').clientHeight + 15
//       }px`;
//     },
//   });

//     window.addEventListener('resize', ScrollTrigger.refresh());
//   },
// });

// May 29

// ScrollTrigger.matchMedia({
//   '(min-width: 1200px)': () => {
//     gsap
//       .timeline({
//         scrollTrigger: {
//           trigger: '.featured-post__wrapper',
//           start: 'bottom+=15px bottom',
//           endTrigger: '#front-page__col-01',
//           end: 'bottom bottom',
//           scrub: 2,
//           pin: '.site-main',
//           pinSpacing: false,
//           ease: 'power1',
//           anticipatePin: 1,
//           markers: true,
//           invalidateOnRefresh: true,
//         },
//       })
//       .to('#front-page__col-02', { marginTop: '2vh' })
//       .to('#front-page__col-01', {
//         y: () => {
//           return `-${
//             document.querySelector('.featured-post__wrapper').clientHeight +
//             10
//           }px`;
//         },
//       })
//       .to('#front-page-content__wrapper', {
//         y: () => {
//           return `-${
//             document.querySelector('.featured-post__wrapper').clientHeight
//           }`;
//         },
//       })
//       .to('#front-page-hero', {
//         y: () => {
//           return `-${
//             document.querySelector('.featured-post__wrapper').clientHeight
//           }`;
//         },
//       })
//       .to('#front-page__col-02', {
//         y: () => {
//           return `-${
//             document.querySelector('#section-news').clientHeight + 15
//           }px`;
//         },
//       });
