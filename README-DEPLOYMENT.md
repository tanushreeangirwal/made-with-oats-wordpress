# Made With Oats — WordPress & WooCommerce Deployment & Handover Guide

> **Confidential & Proprietary Handover Document**  
> Prepared for the receiving WordPress/WooCommerce developer.  
> This package contains the complete, production-ready theme folder `made-with-oats/` and associated deployment documentation.

---

## A. Project Name
**Made With Oats** (D2C Artisanal Granola & Handcrafted Snacks, Mumbai, India)

---

## B. Theme Folder Name
`made-with-oats`  
Target installation path: `/wp-content/themes/made-with-oats/`

---

## C. Technology Stack
- **CMS**: WordPress 6.0+ (Tested up to WordPress 6.7)
- **E-Commerce**: WooCommerce 8.0+
- **PHP**: 7.4+ (PHP 8.1 / 8.2 fully supported and recommended)
- **CSS Architecture**: Vanilla Modular CSS (Design System Tokens, Fraunces serif typography, Plus Jakarta Sans, CSS Grid & Flexbox, no Tailwind dependency)
- **JavaScript**: Vanilla ES6+ (Zero jQuery dependency for core theme components)

---

## D. Installation Instructions for the Receiving Developer

1. **Upload the Theme**:
   - **Via WordPress Admin**: Navigate to **Appearance &gt; Themes &gt; Add New &gt; Upload Theme**, select the `made-with-oats` theme zip, and upload.
   - **Via SFTP / File Manager**: Copy the `made-with-oats/` directory directly into `/wp-content/themes/`.
2. **Activate the Theme**:
   - Go to **Appearance &gt; Themes** in the WordPress admin panel and click **Activate** on **Made With Oats**.
3. **Automatic Features Activated**:
   - Theme automatically registers support for WooCommerce (`add_theme_support('woocommerce')`), product gallery zoom, lightbox, and slider.
   - Registers custom logo support (160x160 circular badge), HTML5 markup, automatic title tags, and post thumbnails.

---

## E. Required & Recommended Plugins

| Plugin | Requirement | Purpose |
|---|---|---|
| **WooCommerce** | **Mandatory** | Core e-commerce platform for products, checkout, and inventory |
| **Razorpay for WooCommerce** (or Cashfree / PhonePe) | **Mandatory** | Secure payment gateway for UPI (GPay/PhonePe/Paytm), Cards, and NetBanking |
| **WP Mail SMTP** | **Recommended** | Reliable SMTP delivery for transactional receipts and dispatch alerts from `madewithoats09@gmail.com` |
| **Shiprocket / Delhivery** | **Recommended** | Courier integration for automated shipping label and tracking ID generation |
| **Yoast SEO** or **Rank Math** | **Optional** | E-commerce schema and XML sitemap management |

---

## F. WooCommerce Configuration That Needs to Be Completed

1. **Store General Settings** (**WooCommerce &gt; Settings &gt; General**):
   - **Base Address**: Malad West, Mumbai, Maharashtra, Pin: 400095, Country: India.
   - **Selling Location(s)**: Sell to India (or selected states).
   - **Currency**: Indian Rupee (INR, `₹`).
   - **Currency Position**: Left (`₹`).
2. **Product Catalog Settings** (**WooCommerce &gt; Settings &gt; Products**):
   - **Shop Page**: Set to the created **Shop** page (`/shop/`).
   - **Enable AJAX Add to Cart**: Supported by the theme.
3. **Accounts &amp; Privacy** (**WooCommerce &gt; Settings &gt; Accounts &amp; Privacy**):
   - Check **"Allow customers to place orders without an account"** (Guest checkout is priority).
   - Check **"Allow customers to create an account during checkout"**.
4. **Branded Email Styling** (**WooCommerce &gt; Settings &gt; Emails**):
   - **From Name**: `Made With Oats`
   - **From Address**: `madewithoats09@gmail.com`
   - **Base Color**: `#3A2418` (Chocolate Brown)
   - **Background Color**: `#FAF6EE` (Warm Cream)
   - **Body Text Color**: `#26170F`
   - *Note*: Custom email hooks in `made-with-oats/inc/woocommerce-setup.php` automatically append the small-batch freshness notice and tracking links to all customer confirmation emails.

---

## G. Pages That Need to Be Created / Assigned in WordPress

Create each page in **Pages &gt; Add New**, set the slug, and select the corresponding template from the **Page Attributes** box on the right:

