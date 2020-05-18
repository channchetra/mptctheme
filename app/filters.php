<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('អានបន្ត', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment', 'embed'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    collect(['get_header', 'wp_head'])->each(function ($tag) {
        ob_start();
        do_action($tag);
        $output = ob_get_clean();
        remove_all_actions($tag);
        add_action($tag, function () use ($output) {
            echo $output;
        });
    });
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Render comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );

    $data = collect(get_body_class())->reduce(function ($data, $class) use ($comments_template) {
        return apply_filters("sage/template/{$class}/data", $data, $comments_template);
    }, []);

    $theme_template = locate_template(["views/{$comments_template}", $comments_template]);

    if ($theme_template) {
        echo template($theme_template, $data);
        return get_stylesheet_directory().'/index.php';
    }

    return $comments_template;
}, 100);

/**
 * Add Sidebar
 */
add_filter('sage/display_sidebar', function ($display) {
    static $display;

    isset($display) || $display = in_array(true, [
      // The sidebar will be displayed if any of the following return true
      is_single(),
      is_404(),
      is_search(),
      is_page(),
      is_archive()
    ]);

    return $display;
});


// Add Fillter ទៅ Content ដើម្បីបង្ហាញ PDF Views នៅពេលដែល Custom Field _mptc_document_file ត្រូវបានឆែកឃើញថាមាន Data
add_filter('the_content', function ($doc_content) {

    $document = get_post_meta(get_the_ID(), '_mptc_document_file', true);
    $url = get_site_url();
    $upload_url = wp_upload_dir();
    /**
    * ឆែកមើលបើសិន Document file អត់មានផ្ទុក home url
    * _mptc_document_file ជា custom meta key ដែលកើតមាននៅពេល Active MPTC Field Plugin
    * ត្រូវបន្ថែម Upload Directory ទៅកាន់ Link ជាមុន (សម្រាប់ទិន្នន័យពី Website ចាស់)
    */
    strpos($document, $url) !== false ? $d_link = $document : $d_link = $upload_url['baseurl'].'/'.$document;
    if (!empty($document)) {
        $doc_content .= '<iframe width="100%" height="1000" style="border: none;" src="https://docs.google.com/viewer?url=' . $d_link . '&amp;embedded=true"></iframe>';
    }
    return $doc_content;
});

add_filter('widget_title', 'do_shortcode');


add_shortcode('span', 'ng_shortcode_spantag');
function ng_shortcode_spantag($attr, $content)
{
    return '<span>'. $content . '</span>';
}
