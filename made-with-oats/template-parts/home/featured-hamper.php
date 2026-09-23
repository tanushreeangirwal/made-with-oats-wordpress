<?php
/**
 * Template part for the Featured Gifting / Diwali Hamper Showcase
 * Aesthetic: Warm Earthy Luxury, Large Editorial Food & Packaging Feature
 *
 * @package Made_With_Oats
 */

$hamper_img = made_with_oats_img_url( 'assets/images/products/dh001-diwali-hamper.jpg' );
?>
<section class="featured-hamper-section" aria-label="<?php esc_attr_e( 'Featured Gifting Hamper', 'made-with-oats' ); ?>">
    <div class="container">
        <div class="hamper-editorial-wrapper">
            <div class="hamper-media-col">
                <div class="hamper-img-frame">
                    <img src="<?php echo esc_url( $hamper_img ); ?>" alt="Made With Oats Diwali Hamper 1 - 3 Glass Jars in Luxury Box with Ribbon" class="hamper-featured-img" loading="lazy" width="800" height="700">
                    <span class="hamper-badge">Signature Gift Box</span>
                </div>
            </div>

            <div class="hamper-content-col">
                <span class="eyebrow"><?php esc_html_e( 'MINDFUL CELEBRATIONS • LIMITED BATCH', 'made-with-oats' ); ?></span>
                
                <h2 class="hamper-title">
                    The Artisanal<br>
                    <em>Diwali Hamper</em>
                </h2>

                <p class="hamper-lead">
                    Celebrate thoughtful gifting. Three signature 100g handcrafted granola blends presented in reusable glass jars with gold lids and rich chocolate satin ribbon.
                </p>

                <div class="hamper-feature-list">
                    <div class="hamper-feature-item">
                        <span class="hamper-feature-bullet">01</span>
                        <div>
                            <strong>Custom Flavor Trio</strong>
                            <p>Choose any 3 signature blends: Dark Chocolate Cranberry, Peanut Butter Swirl, or Almond Raisin.</p>
                        </div>
                    </div>

                    <div class="hamper-feature-item">
                        <span class="hamper-feature-bullet">02</span>
                        <div>
                            <strong>Reusable Glass Jars</strong>
                            <p>Three 150g airtight reusable glass containers crafted to preserve peak oven freshness and crunch.</p>
                        </div>
                    </div>

                    <div class="hamper-feature-item">
                        <span class="hamper-feature-bullet">03</span>
                        <div>
                            <strong>Collapsible Luxury Keepsake</strong>
                            <p>Premium textured gift box finished with celebratory ribbon &mdash; zero plastic packaging.</p>
                        </div>
                    </div>
                </div>

                <div class="hamper-footer-bar">
                    <div class="hamper-price-box">
                        <span class="hamper-price-label">Hamper Price</span>
                        <span class="hamper-price-val">₹750</span>
                        <span class="hamper-price-note">All 3 Jars Included</span>
                    </div>

                    <a href="<?php echo esc_url( class_exists( 'WooCommerce' ) && function_exists( 'wc_get_product' ) ? home_url( '/product/diwali-hamper-1' ) : home_url( '/shop?cat=gift-hampers' ) ); ?>" class="btn btn-primary btn-lg">
                        <span>CUSTOMIZE YOUR HAMPER</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
