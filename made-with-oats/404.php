<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Made_With_Oats
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container container-narrow" style="padding: 6rem 1.5rem; text-align: center;">
        <span class="eyebrow eyebrow-gold">Page Not Found</span>
        <h1 style="font-size: 3.5rem; margin: 1rem 0 0.5rem 0;">404</h1>
        <p style="font-size: 1.15rem; max-width: 480px; margin: 0 auto 2rem auto;">
            Oops! The page you are looking for might have been moved, renamed, or is temporarily out of crunch.
        </p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary btn-lg">
            <span>Back to Home</span>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </a>
    </div>
</main>

<?php
get_footer();
