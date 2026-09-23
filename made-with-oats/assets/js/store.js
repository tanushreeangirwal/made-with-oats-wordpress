/**
 * Made With Oats -- Central Store & Cart Engine
 * Handles catalog database, localStorage persistence, cart drawer, checkout, auth, and orders.
 */

(function () {
    'use strict';

    const FREE_SHIPPING_THRESHOLD = 1299;

    // Canonical Products Database (DH001 omitted, BUNDLE001 included)
    const productsDB = {
        'G001': {
            sku: 'G001',
            name: 'Dark Chocolate Blueberry & Cranberry Granola',
            cat: 'granola',
            catLabel: 'Granola',
            bestseller: true,
            desc: 'Whole rolled oats clustered with decadent dark chocolate, tart blueberries, sweet cranberries, and crunchy almonds.',
            image: 'assets/images/products/g001-dark-chocolate-granola.jpg',
            variants: [
                { label: '100g', price: 170, image: 'assets/images/products/g001-100-200g-granola.jpg' },
                { label: '200g', price: 260, image: 'assets/images/products/g001-100-200g-granola.jpg' },
                { label: '500g', price: 599, image: 'assets/images/products/g001-dark-chocolate-granola.jpg' }
            ],
            ingredients: ['Rolled Oats', 'Dark Chocolate', 'Almonds', 'Blueberry', 'Cranberry', 'Pumpkin Seeds', 'Sunflower Seeds', 'Flax Seeds', 'Cocoa Powder', 'Cold Pressed Coconut Oil', 'Honey'],
            allergens: 'Contains Nuts',
            shelfLife: '30 days',
            storage: 'Store in a cool, dry place in an airtight container.'
        },
        'G002': {
            sku: 'G002',
            name: 'Peanut Butter & Dark Chocolate Granola',
            cat: 'granola',
            catLabel: 'Granola',
            bestseller: false,
            desc: 'Creamy roasted peanut butter swirled with whole rolled oats, dark chocolate chips, and wildflower honey.',
            image: 'assets/images/products/g002-peanut-butter-granola.jpg',
            variants: [
                { label: '100g', price: 180 },
                { label: '200g', price: 270 },
                { label: '500g', price: 699 }
            ],
            ingredients: ['Rolled Oats', 'Peanut Butter', 'Dark Chocolate', 'Almonds', 'Pumpkin Seeds', 'Sunflower Seeds', 'Flax Seeds', 'Honey'],
            allergens: 'Contains Peanuts, Tree Nuts',
            shelfLife: '30 days',
            storage: 'Store in a cool, dry place in an airtight container.'
        },
        'G003': {
            sku: 'G003',
            name: 'Almond Raisin Granola',
            cat: 'granola',
            catLabel: 'Granola',
            bestseller: false,
            desc: 'Golden jumbo oats roasted with California almonds, plump sun-dried raisins, aromatic Ceylon cinnamon, and mild natural nectar.',
            image: 'assets/images/products/g003-almond-raisin-granola.jpg',
            variants: [
                { label: '100g', price: 150 },
                { label: '200g', price: 260 },
                { label: '500g', price: 549 }
            ],
            ingredients: ['Rolled Oats', 'Almonds', 'Raisins', 'Pumpkin Seeds', 'Sunflower Seeds', 'Flax Seeds', 'Honey', 'Cinnamon Powder', 'Vanilla Essence'],
            allergens: 'Contains Nuts',
            shelfLife: '30 days',
            storage: 'Store in a cool, dry place in an airtight container.'
        },
        'CB001': {
            sku: 'CB001',
            name: 'Chocolate Rajgira Bites',
            cat: 'bites',
            catLabel: 'Indulgent Chocolate Bites',
            bestseller: true,
            desc: 'Traditional nutrient-dense puffed rajgira (amaranth) coated in dark chocolate. Bite-sized guilt-free crunch.',
            image: 'assets/images/products/cb001-chocolate-rajgira-bites.jpg',
            variants: [
                { label: '250g', price: 350, image: 'assets/images/products/cb001-250g-rajgira-bites.jpg' },
                { label: '500g', price: 550, image: 'assets/images/products/cb001-chocolate-rajgira-bites.jpg' },
                { label: '1kg', price: 999, image: 'assets/images/products/cb001-1kg-rajgira-bites.jpg' }
            ],
            ingredients: ['Dark Chocolate', 'Puffed Rajgira'],
            allergens: 'Made in facility with Nuts',
            shelfLife: '20 days',
            storage: 'Store in refrigerator.'
        },
        'CB002': {
            sku: 'CB002',
            name: 'Intense Dark Chocolate Rajgira Bites',
            cat: 'bites',
            catLabel: 'Indulgent Chocolate Bites',
            bestseller: true,
            positioning: 'Rich Dark Chocolate',
            desc: 'Luxurious artisanal bites crafted with rich dark chocolate and indigenous puffed amaranth.',
            image: 'assets/images/products/cb002-rajgira-bites-250g.webp',
            variants: [
                { label: '250g', price: 599, image: 'assets/images/products/cb002-rajgira-bites-250g.webp' },
                { label: '500g', price: 899, image: 'assets/images/products/cb002-rajgira-bites-500g.webp' },
                { label: '1kg', price: 1399, image: 'assets/images/products/cb002-rajgira-bites-1kg.webp' }
            ],
            ingredients: ['Rich Dark Chocolate', 'Puffed Rajgira'],
            allergens: 'Vegetarian',
            shelfLife: '20 days',
            storage: 'Store in refrigerator.'
        },
        'CB003': {
            sku: 'CB003',
            name: 'Intense Dark Chocolate Rajgira Bars',
            cat: 'snack-bars',
            catLabel: 'Snack Bars',
            bestseller: false,
            positioning: 'Rich Dark Chocolate',
            desc: 'On-the-go snack bar infused with rich dark chocolate and crispy puffed rajgira.',
            image: 'assets/images/products/cb003-rajgira-bar-40g.webp',
            variants: [
                { label: 'Single Bar (35g)', price: 95, image: 'assets/images/products/cb003-rajgira-bar-40g.webp' },
                { label: 'Pack of 3', price: 270, image: 'assets/images/products/cb003-rajgira-bar-40g.webp' },
                { label: 'Pack of 6', price: 510, image: 'assets/images/products/cb003-rajgira-bar-40g.webp' }
            ],
            ingredients: ['Intense Dark Chocolate', 'Puffed Rajgira'],
            allergens: 'Made in facility with Nuts',
            shelfLife: '20 days',
            storage: 'Store in refrigerator.'
        },
        'GB001': {
            sku: 'GB001',
            name: 'Triple Seed Crunch',
            cat: 'snack-bars',
            catLabel: 'Snack Bars',
            bestseller: false,
            desc: 'Power-packed seed bar with pumpkin, flax, and sunflower seeds, sweet Arabian dates, and virgin coconut oil.',
            image: 'assets/images/products/gb001-triple-seed-bar.jpg',
            variants: [
                { label: 'Single', price: 65, image: 'assets/images/products/gb001-triple-seed-bar.jpg' },
                { label: 'Pack of 3', price: 190 },
                { label: 'Pack of 6', price: 370, image: 'assets/images/products/gb001-triple-seed-bundle.jpg' },
                { label: 'Pack of 12', price: 750 }
            ],
            ingredients: ['Pumpkin Seeds', 'Flax Seeds', 'Sunflower Seeds', 'Rolled Oats', 'Dates', 'Cold Pressed Coconut Oil'],
            allergens: 'Made in facility with Nuts',
            shelfLife: '30 days',
            storage: 'Store in a cool, dry place.'
        },
        'GB002': {
            sku: 'GB002',
            name: 'Dark Chocolate Bliss',
            cat: 'snack-bars',
            catLabel: 'Snack Bars',
            bestseller: true,
            desc: 'Irresistible dark chocolate and peanut butter granola bar with toasted sunflower seeds and whole rolled oats.',
            image: 'assets/images/products/gb002-dark-chocolate-bliss.jpg',
            variants: [
                { label: 'Single', price: 80, image: 'assets/images/products/gb002-dark-chocolate-bliss.jpg' },
                { label: 'Pack of 3', price: 220 },
                { label: 'Pack of 6', price: 450, image: 'assets/images/products/gb002-dark-chocolate-bliss-bundle.jpg' },
                { label: 'Pack of 12', price: 940 }
            ],
            ingredients: ['Dark Chocolate', 'Sunflower Seeds', 'Rolled Oats', 'Cold Pressed Coconut Oil', 'Honey', 'Peanut Butter'],
            allergens: 'Contains Peanuts',
            shelfLife: '30 days',
            storage: 'Store in a cool, dry place.'
        }
    };

    // Cart Management
    function getCart() {
        try {
            const raw = localStorage.getItem('mwo_cart');
            return raw ? JSON.parse(raw) : [];
        } catch (e) {
            console.error('Failed to read cart from localStorage', e);
            return [];
        }
    }

    function saveCart(cart) {
        try {
            localStorage.setItem('mwo_cart', JSON.stringify(cart));
            updateCartUI();
        } catch (e) {
            console.error('Failed to save cart to localStorage', e);
        }
    }

    function addToCart(sku, variantLabel, qty) {
        qty = parseInt(qty, 10) || 1;
        const prod = productsDB[sku];
        if (!prod) return;

        let variant = prod.variants.find(v => v.label === variantLabel) || prod.variants[0];
        const price = variant.price || 0;
        const image = variant.image || prod.image;

        const cart = getCart();
        const existingIndex = cart.findIndex(item => item.sku === sku && item.variant === variant.label);

        if (existingIndex > -1) {
            cart[existingIndex].qty += qty;
        } else {
            cart.push({
                sku: prod.sku,
                name: prod.name,
                variant: variant.label,
                price: price,
                qty: qty,
                image: image
            });
        }

        saveCart(cart);
        openCartDrawer();
    }

    function updateQty(index, newQty) {
        const cart = getCart();
        if (index >= 0 && index < cart.length) {
            if (newQty <= 0) {
                cart.splice(index, 1);
            } else {
                cart[index].qty = newQty;
            }
            saveCart(cart);
        }
    }

    function removeFromCart(index) {
        const cart = getCart();
        if (index >= 0 && index < cart.length) {
            cart.splice(index, 1);
            saveCart(cart);
        }
    }

    function clearCart() {
        saveCart([]);
    }

    function getCartCount() {
        const cart = getCart();
        return cart.reduce((sum, item) => sum + (parseInt(item.qty, 10) || 0), 0);
    }

    function getCartSubtotal() {
        const cart = getCart();
        return cart.reduce((sum, item) => sum + (item.price * (parseInt(item.qty, 10) || 0)), 0);
    }

    // Orders Management
    function getOrders() {
        try {
            const raw = localStorage.getItem('mwo_orders');
            return raw ? JSON.parse(raw) : [];
        } catch (e) {
            return [];
        }
    }

    function createOrder(orderData) {
        const orders = getOrders();
        const randomNum = Math.floor(1000 + Math.random() * 9000);
        const orderId = 'MWO-' + randomNum;
        const newOrder = {
            id: orderId,
            date: new Date().toLocaleDateString('en-IN', { day: 'numeric', month: 'short', year: 'numeric' }),
            items: orderData.items || getCart(),
            subtotal: orderData.subtotal || getCartSubtotal(),
            shippingFee: orderData.shippingFee || 0,
            total: orderData.total || (orderData.subtotal + orderData.shippingFee),
            customer: orderData.customer || {},
            paymentMethod: orderData.paymentMethod || 'UPI',
            status: 'Baked & Packed'
        };
        orders.unshift(newOrder);
        try {
            localStorage.setItem('mwo_orders', JSON.stringify(orders));
        } catch (e) {
            console.error(e);
        }
        clearCart();
        return newOrder;
    }

    // User / Auth Management
    function getCurrentUser() {
        try {
            const raw = localStorage.getItem('mwo_user');
            return raw ? JSON.parse(raw) : null;
        } catch (e) {
            return null;
        }
    }

    function setCurrentUser(user) {
        try {
            if (user) {
                localStorage.setItem('mwo_user', JSON.stringify(user));
            } else {
                localStorage.removeItem('mwo_user');
            }
        } catch (e) {}
    }

    // DOM Injections & UI Handling
    function updateCartUI() {
        const count = getCartCount();
        const subtotal = getCartSubtotal();

        // Update all cart counters
        document.querySelectorAll('.cart-counter').forEach(el => {
            el.textContent = count;
            el.style.display = count > 0 ? 'flex' : 'inline-flex';
        });

        // Re-render Cart Drawer if present
        renderCartDrawerContent();

        // Dispatch custom event for cart page
        window.dispatchEvent(new CustomEvent('mwo_cart_updated', { detail: { count, subtotal } }));
    }

    function injectCartDrawer() {
        if (document.getElementById('cartDrawerOverlay')) return;

        const markup = `
        <div id="cartDrawerOverlay" class="cart-drawer-overlay" aria-hidden="true"></div>
        <aside id="cartDrawer" class="cart-drawer" aria-label="Shopping Cart" role="dialog" aria-modal="true">
            <div class="cart-drawer-header">
                <div class="cart-drawer-title-group">
                    <h2 class="cart-drawer-title">Your Basket</h2>
                    <span class="cart-drawer-badge"><span class="cart-counter">0</span> items</span>
                </div>
                <button type="button" class="cart-drawer-close" aria-label="Close cart">&times;</button>
            </div>

            <!-- Free Shipping Meter -->
            <div class="cart-drawer-shipping-meter">
                <p class="shipping-meter-text" id="drawerShippingText"></p>
                <div class="shipping-meter-bar">
                    <div class="shipping-meter-progress" id="drawerShippingBar"></div>
                </div>
            </div>

            <!-- Cart Items List -->
            <div class="cart-drawer-body" id="cartDrawerBody">
                <!-- Dynamically injected -->
            </div>

            <!-- Cart Footer -->
            <div class="cart-drawer-footer" id="cartDrawerFooter">
                <div class="cart-drawer-subtotal-row">
                    <span>Subtotal</span>
                    <span class="cart-drawer-subtotal-val" id="drawerSubtotalVal">₹0</span>
                </div>
                <p class="cart-drawer-note">Taxes included. Flat delivery across India calculated at checkout.</p>
                <a href="checkout.html" class="btn btn-primary btn-checkout-drawer">Proceed to Checkout</a>
                <a href="cart.html" class="cart-drawer-view-full">View detailed cart</a>
            </div>
        </aside>
        `;

        const div = document.createElement('div');
        div.innerHTML = markup;
        document.body.appendChild(div);

        // Bind events
        document.querySelector('.cart-drawer-close').addEventListener('click', closeCartDrawer);
        document.getElementById('cartDrawerOverlay').addEventListener('click', closeCartDrawer);

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeCartDrawer();
        });
    }

    function openCartDrawer() {
        injectCartDrawer();
        renderCartDrawerContent();
        const drawer = document.getElementById('cartDrawer');
        const overlay = document.getElementById('cartDrawerOverlay');
        if (drawer && overlay) {
            drawer.classList.add('is-open');
            overlay.classList.add('is-open');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeCartDrawer() {
        const drawer = document.getElementById('cartDrawer');
        const overlay = document.getElementById('cartDrawerOverlay');
        if (drawer && overlay) {
            drawer.classList.remove('is-open');
            overlay.classList.remove('is-open');
            document.body.style.overflow = '';
        }
    }

    function renderCartDrawerContent() {
        const body = document.getElementById('cartDrawerBody');
        const footer = document.getElementById('cartDrawerFooter');
        const text = document.getElementById('drawerShippingText');
        const bar = document.getElementById('drawerShippingBar');
        const subtotalEl = document.getElementById('drawerSubtotalVal');

        if (!body) return;

        const cart = getCart();
        const subtotal = getCartSubtotal();

        // Free shipping text & bar
        if (subtotal >= FREE_SHIPPING_THRESHOLD) {
            if (text) text.innerHTML = `🎉 You've unlocked <strong>FREE Pan-India Shipping</strong>!`;
            if (bar) bar.style.width = '100%';
        } else {
            const diff = FREE_SHIPPING_THRESHOLD - subtotal;
            const pct = Math.min(100, Math.round((subtotal / FREE_SHIPPING_THRESHOLD) * 100));
            if (text) text.innerHTML = `Add <strong>₹${diff}</strong> more to unlock <strong>FREE Shipping</strong>!`;
            if (bar) bar.style.width = pct + '%';
        }

        if (subtotalEl) subtotalEl.textContent = '₹' + subtotal;

        if (cart.length === 0) {
            body.innerHTML = `
                <div class="cart-drawer-empty">
                    <div class="empty-icon-wrap">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                    </div>
                    <h3>Your basket is empty</h3>
                    <p>Discover our freshly baked small-batch granola and snack creations.</p>
                    <a href="index.html#granola" class="btn btn-primary" onclick="MWOStore.closeCartDrawer()">Shop Granola</a>
                </div>
            `;
            if (footer) footer.style.display = 'none';
        } else {
            if (footer) footer.style.display = 'block';
            let itemsHtml = '<ul class="cart-drawer-list">';
            cart.forEach((item, idx) => {
                itemsHtml += `
                    <li class="cart-drawer-item">
                        <img src="${item.image}" alt="${item.name}" class="drawer-item-img" loading="lazy">
                        <div class="drawer-item-info">
                            <h4 class="drawer-item-title"><a href="product.html?sku=${item.sku}">${item.name}</a></h4>
                            <span class="drawer-item-variant">Size: ${item.variant}</span>
                            <div class="drawer-item-price-row">
                                <span class="drawer-item-price">₹${item.price}</span>
                                <div class="drawer-qty-stepper">
                                    <button type="button" class="drawer-qty-btn" onclick="MWOStore.updateQty(${idx}, ${item.qty - 1})" aria-label="Decrease quantity">&minus;</button>
                                    <span class="drawer-qty-val">${item.qty}</span>
                                    <button type="button" class="drawer-qty-btn" onclick="MWOStore.updateQty(${idx}, ${item.qty + 1})" aria-label="Increase quantity">&plus;</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="drawer-item-remove" onclick="MWOStore.removeFromCart(${idx})" aria-label="Remove item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </li>
                `;
            });
            itemsHtml += '</ul>';
            body.innerHTML = itemsHtml;
        }
    }

    // Initialize globally
    window.MWOStore = {
        productsDB,
        getCart,
        addToCart,
        updateQty,
        removeFromCart,
        clearCart,
        getCartCount,
        getCartSubtotal,
        openCartDrawer,
        closeCartDrawer,
        getOrders,
        createOrder,
        getCurrentUser,
        setCurrentUser,
        updateCartUI,
        FREE_SHIPPING_THRESHOLD
    };

    document.addEventListener('DOMContentLoaded', () => {
        injectCartDrawer();
        updateCartUI();

        // Connect any cart button in the header to open drawer
        document.querySelectorAll('.cart-btn, [data-open-cart]').forEach(btn => {
            btn.addEventListener('click', (e) => {
                // If it's a link to cart.html, preventDefault on desktop and open drawer!
                e.preventDefault();
                openCartDrawer();
            });
        });
    });

})();
