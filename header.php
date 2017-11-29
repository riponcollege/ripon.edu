<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1" />

<title><?php wp_title( '|', true, 'right' ); ?> Ripon College</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
<link href="<?php bloginfo( "template_url" ) ?>/css/main.css?v=112" rel="stylesheet" type="text/css">

</head>
<body <?php body_class(); ?>>

<header>

	<div class="wrap">

		<div class="logo">
			<a href="/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img src="<?php bloginfo( "template_url" ) ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>">
			</a>
		</div>

		<button class="menu-toggle">show/hide menu</button>
		<div class="main-menus">
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'nav-menu' ) ); ?>
			<?php footer_menu_display(); ?>
		</div>

		<nav class="nav-links nav-icon">
			<span class="handle"></span>
			<?php wp_nav_menu( array( 'theme_location' => 'links', 'menu_class' => 'nav-menu' ) ); ?>
		</nav>

		<nav class="nav-constituent nav-icon">
			<span class="handle"></span>
			<?php wp_nav_menu( array( 'theme_location' => 'constituent', 'menu_class' => 'nav-menu' ) ); ?>
		</nav>
		
		<a href="/events" class="calendar">Events</a>

		<a class="search-toggle"><i class="fa fa-lg fa-search"></i></a>
		<div class="search">
			<?php get_search_form(); ?>
		</div>

		<div class="translate">
			<div id="google_translate_element"></div><script type="text/javascript">
			function googleTranslateElementInit() {
			  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true, gaId: 'UA-37190446-2'}, 'google_translate_element');
			}
			</script>
			<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		</div>

	</div>

</header>

<section class="content">
