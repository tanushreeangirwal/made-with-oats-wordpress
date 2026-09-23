<?php
/**
 * Template part for displaying Product-First Collection Display directly below Hero
 * Allows filtering by category via dropdown and tabs.
 *
 * @package Made_With_Oats
 */

$products = made_with_oats_get_official_products();
?>
<!-- 2. DEDICATED GRANOLA DISPLAY — IMMEDIATELY AFTER HERO -->
<section id="our-granolas" class="granola-showcase-section" aria-label="<?php esc_attr_e( 'Our Granolas', 'made-with-oats' ); ?>">
    <div class="container">
        <div class="granola-showcase-header">
            <div class="header-titles">
                <span class="eyebrow-editorial"><?php esc_html_e( 'THE SIGNATURE COLLECTION', 'made-with-oats' ); ?></span>
                <h2 class="title-editorial-section"><?php esc_html_e( 'Our Granolas', 'made-with-oats' ); ?></h2>
                <p class="section-subtitle-editorial">
                    <?php esc_html_e( 'Slow-toasted whole rolled oats, crunchy nuts, real berries, and rich, indulgent chocolate &mdash; quality in every bite.', 'made-with-oats' ); ?>
                </p>
            </div>
            <a href="<?php echo esc_url( home_url( '/shop?cat=granola' ) ); ?>" class="link-editorial-arrow">
                <span><?php esc_html_e( 'View All Granolas', 'made-with-oats' ); ?></span>
                <span class="arrow" aria-hidden="true">&rarr;</span>
            </a>
        </div>

        <div class="granola-showcase-grid">
            <?php 
            $granola_skus = array( 'G001', 'G002', 'G003' );
            foreach ( $granola_skus as $g_sku ) :
                if ( isset( $products[ $g_sku ] ) ) :
                    $gp = $products[ $g_sku ];
                    $gp_url = class_exists( 'WooCommerce' ) && function_exists( 'wc_get_product' ) ? get_permalink( $gp['id'] ) : home_url( '/product/' . $gp['slug'] );
                    $badge = $g_sku === 'G001' ? 'Best Seller' : ( $g_sku === 'G002' ? 'Nutty & Rich' : 'Classic Hearth' );
                    ?>
                    <article class="granola-product-card" data-sku="<?php echo esc_attr( $g_sku ); ?>">
                        <a href="<?php echo esc_url( $gp_url ); ?>" class="granola-card-media">
                            <span class="granola-card-badge"><?php echo esc_html( $badge ); ?></span>
                            <img src="<?php echo esc_url( made_with_oats_img_url( $gp['image'] ) ); ?>" 
                                 alt="<?php echo esc_attr( $gp['name'] ); ?>" 
                                 class="granola-card-img" 
                                 loading="lazy" 
                                 width="600" 
                                 height="720">
                        </a>
                        <div class="granola-card-details">
                            <div class="granola-card-weights">100g &bull; 200g &bull; 500g</div>
                            <h3 class="granola-card-title">
                                <a href="<?php echo esc_url( $gp_url ); ?>"><?php echo esc_html( $gp['name'] ); ?></a>
                            </h3>
                            <p class="granola-card-desc"><?php echo esc_html( $gp['short_desc'] ); ?></p>
                            <div class="granola-card-footer">
                                <div class="granola-price-block">
                                    <span class="granola-price-label"><?php esc_html_e( 'Starting at', 'made-with-oats' ); ?></span>
                                    <span class="granola-price-val">₹<?php echo esc_html( $gp['base_price'] ); ?></span>
                                </div>
                                <a href="<?php echo esc_url( $gp_url ); ?>" class="btn-granola-card"><?php esc_html_e( 'Explore Granola →', 'made-with-oats' ); ?></a>
                            </div>
                        </div>
                    </article>
                <?php endif;
            endforeach; ?>
        </div>
    </div>
</section>

