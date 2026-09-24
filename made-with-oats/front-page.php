<?php
/**
 * The front-page template for Made With Oats
 *
 * Sequence matches client requirements:
 * 1. Hero
 * 2. Brand USP strip
 * 3. Shop by Category
 * 4. Best Sellers
 * 5. Our Story
 * 6. Why Made With Oats
 * 7. Instagram
 * 8. Testimonials
 * 9. Newsletter
 * 10. Footer
 *
 * @package Made_With_Oats
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    // 1. Brand-First Editorial Campaign Hero
    get_template_part( 'template-parts/home/hero' );

    // 2. Product-First Display Grid with Category Dropdown / Tabs Filter
    get_template_part( 'template-parts/home/product-display' );

    // 3. Asymmetric Editorial Categories (Granola Featured)
    get_template_part( 'template-parts/home/categories' );

    // 4. Diwali Hampers Coming Soon Announcement
    get_template_part( 'template-parts/home/featured-hamper' );

    // 5. Story Chapter 01: "Snacking, made thoughtfully." (Approved Story Copy)
    get_template_part( 'template-parts/home/brand-story' );

    // 6. Story Chapter 02: "Real ingredients. Small batches. Good food."
    get_template_part( 'template-parts/home/ingredient-story' );

    // 7. Why Made With Oats (Philosophy 01-04)
    get_template_part( 'template-parts/home/why-made-with-oats' );

    // 7b. Shipping & Service Information Strip
    get_template_part( 'template-parts/home/service-trust' );

    // 8. Instagram Lifestyle Collage (@made.withoats)
    get_template_part( 'template-parts/home/instagram-gallery' );

    // 9. Customer Testimonials
    get_template_part( 'template-parts/home/testimonials' );

    // 10. Newsletter ("Stay close to the good stuff.")
    get_template_part( 'template-parts/home/newsletter' );
    ?>
</main>

<?php
get_footer();
