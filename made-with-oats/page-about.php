<?php
/**
 * Template Name: About Us Page
 *
 * @package Made_With_Oats
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Banner -->
    <div class="shop-hero-banner" style="background:var(--color-espresso); color:#FAF6EF; padding: 4rem 0; text-align:center;">
        <div class="container">
            <span class="eyebrow eyebrow-gold"><?php esc_html_e( 'Our Wholesome Story', 'made-with-oats' ); ?></span>
            <h1 style="color: #FAF6EF; margin-top:0.5rem; margin-bottom: 0.5rem;"><?php esc_html_e( 'Born From a Kitchen Bowl', 'made-with-oats' ); ?></h1>
            <p style="color:rgba(250,246,239,0.8); max-width:600px; margin:0 auto;"><?php esc_html_e( 'At Made With Oats, we believe good snacking should never mean compromising on taste.', 'made-with-oats' ); ?></p>
        </div>
    </div>

    <div class="container container-narrow" style="padding-top: var(--space-3xl); padding-bottom: var(--space-4xl);">
        <article class="card" style="padding: 3.5rem 3rem;">
            <blockquote style="font-family: var(--font-editorial-italic, var(--font-serif)); font-style: italic; font-size: 1.3rem; line-height: 1.65; color: var(--color-forest-olive); margin: 0 0 2.5rem 0; padding-bottom: 2rem; border-bottom: 1px solid var(--color-border-light);">
                &ldquo;<?php esc_html_e( 'At Made With Oats, we believe good snacking should never mean compromising on taste. From small-batch granolas and crunchy granola bars to indulgent chocolate rajgira bites, we craft each product with thoughtfully selected ingredients and plenty of care. Whether it’s part of your morning ritual or a thoughtful gift, we’re here to make everyday moments a little more delicious.', 'made-with-oats' ); ?>&rdquo;
            </blockquote>

            <div style="font-size: 1.15rem; line-height: 1.8; color: var(--color-text-secondary);">
                <p><?php esc_html_e( 'We grew tired of store-bought granolas masquerading as “healthy” while loaded with high-fructose corn syrup, refined sugar, palm oil, and unpronounceable preservatives. We wanted food that made us feel energized, light, and happy.', 'made-with-oats' ); ?></p>
                <p><?php esc_html_e( 'So, we went back to basics. Whole rolled oats toasted in small batches with cold-pressed virgin coconut oil, sweetened gently with raw forest honey and organic jaggery, and tossed generously with California almonds, walnuts, pumpkin seeds, and sun-ripened berries.', 'made-with-oats' ); ?></p>
                
                <h3 style="margin-top: 2rem; margin-bottom: 0.75rem; color: var(--color-espresso);"><?php esc_html_e( 'Our Promise to You', 'made-with-oats' ); ?></h3>
                <ul style="padding-left: 1.5rem; display: flex; flex-direction: column; gap: 0.75rem;">
                    <li><strong><?php esc_html_e( 'Real Ingredients:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'We only use ingredients you can recognize and pronounce.', 'made-with-oats' ); ?></li>
                    <li><strong><?php esc_html_e( 'No Added Refined Sugar:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'Zero white sugar, corn syrup, or artificial sweeteners.', 'made-with-oats' ); ?></li>
                    <li><strong><?php esc_html_e( 'Small Batch Freshness:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'We bake in small batches weekly so your pantry gets maximum crunch.', 'made-with-oats' ); ?></li>
                    <li><strong><?php esc_html_e( 'Made with Love:', 'made-with-oats' ); ?></strong> <?php esc_html_e( 'Every single pouch is hand-packed with care in India.', 'made-with-oats' ); ?></li>
                </ul>

                <div style="margin-top: 3rem; text-align: center; border-top: 1px solid var(--color-border); padding-top: 2rem;">
                    <div style="font-family: var(--font-editorial-italic, var(--font-serif)); font-style: italic; font-size: 1.8rem; color: var(--color-espresso);">
                        Naturally &bull; Wholesome &bull; Delicious
                    </div>
                </div>
            </div>
        </article>
    </div>
</main>

<?php
get_footer();
