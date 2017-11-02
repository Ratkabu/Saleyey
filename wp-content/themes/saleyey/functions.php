<?php
/**
 * saleyey functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package saleyey
 */

if ( ! function_exists( 'saleyey_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function saleyey_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on saleyey, use a find and replace
		 * to change 'saleyey' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'saleyey', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'saleyey' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'saleyey_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'saleyey_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function saleyey_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'saleyey_content_width', 640 );
}
add_action( 'after_setup_theme', 'saleyey_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function saleyey_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'saleyey' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'saleyey' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'saleyey_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function saleyey_scripts() {
	wp_enqueue_style( 'saleyey-style', get_stylesheet_uri() );


	wp_enqueue_script( 'saleyey-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'saleyey-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() .'/css/bootstrap.min.css');

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js');

	wp_enqueue_script( 'jquery-js', get_template_directory_uri() . '/js/jquery-3.2.1.min.js');

	wp_enqueue_style( 'saleyey-custom-style', get_template_directory_uri() . '/css/custom-style.css' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'saleyey_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//Create New Post Type MC
function create_post_type_deals() {
  register_post_type( 'deals',
    array(
      'labels' => array(
       'name' => __( 'Deals' ),
       'singular_name' => __( 'deal' ),
      ),
	  'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields' ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'deal'),
      'taxonomies' => array('tags', 'deal_type' ),
    )
  );
}

add_action( 'init', 'create_post_type_deals' );

//Register new taxonomy DEAL TYPE MC
function deals_init() {
	// create a new taxonomy
	register_taxonomy(
		'deal_type',
		'deals',
		array(
			'label' => __( 'Deal Type' ),
			'rewrite' => array( 'slug' => 'deal-type' ),
			// 'capabilities' => array(
			// 	'assign_terms' => 'edit_guides',
			// 	'edit_terms' => 'publish_guides'
			// ),
			'labels' => array(
			),
		)
	);
}
add_action( 'init', 'deals_init' );


//Countdown Timer and delete deals when expired
function countdown_timer($time, $post_id){
	date_default_timezone_set('UTC+8');
	$expiration_date = (strtotime($time));
	$today = time();
	$difference = $expiration_date - $today;
	if (($difference/60/60/24) <= 0) { 
		wp_trash_post($post_id, false); 
		return "<p class='text-danger time-remaining'>EXPIRED!</p>";
	} 

	elseif(($difference/60/60/24) > 1){
		if (floor($difference/60/60) > 1){
			return "<p class='text-danger time-remaining'>".floor($difference/60/60/24)." days remaining</p>";
		}
		else{
			return "<p class='text-danger time-remaining'>".floor($difference/60/60/24)." day remaining</p>";
		}
		die();
	}

	elseif(($difference/60/60/24) < 1){
		if(floor($difference/60/60) > 1){
			return "<p class='text-danger time-remaining'>".floor($difference/60/60). " hours left</p>";
		}
		if(floor($difference/60/60) == 1){
			return "<p class='text-danger time-remaining'>".floor($difference/60/60). " hour left</p>";
		}
	}
}


// Changing excerpt more
function new_excerpt_more($more) {
	global $post;
	return '… <a href="'. get_permalink($post->ID) . '">' . 'Read More &raquo;' . '</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');


function add_custom_post_type_to_query( $query ) {
    if ( $query->is_archive() && $query->is_main_query() ) {
        $query->set( 'post_type', array('post', 'deals') );
    }
}
add_action( 'pre_get_posts', 'add_custom_post_type_to_query' );