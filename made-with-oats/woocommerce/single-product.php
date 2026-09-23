<?php
/**
 * The Template for displaying all single products
 * Adheres strictly to the Made With Oats product catalogue and client rules.
 *
 * @package Made_With_Oats
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

// Fetch active product or default to G001 (Dark Chocolate Blueberry & Cranberry Granola)
$product_slug = get_query_var( 'product' );
$all_products = made_with_oats_get_official_products();
$current_product = $all_products['G001']; // default

if ( ! empty( $product_slug ) ) {
    foreach ( $all_products as $p ) {
        if ( $p['slug'] === $product_slug ) {
            $current_product = $p;
            break;
        }
    }
}
?>

<div class="container single-product-wrapper">
    <div class="product-detail-grid">
        <!-- Left: Product Image Gallery -->
        <div class="product-gallery">
            <div class="gallery-main-frame">
                <img src="<?php echo esc_url( made_with_oats_img_url( $current_product['image'] ) ); ?>" alt="<?php echo esc_attr( $current_product['name'] ); ?>" class="gallery-main-img" id="mainProductImage">
            </div>
            <?php 
            $gallery = ! empty( $current_product['gallery'] ) ? $current_product['gallery'] : array( $current_product['image'] );
            if ( count( $gallery ) > 1 ) : ?>
            <div class="gallery-thumbs" id="galleryThumbs">
                <?php foreach ( $gallery as $idx => $thumb_img ) : ?>
                <button type="button" class="gallery-thumb-btn <?php echo 0 === $idx ? 'is-active' : ''; ?>" data-full-img="<?php echo esc_url( made_with_oats_img_url( $thumb_img ) ); ?>">
                    <img src="<?php echo esc_url( made_with_oats_img_url( $thumb_img ) ); ?>" alt="<?php echo esc_attr( $current_product['name'] ); ?> Image <?php echo $idx + 1; ?>">
                </button>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>

        <!-- Right: Product Summary & Purchase Actions -->
        <div class="product-summary">
            <div class="product-meta-top">
                <span class="eyebrow"><?php echo esc_html( $current_product['primary_cat'] ); ?> &bull; SKU: <?php echo esc_html( $current_product['sku'] ); ?></span>
                <?php if ( ! empty( $current_product['is_bestseller'] ) ) : ?>
                    <span class="badge-bestseller-pill">BEST SELLER</span>
                <?php endif; ?>
                <?php if ( ! empty( $current_product['positioning'] ) ) : ?>
                    <span class="badge-special-pill"><?php echo esc_html( $current_product['positioning'] ); ?></span>
                <?php endif; ?>
            </div>

            <h1 class="single-product-title"><?php echo esc_html( $current_product['name'] ); ?></h1>
            
            <div class="single-product-rating">
                <span class="stars">★★★★★</span>
                <span class="rating-count">Small Batch Artisanal Quality &bull; Handcrafted in Mumbai</span>
            </div>

            <!-- Price with Dynamic JS update -->
            <div class="single-product-price" id="productPriceDisplay">
                <span class="current" id="dynamicPrice">₹<?php echo esc_html( $current_product['base_price'] ); ?></span>
                <span class="price-tax-note">Inclusive of all taxes</span>
            </div>

            <p class="single-product-desc">
                <?php echo esc_html( $current_product['short_desc'] ); ?>
            </p>

            <!-- Interactive Variation / Pack Selector -->
            <div class="product-variant-selector-box">
                <label class="variant-label">
                    <span><?php echo ( 'Snack Bars' === $current_product['primary_cat'] && count( $current_product['variants'] ) > 1 ) ? 'Choose Pack Size:' : 'Choose Size / Quantity:'; ?></span>
                    <span class="selected-variant-text" id="selectedVariantLabel"><?php echo esc_html( $current_product['variants'][0]['label'] ); ?></span>
                </label>
                
                <div class="variant-options-grid" id="variantOptions">
                    <?php foreach ( $current_product['variants'] as $idx => $variant ) : 
                        $is_flagged = ! empty( $variant['flagged'] );
                        $price_attr = $is_flagged ? 'flagged' : $variant['price'];
                        $img_attr   = ! empty( $variant['image'] ) ? made_with_oats_img_url( $variant['image'] ) : '';
                        ?>
                        <button type="button" 
                                class="variant-btn <?php echo 0 === $idx ? 'is-active' : ''; ?> <?php echo $is_flagged ? 'is-flagged' : ''; ?>" 
                                data-price="<?php echo esc_attr( $price_attr ); ?>" 
                                data-label="<?php echo esc_attr( $variant['label'] ); ?>"
                                data-img="<?php echo esc_attr( $img_attr ); ?>"
                                data-note="<?php echo esc_attr( $is_flagged ? $variant['price_note'] : '' ); ?>">
                            <span class="v-label"><?php echo esc_html( $variant['label'] ); ?></span>
                            <?php if ( $is_flagged ) : ?>
                                <span class="v-flag">[Requires Confirmation]</span>
                            <?php else : ?>
                                <span class="v-price">₹<?php echo esc_html( $variant['price'] ); ?></span>
                            <?php endif; ?>
                        </button>
                    <?php endforeach; ?>
                </div>

                <!-- Flagged Price Warning Banner (Visible only if user selects flagged variant) -->
                <div id="flaggedPriceWarning" class="flagged-price-banner" style="display: none;">
                    ⚠️ <strong>Pricing Notice:</strong> 200g Almond Raisin Granola price was supplied as ₹2750. This value is flagged for client confirmation before final checkout processing.
                </div>
            </div>

            <!-- Quantity and Add to Cart -->
            <div class="product-actions-box">
                <div class="quantity-add-row">
                    <div class="qty-control">
                        <button type="button" class="qty-btn qty-dec" aria-label="Decrease quantity">&minus;</button>
                        <input type="number" class="qty-input" value="1" min="1" max="99" aria-label="Quantity" id="singleProductQty">
                        <button type="button" class="qty-btn qty-inc" aria-label="Increase quantity">&plus;</button>
                    </div>
                    <button type="button" class="btn btn-primary btn-single-add" id="addToCartBtn">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                        <span>Add to Cart</span>
                    </button>
                </div>
                <a href="<?php echo esc_url( home_url( '/checkout' ) ); ?>" class="btn btn-gold btn-buy-now">
                    <span>Express Checkout &rarr;</span>
                </a>
            </div>

            <!-- Delivery & Service Highlights -->
            <div class="product-highlights">
                <div class="highlight-row">
                    <span class="highlight-icon" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                    </span>
                    <span><strong>Pan India Shipping:</strong> Maharashtra: ₹80 &bull; Outside Maharashtra: ₹100 &bull; <strong>FREE above ₹1299</strong></span>
                </div>
                <div class="highlight-row">
                    <span class="highlight-icon" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    </span>
                    <span><strong>Estimated Delivery:</strong> Maharashtra: ~5&ndash;7 business days &bull; Outside Maharashtra: ~7&ndash;10 business days</span>
                </div>
                <div class="highlight-row">
                    <span class="highlight-icon" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                    </span>
                    <span><strong>Payment:</strong> UPI, Debit/Credit Cards, NetBanking (COD Not Available)</span>
                </div>
                <div class="highlight-row">
                    <span class="highlight-icon" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11h18M5 11c0 4.4 3.1 8 7 8s7-3.6 7-8M12 2v5M8 4l2 3M16 4l-2 3"></path></svg>
                    </span>
                    <span><strong>Small Batch Promise:</strong> Handcrafted and sealed fresh within small artisanal batches</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Information Tabs -->
    <div class="product-tabs-section">
        <nav class="tabs-nav" role="tablist">
            <button type="button" class="tab-nav-btn is-active" data-tab="ingredients">Ingredients &amp; Sourcing</button>
            <button type="button" class="tab-nav-btn" data-tab="storage">Shelf Life &amp; Storage</button>
            <button type="button" class="tab-nav-btn" data-tab="allergens">Allergen Information</button>
            <button type="button" class="tab-nav-btn" data-tab="nutrition">Nutritional Facts</button>
            <button type="button" class="tab-nav-btn" data-tab="shipping">Shipping &amp; Delivery</button>
            <button type="button" class="tab-nav-btn" data-tab="reviews">Reviews</button>
        </nav>

        <!-- Tab 1: Ingredients -->
        <div id="tab-ingredients" class="tab-pane is-active">
            <h3 class="tab-pane-title">Pure, Thoughtfully Sourced Ingredients</h3>
            <p>Every ingredient in this recipe is selected for real nutritional value, wholesome texture, and honest flavor:</p>
            <ul class="ingredients-bullet-list">
                <?php foreach ( $current_product['ingredients'] as $ing ) : ?>
                    <li><strong>✓</strong> <?php echo esc_html( $ing ); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Tab 2: Shelf Life & Storage -->
        <div id="tab-storage" class="tab-pane">
            <h3 class="tab-pane-title">Storage &amp; Shelf Life Guidelines</h3>
            <div class="storage-info-grid">
                <div class="storage-box">
                    <span class="storage-tag">Shelf Life</span>
                    <strong class="storage-val"><?php echo esc_html( $current_product['shelf_life'] ); ?></strong>
                    <span class="storage-sub">From the date of small-batch manufacture</span>
                </div>
                <div class="storage-box">
                    <span class="storage-tag">Storage Instructions</span>
                    <strong class="storage-val"><?php echo esc_html( $current_product['storage'] ); ?></strong>
                    <span class="storage-sub">Keep sealed tightly after opening to preserve peak crunch</span>
                </div>
            </div>
        </div>

        <!-- Tab 3: Allergen Information (Strictly Follows Client Note) -->
        <div id="tab-allergens" class="tab-pane">
            <h3 class="tab-pane-title">Allergen Advisory</h3>
            <div class="allergen-box">
                <p><strong>Supplied Statement:</strong> <?php echo esc_html( $current_product['allergens'] ); ?></p>
                <?php if ( ! empty( $current_product['allergen_flag'] ) ) : ?>
                    <div class="allergen-confirmation-flag">
                        ℹ️ <em>Note for Client Review: The allergen wording &ldquo;<?php echo esc_html( $current_product['allergens'] ); ?>&rdquo; is preserved exactly as supplied and flagged for final copy confirmation.</em>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Tab 4: Nutritional Facts (STRICT: Transparent Placeholder) -->
        <div id="tab-nutrition" class="tab-pane">
            <h3 class="tab-pane-title">Nutritional Information</h3>
            <div class="nutrition-transparent-box">
                <p><strong>Laboratory Nutritional Information is currently in progress.</strong></p>
                <p>In accordance with our strict brand integrity guidelines, Made With Oats does not publish unverified or fabricated nutritional figures. Official certified nutritional facts will be posted here as soon as lab testing is concluded.</p>
            </div>
        </div>

        <!-- Tab 5: Shipping & Delivery -->
        <div id="tab-shipping" class="tab-pane">
            <h3 class="tab-pane-title">Shipping Across India</h3>
            <p>We deliver nationwide through our trusted logistics partners:</p>
            <ul>
                <li><strong>Maharashtra Deliveries:</strong> ₹80 flat rate &bull; Delivered in approximately 5&ndash;7 business days.</li>
                <li><strong>Outside Maharashtra / Rest of India:</strong> ₹100 flat rate &bull; Delivered in approximately 7&ndash;10 business days.</li>
                <li><strong>Free Shipping:</strong> Automatically applied on all orders of ₹1299 or more.</li>
                <li><strong>Payment Policy:</strong> Cash on Delivery (COD) is NOT available. All major online modes (UPI, Cards, NetBanking) are accepted.</li>
            </ul>
        </div>

        <!-- Tab 6: Customer Reviews -->
        <div id="tab-reviews" class="tab-pane">
            <h3 class="tab-pane-title"><?php esc_html_e( 'Verified Customer Reviews', 'made-with-oats' ); ?></h3>
            <div class="product-reviews-list">
                <div class="product-review-item">
                    <div class="review-item-header">
                        <div class="quote-stars">★★★★★</div>
                        <span class="review-verified-badge"><?php esc_html_e( 'Verified Buyer', 'made-with-oats' ); ?></span>
                    </div>
                    <blockquote class="review-text">
                        &ldquo;Loved the taste! The dark chocolate with blueberry and cranberry is such a delicious combination. Crunchy, flavourful and perfect for a quick snack.&rdquo;
                    </blockquote>
                    <div class="review-author">
                        <div class="customer-monogram" aria-hidden="true">SJ</div>
                        <div>
                            <span class="author-name">Dr. Sharvini Jhagadiawala</span>
                            <span class="review-meta-line"><?php esc_html_e( 'Verified Buyer • Dark Chocolate Blueberry & Cranberry Granola', 'made-with-oats' ); ?></span>
                        </div>
                    </div>
                </div>

                <div class="product-review-item">
                    <div class="review-item-header">
                        <div class="quote-stars">★★★★★</div>
                        <span class="review-verified-badge"><?php esc_html_e( 'Verified Buyer', 'made-with-oats' ); ?></span>
                    </div>
                    <blockquote class="review-text">
                        &ldquo;This was absolutely delicious! The rich dark chocolate flavour with the little bursts of blueberry and cranberry is such a perfect combination. It feels indulgent but still makes for a great breakfast or snack. I’m completely hooked!&rdquo;
                    </blockquote>
                    <div class="review-author">
                        <div class="customer-monogram" aria-hidden="true">SG</div>
                        <div>
                            <span class="author-name">Sinead Gomes</span>
                            <span class="review-meta-line"><?php esc_html_e( 'Verified Buyer • Dark Chocolate Granola', 'made-with-oats' ); ?></span>
                        </div>
                    </div>
                </div>

                <div class="product-review-item">
                    <div class="review-item-header">
                        <div class="quote-stars">★★★★★</div>
                        <span class="review-verified-badge"><?php esc_html_e( 'Verified Buyer', 'made-with-oats' ); ?></span>
                    </div>
                    <blockquote class="review-text">
                        &ldquo;Tried the Dark Chocolate Blueberry and Dark Chocolate Peanut Butter granola, and honestly, both were amazing! They were super fresh, crunchy, and had just the right amount of sweetness. The granola is made with good-quality ingredients and utmost hygiene, which makes it even better.&rdquo;
                    </blockquote>
                    <div class="review-author">
                        <div class="customer-monogram" aria-hidden="true">SW</div>
                        <div>
                            <span class="author-name">Sanjana Wadekar</span>
                            <span class="review-meta-line"><?php esc_html_e( 'Verified Buyer • Handcrafted Granola', 'made-with-oats' ); ?></span>
                        </div>
                    </div>
                </div>

                <div class="product-review-item">
                    <div class="review-item-header">
                        <div class="quote-stars">★★★★★</div>
                        <span class="review-verified-badge"><?php esc_html_e( 'Verified Buyer', 'made-with-oats' ); ?></span>
                    </div>
                    <blockquote class="review-text">
                        &ldquo;Great Taste, Simple ingredients , flavorful....&rdquo;
                    </blockquote>
                    <div class="review-author">
                        <div class="customer-monogram" aria-hidden="true">NC</div>
                        <div>
                            <span class="author-name">Nigel Cruz</span>
                            <span class="review-meta-line"><?php esc_html_e( 'Verified Buyer', 'made-with-oats' ); ?></span>
                        </div>
                    </div>
                </div>

                <div class="product-review-item">
                    <div class="review-item-header">
                        <div class="quote-stars">★★★★★</div>
                        <span class="review-verified-badge"><?php esc_html_e( 'Verified Buyer', 'made-with-oats' ); ?></span>
                    </div>
                    <blockquote class="review-text">
                        &ldquo;Simply Amazing…&rdquo;
                    </blockquote>
                    <div class="review-author">
                        <div class="customer-monogram" aria-hidden="true">HB</div>
                        <div>
                            <span class="author-name">Hussain Bootwala</span>
                            <span class="review-meta-line"><?php esc_html_e( 'Verified Buyer', 'made-with-oats' ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Variation Selector Logic
    const variantButtons = document.querySelectorAll('.variant-btn');
    const dynamicPrice = document.getElementById('dynamicPrice');
    const selectedVariantLabel = document.getElementById('selectedVariantLabel');
    const flaggedPriceWarning = document.getElementById('flaggedPriceWarning');
    const thumbButtons = document.querySelectorAll('.gallery-thumb-btn');
    const mainImg = document.getElementById('mainProductImage');

    variantButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            variantButtons.forEach(b => b.classList.remove('is-active'));
            this.classList.add('is-active');

            const price = this.getAttribute('data-price');
            const label = this.getAttribute('data-label');
            const imgSrc = this.getAttribute('data-img');

            if (selectedVariantLabel) {
                selectedVariantLabel.textContent = label;
            }

            if (price === 'flagged') {
                if (dynamicPrice) dynamicPrice.textContent = 'Price Pending';
                if (flaggedPriceWarning) flaggedPriceWarning.style.display = 'block';
            } else {
                if (dynamicPrice) dynamicPrice.textContent = '₹' + price;
                if (flaggedPriceWarning) flaggedPriceWarning.style.display = 'none';
            }

            if (imgSrc && mainImg) {
                mainImg.src = imgSrc;
                thumbButtons.forEach(tb => {
                    if (tb.getAttribute('data-full-img') === imgSrc) {
                        thumbButtons.forEach(b => b.classList.remove('is-active'));
                        tb.classList.add('is-active');
                    }
                });
            }
        });
    });

    // Gallery Thumbs
    thumbButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            thumbButtons.forEach(b => b.classList.remove('is-active'));
            this.classList.add('is-active');
            const fullSrc = this.getAttribute('data-full-img');
            if (mainImg && fullSrc) {
                mainImg.src = fullSrc;
            }
            // Sync with matching variant button if one exists
            variantButtons.forEach(vb => {
                if (vb.getAttribute('data-img') === fullSrc) {
                    variantButtons.forEach(b => b.classList.remove('is-active'));
                    vb.classList.add('is-active');
                    const label = vb.getAttribute('data-label');
                    const price = vb.getAttribute('data-price');
                    if (selectedVariantLabel) selectedVariantLabel.textContent = label;
                    if (dynamicPrice && price && price !== 'flagged') dynamicPrice.textContent = '₹' + price;
                }
            });
        });
    });

    // Tab Navigation
    const tabButtons = document.querySelectorAll('.tab-nav-btn');
    const tabPanes = document.querySelectorAll('.tab-pane');
    tabButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const target = this.getAttribute('data-tab');
            tabButtons.forEach(b => b.classList.remove('is-active'));
            tabPanes.forEach(p => p.classList.remove('is-active'));
            this.classList.add('is-active');
            const pane = document.getElementById('tab-' + target);
            if (pane) pane.classList.add('is-active');
        });
    });

    // Quantity Inc/Dec
    const qtyInput = document.getElementById('singleProductQty');
    const decBtn = document.querySelector('.qty-dec');
    const incBtn = document.querySelector('.qty-inc');
    if (decBtn && qtyInput) {
        decBtn.addEventListener('click', () => {
            let val = parseInt(qtyInput.value) || 1;
            if (val > 1) qtyInput.value = val - 1;
        });
    }
    if (incBtn && qtyInput) {
        incBtn.addEventListener('click', () => {
            let val = parseInt(qtyInput.value) || 1;
            qtyInput.value = val + 1;
        });
    }
});
</script>

<?php
get_footer( 'shop' );
