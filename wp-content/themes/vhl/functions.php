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

function add_navigation()
{
    register_nav_menus([
        'header-menu' => 'Header Menu',
        'bottom-left-menu' => 'Bottom Left Menu',
        'bottom-right-menu' => 'Bottom Right Menu',
    ]);
}
add_action('init', 'add_navigation');

function custom_theme()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'custom_theme');


function bannerImage($bannerImageArgs = null)
{
?>
    <div class="page-banner">

        <?php if ($bannerImageArgs['image']) : ?>
            <div class="page-banner__bg-image" style="background-image: url(<?= $bannerImageArgs['image'] ?>)"></div>
        <?php else : ?>
            <div class="page-banner__bg-image" style="background-image: url(<?= get_template_directory_uri() ?>/assets/images/ocean.jpg)"></div>
        <?php endif; ?>
        
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?= $bannerImageArgs['title'] ?></h1>
            <div class="page-banner__intro">
                <p><?= $bannerImageArgs['intro'] ?></p>
            </div>
        </div>
    </div>
<?php
}
