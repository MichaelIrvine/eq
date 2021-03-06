<?php

/**
 * EQ functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EQ
 */

if (!defined('_EQ_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_EQ_VERSION', '1.0.0');
}

if (!function_exists('eq_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function eq_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on EQ, use a find and replace
		 * to change 'eq' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('eq', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		/* 
		*
		* Custom Image Sizes
		*
		*/

		// Preload & Placeholders
		add_image_size('preload', 15, 10, array('center', 'center'));
		// Two Column hero section
		add_image_size('preloadHalfHero', 150);
		// Team Member Image Grid Size
		add_image_size('teamImgGrid', 120, 140);


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main' => esc_html__('Primary', 'eq'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'eq_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'eq_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eq_content_width()
{
	$GLOBALS['content_width'] = apply_filters('eq_content_width', 640);
}
add_action('after_setup_theme', 'eq_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eq_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Header Branding', 'eq'),
			'id'            => 'header-branding',
			'description'   => esc_html__('Add a custom logo for the header.', 'eq'),
			'before_widget' => '<a href="/" id="mainBranding" class="header-branding">',
			'after_widget'  => '</a>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Header Branding Mobile', 'eq'),
			'id'            => 'header-branding-mobile',
			'description'   => esc_html__('Add a custom logo for mobile screens.', 'eq'),
			'before_widget' => '<a href="/" id="headerBrandingMobile" class="header-branding">',
			'after_widget'  => '</a>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Column 1', 'eq'),
			'id'            => 'footer_column-1',
			'description'   => esc_html__('Add widgets here for the Footer Column 1 section.', 'eq'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Column 2', 'eq'),
			'id'            => 'footer_column-2',
			'description'   => esc_html__('Add widgets here for the Footer Column 2 section.', 'eq'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Column 3', 'eq'),
			'id'            => 'footer_column-3',
			'description'   => esc_html__('Add widgets here for the Footer Column 3 section.', 'eq'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Column 4', 'eq'),
			'id'            => 'footer_column-4',
			'description'   => esc_html__('Add widgets here for the Footer Column 4 section.', 'eq'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'eq_widgets_init');



/**
 * Enqueue scripts and styles.
 */
function eq_scripts()
{
	wp_enqueue_style('eq-fonts', get_template_directory_uri() . '/build/fonts.css', array(), _EQ_VERSION);
	wp_enqueue_style('eq-style', get_template_directory_uri() . '/build/main.css', array(), _EQ_VERSION);

	// Main JS
	wp_enqueue_script('eq-main-js', get_template_directory_uri() . '/build/main-bundle.js', array(), _EQ_VERSION, true);

	// Front Page Scroll -- Plain JS
	wp_enqueue_script('eq-fps-plain', get_template_directory_uri() . '/build/fpScrollPlain.js', array(), _EQ_VERSION, true);
	// Front Page Scroll -- GSAP
	wp_enqueue_script('eq-fps-gsap', get_template_directory_uri() . '/build/fpScrollGsap.js', array(), _EQ_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'eq_scripts');








/**
 * Custom Function for Excerpt Size
 */
function eq_excerpt($num)
{
	$limit = $num + 1;
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	array_pop($excerpt);
	$excerpt = implode(" ", $excerpt) . "...";
	echo $excerpt;
}

/**
 * Remove Menu Items from Dashboard
 */

function remove_menus()
{
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'remove_menus');

/**
 * Change Dashboard Post Title to News
 */
function change_post_menu_label()
{
	global $menu;
	global $submenu;
	$menu[5][0] = 'News';
	$submenu['edit.php'][5][0] = 'All News';
	$submenu['edit.php'][10][0] = 'Add News';
	echo '';
}

function change_post_object_label()
{
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'News';
	$labels->singular_name = 'News';
	$labels->add_new = 'Add News';
	$labels->add_new_item = 'Add News';
	$labels->edit_item = 'Edit News';
	$labels->new_item = 'News';
	$labels->view_item = 'View News';
	$labels->search_items = 'Search News';
	$labels->not_found = 'No News found';
	$labels->not_found_in_trash = 'No News found in Trash';
}
add_action('init', 'change_post_object_label');
add_action('admin_menu', 'change_post_menu_label');

/**
 * Custom Category / taxonomy filter
 */
function category_filter()
{
	wp_enqueue_script('ajax-filter', get_template_directory_uri() . '/src/js/ajax-filter.js', array('jquery'), _EQ_VERSION, true);

	wp_localize_script('ajax-filter', 'wpAjax', array('ajaxUrl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'category_filter');

// Require file for Ajax Filter
require get_template_directory() . '/inc/ajax-filter/ajax-filter.php';


/**
 * Add custom class to body
 */

function eq_add_page_slug_body_class($classes)
{
	global $post;

	if (isset($post)) {
		$classes[] = 'page-' . $post->post_name;
	}
	return $classes;
}

add_filter('body_class', 'eq_add_page_slug_body_class');


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Responsive iframes
 */
function iframe_embed_html($html)
{
	return '<div class="videowrapper">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'iframe_embed_html', 10, 3);
add_filter('video_embed_html', 'iframe_embed_html'); // Jetpack

add_filter('body_class', 'my_body_classes');
function my_body_classes($classes)
{
	// check if field from specific page is not active 
	$approach_page = get_page_by_title('Approach');
	$approach_page_id = $approach_page->ID;
	$hide_history = get_field('display_history_section_toggle', $approach_page->ID);
	if (!$hide_history) :
		$classes[] = 'hide-history';
	endif;
	return $classes;
}