<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php
	$header_class = $post && $post->post_name == 'home' ? 'absolute' : 'solid-header';
	?>
	<header class="<?= $header_class ?> w-full z-10">
		<div class="container py-4 flex justify-between items-center px-4 md:px-0">
			<a href="<?= home_url('') ?>">
				<?php $logo = THEME_DATA['logo']; ?>
				<img src="<?= $logo ?>" alt="">
			</a>
			<div class="flex flex-col md:flex-row items-center justify-end">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-primary',
						'menu_id'        => 'menu-primary',
					)
				);
				?>
				<a href="#" class="hamburger-menu-open md:hidden mb-2">
					<img src="<?= image('icon-menu.svg'); ?>" alt="Menu" class="w-12">
				</a>
			</div>
		</div>
	</header>
	<div class="hamburger-menu-wrapper" style="display: none;">
		<div class="hamburger-menu-container" style="left: -100%">
			<img src="<?= image('logo-white.png'); ?>" alt="Bhrutus Fiber" class="mb-7">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-primary',
					'menu_id'        => 'hamburger-menu',
				)
			);
			?>
		</div>
		<div class="hamburger-menu-close w-1/3"></div>
	</div>