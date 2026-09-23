/**
 * Made With Oats -- Canonical Products Database
 * Single Source of Truth for Catalogue, Pricing, Sizes, and Ingredients.
 *
 * RULES:
 * - Only verified core products (G001-G003, CB001-CB003, GB001-GB002).
 * - BUNDLE001 is flagged with needs_confirmation: true and withheld from the active customer catalogue.
 * - DH001 is completely omitted.
 * - Couverture is preserved in authentic technical ingredient lists, but avoided in marketing messaging.
 * - All conflict flags are documented in CONTENT_FLAGS.md.
 */

(function (root, factory) {
    if (typeof define === 'function' && define.amd) {
        define([], factory);
    } else if (typeof module === 'object' && module.exports) {
        module.exports = factory();
    } else {
        root.MWOProducts = factory();
    }
}(typeof self !== 'undefined' ? self : this, function () {
    'use strict';

    const PRODUCTS = [
        {
            sku: 'G001',
            name: 'Dark Chocolate Blueberry & Cranberry Granola',
            category: 'granola',
            categoryLabel: 'Granola',
            bestseller: true,
            is_active: true,
            description: 'Whole rolled oats clustered with dark chocolate, tart blueberries, sweet cranberries, and crunchy almonds.',
            sizes: [
                { label: '100g', price: 170, is_default: true },
                { label: '200g', price: 260 },
                { label: '500g', price: 599 }
            ],
            base_price: 170,
            ingredients: ['Rolled Oats', 'Dark Chocolate', 'Almonds', 'Blueberry', 'Cranberry', 'Pumpkin Seeds', 'Sunflower Seeds', 'Flax Seeds', 'Cocoa Powder', 'Cold Pressed Coconut Oil', 'Honey'],
            allergens: 'Contains Nuts',
            shelfLife: '30 days',
            storage: 'Store in a cool, dry place in an airtight container.',
            image: 'assets/images/products/g001-dark-chocolate-granola.jpg',
            images: [
                'assets/images/products/g001-dark-chocolate-granola.jpg',
                'assets/images/products/g001-100-200g-granola.jpg'
            ],
            flags: {}
        },
        {
            sku: 'G002',
            name: 'Peanut Butter & Dark Chocolate Granola',
            category: 'granola',
            categoryLabel: 'Granola',
            bestseller: false,
            is_active: true,
            description: 'Creamy roasted peanut butter swirled with whole rolled oats, dark chocolate chips, and wildflower honey.',
            sizes: [
                { label: '100g', price: 180, is_default: true },
                { label: '200g', price: 270 },
                { label: '500g', price: 699 }
            ],
            base_price: 180,
            ingredients: ['Rolled Oats', 'Peanut Butter', 'Dark Chocolate', 'Almonds', 'Pumpkin Seeds', 'Sunflower Seeds', 'Flax Seeds', 'Honey'],
            allergens: 'Contains Peanuts, Tree Nuts',
            shelfLife: '30 days',
            storage: 'Store in a cool, dry place in an airtight container.',
            image: 'assets/images/products/g002-peanut-butter-granola.jpg',
            images: [
                'assets/images/products/g002-peanut-butter-granola.jpg'
            ],
            flags: {
                price_needs_confirmation: true,
                conflict: 'G002 price 170 vs 180'
            }
        },
        {
            sku: 'G003',
            name: 'Almond Raisin Granola',
            category: 'granola',
            categoryLabel: 'Granola',
            bestseller: false,
            is_active: true,
            description: 'Golden jumbo oats roasted with California almonds, plump sun-dried raisins, aromatic Ceylon cinnamon, and mild natural nectar.',
            sizes: [
                { label: '100g', price: 150, is_default: true },
                { label: '200g', price: 260 },
                { label: '500g', price: 549 }
            ],
            base_price: 150,
            ingredients: ['Rolled Oats', 'Almonds', 'Raisins', 'Pumpkin Seeds', 'Sunflower Seeds', 'Flax Seeds', 'Honey', 'Cinnamon Powder', 'Vanilla Essence'],
            allergens: 'Contains Nuts',
            shelfLife: '30 days',
            storage: 'Store in a cool, dry place in an airtight container.',
            image: 'assets/images/products/g003-almond-raisin-granola.jpg',
            images: [
                'assets/images/products/g003-almond-raisin-granola.jpg'
            ],
            flags: {
                price_needs_confirmation: true,
                name_needs_confirmation: true,
                conflict: 'G003 price 160 vs 150 vs 140; 200g 2750 error; Almond Raisin vs Almond Raisin Cinnamon'
            }
        },
        {
            sku: 'CB001',
            name: 'Chocolate Rajgira Bites',
            category: 'bites',
            categoryLabel: 'Indulgent Chocolate Bites',
            bestseller: true,
            is_active: true,
            description: 'Crisp puffed ancient rajgira grains enrobed in velvety dark chocolate. Light, crunchy, and richly satisfying.',
            sizes: [
                { label: '250g', price: 350, is_default: true },
                { label: '500g', price: 650 },
                { label: '1kg', price: 1200 }
            ],
            base_price: 350,
            ingredients: ['Couverture Dark Chocolate', 'Puffed Rajgira'],
            allergens: 'Gluten-Free by nature',
            shelfLife: '30 days',
            storage: 'Store in a cool, dry place in an airtight container.',
            image: 'assets/images/products/cb001-chocolate-rajgira-bites.jpg',
            images: [
                'assets/images/products/cb001-chocolate-rajgira-bites.jpg'
            ],
            flags: {
                chocolate_type_needs_confirmation: true,
                conflict: 'CB001 milk vs dark chocolate'
            }
        },
        {
            sku: 'CB002',
            name: 'Intense Dark Chocolate Rajgira Bites',
            category: 'bites',
            categoryLabel: 'Indulgent Chocolate Bites',
            bestseller: true,
            is_active: true,
            description: 'For true dark chocolate lovers: roasted puffed amaranth coated in premium intense dark chocolate.',
            sizes: [
                { label: '250g', price: 599, is_default: true, image: 'assets/images/products/cb002-rajgira-bites-250g.webp' },
                { label: '500g', price: 899, image: 'assets/images/products/cb002-rajgira-bites-500g.webp' },
                { label: '1kg', price: 1399, image: 'assets/images/products/cb002-rajgira-bites-1kg.webp' }
            ],
            base_price: 599,
            ingredients: ['Couverture Dark Chocolate', 'Puffed Rajgira'],
            allergens: 'Gluten-Free by nature',
            shelfLife: '30 days',
            storage: 'Store in a cool, dry place in an airtight container.',
            image: 'assets/images/products/cb002-rajgira-bites-250g.webp',
            images: [
                'assets/images/products/cb002-rajgira-bites-250g.webp',
                'assets/images/products/cb002-rajgira-bites-500g.webp',
                'assets/images/products/cb002-rajgira-bites-1kg.webp'
            ],
            flags: {
                label_discrepancy: 'Pouch label reads Chocolate Rajgira Bites without Intense'
            }
        },
        {
            sku: 'CB003',
            name: 'Intense Dark Chocolate Rajgira Bars',
            category: 'snack-bars',
            categoryLabel: 'Snack Bars',
            bestseller: false,
            is_active: true,
            description: 'A portable, crunchy bar made of puffed amaranth and deep dark chocolate. Perfect clean energy on the go.',
            sizes: [
                { label: 'Single Bar (35g)', price: 95, is_default: true, image: 'assets/images/products/cb003-rajgira-bar-40g.webp' },
                { label: 'Pack of 3', price: 270, image: 'assets/images/products/cb003-rajgira-bar-40g.webp' },
                { label: 'Pack of 6', price: 510, image: 'assets/images/products/cb003-rajgira-bar-40g.webp' }
            ],
            base_price: 95,
            ingredients: ['Couverture Dark Chocolate', 'Puffed Rajgira'],
            allergens: 'Gluten-Free by nature',
            shelfLife: '30 days',
            storage: 'Store in a cool, dry place.',
            image: 'assets/images/products/cb003-rajgira-bar-40g.webp',
            images: [
                'assets/images/products/cb003-rajgira-bar-40g.webp'
            ],
            flags: {
                price_needs_confirmation: true,
                pack_needs_confirmation: true,
                conflict: 'CB003 95 vs 90; Single/3/6 vs Single/3/6/12'
            }
        },
        {
            sku: 'GB001',
            name: 'Triple Seed Crunch',
            category: 'snack-bars',
            categoryLabel: 'Snack Bars',
            bestseller: false,
            is_active: true,
            description: 'A nourishing oat bar loaded with whole rolled oats, pumpkin seeds, sunflower seeds, and golden flax seeds bound with honey.',
            sizes: [
                { label: 'Single Bar (40g)', price: 85, is_default: true },
                { label: 'Pack of 3', price: 240 },
                { label: 'Pack of 6', price: 450 }
            ],
            base_price: 85,
            ingredients: ['Rolled Oats', 'Pumpkin Seeds', 'Sunflower Seeds', 'Flax Seeds', 'Honey', 'Cold Pressed Coconut Oil'],
            allergens: 'Nut-Free Recipe',
            shelfLife: '30 days',
            storage: 'Store in a cool, dry place.',
            image: 'assets/images/products/gb001-triple-seed-bar.jpg',
            images: [
                'assets/images/products/gb001-triple-seed-bar.jpg'
            ],
            flags: {
                price_needs_confirmation: true,
                pack_needs_confirmation: true,
                conflict: 'GB001 85 vs 65; Single/3/6 vs Single/3/6/12'
            }
        },
        {
            sku: 'GB002',
            name: 'Dark Chocolate Bliss',
            category: 'snack-bars',
            categoryLabel: 'Snack Bars',
            bestseller: true,
            is_active: true,
            description: 'Wholesome oats and roasted nuts dipped in rich dark chocolate. Decadent yet cleanly energizing.',
            sizes: [
                { label: 'Single Bar (40g)', price: 90, is_default: true },
                { label: 'Pack of 3', price: 255 },
                { label: 'Pack of 6', price: 480 }
            ],
            base_price: 90,
            ingredients: ['Rolled Oats', 'Dark Chocolate', 'Almonds', 'Pumpkin Seeds', 'Sunflower Seeds', 'Honey'],
            allergens: 'Contains Nuts',
            shelfLife: '30 days',
            storage: 'Store in a cool, dry place.',
            image: 'assets/images/products/gb002-dark-chocolate-bliss.jpg',
            images: [
                'assets/images/products/gb002-dark-chocolate-bliss.jpg'
            ],
            flags: {
                pack_needs_confirmation: true,
                conflict: 'Single/3/6 vs Single/3/6/12'
            }
        }
    ];

    // Create SKU lookup map
    const PRODUCTS_MAP = {};
    PRODUCTS.forEach(p => {
        PRODUCTS_MAP[p.sku] = p;
    });

    return {
        products: PRODUCTS,
        productsMap: PRODUCTS_MAP,
        // Helper: get active products only (excludes unconfirmed BUNDLE001 and omitted DH001)
        getActiveProducts: function () {
            return PRODUCTS.filter(p => p.is_active);
        },
        getBySku: function (sku) {
            return PRODUCTS_MAP[sku] || null;
        },
        getByCategory: function (cat) {
            if (!cat || cat === 'all') return this.getActiveProducts();
            return this.getActiveProducts().filter(p => p.category === cat);
        }
    };
}));
