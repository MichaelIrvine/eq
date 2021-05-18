const heroAnim = () => {
  window.addEventListener('load', removeLoadingClass);
  function removeLoadingClass() {
    document.body.classList.remove('js-loading');
  }
};

export default heroAnim;
