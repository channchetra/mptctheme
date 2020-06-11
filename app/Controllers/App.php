<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo();
    }
    public function siteDescription()
    {
        return get_bloginfo('description');
    }
    public function logoUrl()
    {
        if (has_custom_logo()) {
            $logo_img = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
            return $logo_img[0];
        }
    }
    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            /* translators: %s: Search Keyword Text */
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public static function mptcthumbnail($size = 'post-thumbnail')
    {
        if (has_post_thumbnail()) {
            $url = get_the_post_thumbnail_url('', $size);
        } else {
            $url = get_theme_file_uri().'/resources/assets/images/' . $size.'.png';
        }
        return $url;
    }
    public function ptcHomeUrl()
    {
        if (function_exists('pll_home_url')) {
            return pll_home_url();
        } else {
            return get_home_url();
        }
    }
    public function langSwitcher()
    {
        if (class_exists('SitePress')) {
            $languages = icl_get_languages('skip_missing=0');
            if (1 < count($languages)) {
                foreach ($languages as $l) {
                    $s_flag = get_theme_file_uri().'/resources/assets/images/' . $l['language_code'].'.jpg';
                    $l_flag = get_theme_file_uri().'/resources/assets/images/' . $l['language_code'].'@2x.jpg';
                    if (!$l['active']) {
                        $langs[] = '<li><a class="lang-btn" href="' . $l['url']. '"><img srcset="' . $l_flag . '" src="'. $s_flag . '">' . $l['translated_name'] . '</a></li>';
                    }
                }
                return join(', ', $langs);
            }
        } elseif (function_exists('pll_the_languages')) {
            // Gets the pll_the_languages() raw code
            $languages = pll_the_languages(array(
            'hide_if_no_translation' => 1,
            'raw'                    => true
            ));

            $output = '';

            // Checks if the $languages is not empty
            if (! empty($languages)) {
                // Creates the $output variable with languages container
                $output = '';
                // Runs the loop through all languages
                foreach ($languages as $language) {
                     // Variables containing language data
                    $id             = $language['id'];
                    $slug           = $language['name'];
                    $url            = $language['url'];
                    $current        = $language['current_lang'] ? ' languages__item--current' : '';
                    $no_translation = $language['no_translation'];

                    // Checks if the page has translation in this language
                    if (! $no_translation) {
                          // Check if it's current language
                        $small = get_theme_file_uri().'/resources/assets/images/' . $language['slug'].'.jpg';
                        $big = get_theme_file_uri().'/resources/assets/images/' . $language['slug'].'@2x.jpg';
                        if ($current) {
                            // Output the language in a <span> tag so it's not clickable
                            $output .= '<li class="list-inline-item"><a href="' . $url . '"><img srcset="'. $big .'" src="'. $small. '">' . $slug . '</a></li>';
                        } else {
                            // Output the language in an anchor tag
                            $output .= '<li class="list-inline-item"><a href="' . $url . '"><img srcset="'. $big .'" src="'. $small. '">' . $slug . '</a></li>';
                        }
                    }
                }
            }

            return $output;
        } else {
            return __('No Language Plugin installed', 'sage');
        }
    }
}
