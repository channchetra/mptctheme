<?php

namespace App;

use Roots\Sage\Container;

/**
 * Custom Function for mptctheme
 */
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

function mptc_track_post_views($post_id)
{
    if (is_singular()) {
        if (empty($post_id)) {
            global $post;
            $post_id = $post->ID;
        }

        $countKey = 'post_views_count';
        $count = get_post_meta($post_id, $countKey, true);
        if ($count == '') {
            $count = 0;
            delete_post_meta($post_id, $countKey);
            add_post_meta($post_id, $countKey, '0');
        } else {
            $count++;
            update_post_meta($post_id, $countKey, $count);
        }
    }
}
// add_action('wp_head', 'mptc_track_post_views');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function mptc_get_the_posted_view_count()
{
    $view = get_post_meta(get_the_ID(), 'post_views_count');
    if ($view) {
        return mptc_kilo_mega_giga($view[0]);
    }
    return 0;
}

function mptc_template_seletor()
{
    $cat_layout = get_term_meta(get_queried_object_id(), '_mptc_layout_type', true);
    return $cat_layout;
}

function mptc_check_pdf_data()
{
    $document = get_post_meta(get_the_ID(), '_mptc_document_file', true);
    $url = get_site_url();
    return strpos($document, $url) !== false;
}
function mptc_cat_listing($name = 'category')
{
    $taxonomies = get_terms(
        [
            'taxonomy' => $name,
            'hide_empty' => false
        ]
    );
     
    if (!empty($taxonomies)) :
        $data = [];
        foreach ($taxonomies as $category) {
            $new_arr = [
                'label' => $category->name,
                'value' => $category->term_id
            ];
            array_push($data, $new_arr);
        }
    endif;
    return $data;
}
/**
 * Method ធ្វើការទាញយក youtube videos ID ពី Link ដែលបានបញ្ចូល
 *
 * @param [type] $youtube_video_url
 * @return void
 */
function GetVideo_ID($youtube_video_url) 
{
    /**
    * ប្រភេទ Links ដែលហ្នឹងអាចទទួល
    * http://youtu.be/ID
    * http://www.youtube.com/embed/ID
    * http://www.youtube.com/watch?v=ID
    * http://www.youtube.com/?v=ID
    * http://www.youtube.com/v/ID
    * http://www.youtube.com/e/ID
    * http://www.youtube.com/user/username#p/u/11/ID
    * http://www.youtube.com/leogopal#p/c/playlistID/0/ID
    * http://www.youtube.com/watch?feature=player_embedded&v=ID
    * http://www.youtube.com/?feature=player_embedded&v=ID
    */
    /** Pattern ដែលដំណើរការ */
    /* $pattern = 
        '%                 
        (?:youtube                    # Match any youtube url www or no www , https or no https
        (?:-nocookie)?\.com/          # allows for the nocookie version too.
        (?:[^/]+/.+/                  # Once we have that, find the slashes
        |(?:v|e(?:mbed)?)/|.*[?&]v=)  # Check if its a video or if embed 
        |youtu\.be/)                  # Allow short URLs
        ([^"&?/ ]{11})                # Once its found check that its 11 chars.
        %i'; */
    $pattern = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';
    // Checks if it matches a pattern and returns the value
    if (preg_match($pattern, $youtube_video_url, $match)) {
        return $match[1];
    }
    // if no match return false.
    return false;
}
/**
 * Function ធ្វើការបង្ហាញចេញនូវ Iframe ដែល Embed youtube Video from _mptc_video_link field
 *
 * @param [type] $vdo_link
 * @return void
 */
function mptc_video_frame( $vdo_link )
{
    $vdo_id = GetVideo_ID($vdo_link);
    $render = '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/' . $vdo_id . '" frameborder="0" allowfullscreen=""></iframe>';
    return $render;
}