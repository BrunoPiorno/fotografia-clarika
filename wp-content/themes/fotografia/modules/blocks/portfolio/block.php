<?php
/**
 * Portfolio
 *
 * Title:       Portfolio
 * Slug:        porfolio
 * Description: Porfolio
 * Category:    fotografia
 * Icon:        align-full-width
 * Keywords:    porfolio
 * Post Types:  all
 * Multiple:    true
 * Active:      true
 * Styles:      
 * CSS Deps:
 * JS Deps:
 *
 * @package fotografia
 * @subpackage defaultTheme
 * @since defaultTheme  1.0
 */

 do_action( 'fotografia_pre_render_block', $block ); ?>

<?php $portfolio_query = new WP_Query(array(
    'post_type' => 'portfolio',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
));

if ($portfolio_query->have_posts()) : ?>
    <section class="portfolio bg--white" id="portfolio" data-waypoint="0.25">
        <div class="container">
            <?php if($title = get_field('title')): ?>
                <h2 class="portfolio__title title h3"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            <div class="portfolio__cont">
                <?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
                    <div class="portfolio__item">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="portfolio__item__thumbnail"><?php the_post_thumbnail('full'); ?></div>
                        <?php endif; ?>
                        <div class="portfolio__item__cont">
                            <h3 class="portfolio__item__title"><?php the_title(); ?></h3>
                            <div class="portfolio__item__description"><?php the_excerpt(); ?></div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); 
else : ?>
    <p>No hay imágenes disponibles.</p>
<?php endif; ?>

