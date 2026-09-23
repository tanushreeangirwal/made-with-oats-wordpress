<?php
/**
 * Checkout Form Override for Made With Oats
 * Strict compliance: COD is NOT displayed.
 *
 * @package Made_With_Oats
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="container checkout-page-wrapper">
    <header class="checkout-header">
        <span class="eyebrow"><?php esc_html_e( 'Express Secure Checkout', 'made-with-oats' ); ?></span>
        <h1 class="checkout-title"><?php esc_html_e( 'Shipping &amp; Payment', 'made-with-oats' ); ?></h1>
    </header>

    <div class="checkout-layout">
        <!-- Billing / Shipping Form -->
        <div class="checkout-form-card">
            <h2 class="form-section-title">1. Customer &amp; Delivery Details</h2>
            
            <div class="form-row-2col">
                <div class="form-field">
                    <label class="field-label">First Name *</label>
                    <input type="text" required class="field-input" placeholder="e.g. Priyanshu">
                </div>
                <div class="form-field">
                    <label class="field-label">Last Name *</label>
                    <input type="text" required class="field-input" placeholder="e.g. Sharma">
                </div>
            </div>

            <div class="form-row-2col">
                <div class="form-field">
                    <label class="field-label">Phone Number (For Delivery Updates) *</label>
                    <input type="tel" required placeholder="+91 98765 43210" class="field-input">
                </div>
                <div class="form-field">
                    <label class="field-label">Email Address *</label>
                    <input type="email" required placeholder="you@example.com" class="field-input">
                </div>
            </div>

            <div class="form-field">
                <label class="field-label">House / Flat / Building No. &amp; Street Address *</label>
                <input type="text" placeholder="Flat, Apartment, Floor, Building name" required class="field-input" style="margin-bottom: 0.5rem;">
                <input type="text" placeholder="Colony, Landmark, Road, Area" class="field-input">
            </div>

            <div class="form-row-3col">
                <div class="form-field">
                    <label class="field-label">Town / City *</label>
                    <input type="text" required class="field-input" placeholder="e.g. Mumbai">
                </div>
                <div class="form-field">
                    <label class="field-label">State *</label>
                    <input type="text" required class="field-input" placeholder="e.g. Maharashtra">
                </div>
                <div class="form-field">
                    <label class="field-label">PIN Code *</label>
                    <input type="text" required class="field-input" placeholder="e.g. 400095" maxlength="6">
                </div>
            </div>

            <!-- Payment Method: COD STRICTLY REMOVED -->
            <h2 class="form-section-title" style="margin-top: 2rem;">2. Payment Method</h2>
            <div class="payment-options-list">
                <label class="payment-radio-card is-selected">
                    <input type="radio" name="payment_method" value="upi" checked>
                    <div class="payment-label-content">
                        <strong>Instant UPI (Google Pay, PhonePe, Paytm, BHIM)</strong>
                        <span>Fastest checkout with instant automated order confirmation.</span>
                    </div>
                </label>
                
                <label class="payment-radio-card">
                    <input type="radio" name="payment_method" value="cards">
                    <div class="payment-label-content">
                        <strong>Credit &amp; Debit Cards</strong>
                        <span>Visa, MasterCard, RuPay, Maestro &amp; American Express.</span>
                    </div>
                </label>

                <label class="payment-radio-card">
                    <input type="radio" name="payment_method" value="netbanking">
                    <div class="payment-label-content">
                        <strong>NetBanking</strong>
                        <span>All Indian Banks (HDFC, ICICI, SBI, Axis, Kotak, etc.).</span>
                    </div>
                </label>
            </div>

            <div class="checkout-notice-box">
                ℹ️ <strong>Cash on Delivery (COD) is NOT available.</strong> All orders are freshly prepared in small batches and dispatched via our trusted courier partners after secure online payment.
            </div>
        </div>

        <!-- Checkout Order Review Card -->
        <div class="checkout-summary-card">
            <h2 class="summary-title"><?php esc_html_e( 'Your Order', 'made-with-oats' ); ?></h2>
            
            <div class="checkout-items-list">
                <div class="checkout-item-line">
                    <div class="checkout-item-name">
                        <strong>Dark Chocolate Blueberry Granola (200g)</strong>
                        <span>Qty: 1</span>
                    </div>
                    <span class="checkout-item-cost">₹260</span>
                </div>

                <div class="checkout-item-line">
                    <div class="checkout-item-name">
                        <strong>Chocolate Rajgira Bites (250g)</strong>
                        <span>Qty: 1</span>
                    </div>
                    <span class="checkout-item-cost">₹350</span>
                </div>
            </div>

            <div class="summary-row">
                <span>Subtotal</span>
                <span>₹610</span>
            </div>
            <div class="summary-row">
                <span>Pan-India Delivery</span>
                <span>₹80</span>
            </div>
            <div class="summary-row" style="font-size: 0.8rem; color: var(--color-forest-olive);">
                <span>Free shipping threshold</span>
                <span>Above ₹1299</span>
            </div>
            <div class="summary-row">
                <span>GST (Goods &amp; Services Tax)</span>
                <span>Included</span>
            </div>
            
            <div class="summary-row total">
                <span>Total Payable</span>
                <span>₹690</span>
            </div>

            <button type="button" class="btn btn-primary btn-lg btn-place-order" onclick="alert('Order placed successfully in local development simulation! Payment gateway integration will be connected upon receiving live credentials.');">
                <span>Place Order &bull; ₹670</span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
            </button>

            <div class="checkout-security-meta">
                <span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                    256-Bit SSL Encrypted Banking
                </span>
                <span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                    Reliable Pan-India Dispatch
                </span>
            </div>
        </div>
    </div>
</div>
