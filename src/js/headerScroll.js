const headerScroll = () => {
  if (document.body.classList.contains('home')) {
    window.addEventListener('scroll', () => {
      if (window.scrollY >= 100) {
        document.body.classList.remove('transparent-header');
      } else {
        document.body.classList.add('transparent-header');
      }
    });
  }
};

export default headerScroll;
