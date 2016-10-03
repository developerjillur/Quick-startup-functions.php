<?php
/**
 * Master wordpress function.php need this when you want to mack a worpdress theme
 * themename functions and definitions
 *
 */

if ( ! function_exists( 'themename_after_setup' ) ) :
function themename_after_setup() {

	// textdomain for language translate
	load_theme_textdomain( 'textdomain_name', get_template_directory() . '/languages' );

	// Add theme support
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'gallery', 'audio'
	) );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );
	add_image_size( 'crop_name', 150, 150, true ); //crop_name
	

	// Setup the WordPress core custom background feature.
	add_theme_support('custom-background');

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'menu_id1' => __( 'Primary Menu',      'textdomain_name' ),
		'menu_id2'  => __( 'Footer menu', 'textdomain_name' ),
	) );

}
endif; // after setup
add_action( 'after_setup_theme', 'themename_after_setup' );
// end after_setup_theme

/**
 * added all external link //  * Enqueue scripts and styles.
 */

function themename_link_register() {
	// for style
    wp_enqueue_style('main-style-css', get_stylesheet_uri(), array(), NULL);
	// wp_enqueue_style('css-stylecss', get_template_directory_uri() . '/css/font-awesome.min.css', array(), NULL );
	
	//call jquery 
	wp_enqueue_script('jquery');
	// for script
   // wp_enqueue_script('cass-script', get_stylesheet_directory_uri() .'/js/custom.js', array( 'jquery' ), NULL, false);

    // for conditional
    wp_enqueue_script( 'themename-html5-sive', get_template_directory_uri() . 'http://html5shiv.googlecode.com/svn/trunk/html5.js', array(), 'NULL' );
    wp_script_add_data( 'themename-html5-shiv', 'conditional', 'lt IE 9' );
    wp_enqueue_script( 'themename-respond-js', get_template_directory_uri() . 'http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js', array(), '1.4.2' );
    wp_script_add_data( 'themename-respond-js', 'conditional', 'lt IE 9' );

    // for comment
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'themename_link_register' );


/**
 * Register widget area.
 */


function theme_name_all_widgets_setup() {
	register_sidebar( array(
		'name'          => __( 'Widget_name', 'textdomain_name' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'description_here.', 'textdomain_name' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Widget_name', 'textdomain_name' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'description_here.', 'textdomain_name' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

}
add_action( 'widgets_init', 'theme_name_all_widgets_setup' );
// end widgets_init action

// widget shorcode support
add_filter('widget_text', 'do_shortcode'); 

// require get_template_directory() . '/inc/template-file.php';


