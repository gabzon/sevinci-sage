<?php
/**
* Sage includes
*
* The $sage_includes array determines the code library included in your theme.
* Add or remove files to the array as needed. Supports child theme overrides.
*
* Please note that missing files will produce a fatal error.
*
* @link https://github.com/roots/sage/pull/1042
*/
$sage_includes = [
    'lib/utils.php',                 // Utility functions
    'lib/init.php',                  // Initial theme setup and constants
    'lib/wrapper.php',               // Theme wrapper class
    'lib/conditional-tag-check.php', // ConditionalTagCheck class
    'lib/config.php',                // Configuration
    'lib/assets.php',                // Scripts and stylesheets
    'lib/titles.php',                // Page titles
    'lib/nav.php',                   // Custom nav modifications
    'lib/gallery.php',               // Custom [gallery] modifications
    'lib/extras.php',                // Custom functions
    'lib/custom_post_types/',        // Custom post type
    'lib/taxonomies/'                // Custom taxonomies
];

foreach ($sage_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
    }

    if (is_dir($filepath)){
        foreach (glob("$filepath/*.php") as $filename) {
            require_once($filename);
        }
    }else{
        require_once $filepath;
    }
}
unset($file, $filepath);

//require_once( SEVINCI_PATH . 'piklist/model.php');

// add_action('wp_head', 'show_template');
// function show_template() {
// 	global $template;
// 	print_r($template);
// }

// Register Sidebar
function contribution_sidebar() {

    $args = array(
        'id'            => 'sidebar-contribution',
        'name'          => __( 'Contribution', 'sage' ),
        'description'   => __( 'menu links for contributing with sevinci', 'sage' ),
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    );
    register_sidebar( $args );

}
// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'contribution_sidebar' );

function languages_list_footer(){
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages)){
        echo '<div class="ui floating dropdown labeled icon link button">';
        echo '<i class="world icon"></i>';
        echo '<span class="text">'. __('Languages','sage') .'</span>';
        echo '<div class="menu">';
        foreach($languages as $l){
            echo '<div class="item">';
            if(!$l['active']) echo '<a href="'.$l['url'].'">';
            echo icl_disp_language($l['native_name'], $l['translated_name']);
            if(!$l['active']) echo '</a>';
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
    }
}

add_filter('piklist_admin_pages', 'piklist_theme_setting_pages');
function piklist_theme_setting_pages($pages)
{
    $pages[] = array(
        'page_title' => __('Custom Settings'),
        'menu_title' => __('Settings', 'piklist'),
        'sub_menu' => 'themes.php',
        'capability' => 'manage_options',
        'menu_slug' => 'custom_settings',
        'setting' => 'sevinci_settings',
        'menu_icon' => plugins_url('piklist/parts/img/piklist-icon.png'),
        'page_icon' => plugins_url('piklist/parts/img/piklist-page-icon-32.png'),
        'single_line' => true,
        'default_tab' => 'Basic',
        'save_text' => 'Save Settings',
    );

    return $pages;
}
