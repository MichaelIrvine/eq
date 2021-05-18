/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
import { gsap } from 'gsap';

const navigation = () => {
  const siteHeader = document.getElementById('site-header');
  const siteNavigation = document.getElementById('site-navigation');
  // GSAP Timeline for open/close mobile menu
  const navTl = gsap.timeline({ paused: true });
  // Return early if the navigation don't exist.
  if (!siteNavigation) {
    return;
  }

  const button = siteNavigation.getElementsByTagName('button')[0];

  // Return early if the button don't exist.
  if ('undefined' === typeof button) {
    return;
  }

  const menuContainer = siteNavigation.querySelector('.menu-main-container');
  const menu = siteNavigation.getElementsByTagName('ul')[0];

  // Hide menu toggle button if menu is empty and return early.
  if ('undefined' === typeof menu) {
    button.style.display = 'none';
    return;
  }

  if (!menu.classList.contains('nav-menu')) {
    menu.classList.add('nav-menu');
  }

  // *
  // GSAP Timeline
  // *

  navTl
    .to(document.body, { duration: 0, overflow: 'hidden' }, 0)
    .to(
      menuContainer,
      { duration: 0, height: '100vh', pointerEvents: 'all' },
      0
    )
    .to(
      menu,
      {
        duration: 0,
        height: '100vh',
        pointerEvents: 'all',
      },
      0
    )
    .to(
      menuContainer,
      {
        duration: 0.25,
        opacity: 1,
        ease: 'power2.out',
      },
      0
    )
    .to(menu, {
      duration: 0.3,
      delay: 0,
      opacity: 1,
      ease: 'power2.out',
    })
    .reverse();

  // Toggle the .toggled class and the aria-expanded value each time the button is clicked.
  button.addEventListener('click', function () {
    siteNavigation.classList.toggle('toggled');
    siteHeader.classList.toggle('nav-open');

    navTl.reversed(!navTl.reversed());

    if (button.getAttribute('aria-expanded') === 'true') {
      button.setAttribute('aria-expanded', 'false');
    } else {
      button.setAttribute('aria-expanded', 'true');
    }
  });

  // Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
  menuContainer.addEventListener('click', function (event) {
    const isClickInside = menu.contains(event.target);

    if (!isClickInside) {
      siteNavigation.classList.remove('toggled');
      siteHeader.classList.remove('nav-open');
      button.setAttribute('aria-expanded', 'false');
      navTl.reversed(!navTl.reversed());
    }
  });

  const mQ = window.matchMedia('(min-width: 768px)');

  window.addEventListener('resize', () => {
    if (mQ.matches && menuContainer.hasAttribute('style')) {
      document.body.removeAttribute('style');
      menuContainer.removeAttribute('style');
      menu.removeAttribute('style');
    }
  });

  // Get all the link elements within the menu.
  const links = menu.getElementsByTagName('a');

  // Get all the link elements with children within the menu.
  const linksWithChildren = menu.querySelectorAll(
    '.menu-item-has-children > a, .page_item_has_children > a'
  );

  // Toggle focus each time a menu link is focused or blurred.
  for (const link of links) {
    link.addEventListener('focus', toggleFocus, true);
    link.addEventListener('blur', toggleFocus, true);
  }

  // Toggle focus each time a menu link with children receive a touch event.
  for (const link of linksWithChildren) {
    link.addEventListener('touchstart', toggleFocus, false);
  }

  /**
   * Sets or removes .focus class on an element.
   */
  function toggleFocus() {
    if (event.type === 'focus' || event.type === 'blur') {
      let self = this;
      // Move up through the ancestors of the current link until we hit .nav-menu.
      while (!self.classList.contains('nav-menu')) {
        // On li elements toggle the class .focus.
        if ('li' === self.tagName.toLowerCase()) {
          self.classList.toggle('focus');
        }
        self = self.parentNode;
      }
    }

    if (event.type === 'touchstart') {
      const menuItem = this.parentNode;
      event.preventDefault();
      for (const link of menuItem.parentNode.children) {
        if (menuItem !== link) {
          link.classList.remove('focus');
        }
      }
      menuItem.classList.toggle('focus');
    }
  }
};

export default navigation;
