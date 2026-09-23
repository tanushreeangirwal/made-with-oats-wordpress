<?php
/**
 * Template Name: Privacy Policy Page
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
                <span aria-current="page"><?php esc_html_e( 'Privacy Policy', 'made-with-oats' ); ?></span>
            </nav>
            <h1 class="page-banner-title"><?php esc_html_e( 'Privacy Policy', 'made-with-oats' ); ?></h1>
            <p class="page-banner-subtitle"><?php esc_html_e( 'How Made With Oats protects, respects, and handles your personal information.', 'made-with-oats' ); ?></p>
            <div class="policy-badge-row">
                <span class="policy-status-pill">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <?php esc_html_e( 'Last Updated: September 2026', 'made-with-oats' ); ?>
                </span>
                <span class="policy-status-pill">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    <?php esc_html_e( 'Compliant with IT Act, 2000 & SPDI Rules', 'made-with-oats' ); ?>
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
                <li><a href="#section-1" class="policy-toc-link">1. <?php esc_html_e( 'Commitment & Scope', 'made-with-oats' ); ?></a></li>
                <li><a href="#section-2" class="policy-toc-link">2. <?php esc_html_e( 'Information We Collect', 'made-with-oats' ); ?></a></li>
                <li><a href="#section-3" class="policy-toc-link">3. <?php esc_html_e( 'Zero Card Data Storage', 'made-with-oats' ); ?></a></li>
                <li><a href="#section-4" class="policy-toc-link">4. <?php esc_html_e( 'Purpose of Processing', 'made-with-oats' ); ?></a></li>
                <li><a href="#section-5" class="policy-toc-link">5. <?php esc_html_e( 'Zero-Sale Data Guarantee', 'made-with-oats' ); ?></a></li>
                <li><a href="#section-6" class="policy-toc-link">6. <?php esc_html_e( 'Cookies & Local Storage', 'made-with-oats' ); ?></a></li>
                <li><a href="#section-7" class="policy-toc-link">7. <?php esc_html_e( 'Retention & Security', 'made-with-oats' ); ?></a></li>
                <li><a href="#section-8" class="policy-toc-link">8. <?php esc_html_e( 'Your Privacy Rights', 'made-with-oats' ); ?></a></li>
                <li><a href="#section-9" class="policy-toc-link">9. <?php esc_html_e( 'Grievance Contact', 'made-with-oats' ); ?></a></li>
            </ul>
        </nav>

        <!-- Main Legal Article -->
        <article class="policy-article-card">
            <!-- Section 1 -->
            <section id="section-1" class="policy-section">
                <h2>1. <?php esc_html_e( 'Commitment & Scope', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'Made With Oats ("we", "our", or "us") is an artisanal food kitchen based in Malad West, Mumbai, Maharashtra. We bake fresh, small-batch granolas, bars, and bites made with whole rolled oats and premium natural ingredients.', 'made-with-oats' ); ?></p>
                <p><?php esc_html_e( 'We are deeply committed to safeguarding the privacy and digital rights of our customers and visitors. This Privacy Policy details our practices regarding the collection, storage, utilization, and protection of your personal information in compliance with the Information Technology Act, 2000, and the Information Technology (Reasonable Security Practices and Procedures and Sensitive Personal Data or Information) Rules, 2011 ("SPDI Rules").', 'made-with-oats' ); ?></p>
            </section>

            <!-- Section 2 -->
            <section id="section-2" class="policy-section">
                <h2>2. <?php esc_html_e( 'Information We Collect', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'To prepare your freshly baked orders, coordinate reliable transit, and provide thoughtful customer assistance, we collect the following categories of information:', 'made-with-oats' ); ?></p>
                <ul>
                    <li><strong><?php esc_html_e( 'Contact & Delivery Details:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'Full name, shipping destination address, landmark, postal pin code, active contact phone number, and email address.', 'made-with-oats' ); ?></li>
                    <li><strong><?php esc_html_e( 'Order & Transaction Records:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'Selected items, bag quantities, pack sizes, order timestamps, total transaction amounts, and payment confirmation IDs.', 'made-with-oats' ); ?></li>
                    <li><strong><?php esc_html_e( 'Customer Communications:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'Records of inquiries or assistance requests sent via WhatsApp, phone call, or email to our customer care team.', 'made-with-oats' ); ?></li>
                    <li><strong><?php esc_html_e( 'Technical & Browsing Data:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'Anonymized device telemetry including browser type, operating system version, approximate IP geolocation, and session timestamps.', 'made-with-oats' ); ?></li>
                </ul>
            </section>

            <!-- Section 3 -->
            <section id="section-3" class="policy-section">
                <h2>3. <?php esc_html_e( 'Payment Security & Zero Card Data Storage', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'We believe in total financial transparency and uncompromising digital security for all our patrons.', 'made-with-oats' ); ?></p>
                <div class="policy-callout">
                    <p><strong><?php esc_html_e( '100% Secure Prepaid Transactions:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'Made With Oats strictly does NOT store, log, or process credit card numbers, debit card numbers, CVVs, expiration dates, or bank account passwords on our servers. All digital payments (UPI via Google Pay / PhonePe / Paytm, Credit/Debit Cards, and NetBanking) are processed through RBI-compliant, 256-bit SSL encrypted third-party payment gateways meeting global PCI-DSS Level 1 certification standards.', 'made-with-oats' ); ?></p>
                </div>
                <p><?php esc_html_e( 'Because all our snacks are prepared fresh to order in weekly batches, Cash on Delivery (COD) is strictly unavailable. Full digital prepayment is authorized prior to fresh kitchen dispatch.', 'made-with-oats' ); ?></p>
            </section>

            <!-- Section 4 -->
            <section id="section-4" class="policy-section">
                <h2>4. <?php esc_html_e( 'Purpose of Information Processing', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'Your personal data is used exclusively for transparent, legitimate operational purposes:', 'made-with-oats' ); ?></p>
                <ol>
                    <li><strong><?php esc_html_e( 'Kitchen Batch Scheduling:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'Scheduling fresh batch preparation of your chosen granolas and snacks.', 'made-with-oats' ); ?></li>
                    <li><strong><?php esc_html_e( 'Logistics Coordination:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'Booking doorstep transit with our verified delivery courier partners.', 'made-with-oats' ); ?></li>
                    <li><strong><?php esc_html_e( 'Transactional Notifications:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'Sending automated SMS, WhatsApp, and email alerts containing courier tracking links and delivery status updates.', 'made-with-oats' ); ?></li>
                    <li><strong><?php esc_html_e( 'Customer Care Support:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'Answering ingredient questions, addressing special delivery requests, and resolving transit queries.', 'made-with-oats' ); ?></li>
                    <li><strong><?php esc_html_e( 'Voluntary Batch Announcements:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'If you explicitly opt in to our newsletter, receiving occasional notices regarding fresh seasonal batch launches (you can unsubscribe anytime with zero fuss).', 'made-with-oats' ); ?></li>
                </ol>
            </section>

            <!-- Section 5 -->
            <section id="section-5" class="policy-section">
                <h2>5. <?php esc_html_e( 'Strict Zero-Sale Policy & Third-Party Disclosure', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'We respect your inbox and your personal space as much as our own.', 'made-with-oats' ); ?></p>
                <div class="policy-callout gold">
                    <p><strong><?php esc_html_e( 'Our Zero-Sale Guarantee:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'We never sell, rent, trade, monetize, or lease your personal contact details or order records to data brokers, marketing agencies, or unsolicited third parties.', 'made-with-oats' ); ?></p>
                </div>
                <p><?php esc_html_e( 'Information disclosure occurs only under verified necessity: with courier partners for physical package delivery, payment gateways for digital verification and approved refunds, or under statutory legal obligation.', 'made-with-oats' ); ?></p>
            </section>

            <!-- Section 6 -->
            <section id="section-6" class="policy-section">
                <h2>6. <?php esc_html_e( 'Cookies & Local Storage', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'To provide a smooth, responsive shopping experience without forcing you to create an account immediately, our website utilizes standard browser storage technologies:', 'made-with-oats' ); ?></p>
                <ul>
                    <li><strong><?php esc_html_e( 'Guest Cart & Wishlist (Local Storage):', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'We store your selected items in local browser storage so your shopping bag and saved snacks are remembered without forced registration.', 'made-with-oats' ); ?></li>
                    <li><strong><?php esc_html_e( 'Functional Session Identifiers:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'Minimal session identifiers used to maintain secure navigation and site performance. We do not deploy invasive third-party cross-site advertising trackers.', 'made-with-oats' ); ?></li>
                </ul>
            </section>

            <!-- Section 7 -->
            <section id="section-7" class="policy-section">
                <h2>7. <?php esc_html_e( 'Data Retention & Security Measures', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'We employ administrative, technical, and physical safeguards designed to protect personal information from unauthorized access, loss, alteration, or disclosure:', 'made-with-oats' ); ?></p>
                <ul>
                    <li><?php esc_html_e( 'All web traffic is encrypted end-to-end via Transport Layer Security (TLS 1.3 / SSL).', 'made-with-oats' ); ?></li>
                    <li><?php esc_html_e( 'Internal access to dispatch manifests is strictly restricted to designated fulfillment personnel.', 'made-with-oats' ); ?></li>
                    <li><?php esc_html_e( 'Order transaction records are retained only for the duration required to satisfy operational, tax, accounting, and legal audit requirements under Indian law.', 'made-with-oats' ); ?></li>
                </ul>
            </section>

            <!-- Section 8 -->
            <section id="section-8" class="policy-section">
                <h2>8. <?php esc_html_e( 'Your Privacy Rights & Choices', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'As a valued customer, you have the right to review, update, or request the deletion of your contact information from our operational communication lists once order fulfillment is concluded.', 'made-with-oats' ); ?></p>
            </section>

            <!-- Section 9 -->
            <section id="section-9" class="policy-section">
                <h2>9. <?php esc_html_e( 'Grievance Officer & Contact Information', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'Questions, concerns, or requests regarding this Privacy Policy should be directed to our designated Data Coordinator:', 'made-with-oats' ); ?></p>

                <div class="policy-contact-card">
                    <div class="policy-contact-item">
                        <span class="policy-contact-label"><?php esc_html_e( 'Data Coordinator', 'made-with-oats' ); ?></span>
                        <span class="policy-contact-value"><?php esc_html_e( 'Customer Privacy Desk', 'made-with-oats' ); ?></span>
                    </div>
                    <div class="policy-contact-item">
                        <span class="policy-contact-label"><?php esc_html_e( 'Email Support', 'made-with-oats' ); ?></span>
                        <span class="policy-contact-value"><a href="mailto:madewithoats09@gmail.com">madewithoats09@gmail.com</a></span>
                    </div>
                    <div class="policy-contact-item">
                        <span class="policy-contact-label"><?php esc_html_e( 'WhatsApp Helpline', 'made-with-oats' ); ?></span>
                        <span class="policy-contact-value"><a href="https://wa.me/918355869270" target="_blank" rel="noopener">+91 83558 69270</a></span>
                    </div>
                    <div class="policy-contact-item">
                        <span class="policy-contact-label"><?php esc_html_e( 'Kitchen Location', 'made-with-oats' ); ?></span>
                        <span class="policy-contact-value">Malad West, Mumbai - 400095, Maharashtra, India</span>
                    </div>
                </div>
            </section>
        </article>
    </div>
</main>

<?php
get_footer();
