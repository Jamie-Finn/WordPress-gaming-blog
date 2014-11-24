<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php wp_title( '| Jamie Finn gaming', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="site-container">
		<header class="site-header" style="background-image: url('<?php header_image(); ?>'); background-position: center; background-size: <?php echo get_custom_header()->width; ?>px <?php echo get_custom_header()->height; ?>px !important;">
			<div class="wrap">
				<div class="title-area">
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
						<?php bloginfo( 'name' ); ?>
						</a>
					</h1>
					<h2 class="site-description">
						<?php bloginfo( 'description' ); ?>
					</h2>
				</div>
			</div>
		</header>
		<nav class="nav-primary">
			<?php
				wp_nav_menu(array(
					'theme_location' => 'nav-primary',
					'menu' => 'Primary Navigation',
					'container' => false,
					'fallback_cb' => 'thefunk_new_setup',
					'items_wrap' => '<div class="wrap"><ul class="thefunk-nav-menu">%3$s</ul></div>'
				));
			?>
		</nav>
		<div class="site-inner">
