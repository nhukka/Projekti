<?php

function bootstrapstarter_enqueue_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    $dependencies = array('bootstrap');
    wp_enqueue_style( 'bootstrapstarter-style', get_stylesheet_uri(), $dependencies ); 
}
 
function bootstrapstarter_enqueue_scripts() {
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', $dependencies, '3.3.6', true );
}
 
add_action( 'wp_enqueue_scripts', 'bootstrapstarter_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'bootstrapstarter_enqueue_scripts' );

function custom_theme_setup(){
    add_theme_support( 'post-thumbnails' );
    add_theme_support('add-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-background');
    add_theme_support('custom-header'); 
    add_theme_support('custom-fields'); 
}
add_action('after_setup_theme', 'custom_theme_setup');

function rekisteroi_menu(){
    register_nav_menu('yla', 'Ylavalikko');
}
add_action('init', 'rekisteroi_menu');

function lisaa_kirjasto(){
    wp_enqueue_script(
    'custom-script',
    get_stylesheet_directory_uri() . '/js/app.js',
    array('jquery')
    );
}

add_action('wp_enqueue_scripts', 'lisaa_kirjasto');


?>