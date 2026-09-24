/**
 * Made With Oats — Editorial Navigation Script
 * Lightweight, zero dependencies, accessible mobile drawer
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Sticky Header Scroll State
  const header = document.querySelector('.site-header');
  if (header) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 15) {
        header.classList.add('is-scrolled');
      } else {
        header.classList.remove('is-scrolled');
      }
    }, { passive: true });
  }

  // 2. Mobile Drawer Controls
  const mobileToggle = document.querySelector('.mobile-nav-toggle');
  const mobileDrawer = document.querySelector('.mobile-drawer');
  const drawerOverlay = document.querySelector('.mobile-drawer-overlay');
  const drawerCloseBtn = document.querySelector('.drawer-close-btn');
  const drawerLinks = document.querySelectorAll('.mobile-nav-link, .mobile-sub-link');

  function openDrawer() {
    if (mobileDrawer && drawerOverlay) {
      mobileDrawer.classList.add('is-open', 'is-active');
      drawerOverlay.classList.add('is-active');
      mobileToggle.setAttribute('aria-expanded', 'true');
      document.body.style.overflow = 'hidden';
    }
  }

  function closeDrawer() {
    if (mobileDrawer && drawerOverlay) {
      mobileDrawer.classList.remove('is-open', 'is-active');
      drawerOverlay.classList.remove('is-active');
      if (mobileToggle) mobileToggle.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    }
  }

  if (mobileToggle) mobileToggle.addEventListener('click', openDrawer);
  if (drawerCloseBtn) drawerCloseBtn.addEventListener('click', closeDrawer);
  if (drawerOverlay) drawerOverlay.addEventListener('click', closeDrawer);

  drawerLinks.forEach(link => {
    link.addEventListener('click', closeDrawer);
  });

  // Close drawer on Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      closeDrawer();
    }
  });

  // 3. Smooth scroll for internal links (e.g. #granola)
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const targetId = this.getAttribute('href');
      if (targetId.length > 1) {
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
          e.preventDefault();
          const headerOffset = 64;
          const elementPosition = targetElement.getBoundingClientRect().top;
          const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

          window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
          });
        }
      }
    });
  });

  // 4. Mobile Footer Accordions (Shop Snacks & Customer Care)
  function initFooterAccordions() {
    const headings = document.querySelectorAll('.footer-accordion-heading');
    headings.forEach(heading => {
      if (heading.dataset.accordionBound === 'true') return;
      heading.dataset.accordionBound = 'true';

      function toggle(e) {
        if (window.matchMedia('(max-width: 768px)').matches) {
          if (e) {
            e.preventDefault();
            e.stopPropagation();
          }
          const parent = heading.closest('.footer-col-accordion');
          if (parent) {
            const isOpen = parent.classList.toggle('is-open');
            heading.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
          }
        }
      }

      heading.addEventListener('click', toggle);
      heading.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          toggle(e);
        }
      });
    });
  }

  initFooterAccordions();
});

