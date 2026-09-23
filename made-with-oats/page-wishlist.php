<?php
/**
 * Template Name: Wishlist Page
 *
 * @package Made_With_Oats
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="wishlist-hero-banner" aria-label="<?php esc_attr_e( 'Wishlist Header', 'made-with-oats' ); ?>">
        <div class="container">
            <span class="eyebrow"><?php esc_html_e( 'Your Saved Items', 'made-with-oats' ); ?></span>
            <h1 class="page-title"><?php esc_html_e( 'My Wishlist', 'made-with-oats' ); ?></h1>
            <p><?php esc_html_e( 'Handcrafted granolas and small-batch treats you have saved. Ready whenever you want to add them to your shopping bag.', 'made-with-oats' ); ?></p>
        </div>
    </section>

    <section class="container" style="padding-top: var(--space-4);">
        <div class="wishlist-toolbar" id="wishlistToolbar" style="display: none;">
            <span class="wishlist-count-text" id="wishlistCountText">0 saved items</span>
            <div class="wishlist-actions-group">
                <button type="button" class="btn btn-primary btn-sm" id="btnMoveAllToCart"><?php esc_html_e( 'Move All to Bag', 'made-with-oats' ); ?></button>
                <button type="button" class="btn btn-outline btn-sm" id="btnClearWishlist" style="color: #C0392B; border-color: rgba(192,57,43,0.3);"><?php esc_html_e( 'Clear Wishlist', 'made-with-oats' ); ?></button>
            </div>
        </div>

        <!-- Dynamic Wishlist Grid -->
        <div class="wishlist-grid" id="wishlistGrid">
            <!-- Rendered dynamically by JavaScript -->
        </div>

        <!-- Empty State -->
        <div class="wishlist-empty-box" id="wishlistEmptyState" style="display: none;">
            <svg class="wishlist-empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
            </svg>
            <h2 class="wishlist-empty-title"><?php esc_html_e( 'Your wishlist is currently empty', 'made-with-oats' ); ?></h2>
            <p class="wishlist-empty-desc">
                <?php esc_html_e( 'You have not saved any small-batch creations yet. Browse our handcrafted granolas, chocolate rajgira bites, and snack bars to find your favorites.', 'made-with-oats' ); ?>
            </p>
            <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Explore Handcrafted Snacks', 'made-with-oats' ); ?></a>
        </div>
    </section>
</main>

<script>
(function () {
    'use strict';
    function initWishlistPage() {
        if (typeof window.renderWishlistPage === 'function') {
            window.renderWishlistPage();
        }
    }
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initWishlistPage);
    } else {
        initWishlistPage();
    }
})();
</script>

<?php
get_footer();
