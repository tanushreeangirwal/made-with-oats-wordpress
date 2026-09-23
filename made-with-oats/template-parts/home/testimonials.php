<?php
/**
 * Template part for Customer Reviews horizontal carousel
 * Real verified customer reviews from Made With Oats customers.
 *
 * @package Made_With_Oats
 */
?>
<section class="reviews-section" aria-label="<?php esc_attr_e( 'Customer Reviews', 'made-with-oats' ); ?>">
    <div class="container">
        <div class="reviews-header-row">
            <div class="reviews-header-copy">
                <span class="eyebrow reviews-eyebrow"><?php esc_html_e( 'Customer Love', 'made-with-oats' ); ?></span>
                <h2 class="reviews-title"><?php esc_html_e( 'Words of love', 'made-with-oats' ); ?></h2>
            </div>
            <div class="reviews-carousel-controls" aria-label="<?php esc_attr_e( 'Review carousel navigation', 'made-with-oats' ); ?>">
                <button type="button" class="reviews-nav-btn reviews-prev-btn" id="reviews-prev-btn" aria-label="<?php esc_attr_e( 'Previous review', 'made-with-oats' ); ?>">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </button>
                <button type="button" class="reviews-nav-btn reviews-next-btn" id="reviews-next-btn" aria-label="<?php esc_attr_e( 'Next review', 'made-with-oats' ); ?>">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>
            </div>
        </div>

        <div class="reviews-carousel-container">
            <div class="reviews-carousel-track" id="reviews-track" role="region" aria-label="<?php esc_attr_e( 'Customer reviews carousel', 'made-with-oats' ); ?>" tabindex="0">
                <!-- Review 1: Dr. Sharvini Jhagadiawala - Granola -->
                <article class="review-carousel-card">
                    <div class="review-card-top">
                        <div class="review-stars-row" aria-label="5 out of 5 stars">
                            <span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span>
                        </div>
                        <span class="review-product-pill">Dark Chocolate Granola &bull; Blueberry &amp; Cranberry</span>
                    </div>
                    <blockquote class="review-quote-text">
                        &ldquo;Loved the taste! The dark chocolate with blueberry and cranberry is such a delicious combination. Crunchy, flavourful and perfect for a quick snack.&rdquo;
                    </blockquote>
                    <div class="review-author-meta">
                        <div class="review-monogram" aria-hidden="true">SJ</div>
                        <div class="review-author-info">
                            <span class="review-author-name">Dr. Sharvini Jhagadiawala</span>
                            <span class="review-author-status"><?php esc_html_e( 'Verified Buyer', 'made-with-oats' ); ?></span>
                        </div>
                    </div>
                </article>

                <!-- Review 2: Nicole Carvalho - Rajgira Bars -->
                <article class="review-carousel-card">
                    <div class="review-card-top">
                        <div class="review-stars-row" aria-label="5 out of 5 stars">
                            <span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span>
                        </div>
                        <span class="review-product-pill">Intense Chocolate Rajgira Bars</span>
                    </div>
                    <blockquote class="review-quote-text">
                        &ldquo;Such a yummy chocolatey snack! Loved the crunch and rich chocolate flavour. Perfect for when I&rsquo;m craving something sweet.&rdquo;
                    </blockquote>
                    <div class="review-author-meta">
                        <div class="review-monogram" aria-hidden="true">NC</div>
                        <div class="review-author-info">
                            <span class="review-author-name">Nicole Carvalho</span>
                            <span class="review-author-status"><?php esc_html_e( 'Verified Buyer', 'made-with-oats' ); ?></span>
                        </div>
                    </div>
                </article>

                <!-- Review 3: Nigel Cruz -->
                <article class="review-carousel-card is-punchy">
                    <div class="review-card-top">
                        <div class="review-stars-row" aria-label="5 out of 5 stars">
                            <span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span>
                        </div>
                        <span class="review-product-pill">Artisanal Granola</span>
                    </div>
                    <blockquote class="review-quote-text">
                        &ldquo;Great taste, simple ingredients, flavorful....&rdquo;
                    </blockquote>
                    <div class="review-author-meta">
                        <div class="review-monogram" aria-hidden="true">NC</div>
                        <div class="review-author-info">
                            <span class="review-author-name">Nigel Cruz</span>
                            <span class="review-author-status"><?php esc_html_e( 'Verified Buyer', 'made-with-oats' ); ?></span>
                        </div>
                    </div>
                </article>

                <!-- Review 4: Sinead Gomes - Granola -->
                <article class="review-carousel-card">
                    <div class="review-card-top">
                        <div class="review-stars-row" aria-label="5 out of 5 stars">
                            <span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span>
                        </div>
                        <span class="review-product-pill">Dark Chocolate Granola &bull; Blueberry &amp; Cranberry</span>
                    </div>
                    <blockquote class="review-quote-text">
                        &ldquo;This was absolutely delicious! The rich dark chocolate flavour with the little bursts of blueberry and cranberry is such a perfect combination. It feels indulgent but still makes for a great breakfast or snack. I&rsquo;m completely hooked!&rdquo;
                    </blockquote>
                    <div class="review-author-meta">
                        <div class="review-monogram" aria-hidden="true">SG</div>
                        <div class="review-author-info">
                            <span class="review-author-name">Sinead Gomes</span>
                            <span class="review-author-status"><?php esc_html_e( 'Verified Buyer', 'made-with-oats' ); ?></span>
                        </div>
                    </div>
                </article>

                <!-- Review 5: Tapan Karnik - Peanut Butter Crunch -->
                <article class="review-carousel-card">
                    <div class="review-card-top">
                        <div class="review-stars-row" aria-label="5 out of 5 stars">
                            <span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span>
                        </div>
                        <span class="review-product-pill">Peanut Butter Crunch Granola</span>
                    </div>
                    <blockquote class="review-quote-text">
                        &ldquo;If you love peanut butter, you must try this. It&rsquo;s crunchy, nutty and has just the right amount of sweetness. You can have it with yoghurt or milk but honestly, it&rsquo;s so good I find myself eating it straight from the jar 😁&rdquo;
                    </blockquote>
                    <div class="review-author-meta">
                        <div class="review-monogram" aria-hidden="true">TK</div>
                        <div class="review-author-info">
                            <span class="review-author-name">Tapan Karnik</span>
                            <span class="review-author-status"><?php esc_html_e( 'Verified Buyer', 'made-with-oats' ); ?></span>
                        </div>
                    </div>
                </article>

                <!-- Review 6: Sanjana Wadekar -->
                <article class="review-carousel-card">
                    <div class="review-card-top">
                        <div class="review-stars-row" aria-label="5 out of 5 stars">
                            <span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span>
                        </div>
                        <span class="review-product-pill">Dark Chocolate Blueberry &bull; PB Granola</span>
                    </div>
                    <blockquote class="review-quote-text">
                        &ldquo;Tried the Dark Chocolate Blueberry and Dark Chocolate Peanut Butter granola, and honestly, both were amazing! They were super fresh, crunchy, and had just the right amount of sweetness. The granola is made with good-quality ingredients and utmost hygiene, which makes it even better. It&rsquo;s also really reasonably priced. I&rsquo;ve tried it both on its own and with yoghurt, and it tastes delicious either way. My family loved it too! I&rsquo;d definitely recommend this granola, especially to working people with busy schedules who want a quick, convenient and healthier option without compromising on taste. ❤️&rdquo;
                    </blockquote>
                    <div class="review-author-meta">
                        <div class="review-monogram" aria-hidden="true">SW</div>
                        <div class="review-author-info">
                            <span class="review-author-name">Sanjana Wadekar</span>
                            <span class="review-author-status"><?php esc_html_e( 'Verified Buyer', 'made-with-oats' ); ?></span>
                        </div>
                    </div>
                </article>

                <!-- Review 7: Hussain Bootwala -->
                <article class="review-carousel-card is-punchy">
                    <div class="review-card-top">
                        <div class="review-stars-row" aria-label="5 out of 5 stars">
                            <span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span><span class="review-star">&#9733;</span>
                        </div>
                        <span class="review-product-pill">Artisanal Snacking</span>
                    </div>
                    <blockquote class="review-quote-text">
                        &ldquo;Simply Amazing…&rdquo;
                    </blockquote>
                    <div class="review-author-meta">
                        <div class="review-monogram" aria-hidden="true">HB</div>
                        <div class="review-author-info">
                            <span class="review-author-name">Hussain Bootwala</span>
                            <span class="review-author-status"><?php esc_html_e( 'Verified Buyer', 'made-with-oats' ); ?></span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
