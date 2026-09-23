<?php
/**
 * Template part for Shop by Category section
 * Asymmetric, editorial brand catalogue composition using REAL product imagery.
 *
 * @package Made_With_Oats
 */

$categories = made_with_oats_get_categories();

$featured_granola_img = made_with_oats_img_url( 'assets/images/products/g001-dark-chocolate-granola.jpg' );
$bites_img            = made_with_oats_img_url( 'assets/images/products/cb001-chocolate-rajgira-bites.jpg' );
$bars_img             = made_with_oats_img_url( 'assets/images/products/gb001-triple-seed-bar.jpg' );
$hampers_img          = made_with_oats_img_url( 'assets/images/products/dh001-diwali-hamper.jpg' );
?>
<section class="editorial-categories-section" aria-label="<?php esc_attr_e( 'Product Categories', 'made-with-oats' ); ?>">
    <div class="container">
        <!-- Section Header -->
        <div class="editorial-section-header">
            <div class="header-left">
                <span class="eyebrow-editorial"><?php esc_html_e( 'CURATED CREATIONS', 'made-with-oats' ); ?></span>
                <h2 class="title-editorial-section"><?php esc_html_e( 'Shop by Category', 'made-with-oats' ); ?></h2>
            </div>
            <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="link-editorial-arrow">
                <span><?php esc_html_e( 'View All Categories', 'made-with-oats' ); ?></span>
                <span class="arrow" aria-hidden="true">&rarr;</span>
            </a>
        </div>

        <!-- Asymmetric Editorial Composition -->
        <div class="editorial-cat-grid">
            <!-- 1. Major Feature: Granola -->
            <a href="<?php echo esc_url( home_url( '/shop?cat=granola' ) ); ?>" class="cat-feature-hero">
                <div class="cat-feature-media">
                    <img src="<?php echo esc_url( $featured_granola_img ); ?>" alt="Artisanal Handcrafted Granola Pouches" class="cat-img-cover" loading="lazy" width="800" height="800">
                </div>
                <div class="cat-feature-caption">
                    <span class="cat-micro-label"><?php esc_html_e( 'THE SIGNATURE COLLECTION', 'made-with-oats' ); ?></span>
                    <h3 class="cat-editorial-title"><?php esc_html_e( 'Artisanal Granola', 'made-with-oats' ); ?></h3>
                    <p class="cat-editorial-desc"><?php esc_html_e( 'Slow-toasted whole rolled oats tossed with berries, roasted almonds & raw honey.', 'made-with-oats' ); ?></p>
                    <span class="cat-editorial-link"><?php esc_html_e( 'Explore Granola', 'made-with-oats' ); ?> &rarr;</span>
                </div>
            </a>

            <!-- 2. Supporting Vertical: Indulgent Chocolate Bites -->
            <a href="<?php echo esc_url( home_url( '/shop?cat=bites' ) ); ?>" class="cat-feature-item">
                <div class="cat-feature-media">
                    <img src="<?php echo esc_url( $bites_img ); ?>" alt="Chocolate Rajgira Bites" class="cat-img-cover" loading="lazy" width="500" height="500">
                </div>
                <div class="cat-feature-caption">
                    <span class="cat-micro-label"><?php esc_html_e( 'POPPED GRAIN CRUNCH', 'made-with-oats' ); ?></span>
                    <h3 class="cat-editorial-title"><?php esc_html_e( 'Rajgira Bites', 'made-with-oats' ); ?></h3>
                    <span class="cat-editorial-link"><?php esc_html_e( 'Discover Bites', 'made-with-oats' ); ?> &rarr;</span>
                </div>
            </a>

            <!-- 3. Supporting Vertical: Snack Bars -->
            <a href="<?php echo esc_url( home_url( '/shop?cat=snack-bars' ) ); ?>" class="cat-feature-item">
                <div class="cat-feature-media">
                    <img src="<?php echo esc_url( $bars_img ); ?>" alt="Handcrafted Oat Snack Bars" class="cat-img-cover" loading="lazy" width="500" height="500">
                </div>
                <div class="cat-feature-caption">
                    <span class="cat-micro-label"><?php esc_html_e( 'CLEAN ON-THE-GO ENERGY', 'made-with-oats' ); ?></span>
                    <h3 class="cat-editorial-title"><?php esc_html_e( 'Snack Bars', 'made-with-oats' ); ?></h3>
                    <span class="cat-editorial-link"><?php esc_html_e( 'Discover Bars', 'made-with-oats' ); ?> &rarr;</span>
                </div>
            </a>

            <!-- 4. Luxury Wide Spotlight: Gift Hampers -->
            <a href="<?php echo esc_url( home_url( '/shop?cat=gift-hampers' ) ); ?>" class="cat-feature-wide">
                <div class="cat-wide-media">
                    <img src="<?php echo esc_url( $hampers_img ); ?>" alt="Handcrafted Luxury Festive Hampers" class="cat-img-cover" loading="lazy" width="900" height="500">
                </div>
                <div class="cat-wide-caption">
                    <span class="cat-micro-label"><?php esc_html_e( 'FESTIVE & CELEBRATION', 'made-with-oats' ); ?></span>
                    <h3 class="cat-editorial-title"><?php esc_html_e( 'Curated Hampers & Gift Boxes', 'made-with-oats' ); ?></h3>
                    <p class="cat-editorial-desc"><?php esc_html_e( 'Reusable glass jars, gold accents & bespoke satin gifting crafted for mindful celebrations.', 'made-with-oats' ); ?></p>
                    <span class="cat-editorial-link"><?php esc_html_e( 'Explore Gifting', 'made-with-oats' ); ?> &rarr;</span>
                </div>
            </a>
        </div>
    </div>
</section>
