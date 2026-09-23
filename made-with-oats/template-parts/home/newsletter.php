<?php
/**
 * Template part for the Newsletter subscription section
 *
 * @package Made_With_Oats
 */
?>
<section class="newsletter-section" aria-label="<?php esc_attr_e( 'Newsletter Signup', 'made-with-oats' ); ?>">
    <div class="container">
        <div class="newsletter-card">
            <!-- Left Info -->
            <div class="newsletter-info-col">
                <span class="eyebrow"><?php esc_html_e( 'STAY CONNECTED', 'made-with-oats' ); ?></span>
                <h2 class="newsletter-title"><?php esc_html_e( 'Stay close to the good stuff.', 'made-with-oats' ); ?></h2>
                <p class="newsletter-desc">
                    Be the first to hear about new small-batch granola launches, seasonal flavours, exclusive offers, and mindful living stories.
                </p>
            </div>

            <!-- Right Form & Handwritten Touch -->
            <div class="newsletter-form-col">
                <form class="newsletter-form" action="#" method="post" onsubmit="event.preventDefault(); alert('Thank you for subscribing! Stay close to the good stuff.');">
                    <div class="newsletter-input-group">
                        <input type="email" class="newsletter-input" placeholder="<?php esc_attr_e( 'Enter your email address', 'made-with-oats' ); ?>" required>
                        <button type="submit" class="btn btn-primary btn-newsletter-submit">
                            <span>Subscribe</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </button>
                    </div>
                    <span class="newsletter-privacy-note">We respect your inbox. Unsubscribe anytime with zero fuss.</span>
                </form>
                <div class="newsletter-editorial-note">
                    Naturally Wholesome Snacking &bull; Small Batch Goodness
                </div>
            </div>
        </div>
    </div>
</section>