| Page Title | Target Slug | Template Name | Template File | Notes |
|---|---|---|---|---|
| **Home** | `/` | *N/A (Front Page)* | `front-page.php` | Set as static front page in **Settings &gt; Reading** |
| **Shop** | `/shop` | *N/A (WooCommerce Archive)* | `woocommerce/archive-product.php` | Assign as Shop Page in WooCommerce settings |
| **Our Story** | `/about` | `Page: Our Story` | `page-about.php` | Founding story, small-batch principles |
| **Contact Us** | `/contact` | `Page: Contact Us` | `page-contact.php` | WhatsApp button, contact details, message form |
| **Wishlist** | `/wishlist` | `Page: Wishlist` | `page-wishlist.php` | Guest wishlist with variant selectors &amp; bag transfer |
| **FAQs** | `/faqs` | `Page: FAQ` | `page-faq.php` | Categorized accordion FAQs |
| **Shipping &amp; Delivery** | `/shipping-delivery` | `Page: Shipping &amp; Delivery` | `page-shipping.php` | Flat rates, free shipping rules, delivery timelines |
| **Returns &amp; Refunds** | `/returns-and-refunds` | `Page: Returns &amp; Refunds` | `page-returns.php` | 48-hour damage replacement guarantee |
| **Privacy Policy** | `/privacy-policy` | `Page: Privacy Policy` | `page-privacy.php` | IT Act 2000 compliant, zero card storage clause |
| **Terms &amp; Conditions** | `/terms-conditions` | `Page: Terms &amp; Conditions` | `page-terms.php` | Small-batch terms, strict no-COD, allergen notice |
| **Track Order** | `/track-order` | `Page: Track Order` | `page-track-order.php` | Direct tracking lookup with WhatsApp helpline |
| **Cart** | `/cart` | Default Template | `woocommerce/cart/cart.php` | Uses `[woocommerce_cart]` block/shortcode |
| **Checkout** | `/checkout` | Default Template | `woocommerce/checkout/form-checkout.php` | Uses `[woocommerce_checkout]` block/shortcode |
| **My Account** | `/my-account` | `Page: My Account` | `page-my-account.php` | Customer order portal and profile dashboard |

---

## H. Menus / Navigation That Need to Be Assigned

Go to **Appearance &gt; Menus** and create/assign the menus to their registered theme locations:

1. **Primary Desktop Menu** (`primary-menu`):
   - Home (`/`)
   - Shop (`/shop`)
   - Granola (`/category/granola`)
   - Bites (`/category/bites`)
   - Snack Bars (`/category/snack-bars`)
   - Our Story (`/about`)
   - Contact (`/contact`)
2. **Mobile Drawer Menu** (`mobile-menu`):
   - All Primary Menu items plus:
   - Track Order (`/track-order`)
   - Wishlist (`/wishlist`)
   - My Account (`/my-account`)
3. **Footer Customer Care** (`footer-care`):
   - Track Your Order (`/track-order`)
   - Shipping &amp; Delivery (`/shipping-delivery`)
   - Returns &amp; Refunds (`/returns-and-refunds`)
   - FAQs (`/faqs`)
   - Contact Us (`/contact`)
   - Privacy Policy (`/privacy-policy`)
   - Terms &amp; Conditions (`/terms-conditions`)
4. **Footer Shop Links** (`footer-shop`):
   - All Snacks (`/shop`)
   - Granola (`/category/granola`)
   - Indulgent Chocolate Bites (`/category/bites`)
   - Snack Bars (`/category/snack-bars`)

---

## I. Customizer / Theme Settings

Go to **Appearance &gt; Customize**:
- **Site Identity**:
  - Logo: Upload `assets/images/logo.png` (80x80 circular badge emblem).
  - Site Title: `Made With Oats`
  - Tagline: `Naturally Wholesome Snacking`
  - Site Icon (Favicon): Upload circular favicon badge.
- **Reading Settings** (**Settings &gt; Reading**):
  - Set **"Your homepage displays"** to **"A static page"**.
  - Homepage: Select **Home**.
  - Posts page: Select (leave blank or select a news page).

---

## J. Product Data That Needs to Be Entered Into WooCommerce

