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

// Autoplaying showcase videos must start muted; this toggle hands sound back to the visitor.
document.querySelectorAll('[data-video-sound]').forEach((button) => {
    const video = document.getElementById(button.getAttribute('data-video-sound'));
    if (!video) return;

    button.addEventListener('click', () => {
        video.muted = !video.muted;
        button.setAttribute('aria-pressed', String(!video.muted));
        if (!video.muted) video.play().catch(() => {});
    });
});

// AOS measures every element's position once, on load. Filtering a gallery
// resizes the grid, so cards the filter brings back — and any section that moves
// up into view behind it, such as the CTA band — stay stuck at opacity 0.
// Re-measure and reveal whatever is on screen after a filter click.
function revealVisibleAosElements() {
    if (window.AOS && typeof window.AOS.refresh === 'function') {
        window.AOS.refresh();
    }

    document.querySelectorAll('[data-aos]:not(.aos-animate)').forEach((el) => {
        if (el.offsetParent === null) return;
        const rect = el.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
            el.classList.add('aos-animate');
        }
    });
}

document.addEventListener('click', (event) => {
    if (!event.target.closest('[data-filter]')) return;
    requestAnimationFrame(revealVisibleAosElements);
});
