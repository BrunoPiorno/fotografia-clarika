<?php $hasmenu = get_field('menu', 'option'); ?>
<?php if ($hasmenu): ?>
	<div class="site-menu">
		<?php foreach ($hasmenu as $menu_item): ?>
			<?php $link_menu = isset($menu_item['link_menu']) ? $menu_item['link_menu'] : ''; ?>
			<div class="site-menu__item">
				<?php if ($link_menu): ?>
					<a class="site-menu__link" href="<?php echo esc_url($link_menu['url']); ?>" <?php echo empty($link_menu['target']) ? '' : 'target="' . esc_attr($link_menu['target']) . '"'; ?>>
						<?php echo esc_html($link_menu['title']); ?>
					</a>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>