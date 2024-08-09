<?php
/**
 * Hero
 *
 * Title:       Hero
 * Description: hero
 * Category:    fotografia_hero
 * Icon:        align-full-width
 * Keywords:    hero
 * Post Types:  all
 * Multiple:    true
 * Active:      true
 * CSS Deps:
 * JS Deps:
 *
 * @package fotografia
 * @subpackage defaultTheme
 * @since defaultTheme  1.0
 */

do_action('fotografia_pre_render_block', $block); 

if($items = get_field('items')): ?>
  <section class="hero" data-waypoint="0.25">
    <div class="swiper-container hero__cont"> 
      <div class="swiper-wrapper">
        <?php foreach($items as $item): 
          $title = $item['title'];
          $image = $item['image']; ?>
          <div class="swiper-slide">
            <?php get_template_part('modules/components/image', null, ['image' => $image, 'cssclass' => 'hero__image']); ?>
            <?php echo ($title) ? '<h1 class="hero__title">' . $title . '</h1>' : ''; ?>
          </div>
        <?php endforeach; ?>
      </div>
    
      <!-- Agrega los controles de navegación de Swiper -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </section>
<?php endif;?> 