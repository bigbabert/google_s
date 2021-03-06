<?php
/**
 * Google_S functions and definitions
 *
 * @package Google_S
 */

// Load main class for Git Updater
if ( ! class_exists( 'GitHub_Updater' ) ) {
	require 'inc/github-updater/class-github-updater.php';
}
// Instantiate class GitHub_Updater
new GitHub_Updater;
/**
 * Calls GitHub_Updater::init() in init hook so other remote upgrader apps like
 * InfiniteWP, ManageWP, MainWP, and iThemes Sync will load and use all
 * of GitHub_Updater's methods, especially renaming.
 */
add_action( 'init', array( 'GitHub_Updater', 'init' ) );
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
  if ( ! function_exists( 'google_s_setup' ) ) :
      if ( ! isset( $content_width ) ) $content_width = 900;
function google_s_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on google_s, use a find and replace
	 * to change 'google_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'google_s', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	// Add support for title tag.
        add_theme_support( 'title-tag' );
	// Add support for Woocommerce.
        add_theme_support( 'woocommerce' );
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 280, 210, true ); // Normal post thumbnails
    add_image_size( 'screen-shot', 720, 540 ); // Full size screen
    add_image_size( 'google_s-large', 780, 540 ); // Full size screen
    }
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'google_s' ),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'google_s_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; 
        // google_s_setup
        add_action( 'after_setup_theme', 'google_s_setup' );
/**
 * This theme have two sidebars one on the Right and one at the top of the footer.
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function google_s_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'google_s' ),
		'id'            => 'sidebar-1',
		'description'   => 'This is a simple rght Sidebar, if i empty the site will be full width.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar', 'google_s' ),
		'id'            => 'sidebar-2',
		'description'   => 'This is multi layout Footer Sidebar if empty appears the default content.',
		'before_widget' => '<li id="%1$s" class="g-medium--half g-wide--1 theme--multi-device-layouts  widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<a href="#ignore-click" class="themed"><span class="icon-circle--large themed--background"><i class="icon icon-multi-device-layouts"></i></span><h3 class="large text-divider">',
		'after_title'   => '</h3></a>',
	) );
}
add_action( 'widgets_init', 'google_s_widgets_init' );
/**
 * Add "first" and "last" CSS classes to dynamic sidebar widgets. Also adds numeric index class for each widget (widget-1, widget-2, etc.)
 */
function widget_first_last_class($params) {

	global $my_widget_num; // Global a counter array
	$this_id = $params[0]['id']; // Get the id for the current sidebar we're processing
	$arr_registered_widgets = wp_get_sidebars_widgets(); // Get an array of ALL registered widgets	

	if(!$my_widget_num) {// If the counter array doesn't exist, create it
		$my_widget_num = array();
	}

	if(!isset($arr_registered_widgets[$this_id]) || !is_array($arr_registered_widgets[$this_id])) { // Check if the current sidebar has no widgets
		return $params; // No widgets in this sidebar... bail early.
	}

	if(isset($my_widget_num[$this_id])) { // See if the counter array has an entry for this sidebar
		$my_widget_num[$this_id] ++;
	} else { // If not, create it starting with 1
		$my_widget_num[$this_id] = 1;
	}

	$class = 'class="widget-' . $my_widget_num[$this_id] . ' '; // Add a widget number class for additional styling options

	if($my_widget_num[$this_id] == 1) { // If this is the first widget
		$class .= 'widget-first ';
	} elseif($my_widget_num[$this_id] == count($arr_registered_widgets[$this_id])) { // If this is the last widget
		$class .= 'g-medium--last  g-wide--last ';
	}

	$params[0]['before_widget'] = str_replace('class="', $class, $params[0]['before_widget']); // Insert our new classes into "before widget"

	return $params;

}
add_filter('dynamic_sidebar_params','widget_first_last_class');
// Add custom editor support
   function google_s_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'after_setup_theme', 'google_s_add_editor_styles' );
/**
 * Enqueue scripts and styles.
 */
function google_s_scripts() {
	wp_enqueue_style( 'google_s-style', get_stylesheet_uri() );
        
        wp_enqueue_style( 'main-style', get_template_directory_uri() . '/genericons/genericons.css' );

        wp_enqueue_style( 'genericons-style', get_template_directory_uri() . '/styles/main.css' );
        
	wp_enqueue_script( 'google_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

        wp_enqueue_script( 'google_s-main-js', get_template_directory_uri() . '/scripts/main.min.js', array(), '20120206', true );	
        
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'google_s_scripts' );
/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Enqueue Scripts/Styles for our Lightbox
function alter_add_lightbox() {
    wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/scripts/jquery.fancybox.pack.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/scripts/lightbox.js', array( 'fancybox' ), false, true );
    wp_enqueue_style( 'lightbox-style', get_template_directory_uri() . '/styles/jquery.fancybox.css' );
}
add_action( 'wp_enqueue_scripts', 'alter_add_lightbox' );
// The Excerpt length
function new_excerpt_length($length) {
	return 80;
}
add_filter('excerpt_length', 'new_excerpt_length');

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
        if ($pos=strpos($post->post_content, '<!--more-->')){
	return '<br><a class="button--primary pull-right" href="'. get_permalink($post->ID) . '"> Read the full post</a>';
} 
 else {
	return '<br><a style="display:none;" class="button--primary pull-right" href="'. get_permalink($post->ID) . '"> Read the full post</a>';
}
        }
add_filter('excerpt_more', 'new_excerpt_more');
/**
 * Customizing Login Logo Page
 */
if ( get_theme_mod( 'google_s_login_logo' ) ) : 
function alter_login_logo() { ?>

    <style type="text/css">
         body.login div#login h1 a {
background-image: url( '<?php echo esc_url( get_theme_mod( 'google_s_login_logo' ) ); ?>' );
background-size:100%;
background-position: center top;
background-repeat: no-repeat;
color: #999;
height: 240px;
font-size: 0px;
margin: 0 auto 55px;
width: 320px;
text-indent: -9999px;
display: block;
        }
        #login {padding:1% 0 0;}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'alter_login_logo' );
endif;

function loginpage_custom_link() {
	return esc_url( home_url( '/' ) );
}
function change_title_on_logo() { 
	return "Go to My Google_S Site";
}
add_filter('login_headertitle', 'change_title_on_logo');
add_filter('login_headerurl','loginpage_custom_link');
 
function new_mail_from($old) {
 return 'no-reply@blog.altertech.it';
}
function new_mail_from_name($old) {
 return 'Altertech Blog - No Reply';
}
add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');

function alter_comment_author_to_reply_link($link, $args, $comment){
 
    $comment = get_comment( $comment );
 
    // If no comment author is blank, use 'Anonymous'
    if ( empty($comment->comment_author) ) {
        if (!empty($comment->user_id)){
            $user=get_userdata($comment->user_id);
            $author=$user->user_login;
        } else {
            $author = __('Anonymous');
        }
    } else {
        $author = $comment->comment_author;
    }
 
    // If the user provided more than a first name, use only first name
    if(strpos($author, ' ')){
        $author = substr($author, 0, strpos($author, ' '));
    }
 
    // Replace Reply Link with "Reply to &lt;Author First Name>"
    $reply_link_text = $args['reply_text'];
    $link = str_replace($reply_link_text, 'Rispondi a' . $author, $link);
 
    return $link;
}
add_filter('comment_reply_link', 'alter_comment_author_to_reply_link', 10, 3);
