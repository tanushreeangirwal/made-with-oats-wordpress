<?php
/**
 * The footer for Made With Oats theme
 *
 * @package Made_With_Oats
 */
?>
<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Column 1: Brand & Social -->
            <div class="footer-col footer-col-brand">
                <img src="<?php echo esc_url( MADE_WITH_OATS_URI . '/assets/images/logo.png' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="brand-logo-img">
                <h3 class="footer-brand-title">Made with Oats</h3>
                <p class="footer-desc">
                    A homegrown Indian brand focused on better-for-you snacking. Wholesome ingredients, handcrafted with care in small batches.
                </p>
                <div class="social-links" aria-label="<?php esc_attr_e( 'Social Media Links', 'made-with-oats' ); ?>">
                    <a href="https://instagram.com/made.withoats" class="social-icon-btn" target="_blank" rel="noopener" aria-label="Instagram @made.withoats">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </a>
                    <a href="https://wa.me/918355869270" class="social-icon-btn" target="_blank" rel="noopener" aria-label="WhatsApp Us">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                    </a>
                    <a href="https://facebook.com/madewithoats" class="social-icon-btn" target="_blank" rel="noopener" aria-label="Facebook Made With Oats">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                    </a>
                    <a href="https://youtube.com/@Madewithoats" class="social-icon-btn" target="_blank" rel="noopener" aria-label="YouTube @Madewithoats">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
                    </a>
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="footer-col">
                <h4 class="footer-heading"><?php esc_html_e( 'Quick Links', 'made-with-oats' ); ?></h4>
                <ul class="footer-nav">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-link">Home</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="footer-link">Shop All</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="footer-link">Our Story</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="footer-link">Contact Us</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/track-order' ) ); ?>" class="footer-link">Track Order</a></li>
                </ul>
            </div>

            <!-- Column 3: Shop -->
            <div class="footer-col">
                <h4 class="footer-heading"><?php esc_html_e( 'Shop Categories', 'made-with-oats' ); ?></h4>
                <ul class="footer-nav">
                    <li><a href="<?php echo esc_url( home_url( '/category/granola' ) ); ?>" class="footer-link">Granola</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/category/energy-bars' ) ); ?>" class="footer-link">Energy Bars</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/category/bites' ) ); ?>" class="footer-link">Indulgent Chocolate Bites</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/category/snack-bars' ) ); ?>" class="footer-link">Snack Bars</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/category/gift-hampers' ) ); ?>" class="footer-link">Gift Hampers</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/category/combos' ) ); ?>" class="footer-link">Combos</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/category/offers' ) ); ?>" class="footer-link">Special Offers</a></li>
                </ul>
            </div>

            <!-- Column 4: Customer Care -->
            <div class="footer-col">
                <h4 class="footer-heading"><?php esc_html_e( 'Customer Care', 'made-with-oats' ); ?></h4>
                <ul class="footer-nav">
                    <li><a href="<?php echo esc_url( home_url( '/faqs' ) ); ?>" class="footer-link">FAQs</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/shipping-delivery' ) ); ?>" class="footer-link">Shipping &amp; Delivery</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/returns-and-refunds' ) ); ?>" class="footer-link">Returns &amp; Refunds</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/track-order' ) ); ?>" class="footer-link">Track Order</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>" class="footer-link">Privacy Policy</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/terms-conditions' ) ); ?>" class="footer-link">Terms &amp; Conditions</a></li>
                </ul>
            </div>

            <!-- Column 5: Contact -->
            <div class="footer-col">
                <h4 class="footer-heading"><?php esc_html_e( 'Contact Us', 'made-with-oats' ); ?></h4>
                <div class="contact-item">
                    <span class="contact-icon" aria-hidden="true">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    </span>
                    <a href="tel:+919619349819" class="footer-link">+91 96193 49819</a>
                </div>
                <div class="contact-item">
                    <span class="contact-icon" aria-hidden="true">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                    </span>
                    <a href="https://wa.me/918355869270" class="footer-link" target="_blank" rel="noopener">+91 83558 69270</a>
                </div>
                <div class="contact-item">
                    <span class="contact-icon" aria-hidden="true">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </span>
                    <a href="mailto:madewithoats09@gmail.com" class="footer-link">madewithoats09@gmail.com</a>
                </div>
                <div class="contact-item">
                    <span class="contact-icon" aria-hidden="true">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    </span>
                    <span>Malad West, Mumbai - 400095, India</span>
                </div>
                <a href="https://wa.me/918355869270" class="whatsapp-pill" target="_blank" rel="noopener">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2z"></path></svg>
                    <span>Chat on WhatsApp</span>
                </a>
            </div>
        </div>

        <!-- Footer Bottom Bar -->
        <div class="footer-bottom">
            <p>&copy; <?php echo date( 'Y' ); ?> Made With Oats. All rights reserved.</p>
            <div class="footer-editorial-note">
                Naturally Wholesome Snacking &bull; Handcrafted in Mumbai
            </div>
            <div class="payment-badges" aria-label="<?php esc_attr_e( 'Supported Payment Methods', 'made-with-oats' ); ?>">
                <span class="payment-badge-chip">UPI (GPay / PhonePe / Paytm)</span>
                <span class="payment-badge-chip">Credit &amp; Debit Cards</span>
                <span class="payment-badge-chip">NetBanking</span>
                <span class="payment-badge-chip">100% Secure Checkout</span>
            </div>
            <div class="footer-credit">
                <a href="https://www.planetu.co.in" target="_blank" rel="noopener noreferrer" class="footer-credit-link">Designed by PlanetU</a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
