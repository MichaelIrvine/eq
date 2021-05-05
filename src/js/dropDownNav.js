const dropDownNav = () => {
  const navEl = document.querySelector('.menu-item:last-of-type');
  const subNavEl = document.querySelector('.sub-menu .menu-item');

  const updateSubNavWidth = () => {
    let navElWidth = navEl.clientWidth;
    subNavEl.style.width = `${navElWidth}px`;
  };

  window.addEventListener('DOMContentLoaded', updateSubNavWidth);
  window.addEventListener('resize', updateSubNavWidth);
};

export default dropDownNav;
