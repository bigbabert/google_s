<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Google_S
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php if ( is_single() ) {
        single_post_title('', true); 
    } else {
        bloginfo('name'); echo " | "; bloginfo('description');
    }
    ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="<?php echo get_template_directory_uri(); ?>/images/touch/chrome-touch-icon-192x192.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="<?php wp_title(); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-precomposed.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script>(function(){document.documentElement.className='js'})();</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="app-bar promote-layer">
        <a style="display: none;" class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyfifteen' ); ?></a>
      <div class="app-bar-container">
        <button class="menu"><img src="<?php echo get_template_directory_uri(); ?>/images/hamburger.svg" alt="Menu">
		</button>
          <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
    <?php if ( get_theme_mod( 'google_s_logo' ) ) : ?>
	<img src="<?php echo esc_url( get_theme_mod( 'google_s_logo' ) ); ?>" alt="<?php echo bloginfo( 'name' ); ?>"></a>
    <?php else : ?>
		<h1 class=logo>
     <strong><?php bloginfo( 'name' ); ?> </strong><legend> <?php bloginfo( 'description' ); ?></legend>
                </h1>
    <?php endif; ?>
			</a>
		
<section class="app-bar-actions">
<?php get_search_form(); ?> 
</section>
</div>
</header>
<nav id="site-navigation mobile-menu" class="navdrawer-container promote-layer" role="navigation">
<?php wp_nav_menu( array( 'theme_location' => 'primary','menu_class' => '')); ?>
</nav>
<nav id="site-navigation" class="navigation main-navigation" role="navigation">
<?php wp_nav_menu( array( 'theme_location' => 'primary','menu_class' => 'nav-menu')); ?>
</nav>
         <?php if (is_page_template('page-full.php') || is_page_template('page-style-guide.php') ):?>
    <main> <div id="page-full" >
      <?php elseif ( is_active_sidebar( 'sidebar-1' )  ) : ?>
        <main id="left-content"  class="g-wide--3 g-medium--half" > 
    <?php else : ?> 
    <main> <div id="no-sidebar">
        <?php endif; ?>