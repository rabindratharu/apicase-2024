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

/**
 * Register new Elementor widgets.
 *
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_new_widgets( $widgets_manager ) {

  require_once( get_stylesheet_directory() . '/widgets/apic-animation/widget.php' );
  require_once( get_stylesheet_directory() . '/widgets/apic-typing/widget.php' );
  require_once( get_stylesheet_directory() . '/widgets/apic-scroll/widget.php' );
  require_once( get_stylesheet_directory() . '/widgets/apic-accordion/widget.php' );

}
add_action( 'elementor/widgets/register', 'register_new_widgets' );


// Enqueue styles and scripts only when editing in Elementor
function hello_elementor_child_enqueue_scripts() {
    // Scripts and styles for editor
    wp_enqueue_style( 'apic-animation-style', get_stylesheet_directory_uri() . '/widgets/apic-animation/assets/widget.css', [], '1.0.0' );
    wp_enqueue_script( 'apic-animation-script', get_stylesheet_directory_uri() . '/widgets/apic-animation/assets/widget.js', [ 'jquery' ], '1.0.0', true );

    wp_enqueue_style( 'prism-okaidia', get_stylesheet_directory_uri() . '/widgets/apic-typing/assets/prism-okaidia.min.css', [], '1.0.0' );
    wp_enqueue_style( 'prism-line-numbers', get_stylesheet_directory_uri() . '/widgets/apic-typing/assets/prism-line-numbers.min.css', [], '1.0.0' );

    wp_enqueue_script( 'prism', get_stylesheet_directory_uri() . '/widgets/apic-typing/assets/prism.min.js', [ 'jquery' ], '1.0.0', true );
    wp_enqueue_script( 'prism-line-numbers', get_stylesheet_directory_uri() . '/widgets/apic-typing/assets/prism-line-numbers.min.js', [ 'jquery' ], '1.0.0', true );

    wp_enqueue_style( 'apic-typing-style', get_stylesheet_directory_uri() . '/widgets/apic-typing/assets/widget.css', [], '1.0.0' );
    wp_enqueue_script( 'apic-typing-script', get_stylesheet_directory_uri() . '/widgets/apic-typing/assets/widget.js', [ 'jquery' ], '1.0.0', true );

    wp_enqueue_style( 'apic-scroll-style', get_stylesheet_directory_uri() . '/widgets/apic-scroll/assets/widget.css', [], '1.0.0' );
    wp_enqueue_script( 'apic-scroll-script', get_stylesheet_directory_uri() . '/widgets/apic-scroll/assets/widget.js', [ 'jquery' ], '1.0.0', true );

    wp_enqueue_style( 'apic-accordion-style', get_stylesheet_directory_uri() . '/widgets/apic-accordion/assets/widget.css', [], '1.0.0' );
    wp_enqueue_script( 'apic-accordion-script', get_stylesheet_directory_uri() . '/widgets/apic-accordion/assets/widget.js', [ 'jquery' ], '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );