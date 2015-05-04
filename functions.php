<?php 

// Barra superior ADM
    add_filter('show_admin_bar', '__return_false');

//JS
    add_filter('show_admin_bar', '__return_false');
    function wpt_register_js() {
        wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery');
        wp_enqueue_script('jquery.bootstrap.min');
    }
    add_action( 'init', 'wpt_register_js' );

//CSS
    function wpt_register_css() {
        wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );
        wp_enqueue_style( 'bootstrap.min' );
    }
    add_action( 'wp_enqueue_scripts', 'wpt_register_css' );
?>