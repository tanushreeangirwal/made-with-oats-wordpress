<?php
/**
 * Cart Page Override for Made With Oats
 *
 * @package Made_With_Oats
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<div class="container cart-page-wrapper">
    <header class="cart-header">
        <span class="eyebrow"><?php esc_html_e( 'Review Your Order', 'made-with-oats' ); ?></span>
        <h1 class="cart-title"><?php esc_html_e( 'Shopping Cart', 'made-with-oats' ); ?></h1>
        
        <!-- Free Shipping Progress Bar -->
        <div class="free-shipping-meter-card">
            <div class="meter-text">
                <span>Add <strong>₹689</strong> more to your cart to unlock <strong>FREE PAN-INDIA DELIVERY</strong>!</span>
                <span class="meter-threshold">Free above ₹1299</span>
            </div>
            <div class="meter-bar-track">
                <div class="meter-bar-fill" style="width: 47%;"></div>
            </div>
        </div>
    </header>

    <div class="cart-layout">
        <!-- Cart Items List -->
        <div class="cart-table-card">
            <div class="cart-item-row">
                <div class="cart-item-thumb">
                    <img src="https://images.unsplash.com/photo-1517673132405-a56a62b18caf?auto=format&fit=crop&w=160&q=80" alt="Dark Chocolate Blueberry Granola" class="cart-item-img">
                </div>
                <div class="cart-item-details">
                    <span class="cart-item-cat">Granola &bull; SKU: G001</span>
                    <h3 class="cart-item-title">Dark Chocolate Blueberry &amp; Cranberry Granola</h3>
                    <span class="cart-item-variant">Selected Variant: 200g</span>
                </div>
                <div class="qty-control">
                    <button type="button" class="qty-btn qty-dec">&minus;</button>
                    <input type="number" class="qty-input" value="1" min="1" max="99" aria-label="Quantity">
                    <button type="button" class="qty-btn qty-inc">&plus;</button>
                </div>
                <div class="cart-item-price">
                    <span>₹260</span>
                </div>
            </div>

            <div class="cart-item-row">
                <div class="cart-item-thumb">
                    <img src="https://images.unsplash.com/photo-1541781774459-bb2af2f05b55?auto=format&fit=crop&w=160&q=80" alt="Chocolate Rajgira Bites" class="cart-item-img">
                </div>
                <div class="cart-item-details">
                    <span class="cart-item-cat">Bites &bull; SKU: CB001</span>
                    <h3 class="cart-item-title">Chocolate Rajgira Bites</h3>
                    <span class="cart-item-variant">Selected Variant: 250g</span>
                </div>
                <div class="qty-control">
                    <button type="button" class="qty-btn qty-dec">&minus;</button>
                    <input type="number" class="qty-input" value="1" min="1" max="99" aria-label="Quantity">
                    <button type="button" class="qty-btn qty-inc">&plus;</button>
                </div>
                <div class="cart-item-price">
                    <span>₹350</span>
                </div>
            </div>

            <!-- Coupon Row -->
            <div class="coupon-section">
                <input type="text" placeholder="<?php esc_attr_e( 'Coupon code (e.g. WHOLESOME10)', 'made-with-oats' ); ?>" class="coupon-input">
                <button type="button" class="btn btn-outline btn-sm"><?php esc_html_e( 'Apply Coupon', 'made-with-oats' ); ?></button>
            </div>
        </div>

        <!-- Order Summary Card -->
        <div class="order-summary-card">
            <h2 class="summary-title"><?php esc_html_e( 'Order Summary', 'made-with-oats' ); ?></h2>
            
            <div class="summary-row">
                <span>Subtotal</span>
                <span>₹610</span>
            </div>
            <div class="summary-row">
                <span>Pan-India Shipping</span>
                <span>₹80</span>
            </div>
            <div class="summary-row" style="font-size: 0.85rem; color: var(--color-forest-olive);">
                <span>Free Shipping Eligibility</span>
                <span>Above ₹1299</span>
            </div>
            <div class="summary-row">
                <span>Taxes</span>
                <span>Included</span>
            </div>
            
            <div class="summary-row total">
                <span>Total Amount</span>
                <span>₹690</span>
            </div>

            <a href="<?php echo esc_url( home_url( '/checkout' ) ); ?>" class="btn btn-primary btn-lg btn-checkout-proceed">
                <span>Proceed to Checkout</span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
            
            <div class="cart-trust-badges">
                <span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                    256-Bit SSL Secure Checkout
                </span>
                <span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                    Reliable Pan-India Delivery
                </span>
                <span>Cash on Delivery (COD) Not Available</span>
            </div>
        </div>
    </div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
