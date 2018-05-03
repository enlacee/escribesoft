<?php
// ==== FUNCTIONS ==== //

// Load the configuration file for this installation; all options are set here
if (is_readable(trailingslashit(get_stylesheet_directory()) . 'functions-config.php')) {
	require_once trailingslashit(get_stylesheet_directory()) . 'functions-config.php';
}

// Load configuration defaults for this theme; anything not set in the custom configuration (above) will be set here
require_once trailingslashit(get_stylesheet_directory()) . 'functions-config-defaults.php';

// An example of how to manage loading front-end assets (scripts, styles, and fonts)
require_once trailingslashit(get_stylesheet_directory()) . 'inc/assets.php';

// Required class Custom Posts
//require_once trailingslashit(get_stylesheet_directory()) . 'inc/custom_posts/MyCustomPost.php';

//Required Geo IP
//require_once trailingslashit(get_stylesheet_directory()) . 'inc/geoip/GeoIP.php';

// Required class Actions
//require_once trailingslashit(get_stylesheet_directory()) . 'inc/actions/NavHeadAction.php';

// Required class Widgets
//require_once trailingslashit(get_stylesheet_directory()) . 'inc/widgets/MyWidget.php';

// Required class Template
require_once trailingslashit(get_stylesheet_directory()) . 'inc/Iblog.php';

// Only the bare minimum to get the theme up and running
if ( ! function_exists( 'theme_setup' ) ) :

function theme_setup()
{
	// Language loading
	load_theme_textdomain('iblog-theme', trailingslashit(get_template_directory()) . 'languages');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');
	add_theme_support('html5', array('search-form', 'gallery'));
	add_theme_support('post-thumbnails');
	add_theme_support('custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	));

	register_nav_menus(
		array(
			'primary' => __('Menú Principal', 'iblog-theme'),
			'social'  => __('Menú Link redes sociales', 'iblog-theme')
		)
	);

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// $content_width limits the size of the largest image size available via the media uploader
	// It should be set once and left alone apart from that; don't do anything fancy with it; it is part of WordPress core
	global $content_width;
	if (!isset($content_width) || !is_int($content_width)) {
		$content_width = (int)960;
	}
}
endif; // theme setup
add_action('after_setup_theme', 'theme_setup');

$Iblog = new Iblog();
