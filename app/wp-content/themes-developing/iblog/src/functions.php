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


if ( ! function_exists( 'iblog_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * Create your own iblog_post_thumbnail() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function iblog_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	</a>

	<?php endif; // End is_singular()
}
endif;


/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 */
function iblog_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'iblog-theme' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'iblog-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Bottom Sidebar', 'iblog-theme' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'iblog-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// register_sidebar( array(
	// 	'name'          => __( 'Bottom Sidebar 2', 'iblog-theme' ),
	// 	'id'            => 'sidebar-3',
	// 	'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'iblog-theme' ),
	// 	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	// 	'after_widget'  => '</section>',
	// 	'before_title'  => '<h2 class="widget-title">',
	// 	'after_title'   => '</h2>',
	// ) );
}
add_action( 'widgets_init', 'iblog_widgets_init' );

/**
 * Custom Twenty Sixteen template tags
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

if ( ! function_exists( 'iblog_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * Create your own iblog_entry_meta() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function iblog_entry_meta() {
	if ( 'post' === get_post_type() ) {
		$author_avatar_size = apply_filters( 'twentysixteen_author_avatar_size', 49 );
		// printf( '<span class="byline"><span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>',
		// 	get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
		// 	_x( 'Author', 'Used before post author name.', 'iblog-theme' ),
		// 	esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		// 	get_the_author()
		// );
		printf( '<span class="byline"><span class="screen-reader-text">%1$s </span> <a class="url fn n" href="%2$s">%3$s</a></span>',
			_x( 'Author', 'Used before post author name.', 'iblog-theme' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		iblog_entry_date();
	}

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'twentysixteen' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	if ( 'post' === get_post_type() ) {
		iblog_entry_taxonomies();
	}

	if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'twentysixteen' ), get_the_title() ) );
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'iblog_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own iblog_entry_date() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function iblog_entry_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		get_the_date(),
		esc_attr( get_the_modified_date( 'c' ) ),
		get_the_modified_date()
	);

	printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
		_x( 'Posted on', 'Used before publish date.', 'twentysixteen' ),
		esc_url( get_permalink() ),
		$time_string
	);
}
endif;

if ( ! function_exists( 'iblog_entry_taxonomies' ) ) :
/**
 * Prints HTML with category and tags for current post.
 *
 * Create your own iblog_entry_taxonomies() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function iblog_entry_taxonomies() {
	$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentysixteen' ) );
	if ( $categories_list && iblog_categorized_blog() ) {
		printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Categories', 'Used before category names.', 'twentysixteen' ),
			$categories_list
		);
	}

	$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'twentysixteen' ) );
	if ( $tags_list && ! is_wp_error( $tags_list ) ) {
		printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Tags', 'Used before tag names.', 'twentysixteen' ),
			$tags_list
		);
	}
}
endif;

if ( ! function_exists( 'iblog_categorized_blog' ) ) :
/**
 * Determines whether blog/site has more than one category.
 *
 * Create your own iblog_categorized_blog() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return bool True if there is more than one category, false otherwise.
 */
function iblog_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'twentysixteen_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'twentysixteen_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 || is_preview() ) {
		// This blog has more than 1 category so iblog_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so iblog_categorized_blog should return false.
		return false;
	}
}
endif;
