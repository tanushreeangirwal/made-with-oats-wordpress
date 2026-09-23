<?php
/**
 * The template for displaying all pages
 *
 * @package Made_With_Oats
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container container-narrow" style="padding-top: var(--space-3xl); padding-bottom: var(--space-4xl);">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'card' ); ?> style="padding: var(--space-2xl);">
                <header class="entry-header" style="margin-bottom: var(--space-xl); text-align: center;">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <div class="entry-content" style="line-height: 1.8; font-size: 1.05rem; color: var(--color-text-secondary);">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();
