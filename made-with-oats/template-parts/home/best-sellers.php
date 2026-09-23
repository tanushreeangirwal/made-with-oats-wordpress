<?php
/**
 * Template part for Editorial Best Sellers Showcase
 * Displays the 4 confirmed Made With Oats best sellers in an asymmetric, photography-led composition.
 *
 * @package Made_With_Oats
 */

$best_sellers = made_with_oats_get_best_sellers();
$featured_item = $best_sellers[0]; // G001 - Dark Chocolate Blueberry & Cranberry Granola
$supporting_items = array_slice( $best_sellers, 1 ); // CB001, CB002, GB002
?>
<section class="editorial-showcase-section" aria-label="<?php esc_attr_e( 'Best Selling Products', 'made-with-oats' ); ?>">
    <div class="container">
        <!-- Editorial Section Header -->
        <div class="editorial-section-header">
            <div class="header-left">
                <span class="eyebrow-editorial"><?php esc_html_e( 'SIGNATURE CREATIONS', 'made-with-oats' ); ?></span>
                <h2 class="title-editorial-section"><?php esc_html_e( 'Our Best Sellers', 'made-with-oats' ); ?></h2>
            </div>
            <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="link-editorial-arrow">
                <span><?php esc_html_e( 'Explore All 9 Creations', 'made-with-oats' ); ?></span>
                <span class="arrow" aria-hidden="true">&rarr;</span>
            </a>
        </div>

        <!-- Asymmetric Editorial Composition -->
        <div class="editorial-product-composition">
            <!-- Major Hero Anchor Product: G001 Granola -->
            <div class="showcase-hero-column">
                <?php
                $hero_url = class_exists( 'WooCommerce' ) && function_exists( 'wc_get_product' ) ? get_permalink( $featured_item['id'] ) : home_url( '/product/' . $featured_item['slug'] );
                ?>
                <div class="showcase-hero-card">
                    <a href="<?php echo esc_url( $hero_url ); ?>" class="showcase-media-wrap">
                        <img src="<?php echo esc_url( made_with_oats_img_url( $featured_item['image'] ) ); ?>" alt="<?php echo esc_attr( $featured_item['name'] ); ?>" class="showcase-hero-img" loading="lazy" width="800" height="800">
                    </a>
                    <div class="showcase-hero-details">
                        <span class="product-editorial-tag"><?php echo esc_html( $featured_item['primary_cat'] ); ?> &bull; 100g / 200g / 500g</span>
                        <h3 class="showcase-hero-title">
                            <a href="<?php echo esc_url( $hero_url ); ?>"><?php echo esc_html( $featured_item['name'] ); ?></a>
                        </h3>
                        <p class="showcase-hero-desc"><?php echo esc_html( $featured_item['short_desc'] ); ?></p>
                        <div class="showcase-action-line">
                            <span class="editorial-price">From ₹<?php echo esc_html( $featured_item['base_price'] ); ?></span>
                            <a href="<?php echo esc_url( $hero_url ); ?>" class="editorial-text-cta">
                                <span>VIEW CREATION</span>
                                <span class="cta-arrow" aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Supporting Staggered Column: CB001, CB002, GB002 -->
            <div class="showcase-supporting-column">
                <?php foreach ( $supporting_items as $product ) : 
                    $p_url = class_exists( 'WooCommerce' ) && function_exists( 'wc_get_product' ) ? get_permalink( $product['id'] ) : home_url( '/product/' . $product['slug'] );
                    ?>
                    <article class="showcase-supporting-item" data-sku="<?php echo esc_attr( $product['sku'] ); ?>">
                        <a href="<?php echo esc_url( $p_url ); ?>" class="supporting-media-wrap">
                            <img src="<?php echo esc_url( made_with_oats_img_url( $product['image'] ) ); ?>" alt="<?php echo esc_attr( $product['name'] ); ?>" class="supporting-img" loading="lazy" width="400" height="400">
                        </a>
                        <div class="supporting-details">
                            <span class="product-editorial-tag"><?php echo esc_html( $product['primary_cat'] ); ?></span>
                            <h4 class="supporting-title">
                                <a href="<?php echo esc_url( $p_url ); ?>"><?php echo esc_html( $product['name'] ); ?></a>
                            </h4>
                            <div class="supporting-action-line">
                                <span class="editorial-price">From ₹<?php echo esc_html( $product['base_price'] ); ?></span>
                                <a href="<?php echo esc_url( $p_url ); ?>" class="editorial-text-cta">
                                    <span>VIEW</span>
                                    <span class="cta-arrow" aria-hidden="true">&rarr;</span>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
