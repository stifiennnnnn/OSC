const currentPath = window.location.pathname;
document.querySelectorAll('nav a').forEach(link => {
    const linkPath = new URL(link.href, window.location.origin).pathname;

    if (currentPath === linkPath) {
        link.classList.add('active');
    }
});