const navToggle = document.querySelector('.site-nav-toggle');
const siteNav = document.querySelector('.site-nav');
const navClose = document.querySelector('.mobile-nav-close');

function openMobileNav() {
    if (!siteNav) return;
    siteNav.classList.add('is-open');
    document.body.classList.add('nav-open');
    if (navToggle) navToggle.setAttribute('aria-expanded', 'true');
}

function closeMobileNav() {
    if (!siteNav) return;
    siteNav.classList.remove('is-open');
    document.body.classList.remove('nav-open');
    if (navToggle) navToggle.setAttribute('aria-expanded', 'false');
}

if (navToggle) {
    navToggle.addEventListener('click', openMobileNav);
}

if (navClose) {
    navClose.addEventListener('click', closeMobileNav);
}

if (siteNav) {
    siteNav.addEventListener('click', function(e) {
        if (e.target === siteNav) closeMobileNav();
    });
}

/* ── Mega Menu (desktop hover + mobile click) ── */
const megaMenuItems = document.querySelectorAll('.has-mega-menu');
const isMobile = () => window.innerWidth <= 920;

megaMenuItems.forEach((item) => {
    const link = item.querySelector(':scope > a');
    let hoverTimeout;

    item.addEventListener('mouseenter', () => {
        if (isMobile()) return;
        clearTimeout(hoverTimeout);
        closeMegaMenus();
        item.classList.add('is-open');
        if (link) link.setAttribute('aria-expanded', 'true');
    });

    item.addEventListener('mouseleave', () => {
        if (isMobile()) return;
        hoverTimeout = setTimeout(() => {
            item.classList.remove('is-open');
            if (link) link.setAttribute('aria-expanded', 'false');
        }, 120);
    });

    if (link) {
        link.addEventListener('click', (e) => {
            if (isMobile()) {
                e.preventDefault();
                const wasOpen = item.classList.contains('is-open');
                closeMegaMenus();
                if (!wasOpen) {
                    item.classList.add('is-open');
                    link.setAttribute('aria-expanded', 'true');
                }
            }
        });
    }
});

function closeMegaMenus() {
    megaMenuItems.forEach((m) => {
        m.classList.remove('is-open');
        const a = m.querySelector(':scope > a');
        if (a) a.setAttribute('aria-expanded', 'false');
    });
}

document.addEventListener('click', (e) => {
    if (!e.target.closest('.has-mega-menu')) {
        closeMegaMenus();
    }
});

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeMegaMenus();
});

const filterGroup = document.querySelector('[data-filter-group]');
const filterGrid = document.querySelector('[data-filter-grid]');

if (filterGroup && filterGrid) {
    const cards = Array.from(filterGrid.querySelectorAll('[data-category]'));
    const buttons = Array.from(filterGroup.querySelectorAll('[data-filter]'));

    buttons.forEach((button) => {
        button.addEventListener('click', () => {
            const selected = button.getAttribute('data-filter') || 'all';

            buttons.forEach((item) => item.classList.remove('is-active'));
            button.classList.add('is-active');

            cards.forEach((card) => {
                const category = card.getAttribute('data-category');
                const visible = selected === 'all' || category === selected;
                card.classList.toggle('is-hidden', !visible);
            });
        });
    });
}
