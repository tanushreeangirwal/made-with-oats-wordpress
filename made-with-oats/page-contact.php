<?php
/**
 * Template Name: Contact Us Page
 *
 * @package Made_With_Oats
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="shop-hero-banner">
        <div class="container">
            <span class="eyebrow eyebrow-gold"><?php esc_html_e( 'WE ARE HERE FOR YOU', 'made-with-oats' ); ?></span>
            <h1 class="page-title"><?php esc_html_e( 'Get in Touch', 'made-with-oats' ); ?></h1>
            <p><?php esc_html_e( 'Questions about our small-batch snacks, order dispatches, or bespoke hampers? Reach out anytime.', 'made-with-oats' ); ?></p>
        </div>
    </div>

    <div class="container" style="padding-top: var(--space-3xl); padding-bottom: var(--space-4xl);">
        <div class="contact-grid-2col">
            <!-- Contact Details Card -->
            <div class="card contact-info-card">
                <span class="eyebrow"><?php esc_html_e( 'CONNECT DIRECTLY', 'made-with-oats' ); ?></span>
                <h2 style="font-size: 1.8rem; color: var(--color-espresso); margin-bottom: 1.5rem;">Contact Information</h2>
                
                <div class="contact-details-list">
                    <div class="contact-detail-row">
                        <span class="contact-icon-bubble" style="display:flex; align-items:center; justify-content:center; color:var(--color-terracotta);">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        </span>
                        <div>
                            <strong>Phone Number:</strong><br>
                            <a href="tel:+919619349819" class="contact-highlight-link">+91 96193 49819</a><br>
                            <span class="contact-timing-sub">Monday &ndash; Saturday: 9:30 AM to 6:30 PM IST</span>
                        </div>
                    </div>

                    <div class="contact-detail-row">
                        <span class="contact-icon-bubble" style="display:flex; align-items:center; justify-content:center; color:var(--color-forest-olive);">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                        </span>
                        <div>
                            <strong>WhatsApp Support:</strong><br>
                            <a href="https://wa.me/918355869270" target="_blank" rel="noopener" class="contact-highlight-link">+91 83558 69270</a><br>
                            <span class="contact-timing-sub">Quick responses for order &amp; tracking queries</span>
                        </div>
                    </div>

                    <div class="contact-detail-row">
                        <span class="contact-icon-bubble" style="display:flex; align-items:center; justify-content:center; color:var(--color-gold);">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        </span>
                        <div>
                            <strong>Email Address:</strong><br>
                            <a href="mailto:madewithoats09@gmail.com" class="contact-highlight-link">madewithoats09@gmail.com</a>
                        </div>
                    </div>

                    <div class="contact-detail-row">
                        <span class="contact-icon-bubble" style="display:flex; align-items:center; justify-content:center; color:var(--color-warm-brown);">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        </span>
                        <div>
                            <strong>Registered Location:</strong><br>
                            Malad West, Mumbai &ndash; 400095<br>
                            Maharashtra, India
                        </div>
                    </div>
                </div>

                <div class="contact-whatsapp-banner">
                    <a href="https://wa.me/918355869270" class="whatsapp-pill" target="_blank" rel="noopener">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2z"></path></svg>
                        <span>Chat on WhatsApp (+91 83558 69270)</span>
                    </a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="card contact-form-card">
                <span class="eyebrow"><?php esc_html_e( 'LEAVE A NOTE', 'made-with-oats' ); ?></span>
                <h2 style="font-size: 1.8rem; color: var(--color-espresso); margin-bottom: 1.5rem;">Send Us a Message</h2>
                <form action="#" method="post" onsubmit="event.preventDefault(); alert('Thank you for reaching out! We will reply to your message shortly.');" class="contact-message-form">
                    <div class="form-row-2col">
                        <div class="form-field">
                            <label class="field-label">Your Name *</label>
                            <input type="text" required class="field-input" placeholder="e.g. Ananya Sharma">
                        </div>
                        <div class="form-field">
                            <label class="field-label">Phone Number *</label>
                            <input type="tel" required class="field-input" placeholder="+91">
                        </div>
                    </div>

                    <div class="form-field">
                        <label class="field-label">Email Address *</label>
                        <input type="email" required class="field-input" placeholder="you@example.com">
                    </div>

                    <div class="form-field">
                        <label class="field-label">Subject</label>
                        <input type="text" placeholder="Order question, corporate hamper, feedback" class="field-input">
                    </div>

                    <div class="form-field">
                        <label class="field-label">Message *</label>
                        <textarea rows="5" required class="field-input" placeholder="How can we help you today?"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg" style="align-self: flex-start;">
                        <span>Send Message</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
