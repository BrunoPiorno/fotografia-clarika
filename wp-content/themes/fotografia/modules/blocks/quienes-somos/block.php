<?php
/**
 * Quienes somos
 *
 * Title:       Quienes somos
 * Slug:        quienes-somos
 * Description: Quienes somos
 * Category:    fotografia
 * Icon:        align-full-width
 * Keywords:    quienes-somos
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

 do_action( 'fotografia_pre_render_block', $block );
 $image = get_field('image');
 $description = get_field('description');
 
if ($image && $description): ?>
    <section class="quienes-somos bg--white" id="quienes-somos" data-waypoint=".25">
        <div class="container">
            <?php if($title = get_field('title')): ?>
                <h2 class="quienes-somos__title title h3"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            <div class="quienes-somos__cont quienes-somos__cont--<?php echo esc_attr(get_field('image_order'));?>">
                <?php
                get_template_part('modules/components/image', null, ['image' => $image, 'cssclass' => 'quienes-somos__image']);
                echo $description ? '<div class="quienes-somos__description">' . esc_html($description) . '</div>' : '';
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>
 