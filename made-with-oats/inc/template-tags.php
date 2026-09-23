<?php
/**
 * Made With Oats - Custom Template Tags & Official Product Helpers
 *
 * @package Made_With_Oats
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Output Brand Logo
 */
function made_with_oats_logo() {
    if ( has_custom_logo() ) {
        the_custom_logo();
    } else {
        $logo_url = MADE_WITH_OATS_URI . '/assets/images/logo.png';
        ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo-link" rel="home">
            <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="brand-logo-img" width="80" height="80">
            <div class="brand-title-group">
                <span class="brand-name">Made with Oats</span>
                <span class="brand-tagline">Granola &amp; More With Love</span>
            </div>
        </a>
        <?php
    }
}

/**
 * Helper to resolve image URLs for both relative theme assets and absolute URLs
 */
function made_with_oats_img_url( $path ) {
    if ( empty( $path ) ) {
        return MADE_WITH_OATS_URI . '/assets/images/logo.png';
    }
    if ( strpos( $path, 'http://' ) === 0 || strpos( $path, 'https://' ) === 0 ) {
        return $path;
    }
    return MADE_WITH_OATS_URI . '/' . ltrim( $path, '/' );
}

/**
 * Get Product Categories
 */
function made_with_oats_get_categories() {
    if ( class_exists( 'WooCommerce' ) ) {
        $terms = get_terms( array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
            'exclude'    => get_option( 'default_product_cat' ),
        ) );
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            return $terms;
        }
    }

    // Official Categories as specified in brief with real product imagery
    return array(
        (object) array(
            'name'        => 'Granola',
            'slug'        => 'granola',
            'subtitle'    => 'Handcrafted Whole Oat Clusters',
            'description' => 'Toasted with real whole rolled oats, raw honey & nuts',
            'image'       => 'assets/images/products/g001-dark-chocolate-granola.jpg',
            'featured'    => true,
        ),
        (object) array(
            'name'        => 'Bites',
            'slug'        => 'bites',
            'subtitle'    => 'Bite-Sized Indulgence',
            'description' => 'Puffed rajgira blended with rich, indulgent chocolate',
            'image'       => 'assets/images/products/cb001-chocolate-rajgira-bites.jpg',
            'featured'    => false,
        ),
        (object) array(
            'name'        => 'Snack Bars',
            'slug'        => 'snack-bars',
            'subtitle'    => 'Clean Anytime Crunch',
            'description' => 'Triple seed crunch & rich dark chocolate bars',
            'image'       => 'assets/images/products/bundle001-all-bars-collection.jpg',
            'featured'    => false,
        ),
        (object) array(
            'name'        => 'Energy Bars',
            'slug'        => 'energy-bars',
            'subtitle'    => 'On-the-Go Sustained Energy',
            'description' => 'Nutrient-dense bars loaded with oats, seeds & healthy fats',
            'image'       => 'assets/images/products/gb001-triple-seed-bar.jpg',
            'featured'    => false,
        ),
        (object) array(
            'name'        => 'Gift Hampers',
            'slug'        => 'gift-hampers',
            'subtitle'    => 'Festive & Mindful Gifting',
            'description' => 'Collapsible fancy gift boxes with custom choice of granolas',
            'image'       => 'assets/images/products/dh001-diwali-hamper.jpg',
            'featured'    => false,
        ),
        (object) array(
            'name'        => 'Combos',
            'slug'        => 'combos',
            'subtitle'    => 'Curated Snack Bundles',
            'description' => 'Pair your favorite granola clusters with bite-sized treats',
            'image'       => 'assets/images/products/box001-bars-white-gift-box.jpg',
            'featured'    => false,
        ),
        (object) array(
            'name'        => 'Special Offers',
            'slug'        => 'offers',
            'subtitle'    => 'Value Packs & Limited Batches',
            'description' => 'Seasonal small-batch creations at special introductory pricing',
            'image'       => 'assets/images/products/gb002-dark-chocolate-bliss-bundle.jpg',
            'featured'    => false,
        ),
    );
}

/**
 * Get Official Made With Oats Products
 * Strict adherence to client data specification.
 */
