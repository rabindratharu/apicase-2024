<?php /*

  This file is part of a child theme called Apicbase 2021.
  Functions in this file will be loaded before the parent theme's functions.
  For more information, please read
  https://developer.wordpress.org/themes/advanced-topics/child-themes/

*/

// this code loads the parent's stylesheet (leave it in place unless you know what you're doing)

function your_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, 
      get_template_directory_uri() . '/style.css'); 

    wp_enqueue_style( 'child-style', 
      get_stylesheet_directory_uri() . '/style.css', 
      array($parent_style), 
      wp_get_theme()->get('Version') 
    );
	
	 wp_enqueue_script( 'apic-custom.js', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ), time(), true );
}

add_action('wp_enqueue_scripts', 'your_theme_enqueue_styles');

/*  Add your own functions below this line.
    ======================================== */

function register_new_widgets( $widgets_manager ) {
	

	require_once( get_stylesheet_directory() . '/widgets/apic-animation/widget.php' );

}
add_action( 'elementor/widgets/register', 'register_new_widgets' );


// Enqueue styles and scripts only when editing in Elementor
function hello_elementor_child_enqueue_scripts() {
    // Scripts and styles for editor
    wp_enqueue_style( 'apic-animation-style', get_stylesheet_directory_uri() . '/widgets/apic-animation/assets/widget.css', [], '1.0.0' );
    wp_enqueue_script( 'apic-animation-script', get_stylesheet_directory_uri() . '/widgets/apic-animation/assets/widget.js', [ 'jquery' ], '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );