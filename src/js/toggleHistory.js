const toggleHistory = () => {
  const toggleBtn = document.querySelector('.section-toggle');
  const historySection = document.querySelector('#approach-timeline');
  const historySectionHeight = historySection.scrollHeight;

  if (window.location.href.indexOf('/#approach-timeline') > -1) {
    historySection.style.maxHeight = `${historySectionHeight}px`;
    toggleBtn.innerText = 'Close';
  } else {
    historySection.style.maxHeight = 0;
    toggleBtn.innerText = 'View History';
  }

  toggleBtn.addEventListener('click', () => {
    document.body.classList.toggle('history-open');

    if (document.body.classList.contains('history-open')) {
      historySection.style.maxHeight = `${historySectionHeight}px`;
      toggleBtn.innerText = 'Close';
    } else {
      historySection.style.maxHeight = 0;
      toggleBtn.innerText = 'View History';
    }
  });
};

export default toggleHistory;
