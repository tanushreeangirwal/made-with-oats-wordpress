<?php
/**
 * The WooCommerce master template file
 *
 * @package Made_With_Oats
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container" style="padding-top: var(--space-2xl); padding-bottom: var(--space-4xl);">
        <?php woocommerce_content(); ?>
    </div>
</main>

<?php
get_footer();
