<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package fotografia
 */

get_header();
?>
<section class="error-404 not-found jk">
	<div class="container">
		<div class="error-404__cont">
			<header class="error-404__header">
				<h1 class="error-404__title">
					<?php esc_html_e('Error 404', 'fotografia'); ?>
				</h1>
			</header><!-- .page-header -->

			<div class="error-404__text">
				<p>
					<?php esc_html_e('La página que estas buscando no se encuentra disponible', 'fotografia'); ?>
				</p>
			</div><!-- .page-content -->
		</div>
	</div>
</section><!-- .error-404 -->


<?php
get_footer();
