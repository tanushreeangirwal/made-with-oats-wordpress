<?php
/**
 * Template part for Instagram / Social Gallery section
 * Varied editorial lifestyle gallery using real product photography
 *
 * @package Made_With_Oats
 */
?>
<section class="instagram-section" aria-label="<?php esc_attr_e( 'Instagram Community Gallery', 'made-with-oats' ); ?>">
    <div class="container">
        <div class="section-header-row insta-header">
            <div class="section-title-group" style="text-align: left;">
                <span class="eyebrow"><?php esc_html_e( 'COMMUNITY &bull; @made.withoats', 'made-with-oats' ); ?></span>
                <h2><?php esc_html_e( 'Living the Oat Life', 'made-with-oats' ); ?></h2>
                <p style="margin-top: 0.25rem; font-size: 0.95rem; color: var(--color-text-muted);">
                    Honest kitchen moments, breakfast bowls &amp; mindful daily snacking.
                </p>
            </div>
            <a href="https://instagram.com/made.withoats" class="btn btn-primary" target="_blank" rel="noopener">
                <span>FOLLOW @MADE.WITHOATS</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
        </div>

        <div class="insta-collage">
            <!-- 1. Tall portrait -->
            <a href="https://instagram.com/made.withoats" class="insta-collage-item item-tall" target="_blank" rel="noopener" aria-label="Dark Chocolate Granola on Instagram">
                <img src="<?php echo esc_url( made_with_oats_img_url( 'assets/images/products/g001-dark-chocolate-granola.jpg' ) ); ?>" alt="Dark chocolate blueberry and cranberry granola" loading="lazy" width="500" height="650">
                <span class="insta-tag-hover">@made.withoats</span>
            </a>

            <!-- 2. Campaign landscape -->
            <a href="https://instagram.com/made.withoats" class="insta-collage-item item-wide" target="_blank" rel="noopener" aria-label="Snack Bars Collection on Instagram">
                <img src="<?php echo esc_url( made_with_oats_img_url( 'assets/images/products/bundle001-all-bars-collection.jpg' ) ); ?>" alt="Handcrafted snack bars collection" loading="lazy" width="700" height="450">
                <span class="insta-tag-hover">@made.withoats</span>
            </a>

            <!-- 3. Editorial Quote Tile -->
            <div class="insta-collage-item item-quote">
                <div class="insta-quote-content">
                    <span class="insta-quote-eyebrow"><?php esc_html_e( 'THE MWO PHILOSOPHY', 'made-with-oats' ); ?></span>
                    <h3 class="insta-quote-text">
                        Good Food.<br>
                        <em>Better Snacking.</em>
                    </h3>
                    <span class="insta-quote-handle">@made.withoats</span>
                </div>
            </div>

            <!-- 4. Square product -->
            <a href="https://instagram.com/made.withoats" class="insta-collage-item item-square" target="_blank" rel="noopener" aria-label="Chocolate Rajgira Bites on Instagram">
                <img src="<?php echo esc_url( made_with_oats_img_url( 'assets/images/products/cb001-chocolate-rajgira-bites.jpg' ) ); ?>" alt="Chocolate Rajgira Bites" loading="lazy" width="400" height="400">
                <span class="insta-tag-hover">@made.withoats</span>
            </a>

            <!-- 5. Medium portrait -->
            <a href="https://instagram.com/made.withoats" class="insta-collage-item item-medium" target="_blank" rel="noopener" aria-label="Festive Gift Hamper on Instagram">
                <img src="<?php echo esc_url( made_with_oats_img_url( 'assets/images/products/dh001-diwali-hamper.jpg' ) ); ?>" alt="Artisanal Diwali gift hamper with glass jars" loading="lazy" width="500" height="550">
                <span class="insta-tag-hover">@made.withoats</span>
            </a>
        </div>
    </div>
</section>