function made_with_oats_get_official_products() {
    return array(
        // Product 1: Best Seller
        'G001' => array(
            'sku'             => 'G001',
            'id'              => 1,
            'name'            => 'Dark Chocolate Blueberry & Cranberry Granola',
            'status'          => 'BEST SELLER',
            'is_bestseller'   => true,
            'primary_cat'     => 'Granola',
            'categories'      => array( 'Granola', 'Breakfast', 'Snacks' ),
            'slug'            => 'dark-chocolate-blueberry-cranberry-granola',
            'base_price'      => 170,
            'variants'        => array(
                array( 'label' => '100g', 'price' => 170, 'is_default' => true, 'image' => 'assets/images/products/g001-100-200g-granola.jpg' ),
                array( 'label' => '200g', 'price' => 260, 'image' => 'assets/images/products/g001-100-200g-granola.jpg' ),
                array( 'label' => '500g', 'price' => 599, 'image' => 'assets/images/products/g001-dark-chocolate-granola.jpg' ),
            ),
            'gallery'         => array(
                'assets/images/products/g001-dark-chocolate-granola.jpg',
                'assets/images/products/g001-100-200g-granola.jpg',
            ),
            'ingredients'     => array( 'Rolled Oats', 'Dark Chocolate', 'Almonds', 'Blueberry', 'Cranberry', 'Pumpkin Seeds', 'Sunflower Seeds', 'Flax Seeds', 'Cocoa Powder', 'Cold Pressed Coconut Oil', 'Honey' ),
            'allergens'       => 'Contains Nuts',
            'allergen_flag'   => false,
            'shelf_life'      => '30 days',
            'storage'         => 'Store in a cool, dry place and in an airtight container.',
            'stock'           => 'In Stock',
            'nutrition_info'  => null, // STRICT: NOT PROVIDED. DO NOT INVENT.
            'image'           => 'assets/images/products/g001-dark-chocolate-granola.jpg',
            'short_desc'      => 'Whole rolled oats clustered with decadent dark chocolate, tart blueberries, sweet cranberries, and crunchy almonds.',
        ),

        // Product 2
        'G002' => array(
            'sku'             => 'G002',
            'id'              => 2,
            'name'            => 'Peanut Butter & Dark Chocolate Granola',
            'status'          => 'AVAILABLE',
            'is_bestseller'   => false,
            'primary_cat'     => 'Granola',
            'categories'      => array( 'Granola', 'Breakfast', 'Snacks' ),
            'slug'            => 'peanut-butter-dark-chocolate-granola',
            'base_price'      => 180,
            'variants'        => array(
                array( 'label' => '100g', 'price' => 180, 'is_default' => true ),
                array( 'label' => '200g', 'price' => 270 ),
                array( 'label' => '500g', 'price' => 699 ),
            ),
            'gallery'         => array(
                'assets/images/products/g002-peanut-butter-granola.jpg',
            ),
            'ingredients'     => array( 'Rolled Oats', 'Peanut Butter', 'Dark Chocolate', 'Almonds', 'Pumpkin Seeds', 'Sunflower Seeds', 'Flax Seeds', 'Honey' ),
            'allergens'       => 'Contains Peanuts, Tree Nuts',
            'allergen_flag'   => false,
            'shelf_life'      => '30 days',
            'storage'         => 'Store in a cool, dry place and in an airtight container.',
            'stock'           => 'In Stock',
            'nutrition_info'  => null,
            'image'           => 'assets/images/products/g002-peanut-butter-granola.jpg',
            'short_desc'      => 'Creamy wholesome peanut butter and dark chocolate chunks baked slow with whole rolled oats and nourishing seeds.',
        ),

        // Product 3: Almond Raisin Granola (FLARED PRICE WARNING)
        'G003' => array(
            'sku'             => 'G003',
            'id'              => 3,
            'name'            => 'Almond Raisin Granola',
            'status'          => 'AVAILABLE',
            'is_bestseller'   => false,
            'primary_cat'     => 'Granola',
            'categories'      => array( 'Granola', 'Breakfast', 'Snacks' ),
            'slug'            => 'almond-raisin-granola',
            'base_price'      => 150,
            'variants'        => array(
                array( 'label' => '100g', 'price' => 150, 'is_default' => true ),
                array( 'label' => '200g', 'price' => null, 'price_note' => 'Price Requires Client Confirmation (supplied as ₹2750)', 'flagged' => true ),
                array( 'label' => '500g', 'price' => 549 ),
            ),
            'gallery'         => array(
                'assets/images/products/g003-almond-raisin-granola.jpg',
            ),
            'ingredients'     => array( 'Rolled Oats', 'Almonds', 'Raisins', 'Pumpkin Seeds', 'Sunflower Seeds', 'Flax Seeds', 'Honey', 'Cinnamon Powder', 'Vanilla Essence' ),
            'allergens'       => 'Contains Nuts',
            'allergen_flag'   => false,
            'shelf_life'      => '30 days',
            'storage'         => 'Store in a cool, dry place and in an airtight container.',
            'stock'           => 'In Stock',
            'nutrition_info'  => null,
            'image'           => 'assets/images/products/g003-almond-raisin-granola.jpg',
            'short_desc'      => 'A timeless breakfast classic: rolled oats toasted with California almonds, juicy golden raisins, honey, and a hint of warm cinnamon.',
        ),

        // Product 4: Chocolate Rajgira Bites (Best Seller)
        'CB001' => array(
            'sku'             => 'CB001',
            'id'              => 4,
            'name'            => 'Chocolate Rajgira Bites',
            'status'          => 'BEST SELLER',
            'is_bestseller'   => true,
            'primary_cat'     => 'Bites',
            'categories'      => array( 'Bites', 'Snacks' ),
            'slug'            => 'chocolate-rajgira-bites',
            'base_price'      => 350,
            'variants'        => array(
                array( 'label' => '250g', 'price' => 350, 'is_default' => true, 'image' => 'assets/images/products/cb001-250g-rajgira-bites.jpg' ),
                array( 'label' => '500g', 'price' => 550, 'image' => 'assets/images/products/cb001-chocolate-rajgira-bites.jpg' ),
                array( 'label' => '1kg', 'price' => 999, 'image' => 'assets/images/products/cb001-1kg-rajgira-bites.jpg' ),
            ),
            'gallery'         => array(
                'assets/images/products/cb001-250g-rajgira-bites.jpg',
                'assets/images/products/cb001-chocolate-rajgira-bites.jpg',
                'assets/images/products/cb001-1kg-rajgira-bites.jpg',
                'assets/images/products/cb001-box-rajgira-bites.jpg',
            ),
            'ingredients'     => array( 'Dark Chocolate', 'Puffed Rajgira' ),
            'allergens'       => 'made in space with Nuts',
            'allergen_flag'   => true, // STRICT: Pending client confirmation of exact wording
            'shelf_life'      => '20 days',
            'storage'         => 'Store in refrigerator.',
            'stock'           => 'In Stock',
            'nutrition_info'  => null,
            'image'           => 'assets/images/products/cb001-250g-rajgira-bites.jpg',
            'short_desc'      => 'Traditional nutrient-dense puffed rajgira (amaranth) coated in dark chocolate. Bite-sized guilt-free crunch.',
        ),

        // Product 5: Intense Dark Chocolate Rajgira Bites (Best Seller)
        'CB002' => array(
            'sku'             => 'CB002',
            'id'              => 5,
            'name'            => 'Intense Dark Chocolate Rajgira Bites',
            'status'          => 'BEST SELLER',
            'is_bestseller'   => true,
            'positioning'     => 'Rich Dark Chocolate',
            'primary_cat'     => 'Bites',
            'categories'      => array( 'Bites', 'Snacks' ),
            'slug'            => 'intense-dark-chocolate-rajgira-bites',
            'base_price'      => 599,
            'variants'        => array(
                array( 'label' => '250g', 'price' => 599, 'is_default' => true ),
                array( 'label' => '500g', 'price' => 899 ),
                array( 'label' => '1kg', 'price' => 1399 ),
            ),
            'gallery'         => array(
                'assets/images/products/cb002-rajgira-bites-250g.webp',
                'assets/images/products/cb002-rajgira-bites-500g.webp',
                'assets/images/products/cb002-rajgira-bites-1kg.webp',
            ),
            'ingredients'     => array( 'Couverture Dark Chocolate', 'Puffed Rajgira' ),
            'allergens'       => '',
            'allergen_flag'   => false,
            'shelf_life'      => '30 days',
            'storage'         => 'Store in a cool, dry place in an airtight container.',
            'stock'           => 'In Stock',
            'nutrition_info'  => null,
            'image'           => 'assets/images/products/cb002-rajgira-bites-250g.webp',
            'short_desc'      => 'Luxurious artisanal bites crafted with rich dark chocolate and indigenous puffed amaranth.',
        ),

        // Product 6: Intense Dark Chocolate Rajgira Bars
        'CB003' => array(
            'sku'             => 'CB003',
            'id'              => 6,
            'name'            => 'Intense Dark Chocolate Rajgira Bars',
            'status'          => 'AVAILABLE',
            'is_bestseller'   => false,
            'positioning'     => 'Rich Dark Chocolate',
            'primary_cat'     => 'Snack Bars',
            'categories'      => array( 'Snack Bars' ),
            'slug'            => 'intense-dark-chocolate-rajgira-bars',
            'base_price'      => 95,
            'variants'        => array(
                array( 'label' => 'Single Bar (35g)', 'price' => 95, 'is_default' => true ),
                array( 'label' => 'Pack of 3', 'price' => 270 ),
                array( 'label' => 'Pack of 6', 'price' => 510 ),
            ),
            'gallery'         => array(
                'assets/images/products/cb003-rajgira-bar-40g.webp',
            ),
            'ingredients'     => array( 'Couverture Dark Chocolate', 'Puffed Rajgira' ),
            'allergens'       => 'Gluten-Free by nature',
            'allergen_flag'   => false,
            'shelf_life'      => '30 days',
            'storage'         => 'Store in a cool, dry place.',
            'stock'           => 'In Stock',
            'nutrition_info'  => null,
            'image'           => 'assets/images/products/cb003-rajgira-bar-40g.webp',
            'short_desc'      => 'On-the-go snack bar infused with rich dark chocolate and crispy puffed rajgira.',
        ),

        // Product 7: Triple Seed Crunch (Granola Bars)
        'GB001' => array(
            'sku'             => 'GB001',
            'id'              => 7,
            'name'            => 'Triple Seed Crunch',
            'status'          => 'AVAILABLE',
            'is_bestseller'   => false,
            'primary_cat'     => 'Snack Bars',
            'categories'      => array( 'Granola Bars', 'Snack Bars' ),
            'slug'            => 'triple-seed-crunch',
            'base_price'      => 65,
            'variants'        => array(
                array( 'label' => 'Single / 40g', 'price' => 65, 'is_default' => true, 'image' => 'assets/images/products/gb001-triple-seed-bar.jpg' ),
                array( 'label' => 'Pack of 3', 'price' => 190 ),
                array( 'label' => 'Pack of 6', 'price' => 370, 'image' => 'assets/images/products/gb001-triple-seed-bundle.jpg' ),
                array( 'label' => 'Pack of 12', 'price' => 750 ),
            ),
            'gallery'         => array(
                'assets/images/products/gb001-triple-seed-bar.jpg',
                'assets/images/products/gb001-triple-seed-bundle.jpg',
            ),
            'ingredients'     => array( 'Pumpkin Seeds', 'Flax Seeds', 'Sunflower Seeds', 'Rolled Oats', 'Dates', 'Cold Pressed Coconut Oil' ),
            'allergens'       => 'Made in space with Nuts',
            'allergen_flag'   => true,
            'shelf_life'      => '30 days',
            'storage'         => 'Store in a cool, dry place.',
            'stock'           => 'In Stock',
            'nutrition_info'  => null,
            'image'           => 'assets/images/products/gb001-triple-seed-bar.jpg',
            'short_desc'      => 'Power-packed seed bar with pumpkin, flax, and sunflower seeds, sweet Arabian dates, and virgin coconut oil.',
        ),

        // Product 8: Dark Chocolate Bliss (Granola Bars - Best Seller)
        'GB002' => array(
            'sku'             => 'GB002',
            'id'              => 8,
            'name'            => 'Dark Chocolate Bliss',
            'status'          => 'BEST SELLER',
            'is_bestseller'   => true,
            'primary_cat'     => 'Snack Bars',
            'categories'      => array( 'Granola Bars', 'Snack Bars' ),
            'slug'            => 'dark-chocolate-bliss',
            'base_price'      => 80,
            'variants'        => array(
                array( 'label' => 'Single / 40g', 'price' => 80, 'is_default' => true, 'image' => 'assets/images/products/gb002-dark-chocolate-bliss.jpg' ),
                array( 'label' => 'Pack of 3', 'price' => 220 ),
                array( 'label' => 'Pack of 6', 'price' => 450, 'image' => 'assets/images/products/gb002-dark-chocolate-bliss-bundle.jpg' ),
                array( 'label' => 'Pack of 12', 'price' => 940 ),
            ),
            'gallery'         => array(
                'assets/images/products/gb002-dark-chocolate-bliss.jpg',
                'assets/images/products/gb002-dark-chocolate-bliss-bundle.jpg',
            ),
            'ingredients'     => array( 'Dark Chocolate', 'Sunflower Seeds', 'Rolled Oats', 'Cold Pressed Coconut Oil', 'Honey', 'Peanut Butter' ),
            'allergens'       => 'Contains Peanuts',
            'allergen_flag'   => false,
            'shelf_life'      => '30 days',
            'storage'         => 'Store in a cool, dry place.',
            'stock'           => 'In Stock',
            'nutrition_info'  => null,
            'image'           => 'assets/images/products/gb002-dark-chocolate-bliss.jpg',
            'short_desc'      => 'Irresistible dark chocolate and peanut butter granola bar with toasted sunflower seeds and whole rolled oats.',
        ),

        // Product 9: Diwali Hamper 1
        'DH001' => array(
            'sku'             => 'DH001',
            'id'              => 9,
            'name'            => 'Diwali Hamper 1 &mdash; Custom Granola Box',
            'status'          => 'FESTIVE BUNDLE',
            'is_bestseller'   => false,
            'primary_cat'     => 'Gift Hampers',
            'categories'      => array( 'Gift Hampers' ),
            'slug'            => 'diwali-hamper-1',
            'base_price'      => 750,
            'variants'        => array(
                array( 'label' => 'Collapsible Box (3 x 100g Glass Jars)', 'price' => 750, 'is_default' => true ),
            ),
            'gallery'         => array(
                'assets/images/products/dh001-diwali-hamper.jpg',
            ),
            'hamper_choices'  => array(
                'Dark Chocolate Blueberry & Cranberry Granola (100g)',
                'Peanut Butter & Dark Chocolate Granola (100g)',
                'Almond Raisin Granola (100g)',
            ),
            'ingredients'     => array( 'Includes 3 customizable 100g artisan granola jars packed in a luxury collapsible gift box.' ),
            'allergens'       => 'Contains Nuts / Peanuts depending on flavor selection',
            'allergen_flag'   => false,
            'shelf_life'      => '30 days',
            'storage'         => 'Store in a cool, dry place.',
            'stock'           => 'In Stock',
            'nutrition_info'  => null,
            'image'           => 'assets/images/products/dh001-diwali-hamper.jpg',
            'short_desc'      => 'A thoughtful festive hamper: choose any 3 signature 100g granola flavours presented in premium reusable glass jars.',
        ),
    );
}

/**
 * Backwards compatibility alias for template tags
 */
function made_with_oats_get_demo_products() {
    return made_with_oats_get_official_products();
}

/**
 * Get the 4 Confirmed Best Sellers
 */
function made_with_oats_get_best_sellers() {
    $all = made_with_oats_get_official_products();
    $best_seller_skus = array( 'G001', 'CB001', 'CB002', 'GB002' );
    $filtered = array();
    foreach ( $best_seller_skus as $sku ) {
        if ( isset( $all[ $sku ] ) ) {
            $filtered[] = $all[ $sku ];
        }
    }
    return $filtered;
}
