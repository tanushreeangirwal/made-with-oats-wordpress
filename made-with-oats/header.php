<?php
/**
 * The header for Made With Oats theme
 *
 * @package Made_With_Oats
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- 1. Top Announcement Bar -->
<aside class="announcement-bar" aria-label="<?php esc_attr_e( 'Announcements', 'made-with-oats' ); ?>">
    <div class="container announcement-container">
        <div class="announcement-ticker">
            <span class="announcement-item">Better-for-you snacking</span>
            <span class="announcement-dot" aria-hidden="true">&bull;</span>
            <span class="announcement-item">Handcrafted in Small Batches</span>
            <span class="announcement-dot" aria-hidden="true">&bull;</span>
            <span class="announcement-item">Pan India Delivery</span>
            <span class="announcement-dot" aria-hidden="true">&bull;</span>
            <span class="announcement-item">Free Shipping on Orders Above ₹1299</span>
        </div>
    </div>
</aside>

<!-- 2. Main Site Header -->
<header id="masthead" class="site-header">
    <div class="container header-inner">
        <!-- Mobile Hamburger -->
        <button class="mobile-nav-toggle" aria-label="<?php esc_attr_e( 'Open Navigation Menu', 'made-with-oats' ); ?>" aria-controls="mobile-drawer" aria-expanded="false">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
        </button>

        <!-- Brand Logo (LEFT) -->
        <div class="site-branding">
            <?php made_with_oats_logo(); ?>
        </div>

        <!-- Desktop Navigation (CENTER) -->
        <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'made-with-oats' ); ?>">
            <?php
            if ( has_nav_menu( 'primary-menu' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'primary-menu',
                    'menu_class'     => 'nav-menu',
                    'container'      => false,
                    'depth'          => 2,
                ) );
            } else {
                ?>
                <ul class="nav-menu">
                    <li class="nav-menu-item current-menu-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-link">Home</a></li>
                    <li class="nav-menu-item"><a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="nav-link">Shop</a></li>
                    <li class="nav-menu-item"><a href="<?php echo esc_url( home_url( '/category/granola' ) ); ?>" class="nav-link">Granola</a></li>
                    <li class="nav-menu-item"><a href="<?php echo esc_url( home_url( '/category/bites' ) ); ?>" class="nav-link">Bites</a></li>
                    <li class="nav-menu-item"><a href="<?php echo esc_url( home_url( '/category/snack-bars' ) ); ?>" class="nav-link">Snack Bars</a></li>
                    <li class="nav-menu-item"><a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="nav-link">Our Story</a></li>
                    <li class="nav-menu-item"><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="nav-link">Contact</a></li>
                </ul>
                <?php
            }
            ?>
        </nav>

        <!-- Header Actions (RIGHT) -->
        <div class="header-actions">
            <!-- Search Button -->
            <button class="action-btn search-trigger" aria-label="<?php esc_attr_e( 'Search products', 'made-with-oats' ); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </button>

            <!-- Account Button -->
            <a href="<?php echo esc_url( function_exists( 'wc_get_account_endpoint_url' ) ? wc_get_account_endpoint_url( 'dashboard' ) : home_url( '/my-account' ) ); ?>" class="action-btn" aria-label="<?php esc_attr_e( 'My Account', 'made-with-oats' ); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </a>

            <!-- Wishlist Button -->
            <a href="<?php echo esc_url( home_url( '/wishlist' ) ); ?>" class="action-btn" id="btn-header-wishlist" aria-label="<?php esc_attr_e( 'Wishlist', 'made-with-oats' ); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                <span class="action-count-badge wishlist-count-badge" style="display: none;">0</span>
            </a>

            <!-- Cart Trigger with Dynamic Badge -->
            <a href="<?php echo esc_url( function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : home_url( '/cart' ) ); ?>" class="action-btn cart-btn" aria-label="<?php esc_attr_e( 'View Cart', 'made-with-oats' ); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                <span class="cart-counter"><?php echo ( function_exists( 'WC' ) && WC()->cart ) ? WC()->cart->get_cart_contents_count() : '0'; ?></span>
            </a>
        </div>
    </div>
</header>

<!-- Search Modal -->
<div class="search-modal" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Search Products', 'made-with-oats' ); ?>">
    <div class="search-modal-card">
        <form role="search" method="get" class="search-form-inner" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="search" class="search-field-input" placeholder="<?php esc_attr_e( 'Search for granola, bites, snack bars...', 'made-with-oats' ); ?>" value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" />
            <input type="hidden" name="post_type" value="product" />
            <button type="button" class="search-close-btn" aria-label="<?php esc_attr_e( 'Close search', 'made-with-oats' ); ?>">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </form>
    </div>
</div>

<!-- Mobile Navigation Drawer -->
<!-- Mobile Navigation Drawer -->
<div class="mobile-drawer-overlay" aria-hidden="true"></div>
<aside id="mobile-drawer" class="mobile-drawer" aria-label="<?php esc_attr_e( 'Mobile Navigation', 'made-with-oats' ); ?>">
    <div class="drawer-header">
        <div class="drawer-brand">
            <img src="<?php echo esc_url( made_with_oats_img_url( 'assets/images/logo.png' ) ); ?>" alt="Made With Oats" class="brand-logo-img" width="52" height="52">
            <div class="brand-title-group">
                <span class="brand-name">Made with Oats</span>
                <span class="brand-tagline">Granola &amp; More With Love</span>
            </div>
        </div>
        <button class="drawer-close-btn" aria-label="<?php esc_attr_e( 'Close menu', 'made-with-oats' ); ?>">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    </div>

    <ul class="mobile-nav-list">
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mobile-nav-link">Home</a></li>
        <li><a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="mobile-nav-link">Shop All</a></li>
        <li><a href="<?php echo esc_url( home_url( '/category/granola' ) ); ?>" class="mobile-nav-link">Granola</a></li>
        <li><a href="<?php echo esc_url( home_url( '/category/bites' ) ); ?>" class="mobile-nav-link">Bites</a></li>
        <li><a href="<?php echo esc_url( home_url( '/category/snack-bars' ) ); ?>" class="mobile-nav-link">Snack Bars</a></li>
        <li><a href="<?php echo esc_url( home_url( '/category/gift-hampers' ) ); ?>" class="mobile-nav-link">Gift Hampers</a></li>
        <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="mobile-nav-link">Our Story</a></li>
        <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="mobile-nav-link">Contact</a></li>
    </ul>

    <div class="drawer-user-links">
        <a href="<?php echo esc_url( function_exists( 'wc_get_account_endpoint_url' ) ? wc_get_account_endpoint_url( 'dashboard' ) : home_url( '/my-account' ) ); ?>" class="drawer-user-link">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <span>My Account</span>
        </a>
        <a href="<?php echo esc_url( home_url( '/wishlist' ) ); ?>" class="drawer-user-link">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
            <span>Wishlist</span>
        </a>
        <a href="<?php echo esc_url( home_url( '/track-order' ) ); ?>" class="drawer-user-link">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
            <span>Track Order</span>
        </a>
    </div>

    <div class="drawer-footer">
        <div class="drawer-contact">
            <a href="tel:+919619349819"><span>Tel:</span> +91 96193 49819</a>
            <a href="https://wa.me/918355869270" target="_blank" rel="noopener"><span>WhatsApp:</span> +91 83558 69270</a>
            <a href="mailto:madewithoats09@gmail.com"><span>Email:</span> madewithoats09@gmail.com</a>
        </div>
        <p class="drawer-meta">Malad West, Mumbai &bull; Pan-India Delivery</p>
    </div>
</aside>
