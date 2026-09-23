<?php
/**
 * Template Name: Returns & Refunds Page
 *
 * @package Made_With_Oats
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="shop-hero-banner">
        <div class="container">
            <span class="eyebrow eyebrow-gold"><?php esc_html_e( 'PEACE OF MIND', 'made-with-oats' ); ?></span>
            <h1 class="page-title"><?php esc_html_e( 'Returns &amp; Refunds Policy', 'made-with-oats' ); ?></h1>
            <p><?php esc_html_e( 'Our commitment to quality, freshness, and customer satisfaction.', 'made-with-oats' ); ?></p>
        </div>
    </div>

    <div class="container container-narrow" style="padding-top: var(--space-3xl); padding-bottom: var(--space-4xl);">
        <article class="card policy-card">
            <section class="policy-section">
                <h2>1. Food Safety &amp; Perishable Product Standards</h2>
                <p>Because Made With Oats crafts artisanal food and snack products with natural ingredients and zero artificial preservatives, we cannot accept returns of food items once they have left our controlled packing environment, in compliance with food safety regulations.</p>
            </section>

            <section class="policy-section">
                <h2>2. Damaged or Tampered Shipments</h2>
                <p>If your package arrives visibly damaged, unsealed, or compromised in transit, we will immediately make it right with a replacement or full refund:</p>
                <ul>
                    <li>Notify us within <strong>48 hours</strong> of package receipt.</li>
                    <li>Share clear photographs or a short video clip of the external shipping package and the damaged product to <a href="mailto:madewithoats09@gmail.com" style="color: var(--color-forest-olive); font-weight: 600;">madewithoats09@gmail.com</a> or WhatsApp <a href="https://wa.me/918355869270" style="color: var(--color-forest-olive); font-weight: 600;">+91 83558 69270</a>.</li>
                    <li>Please mention your Order ID and contact details.</li>
                </ul>
            </section>

            <section class="policy-section">
                <h2>3. Incorrect Items Delivered</h2>
                <p>In the rare event that an incorrect variant, flavour, or pack size was fulfilled, please alert us within 48 hours. We will promptly dispatch the correct item to you at zero additional cost.</p>
            </section>

            <section class="policy-section">
                <h2>4. Refund Processing Time</h2>
                <p>Approved refunds are credited back to the original mode of payment (UPI ID, Card account, or NetBanking) within <strong>5 to 7 business days</strong> following internal validation.</p>
            </section>

            <div class="policy-contact-footer">
                <p>Have questions regarding your order? We are here to help: call <a href="tel:+919619349819">+91 96193 49819</a> or email <a href="mailto:madewithoats09@gmail.com">madewithoats09@gmail.com</a>.</p>
            </div>
        </article>
    </div>
</main>

<?php
get_footer();
