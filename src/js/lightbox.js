const lightbox = () => {
  const lightbox = document.createElement('div');
  lightbox.id = 'lightbox';
  document.body.appendChild(lightbox);

  // Find all Project Images and add lightbox class
  const projImages = document.querySelectorAll('.flex-col img');

  projImages.forEach((pI) => {
    pI.classList.add('lightbox-image');
  });

  const images = document.querySelectorAll('.lightbox-image');
  images.forEach((image) => {
    image.addEventListener('click', (e) => {
      document.body.style.overflow = 'hidden';
      lightbox.classList.add('active');
      const img = document.createElement('img');
      img.src = image.src;
      while (lightbox.firstChild) {
        lightbox.removeChild(lightbox.firstChild);
      }
      lightbox.appendChild(img);
    });
  });

  lightbox.addEventListener('click', (e) => {
    if (e.target !== e.currentTarget) return;
    lightbox.classList.remove('active');
    document.body.style.overflow = 'auto';
  });
  window.addEventListener('resize', () => {
    lightbox.classList.remove('active');
    document.body.style.overflow = 'auto';
  });
};

export default lightbox;