> [!IMPORTANT]
> **Check CONTENT_FLAGS.md First**: Before entering final live pricing and variants, review [CONTENT_FLAGS.md](file:///c:/Users/Tanushree/OneDrive/Desktop/Made%20With%20Oats/CONTENT_FLAGS.md) for notes on client pricing/pack discrepancies that require explicit client sign-off.

The verified core catalogue consists of the following 8 products. High-resolution package and lifestyle imagery is pre-bundled in `made-with-oats/assets/images/products/`:

| SKU | Product Title | Category | Variations / Pack Sizes | Prices (INR) | Primary Image Asset |
|---|---|---|---|---|---|
| **G001** | Dark Chocolate Cranberry Blueberry Granola | Granola | 100g, 200g, 500g | ₹190 / ₹290 / ₹699 | `g001-dark-chocolate-blueberry-cranberry-granola.jpg` |
| **G002** | Peanut Butter &amp; Dark Chocolate Granola | Granola | 100g, 200g, 500g | ₹180 / ₹270 / ₹699 *(check flag)* | `g002-peanut-butter-dark-chocolate-granola.jpg` |
| **G003** | Almond Raisin Granola | Granola | 100g, 200g, 500g | ₹150 / ₹260 / ₹549 *(check flag)* | `g003-almond-raisin-granola.jpg` |
| **CB001** | Chocolate Rajgira Bites | Indulgent Chocolate Bites | 250g, 500g, 1kg | ₹240 / ₹450 / ₹850 | `cb001-chocolate-rajgira-bites.jpg` |
| **CB002** | Intense Dark Chocolate Rajgira Bites | Indulgent Chocolate Bites | 250g, 500g, 1kg | ₹260 / ₹490 / ₹920 | `cb002-chocolate-rajgira-bites-pouch.jpg` |
| **CB003** | Intense Dark Chocolate Rajgira Bars | Snack Bars | Single Bar, Pack of 3, Pack of 6 | ₹95 / ₹270 / ₹510 *(check flag)* | `cb003-bars-lifestyle.jpg` |
| **GB001** | Triple Seed Crunch Bar | Snack Bars | Single Bar, Pack of 3, Pack of 6 | ₹85 / ₹240 / ₹450 | `gb001-triple-seed-crunch-bar.jpg` |
| **GB002** | Almond Cranberry Crunch Bar | Snack Bars | Single Bar, Pack of 3, Pack of 6 | ₹90 / ₹255 / ₹480 | `gb002-almond-cranberry-crunch-bar.jpg` |

---

## K. Payment Gateway Setup Required

- **Cash on Delivery (COD)**: Strictly **DISABLED**. In `made-with-oats/inc/woocommerce-setup.php`, `made_with_oats_disable_cod_gateway()` unsets the `cod` gateway at filter priority 99.
- **Payment Method Support**: Configure Razorpay / Cashfree with:
  - **UPI** (Google Pay, PhonePe, Paytm, BHIM)
  - **Cards** (Visa, MasterCard, RuPay, American Express)
  - **NetBanking** (all Indian banks)
- Ensure gateway is switched from Sandbox to **Live Production Mode** and webhook endpoints are configured.

---

## L. Shipping Configuration Required

The theme includes a dynamic rate calculation filter in `made-with-oats/inc/woocommerce-setup.php` (`made_with_oats_custom_shipping_rates`):
1. **Free Delivery**: Automatically applied on any order with a cart subtotal of **₹1,299 or higher**.
2. **Maharashtra Delivery**: Flat rate of **₹80** for orders below ₹1,299.
3. **Rest of India Delivery**: Flat rate of **₹100** for all orders outside Maharashtra below ₹1,299.

*Setup in WP Admin*: Go to **WooCommerce &gt; Settings &gt; Shipping &gt; Shipping Zones**. Add a zone for "India" and add a "Flat Rate" shipping method. The theme hook will automatically calculate the rate based on the customer's state and cart subtotal.

---

## M. Remaining Integration Tasks

1. **WhatsApp Business Direct Link**: Currently configured to `+91 83558 69270` (`https://wa.me/918355869270`). Confirm if the client's official WhatsApp Business account is active on this number.
2. **Customer Care Email**: Configured as `madewithoats09@gmail.com`. Ensure DKIM, SPF, and DMARC DNS records are configured for the sending domain so order confirmations reach the inbox.
3. **Shipping Courier Tracking API**: If using Shiprocket or Delhivery, connect their official WooCommerce plugin to auto-generate tracking numbers upon order completion.

---

## N. Known Limitations & Architecture Notes

1. **Guest Wishlist**: Operates client-side via `localStorage` (`mwo_wishlist_items`) for instant saving with zero login friction. If server-synced accounts across devices are required in Phase 2, integrate a server-backed WooCommerce Wishlist plugin.
2. **Static Asset Independence**: The theme contains all CSS, JavaScript, and image assets in `/assets/`. It has zero dependencies on Vercel, localhost, or Windows absolute paths.
3. **Typography**: Google Fonts (`Fraunces`, `Plus Jakarta Sans`, `Caveat`) are enqueued cleanly via standard `wp_enqueue_style()` in `functions.php`.
