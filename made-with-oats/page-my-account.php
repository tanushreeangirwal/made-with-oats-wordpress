<?php
/**
 * Template Name: My Account Page
 *
 * @package Made_With_Oats
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="shop-hero-banner">
        <div class="container">
            <span class="eyebrow eyebrow-gold"><?php esc_html_e( 'WELCOME BACK', 'made-with-oats' ); ?></span>
            <h1 class="page-title"><?php esc_html_e( 'My Account', 'made-with-oats' ); ?></h1>
            <p><?php esc_html_e( 'Manage your orders, track shipments, and update your delivery addresses.', 'made-with-oats' ); ?></p>
        </div>
    </div>

    <div class="container container-narrow" style="padding-top: var(--space-3xl); padding-bottom: var(--space-4xl);">
        <div class="card account-card">
            <?php
            if ( class_exists( 'WooCommerce' ) ) {
                echo do_shortcode( '[woocommerce_my_account]' );
            } else {
                // Fallback login / register preview
                ?>
                <div class="account-auth-grid">
                    <div class="auth-box">
                        <h2 style="font-size: 1.5rem; color: var(--color-espresso); margin-bottom: 1.25rem;">Sign In</h2>
                        <form action="#" method="post" onsubmit="event.preventDefault(); alert('Sign in simulation.');">
                            <div class="form-field" style="margin-bottom: 1rem;">
                                <label class="field-label">Email or Phone Number *</label>
                                <input type="text" required class="field-input">
                            </div>
                            <div class="form-field" style="margin-bottom: 1.25rem;">
                                <label class="field-label">Password *</label>
                                <input type="password" required class="field-input">
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Sign In</button>
                        </form>
                    </div>
                    
                    <div class="auth-box" style="border-left: 1px solid var(--color-border); padding-left: 2rem;">
                        <h2 style="font-size: 1.5rem; color: var(--color-espresso); margin-bottom: 1.25rem;">Create an Account</h2>
                        <p style="color: var(--color-text-secondary); margin-bottom: 1.5rem; font-size: 0.95rem;">
                            Join our community to speed up your checkout, review previous small-batch orders, and receive early access to seasonal releases.
                        </p>
                        <form action="#" method="post" onsubmit="event.preventDefault(); alert('Registration simulation.');">
                            <div class="form-field" style="margin-bottom: 1rem;">
                                <label class="field-label">Email Address *</label>
                                <input type="email" required class="field-input">
                            </div>
                            <button type="submit" class="btn btn-outline" style="width: 100%;">Register with Email</button>
                        </form>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
