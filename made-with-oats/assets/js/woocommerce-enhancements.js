/**
 * Made With Oats - WooCommerce Interactivity & UX Enhancements
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Homepage Product Category Filter Pills
  const filterPills = document.querySelectorAll('.filter-pill');
  const productCards = document.querySelectorAll('.product-card[data-category]');

  filterPills.forEach(pill => {
    pill.addEventListener('click', () => {
      filterPills.forEach(p => p.classList.remove('is-active'));
      pill.classList.add('is-active');

      const targetCategory = pill.getAttribute('data-filter');
      productCards.forEach(card => {
        if (targetCategory === 'all' || card.getAttribute('data-category') === targetCategory) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  // 2. Single Product Image Gallery Thumbnails
  const thumbBtns = document.querySelectorAll('.gallery-thumb-btn');
  const mainImg = document.querySelector('.gallery-main-img');

  thumbBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      thumbBtns.forEach(b => b.classList.remove('is-active'));
      btn.classList.add('is-active');

      const fullSrc = btn.getAttribute('data-full-img');
      if (mainImg && fullSrc) {
        mainImg.style.opacity = '0.5';
        mainImg.src = fullSrc;
        setTimeout(() => {
          mainImg.style.opacity = '1';
        }, 150);
      }
    });
  });

  // 3. Single Product Information Tabs
  const tabBtns = document.querySelectorAll('.tab-nav-btn');
  const tabPanes = document.querySelectorAll('.tab-pane');

  tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const targetTab = btn.getAttribute('data-tab');
      tabBtns.forEach(b => b.classList.remove('is-active'));
      tabPanes.forEach(p => p.classList.remove('is-active'));

      btn.classList.add('is-active');
      const activePane = document.getElementById(`tab-${targetTab}`);
      if (activePane) activePane.classList.add('is-active');
    });
  });

  // 4. Quantity Increment / Decrement
  document.querySelectorAll('.qty-control').forEach(control => {
    const decBtn = control.querySelector('.qty-dec');
    const incBtn = control.querySelector('.qty-inc');
    const input = control.querySelector('.qty-input');

    if (decBtn && incBtn && input) {
      decBtn.addEventListener('click', () => {
        let val = parseInt(input.value, 10) || 1;
        if (val > 1) {
          input.value = val - 1;
          input.dispatchEvent(new Event('change', { bubbles: true }));
        }
      });

      incBtn.addEventListener('click', () => {
        let val = parseInt(input.value, 10) || 1;
        input.value = val + 1;
        input.dispatchEvent(new Event('change', { bubbles: true }));
      });
    }
  });

  // 5. Wishlist Heart Toggle
  document.querySelectorAll('.wishlist-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      btn.classList.toggle('is-active');
      const icon = btn.querySelector('svg');
      if (btn.classList.contains('is-active')) {
        btn.style.color = 'var(--color-ruby-berry)';
        if (icon) icon.setAttribute('fill', 'currentColor');
      } else {
        btn.style.color = 'var(--color-espresso)';
        if (icon) icon.setAttribute('fill', 'none');
      }
    });
  });

  // 6. Interactive Add-To-Cart Feedback
  document.querySelectorAll('.btn-add-to-cart, .btn-single-add').forEach(btn => {
    btn.addEventListener('click', function(e) {
      if (!this.closest('form')) {
        // Standalone button demo animation
        const originalText = this.innerHTML;
        this.innerHTML = '<span>✓ Added to Cart</span>';
        this.style.backgroundColor = 'var(--color-sprout-green)';
        this.style.color = '#ffffff';

        // Increment cart counter in header
        const cartBadge = document.querySelector('.cart-counter');
        if (cartBadge) {
          let count = parseInt(cartBadge.textContent, 10) || 0;
          cartBadge.textContent = count + 1;
          cartBadge.style.transform = 'scale(1.3)';
          setTimeout(() => {
            cartBadge.style.transform = 'scale(1)';
          }, 300);
        }

        setTimeout(() => {
          this.innerHTML = originalText;
          this.style.backgroundColor = '';
          this.style.color = '';
        }, 1800);
      }
    });
  });
});
