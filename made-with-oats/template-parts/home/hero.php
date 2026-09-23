<?php
/**
 * Template part for displaying the Product-First Editorial Campaign Hero (Granola First)
 *
 * @package Made_With_Oats
 */

$hero_image = made_with_oats_img_url( 'assets/images/hero-granola-trio.png' );
?>
<section class="editorial-product-hero" aria-label="<?php esc_attr_e( 'Hero Granola Showcase', 'made-with-oats' ); ?>">
    <div class="container hero-campaign-container">
        <div class="hero-campaign-layout">
            <!-- 1. Granola Product Image (Hero Visual - Dominant & Unobscured) -->
            <div class="hero-campaign-visual">
                <a href="#our-granolas" class="hero-img-anchor" aria-label="<?php esc_attr_e( 'Explore Made With Oats Granolas', 'made-with-oats' ); ?>">
                    <img src="<?php echo esc_url( $hero_image ); ?>" 
                         alt="<?php esc_attr_e( 'Made With Oats handcrafted granola trio: Dark Chocolate Blueberry & Cranberry, Peanut Butter & Dark Chocolate, and Almond Raisin standup pouches', 'made-with-oats' ); ?>" 
                         class="hero-granola-pack-img" 
                         width="2560" 
                         height="1095" 
                         fetchpriority="high">
                </a>
            </div>

            <!-- 2. Minimal Editorial Brand & Shopping Action -->
            <div class="hero-campaign-content">
                <span class="hero-micro-tag"><?php esc_html_e( 'GRANOLA', 'made-with-oats' ); ?></span>
                <h1 class="hero-brand-headline"><?php esc_html_e( 'Made With Oats', 'made-with-oats' ); ?></h1>
                <p class="hero-quality-sub"><?php esc_html_e( 'Quality in Every Bite', 'made-with-oats' ); ?></p>
                <div class="hero-campaign-cta">
                    <a href="#our-granolas" class="btn-hero-granola">
                        <span><?php esc_html_e( 'Shop Granola and more', 'made-with-oats' ); ?></span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

