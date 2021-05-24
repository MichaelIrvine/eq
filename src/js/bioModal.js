import { gsap } from 'gsap';

const bioModal = () => {
  const openModalBtn = document.querySelectorAll('.btn--team-bio');

  openModalBtn.forEach((button) => {
    button.addEventListener('click', (e) => {
      const bioTl = gsap.timeline({ paused: true });
      const bioId = e.currentTarget.getAttribute('data-id');
      const bioToOpen = document.querySelector(`[data-bio-id='${bioId}']`);
      const bioPanel = bioToOpen.querySelector('.bio-panel');
      const bioCloseBtn = bioToOpen.querySelector('.panel-close');

      bioTl
        .to(document.body, { duration: 0, overflow: 'hidden' })
        .to(bioToOpen, {
          duration: 0,
          height: 'auto',
          minHeight: '100vh',
          pointerEvents: 'all',
          overflow: 'scroll',
        })
        .to(bioPanel, {
          duration: 0,
          height: 'auto',
          minHeight: '100vh',
          pointerEvents: 'all',
          overflow: 'scroll',
          padding: 15,
        })
        .to(bioToOpen, {
          delay: 0.25,
          duration: 0.3,
          opacity: 1,
          ease: 'power2.out',
        })
        .to(bioPanel, {
          duration: 0.3,
          delay: 0.1,
          opacity: 1,
          ease: 'power2.out',
        });

      bioTl.play();

      bioCloseBtn.addEventListener('click', () => {
        bioTl.reverse();
      });
      bioToOpen.addEventListener('click', () => {
        bioTl.reverse();
      });
    });
  });
};

export default bioModal;
