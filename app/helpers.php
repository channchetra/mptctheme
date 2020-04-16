<?php

namespace App;

use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates)
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates)
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

/**
 * Custom template helper for mptctheme
 */
function mptc_render_layout_class()
{
    $layout = mptc_template_seletor();
    switch ($layout) {
        case '_gallery':
            return 'b-1 row';
            break;
        case '_documents':
        case '_videos':
        default:
            return 'b-2';
            break;
    }
}

function mptc_thumbnail($size = 'post-thumbnail')
{
    if (has_post_thumbnail()) {
        $url = get_the_post_thumbnail_url('', $size);
    } else {
        $url = asset_path('images/'). $size.'.png';
    }
    return $url;
}

function mptc_post_paginations()
{
    the_posts_pagination(array(
        'prev_text' => '<span class="oi oi-media-skip-backward"></span>',
        'next_text' =>  '<span class="oi oi-media-skip-forward"></span>',
        'mid_size'  => 2,
        'type'      => 'list'
        ));
}
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
function mptc_posted_on()
{

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date())
    );

    $posted_on = sprintf(
        /* translators: %s: post date. */
        esc_html_x('%s', 'post date', 'sage'),
        $time_string
    );

    echo '<span>' . $posted_on . '</span>'; // WPCS: XSS OK.
}

function mptc_download_view()
{
    $document = get_post_meta(get_the_ID(), '_mptc_document_file', true);
    $url = get_site_url();
    strpos($document, $url) !== false ? true : false;
    if (!empty($document)) {
        $render_d = '<a href="'. mptc_check_meta_data() . $document . '"><span class="oi oi-cloud-download"></span>%s </a>';
        printf($render_d, __('ទាញយក', 'sage'));
    } else {
        $render_v = '<a href="' . get_the_permalink() . '"><span class="oi oi-eye"></span>%s </a>';
        printf($render_v, __('បើកមើល', 'sage'));
    }
}
function mptc_posted_by()
{
    $html = '<span>%s <a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" class="fn">' . esc_html(get_the_author()) . '</a></span>';
    printf($html, __('អត្ថបទដោយ', 'sage'));
}

function mptc_the_posted_view_count()
{
    $html = '<span>%s ('. mptc_get_the_posted_view_count().')</span>';
    printf($html, __('ចំនួនទស្សនា', 'sage'));
}

function mptc_kilo_mega_giga($number)
{
    $number_format = number_format_i18n($number);
    $exploded = explode(',', $number_format);
    $count = count($exploded);

    switch ($count) {
        case 2:
            $value = number_format_i18n($number/1000, 1).'K';
            break;
        case 3:
            $value = number_format_i18n($number/1000000, 1).'M';
            break;
        case 4:
            $value = number_format_i18n($number/1000000000, 1).'G';
            break;
        default:
            $value = $number;
    }
    return $value;
}
