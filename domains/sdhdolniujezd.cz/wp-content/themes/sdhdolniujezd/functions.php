<?php

function sdhdolniujezd_resources() {

    wp_enqueue_style('custom', get_stylesheet_uri());
}

function getOpeningVideo() {

    $dir = get_theme_file_path() . '/video';
    $files = array_diff(scandir($dir), array(".", ".."));
    $path = "";

    return $files[2];
}

function getFirstVideo() {
    $p = array();
    $i = 0;

    while (have_rows('pozadi_videa', 'options')): the_row();
        $p[$i] = get_sub_field('url');
        $i = $i + 1;
    endwhile;

    return $p[0];
}

function getVideos() {
    $p = array();
    $i = 0;

    while (have_rows('pozadi_videa', 'options')): the_row();
        $p[$i] = get_sub_field('url');
        $i = $i + 1;
    endwhile;

    return $p;
}

function getBackgroundImages() {
    $p = array();
    $i = 0;

    while (have_rows('pozadi_obrazky', 'options')): the_row();
        $p[$i] = get_sub_field('url');
        $i = $i + 1;
    endwhile;
    
    

    return $p;
}

function getBackgroundImagesPosts($arr_posts) {
    $p = array();
    //$i = 0;
    
    if ($arr_posts->have_posts()){
        while ($arr_posts->have_posts()) : $arr_posts->the_post();
        if (is_sticky(the_post()->ID ?? 0)){
            //$p[$i] = get_the_post_thumbnail_url();
            array_push($p, array(get_the_post_thumbnail_url(), get_the_title(), get_permalink()));
            //$i = $i + 1;
        }
        endwhile;
    }
    return $p;
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));
}

add_action('wp_enqueue_scripts', 'sdhdolniujezd_resources');

function create_posttype() {


    register_post_type('team',
            // CPT Options
            array(
        'labels' => array(
            'name' => __('Team'),
            'singular_name' => __('Team')
        ),
        'public' => true,
        /* 'taxonomies' => array( 'kategorie_teamu' ), */
        'has_archive' => true,
        'rewrite' => array('slug' => 'team'),
            )
    );

    /* register_taxonomy(
      'kategorie_team',
      'reference',
      array(
      'label' => __( 'Kategorie reference' ),
      'rewrite' => array( 'slug' => 'kategorie_reference' ),
      'hierarchical' => true,
      )
      ); */
}

function custom_excerpt_length(){
    return 25;
}

add_filter('excerpt_length', 'custom_excerpt_length');

add_theme_support('post-thumbnails');

// Hooking up our function to theme setup
add_action('init', 'create_posttype');

//Navigation menus
register_nav_menus(array(
    'primary' => __('Primary Menu'),
    'footer' => __('Footer Menu'),
));
