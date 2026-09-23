<?php
/**
 * Template part for Editorial Story Section - Chapter 01
 * Headline: "Snacking, made thoughtfully."
 *
 * @package Made_With_Oats
 */

$story_img = made_with_oats_img_url( 'assets/images/products/granola-hero-spread.jpg' );
?>
<section class="editorial-story-section" aria-label="<?php esc_attr_e( 'Our Philosophy', 'made-with-oats' ); ?>">
    <div class="container">
        <div class="editorial-story-grid">
            <!-- Large Food Photography -->
            <div class="story-visual-column">
                <div class="story-image-frame">
                    <img src="<?php echo esc_url( $story_img ); ?>" alt="Made With Oats artisanal handcrafted granolas and wholesome ingredients" width="800" height="600" loading="lazy" class="story-hero-img">
                </div>
            </div>

            <!-- Narrative Text -->
            <div class="story-text-column">
                <span class="story-chapter-tag"><?php esc_html_e( 'CHAPTER 01 &bull; OUR STORY', 'made-with-oats' ); ?></span>
                <h2 class="story-editorial-title"><?php esc_html_e( 'Snacking, made thoughtfully.', 'made-with-oats' ); ?></h2>
                
                <p class="story-editorial-lead">
                    <?php esc_html_e( 'At Made With Oats, we believe everyday snacking can be both delicious and wholesome.', 'made-with-oats' ); ?>
                </p>

                <p class="story-editorial-body">
                    <?php esc_html_e( 'We create small-batch granolas, crunchy granola bars, and indulgent chocolate rajgira bites using thoughtfully selected ingredients.', 'made-with-oats' ); ?>
                </p>

                <p class="story-editorial-body">
                    <?php esc_html_e( 'From nourishing breakfast staples to thoughtful gifting, our products are made to bring a little more goodness to every bite.', 'made-with-oats' ); ?>
                </p>

                <!-- Founder Quote Editorial Statement -->
                <div class="story-founder-quote">
                    <blockquote class="founder-editorial-quote">
                        &ldquo;<?php esc_html_e( 'A little dream, made with lots of love.', 'made-with-oats' ); ?>&rdquo;
                    </blockquote>
                    <cite class="founder-editorial-author"><?php esc_html_e( '&mdash; Vineeta Singh, Founder', 'made-with-oats' ); ?></cite>
                </div>

                <div class="story-action-line">
                    <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="editorial-text-cta">
                        <span><?php esc_html_e( 'READ OUR FULL STORY', 'made-with-oats' ); ?></span>
                        <span class="cta-arrow" aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
