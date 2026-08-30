const currentPath = window.location.pathname;
document.querySelectorAll('nav a').forEach(link => {
    const linkPath = new URL(link.href, window.location.origin).pathname;

    if (currentPath === linkPath) {
        link.classList.add('active');
    }
});

const hamburger = document.querySelector('.hamburger');
const navMenu = document.querySelector('nav ul');

hamburger.addEventListener('click', () => {
  const isOpen = navMenu.classList.toggle('open');

  hamburger.setAttribute('aria-expanded', isOpen);
});