const dropDownNav = () => {
  const subMenuItems = document.querySelectorAll('ul.sub-menu');

  function handleMenuPos() {
    const mediaQueryTablet = window.matchMedia('(min-width: 768px)');

    if (mediaQueryTablet.matches) {
      console.log('we going');
      subMenuItems.forEach((item) => {
        const itemParent = item.parentNode;

        // set ul.sub-menus padding-left value to the parent offsetLeft
        // Minus 1px to help with alignment
        item.style.paddingLeft = `${itemParent.offsetLeft - 1}px`;
      });
    }
  }

  handleMenuPos();
  window.addEventListener('resize', handleMenuPos);
};

export default dropDownNav;
