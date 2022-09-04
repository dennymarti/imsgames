function toggleNavMenu(event) {
    const navMenu = event.currentTarget.parentElement.querySelector('.nav-list');

    if (navMenu.classList.contains('show')) {
        navMenu.classList.remove('show');
    } else {
        navMenu.classList.add('show');
    }
}