<!-- 3. SHOP THE COLLECTION — INTERACTIVE CATEGORY SELECTOR & GRID -->
<section id="shop-collection" class="product-display-section" aria-label="<?php esc_attr_e( 'Shop The Collection', 'made-with-oats' ); ?>">
    <div class="container">
        <!-- Section Header & Collection Filter -->
        <div class="product-display-header">
            <div class="product-display-header-top">
                <div class="header-titles">
                    <span class="eyebrow-editorial"><?php esc_html_e( 'EXPLORE THE PANTRY', 'made-with-oats' ); ?></span>
                    <h2 class="title-editorial-section"><?php esc_html_e( 'Shop the Collection', 'made-with-oats' ); ?></h2>
                    <p class="section-subtitle-editorial">
                        <?php esc_html_e( 'From crunchy snack bars to royal amaranth bites and festive gifting &mdash; quality in every bite.', 'made-with-oats' ); ?>
                    </p>
                </div>
                <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="link-editorial-arrow">
                    <span><?php esc_html_e( 'View All in Store', 'made-with-oats' ); ?></span>
                    <span class="arrow" aria-hidden="true">&rarr;</span>
                </a>
            </div>

            <!-- Interactive "Shop the Collection" Selector -->
            <div class="collection-nav-wrapper">
                <span class="collection-nav-label">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    <span><?php esc_html_e( 'Shop By Collection:', 'made-with-oats' ); ?></span>
                </span>

                <!-- Mobile Select Dropdown -->
                <div class="collection-dropdown-container">
                    <label for="collection-filter-select" class="sr-only"><?php esc_html_e( 'Select Collection', 'made-with-oats' ); ?></label>
                    <select id="collection-filter-select" class="collection-dropdown-select" aria-label="<?php esc_attr_e( 'Filter products by collection', 'made-with-oats' ); ?>">
                        <option value="all" selected><?php esc_html_e( 'All Creations', 'made-with-oats' ); ?></option>
                        <option value="granola"><?php esc_html_e( 'Granola', 'made-with-oats' ); ?></option>
                        <option value="bites"><?php esc_html_e( 'Bites', 'made-with-oats' ); ?></option>
                        <option value="snack-bars"><?php esc_html_e( 'Snack Bars', 'made-with-oats' ); ?></option>
                        <option value="hampers"><?php esc_html_e( 'Gift Hampers', 'made-with-oats' ); ?></option>
                        <option value="combos"><?php esc_html_e( 'Combos', 'made-with-oats' ); ?></option>
                        <option value="offers"><?php esc_html_e( 'Offers', 'made-with-oats' ); ?></option>
                    </select>
                </div>

                <!-- Desktop Filter Tabs -->
                <div class="collection-filter-tabs" role="tablist" aria-label="<?php esc_attr_e( 'Product categories', 'made-with-oats' ); ?>">
                    <button class="filter-tab is-active" data-filter="all" role="tab" aria-selected="true"><?php esc_html_e( 'All', 'made-with-oats' ); ?></button>
                    <button class="filter-tab" data-filter="granola" role="tab" aria-selected="false"><?php esc_html_e( 'Granola', 'made-with-oats' ); ?></button>
                    <button class="filter-tab" data-filter="bites" role="tab" aria-selected="false"><?php esc_html_e( 'Bites', 'made-with-oats' ); ?></button>
                    <button class="filter-tab" data-filter="snack-bars" role="tab" aria-selected="false"><?php esc_html_e( 'Snack Bars', 'made-with-oats' ); ?></button>
                    <button class="filter-tab" data-filter="hampers" role="tab" aria-selected="false"><?php esc_html_e( 'Gift Hampers', 'made-with-oats' ); ?></button>
                    <button class="filter-tab" data-filter="combos" role="tab" aria-selected="false"><?php esc_html_e( 'Combos', 'made-with-oats' ); ?></button>
                    <button class="filter-tab" data-filter="offers" role="tab" aria-selected="false"><?php esc_html_e( 'Offers', 'made-with-oats' ); ?></button>
                </div>
            </div>
        </div>

        <!-- Product Display Grid -->
        <div class="product-display-grid" id="product-grid">
            <?php foreach ( $products as $sku => $product ) : 
                // Determine category filter slug
                $cat_slug = 'all';
                $primary_cat = strtolower( $product['primary_cat'] );
                if ( strpos( $primary_cat, 'granola' ) !== false ) {
                    $cat_slug = 'granola';
                } elseif ( strpos( $primary_cat, 'bite' ) !== false ) {
                    $cat_slug = 'bites';
                } elseif ( strpos( $primary_cat, 'bar' ) !== false ) {
                    $cat_slug = 'snack-bars';
                } elseif ( strpos( $primary_cat, 'hamper' ) !== false || strpos( $primary_cat, 'gift' ) !== false ) {
                    $cat_slug = 'hampers';
                }

                $badge_class = 'badge-wholesome';
                $badge_label = 'Artisanal';
                if ( ! empty( $product['is_bestseller'] ) ) {
                    $badge_class = 'badge-signature';
                    $badge_label = 'Best Seller';
                } elseif ( $sku === 'DH001' ) {
                    $badge_class = 'badge-festive';
                    $badge_label = 'Festive Gifting';
                } elseif ( $sku === 'G003' ) {
                    $badge_label = 'Breakfast Classic';
                }

                $p_url = class_exists( 'WooCommerce' ) && function_exists( 'wc_get_product' ) ? get_permalink( $product['id'] ) : home_url( '/product/' . $product['slug'] );
                ?>
                <article class="product-display-card" data-sku="<?php echo esc_attr( $sku ); ?>" data-category="<?php echo esc_attr( $cat_slug ); ?>">
                    <a href="<?php echo esc_url( $p_url ); ?>" class="product-card-media">
                        <div class="product-badge-overlay">
                            <span class="product-pill-badge <?php echo esc_attr( $badge_class ); ?>"><?php echo esc_html( $badge_label ); ?></span>
                        </div>
                        <img src="<?php echo esc_url( made_with_oats_img_url( $product['image'] ) ); ?>" alt="<?php echo esc_attr( $product['name'] ); ?>" class="product-card-img" loading="lazy" width="600" height="600">
                    </a>
                    <div class="product-card-details">
                        <div class="product-card-cat-line">
                            <span class="product-card-category"><?php echo esc_html( $product['primary_cat'] ); ?></span>
                            <?php if ( ! empty( $product['variants'] ) ) : ?>
                                <span class="product-card-weight">
                                    <?php 
                                    $labels = array_map( function( $v ) { return $v['label']; }, $product['variants'] );
                                    echo esc_html( implode( ' / ', $labels ) );
                                    ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <h3 class="product-card-title">
                            <a href="<?php echo esc_url( $p_url ); ?>"><?php echo esc_html( $product['name'] ); ?></a>
                        </h3>
                        <p class="product-card-desc"><?php echo esc_html( $product['short_desc'] ); ?></p>
                        <div class="product-card-footer">
                            <div class="product-card-price-group">
                                <span class="price-from-label"><?php esc_html_e( 'From', 'made-with-oats' ); ?></span>
                                <span class="price-amount">₹<?php echo esc_html( $product['base_price'] ); ?></span>
                            </div>
                            <a href="<?php echo esc_url( $p_url ); ?>" class="btn-card-select">
                                <span><?php esc_html_e( 'Choose Size', 'made-with-oats' ); ?></span>
                                <span class="btn-arrow" aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>

            <!-- 10. Curated Bundle: All Bars Collection -->
            <article class="product-display-card" data-sku="BUNDLE001" data-category="combos">
                <a href="<?php echo esc_url( home_url( '/product/all-bars-collection' ) ); ?>" class="product-card-media">
                    <div class="product-badge-overlay">
                        <span class="product-pill-badge badge-signature"><?php esc_html_e( 'Special Bundle', 'made-with-oats' ); ?></span>
                    </div>
                    <img src="<?php echo esc_url( made_with_oats_img_url( 'assets/images/products/bundle001-all-bars-collection.jpg' ) ); ?>" alt="Made With Oats Handcrafted Snack Bars Collection Bundle" class="product-card-img" loading="lazy" width="600" height="600">
                </a>
                <div class="product-card-details">
                    <div class="product-card-cat-line">
                        <span class="product-card-category"><?php esc_html_e( 'Tasting Bundle', 'made-with-oats' ); ?></span>
                        <span class="product-card-weight"><?php esc_html_e( 'Assorted Box of 6', 'made-with-oats' ); ?></span>
                    </div>
                    <h3 class="product-card-title">
                        <a href="<?php echo esc_url( home_url( '/product/all-bars-collection' ) ); ?>"><?php esc_html_e( 'The Complete Snack Bar Collection', 'made-with-oats' ); ?></a>
                    </h3>
                    <p class="product-card-desc">
                        <?php esc_html_e( 'Experience both signature bar recipes in one convenient pack: Triple Seed & Nut Crunch and Dark Chocolate Oat Bliss.', 'made-with-oats' ); ?>
                    </p>
                    <div class="product-card-footer">
                        <div class="product-card-price-group">
                            <span class="price-from-label"><?php esc_html_e( 'Special Offer', 'made-with-oats' ); ?></span>
                            <span class="price-amount">₹520</span>
                        </div>
                        <a href="<?php echo esc_url( home_url( '/product/all-bars-collection' ) ); ?>" class="btn-card-select">
                            <span><?php esc_html_e( 'View Bundle', 'made-with-oats' ); ?></span>
                            <span class="btn-arrow" aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
