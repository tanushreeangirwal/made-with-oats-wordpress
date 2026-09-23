<?php
/**
 * Template Name: Shipping & Delivery Page
 *
 * @package Made_With_Oats
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="shop-hero-banner">
        <div class="container">
            <span class="eyebrow eyebrow-gold"><?php esc_html_e( 'PAN-INDIA FULFILLMENT', 'made-with-oats' ); ?></span>
            <h1 class="page-title"><?php esc_html_e( 'Shipping &amp; Delivery Policy', 'made-with-oats' ); ?></h1>
            <p><?php esc_html_e( 'Transparent logistics, careful packaging, and doorstep delivery across India.', 'made-with-oats' ); ?></p>
        </div>
    </div>

    <div class="container container-narrow" style="padding-top: var(--space-3xl); padding-bottom: var(--space-4xl);">
        <article class="card policy-card">
            <section class="policy-section">
                <h2>1. Pan-India Delivery Coverage</h2>
                <p>Made With Oats proudly ships to serviceable pin-codes across India. All orders are carefully packed in airtight, protective eco-conscious packaging to ensure that your granolas, bites, and bars arrive in pristine, crunchy condition.</p>
            </section>

            <section class="policy-section">
                <h2>2. Logistics &amp; Courier Partners</h2>
                <p>We partner with reliable logistics and courier services for safe handling and doorstep distribution across all states and union territories in India.</p>
            </section>

            <section class="policy-section">
                <h2>3. Shipping Charges &amp; Free Delivery Threshold</h2>
                <div class="highlight-info-card">
                    <ul>
                        <li><strong>Maharashtra Deliveries:</strong> Flat rate of <strong>₹80</strong> per order.</li>
                        <li><strong>Outside Maharashtra / Rest of India:</strong> Flat rate of <strong>₹100</strong> per order.</li>
                        <li><strong>Free Shipping Benefit:</strong> Enjoy <strong>100% Free Shipping</strong> on all orders of <strong>₹1299 or above</strong>.</li>
                    </ul>
                </div>
            </section>

            <section class="policy-section">
                <h2>4. Estimated Delivery Timelines</h2>
                <p>As our snacks are handcrafted and oven-toasted in small batches to guarantee optimal freshness, dispatches occur within 24 to 48 hours of order placement:</p>
                <div class="timeline-comparison-grid">
                    <div class="timeline-box">
                        <span class="timeline-region">Maharashtra Deliveries</span>
                        <strong class="timeline-days">~5 &ndash; 7 Business Days</strong>
                        <span class="timeline-note">Direct dispatch from our Mumbai kitchen</span>
                    </div>
                    <div class="timeline-box">
                        <span class="timeline-region">Outside Maharashtra / Rest of India</span>
                        <strong class="timeline-days">~7 &ndash; 10 Business Days</strong>
                        <span class="timeline-note">Via reliable nationwide surface network</span>
                    </div>
                </div>
            </section>

            <section class="policy-section">
                <h2>5. Payment Terms &amp; COD Policy</h2>
                <div class="warning-alert-card">
                    <strong>Cash on Delivery (COD) is NOT AVAILABLE:</strong><br>
                    Due to the perishable and small-batch artisanal nature of our food products, all orders must be prepaid via secure online checkout (Instant UPI, Credit/Debit Cards, or NetBanking).
                </div>
            </section>

            <section class="policy-section">
                <h2>6. Order Tracking</h2>
                <p>Once your package is scanned and collected by our logistics partner, an automated dispatch notification containing your <strong>Tracking ID / AWB</strong> will be sent to your registered email and phone number. You can track your shipment anytime via our <a href="<?php echo esc_url( home_url( '/track-order' ) ); ?>" style="color: var(--color-forest-olive); text-decoration: underline; font-weight: 600;">Track Order</a> page.</p>
            </section>

            <div class="policy-contact-footer">
                <p>Need delivery assistance? Reach our dispatch desk at <a href="mailto:madewithoats09@gmail.com">madewithoats09@gmail.com</a> or WhatsApp us at <a href="https://wa.me/918355869270">+91 83558 69270</a>.</p>
            </div>
        </article>
    </div>
</main>

<?php
get_footer();
