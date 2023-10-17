const nav = document.getElementById('nav');
  let lastScrollTop = 0;

  window.addEventListener('scroll', () => {
    const scrollTop = window.scrollY || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
      // Scrolling down, hide the nav
      nav.classList.add('hidden');
    } else {
      // Scrolling up, show the nav
      nav.classList.remove('hidden');
    }

    lastScrollTop = scrollTop;
  });
