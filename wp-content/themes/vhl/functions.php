<?php

function add_theme_css_js()
{
    //CSS
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/build/index.css', array(), '1.0', 'all');
    wp_enqueue_style('style_index', get_template_directory_uri() . '/assets/build/style-index.css', array(), '1.0', 'all');
    wp_enqueue_style('google_font', "//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i");
    wp_enqueue_style('font_awesome', "//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");

    //JS
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/build/index.js', array(), 1.0, true);
}
add_action('wp_enqueue_scripts', 'add_theme_css_js');
