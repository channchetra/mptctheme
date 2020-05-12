<?php
/**
 * Add WordPress plugin to create custom post types and taxonomies using JSON, YAML or PHP files
 * refer : https://github.com/soberwp/models
 */
return [
    'type' => 'cpt',
    'name' => 'ticker',
    'supports' => [
        'title', 'thumbnail',
    ],
    'labels' => [
        'has_one' => 'Ticker',
        'has_many' => 'Tickers',
        'text_domain' => 'sage',
    ],
    'config' => [
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 60,
        'menu_icon' => 'dashicons-megaphone',
        'can_export' => true,
        'rewrite' => [
            'slug' => 'ticker',
            'with_front' => true,
            'feeds' => true,
            'pages' => true,
        ],
    ],
];
