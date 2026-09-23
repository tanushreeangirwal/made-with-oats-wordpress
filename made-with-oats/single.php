<?php
/**
 * The template for displaying all single posts
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
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'card' ); ?> style="padding: clamp(2rem, 4vw, 3.5rem);">
                <header class="entry-header" style="margin-bottom: var(--space-xl); text-align: center;">
                    <h1 class="entry-title" style="font-family: var(--font-serif); font-size: clamp(2rem, 3.5vw, 2.75rem); color: var(--color-chocolate);"><?php the_title(); ?></h1>
                    <div class="entry-meta" style="margin-top: 0.75rem; font-size: 0.875rem; color: var(--text-muted);">
                        <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
                    </div>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail" style="margin-bottom: var(--space-xl); border-radius: var(--radius-md); overflow: hidden;">
                        <?php the_post_thumbnail( 'large', array( 'style' => 'width: 100%; height: auto; display: block;' ) ); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content" style="line-height: 1.8; font-size: 1.05rem; color: var(--color-text-secondary, rgba(58, 36, 24, 0.88));">
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
