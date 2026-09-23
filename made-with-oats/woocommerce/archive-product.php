<?php
/**
 * The Template for displaying product archives, including the main shop page
 *
 * @package Made_With_Oats
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>

<div class="shop-hero-banner">
    <div class="container">
        <span class="eyebrow"><?php esc_html_e( 'BETTER-FOR-YOU SNACKING', 'made-with-oats' ); ?></span>
        <h1 class="woocommerce-products-header__title page-title"><?php echo function_exists( 'is_shop' ) && is_shop() ? esc_html__( 'All Artisanal Snacks', 'made-with-oats' ) : woocommerce_page_title( false ); ?></h1>
        <p><?php esc_html_e( 'Handcrafted with whole rolled oats, raw forest honey, crunchy nuts and slow-baked small batches.', 'made-with-oats' ); ?></p>
    </div>
</div>

<div class="container shop-container">
    <!-- Category Filter Bar -->
    <div class="shop-filter-bar" role="tablist" aria-label="<?php esc_attr_e( 'Filter products by category', 'made-with-oats' ); ?>">
        <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="shop-filter-pill is-active">All Snacks (9)</a>
        <a href="<?php echo esc_url( home_url( '/category/granola' ) ); ?>" class="shop-filter-pill">Granola (3)</a>
        <a href="<?php echo esc_url( home_url( '/category/bites' ) ); ?>" class="shop-filter-pill">Bites (2)</a>
        <a href="<?php echo esc_url( home_url( '/category/snack-bars' ) ); ?>" class="shop-filter-pill">Snack Bars (3)</a>
        <a href="<?php echo esc_url( home_url( '/category/energy-bars' ) ); ?>" class="shop-filter-pill">Energy Bars</a>
        <a href="<?php echo esc_url( home_url( '/category/gift-hampers' ) ); ?>" class="shop-filter-pill">Gift Hampers (1)</a>
        <a href="<?php echo esc_url( home_url( '/category/combos' ) ); ?>" class="shop-filter-pill">Combos</a>
        <a href="<?php echo esc_url( home_url( '/category/offers' ) ); ?>" class="shop-filter-pill">Offers</a>
    </div>

    <!-- Main Catalog Grid -->
    <main id="primary" class="shop-content">
        <?php
        if ( woocommerce_product_loop() ) {
            woocommerce_product_loop_start();

            if ( wc_get_loop_prop( 'total' ) ) {
                while ( have_posts() ) {
                    the_post();
                    wc_get_template_part( 'content', 'product' );
                }
            }

            woocommerce_product_loop_end();
            woocommerce_pagination();
        } else {
            // Development fallback with official Made With Oats products
            ?>
            <div class="products-grid">
                <?php
                $official_products = made_with_oats_get_official_products();
                foreach ( $official_products as $product ) :
                    $product_url = home_url( '/product/' . $product['slug'] );
                    ?>
                    <article class="product-card" data-sku="<?php echo esc_attr( $product['sku'] ); ?>">
                        <div class="product-thumb-box">
                            <img src="<?php echo esc_url( $product['image'] ); ?>" alt="<?php echo esc_attr( $product['name'] ); ?>" class="product-thumb" loading="lazy" width="400" height="400">
                            
                            <?php if ( ! empty( $product['status'] ) ) : ?>
                                <span class="badge-bestseller"><?php echo esc_html( $product['status'] ); ?></span>
                            <?php endif; ?>

                            <?php if ( ! empty( $product['positioning'] ) ) : ?>
                                <span class="badge-special-pos"><?php echo esc_html( $product['positioning'] ); ?></span>
                            <?php endif; ?>

                            <button type="button" class="wishlist-btn" aria-label="<?php esc_attr_e( 'Save to Wishlist', 'made-with-oats' ); ?>">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                            </button>
                        </div>

                        <div class="product-body">
                            <span class="product-cat"><?php echo esc_html( $product['primary_cat'] ); ?> &bull; SKU: <?php echo esc_html( $product['sku'] ); ?></span>
                            <h3 class="product-title">
                                <a href="<?php echo esc_url( $product_url ); ?>">
                                    <?php echo esc_html( $product['name'] ); ?>
                                </a>
                            </h3>
                            <p class="product-short-snippet"><?php echo esc_html( $product['short_desc'] ); ?></p>

                            <!-- Variant preview -->
                            <div class="product-variant-preview">
                                <?php foreach ( $product['variants'] as $v ) : ?>
                                    <span class="variant-chip"><?php echo esc_html( $v['label'] ); ?></span>
                                <?php endforeach; ?>
                            </div>

                            <div class="product-footer-row">
                                <div class="product-price-box">
                                    <span class="price-from-label">From</span>
                                    <span class="price-current">₹<?php echo esc_html( $product['base_price'] ); ?></span>
                                </div>
                                <a href="<?php echo esc_url( $product_url ); ?>" class="btn-quick-view">
                                    <span>Select Options</span>
                                </a>
                            </div>
                        </div>
                    </article>
                    <?php
                endforeach;
                ?>
            </div>
            <?php
        }
        ?>
    </main>
</div>

<?php
get_footer( 'shop' );
