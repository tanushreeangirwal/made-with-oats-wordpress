<?php
/**
 * Template Name: Track Order Page
 *
 * @package Made_With_Oats
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="shop-hero-banner">
        <div class="container">
            <span class="eyebrow eyebrow-gold"><?php esc_html_e( 'SHIPMENT STATUS', 'made-with-oats' ); ?></span>
            <h1 class="page-title"><?php esc_html_e( 'Track Your Order', 'made-with-oats' ); ?></h1>
            <p><?php esc_html_e( 'Enter your Order ID and billing email below to see live updates on your dispatch.', 'made-with-oats' ); ?></p>
        </div>
    </div>

    <div class="container container-narrow" style="padding-top: var(--space-3xl); padding-bottom: var(--space-4xl);">
        <div class="card tracking-form-card">
            <h2 style="font-size: 1.6rem; color: var(--color-espresso); margin-bottom: 0.75rem;">Check Delivery Progress</h2>
            <p style="color: var(--color-text-secondary); margin-bottom: 2rem; font-size: 0.95rem;">
                Your Order ID was provided in your order confirmation email and SMS. Dispatches are handled through our trusted courier partners pan-India.
            </p>

            <!-- Standard WooCommerce Track Form Compatible Layout -->
            <form action="#" method="get" class="track-order-form" onsubmit="event.preventDefault(); document.getElementById('trackingResults').style.display = 'block';">
                <div class="form-field" style="margin-bottom: 1.25rem;">
                    <label class="field-label">Order ID *</label>
                    <input type="text" name="orderid" placeholder="Found in your confirmation email (e.g. MWO-1042)" required class="field-input">
                </div>

                <div class="form-field" style="margin-bottom: 1.5rem;">
                    <label class="field-label">Billing Email Address *</label>
                    <input type="email" name="order_email" placeholder="Email used during checkout" required class="field-input">
                </div>

                <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
                    <span>Track Shipment</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </button>
            </form>

            <!-- Simulated Tracking Result Display -->
            <div id="trackingResults" class="tracking-results-box" style="display: none; margin-top: 2.5rem; padding-top: 2rem; border-top: 1.5px dashed var(--color-border);">
                <div class="tracking-status-header">
                    <span class="tracking-badge-live">In Transit</span>
                    <h3 style="margin-top: 0.5rem; color: var(--color-espresso);">Shipment Status</h3>
                    <p style="font-size: 0.9rem; color: var(--color-text-muted);">Estimated Delivery: Maharashtra ~5-7 days &bull; Outside Maharashtra ~7-10 days</p>
                </div>

                <div class="tracking-timeline-steps">
                    <div class="step-item is-done">
                        <div class="step-circle">✓</div>
                        <div class="step-content">
                            <strong>Order Received &amp; Verified</strong>
                            <span>Small-batch kitchen scheduling confirmed</span>
                        </div>
                    </div>
                    <div class="step-item is-done">
                        <div class="step-circle">✓</div>
                        <div class="step-content">
                            <strong>Freshly Baked &amp; Sealed</strong>
                            <span>Packed in airtight protective food containers</span>
                        </div>
                    </div>
                    <div class="step-item is-active">
                        <div class="step-circle">●</div>
                        <div class="step-content">
                            <strong>Dispatched via Courier Partner</strong>
                            <span>In transit to regional distribution facility</span>
                        </div>
                    </div>
                    <div class="step-item">
                        <div class="step-circle">○</div>
                        <div class="step-content">
                            <strong>Out for Delivery</strong>
                            <span>Local doorstep delivery to customer</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tracking-help-footer" style="margin-top: 2rem; padding: 1rem; background: var(--color-cream-warm); border-radius: var(--radius-md); font-size: 0.85rem; color: var(--color-text-secondary); text-align: center;">
                Need live human support? Contact our customer care at <a href="tel:+919619349819" style="color: var(--color-forest-olive); font-weight: 700;">+91 96193 49819</a> or WhatsApp <a href="https://wa.me/918355869270" style="color: var(--color-forest-olive); font-weight: 700;">+91 83558 69270</a>.
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
