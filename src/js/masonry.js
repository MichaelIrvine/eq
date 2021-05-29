import Masonry from 'masonry-layout';

const masonryGallery = () => {
  window.onload = () => {
    const galleries = document.querySelectorAll('.masonry__wrapper');
    if (galleries) {
      galleries.forEach((gallery) => {
        const masonry = new Masonry(gallery, {
          itemSelector: '.gallery-item',
          gutter: 15,
          percentPosition: true,
        });
      });
    }
  };
};

export default masonryGallery;
