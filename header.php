<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package durhamtaxhelp_v2
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'durhamtaxhelp_v2' ); ?></a>

	<header id="masthead" class="site-header">

     

		<nav id="site-navigation" class="main-navigation menu-text">
			<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button> -->
			<div class="row">
				<div class="row">
						<div class="title-bar" data-responsive-toggle="the-menu" data-hide-for="medium">
							<button class="menu-icon" type="button" data-toggle></button>
							<div class="title-bar-title">MENU</div>
						</div>

					

						<div class="top-bar" id="the-menu">
						    <div class="top-bar-right">

							    <?php
									wp_nav_menu( array(
										'container'      => false,
										'menu'           => 'Primary Menu',
										'menu_class'     => 'vertical medium-horizontal menu',
										'theme_location' => 'primary',
										'items_wrap'     => '<ul id="%1$s" class="%2$s" data-responsive-menu="drilldown medium-dropdown" style="width: 100%;">%3$s</ul>',
										//Recommend setting this to false, but if you need a fallback...
										'fallback_cb'    => 'f6_drill_menu_fallback',
										'walker'         => new F6_DRILL_MENU_WALKER()
									) );

									?>
						    </div>

						</div>
					</div>
		</nav><!-- #site-navigation -->

		
	</header><!-- #masthead -->

	<div id="content" class="site-content">
