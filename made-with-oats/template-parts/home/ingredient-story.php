<?php
/**
 * Template part for Editorial Story Section - Chapter 02
 * Headline: "Real ingredients. Small batches. Good food."
 *
 * @package Made_With_Oats
 */

$ingredient_img = made_with_oats_img_url( 'assets/images/products/box001-bars-white-gift-box.jpg' );
?>
<section class="editorial-ingredient-section" aria-label="<?php esc_attr_e( 'Our Ingredients Standard', 'made-with-oats' ); ?>">
    <div class="container">
        <div class="editorial-ingredient-grid">
            <!-- Text & Pillars Left -->
            <div class="ingredient-text-column">
                <span class="story-chapter-tag"><?php esc_html_e( 'CHAPTER 02 &bull; THE STANDARD', 'made-with-oats' ); ?></span>
                <h2 class="ingredient-editorial-title"><?php esc_html_e( 'Real ingredients. Small batches. Good food.', 'made-with-oats' ); ?></h2>
                
                <p class="ingredient-editorial-lead">
                    Every ingredient is chosen for flavor, texture, and honest nourishment.
                </p>

                <div class="ingredient-pillars-list">
                    <div class="ingredient-pillar-item">
                        <span class="pillar-num">01</span>
                        <div class="pillar-content">
                            <h4 class="pillar-name"><?php esc_html_e( 'Whole Rolled Oats', 'made-with-oats' ); ?></h4>
                            <p class="pillar-desc"><?php esc_html_e( 'High-fiber, slow-burning complex carbs that keep your energy sustained throughout the day.', 'made-with-oats' ); ?></p>
                        </div>
                    </div>

                    <div class="ingredient-pillar-item">
                        <span class="pillar-num">02</span>
                        <div class="pillar-content">
                            <h4 class="pillar-name"><?php esc_html_e( 'Rich, Indulgent Chocolate', 'made-with-oats' ); ?></h4>
                            <p class="pillar-desc"><?php esc_html_e( 'Pure, decadent dark chocolate crafted with quality in every bite &mdash; zero compound fats, zero palm oils, and no shortcuts.', 'made-with-oats' ); ?></p>
                        </div>
                    </div>

                    <div class="ingredient-pillar-item">
                        <span class="pillar-num">03</span>
                        <div class="pillar-content">
                            <h4 class="pillar-name"><?php esc_html_e( 'Raw Forest Honey & Nuts', 'made-with-oats' ); ?></h4>
                            <p class="pillar-desc"><?php esc_html_e( 'Naturally sweetened without white refined sugar. Tossed with slow-roasted California almonds and crunchy seeds.', 'made-with-oats' ); ?></p>
                        </div>
                    </div>
                </div>

                <div class="ingredient-action-line">
                    <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="editorial-text-cta">
                        <span>EXPLORE INGREDIENTS IN OUR SHOP</span>
                        <span class="cta-arrow" aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Visual Right -->
            <div class="ingredient-visual-column">
                <div class="ingredient-image-frame">
                    <img src="<?php echo esc_url( $ingredient_img ); ?>" alt="Made With Oats handcrafted snack bars collection box" width="700" height="700" loading="lazy" class="ingredient-hero-img">
                </div>
            </div>
        </div>
    </div>
</section>
