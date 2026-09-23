/**
 * Made With Oats -- Shared Components Engine
 * Single Source of Truth for:
 * 1. Announcement Bar
 * 2. Header (Desktop & Mobile, with Search, Wishlist, Account, Cart)
 * 3. Search Slide-down Panel (with live product search)
 * 4. Cart Slide-out Drawer
 * 5. Global Footer
 * 6. Client-side Wishlist Store (localStorage)
 */

(function () {
    'use strict';

    // Global Product Image Fallback (Oatmeal panel #E6D8C0 with Fraunces brand & product name)
    function getProductImageFallback(name) {
        const title = (name || 'Handcrafted Snack').replace(/[<>&"]/g, function (c) {
            return { '<': '&lt;', '>': '&gt;', '&': '&amp;', '"': '&quot;' }[c];
        });
        const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="600" height="750" viewBox="0 0 600 750">
            <rect width="600" height="750" fill="#E6D8C0"/>
            <rect x="20" y="20" width="560" height="710" fill="none" stroke="#9A6B3F" stroke-width="1.5" stroke-opacity="0.4" rx="4"/>
            <text x="50%" y="45%" font-family="Fraunces, Georgia, serif" font-size="28" font-weight="600" fill="#3A2418" text-anchor="middle" dominant-baseline="middle">Made With Oats</text>
            <text x="50%" y="54%" font-family="Instrument Sans, sans-serif" font-size="16" fill="#5F6D4F" text-anchor="middle" dominant-baseline="middle">${title}</text>
        </svg>`;
        return 'data:image/svg+xml;charset=utf-8,' + encodeURIComponent(svg);
    }
    window.getProductImageFallback = getProductImageFallback;

    window.addEventListener('error', function (e) {
        if (e.target && e.target.tagName === 'IMG') {
            const img = e.target;
            if (img.dataset.hasFallback) return;
            img.dataset.hasFallback = 'true';
            img.onerror = null;
            img.src = getProductImageFallback(img.alt || 'Artisanal Snack');
        }
    }, true);

    // 1. Client-Side Wishlist Store
    const MWOWishlist = {
        STORAGE_KEY: 'mwo_wishlist_items',
        getWishlist: function () {
            try {
                const data = localStorage.getItem(this.STORAGE_KEY);
                return data ? JSON.parse(data) : [];
            } catch (e) {
                return [];
            }
        },
        has: function (sku) {
            return this.getWishlist().indexOf(sku) !== -1;
        },
        toggle: function (sku) {
            let list = this.getWishlist();
            const idx = list.indexOf(sku);
            let added = false;
            if (idx === -1) {
                list.push(sku);
                added = true;
            } else {
                list.splice(idx, 1);
            }
            try {
                localStorage.setItem(this.STORAGE_KEY, JSON.stringify(list));
            } catch (e) {}
            this.updateBadges();
            this.syncHeartButtons(sku, added);
            this.renderDrawerItems();
            if (typeof window.renderWishlistPage === 'function') {
                try { window.renderWishlistPage(); } catch (err) {}
            }
            const prod = window.MWOProducts ? window.MWOProducts.getBySku(sku) : null;
            const title = prod ? prod.name : sku;
            this.showToast(added ? `❤️ Saved "${title}" to your wishlist` : `Removed "${title}" from wishlist`);
            return added;
        },
        updateBadges: function () {
            const count = this.getWishlist().length;
            document.querySelectorAll('.wishlist-count-badge').forEach(badge => {
                badge.textContent = count;
                badge.style.display = count > 0 ? 'inline-flex' : 'none';
            });
        },
        syncHeartButtons: function (sku, isActive) {
            document.querySelectorAll(`[data-wishlist-sku="${sku}"]`).forEach(btn => {
                if (isActive) {
                    btn.classList.add('is-active');
                    btn.setAttribute('aria-label', 'Remove from wishlist');
                } else {
                    btn.classList.remove('is-active');
                    btn.setAttribute('aria-label', 'Add to wishlist');
                }
            });
        },
        syncAllHeartButtons: function () {
            const list = this.getWishlist();
            document.querySelectorAll('[data-wishlist-sku]').forEach(btn => {
                const sku = btn.getAttribute('data-wishlist-sku');
                const isActive = list.indexOf(sku) !== -1;
                if (isActive) {
                    btn.classList.add('is-active');
                    btn.setAttribute('aria-label', 'Remove from wishlist');
                } else {
                    btn.classList.remove('is-active');
                    btn.setAttribute('aria-label', 'Add to wishlist');
                }
            });
        },
        openDrawer: function () {
            const drawer = document.getElementById('wishlist-drawer');
            const overlay = document.getElementById('wishlist-drawer-overlay');
            if (drawer) drawer.classList.add('is-open');
            if (overlay) overlay.classList.add('is-visible');
            document.body.style.overflow = 'hidden';
            this.renderDrawerItems();
        },
        closeDrawer: function () {
            const drawer = document.getElementById('wishlist-drawer');
            const overlay = document.getElementById('wishlist-drawer-overlay');
            if (drawer) drawer.classList.remove('is-open');
            if (overlay) overlay.classList.remove('is-visible');
            document.body.style.overflow = '';
        },
        renderDrawerItems: function () {
            const container = document.getElementById('drawer-wishlist-items');
            if (!container) return;
            const items = this.getWishlist();
            if (items.length === 0) {
                container.innerHTML = `
                    <div class="empty-drawer-view" style="text-align: center; padding: 3rem 1rem; color: var(--color-text-muted);">
                        <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin: 0 auto 0.85rem; color: #9A6B3F; opacity: 0.6;"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                        <h4 style="font-size: 1.15rem; margin: 0 0 0.5rem; font-family: var(--font-heading, Georgia, serif); color: var(--color-espresso, #3A2418);">Your wishlist is empty</h4>
                        <p style="font-size: 0.85rem; margin-bottom: 1.5rem; max-width: 250px; margin-inline: auto; line-height: 1.5;">Click the heart icon on any small-batch snack to save your favorites here.</p>
                        <a href="shop.html" class="btn btn-primary btn-sm" onclick="MWOWishlist.closeDrawer();">Explore Handcrafted Snacks</a>
                    </div>
                `;
                return;
            }

            container.innerHTML = items.map(sku => {
                const p = window.MWOProducts ? window.MWOProducts.getBySku(sku) : null;
                if (!p) {
                    return `
                        <div class="drawer-item-row" style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem 0; border-bottom: 1px solid var(--color-border, rgba(154,107,63,0.15));">
                            <span>Saved Item (${sku})</span>
                            <button type="button" onclick="MWOWishlist.toggle('${sku}')" style="background:none; border:none; color:#a13; cursor:pointer; font-size:0.8rem;">Remove</button>
                        </div>
                    `;
                }
                const price = (p.sizes && p.sizes[0] && p.sizes[0].price) || p.base_price || 0;
                const size = (p.sizes && p.sizes[0] && p.sizes[0].label) || 'Standard';
                return `
                    <div class="drawer-item-row" style="display: flex; gap: 0.85rem; padding: 0.85rem 0; border-bottom: 1px solid var(--color-border, rgba(154,107,63,0.15)); align-items: center;">
                        <a href="product.html?sku=${p.sku}" style="flex-shrink: 0;" onclick="MWOWishlist.closeDrawer();">
                            <img src="${p.image}" alt="${p.name}" style="width: 60px; height: 60px; object-fit: cover; border-radius: var(--radius-sm, 6px); background: #FAF6EE;" width="60" height="60" onerror="this.onerror=null; if(window.getProductImageFallback) this.src=window.getProductImageFallback(this.alt);">
                        </a>
                        <div style="flex: 1; min-width: 0;">
                            <span style="font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; color: #5C6B4F; font-weight: 600;">${p.categoryLabel}</span>
                            <h4 style="font-size: 0.9rem; margin: 2px 0 4px; font-family: var(--font-body, sans-serif); font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <a href="product.html?sku=${p.sku}" style="color: inherit; text-decoration: none;" onclick="MWOWishlist.closeDrawer();">${p.name}</a>
                            </h4>
                            <div style="font-size: 0.85rem; font-weight: 700; color: var(--color-espresso, #3A2418); margin-bottom: 6px;">₹${price}</div>
                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                <button type="button" class="btn btn-primary btn-sm wishlist-btn-move-cart" onclick="MWOWishlist.moveToCart('${p.sku}', '${size}')" style="padding: 4px 10px; font-size: 0.75rem; border-radius: 4px;">Move to Bag</button>
                                <button type="button" class="wishlist-btn-remove" onclick="MWOWishlist.toggle('${p.sku}')" style="background: none; border: none; color: #a13; font-size: 0.75rem; cursor: pointer; text-decoration: underline;">Remove</button>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');
        },
        moveToCart: function (sku, size) {
            const prod = window.MWOProducts ? window.MWOProducts.getBySku(sku) : null;
            if (!prod) return;
            const v = (prod.sizes || []).find(s => s.label === size) || (prod.sizes && prod.sizes[0]);
            const price = v ? v.price : prod.base_price;
            const chosenSize = v ? v.label : 'Standard';

            if (window.MWOCart) {
                window.MWOCart.addItem({
                    sku: prod.sku,
                    name: prod.name,
                    size: chosenSize,
                    price: price,
                    image: prod.image,
                    qty: 1
                });
            }
            // Remove from wishlist
            let list = this.getWishlist();
            const idx = list.indexOf(sku);
            if (idx !== -1) {
                list.splice(idx, 1);
                try {
                    localStorage.setItem(this.STORAGE_KEY, JSON.stringify(list));
                } catch (e) {}
                this.updateBadges();
                this.syncHeartButtons(sku, false);
                this.renderDrawerItems();
                if (typeof window.renderWishlistPage === 'function') {
                    try { window.renderWishlistPage(); } catch (e) {}
                }
            }
            this.closeDrawer();
            if (window.MWOCart) {
                window.MWOCart.openDrawer();
            }
            this.showToast(`🛍️ Moved "${prod.name}" to shopping bag`);
        },
        showToast: function (msg) {
            let toast = document.getElementById('mwo-wishlist-toast');
            if (!toast) {
                toast = document.createElement('div');
                toast.id = 'mwo-wishlist-toast';
                toast.className = 'mwo-toast';
                document.body.appendChild(toast);
            }
            toast.textContent = msg;
            toast.classList.add('is-visible');
            clearTimeout(toast._timer);
            toast._timer = setTimeout(() => {
                toast.classList.remove('is-visible');
            }, 2800);
        }
    };
    window.MWOWishlist = MWOWishlist;

    // 2. Client-Side Cart Store (Harmonized with mwo_cart)
    const MWOCart = {
        STORAGE_KEY: 'mwo_cart',
        getItems: function () {
            try {
                const data = localStorage.getItem(this.STORAGE_KEY);
                return data ? JSON.parse(data) : [];
            } catch (e) {
                return [];
            }
        },
        saveItems: function (items) {
            try {
                localStorage.setItem(this.STORAGE_KEY, JSON.stringify(items));
            } catch (e) {}
            this.updateBadges();
            this.renderDrawerItems();
            if (window.MWOStore && typeof window.MWOStore.updateCartUI === 'function') {
                try { window.MWOStore.updateCartUI(); } catch (e) {}
            }
        },
        addItem: function (item) {
            // item can be: { sku, size/variant, price, name, image, qty }
            let items = this.getItems();
            let sku = item.sku;
            let size = item.size || item.variant || 'Standard';
            let qty = item.qty || 1;
            let price = Number(item.price) || 0;
            let name = item.name || '';
            let image = item.image || '';

            if (window.MWOProducts && (!name || !price || !image)) {
                const prod = window.MWOProducts.getBySku(sku);
                if (prod) {
                    name = name || prod.name;
                    image = image || prod.image;
                    const v = (prod.sizes || []).find(s => s.label === size) || (prod.sizes && prod.sizes[0]);
                    if (v) {
                        price = price || v.price;
                        size = v.label;
                    }
                }
            }

            const existing = items.find(i => i.sku === sku && (i.size === size || i.variant === size));
            if (existing) {
                existing.qty += qty;
            } else {
                items.push({
                    sku: sku,
                    variant: size,
                    size: size,
                    price: price,
                    name: name,
                    image: image,
                    qty: qty
                });
            }
            this.saveItems(items);
            this.openDrawer();
        },
        removeItem: function (sku, size) {
            let items = this.getItems().filter(i => !(i.sku === sku && (i.size === size || i.variant === size)));
            this.saveItems(items);
        },
        updateQty: function (sku, size, newQty) {
            let items = this.getItems();
            const item = items.find(i => i.sku === sku && (i.size === size || i.variant === size));
            if (item) {
                if (newQty <= 0) {
                    this.removeItem(sku, size);
                    return;
                }
                item.qty = Math.max(1, newQty);
                this.saveItems(items);
            }
        },
        getSubtotal: function () {
            return this.getItems().reduce((sum, item) => sum + (item.price * item.qty), 0);
        },
        getCount: function () {
            return this.getItems().reduce((sum, item) => sum + item.qty, 0);
        },
        updateBadges: function () {
            const count = this.getCount();
            document.querySelectorAll('.cart-count-badge, .cart-counter').forEach(badge => {
                badge.textContent = count;
                badge.style.display = count > 0 ? 'inline-flex' : 'none';
            });
        },
        openDrawer: function () {
            const drawer = document.getElementById('cart-drawer');
            const overlay = document.getElementById('cart-drawer-overlay');
            if (drawer) drawer.classList.add('is-open');
            if (overlay) overlay.classList.add('is-visible');
            document.body.style.overflow = 'hidden';
            this.renderDrawerItems();
        },
        closeDrawer: function () {
            const drawer = document.getElementById('cart-drawer');
            const overlay = document.getElementById('cart-drawer-overlay');
            if (drawer) drawer.classList.remove('is-open');
            if (overlay) overlay.classList.remove('is-visible');
            document.body.style.overflow = '';
        },
        renderDrawerItems: function () {
            const container = document.getElementById('drawer-cart-items');
            const subtotalEl = document.getElementById('drawer-subtotal-val');
            const freeShipMsg = document.getElementById('drawer-shipping-notice');
            if (!container) return;

            const items = this.getItems();
            const subtotal = this.getSubtotal();

            if (subtotalEl) subtotalEl.textContent = '₹' + subtotal;

            if (freeShipMsg) {
                const threshold = 1299;
                if (subtotal >= threshold) {
                    freeShipMsg.innerHTML = '🎉 You unlocked <strong>Free Delivery</strong> pan-India!';
                } else if (subtotal > 0) {
                    freeShipMsg.innerHTML = `Add <strong>₹${threshold - subtotal}</strong> more for Free Delivery!`;
                } else {
                    freeShipMsg.textContent = 'Free Delivery on orders above ₹1,299';
                }
            }

            if (items.length === 0) {
                container.innerHTML = `
                    <div class="empty-drawer-view" style="text-align: center; padding: 2.5rem 1rem; color: var(--color-text-muted);">
                        <p style="margin-bottom: 1.25rem;">Your shopping bag is empty.</p>
                        <a href="shop.html" class="btn btn-primary btn-sm" onclick="MWOCart.closeDrawer();">Explore Handcrafted Snacks</a>
                    </div>
                `;
                const checkoutBtn = document.getElementById('drawer-checkout-btn');
                if (checkoutBtn) checkoutBtn.style.display = 'none';
                return;
            }

            const checkoutBtn = document.getElementById('drawer-checkout-btn');
            if (checkoutBtn) checkoutBtn.style.display = 'inline-block';

            container.innerHTML = items.map(item => {
                const itemSize = item.size || item.variant || 'Standard';
                return `
                <div class="drawer-item-row" style="display: flex; gap: 0.85rem; padding: 0.85rem 0; border-bottom: 1px solid var(--color-border); align-items: center;">
                    <img src="${item.image || 'assets/images/logo.png'}" alt="${item.name}" style="width: 60px; height: 60px; object-fit: cover; border-radius: var(--radius-sm); background: #FAF6EE;" width="60" height="60">
                    <div style="flex: 1; min-width: 0;">
                        <h4 style="font-size: 0.9rem; margin: 0 0 0.25rem; font-family: var(--font-body); font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            ${item.name}
                        </h4>
                        <div style="font-size: 0.8rem; color: var(--color-text-secondary); margin-bottom: 0.35rem;">
                            Size: ${itemSize} &bull; ₹${item.price} each
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <div style="display: inline-flex; border: 1px solid var(--color-border); border-radius: var(--radius-sm); overflow: hidden;">
                                <button type="button" onclick="MWOCart.updateQty('${item.sku}', '${itemSize}', ${item.qty - 1})" style="background: none; border: none; padding: 2px 8px; cursor: pointer;">-</button>
                                <span style="padding: 2px 8px; font-size: 0.85rem; font-weight: 600;">${item.qty}</span>
                                <button type="button" onclick="MWOCart.updateQty('${item.sku}', '${itemSize}', ${item.qty + 1})" style="background: none; border: none; padding: 2px 8px; cursor: pointer;">+</button>
                            </div>
                            <button type="button" onclick="MWOCart.removeItem('${item.sku}', '${itemSize}')" style="background: none; border: none; color: #a13; font-size: 0.75rem; cursor: pointer; text-decoration: underline; margin-left: auto;">Remove</button>
                        </div>
                    </div>
                    <div style="font-size: 0.95rem; font-weight: 700; color: var(--color-espresso); text-align: right; min-width: 50px;">
                        ₹${item.price * item.qty}
                    </div>
                </div>
            `}).join('');
        }
    };
    window.MWOCart = MWOCart;

    // 3. HTML Components Templates
    const ComponentsTemplates = {
        announcementBar: function () {
            return `
                <aside class="announcement-bar" aria-label="Announcements">
                    <div class="container announcement-container">
                        <span class="announcement-desktop">Handcrafted in Small Batches &bull; 7 Days Delivery &bull; Free Delivery on Orders Above ₹1299</span>
                        <span class="announcement-mobile">7 Days Delivery &bull; Free Delivery Above ₹1299</span>
                    </div>
                </aside>
            `;
        },
        header: function (activePage) {
            return `
                <header id="masthead" class="site-header">
                    <div class="container header-inner">
                        <!-- Mobile Hamburger Button -->
                        <button type="button" class="mobile-nav-toggle" id="mobile-nav-toggle" aria-label="Open Navigation Menu" aria-controls="mobile-drawer" aria-expanded="false">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                        </button>

                        <!-- Brand Logo (Left) -->
                        <div class="site-branding">
                            <a href="index.html" class="site-logo-link" rel="home">
                                <img src="assets/images/logo.png" alt="Made With Oats" class="brand-logo-img" width="80" height="80">
                                <span class="brand-wordmark">Made With Oats</span>
                            </a>
                        </div>

                        <!-- Desktop Navigation (Center) -->
                        <nav class="main-navigation" aria-label="Primary Navigation">
                            <ul class="nav-menu">
                                <li class="nav-item ${activePage === 'home' ? 'is-current' : ''}">
                                    <a href="index.html" class="nav-link">Home</a>
                                </li>
                                <li class="nav-item has-dropdown ${activePage === 'shop' ? 'is-current' : ''}" id="desktop-nav-shop">
                                    <a href="shop.html" class="nav-link" id="shop-menu-trigger" aria-haspopup="true" aria-expanded="false">
                                        <span>Shop</span>
                                        <svg class="dropdown-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </a>
                                    <ul class="nav-dropdown" id="shop-dropdown-menu" role="menu" aria-label="Shop submenu">
                                        <li class="nav-dropdown-item"><a href="shop.html" class="dropdown-link" role="menuitem">All snacks</a></li>
                                        <li class="nav-dropdown-item"><a href="shop.html?cat=granola" class="dropdown-link" role="menuitem">Granola</a></li>
                                        <li class="nav-dropdown-item"><a href="shop.html?cat=bites" class="dropdown-link" role="menuitem">Indulgent Chocolate Bites</a></li>
                                        <li class="nav-dropdown-item"><a href="shop.html?cat=snack-bars" class="dropdown-link" role="menuitem">Snack Bars</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item ${activePage === 'granola' ? 'is-current' : ''}">
                                    <a href="shop.html?cat=granola" class="nav-link">Granola</a>
                                </li>
                                <li class="nav-item ${activePage === 'about' ? 'is-current' : ''}">
                                    <a href="about.html" class="nav-link">Our Story</a>
                                </li>
                                <li class="nav-item ${activePage === 'contact' ? 'is-current' : ''}">
                                    <a href="contact.html" class="nav-link">Contact</a>
                                </li>
                            </ul>
                        </nav>

                        <!-- Header Action Icons (Right) -->
                        <div class="header-actions">
                            <!-- Search -->
                            <button type="button" class="action-btn header-action-btn" id="btn-open-search" aria-label="Search" title="Search">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            </button>

                            <!-- Wishlist -->
                            <button type="button" class="action-btn header-action-btn" id="btn-header-wishlist" aria-label="Wishlist" title="Wishlist">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                <span class="action-count-badge wishlist-count-badge" style="display: none;">0</span>
                            </button>

                            <!-- Account -->
                            <a href="account.html" class="action-btn header-action-btn" id="btn-header-account" aria-label="Account" title="Account">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            </a>

                            <!-- Cart Trigger -->
                            <button type="button" class="action-btn header-action-btn cart-btn-pill" id="btn-header-cart" aria-label="Cart" title="Cart">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                <span class="action-count-badge cart-count-badge" style="display: none;">0</span>
                            </button>
                        </div>
                    </div>
                </header>

                <!-- Mobile Navigation Drawer -->
                <div id="mobile-drawer" class="mobile-drawer" aria-hidden="true">
                    <div class="drawer-header">
                        <div class="site-branding">
                            <span class="brand-wordmark" style="font-size: 1.35rem;">Made With Oats</span>
                        </div>
                        <button class="drawer-close-btn" id="mobile-drawer-close" aria-label="Close menu">&times;</button>
                    </div>
                    <ul class="mobile-nav-list">
                        <li><a href="index.html" class="mobile-nav-link">Home</a></li>
                        <li class="mobile-has-submenu">
                            <div class="mobile-submenu-row">
                                <a href="shop.html" class="mobile-nav-link">Shop</a>
                                <button type="button" class="mobile-submenu-toggle" id="mobile-shop-toggle" aria-expanded="false" aria-label="Toggle Shop categories">
                                    <svg class="mobile-submenu-chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                </button>
                            </div>
                            <ul class="mobile-submenu" id="mobile-shop-submenu" aria-label="Shop categories">
                                <li><a href="shop.html" class="mobile-submenu-link">All snacks</a></li>
                                <li><a href="shop.html?cat=granola" class="mobile-submenu-link">Granola</a></li>
                                <li><a href="shop.html?cat=bites" class="mobile-submenu-link">Indulgent Chocolate Bites</a></li>
                                <li><a href="shop.html?cat=snack-bars" class="mobile-submenu-link">Snack Bars</a></li>
                            </ul>
                        </li>
                        <li><a href="shop.html?cat=granola" class="mobile-nav-link">Granola</a></li>
                        <li><a href="about.html" class="mobile-nav-link">Our Story</a></li>
                        <li><a href="contact.html" class="mobile-nav-link">Contact</a></li>
                        <li style="margin-top: 1rem; border-top: 1px solid var(--color-border); padding-top: 1rem;">
                            <a href="wishlist.html" class="mobile-nav-link" id="mobile-nav-wishlist" style="display: flex; align-items: center; justify-content: space-between;">
                                <span>🤍 My Wishlist</span>
                                <span class="action-count-badge wishlist-count-badge" style="display: none; position: static;">0</span>
                            </a>
                        </li>
                        <li>
                            <a href="account.html" class="mobile-nav-link">👤 My Account</a>
                        </li>
                        <li>
                            <a href="track-order.html" class="mobile-nav-link">📦 Track Order</a>
                        </li>
                    </ul>
                    <div class="mobile-drawer-footer" style="padding: 1.5rem 1.25rem;">
                        <a href="https://wa.me/919619349819" class="whatsapp-pill" target="_blank" rel="noopener" style="width: 100%; justify-content: center;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2z"></path></svg>
                            <span>Chat on WhatsApp</span>
                        </a>
                    </div>
                </div>
                <div id="mobile-drawer-overlay" class="mobile-drawer-overlay"></div>
            `;
        },
        searchPanel: function () {
            return `
                <div id="search-modal" class="search-modal" hidden style="display: none;" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Search Catalogue">
                    <div class="search-modal-backdrop" id="search-modal-backdrop"></div>
                    <div class="search-modal-inner">
                        <div class="search-input-wrapper">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="search-input-icon"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            <input type="search" id="search-input" class="search-input-field" placeholder="Search granola, chocolate bites, snack bars..." autocomplete="off">
                            <button type="button" id="search-close-btn" class="search-close-btn" aria-label="Close search">&times;</button>
                        </div>
                        <div id="search-results" class="search-results-container">
                            <p class="search-hint">Type to search our handcrafted small-batch snacks...</p>
                        </div>
                    </div>
                </div>
            `;
        },
        cartDrawer: function () {
            return `
                <div id="cart-drawer" class="cart-drawer" aria-hidden="true" role="dialog" aria-label="Shopping Cart">
                    <div class="drawer-header" style="display: flex; justify-content: space-between; align-items: center; padding: 1.25rem 1.5rem; border-bottom: 1px solid var(--color-border);">
                        <h3 style="margin: 0; font-size: 1.2rem; font-family: var(--font-heading); color: var(--color-espresso);">Your Shopping Bag</h3>
                        <button id="cart-drawer-close" class="drawer-close-btn" aria-label="Close shopping bag">&times;</button>
                    </div>
                    <div id="drawer-shipping-notice" class="drawer-shipping-strip" style="background: var(--color-warm-cream); padding: 0.65rem 1.5rem; font-size: 0.825rem; color: var(--color-espresso); border-bottom: 1px solid var(--color-border); text-align: center;">
                        Free Delivery on orders above ₹1,299
                    </div>
                    <div id="drawer-cart-items" class="drawer-items-scroll" style="flex: 1; overflow-y: auto; padding: 1rem 1.5rem;">
                        <!-- Rendered by MWOCart -->
                    </div>
                    <div class="drawer-footer" style="padding: 1.25rem 1.5rem; border-top: 1px solid var(--color-border); background: var(--color-offwhite-clean);">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem; font-size: 1.1rem; font-weight: 700; color: var(--color-espresso);">
                            <span>Subtotal:</span>
                            <span id="drawer-subtotal-val">₹0</span>
                        </div>
                        <p style="font-size: 0.78rem; color: var(--color-text-muted); margin-bottom: 1rem;">Taxes included. Delivery calculated at checkout.</p>
                        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                            <a href="checkout.html" id="drawer-checkout-btn" class="btn btn-primary btn-block" style="text-align: center;">Proceed to Checkout</a>
                            <a href="cart.html" class="btn btn-secondary btn-block" onclick="MWOCart.closeDrawer();" style="text-align: center;">View Cart Details</a>
                        </div>
                    </div>
                </div>
                <div id="cart-drawer-overlay" class="cart-drawer-overlay"></div>
            `;
        },
        wishlistDrawer: function () {
            return `
                <div id="wishlist-drawer" class="wishlist-drawer" aria-hidden="true" role="dialog" aria-label="My Wishlist">
                    <div class="drawer-header" style="display: flex; justify-content: space-between; align-items: center; padding: 1.25rem 1.5rem; border-bottom: 1px solid var(--color-border);">
                        <div style="display: flex; align-items: center; gap: 0.6rem;">
                            <h3 style="margin: 0; font-size: 1.2rem; font-family: var(--font-heading); color: var(--color-espresso);">My Wishlist</h3>
                            <span class="action-count-badge wishlist-count-badge" style="display: none; position: static;">0</span>
                        </div>
                        <button id="wishlist-drawer-close" class="drawer-close-btn" aria-label="Close wishlist">&times;</button>
                    </div>
                    <div id="drawer-wishlist-items" class="drawer-items-scroll" style="flex: 1; overflow-y: auto; padding: 1rem 1.5rem;">
                        <!-- Rendered by MWOWishlist -->
                    </div>
                    <div class="drawer-footer" style="padding: 1.25rem 1.5rem; border-top: 1px solid var(--color-border); background: var(--color-offwhite-clean);">
                        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                            <a href="wishlist.html" class="btn btn-primary btn-block" style="text-align: center;">View Full Wishlist Page</a>
                            <button type="button" class="btn btn-secondary btn-block" onclick="MWOWishlist.closeDrawer();" style="text-align: center;">Continue Browsing</button>
                        </div>
                    </div>
                </div>
                <div id="wishlist-drawer-overlay" class="wishlist-drawer-overlay"></div>
            `;
        },
        footer: function () {
            return `
                <footer class="editorial-footer site-footer">
                    <div class="container footer-grid">
                        <!-- Brand Column -->
                        <div class="footer-col brand-col">
                            <div class="footer-branding">
                                <img src="assets/images/logo.png" alt="Made With Oats" class="footer-logo-img" width="52" height="52">
                                <span class="footer-brand-title">Made with Oats</span>
                            </div>
                            <p class="footer-tagline">
                                Naturally wholesome snacking, handcrafted in small batches in Mumbai. Made with whole rolled oats, roasted nuts, and chocolate.
                            </p>
                        </div>

                        <!-- Shop Column -->
                        <div class="footer-col footer-col-accordion">
                            <h4 class="footer-heading footer-accordion-heading">
                                <span>Shop Snacks</span>
                                <svg class="footer-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </h4>
                            <ul class="footer-links">
                                <li><a href="shop.html" class="footer-link">All snacks</a></li>
                                <li><a href="shop.html?cat=granola" class="footer-link">Granola</a></li>
                                <li><a href="shop.html?cat=bites" class="footer-link">Indulgent Chocolate Bites</a></li>
                                <li><a href="shop.html?cat=snack-bars" class="footer-link">Snack Bars</a></li>
                            </ul>
                        </div>

                        <!-- Customer Care Column -->
                        <div class="footer-col footer-col-accordion">
                            <h4 class="footer-heading footer-accordion-heading">
                                <span>Customer Care</span>
                                <svg class="footer-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </h4>
                            <ul class="footer-links">
                                <li><a href="track-order.html" class="footer-link">Track Your Order</a></li>
                                <li><a href="shipping.html" class="footer-link">Shipping &amp; Delivery</a></li>
                                <li><a href="returns.html" class="footer-link">Returns &amp; Refunds</a></li>
                                <li><a href="faq.html" class="footer-link">FAQs</a></li>
                                <li><a href="contact.html" class="footer-link">Contact Us</a></li>
                                <li><a href="privacy.html" class="footer-link">Privacy Policy</a></li>
                                <li><a href="terms.html" class="footer-link">Terms &amp; Conditions</a></li>
                            </ul>
                        </div>

                        <!-- Contact Info Column (Always open, vertical stack) -->
                        <div class="footer-col contact-col">
                            <h4 class="footer-heading">
                                <span>Get in Touch</span>
                            </h4>
                            <div class="footer-contact-stack">
                                <!-- Phone -->
                                <div class="footer-contact-row">
                                    <span class="footer-contact-icon" aria-hidden="true">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                    </span>
                                    <a href="tel:+919619349819" class="footer-contact-link phone-link">+91 96193 49819</a>
                                </div>
                                <!-- WhatsApp -->
                                <div class="footer-contact-row">
                                    <span class="footer-contact-icon" aria-hidden="true">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2z"></path></svg>
                                    </span>
                                    <a href="https://wa.me/918355869270" target="_blank" rel="noopener" class="footer-contact-link whatsapp-link">+91 83558 69270</a>
                                </div>
                                <!-- Email -->
                                <div class="footer-contact-row">
                                    <span class="footer-contact-icon" aria-hidden="true">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                    </span>
                                    <a href="mailto:madewithoats09@gmail.com" class="footer-contact-link email-link">madewithoats09@gmail.com</a>
                                </div>
                                <!-- Address -->
                                <div class="footer-contact-row">
                                    <span class="footer-contact-icon" aria-hidden="true">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    </span>
                                    <span class="footer-contact-text address-text">Malad West, Mumbai - 400095, India</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Bar with hairline above -->
                    <div class="container footer-bottom">
                        <div class="footer-legal-wrap">
                            <p class="footer-copyright">&copy; 2026 Made With Oats. All rights reserved.</p>
                            <div class="footer-legal-links">
                                <a href="privacy.html" class="footer-legal-link">Privacy Policy</a>
                                <span class="footer-legal-sep" aria-hidden="true">&bull;</span>
                                <a href="terms.html" class="footer-legal-link">Terms &amp; Conditions</a>
                            </div>
                        </div>
                        <div class="payment-badges" aria-label="Supported Payment Methods">
                            <span class="payment-badge-chip">UPI (GPay / PhonePe / Paytm)</span>
                            <span class="payment-badge-chip">Cards</span>
                            <span class="payment-badge-chip">NetBanking</span>
                            <span class="payment-badge-chip">100% Secure Prepaid</span>
                        </div>
                        <div class="footer-credit">
                            <a href="https://www.planetu.co.in" target="_blank" rel="noopener noreferrer" class="footer-credit-link">Designed by PlanetU</a>
                        </div>
                    </div>
                </footer>
            `;
        }
    };

    // 4. Auto-Mount Function
    function mountComponents() {
        const pageId = document.body.getAttribute('data-page') || '';

        // Mount Announcement Bar
        const annContainer = document.getElementById('site-announcement') || document.querySelector('site-announcement');
        if (annContainer) annContainer.innerHTML = ComponentsTemplates.announcementBar();

        // Mount Header
        const headerContainer = document.getElementById('site-header') || document.querySelector('site-header');
        if (headerContainer) headerContainer.innerHTML = ComponentsTemplates.header(pageId);

        // Mount Search Panel
        const searchContainer = document.getElementById('site-search-panel') || document.querySelector('site-search-panel');
        if (searchContainer) searchContainer.innerHTML = ComponentsTemplates.searchPanel();

        // Mount Cart Drawer
        const cartContainer = document.getElementById('site-cart-drawer') || document.querySelector('site-cart-drawer');
        if (cartContainer) cartContainer.innerHTML = ComponentsTemplates.cartDrawer();

        // Mount Wishlist Drawer
        let wishlistContainer = document.getElementById('site-wishlist-drawer') || document.querySelector('site-wishlist-drawer');
        if (!wishlistContainer) {
            wishlistContainer = document.createElement('div');
            wishlistContainer.id = 'site-wishlist-drawer';
            document.body.appendChild(wishlistContainer);
        }
        wishlistContainer.innerHTML = ComponentsTemplates.wishlistDrawer();

        // Mount Footer
        const footerContainer = document.getElementById('site-footer') || document.querySelector('site-footer');
        if (footerContainer) footerContainer.innerHTML = ComponentsTemplates.footer();

        // Bind Interactive Component States
        bindShopDropdownEvents();
        bindSearchEvents();
        bindMobileDrawerEvents();
        bindCartDrawerEvents();
        bindWishlistDrawerEvents();
        bindFooterAccordions();
        bindHeaderScroll();

        // Update Initial Badges
        MWOCart.updateBadges();
        MWOWishlist.updateBadges();
        MWOWishlist.syncAllHeartButtons();
    }

    function bindHeaderScroll() {
        const header = document.getElementById('masthead');
        if (!header) return;
        function onScroll() {
            if (window.scrollY > 20) {
                header.classList.add('is-scrolled');
            } else {
                header.classList.remove('is-scrolled');
            }
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    function bindShopDropdownEvents() {
        let shopMenuOpen = false;
        const shopItem = document.getElementById('desktop-nav-shop');
        const shopTrigger = document.getElementById('shop-menu-trigger');
        const shopDropdown = document.getElementById('shop-dropdown-menu');

        function setShopMenu(open) {
            shopMenuOpen = !!open;
            if (shopDropdown) {
                if (shopMenuOpen) shopDropdown.classList.add('is-open');
                else shopDropdown.classList.remove('is-open');
            }
            if (shopItem) {
                if (shopMenuOpen) shopItem.classList.add('is-open');
                else shopItem.classList.remove('is-open');
            }
            if (shopTrigger) {
                shopTrigger.setAttribute('aria-expanded', shopMenuOpen ? 'true' : 'false');
            }
        }

        if (shopItem && shopDropdown) {
            // Desktop hover
            shopItem.addEventListener('mouseenter', () => setShopMenu(true));
            shopItem.addEventListener('mouseleave', () => setShopMenu(false));

            // Desktop / touch click toggle
            if (shopTrigger) {
                shopTrigger.addEventListener('click', function (e) {
                    e.preventDefault();
                    setShopMenu(!shopMenuOpen);
                });
            }

            // Keyboard Escape
            shopItem.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    setShopMenu(false);
                    if (shopTrigger) shopTrigger.focus();
                }
            });

            // Click outside to close
            document.addEventListener('click', function (e) {
                if (shopMenuOpen && shopItem && !shopItem.contains(e.target)) {
                    setShopMenu(false);
                }
            });
        }
    }

    function bindSearchEvents() {
        let searchOpen = false;
        const modal = document.getElementById('search-modal');
        const backdrop = document.getElementById('search-modal-backdrop');
        const openBtn = document.getElementById('btn-open-search');
        const closeBtn = document.getElementById('search-close-btn');
        const input = document.getElementById('search-input');
        const results = document.getElementById('search-results');

        if (!modal) return;

        function setSearch(open) {
            searchOpen = !!open;
            if (searchOpen) {
                modal.removeAttribute('hidden');
                modal.style.display = 'flex';
                modal.classList.add('is-open', 'is-active');
                modal.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';
                if (input) {
                    input.value = '';
                    if (results) {
                        results.innerHTML = '<p class="search-hint">Type to search our handcrafted small-batch snacks...</p>';
                    }
                    setTimeout(() => input.focus(), 60);
                }
            } else {
                modal.classList.remove('is-open', 'is-active');
                modal.setAttribute('aria-hidden', 'true');
                modal.setAttribute('hidden', '');
                modal.style.display = 'none';
                document.body.style.overflow = '';
            }
        }

        if (openBtn) openBtn.addEventListener('click', () => setSearch(true));
        if (closeBtn) closeBtn.addEventListener('click', () => setSearch(false));
        if (backdrop) backdrop.addEventListener('click', () => setSearch(false));

        modal.addEventListener('click', function (e) {
            if (e.target === modal) setSearch(false);
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                if (searchOpen) setSearch(false);
            }
        });

        // Live Search Handler
        if (input && results && window.MWOProducts) {
            input.addEventListener('input', function () {
                const q = this.value.trim().toLowerCase();
                if (q.length === 0) {
                    results.innerHTML = '<p class="search-hint">Type to search our handcrafted small-batch snacks...</p>';
                    return;
                }
                const matches = window.MWOProducts.getActiveProducts().filter(p =>
                    p.name.toLowerCase().includes(q) ||
                    p.description.toLowerCase().includes(q) ||
                    p.categoryLabel.toLowerCase().includes(q)
                );

                if (matches.length === 0) {
                    results.innerHTML = `<p style="padding: 1.5rem 0; color: var(--color-toasted-brown);">No handcrafted creations found for "<strong>${escapeHtml(q)}</strong>".</p>`;
                    return;
                }

                results.innerHTML = matches.map(p => `
                    <a href="product.html?sku=${p.sku}" class="search-result-row">
                        <img src="${p.image}" alt="${p.name}" class="search-result-thumb" width="48" height="48">
                        <div style="flex: 1; min-width: 0;">
                            <div class="search-result-cat">${p.categoryLabel}</div>
                            <div class="search-result-name">${p.name}</div>
                        </div>
                        <div class="search-result-price">From ₹${p.base_price}</div>
                    </a>
                `).join('');
            });
        }
    }

    function bindMobileDrawerEvents() {
        const toggle = document.getElementById('mobile-nav-toggle');
        const drawer = document.getElementById('mobile-drawer');
        const overlay = document.getElementById('mobile-drawer-overlay');
        const closeBtn = document.getElementById('mobile-drawer-close');
        const shopToggle = document.getElementById('mobile-shop-toggle');
        const shopSubmenu = document.getElementById('mobile-shop-submenu');

        if (!drawer) return;

        function openDrawer() {
            drawer.classList.add('is-open');
            if (overlay) overlay.classList.add('is-visible', 'is-active');
            if (toggle) toggle.setAttribute('aria-expanded', 'true');
            document.body.style.overflow = 'hidden';
        }
        function closeDrawer() {
            drawer.classList.remove('is-open');
            if (overlay) overlay.classList.remove('is-visible', 'is-active');
            if (toggle) toggle.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        }

        if (toggle) toggle.addEventListener('click', openDrawer);
        if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
        if (overlay) overlay.addEventListener('click', closeDrawer);

        let mobileShopOpen = false;
        if (shopToggle && shopSubmenu) {
            shopToggle.addEventListener('click', function () {
                mobileShopOpen = !mobileShopOpen;
                if (mobileShopOpen) {
                    shopSubmenu.classList.add('is-open');
                    shopToggle.setAttribute('aria-expanded', 'true');
                } else {
                    shopSubmenu.classList.remove('is-open');
                    shopToggle.setAttribute('aria-expanded', 'false');
                }
            });
        }
    }

    function bindCartDrawerEvents() {
        const cartBtn = document.getElementById('btn-header-cart');
        const closeBtn = document.getElementById('cart-drawer-close');
        const overlay = document.getElementById('cart-drawer-overlay');

        if (cartBtn) cartBtn.addEventListener('click', () => MWOCart.openDrawer());
        if (closeBtn) closeBtn.addEventListener('click', () => MWOCart.closeDrawer());
        if (overlay) overlay.addEventListener('click', () => MWOCart.closeDrawer());
    }

    function bindWishlistDrawerEvents() {
        const wishlistBtn = document.getElementById('btn-header-wishlist');
        const closeBtn = document.getElementById('wishlist-drawer-close');
        const overlay = document.getElementById('wishlist-drawer-overlay');

        if (wishlistBtn) wishlistBtn.addEventListener('click', () => MWOWishlist.openDrawer());
        if (closeBtn) closeBtn.addEventListener('click', () => MWOWishlist.closeDrawer());
        if (overlay) overlay.addEventListener('click', () => MWOWishlist.closeDrawer());

        // Global click delegation for [data-wishlist-sku]
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('[data-wishlist-sku]');
            if (btn) {
                e.preventDefault();
                e.stopPropagation();
                const sku = btn.getAttribute('data-wishlist-sku');
                if (sku) {
                    MWOWishlist.toggle(sku);
                }
            }
        });

        // Sync across tabs
        window.addEventListener('storage', function (e) {
            if (e.key === MWOWishlist.STORAGE_KEY) {
                MWOWishlist.updateBadges();
                MWOWishlist.syncAllHeartButtons();
                MWOWishlist.renderDrawerItems();
                if (typeof window.renderWishlistPage === 'function') {
                    try { window.renderWishlistPage(); } catch (err) {}
                }
            }
        });
    }

    function bindFooterAccordions() {
        document.querySelectorAll('.footer-accordion-heading').forEach(heading => {
            heading.addEventListener('click', function () {
                if (window.innerWidth <= 768) {
                    const parent = this.closest('.footer-col-accordion');
                    if (parent) {
                        parent.classList.toggle('is-open');
                    }
                }
            });
        });
    }

    function escapeHtml(str) {
        return str.replace(/[&<>'"]/g, tag => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            "'": '&#39;',
            '"': '&quot;'
        }[tag] || tag));
    }

    // Initialize on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', mountComponents);
    } else {
        mountComponents();
    }
})();
