<?php
/**
 * Contact
 *
 * Title:       Contact
 * Slug:        contact
 * Description: Contact
 * Category:    contact
 * Icon:        align-full-width
 * Keywords:    contact
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

 <section class="contact bg--white" id="contacto" data-waypoint="0.25">
    <div class="container">
        <div class="contact__cont">
            <?php if($title = get_field('title')): ?><h2 class="contact__title title h3"><?php echo esc_html($title); ?></h2><?php endif; ?>
            <div class="contact__form"><?php echo do_shortcode('[contact-form-7 id="b70e77a" title="Contact form 1"]'); ?></div>
        </div>
    </div>
</section>