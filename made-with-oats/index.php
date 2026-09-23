<?php
/**
 * The main template file
 *
 * @package Made_With_Oats
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container" style="padding-top: var(--space-3xl); padding-bottom: var(--space-4xl);">
        <?php if ( have_posts() ) : ?>
            <header class="page-header" style="margin-bottom: var(--space-2xl); text-align: center;">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            </header>

            <div class="posts-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 2rem;">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'card' ); ?>>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div style="margin: -1.5rem -1.5rem 1rem -1.5rem; aspect-ratio: 16/9; overflow: hidden; border-radius: var(--radius-lg) var(--radius-lg) 0 0;">
                                <?php the_post_thumbnail( 'medium_large', array( 'style' => 'width:100%; height:100%; object-fit:cover;' ) ); ?>
                            </div>
                        <?php endif; ?>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div style="margin-top: 0.5rem; font-size: 0.85rem; color: var(--color-text-muted);">
                            <?php echo get_the_date(); ?>
                        </div>
                        <div style="margin-top: 1rem;">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <div style="margin-top: 3rem; text-align: center;">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <div style="text-align: center; padding: 4rem 0;">
                <h2><?php esc_html_e( 'Nothing Found', 'made-with-oats' ); ?></h2>
                <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'made-with-oats' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
