const headerScroll = () => {
  const siteHeader = document.querySelector('#site-header');

  window.addEventListener('scroll', () => {
    if (window.scrollY >= 100) {
      document.body.classList.remove('transparent-header');
      siteHeader.classList.add('is-scrolled');
    } else {
      document.body.classList.add('transparent-header');
      siteHeader.classList.remove('is-scrolled');
    }
  });
};

export default headerScroll;
