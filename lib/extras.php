<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;

/**
* Add <body> classes
*/
function body_class($classes) {
    // Add page slug if it doesn't exist
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    // Add class if sidebar is active
    if (Config\display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
* Clean up the_excerpt()
*/
function excerpt_more() {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');


/**
* Piklist Checker
* https://piklist.com/user-guide/docs/piklist-checker/
**/
function piklist_checker() {
    if (is_admin()) {
        include_once(get_template_directory() . '/piklist/piklist-checker.php');
        if (!\piklist_checker::check(__FILE__, 'theme')) {
            return;
        }
    }
}
add_action('init', __NAMESPACE__ . '\\piklist_checker');

/**
* Sage cpt wrapper
* https://roots.io/sage/docs/theme-wrapper/
*/
function sage_wrap_base_cpts($templates) {
    $cpt = get_post_type(); // Get the current post type
    if ($cpt) {
        array_unshift($templates, 'base-' . $cpt . '.php'); // Shift the template to the front of the array
    }
    return $templates; // Return our modified array with base-$cpt.php at the front of the queue
}
add_filter('sage/wrap_base', __NAMESPACE__ . '\\sage_wrap_base_cpts'); // Add our function to the sage_wrap_base filter

/**
* Admin logo
*/
function my_login_logo() { ?>
    <style type="text/css">
    body.login div#login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logos/sevinci-logo.png);
        background-size: 100% 100%;
        width: 100%;
        height:100%;
        font-size: 25px;
        line-height: 2.4;
    }
    </style>
    <?php
}
add_action( 'login_enqueue_scripts', 'my_login_logo' );
