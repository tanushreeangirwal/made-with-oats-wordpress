<?php
/**
 * Template Name: Terms & Conditions Page
 *
 * @package Made_With_Oats
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Header Banner -->
    <header class="policy-page-header">
        <div class="container container-narrow">
            <nav class="policy-breadcrumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'made-with-oats' ); ?>">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'made-with-oats' ); ?></a>
                <span aria-hidden="true">&rsaquo;</span>
                <span><?php esc_html_e( 'Legal', 'made-with-oats' ); ?></span>
                <span aria-hidden="true">&rsaquo;</span>
                <span aria-current="page"><?php esc_html_e( 'Terms & Conditions', 'made-with-oats' ); ?></span>
            </nav>
            <h1 class="page-banner-title"><?php esc_html_e( 'Terms & Conditions', 'made-with-oats' ); ?></h1>
            <p class="page-banner-subtitle"><?php esc_html_e( 'Guidelines, ordering policies, and conditions governing the Made With Oats store.', 'made-with-oats' ); ?></p>
            <div class="policy-badge-row">
                <span class="policy-status-pill">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <?php esc_html_e( 'Last Updated: September 2026', 'made-with-oats' ); ?>
                </span>
                <span class="policy-status-pill">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    <?php esc_html_e( 'Governed by the Laws of India', 'made-with-oats' ); ?>
                </span>
            </div>
        </div>
    </header>

    <div class="container container-narrow" style="padding-top: var(--space-8, 2rem); padding-bottom: var(--space-16, 4rem);">
        <!-- Table of Contents Navigation -->
        <nav class="policy-toc-nav" aria-label="<?php esc_attr_e( 'Table of Contents', 'made-with-oats' ); ?>">
            <h2 class="policy-toc-title">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
                <?php esc_html_e( 'Quick Navigation', 'made-with-oats' ); ?>
            </h2>
            <ul class="policy-toc-grid">
                <li><a href="#section-1" class="policy-toc-link">1. <?php esc_html_e( 'Agreement to Terms', 'made-with-oats' ); ?></a></li>
                <li><a href="#section-2" class="policy-toc-link">2. <?php esc_html_e( 'Small-Batch Production', 'made-with-oats' ); ?></a></li>
                <li><a href="#section-3" class="policy-toc-link">3. <?php esc_html_e( 'Allergens & Storage', 'made-with-oats' ); ?></a></li>
                <li><a href="#section-4" class="policy-toc-link">4. <?php esc_html_e( 'Pricing & Prepaid Policy', 'made-with-oats' ); ?></a></li>
                <li><a href="#section-5" class="policy-toc-link">5. <?php esc_html_e( 'Order Cancellations', 'made-with-oats' ); ?></a></li>
                <li><a href="#section-6" class="policy-toc-link">6. <?php esc_html_e( 'Shipping & Delivery', 'made-with-oats' ); ?></a></li>
                <li><a href="#section-7" class="policy-toc-link">7. <?php esc_html_e( 'Damaged Replacements', 'made-with-oats' ); ?></a></li>
                <li><a href="#section-8" class="policy-toc-link">8. <?php esc_html_e( 'Intellectual Property', 'made-with-oats' ); ?></a></li>
                <li><a href="#section-9" class="policy-toc-link">9. <?php esc_html_e( 'Liability & Force Majeure', 'made-with-oats' ); ?></a></li>
                <li><a href="#section-10" class="policy-toc-link">10. <?php esc_html_e( 'Governing Jurisdiction', 'made-with-oats' ); ?></a></li>
                <li><a href="#section-11" class="policy-toc-link">11. <?php esc_html_e( 'Customer Support', 'made-with-oats' ); ?></a></li>
            </ul>
        </nav>

        <!-- Main Legal Article -->
        <article class="policy-article-card">
            <!-- Section 1 -->
            <section id="section-1" class="policy-section">
                <h2>1. <?php esc_html_e( 'Agreement to Terms', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'Welcome to Made With Oats ("Website", "we", "us", or "our"), operated from Malad West, Mumbai - 400095, Maharashtra, India. By accessing, browsing, or placing an order on this website, you acknowledge that you have read, understood, and agreed to be legally bound by these Terms & Conditions, together with our associated policies.', 'made-with-oats' ); ?></p>
            </section>

            <!-- Section 2 -->
            <section id="section-2" class="policy-section">
                <h2>2. <?php esc_html_e( 'Artisanal Small-Batch Production & Freshness', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'Unlike mass-manufactured industrial products, Made With Oats granolas, snack bars, and indulgent chocolate bites are freshly prepared in small artisanal kitchen batches:', 'made-with-oats' ); ?></p>
                <ul>
                    <li><strong><?php esc_html_e( 'Batch Schedules:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'Every order is scheduled into our active weekly baking schedule to ensure customers receive recently baked, crunchy, and fragrant snacks.', 'made-with-oats' ); ?></li>
                    <li><strong><?php esc_html_e( 'Natural Artisanal Variations:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'Because our snacks are mixed, tossed, and slow-baked by hand, slight natural variations in cluster size, roast depth, and color are natural hallmarks of artisanal small-batch baking.', 'made-with-oats' ); ?></li>
                    <li><strong><?php esc_html_e( 'Pack Weight Integrity:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'While visual cluster shapes vary naturally, each package is weighed meticulously to meet or exceed the labeled pack weight.', 'made-with-oats' ); ?></li>
                </ul>
            </section>

            <!-- Section 3 -->
            <section id="section-3" class="policy-section">
                <h2>3. <?php esc_html_e( 'Ingredient Quality, Allergen Disclosure & Storage', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'We pride ourselves on using real, uncompromised ingredients: whole rolled oats, roasted nuts, pure seeds, cocoa, and wholesome sweeteners. Please review our safety guidelines:', 'made-with-oats' ); ?></p>
                <div class="policy-callout warning">
                    <p><strong><?php esc_html_e( 'Allergen Notice:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'Our products are prepared in a dedicated kitchen facility that handles tree nuts (almonds, cashews, walnuts), peanuts, sesame seeds, oats, and dairy/chocolate. If you or any recipient has severe food allergies, please review the complete ingredient list on the product package or reach out to our team before ordering.', 'made-with-oats' ); ?></p>
                </div>
                <p><?php esc_html_e( 'To maintain optimal crunchiness and aromatic flavor, store snacks in an airtight container in a cool, dry place away from direct sunlight and humidity. Consume within the shelf-life indicated on your package label.', 'made-with-oats' ); ?></p>
            </section>

            <!-- Section 4 -->
            <section id="section-4" class="policy-section">
                <h2>4. <?php esc_html_e( 'Pricing, Taxes & Strict Prepaid Policy', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'All prices listed on the website are quoted in Indian Rupees (INR, ₹) and are inclusive of applicable goods and services taxes (GST):', 'made-with-oats' ); ?></p>
                <ul>
                    <li><strong><?php esc_html_e( 'Strict No Cash on Delivery (COD) Policy:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'Because our snacks are perishable food items baked fresh to order, Cash on Delivery is strictly NOT AVAILABLE. We process only prepaid orders to avoid logistics abandonment of perishable food.', 'made-with-oats' ); ?></li>
                    <li><strong><?php esc_html_e( 'Payment Gateways:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'We accept all major UPI applications (Google Pay, PhonePe, Paytm, BHIM), Indian and international Debit/Credit Cards (Visa, MasterCard, RuPay), and NetBanking via authorized 256-bit SSL encrypted payment gateways.', 'made-with-oats' ); ?></li>
                </ul>
            </section>

            <!-- Section 5 -->
            <section id="section-5" class="policy-section">
                <h2>5. <?php esc_html_e( 'Order Verification, Processing & Cancellations', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'Orders are confirmed upon successful online payment authorization. An automated order receipt is immediately generated and sent via email and WhatsApp.', 'made-with-oats' ); ?></p>
                <div class="policy-callout gold">
                    <p><strong><?php esc_html_e( 'Order Modification & Cancellation Grace Period:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'You may request an address correction or cancellation within 2 hours of placing your order by contacting us on WhatsApp. Once batch baking, sealing, or courier manifest creation has begun, orders cannot be cancelled.', 'made-with-oats' ); ?></p>
                </div>
            </section>

            <!-- Section 6 -->
            <section id="section-6" class="policy-section">
                <h2>6. <?php esc_html_e( 'Shipping Timelines & Customer Transit Responsibilities', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'We partner with premier Indian logistics carriers to deliver your fresh snacks safely:', 'made-with-oats' ); ?></p>
                <ul>
                    <li><strong><?php esc_html_e( 'Delivery Timelines:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'Deliveries within Maharashtra generally take 5 to 7 business days. Nationwide deliveries outside Maharashtra typically take 7 to 10 business days from dispatch.', 'made-with-oats' ); ?></li>
                    <li><strong><?php esc_html_e( 'Free Shipping Threshold:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'Orders with a merchandise cart value of ₹1,299 or higher qualify for free delivery across India. Orders below ₹1,299 incur a flat ₹80 fee within Maharashtra or ₹100 outside Maharashtra.', 'made-with-oats' ); ?></li>
                    <li><strong><?php esc_html_e( 'Recipient Information Accuracy:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'Customers are responsible for providing complete and accurate destination details, including a valid 6-digit postal pin code and reachable mobile phone number.', 'made-with-oats' ); ?></li>
                </ul>
            </section>

            <!-- Section 7 -->
            <section id="section-7" class="policy-section">
                <h2>7. <?php esc_html_e( 'Food Safety, Damaged Deliveries & Replacement Policy', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'In adherence to Food Safety and Standards Authority of India (FSSAI) hygiene regulations, food products once dispatched and delivered cannot be returned or restocked.', 'made-with-oats' ); ?></p>
                <div class="policy-callout">
                    <p><strong><?php esc_html_e( '48-Hour Damage Guarantee:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'If your parcel arrives with physical transit damage, seal tampering, or a wrong item was mistakenly packed, please notify our team within 48 hours of delivery with clear photographs/video for a prompt free replacement batch or complete refund.', 'made-with-oats' ); ?></p>
                </div>
            </section>

            <!-- Section 8 -->
            <section id="section-8" class="policy-section">
                <h2>8. <?php esc_html_e( 'Proprietary Intellectual Property', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'All brand names, trademarks, visual marks, product photographs, custom illustrations, packaging artwork, website copywriting, and original recipes featured on this website are the proprietary intellectual property of Made With Oats.', 'made-with-oats' ); ?></p>
            </section>

            <!-- Section 9 -->
            <section id="section-9" class="policy-section">
                <h2>9. <?php esc_html_e( 'Limitation of Liability & Force Majeure', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'Made With Oats shall not be held liable for indirect or consequential damages arising out of the use of our website or consumption contrary to labeled allergen warnings. Delays caused by Force Majeure circumstances beyond reasonable control are excused.', 'made-with-oats' ); ?></p>
            </section>

            <!-- Section 10 -->
            <section id="section-10" class="policy-section">
                <h2>10. <?php esc_html_e( 'Governing Law & Exclusive Mumbai Jurisdiction', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'These Terms & Conditions shall be governed by and construed in accordance with the substantive laws of India. The courts located in Mumbai, Maharashtra, India shall have exclusive jurisdiction.', 'made-with-oats' ); ?></p>
            </section>

            <!-- Section 11 -->
            <section id="section-11" class="policy-section">
                <h2>11. <?php esc_html_e( 'Customer Support & Legal Inquiries', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'For clarifications concerning these Terms & Conditions or order inquiries, please reach out to our dedicated support team:', 'made-with-oats' ); ?></p>

                <div class="policy-contact-card">
                    <div class="policy-contact-item">
                        <span class="policy-contact-label"><?php esc_html_e( 'Customer Support', 'made-with-oats' ); ?></span>
                        <span class="policy-contact-value"><?php esc_html_e( 'Made With Oats Care Desk', 'made-with-oats' ); ?></span>
                    </div>
                    <div class="policy-contact-item">
                        <span class="policy-contact-label"><?php esc_html_e( 'Email Help', 'made-with-oats' ); ?></span>
                        <span class="policy-contact-value"><a href="mailto:madewithoats09@gmail.com">madewithoats09@gmail.com</a></span>
                    </div>
                    <div class="policy-contact-item">
                        <span class="policy-contact-label"><?php esc_html_e( 'WhatsApp Line', 'made-with-oats' ); ?></span>
                        <span class="policy-contact-value"><a href="https://wa.me/918355869270" target="_blank" rel="noopener">+91 83558 69270</a></span>
                    </div>
                    <div class="policy-contact-item">
                        <span class="policy-contact-label"><?php esc_html_e( 'Kitchen Address', 'made-with-oats' ); ?></span>
                        <span class="policy-contact-value">Malad West, Mumbai - 400095, Maharashtra, India</span>
                    </div>
                </div>
            </section>
        </article>
    </div>
</main>

<?php
get_footer();
