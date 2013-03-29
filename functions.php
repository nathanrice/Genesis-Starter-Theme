<?php
//** Start the engine
require_once( get_template_directory() . '/lib/init.php' );

define( 'CHILD_THEME_NAME', 'Genesis Starter Theme' );
define( 'CHILD_THEME_URI', 'https://github.com/nathanrice/Genesis-Starter-Theme' );
define( 'CHILD_THEME_VERSION', '0.2.0' );

//** $content_width
$content_width = 740;

//** HTML5, please
add_theme_support( 'genesis-html5' );

#add_action( 'wp_head', 'nr_viewport_meta_tag' );
/**
 * Viewport tag, for responsive.
 */
function nr_viewport_meta_tag() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>' . "\n";
}

//** Custom Image Sizes
#add_image_size( 'image-size', 100, 100, true );

//** Disable widgets
#remove_action( 'widgets_init', 'genesis_load_widgets' );

//** Remove layouts
#genesis_unregister_layout( 'sidebar-content' );
#genesis_unregister_layout( 'content-sidebar' );
#genesis_unregister_layout( 'content-sidebar-sidebar' );
#genesis_unregister_layout( 'sidebar-sidebar-content' );
#genesis_unregister_layout( 'sidebar-content-sidebar' );
#genesis_unregister_layout( 'full-width-content' );

//** Disable edit links
add_filter( 'genesis_edit_post_link', '__return_false' );

//** Move Primary Navigation
#remove_action( 'genesis_after_header', 'genesis_do_nav' );
#add_action( 'genesis_before_header', 'genesis_do_nav' );

//** Move Secondary Navigation
#remove_action( 'genesis_after_header', 'genesis_do_subnav' );
#add_action( 'genesis_footer', 'genesis_do_subnav' );

remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'nr_do_footer' );
/**
 * Display contents of footer-content.php in footer area.
 *
 */
function nr_do_footer() {
	get_template_part( 'footer', 'content' );
}
