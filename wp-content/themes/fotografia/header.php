<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $favicon = get_field('favicon','option');	?>
	<link rel="icon" type="image/x-icon" href="<?php echo $favicon['url']; ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>



	<div id="page" class="site">
		<header class="header">
			<div class="container">
				<div class="header__cont">
					<div class="header__left">
						<?php get_template_part('modules/components/site-logo'); ?>
					</div>
					<div class="header__right" data-block="menu">
						<?php get_template_part('modules/components/responsive-btn'); ?>
						<?php get_template_part('modules/components/menu'); ?>
						<?php get_template_part('modules/components/socials'); ?>
					</div>
				</div>

			</div>
		</header>

		<main id="content" class="site-content">
