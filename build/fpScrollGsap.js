gsap.registerPlugin(ScrollTrigger);
window.addEventListener('DOMContentLoaded', () => {
  if (document.body.classList.contains('home')) {
    var postImageHeight = jQuery('.featured-post-image__wrapper').outerHeight();
    jQuery('#section-news').css('min-height', postImageHeight);
    ScrollTrigger.matchMedia({
      '(min-width: 1200px)': () => {
        jQuery('#section-news').css('min-height', postImageHeight + 80);
        window.onresize = function () {
          location.reload();
        };
        gsap
          .timeline({
            scrollTrigger: {
              trigger: '.featured-post__wrapper',
              start: 'bottom bottom',
              scrub: 1,
              pin: '.site-main',
              ease: 'none',
              pinSpacing: false,
              anticipatePin: 1,
              invalidateOnRefresh: true,
              markers: false,
            },
          })
          .to('#front-page__col-02', {
            y: '2vh',
            ease: 'none',
          })
          .to('#front-page__col-01', {
            y: () => {
              return `-${
                document.querySelector('.featured-post__wrapper').clientHeight -
                10
              }px`;
            },
            ease: 'none',
          })
          .to('#front-page-content__wrapper', {
            y: () => {
              return `-${
                window.innerHeight -
                document.querySelector('.featured-post__wrapper').clientHeight -
                70
              }`;
            },
            ease: 'none',
          })
          .to('#front-page__col-02', {
            y: () => {
              return `-${
                document.querySelector('#section-about').clientHeight - 10
              }px`;
            },
            ease: 'none',
          });
      },
    });
  }
});
